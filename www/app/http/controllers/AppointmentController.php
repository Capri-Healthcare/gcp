<?php
/**
* Appointment Controller
*/
class AppointmentController extends Controller
{
	/**
	* @user_id
	* Set User Id Null by default
	**/
	protected $user_id= NULL;

	public function index()
	{
		$this->load->controller('common');
		$data = array();
		$data = array_merge($data, $this->controller_common->index());
		$data['page']['page_title'] = $data['lang']['text_make_an_appointment'];
		$data['page']['meta_tag'] = $data['page']['page_title'].' | ' .$data['siteinfo']['name'];
		$data['page']['meta_description'] = $data['page']['page_title']. ', '.$data['siteinfo']['name'];
		$data['page']['page_section'] = false;
		$data['page']['breadcrumbs'] = array();
		$data['page']['breadcrumbs'][] = array(
			'label' => $data['lang']['text_home'],
			'link' => URL.DIR_ROUTE.'home',
		);
		$data['page']['breadcrumbs'][] = array(
			'label' => $data['page']['page_title'],
			'link' => '#',
		);
		
		$data['header'] = $this->controller_common->getHeader($data['page'], 'header-5');
		$footer['script'] = '<script type="text/javascript" src="public/js/appointment.js"></script>';
		$data['footer'] = $this->controller_common->getFooter($footer, 'footer-1');

		$this->load->model('appointment');
		$data['doctors'] = $this->model_appointment->getDoctors();
		$data['departments'] = $this->model_appointment->getDepartments();

		$data['active'] = 'appointment';
		/**
		* Load about view
		* Pass data to view
		**/
		$this->response->setOutput($this->load->view('common/appointment', $data));
	}

	public function getTimeSlot()
	{
		$data = $this->url->post;
		
		/** 
		* Check if request is POST or not 
		* Validate input field
		**/
		$this->load->controller('common');
		if (!$this->validate($data)) {
			$lang = $this->controller_common->getLanguage();
			echo '<div class="font-16 text-danger">'.$lang['text_please_enter_valid_data_in_input_box'].'</div>';
			exit();
		}
		echo $this->getSlot($data); 
		exit();
	}

	public function getSlot($data)
	{
		$data['day'] = date('w', strtotime($data['date']));
		$lang = $this->controller_common->getLanguage();
		$this->load->model('appointment');
		if (!$time = json_decode($this->model_appointment->getDoctorTime($data['doctor']), true)) {
			return '<div class="font-16 text-danger">'.$lang['text_no_slot_available'].'</div>'; exit();
		}

		$slot_html = '<input type="hidden" name="slot" value="'.$time[$data['day']]['slot'].'" required>';
		$time_slot = $this->makeSlot($time[$data['day']]);
		$booked_slot = $this->model_appointment->bookedSlot($data['date'], $data['doctor']);

		if (empty($time_slot)) {
			return '<div class="font-16 text-danger">'.$lang['text_no_slot_available'].'</div>'; exit();
		}
		$count = 0;
		$booked = '';
		foreach ($time_slot as $key => $time) {
			foreach ($booked_slot as $booked) { if ($time === $booked) { $count++; } }
			if ($count > 0) { $booked = 'disabled'; }
			else { $booked = ''; }

			$slot_html .= '<div>
			<input type="radio" name="time" id="apnt-time-'.$key.'" value="'.$time.'" '.$booked.' required>
			<label for="apnt-time-'.$key.'">'.$time.'</label>
			</div>';
			$count = 0;
			$booked = '';
		}

		return $slot_html;
	}

	protected function makeSlot($time)
	{
		$time_slot = [];
		$st1 = strtotime($time['st1']);
		$et1 = strtotime($time['et1']);
		$st2 = strtotime($time['st2']);
		$et2 = strtotime($time['et2']);
		if (!empty($time['slot'])) {
			if ($st1 < $et1) {
				while ($st1 < $et1) {
					$time_slot[] = date ("H:i", $st1);
					$st1 += $time['slot']*60;
				}
			}

			if ($st2 < $et2) {
				while ($st2 < $et2) {
					$time_slot[] = date ("H:i", $st2);
					$st2 += $time['slot']*60;
				}
			}
		}
		return $time_slot;
	}

