<?php


class FollowupController extends Controller
{

    public function index()
    {
        $this->load->model('commons');
        $this->load->model('followup');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $followup['id'] = $this->session->data['user_id'];
        $followup['role'] = $data['common']['user']['role'];


        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $followup['period']['start'] = $this->url->get('start');
        $followup['period']['end'] = $this->url->get('end');
        $followup['period']['status'] = $this->url->get('status');


        if (!empty($followup['period']['start']) && !empty($followup['period']['end'])) {
            $followup['period']['start'] = date_format(date_create($followup['period']['start'] . '00:00:00'), "Y-m-d H:i:s");
            $followup['period']['end'] = date_format(date_create($followup['period']['end'] . '23:59:59'), "Y-m-d H:i:s");

        } else {
            $followup['period']['start'] = date_format(date_create(date('Y-m-d') . '00:00:00'), "Y-m-d H:i:s");
            $followup['period']['end'] = date_format(date_create(date('Y-m-d') . '23:59:59'), "Y-m-d H:i:s");

            if( $data['common']['user']['role'] == constant('USER_ROLE_MED'))
            {
                $followup['period']['status'] = 'NEW';
            }
            else{
                $followup['period']['status'] = 'PAID';
            }

        }
        $data['result'] = $this->model_followup->getFollowup($followup);

        $data['page_title'] = 'Follow Up';
        $data['page_edit'] = $this->user_agent->hasPermission('follow-up/edit') ? true : false;

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'followup/add';
        /*Render Blog view*/
        $this->response->setOutput($this->load->view('followup/followup_list', $data));
    }

    public function indexEdit()
    {
        $id = (int)$this->url->get('id');
        $status = $this->url->get('status');
        $hospitalcode = $this->url->get('hospitalcode');


        if (empty($id) || !is_int($id)) {
            $this->url->redirect('follow-up');
        }

        $this->load->model('followup');
        $data['followup'] = $this->model_followup->getFollowupByID($id);

        if (!$data['followup']) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Followup does not exist in database!');
            $this->url->redirect('follow-up');
        }

