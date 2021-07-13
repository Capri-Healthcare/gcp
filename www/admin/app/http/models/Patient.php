<?php

/**
 * Patient.php
 */
class Patient extends Model
{
    public function getPatients($period, $doctor = NULL, $role)
    {
        if ($doctor) {
            $data = $this->getPatientDoctorIDs($doctor);
            if (!empty($data)) {
                $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE id IN(" . implode(",", $data) . ") AND status = 1 ORDER BY `date_of_joining` DESC");
                return $query->rows;
            } else {
                return false;
            }
        } else {

            if ($role != null && $role == constant('USER_ROLE')[2]) {

                $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE status = 1 AND is_glaucoma_required = 'YES' ORDER BY `date_of_joining` DESC");

            } else {

                $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE status = 1 ORDER BY `date_of_joining` DESC");
            }

            return $query->rows;
        }
    }

    public function getPatient($id, $doctor = NULL)
    {
        if ($doctor) {
            $data = $this->getPatientDoctorIDs($doctor);
            if (!empty($data) && in_array($id, $data)) {
                $query = $this->database->query("SELECT *, TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age FROM `" . DB_PREFIX . "patients` WHERE `id` = ? ORDER BY `date_of_joining` DESC", array($id));
                return $query->row;
            } else {
                return false;
            }

        } else {
            $query = $this->database->query("SELECT *, TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age FROM `" . DB_PREFIX . "patients` WHERE `id` = ? ORDER BY `date_of_joining` DESC", array($id));
            return $query->row;
        }
    }

    public function getPatientDoctorIDs($doctor)
    {
        $ids1 = array();
        $ids2 = array();
        $query = $this->database->query("SELECT `patient_id` FROM `" . DB_PREFIX . "appointments` WHERE doctor_id = ?", array($doctor));
        if ($query->num_rows > 0) {
            $ids1 = array_column($query->rows, 'patient_id');
        }

        $query = $this->database->query("SELECT `patient_id` FROM `" . DB_PREFIX . "patient_doctor` WHERE doctor_id = ?", array($doctor));
        if ($query->num_rows > 0) {
            $ids2 = array_column($query->rows, 'patient_id');
        }

        $data = array_unique(array_merge($ids1, $ids2));

        return $data;
    }

    public function getAppointments($data)
    {
        $query = $this->database->query("SELECT a.*, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS doctor, d.picture FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id WHERE a.patient_id = ? OR a.email = ? ORDER BY `date` DESC LIMIT 20", array($data['id'], $data['email']));
        return $query->rows;
    }

    public function getPrescriptions($data)
    {
        $query = $this->database->query("SELECT p.*, CONCAT(title, '', firstname, ' ', lastname) AS doctor, d.picture AS d_picture FROM `" . DB_PREFIX . "prescription` AS p LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = p.doctor_id WHERE p.email = ? OR p.patient_id = ? ORDER BY `date_of_joining` DESC LIMIT 20", array($data['email'], $data['id']));

        return $query->rows;
    }

    public function getClinicalNotes($data)
    {
        $query = $this->database->query("SELECT an.*, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS doctor, d.picture  FROM `" . DB_PREFIX . "appointment_notes` AS an LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = an.doctor_id WHERE an.patient_id = ? OR an.email = ?",
            array((int)$data['id'], $data['email']));
        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }

    public function getInvoices($data)
    {
        $query = $this->database->query("SELECT i.* FROM `" . DB_PREFIX . "invoice` AS i WHERE i.patient_id = ? OR i.email = ? ORDER BY i.date_of_joining DESC LIMIT 20", array($data['id'], $data['email']));
        return $query->rows;
    }

