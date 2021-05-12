<?php

/**
* Form Model
*/
class Form extends Model
{
	public function allForms()
	{
		$query = $this->database->query("SELECT f.id, f.name, f.description, GROUP_CONCAT(DISTINCT(d.name)) AS departments, (SELECT COUNT(*) AS tot FROM " . DB_PREFIX . "form_field AS ff WHERE ff.form_id = f.id AND ff.is_active = 'Y') AS no_of_questions, f.applicable_to, f.status, f.created_at 
		FROM `" . DB_PREFIX . "form` as f, `" . DB_PREFIX . "form_departments` as fd, `" . DB_PREFIX . "departments` as d 
		WHERE f.id = fd.form_id AND fd.is_active = 'Y' AND fd.`department_id` = d.id
		GROUP BY f.`id`
		ORDER BY f.id ASC");
		return $query->rows;
	}
	public function getForm($id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "form` WHERE `id` = ? LIMIT 1", array((int)$id));
		
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}
	public function getFormField($id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "form_field` WHERE `form_id` = ? AND is_active = ? ORDER BY sort_no", array((int)$id, 'Y'));
		
		if ($query->num_rows > 0) {
			return $query->rows;
		} else {
			return false;
		}
	}

	public function updateForm($data)
	{
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "form` SET `name` = ?, `description` = ?, `applicable_to` = ?, `status` = ?, `updated_at` = ?, `updated_by` = ? WHERE `id` = ?", array($this->database->escape($data['name']), $this->database->escape($data['description']), $data['applicable_to'], $data['status'], date('Y-m-d H:i:s'), (int)$data['user_id'], (int)$data['id']));
		
		$this->updateDepartments($data);
		$this->updateFormFileds($data);
		
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function createForm($data)
	{
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "form` (`name`, `description`, `applicable_to`, `status`, `created_at`, `created_by`) VALUES (?, ?, ?, ?, ?, ?)", array($this->database->escape($data['name']), $this->database->escape($data['description']), $data['applicable_to'], $data['status'], date('Y-m-d H:i:s'), (int)$data['user_id']));
		
		$data['id'] = $this->database->last_id();
		$this->updateDepartments($data);
		$this->updateFormFileds($data);

		if ($query->num_rows > 0) {
			return $data['id'];
		} else {	
			return false;
		}
		
	}
	
	public function updateDepartments($data) {
		$user_id = (int)$data['user_id'];
		$form_id = (int)$data['id'];
		
		// Inactive old form and department link
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "form_departments` SET `is_active` = ?, `updated_at` = ?, `updated_by` = ? WHERE `form_id` = ?", array('N', date('Y-m-d H:i:s'), $user_id, $form_id));
		
		foreach($data['departments'] AS $department_id) {
			$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "form_departments` WHERE form_id = ".$form_id." AND department_id = '".$department_id."'");
			$is_exist = $query->row;
			if(empty($is_exist)) {
				$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "form_departments` (`form_id`, `department_id`, `is_active`, `created_at`, `created_by`) VALUES (?, ?, ?, ?, ?)", array($form_id, $department_id, 'Y',date('Y-m-d H:i:s'), $user_id));
				
			} else {
				$query = $this->database->query("UPDATE `" . DB_PREFIX . "form_departments` SET `is_active` = ?, `updated_at` = ?, `updated_by` = ? WHERE `id` = ?", array('Y', date('Y-m-d H:i:s'), $user_id, $is_exist['id']));
			}
		}
		
		if ($query->num_rows > 0) {
			return true;
		} else {	
			return false;
		}
		
	}
		
	public function updateFormFileds($data){
		$user_id = (int)$data['user_id'];
		$form_id = (int)$data['id'];
		
		//echo "<pre>"; print_r($data);exit;
		// Inactive all the inputes
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "form_field` SET `is_active` = ?, `updated_at` = ?, `updated_by` = ? WHERE `form_id` = ?", array('N', date('Y-m-d H:i:s'), $user_id, $form_id));
				
		$json_string = $data['input_list'];		
		$decodedText = html_entity_decode($json_string);
		$input_list_array = json_decode($decodedText, true);
		//echo "<pre>"; print_r($input_list_array);exit;

		foreach($input_list_array as $input_type => $input_list){
			if(!empty($input_list)){
				
				foreach($input_list as $input){
					$random_number = (isset($input['name']) and !empty($input['name'])) ? preg_replace('/[^0-9]/', '', $input['name']) : '';
					$label = (isset($input['label']) and !empty($input['label']) and $input_type != 'note') ? $input['label'] : '';
					$placeholder = (isset($input['placeholder']) and !empty($input['placeholder'])) ? $input['placeholder'] : '';
					$required = (isset($input['required']) and !empty($input['required'])) ? $input['required'] : '';
					$options = (isset($input['options']) and !empty($input['options'])) ? implode(',', $input['options']) : '';
					$values = (isset($input['values']) and !empty($input['values'])) ? implode(',', $input['values']) : '';
					$sort_no = (isset($input['index']) and !empty($input['index'])) ? $input['index'] : 0;
					$note = (isset($input['label']) and !empty($input['label']) and $input_type == 'note') ? $input['label'] : '';

					//echo"<br>". $sql = "INSERT INTO `" . DB_PREFIX . "form_field` (`form_id`, `input_type`, `name`, `label`, `placeholder`, `required`, `options`, `values`, `sort_no`, `is_active`, `created_at`, `created_by`) VALUES ('".$form_id."', '".$input_type."', '".$name."', '".$label."', '".$placeholder."', '".$required."', '".$options."', '".$values."', '".$sort_no."', 'Y','".date('Y-m-d H:i:s')."',". (int)$user_id.") ON DUPLICATE KEY UPDATE label = '".$label."', placeholder = '".$placeholder."', required = '".$required."', `options` = '".$options."', `values` = '".$values."', sort_no = '".$sort_no."', is_active = 'Y', `updated_at` = '".date('Y-m-d H:i:s')."', `updated_by` = ". (int)$user_id;
					//$query = $this->database->query($sql);
					
					$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "form_field` WHERE form_id = ".$form_id." AND input_type = '".$input_type."' AND random_number = '".$random_number."'");
					$is_exist = $query->row;
					if(empty($is_exist)) {
						$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "form_field` (`form_id`, `input_type`, `random_number`, `label`, `placeholder`, `required`, `options`, `values`, `note`, `sort_no`, `is_active`, `created_at`, `created_by`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($form_id, $input_type, $random_number, $label, $placeholder, $required, $options, $values, $note, $sort_no, 'Y',date('Y-m-d H:i:s'), $user_id));
						
					} else {
						$query = $this->database->query("UPDATE `" . DB_PREFIX . "form_field` SET `label` = ?, `placeholder` = ?, `required` = ?, `options` = ?, `values` = ?, `note` = ?, `sort_no` = ?, `is_active` = ?, `updated_at` = ?, `updated_by` = ? WHERE `id` = ?", array($label, $placeholder, $required, $options, $values, $note, $sort_no, 'Y', date('Y-m-d H:i:s'), $user_id, $is_exist['id']));
					}
				}
			}
			
		}
		
	}

	public function getSelectDepartmentsByForm($form_id)
	{
		$query = $this->database->query("SELECT GROUP_CONCAT(DISTINCT(department_id)) AS department_ids FROM `" . DB_PREFIX . "form_departments` WHERE is_active = 'Y' AND `form_id` = ? ", array((int)$form_id));
		if ($query->num_rows > 0) {
			return explode(",", $query->row['department_ids']);
		} else {
			return false;
		}
	}
	
	
	public function getPreConsultationFormsByDepartments($department_id)
	{
		$query = $this->database->query("SELECT f.* 
		FROM `" . DB_PREFIX . "form` as f, `" . DB_PREFIX . "form_departments` as fd
		WHERE fd.department_id = ? AND fd.is_active = 'Y' AND fd.form_id = f.id AND f.status = 'Y' AND f.applicable_to = 'PATIENT' ", array((int)$department_id));
		if ($query->num_rows > 0) {
			return $query->rows;
		} else {
			return false;
		}
	}

	public function getFindingFormsByDepartments($department_id)
	{
		$query = $this->database->query("SELECT f.* 
		FROM `" . DB_PREFIX . "form` as f, `" . DB_PREFIX . "form_departments` as fd
		WHERE fd.department_id = ? AND fd.is_active = 'Y' AND fd.form_id = f.id AND f.status = 'Y' AND f.applicable_to = 'DOCTOR' ", array((int)$department_id));
		if ($query->num_rows > 0) {
			return $query->rows;
		} else {
			return false;
		}
	}
	
	
	public function getPreConsultationFormsByAppointment($appointment_id) {
		
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_forms` WHERE is_active = 'Y' AND appointment_id = '".$appointment_id."'");
			
		$form_ids = [];
		if ($query->num_rows > 0) {			
			foreach($query->rows as $row){
				$form_ids[] = $row['form_id'];
			}			
		}
		return $form_ids;
	}
	
	
	
	public function getFormAnswer($appointment_id, $form_id) {
		
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_form_answer` WHERE appointment_id = '".$appointment_id."' AND form_id = '".$form_id."'");
			
		$form_answers = [];
		if ($query->num_rows > 0) {			
			foreach($query->rows as $row){
				$form_answers[$row['form_field_id']] = $row['answer'];
			}			
		}
		return $form_answers;
	}

	public function updateAppointmentFormAnswer($params) {
		$user_id = (int)$params['user_id'];
		
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_form_answer` WHERE appointment_id = ".$params['appointment_id']." AND form_id = ".$params['form_id']. " AND form_field_id = ".$params['form_field_id']);
		$is_exist = $query->row;
		
		if(empty($is_exist)) {
			$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "appointment_form_answer` (`appointment_id`, `form_id`, `form_field_id`, `answer`, `created_at`, `created_by`) VALUES (?, ?, ?, ?, ?, ?)", array($params['appointment_id'], $params['form_id'], $params['form_field_id'], $params['answer'], date('Y-m-d H:i:s'), $user_id));
			
		} else {
			
			$query = $this->database->query("UPDATE `" . DB_PREFIX . "appointment_form_answer` SET `answer` = ?, `updated_at` = ?, `updated_by` = ? WHERE `id` = ?", array($params['answer'], date('Y-m-d H:i:s'), $user_id, $is_exist['id']));
			
			
			//$query = $this->database->query($sql);
			//var_dump($query);exit;
			/*if($params['form_field_id'] == 42) { echo $params['answer'];
				echo $sql = "UPDATE " . DB_PREFIX . "appointment_form_answer SET answer = '".$params['answer']."', updated_at = '".date('Y-m-d H:i:s')."', updated_by = ".$user_id." WHERE id = " . $is_exist['id'];
				exit;
			}*/
		}
		//var_dump($query);exit;
		if ($query->num_rows > 0) {
			return $query->rows;
		} else {
			return false;
		}
	}
}