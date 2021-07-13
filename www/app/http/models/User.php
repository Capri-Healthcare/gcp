<?php

/**
* User Model
*/
class User extends Model
{
	public function getAppointment($email, $id)
	{
		$query = $this->database->query("SELECT a.*, CONCAT(d.firstname, ' ', d.lastname) AS doctor, d.picture, dp.name AS department, COUNT(af.appointment_id) as appointment_forms  FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS dp ON dp.id = a.department_id LEFT JOIN `" . DB_PREFIX . "appointment_forms` AS af ON a.id = af.appointment_id WHERE a.email = ? OR a.patient_id = ? GROUP BY a.id ORDER BY `date` DESC", array($this->database->escape($email), $this->database->escape($id)));
		
		return $query->rows;
	}

    public function getUser($id)
    {
        $query = $this->database->query("SELECT u.*, d.time, d.weekly, d.national, d.appointment_status, d.department_id FROM `" . DB_PREFIX . "users` AS u LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.user_id = u.user_id WHERE u.user_id = ? LIMIT 1", array($this->database->escape($id)));
        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }


    public function getAppointmentView($email, $user_id, $id)
	{
		$query = $this->database->query("SELECT a.*, CONCAT(firstname, ' ', lastname) AS doctor, d.picture, dp.name AS department FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS dp ON dp.id = a.department_id WHERE (a.email = ? OR a.patient_id = ? ) AND a.id = ? LIMIT 1", array($this->database->escape($email), (int)$user_id, $this->database->escape($id)));
		return $query->row;
	}

	public function getClinicalNotes($id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_notes` WHERE `appointment_id` = ?", array($id));
		return $query->row;
	}

	public function getRecords($email, $id)
	{
		$query = $this->database->query("
			(SELECT an.id AS id, an.name, an.notes, NULL AS prescription, NULL AS reports, CONCAT(d.firstname, ' ', d.lastname) AS doctor, an.date_of_joining AS date_of_joining, 'Clinical Notes' AS type, appointment_id as appointment_id FROM `" . DB_PREFIX . "appointment_notes` AS an LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = an.doctor_id WHERE an.email = '".$email."' OR an.patient_id = '".$id."' LIMIT 30)
			UNION ALL
			(SELECT p.id AS id, p.name, NULL AS notes, p.prescription, NULL AS reports, CONCAT(d.firstname, ' ', d.lastname) AS doctor, p.date_of_joining AS date_of_joining, 'Prescription' AS type, appointment_id as appointment_id FROM `" . DB_PREFIX . "prescription` AS p LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = p.doctor_id WHERE p.email = '".$email."' OR p.patient_id = '".$id."' LIMIT 30)
			UNION ALL
			(SELECT id AS id, name, NULL AS notes, NULL AS prescription, report, NULL AS doctor, date_of_joining, 'Reports' AS type, appointment_id as appointment_id FROM `" . DB_PREFIX . "reports` WHERE email = '".$email."' OR patient_id = '".$id."' LIMIT 40)
			ORDER BY date_of_joining DESC
			");
		return $query->rows;
	}

	public function getSingleRecords($data, $id)
	{
		$query = $this->database->query("SELECT an.*, CONCAT(d.firstname, ' ', d.lastname) AS doctor FROM `" . DB_PREFIX . "appointment_notes` AS an LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = an.doctor_id WHERE an.id = ? AND ( an.email = ? OR an.patient_id = ?) LIMIT 1", array((int)$id, $this->database->escape($data['email']), (int)$data['user_id']));
		return $query->row;
	}

	public function checkPrescription($id)
	{
		$query = $this->database->query("SELECT `id` FROM `" . DB_PREFIX . "prescription` WHERE `appointment_id` = ?", array($id));
		return $query->row;
	}

	public function getAppointmentPrescription($email, $id)
	{
		$query = $this->database->query("SELECT p.*, a.name AS patient, CONCAT(firstname, ' ', lastname) AS doctor FROM `" . DB_PREFIX . "prescription` AS p LEFT JOIN `" . DB_PREFIX . "appointments` AS a ON a.id = p.appointment_id LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id WHERE p.email = ? AND p.appointment_id = ?", array($email, $id));
		return $query->row;
	}

	public function getPrescription($data, $id)
	{
		$query = $this->database->query("SELECT p.*, p.name AS patient, CONCAT(firstname, ' ', lastname) AS doctor FROM `" . DB_PREFIX . "prescription` AS p LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = p.doctor_id WHERE p.id = ? AND ( p.email = ? OR p.patient_id = ? )", array($id, $data['email'], $data['user_id']));
		return $query->row;
	}

	public function getReports($id)
	{
		$query = $this->database->query("SELECT `id`, `name`, `report`, `date_of_joining` FROM `" . DB_PREFIX . "reports` WHERE `appointment_id` = ?", array((int)$id));
		if ($query->num_rows > 0) {
			return  $query->rows;
		} else {
			return false;
		}
	}

	public function getRecordsReports($email)
	{
		$query = $this->database->query("SELECT `id`, `name`, `report`, `appointment_id`, `date_of_joining` FROM `" . DB_PREFIX . "reports` WHERE `email` = ? LIMIT 100", array($this->database->escape($email)));
		if ($query->num_rows > 0) {
			return  $query->rows;
		} else {
			return false;
		}
	}

	public function doctors()
	{
		$query = $this->database->query("SELECT `id`, CONCAT(firstname, ' ', lastname) AS name FROM `" . DB_PREFIX . "doctors`");
		return $query->rows;
	}

	public function getRequest($email, $user_id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "request` WHERE `email` = ? OR `user_id` =? ", array( $this->database->escape($email), $this->database->escape($user_id)));
		return $query->rows;
	}

