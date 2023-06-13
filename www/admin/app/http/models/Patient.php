<?php

/**
 * Patient.php
 */
class Patient extends Model
{
    public function getPatients($period, $doctor = NULL, $role)
    {
        /*if ($doctor) {
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
				$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE status = 1 ORDER BY `date_of_joining` DESC");
            return $query->rows;
        }*/
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients`  ORDER BY `date_of_joining` DESC");
        return $query->rows;
    }

    public function getPatient($id, $doctor = NULL)
    {
        /*if ($doctor) {
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
        }*/
        $query = $this->database->query("SELECT *, TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age FROM `" . DB_PREFIX . "patients` WHERE `id` = ? ORDER BY `date_of_joining` DESC", array($id));
        return $query->row;
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
        //$query = $this->database->query("SELECT a.*, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS doctor, d.picture FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id WHERE a.patient_id = ? OR a.email = ? ORDER BY `date` DESC LIMIT 20", array($data['id'], $data['email']));
        $query = $this->database->query("SELECT a.*, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS doctor, d.picture FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id WHERE a.patient_id = ? ORDER BY `date` DESC LIMIT 20", array($data['id']));
        return $query->rows;
    }

    //Added 10-02-2022 To get completed appointment 
    public function getAppointmentsCompleted($data)
    {
        //$query = $this->database->query("SELECT a.*, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS doctor, d.picture FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id WHERE a.status ='5' AND a.patient_id = ? OR a.email = ? ORDER BY `date` DESC LIMIT 20", array($data['id'], $data['email']));
        $query = $this->database->query("SELECT a.*, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS doctor, d.picture FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id WHERE a.status ='5' AND a.patient_id = ? ORDER BY `date` DESC LIMIT 20", array($data['id']));

        return $query->rows;
    }

    public function getPrescriptions($data)
    {
        //$query = $this->database->query("SELECT p.*, CONCAT(title, '', firstname, ' ', lastname) AS doctor, d.picture AS d_picture FROM `" . DB_PREFIX . "prescription` AS p LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = p.doctor_id WHERE p.email = ? OR p.patient_id = ? ORDER BY `date_of_joining` DESC LIMIT 20", array($data['email'], $data['id']));
        $query = $this->database->query("SELECT p.*, CONCAT(title, '', firstname, ' ', lastname) AS doctor, d.picture AS d_picture FROM `" . DB_PREFIX . "prescription` AS p LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = p.doctor_id WHERE p.patient_id = ? ORDER BY `date_of_joining` DESC LIMIT 20", array($data['id']));

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
        $query = $this->database->query("SELECT i.* FROM `" . DB_PREFIX . "invoice` AS i WHERE i.patient_id = ? ORDER BY i.date_of_joining DESC LIMIT 20", array($data['id']));
        return $query->rows;
    }

    public function getDocuments($data)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "reports` WHERE patient_id = ? ORDER BY date_of_joining DESC", array($data['id']));
        return $query->rows;
    }

