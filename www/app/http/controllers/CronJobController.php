<?php

/**
 * CronJob Controller
 */
class CronJobController extends Controller
{
    /**
     * CronJob Controller index method
     * It will call getPage method of this controller
     **/
    public function reminderBeforeAppointment()
    {
        // Send reminder before appointment
        $this->load->model('appointment');
        $appointments = $this->model_appointment->getAppointmentsforReminder();
        if (empty($appointments)) {
            echo "No appointmets for reminder";
        } else {
            //echo "<pre>"; print_r($appointments);exit;
            foreach ($appointments as $appointment) {
                //echo "<pre>"; print_r($appointment);
                echo "<br>" . "Prepare text for appointment";
                $this->appointmentMail($appointment['id'], 'appointmentreminder');
            }
        }

    }

    public function appointmentMail($id, $template = 'appointmentreminder')
    {
        $this->load->model('commons');
        $result = $this->model_commons->getTemplateAndInfo($template);
        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }

        $this->load->model('user');
        $this->load->model('appointment');
        $appointment = $this->model_appointment->getAppointmentView($id);
        $optician = $this->model_user->getUser($appointment['optician_id']);

        $video_consultation_link = " - ";
        if ($appointment['status'] == CONFIRMED_APPOINTMENT_STATUS_ID and $appointment['consultation_type'] == APPOINTMENT_VIDEO_CONSULTATION_TYPE) {
            $video_consultation_link = URL . DIR_ROUTE . 'appointment/videoConsultation&token=' . $appointment['video_consultation_token'];
        }

        $link = '<a href="' . URL . '">Click Here</a>';

        $result['template']['message'] = str_replace('{ophth_title}', "", $result['template']['message']);
        $result['template']['message'] = str_replace('{gcp_fname}', $optician['firstname'] . " " . $optician['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{gcp_fname}', $optician['firstname'] . " " . $optician['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{appt_date}', $appointment['date'], $result['template']['message']);
        $result['template']['message'] = str_replace('{appt_time}', $appointment['time'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient_title}', $appointment['title'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient fname, lname}', $appointment['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{appt_loaction}', constant('HOSPITAL')[$appointment['hospital_code']], $result['template']['message']);


        $data['name'] = $appointment['name'];
        $data['email'] = $appointment['email'];
        $data['bcc'] = $appointment['doctor_email'];
        $data['subject'] = str_replace('{ophth_title}', "", $result['template']['subject']);
        $data['subject'] = str_replace('{Ophth_fname, lname}', $optician['firstname'] . " " . $optician['lastname'], $data['subject']);
        $data['message'] = $result['template']['message'];
        //echo "<pre>"; print_r($data);exit;

        $this->load->controller('common');
        $this->controller_common->sendSMSUsingTwilio($appointment['id'], 'APPOINTMENT_REMINDER');

        $this->load->controller('mail');
        return $this->controller_mail->sendMail($data);
    }

    public function followupReminder()
    {
        $this->load->model('commons');
        $result = $this->model_commons->getFollowupforRemainder();

        $afterSixWeekDate = date('Y-m-d', strtotime("+6 weeks", strtotime(date('Y-m-d'))));
        $afterFourWeekDate = date('Y-m-d', strtotime("+4 weeks", strtotime(date('Y-m-d'))));

        if (empty($result)) {
            echo "No followup for reminder";
        } else {
            foreach ($result as $followup) {
                if ($followup['is_glaucoma_required'] != 'NO') {

                    if ($followup['due_date'] <= $afterSixWeekDate) {
                        $data['id'] = $followup['id'];
                        $data['status'] = 'NEW';
                        $data['reminder_count'] = $followup['reminder_count'] + 1;
                        $this->model_commons->updateFollowupStatus($data);

                        //$this->followupMail($followup['id'], 'notification_to_optician_for_follow_up');
                    }
                } else {
                    if ($followup['due_date'] <= $afterFourWeekDate) {
                        $data['id'] = $followup['id'];
                        $data['status'] = 'NON_GCP_FOLLOWUP';
                        $data['reminder_count'] = $followup['reminder_count'] + 1;
                        $this->model_commons->updateFollowupStatus($data);

                        $this->followupGCPNoMail($followup['id'], 'notification_to_optician_for_follow_up');
                    }
                }
            }
        }

    }

    // GCP Required Yes Followup Mail
    public function followupMail($id, $template = 'notification_to_optician_for_follow_up')
    {
        $this->load->model('commons');
        $result = $this->model_commons->getTemplateAndInfo($template);
        $followup = $this->model_commons->getFollowupByID($id);
        $this->load->model('user');
        $optician = $this->model_user->getUser($followup['optician_id']);


        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $result['template']['message'] = str_replace('{patient_title}', $followup['title'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient fname, lname}', $followup['firstname'] . " " . $followup['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{followup_date}', date('d-m-Y', strtotime($followup['due_date'])), $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);


        $data['name'] = $result['name'];
        $data['email'] = $optician['email'];
        $data['cc'] = $followup['email'];
        $data['subject'] = str_replace('{patient_title}', $followup['title'], $result['template']['subject']);
        $data['subject'] = str_replace('{patient_fname, lname}', $followup['firstname'] . " " . $followup['lastname'], $data['subject']);
        $data['subject'] = str_replace('{nhs_number}', $followup['nhs_patient_number'], $data['subject']);
        $data['message'] = $result['template']['message'];

        $this->load->controller('mail');
        return $this->controller_mail->sendMail($data);
    }

    // GCP Required No Followup Mail

    public function followupGCPNoMail($id, $template = 'notification_to_optician_for_follow_up')
    {
        $this->load->model('commons');
        $result = $this->model_commons->getTemplateAndInfo($template);
        $followup = $this->model_commons->getFollowupByID($id);
        $this->load->model('user');
        $medsec = $this->model_user->checkUserRole(constant('USER_ROLE_ID')['Med. Secretary']);


        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $result['template']['message'] = str_replace('{patient_title}', $followup['title'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient fname, lname}', $followup['firstname'] . " " . $followup['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{followup_date}', date('d-m-Y', strtotime($followup['due_date'])), $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);


        $data['name'] = $result['name'];
        $data['email'] = $medsec['email'];
        $data['cc'] = $followup['email'];
        $data['subject'] = str_replace('{patient_title}', $followup['title'], $result['template']['subject']);
        $data['subject'] = str_replace('{patient_fname, lname}', $followup['firstname'] . " " . $followup['lastname'], $data['subject']);
        $data['subject'] = str_replace('{nhs_number}', $followup['nhs_patient_number'], $data['subject']);
        $data['message'] = $result['template']['message'];

        $this->load->controller('mail');
        return $this->controller_mail->sendMail($data);
    }

}