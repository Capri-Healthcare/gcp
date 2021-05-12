<?php
/**
* Doctor Model 
*/
class Doctor extends Model
{
	public function allDoctors($user = NULL)
	{
		if (!empty($user)) {
			$query = $this->database->query("SELECT d.id, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS name, d.email, d.mobile, d.picture, d.priority, department.name As department, u.user_name, u.gender, u.status FROM `" . DB_PREFIX . "doctors` AS d LEFT JOIN `" . DB_PREFIX . "departments` AS department ON d.department_id = department.id LEFT JOIN `" . DB_PREFIX . "users` AS u ON u.user_id = d.user_id WHERE d.id = ? ORDER BY d.priority ASC, d.date_of_joining", array((int)$user));
		} else {
			$query = $this->database->query("SELECT d.id, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS name, d.email, d.mobile, d.picture, d.priority, department.name As department, u.user_name, u.gender, u.status FROM `" . DB_PREFIX . "doctors` AS d LEFT JOIN `" . DB_PREFIX . "departments` AS department ON d.department_id = department.id LEFT JOIN `" . DB_PREFIX . "users` AS u ON u.user_id = d.user_id ORDER BY d.priority ASC, d.date_of_joining");
		}
		return $query->rows;
	}

	public function getDoctor($id, $user = NULL)
	{
		$query = $this->database->query("SELECT d.*, u.* FROM `" . DB_PREFIX . "doctors` AS d LEFT JOIN `" . DB_PREFIX . "users` AS u ON u.user_id = d.user_id WHERE d.id = '".(int)$id."' LIMIT 1");
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

	public function getDepartmentByName()
	{
		$query = $this->database->query("SELECT `id` , `name` FROM `" . DB_PREFIX . "departments`");
		return $query->rows;
	}


	public function updateDoctorWebSiteData($data)
	{
		$this->database->query("UPDATE `" . DB_PREFIX . "doctors` SET `about` = ?, `social` = ?, `web_status` = ?, `priority` = ?  WHERE `id` = ? AND `user_id` = ?", array($data['about'], $data['social'], (int)$data['web_status'], (int)$data['priority'], (int)$data['id'], (int)$data['user_id']));

		return true;
	}

	public function updateDoctorAppointmentInfo($data)
	{
		$this->database->query("UPDATE `" . DB_PREFIX . "doctors` SET `time` = ?, `appointment_status` = ? WHERE `id` = ? AND `user_id` = ?", array($data['time'], $data['appointment_status'], (int)$data['id'], (int)$data['user_id']));

		return true;
	}

	public function updateDoctorHollydays($data)
	{
		$this->database->query("UPDATE `" . DB_PREFIX . "doctors` SET `weekly` = ?, `national` = ? WHERE `id` = ? AND `user_id` = ?", array($data['weekly'], $data['national'], (int)$data['id'], (int)$data['user_id']));

		return true;
	}

	public function updateDoctorAddress($data)
	{
		$address = $data['address'];

		if(empty($address['address_id']) ){

			$this->database->query("INSERT INTO `" . DB_PREFIX . "doctor_address` (`doctor_id`, `title`, `address`, `city`, `pincode`, `contact_number`, `email`, `created_at`, `created_by`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", array($data['id'], $address['title'], $address['address'], $address['city'], $address['pincode'], $address['contact_number'], $address['email'], date('Y-m-d H-i-s'),  $this->session->data['user_id']));

		} else {
			$this->database->query("UPDATE `" . DB_PREFIX . "doctor_address` SET `title` = ?, `address` = ?, `city` = ?, `pincode` = ?, `contact_number` = ?, `email` = ?, `updated_at` = ?, `updated_by` = ?  WHERE `id` = ?", array($address['title'], $address['address'], $address['city'], $address['pincode'], $address['contact_number'], $address['email'], date('Y-m-d H-i-s'),  $this->session->data['user_id'], (int)$address['address_id']));
		}
		

		return true;
	}

	public function updateDoctor($data)
	{
		/*$this->database->query("UPDATE `" . DB_PREFIX . "doctors` SET title = ?, `firstname` = ?, `lastname` = ?, `email` = ?, `mobile` = ?, `picture` = ?, logo = ?, `website` = ? , `about` = ?, `department_id` = ?, `social` = ?, `web_status` = ?, `status` = ?, `priority` = ?, `time` = ?, `weekly` = ?, `national` = ?, `appointment_status` = ? WHERE `id` = ? AND `user_id` = ?", array($this->database->escape($data['title']), $this->database->escape($data['firstname']), $this->database->escape($data['lastname']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['picture']), $this->database->escape($data['logo']), $this->database->escape($data['website']), $data['about'], (int)$data['department'], $data['social'], (int)$data['web_status'], (int)$data['status'], (int)$data['priority'], $data['time'], $data['weekly'], $data['national'], $data['appointment_status'], (int)$data['id'], (int)$data['user_id']));*/

		$this->database->query("UPDATE `" . DB_PREFIX . "doctors` SET title = ?, `firstname` = ?, `lastname` = ?, `email` = ?, `mobile` = ?, `picture` = ?, logo = ?, `department_id` = ?, `status` = ?, `website` = ? , about_doctor = ? WHERE `id` = ? AND `user_id` = ?", array($this->database->escape($data['title']), $this->database->escape($data['firstname']), $this->database->escape($data['lastname']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['picture']), $this->database->escape($data['logo']), (int)$data['department'], (int)$data['status'], $this->database->escape($data['website']), $this->database->escape($data['about_doctor']), (int)$data['id'], (int)$data['user_id']));

		return true;
	}

	public function createDoctor($data)
	{

		//echo "<pre>"; print_r($data);exit;
		$about_doctor = isset($data['about_doctor']) ? $data['about_doctor'] : '';
		$social = isset($data['social']) ? $data['social'] : '';
		$web_status = isset($data['web_status']) ? $data['web_status'] : '';
		$priority = isset($data['priority']) ? $data['priority'] : '';
		$time = isset($data['time']) ? $data['time'] : '';
		$weekly = isset($data['weekly']) ? $data['weekly'] : '';
		$national = isset($data['national']) ? $data['national'] : '';
		$appointment_status = isset($data['appointment_status']) ? $data['appointment_status'] : '';

		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "doctors` (title, `firstname`, `lastname`, `email`, `mobile`, `picture`, `logo`, `website`, `about`, `department_id`, `social`, `web_status`, `status`, `priority`, `time`, `weekly`, `national`, `appointment_status`, `user_id`, `date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($this->database->escape($data['title']), $this->database->escape($data['firstname']), $this->database->escape($data['lastname']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['picture']), $this->database->escape($data['logo']), $this->database->escape($data['website']), $about_doctor, (int)$data['department'], $social, (int)$web_status, (int)$data['status'], (int)$priority, $time, $weekly, $national, $appointment_status, (int)$data['user_id'], $data['datetime']));

		if ($query->num_rows > 0) {
			return $this->database->last_id();
		} else {
			return false;
		}
	}

	public function deleteDoctor($id)
	{
		$query = $this->database->query("DELETE FROM `" . DB_PREFIX . "doctors` WHERE `id` = ?", array((int)$id));
		return true;
	}

	public function deleteUser($id)
	{
		$query = $this->database->query("DELETE FROM `" . DB_PREFIX . "users` WHERE `user_id` = ?", array((int)$id));
		return true;
	}

	public function getSearchedDoctor($data)
	{
		$query = $this->database->query("SELECT id, CONCAT(firstname, ' ', lastname) AS label FROM `" . DB_PREFIX . "doctors` WHERE firstname like '%".$data."%' LIMIT 5");
		return $query->rows;
	}

	public function getDoctorAddressHtml($doctor_id = 1){
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "doctor_address` WHERE doctor_id = ".$doctor_id."");
		$doctor_address = $query->rows;

		if(empty($doctor_address)){
			return "";
		} else {
			$table_html = "<table class='table table-middle table-bordered table-striped pb-5'>".
							"<thead>".
								"<tr>".
									"<th>Address</th>".
									"<th>Action</th>".
								"</tr>".
							"</thead>".
						
							"<tbody>";
				foreach($doctor_address as $address){
					$table_html .= "<tr>".
										"<td>".
											$address['title'].", ".$address['address'].", ".$address['city'].", ".$address['pincode'].
											" </br> ".$address['contact_number'].", ".$address['email'].
										"</td>".
										"<td>".
										"<a href='#' class='text-primary edit-address' title='' data-original-title='Edit' data-address_id='".$address['id']."' data-title='".$address['title']."' data-address='".$address['address']."' data-city='".$address['city']."' data-pincode='".$address['pincode']."' data-contact_number='".$address['contact_number']."' data-email='".$address['email']."'><i class='ti-pencil-alt'></i></a>".
										"</td>".
									"</tr>";
				}

			$table_html .= "</tbody>".
						"</table>";

			return $table_html;
		}

	}
}