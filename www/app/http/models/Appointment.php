<?php

/**
* Make an appointment model
*/
class Appointment extends Model
{
	public function getDoctors()
	{
		$query = $this->database->query("SELECT d.id, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS name, d.weekly, d.national, dp.name AS department, dp.id AS department_id FROM `" . DB_PREFIX . "doctors` AS d LEFT JOIN `" . DB_PREFIX . "departments` AS dp ON dp.id = d.department_id WHERE d.appointment_status = ? ORDER BY dp.id", array(1));
		return $query->rows;
	}

	public function getDepartments()
	{
		$query = $this->database->query("SELECT id, name FROM `" . DB_PREFIX . "departments` WHERE status = 1");
		return $query->rows;
	}

	public function getDoctorTime($doctor)
	{
		$query = $this->database->query("SELECT `time` FROM `" . DB_PREFIX . "doctors` WHERE `id` = ? LIMIT 1", array($this->database->escape($doctor)));
		if ($query->num_rows > 0) {
			return  $query->row['time'];
		} else {
			return false;
		}
	}
	
	public function bookedSlot($date, $doctor) 
	{
		$date = date("Y-m-d", strtotime($date));
		$query = $this->database->query("SELECT `time` FROM `" . DB_PREFIX . "appointments` WHERE `date`= ? AND `doctor_id` = ? AND `status` != ? ", array($this->database->escape($date), $this->database->escape($doctor), 1));
		$result = [];
		if ($query->num_rows > 0) {
			foreach ($query->rows as $key => $value) {
				$result[] = $value['time'];
			}
		}
		return $result;
	}

	public function isAppointmentMade($data) 
	{
		$date = date("Y-m-d", strtotime($data['date']));
		$query = $this->database->query("SELECT `time` FROM `" . DB_PREFIX . "appointments` WHERE `date` = ? AND `doctor_id` = ? AND `time` = ? AND `status` != ? ", array($this->database->escape($date), $this->database->escape($data['doctor']), $this->database->escape($data['time']), 1));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function createAppointment($data) 
	{
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "appointments` (`name`, `email`, `mobile`, `date`, `time`, `slot`, `message`,  `department_id`, `status`, `consultation_type`, `doctor_id`, `patient_id`, `date_of_joining`, `appointment_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ", array($this->database->escape($data['name']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['date']), $this->database->escape($data['time']), $this->database->escape($data['slot']), $data['message'], $this->database->escape($data['department']), '1',  $this->database->escape($data['consultation_type']), $this->database->escape($data['doctor']), $this->database->escape($data['patient_id']), $data['datetime'], $data['appointment_id']));
		if ($query->num_rows > 0) {
			return $this->database->last_id();
		} else {
			return false;
		}
	}

	public function getDoctor($id)
	{
		$query = $this->database->query("SELECT CONCAT(firstname, ' ', lastname) AS name, `email` FROM `" . DB_PREFIX . "doctors` WHERE `id` = ? LIMIT 1 ", array($this->database->escape($id)));
		return $query->row;
	}

	public function getAppointmentImages($id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_images` WHERE `appointment_id` = ?", array((int)$id));
		if ($query->num_rows > 0) {
			return  $query->rows;
		} else {
			return false;
		}
	}

	public function createAppointmentImage($data)
	{
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "appointment_images` (`name`, `filename`, `appointment_id`, `patient_id`, `user_id`) VALUES (?, ?, ?, ?, ?) ", array($data['appointment_image_name'], $this->database->escape($data['filename']), (int)$data['id'], (int)$data['patient'], (int)$data['user_id']));
	}

	public function deleteAppointmentImage($data)
	{
		$query = $this->database->query("DELETE FROM `" . DB_PREFIX . "appointment_images` WHERE `filename` = ? AND `appointment_id` = ?" , array($this->database->escape($data['filename']), (int)$data['appointment_id']));

		return true;
	}

	public function getAppointmentByVideoConsultationToken($token)
	{
		if(empty($token)){
			return false;
		} else {
			$query = $this->database->query("SELECT a.*, a.status AS appointment_status, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.gp_name, pt.gp_address, pt.special_requirements FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.video_consultation_token = '".$token."' LIMIT 1");
		}
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

	public function getVideoConsultationDetails($token)
	{
		if(empty($token)){
			return false;
		} else {
			$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "video_consultation_session` WHERE video_consultation_token = '".$token."'");
		}
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

	public function getAppointmentsforReminder()
	{
		// $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE `date` = CURDATE() AND TIME BETWEEN CURRENT_TIME() AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 10 MINUTE), '%H:%i:%s')");

		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE `date` = '".Date('Y-m-d', strtotime('+1 days'))."'");
		
		if ($query->num_rows > 0) {
			return $query->rows;
		} else {
			return false;
		}

	}

	public function getAppointmentView($id, $doctor = NULL)
	{
		if ($doctor == NULL) {
			$query = $this->database->query("SELECT a.*, a.status AS appointment_status, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.gp_name, pt.gp_address, pt.special_requirements FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.id = '".(int)$id."' LIMIT 1");
		} else {
			$query = $this->database->query("SELECT a.*, a.status AS appointment_status, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.gp_name, pt.gp_address, pt.special_requirements FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.id = '".(int)$id."' AND a.doctor_id = '".(int)$doctor."' LIMIT 1");
		}
		
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}
	
}