	public function indexAction()
	{
		$data = $this->url->post('data');
		$this->load->controller('common');
		$common = $this->controller_common->index();
		$data['date'] = DateTime::createFromFormat($common['siteinfo']['date_format'], $data['date'])->format('Y-m-d');
		
		if (!$this->validateAppointment($data)) {
			echo json_encode(array('error' => true, 'message' => $common['lang']['text_please_enter_valid_data_in_input_box']));
			exit();
		}
		$this->load->model('appointment');
		
		if ($this->model_appointment->isAppointmentMade($data)) {
			$result = $this->getSlot($data);
			echo json_encode(array('error' => true, 'message' => $common['lang']['text_slot_has_been_booked_please_choose_other_slot'], 'slot' => $result));
			exit();
		}

		$data['appointment_id'] = date('Ymd').rand(10,100).date('his');
		$data['patient_id'] = $this->session->data['user_id'];
		$data['datetime'] = date('Y-m-d H:i:s');
		
		$data['id'] = $this->model_appointment->createAppointment($data);
		
		if ($data['id'] && is_int($data['id'])) {
			$this->sendMail($data);
			$this->controller_common->sendSMSUsingTwilio($data['mobile'], 'APPOINTMENT_REMINDER');

			echo json_encode(array('error' => false, 'message' => $common['lang']['text_appointment_created_succefully']));
		} else {
			echo json_encode(array('error' => true, 'message' => $common['lang']['text_server_error']));
		}
	}

	protected function sendMail($data)
	{
		$this->load->model('commons');
		$doctor = $this->model_appointment->getDoctor($data['doctor']);
		$result = $this->model_commons->getTemplateAndInfo('newappointment');
		$link = '<a href="'.URL.DIR_ROUTE.'login">Click Here</a>';

		$result['template']['message'] = str_replace('{appointment_id}', $result['common']['appointment_prefix'].str_pad($data['id'], 5, '0', STR_PAD_LEFT), $result['template']['message']);

		$result['template']['message'] = str_replace('{name}', $data['name'], $result['template']['message']);
		$result['template']['message'] = str_replace('{email}', $data['mail'], $result['template']['message']);
		$result['template']['message'] = str_replace('{mobile}', $data['mobile'], $result['template']['message']);
		$result['template']['message'] = str_replace('{doctor}', $doctor['name'], $result['template']['message']);
		$result['template']['message'] = str_replace('{date}', $data['date'], $result['template']['message']);
		$result['template']['message'] = str_replace('{time}', $data['time'], $result['template']['message']);
		$result['template']['message'] = str_replace('{reason}', $data['message'], $result['template']['message']);
		$result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
		$result['template']['message'] = str_replace('{link}', $link, $result['template']['message']);

		$mail['name'] = $data['name'];
		$mail['email'] = $data['mail'];
		$mail['bcc'] = $doctor['email'];
		$mail['subject'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['subject']);
		$mail['message'] = $result['template']['message'];

		$this->load->controller('mail');
		$mail_result = $this->controller_mail->sendMail($mail);
	}

	protected function validate($data)
	{
		if (filter_var($data['doctor'], FILTER_VALIDATE_INT) === false) {
			/** 
			* If doctor is not int 
			* Return false
			**/
			return false;
		} else if (!$this->validateDate($data['date']) || strtotime($data['date']) < strtotime(date('Y-m-d'))) {
			/** 
			* If date is not valid
			* also date is less than today 
			* Return false
			**/
			return false;
		} else if (filter_var($data['day'], FILTER_VALIDATE_INT) === false) {
			/** 
			* If date is not valid
			* also date is less than today 
			* Return false
			**/
			return false;
		} else {
			return true;
		}
	}