    public function checkPatientForDuplicate($data, $id = NULL)
    {
        if (!empty($id)) {
            $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE `firstname` = ? AND `lastname` = ? AND `dob` = ? AND id != ?", array($this->database->escape($data['firstname']), $this->database->escape($data['lastname']), $this->database->escape(date("Y-m-d", strtotime($data['dob']))), (int)$id));
        } else {
            //echo sprintf("SELECT * FROM `" . DB_PREFIX . "patients` p WHERE `firstname` = %s AND `lastname` = %s AND `dob` = %s", $this->database->escape($data['firstname']), $this->database->escape($data['lastname']),$this->database->escape(date("Y-m-d", strtotime($data['dob']))));
            $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` p WHERE `firstname` = ? AND `lastname` = ? AND `dob` = ?", array($this->database->escape($data['firstname']), $this->database->escape($data['lastname']), $this->database->escape(date("Y-m-d", strtotime($data['dob'])))));
        }
        if ($query->num_rows > 0) {
            if (isset($data['return_type']) and $data['return_type'] == 'record') {
                return $query->row;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function checkPatientEmail($mail, $id = NULL)
    {
        if (!empty($id)) {
            $query = $this->database->query("SELECT count(*) AS total, id FROM `" . DB_PREFIX . "patients` WHERE `email` = ? AND id != ?", array($this->database->escape($mail), (int)$id));
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

        $required_kets = ['title', 'firstname', 'lastname', 'dob', 'gender', 'nhs_patient_number', 'mail', 'mobile', 'office_phone',
            'gp_name', 'gp_practice', 'gp_address', 'gp_postal_code', 'gp_email', 'optician_name', 'optician_email', 'optician_address',
            'third_party_name','third_party_email','third_party_address','address', 'history', 'other', 'hash', 'user_id', 'hospital_code', 'office_number'];
        foreach ($required_kets as $key) {
            $data[$key] = isset($data[$key]) ? $data[$key] : '';
        }

        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "patients` (
            `title`, `firstname`, `lastname`, `dob`, 
            `gender`, `nhs_patient_number`, `email`, `mobile`,
            `office_number`, 
            `gp_name`, `gp_practice`, `gp_address`, `gp_postal_code`, `gp_email`, 
            `optician_name`, `optician_email`, `optician_address`,
            `third_party_name`, `third_party_email`, `third_party_address`,
            `address`, 
            `history`, `other`,
            `temp_hash`, `user_id`, `hospital_code`, `date_of_joining`, `status` ) 
        VALUES (
            ?, ?, ?, ?,
            ?, ?, ?, ?,
            ?, 
            ?, ?, ?, ?,?,
            ?, ?, ?,
            ?, ?, ?,
            ?, 
            ?, ?,
            ?, ?, ?, ?, ?)",
            array(
                $data['title'], ucfirst($data['firstname']), ucfirst($data['lastname']), date("Y-m-d", strtotime($data['dob'])),
                $data['gender'], $data['nhs_patient_number'], $data['mail'], $data['mobile'],
                $data['office_number'],
                $data['gp_name'], $data['gp_practice'], $data['gp_address'], $data['gp_postal_code'], $data['gp_email'],
                $data['optician_name'], $data['optician_email'], $data['optician_address'],
                $data['third_party_name'], $data['third_party_email'], $data['third_party_address'],
                $data['address'],
                $data['history'], $data['other'],
                $data['hash'], $data['user_id'], $data['hospital_code'], date('Y-m-d H:i:s'), 1)
        );

        if ($this->database->error()) {
            return false;
        } else {
            return $this->database->last_id();
        }
    }
    public function createPatientFromReferral($data)
    {


        $required_kets = ['firstname', 'lastname', 'dob', 'mobile', 'optician_name', 'optician_email', 'optician_address','user_id', 'hospital_code'];
        foreach ($required_kets as $key) {
            $data[$key] = isset($data[$key]) ? $data[$key] : '';
        }

        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "patients` (
            `firstname`, `lastname`, `dob`,  `mobile`, 
            `optician_name`, `optician_email`, `optician_address`, `user_id`, 
            `hospital_code`, date_of_joining) 
        VALUES (
            ?, ?, ?, ?, 
            ?, ?, ?, ?, 
            ?, ?)",
            array(
               ucfirst($data['firstname']), ucfirst($data['lastname']), date("Y-m-d", strtotime($data['dob'])), $data['mobile'], 
                $data['optician_name'], $data['optician_email'], $data['optician_address'], $data['user_id'], 
                $data['hospital_code'], date('Y-m-d H:i:s')
            )
        );

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
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET
         `title` = ?, `firstname` = ?, `lastname` = ?, `email` = ?,
         `mobile` = ?,`office_number` = ?, `dob` = ?, `gender` = ?,
		`address` = ?, `nhs_patient_number` = ?, `gp_name` = ?, `gp_practice` = ?,
		`gp_address` = ?, `gp_postal_code` = ?, `gp_email` = ?, `history` = ?, `other` = ?,
		`regular_payment` = ?, `how_the_account_is_to_be_settled` = ?,  `policyholders_name` = ?,  `medical_insurers_name` = ?,
	    `membership_number` = ?, `scheme_name` = ?, `authorisation_number` = ?, `authorisation_number` = ?, 
		`corporate_company_scheme` = ?, `employer` = ?, `optician_name` = ?,  `optician_email` = ?,
        `optician_address` = ?,`third_party_name` = ?,  `third_party_email` = ?,
        `third_party_address` = ?, `note` = ?, `status` = ? 
		WHERE `id` = ?",
            array(
                $this->database->escape($data['title']),
                $this->database->escape(ucfirst($data['firstname'])),
                $this->database->escape(ucfirst($data['lastname'])),
                $data['mail'],
                $data['mobile'],
                $data['office_phone'],
                $this->database->escape($data['dob']),
                $this->database->escape($data['gender']),
                $data['address'], $data['nhs_patient_number'],
                $data['gp_name'],
                $data['gp_practice'],
                $data['gp_address'],
                $data['gp_postal_code'],
                $data['gp_email'],
                $data['history'],
                $data['other'],
                $data['regular_payment'],
                isset($data['how_the_account_is_to_be_settled']) ? $data['how_the_account_is_to_be_settled'] : '',
                isset($data['policyholders_name']) ? $data['policyholders_name'] : '',
                isset($data['medical_insurers_name']) ? $data['medical_insurers_name'] : '',
                isset($data['membership_number']) ? $data['membership_number'] : '',
                isset($data['scheme_name']) ? $data['scheme_name'] : '',
                isset($data['authorisation_number']) ? $data['authorisation_number'] : '',
                isset($data['authorisation_number']) ? $data['authorisation_number'] : null,
                isset($data['corporate_company_scheme']) ? $data['corporate_company_scheme'] : null,
                isset($data['employer']) ? $this->database->escape($data['employer']) : null,
                isset($data['optician_name']) ? $data['optician_name'] : '',
                isset($data['optician_email']) ? $data['optician_email'] : '',
                isset($data['optician_address']) ? $data['optician_address'] : '',
                isset($data['third_party_name']) ? $data['third_party_name'] : '',
                isset($data['third_party_email']) ? $data['third_party_email'] : '',
                isset($data['third_party_address']) ? $data['third_party_address'] : '',
                isset($data['note']) ? $data['note'] : '',
                isset($data['status']) ? $data['status'] : '1',
                (int)$data['id']));

        //$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `firstname` = ?, `lastname` = ?, `email` = ?, `mobile` = ?, `address` = ?, `bloodgroup` = ?, `gender` = ?, `dob` = ?, `history` = ?, `other` = ?, `status` = ? WHERE `id` = ?" , array($data['firstname'], $data['lastname'], $data['mail'], $data['mobile'], $data['address'],$data['bloodgroup'], $data['gender'], $data['dob'], $data['history'], $data['other'], $data['status'], $data['id']));
    }

    public function updatePatientEmailAndMobile($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET
            `email` = ?, `mobile` = ? WHERE `id` = ?",
            array(
                $this->database->escape($data['mail']),
                $this->database->escape($data['mobile']),
                (int)$data['id']
            )
        );
    }

    public function updatePatientFromReferral($data)
    {

        $query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET
         `title` = ?, `firstname` = ?, `lastname` = ?, `email` = ?,
         `mobile` = ?,`office_number` = ?, `dob` = ?, `gender` = ?,
		`address` = ?,  `optician_name` = ?,  `optician_email` = ?,
        `optician_address` = ?, `hospital_code` = ?
		WHERE `id` = ?",
            array(
                $this->database->escape($data['title']),
                $this->database->escape(ucfirst($data['firstname'])),
                $this->database->escape(ucfirst($data['lastname'])),
                $data['mail'],
                $data['mobile'],
                $data['office_number'],
                $this->database->escape($data['dob']),
                $this->database->escape($data['gender']),
                $data['address'],
                isset($data['optician_name']) ? $data['optician_name'] : '',
                isset($data['optician_email']) ? $data['optician_email'] : '',
                isset($data['optician_address']) ? $data['optician_address'] : '',
                isset($data['hospital_code']) ? $data['hospital_code'] : '',
                (int)$data['id']));

        if ($this->database->error()) {
            echo $this->database->error();
            print_r($data);
            exit;
            return false;
        } else {
            return $this->database->last_id();
        }


    }

    public function updatePatientMERCStatus($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `is_glaucoma_required` = ?,`gcp_followup_frequency` = ?
		WHERE `id` = ?", array($this->database->escape($data['is_glaucoma_required']), $data['gcp_followup_frequency'], (int)$data['id']));

        //$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `firstname` = ?, `lastname` = ?, `email` = ?, `mobile` = ?, `address` = ?, `bloodgroup` = ?, `gender` = ?, `dob` = ?, `history` = ?, `other` = ?, `status` = ? WHERE `id` = ?" , array($data['firstname'], $data['lastname'], $data['mail'], $data['mobile'], $data['address'],$data['bloodgroup'], $data['gender'], $data['dob'], $data['history'], $data['other'], $data['status'], $data['id']));
    }

    public function getSearchedPatient($data, $role = null)
    {
        /*if ($role == constant('USER_ROLE')[2]) {
            $query = $this->database->query("SELECT id, CONCAT(title, ' ', firstname, ' ', lastname) AS label, email, mobile FROM `" . DB_PREFIX . "patients` WHERE firstname like '%" . $data . "%' AND is_glaucoma_required = 'YES' LIMIT 5");

        } else {
            $query = $this->database->query("SELECT id, CONCAT(title, ' ', firstname, ' ', lastname) AS label, email, mobile FROM `" . DB_PREFIX . "patients` WHERE firstname like '%" . $data . "%' LIMIT 5");
        }*/

        $query = $this->database->query("SELECT id, CONCAT(title, ' ', firstname, ' ', lastname) AS label, email, mobile, dob FROM `" . DB_PREFIX . "patients` WHERE firstname like '%" . $data . "%' OR lastname like '%" . $data . "%' LIMIT 15");
        return $query->rows;
    }

    public function getPatientByName($data, $role = null)
    {
        //$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE firstname like '%" . $data . "%' OR lastname like '%" . $data . "%' LIMIT 15");
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE concat(firstname, ' ', lastname) like '%" . $data . "%' LIMIT 15");
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
        if (!empty($data['gp_practice'])) {
            $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "gp_practice` WHERE `gp_practice_name` = ?", array($data['gp_practice']));

            if ($query->num_rows > 0) {
                return $query->row['id'];
            } else {
                $this->database->query("INSERT INTO `" . DB_PREFIX . "gp_practice` (`gp_practice_name`, `gp_name`,`gp_email`,`address`,`gp_postcode`, `is_active`) VALUES(?,?,?,?,?)", array($data['gp_practice'], $data['gp_name'], $data['gp_email'], $data['gp_address'], $data['gp_postal_code'], 'Y'));
                return $this->database->last_id();
            }
        }
        return 0;
    }

    public function isPatientReferredByOptician($id)
    {
        if (!empty($id)) {
            $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "referral_list` WHERE `patient_id` = ?", array($id));

            if ($query->num_rows > 0) {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function getDuplicatePatient()
    {
        $query = $this->database->query("SELECT `firstname`, `lastname`, `dob`, COUNT(*)
 AS total_patient, GROUP_CONCAT(id)
 AS ids  FROM `kk_patients` GROUP BY `firstname`, `lastname`, `dob` HAVING total_patient > 1");
        return $query->rows;
    }

    public function checkDuplicatePatientByIds($patient_ids)
    {
        $query = $this->database->query("SELECT `firstname`, `lastname`, `dob`, COUNT(*)
 AS total_patient, GROUP_CONCAT(id)
 AS ids  FROM `kk_patients` WHERE `id` IN (" . $patient_ids . ") GROUP BY `firstname`, `lastname`, `dob` HAVING total_patient > 1");

        if (count($query->rows) != 0) {
            $update_patient_id = explode(',',$patient_ids);

            $this->database->query("UPDATE `kk_appointments` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_appointment_notes` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_appointments` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_followup_appointment` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_invoice` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_medicine_bill` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_opt_invoice` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_patient_doctor` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_payments` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_prescription` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_referral_list` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_reports` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_request` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));
            $this->database->query("UPDATE `kk_video_consultation_session` SET patient_id = ? WHERE `patient_id` IN (" . $patient_ids . ")",array($update_patient_id[0]));

            array_shift($update_patient_id);

            $this->database->query("DELETE FROM `kk_patients` WHERE id IN (" .implode(',',$update_patient_id) . ")");

            return true;
        }
        return false;
    }
}