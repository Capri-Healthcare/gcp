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
		if(empty($appointments)){
			echo "No appointmets for reminder";
		} else {
			//echo "<pre>"; print_r($appointments);exit;
			foreach($appointments as $appointment){
				//echo "<pre>"; print_r($appointment);
				echo "<br>". "Prepare text for appointment";
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
		if($appointment['status'] == CONFIRMED_APPOINTMENT_STATUS_ID AND $appointment['consultation_type'] == APPOINTMENT_VIDEO_CONSULTATION_TYPE){
			$video_consultation_link = URL . DIR_ROUTE . 'appointment/videoConsultation&token=' . $appointment['video_consultation_token'];
		}
		
		$link = '<a href="'.URL.'">Click Here</a>';

        $result['template']['message'] = str_replace('{ophth_title}',"", $result['template']['message']);
        $result['template']['message'] = str_replace('{gcp_fname}',$optician['firstname']." ".$optician['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{gcp_fname}',$optician['firstname']." ".$optician['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{appt_date}', $appointment['date'], $result['template']['message']);
        $result['template']['message'] = str_replace('{appt_time}', $appointment['time'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient_title}', $appointment['title'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient fname, lname}', $appointment['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{appt_loaction}', constant('HOSPITAL')[$appointment['hospital_code']], $result['template']['message']);


        $data['name'] = $appointment['name'];
		$data['email'] = $appointment['email'];
		$data['bcc'] = $appointment['doctor_email'];
        $data['subject'] = str_replace('{ophth_title}',"", $result['template']['subject']);
        $data['subject'] = str_replace('{Ophth_fname, lname}',$optician['firstname']." ".$optician['lastname'],$data['subject']);
        $data['message'] = $result['template']['message'];
		//echo "<pre>"; print_r($data);exit;

		$this->load->controller('common');	
		$this->controller_common->sendSMSUsingTwilio($appointment['id'], 'APPOINTMENT_REMINDER');

		$this->load->controller('mail');
		return $this->controller_mail->sendMail($data);
	}
}