	public function getAttachments($id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "attached_files` WHERE `type` = ? AND `type_id` = ?", array('invoice', (int)$id));
		return $query->rows;
	}

	public function getPayments($id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "payments` WHERE `invoice` = ?", array((int)$id));
		return $query->rows;
	}

	public function getUserData($user_id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE `id` = ? AND `status` = ? LIMIT 1", array( $this->database->escape($user_id), 1));
		return $query->row;
	}

	public function invoices($email, $user_id)
	{
		$query = $this->database->query("SELECT i.id, i.name, i.invoicedate, i.amount, i.paid, i.due, i.status, i.date_of_joining, CONCAT(firstname, ' ', lastname) AS doctor, p.name AS method FROM `" . DB_PREFIX . "invoice` AS i LEFT JOIN `" . DB_PREFIX . "payment_method` AS p ON p.id = i.method LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = i.doctor_id WHERE (i.email = ? OR i.user_id = ?) AND i.inv_status = ? ORDER BY i.date_of_joining DESC", array($email, (int)$user_id, 1));
		return $query->rows;
	}

	public function getInvoice($id, $user)
	{
		$query = $this->database->query("SELECT i.*, CONCAT(firstname, ' ', lastname) AS doctor, p.name AS method FROM `" . DB_PREFIX . "invoice` AS i LEFT JOIN `" . DB_PREFIX . "payment_method` AS p ON p.id = i.method LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = i.doctor_id WHERE i.id = '".(int)$id."' AND (i.email = '".$user['email']."' OR i.patient_id = '".$this->session->data['user_id']."' ) AND i.inv_status = 1");
		return $query->row;
	}

	public function createRequest($data)
	{
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "request` (`name`, `email`, `mobile`, `subject`, `message`, `patient_id`) VALUES (?, ?, ?, ?, ?, ?)", array($this->database->escape($data['name']), $this->database->escape($data['email']), $this->database->escape($data['mobile']), $data['subject'], $data['message'], $data['user_id']));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkUserEmail($data)
	{
		$query = $this->database->query("SELECT `email` FROM `" . DB_PREFIX . "patients` WHERE `id` = ? and `email` = ? LIMIT 1", array($this->database->escape($data['user_id']), $this->database->escape($data['email'])));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function updateUser($data)
	{
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET title = ?, `firstname` = ?, `lastname` = ?, `mobile` = ?, 
		`dob` = ?, `gender` = ?, 
		`is_patient_have_any_disabilities` = ?, `disabilities_details` = ?, `special_requirements` = ?, 
		`address` = ?, `nhs_patient_number` = ?, `nhs_hospital_number` = ?, `gp_practice` = ?, `gp_address` = ?, `history` = ?, `other` = ?, 
		`how_the_account_is_to_be_settled` = ?, `policyholders_name` = ?, `medical_insurers_name` = ?, `membership_number` = ?, `scheme_name` = ?, `authorisation_number` = ?, 
		`corporate_company_scheme` = ?, `employer` = ?
		WHERE `id` = ? AND `email` = ?", 
		array($this->database->escape($data['title']), $this->database->escape(ucfirst($data['firstname'])), $this->database->escape(ucfirst($data['lastname'])), $this->database->escape($data['mobile']), 
		$this->database->escape($data['dob']), $this->database->escape($data['gender']), 
		$this->database->escape($data['is_patient_have_any_disabilities']), $this->database->escape($data['disabilities_details']), $data['special_requirements'], 
		$data['address'], $data['nhs_patient_number'], $data['nhs_hospital_number'], $data['gp_practice'], $data['gp_address'], $data['history'], $data['other'], 
		$data['how_the_account_is_to_be_settled'], $data['policyholders_name'], $data['medical_insurers_name'], $data['membership_number'], $data['scheme_name'], 
		$data['authorisation_number'], $data['corporate_company_scheme'], $data['employer'], 
		(int)$data['user_id'], $this->database->escape($data['email'])));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getPassword($data)
	{
		$query = $this->database->query("SELECT `firstname`, `lastname`, `email`, `password` FROM `" . DB_PREFIX . "patients` WHERE `id` = ? AND `email` = ? LIMIT 1", array($this->database->escape($data['user_id']), $this->database->escape($data['email'])));
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

	public function updatePassword($data)
	{
		$passwordhash = password_hash($data['new'], PASSWORD_DEFAULT);
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `password` = ? WHERE `email` = ? AND `id` = ?", array($this->database->escape($passwordhash), $this->database->escape($data['email']), (int)$data['user_id']));

		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
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

	public function getGpPractice(){
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "gp_practice` WHERE is_active = 'Y'");
		$gp_practice_arr = array();
		if(isset($query->rows) AND !empty($query->rows)){
			foreach($query->rows as $row){
				$gp_practice_arr[$row['id']] = $row['gp_practice_name'];
			}
		}
		
		return $gp_practice_arr;
	}
    public function updatePatientDDIDocument($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `ddi_image` = ? WHERE `id` = ?", array($data['ddi_image'], (int)$data['id']));

    }


    public function deletePatientDDIDocument($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `ddi_image` = ? WHERE `id` = ?", array(null, (int)$data['id']));
    }

    public function checkUserRole($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "users` WHERE `user_role` = ".$id);

        if ($query->num_rows > 0) {
            return $query->row;
        } else{
            return false;
        }
    }
}