        $this->load->model('commons');
        $this->load->model('followup');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
        $data['reports'] = $this->model_followup->getOpticianReferralDocumnet($id);

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $data['page_edit'] = $this->user_agent->hasPermission('follow-up/edit') ? true : false;
        $data['page_title'] = 'Edit Followup';
        $data['id'] = $id;
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);


        if (!empty($status)) {
            $data['id'] = $id;
            $data['status'] = $status;

            if (array_key_exists($status, constant('STATUS_PAYMENT')) && $data['common']['user']['role'] == constant('USER_ROLE_GCP')) {

                if ($this->model_followup->updateFollowup($data)) {
                    if($status == 'PAID')
                    {
                        $this->opticianFollowUpMail($id);
                    }
                    $this->session->data['message'] = array('alert' => 'success', 'value' => 'Followup updated successfully.');
                } else {
                    $this->session->data['message'] = array('alert' => 'error', 'value' => 'Followup status not updated successfully.');
                }

            } else {

                if($status == constant('STATUS_FOLLOWUP_OPTICIAN')){
                    $this->notificationToMedicalFollowupAppointment($id);
                }

                if ($this->model_followup->updateFollowupStatus($data)) {
                    $this->session->data['message'] = array('alert' => 'success', 'value' => 'Followup updated successfully.');
                } else {
                    $this->session->data['message'] = array('alert' => 'error', 'value' => 'Followup status not updated successfully.');
                }
            }
            $this->url->redirect('follow-up');
        } elseif (!empty($hospitalcode)) {
            $data['id'] = $id;
            $data['hospitalcode'] = $hospitalcode;
            $data['status'] = 'ACCEPTED';
            if ($this->model_followup->updateFollowupStatus($data)) {
                $this->notificationToTheHospitalPatientDetails($id);
                //$this->notificationToGCPForPatientFollowup($id);
                echo "Followup Successfully updated.";
                exit();
            }
        } else {
            $this->response->setOutput($this->load->view('followup/followup_edit_form', $data));
        }
    }

    public function opticianFollowUpMail($id)
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('notification_to_optician_for_follow_up');


        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('followup');
        $patient  = $this->model_followup->getFollowupByID($id);

        $this->load->model('user');
        $optician = $this->model_user->getUser($patient['optician_id']);

        $link = '<a href="' . URL . 'admin">Optom Dashboard</a>';
        $result['template']['message'] = str_replace('{patient_title}', $patient['title'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient fname, lname}', $patient['firstname']." ".$patient['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{followup_date}', date('d-m-Y',strtotime($patient['due_date'])), $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('Optom Dashboard', $link, $result['template']['message']);

        $data['email'] = $optician['email'];
        $data['cc'] = $patient['email'];
        $data['subject'] = str_replace('{patient_title}', $patient['title'], $result['template']['subject']);
        $data['subject'] = str_replace('{patient_fname, lname}', $patient['firstname']." ".$patient['lastname'], $data['subject']);
        $data['subject'] = str_replace('{nhs_number}', $patient['nhs_patient_number'], $data['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }

    public function notificationToMedicalFollowupAppointment($id)
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('notification_to_medical_secretary_for_follow_up_appointment');


        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('followup');
        $patient  = $this->model_followup->getFollowupByID($id);

        $this->load->model('user');
        $user_med_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')[constant('USER_ROLE_MED')]);


        $link = '<a href="' . URL . 'admin">Medical Secretary Dashboard</a>';
        $result['template']['message'] = str_replace('med_sec_fname', $user_med_data['firstname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{med_sec_lname}', $user_med_data['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('Medical Secretary Dashboard', $link, $result['template']['message']);

        $data['name'] = $result['template']['name'];
        $data['email'] = $user_med_data['email'];
        $data['cc'] = $patient['email'];
        $data['subject'] = str_replace('{patient_title}', $patient['title'], $result['template']['subject']);
        $data['subject'] = str_replace('{patient_fname, lname}', $patient['firstname']." ".$patient['lastname'], $data['subject']);
        $data['subject'] = str_replace('{nhs_number}', $patient['nhs_patient_number'], $data['subject']);
        $data['message'] = $result['template']['message'];


        return $this->controller_mail->sendMail($data);
    }

    public function notificationToTheHospitalPatientDetails($id)
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('notification_to_the_hospital_for_patient_details');


        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('followup');
        $patient  = $this->model_followup->getFollowupByID($id);
        $patient['address'] = json_decode($patient['address'],true);

        $this->load->model('user');
        $user_med_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')[constant('USER_ROLE_MED')]);


        $result['template']['message'] = str_replace('{patient name}', $patient['firstname']." ".$patient['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{name}', $patient['firstname']." ".$patient['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{address}', $patient['address']['address1']." ".$patient['address']['address2']." ".$patient['address']['city']." ".$patient['address']['country']." ".$patient['address']['postal'], $result['template']['message']);
        $result['template']['message'] = str_replace('{mobile}', $patient['mobile'], $result['template']['message']);
        $result['template']['message'] = str_replace('{email}', $patient['email'], $result['template']['message']);

        $data['name'] = $result['template']['name'];
        $data['email'] = constant('HOSPITAL_LIST')[$patient['hospital_code']]['email'];
        $data['cc'] = $patient['email'];
        $data['subject'] = str_replace('{patient_name}', $patient['firstname']." ".$patient['lastname'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }

    public function notificationToGCPForPatientFollowup($id, $template = 'notification_to_gcp_sec_for_patient_follow_up_coming')
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate($template);
        $this->load->model('followup');
        $followup  = $this->model_followup->getFollowupByID($id);

        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $this->load->model('user');

        $optician = $this->model_user->getUser($followup['optician_id']);
        $user_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')[constant('USER_ROLE_GCP')]);

        $result['template']['message'] = str_replace('{gcp_sec_fname}',$user_data['firstname'], $result['template']['message']);
        $result['template']['message'] = str_replace('gcp_lname', $optician['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{followup_date}', date('d-m-Y',strtotime($followup['due_date'])), $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);

        $data['name'] = $result['template']['name'];
        $data['email'] = $user_data['email'];
        $data['subject'] = str_replace('{patient_fname, patient_lname}',$followup['firstname']." ".$followup['lastname'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }


    public function documentUpload()
    {
        $data = $this->url->post;

        $data['user_id'] = $this->session->data['user_id'];

        $file = $this->url->files['file'];
        $data['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);

        $data['filedir'] = DIR . 'public/uploads/optician-referral/followup/' . $data['followup']['id'] . '/';
        $data['file_name'] = 'Doc-' . uniqid(rand()) . $data['id'];

        $filesystem = new Filesystem();
        $result = $filesystem->moveUpload($file, $data);

        if ($result['error'] === false) {
            $data['file_name'] = $result['name'];
            $data['followup_id'] = $data['followup']['id'];

            $this->load->model('referrallistdocument');
            $this->model_referrallistdocument->createReferralListDocument($data);
            $result['ext'] = $data['ext'];
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    public function documentRemove()
    {
        $file = $this->url->post('name');
        $referral_list_id = $this->url->post('id');
        if (!is_string($file)) {
            echo "2";
            exit();
        }

        if (!unlink(DIR . '/public/uploads/optician-referral/followup/' . $referral_list_id . '/' . $file)) {
            echo("Error deleting $file");
        } else {
            $data['filename'] = $this->url->post('name');
            $data['followup_id'] = $referral_list_id;
            $this->load->model('referrallistdocument');
            $result = $this->model_referrallistdocument->deleteReferralListDocument($data);
            echo $result;
        }
    }
}