	public function validateAppointment($data)
	{
		if (filter_var($data['doctor'], FILTER_VALIDATE_INT) === false) {
			return false;
		} else if (filter_var($data['department'], FILTER_VALIDATE_INT) === false) {
			echo "department";
			return false;
		} else if (!$this->validateDate($data['date']) || strtotime($data['date']) < strtotime(date('Y-m-d'))) {
			echo "Date";
			return false;
		} else if (!$this->validateDate($data['time'], 'H:i')) {
			echo "Time";
			return false;
		} else if (!is_numeric($data['slot'])) {
			echo "Slot";
			return false;
		} else if (!preg_match("/^([a-zA-Z' ]+)$/", $data['name'])) {
			echo "Name";
			return false;
		} else if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
			echo "Email";
			return false;
		} else if (!preg_match('/^[0-9]+$/', $data['mobile'])) {
			echo "Mobile";
			return false;
		} else {
			return true;
		}
	}

	protected function validateDate($date, $format = 'Y-m-d')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}

	public function AppointmentImageUpload()
	{
		$data = $this->url->post;
		$data['user_id'] = $this->session->data['user_id'];

		$file = $this->url->files['file'];
		$data['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);

		$data['filedir'] = DIR.'public/uploads/appointment/images/'.$data['id'].'/';
		if (!file_exists($data['filedir'])) {
			mkdir($data['filedir'], 0777, true);
		}
		$data['file_name'] = 'Doc-'.uniqid(rand()).$data['id'];

		$filesystem = new Filesystem();
		$allow_filetype = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
		$result = $filesystem->moveUpload($file, $data, $allow_filetype);

		if ($result['error'] === false) {
			$data['filename'] = $result['name'];
			$this->load->model('appointment');
			$this->model_appointment->createAppointmentImage($data);
			$result['ext'] = $data['ext'];
			echo json_encode($result);
		} else {
			echo json_encode($result);
		}
	}

	public function AppointmentImageRemove()
	{
		$file = $this->url->post('filename');
		if (!is_string($file)) {
			echo "2";
			exit();
		}
		$data = $this->url->post;

		/*if (!unlink(DIR.'/public/uploads/appointment/images/'.$data['id'].'/'.$file)) {
			echo ("Error deleting $file");
		} else {
			$data['filename'] = $this->url->post('filename');
			$data['appointment_id'] = $this->url->post('id');
			$this->load->model('appointment');
			$result = $this->model_appointment->deleteAppointmentImage($data);
			echo $result;
		}*/
		unlink(DIR.'/public/uploads/appointment/images/'.$data['id'].'/'.$file);
		$data['filename'] = $this->url->post('filename');
		$data['appointment_id'] = $this->url->post('id');
		$this->load->model('appointment');
		$result = $this->model_appointment->deleteAppointmentImage($data);
		echo $result;
	}

	public function savePreConsultationForm(){
		
		$formData = $this->url->post;
		$appointment_id = $formData['appointment_id'];
		$form_id = $formData['form_id'];
		$this->load->model('form');

		foreach($formData['form'] as $key => $data){
			$form_field_id = substr($key, strpos($key, '_')+1);
			$input_type = substr($key, 0, strpos($key, '_'));
			$answer = $data;
			if($input_type == 'checkbox'){
				$answer = implode(",", $data);
			}
			$params = [];
			$params['appointment_id'] = $appointment_id;
			$params['form_id'] = $form_id;
			$params['answer'] = $answer;
			$params['form_field_id'] = $form_field_id;
			$params['user_id'] = $this->session->data['user_id'];
			
			$this->model_form->updateAppointmentFormAnswer($params);
		}
		//echo "<pre>"; print_r($formData); print_r($_FILES);exit;

		$files = $this->url->files;
		if(!empty($files)){
			foreach($files as $key => $file){
				$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
				$filedir = DIR.'public/uploads/appointment/forms/'.$appointment_id.'/'.$form_id.'/';
				if (!file_exists($filedir)) {
					mkdir($filedir, 0777, true);
				}
				$file_name = 'Doc-'.uniqid(rand()).$appointment_id;

				$filesystem = new Filesystem();
				$allow_filetype = array('jpg', 'jpeg', 'gif', 'png');
				$file_data = ['filedir' => $filedir, 'file_name' => $file_name];
				$result = $filesystem->moveUpload($file, $file_data, $allow_filetype);

				if ($result['error'] === false) {
					$form_field_id = substr($key, strpos($key, '_')+1);
					$params = [];
					$params['appointment_id'] = $appointment_id;
					$params['form_id'] = $form_id;
					//$params['answer'] = $file_name;
					$params['answer'] = $result['name'];
					$params['form_field_id'] = $form_field_id;
					$params['user_id'] = $this->session->data['user_id'];

					$this->model_form->updateAppointmentFormAnswer($params);
				}
			}
		}
		
		
		$this->session->data['message'] = array('alert' => 'success', 'value' => 'Pre consultation form save successfully.');
		$this->url->redirect('user/appointment&id='.$appointment_id);
	}

	public function startVideoConsultation(){
		
		$token = $this->url->get('token', '');
		$this->load->controller('common');
		$data = array();
		$data = array_merge($data, $this->controller_common->index());

		$this->load->model('appointment');
		//$data['appointment'] = $this->model_appointment->getAppointmentByVideoConsultationToken($token);
		$data['tokbox_details'] = $this->model_appointment->getVideoConsultationDetails($token);
		$appointment_id = (isset($data['tokbox_details']['appointment_id']) AND !empty($data['tokbox_details']['appointment_id'])) ? $data['tokbox_details']['appointment_id'] : 0;
		$data['appointment'] = $this->model_appointment->getAppointmentView($appointment_id);

		if(isset($data['tokbox_details']['doctor_id'])){
			$data['page']['tokbox_details'] = $this->model_appointment->getDoctor($data['tokbox_details']['doctor_id']);
		}

		$data['page']['page_title'] = $data['lang']['text_appointment'].' Video call';
		$data['page']['meta_tag'] = $data['page']['page_title'].' | ' .$data['siteinfo']['name'];
		$data['page']['meta_description'] = $data['page']['page_title'].', '.$data['siteinfo']['name'];
		


		$data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
		$data['header'] = $this->controller_common->getHeader($data['page'], 'header-5');
		$footer['script'] = '<script type="text/javascript" src="public/js/appointment.js"></script>';
		$data['footer'] = $this->controller_common->getFooter($footer, 'footer-1');

	
		$data['active'] = 'appointments';
		$data['title'] = $data['page']['page_title'];
		//$data['user_page'] = $this->load->view('user/appointment', $data);
		
		$this->response->setOutput($this->load->view('user/video-call', $data));

	}

}