    public function getDocuments($data)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "reports` WHERE patient_id = ? OR email = ? ORDER BY date_of_joining DESC", array($data['id'], $data['email']));
        return $query->rows;
    }

    public function checkPatientEmail($mail, $id = NULL)
    {
        if (!empty($id)) {
            $query = $this->database->query("SELECT count(*) AS total FROM `" . DB_PREFIX . "patients` WHERE `email` = ? AND id != ?", array($this->database->escape($mail), (int)$id));
        } else {
            $query = $this->database->query("SELECT count(*) AS total ,id FROM `" . DB_PREFIX . "patients` WHERE `email` = ? ", array($this->database->escape($mail)));
        }
        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function createPatient($data)
    {
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "patients` (`title`, `firstname`, `lastname`, `email`, `mobile`, `address`, `gender`, `dob`, `history`, `other`, `temp_hash`, `status`, `user_id`, `hospital_code`,`date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)", array($data['title'], ucfirst($data['firstname']), ucfirst($data['lastname']), $data['mail'], $data['mobile'], $data['address'], $data['gender'], $data['dob'], $data['history'], $data['other'], $data['hash'], 1, $data['user_id'],$data['hospital_code'], $data['datetime']));

        if ($this->database->error()) {
            return false;
        } else {
            return $this->database->last_id();
        }
    }

    public function createPatientDoctor($data)
    {
        $this->database->query("INSERT INTO `" . DB_PREFIX . "patient_doctor` (`patient_id`, `doctor_id`, `user_id`) VALUES (?, ?, ?)", array($data['id'], $data['user']['doctor'], $data['user']['user_id']));
    }

    public function updatePatient($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET title = ?, `firstname` = ?, `lastname` = ?, `email` = ?,`mobile` = ?, 
		`dob` = ?,
		`gender` = ?,
		`address` = ?,
		`nhs_patient_number` = ?,
		`gp_name` = ?,
		`gp_practice` = ?,
		`gp_address` = ?,
		`gp_email` = ?,
		`history` = ?,
		`other` = ?,
		`regular_payment` = ?,
	    `how_the_account_is_to_be_settled` = ?, 
	    `policyholders_name` = ?, 
	    `medical_insurers_name` = ?,
	    `membership_number` = ?,
	    `scheme_name` = ?,
	    `authorisation_number` = ?, 
		`corporate_company_scheme` = ?,
		`employer` = ?
		WHERE `id` = ?",
            array(
                $this->database->escape($data['title']),
                $this->database->escape(ucfirst($data['firstname'])),
                $this->database->escape(ucfirst($data['lastname'])),
                $data['mail'], $this->database->escape($data['mobile']),
                $this->database->escape($data['dob']),
                $this->database->escape($data['gender']),
                $data['address'], $data['nhs_patient_number'],
                $data['gp_name'],
                $data['gp_practice'],
                $data['gp_address'],
                $data['gp_email'],
                $data['history'],
                $data['other'],
                $data['regular_payment'],
                $data['how_the_account_is_to_be_settled'],
                $data['policyholders_name'],
                $data['medical_insurers_name'],
                $data['membership_number'],
                $data['scheme_name'],
                isset($data['authorisation_number']) ? $data['authorisation_number']:null,
                isset($data['corporate_company_scheme']) ? $data['corporate_company_scheme']:null,
                isset($data['employer']) ? $this->database->escape($data['employer']):null,
                (int)$data['id']));

        //$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `firstname` = ?, `lastname` = ?, `email` = ?, `mobile` = ?, `address` = ?, `bloodgroup` = ?, `gender` = ?, `dob` = ?, `history` = ?, `other` = ?, `status` = ? WHERE `id` = ?" , array($data['firstname'], $data['lastname'], $data['mail'], $data['mobile'], $data['address'],$data['bloodgroup'], $data['gender'], $data['dob'], $data['history'], $data['other'], $data['status'], $data['id']));
    }

    public function updatePatientGCPStatus($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `is_glaucoma_required` = ?,`gcp_followup_frequency` = ?
		WHERE `id` = ?", array($this->database->escape($data['is_glaucoma_required']), $data['gcp_followup_frequency'], (int)$data['id']));

        //$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `firstname` = ?, `lastname` = ?, `email` = ?, `mobile` = ?, `address` = ?, `bloodgroup` = ?, `gender` = ?, `dob` = ?, `history` = ?, `other` = ?, `status` = ? WHERE `id` = ?" , array($data['firstname'], $data['lastname'], $data['mail'], $data['mobile'], $data['address'],$data['bloodgroup'], $data['gender'], $data['dob'], $data['history'], $data['other'], $data['status'], $data['id']));
    }

    public function getSearchedPatient($data, $role = null)
    {
        if ($role == constant('USER_ROLE')[2]) {
            $query = $this->database->query("SELECT id, CONCAT(firstname, ' ', lastname) AS label, email, mobile FROM `" . DB_PREFIX . "patients` WHERE firstname like '%" . $data . "%' AND is_glaucoma_required = 'YES' LIMIT 5");

        } else {
            $query = $this->database->query("SELECT id, CONCAT(firstname, ' ', lastname) AS label, email, mobile FROM `" . DB_PREFIX . "patients` WHERE firstname like '%" . $data . "%' LIMIT 5");
        }
        return $query->rows;
    }

    public function getPatientByEmail($data)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE email = '" . $data . "'");

        return $query->row;
    }

    public function deletePatient($id)
    {
        $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "patients` WHERE `id` = ?", array((int)$id));
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAppointmentImagesByPatient($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_images` WHERE `patient_id` = ? ORDER BY created DESC", array((int)$id));
        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }

    public function getTokBoxSession($tokbox_session_id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "video_consultation_session` WHERE `id` = ? limit 1", array((int)$tokbox_session_id));
        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function getGpPractice($data)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "gp_practice` WHERE gp_practice_name like '%" . $data . "%' AND is_active = 'Y'");
        return $query->rows;
    }

    public function getALlGpPractice()
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "gp_practice` WHERE is_active = 'Y'");
        $gp_practice_arr = array();
        if (isset($query->rows) and !empty($query->rows)) {
            foreach ($query->rows as $row) {
                $gp_practice_arr[$row['id']] = $row['gp_practice_name'];
            }
            return $gp_practice_arr;
        }
    }

    public function gpPractice($data)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "gp_practice` WHERE `gp_practice_name` = ?",array($data['gp_practice']));

        if ($query->num_rows > 0) {
            return $query->row['id'];
        } else {
            $this->database->query("INSERT INTO `" . DB_PREFIX . "gp_practice` (`gp_practice_name`, `gp_name`,`gp_email`,`address`, `is_active`) VALUES(?,?,?,?,?)", array($data['gp_practice'], $data['gp_name'],$data['gp_email'],$data['gp_address'],'Y'));
            return $this->database->last_id();
        }
    }
}