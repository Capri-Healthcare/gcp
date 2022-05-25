<?php

/**
 * OpticianReferral Model
 */
class Opticianreferral extends Model
{
    public function getOpticianReferrals($period, $id, $role)
    {
        $status = '';

        if ($period['status'] == constant('STATUS_ALL')) {

            if ($role == constant('USER_ROLE_MED')) {
                $status = implode("','", array_keys(constant('REFERRAL_MED_SEC_STATUS')));
            } else {
                $status = implode("','", array_keys(constant('REFERRAL_OPTICIAN_STATUS')));
            }
        } else {
            $status =  $period['status'];
        }

        if ($role == constant('USER_ROLE_OPTOMETRIST')) {

            $query = $this->database->query("Select r.* ,CONCAT(u.firstname, ' ', u.lastname) AS optician_name  From `" . DB_PREFIX . "referral_list` AS r LEFT  JOIN `" . DB_PREFIX . "users` AS u ON r.created_by = u.user_id WHERE created_at  between '" . $period['start'] . "' AND '" . $period['end'] . "' AND created_by = '" . $id . "' AND r.status IN ('" .$status . "') ORDER BY created_at DESC ,status ASC");


        } else {
            $query = $this->database->query("Select r.* ,CONCAT(u.firstname, ' ', u.lastname) AS optician_name  From `" . DB_PREFIX . "referral_list` AS r LEFT  JOIN `" . DB_PREFIX . "users` AS u ON r.created_by = u.user_id WHERE created_at  between '" . $period['start'] . "' AND '" . $period['end'] . "' AND r.status IN ('" . $status. "') ORDER BY created_at DESC ,status ASC");


        }

        return $query->rows;
    }


    public function allOpticianReferral()
    {
        $query = $this->database->query("Select * From `" . DB_PREFIX . "referral_list` ORDER BY created_at DESC ");
        return $query->rows;
    }

    public function updateOpticianReferral($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "referral_list` SET `first_name` = ?,  `last_name` = ?,`mobile` = ?,`office_phone` = ?,`email` = ?,`gender`= ?, `dob` = ?, `address1` = ?, `address2` = ?, `city` = ?, `updated_by` = ?, `zip_code` = ?,`status` = ?,`hospital_code`= ?,`updated_at` = ? WHERE `id` = ?", array($this->database->escape($data['first_name']), $this->database->escape($data['last_name']), $this->database->escape($data['mobile']), $this->database->escape($data['office_phone']), $this->database->escape($data['email']), $this->database->escape($data['gender']), date("Y-m-d", strtotime($data['dob'])), $this->database->escape($data['address_1']), $this->database->escape($data['address_2']), $this->database->escape($data['city']), $this->database->escape($data['user_id']), $this->database->escape($data['zip_code']), $this->database->escape($data['status']), $data['status'] != constant('STATUS_ACCEPTED') ? null : $this->database->escape($data['hospital_code']), date('Y-m-d H:i:s'), $data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function updatePatientID($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "referral_list` SET `patient_id` = ? WHERE `id` = ?", array($data['patientid'], $data['referral']['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function updateReferralHospitalCode($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "referral_list` SET `hospital_code` = ? WHERE `id` = ?", array($data['hospital_code'], $data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function getOpticianReferral($id)
    {
        $query = $this->database->query("Select * From `" . DB_PREFIX . "referral_list` WHERE id = " . $id);

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function updateStatus($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "referral_list` SET `status` = ?,`updated_at` = ? WHERE `id` = ?", array($this->database->escape($data['status']), date('Y-m-d H:i:s'), $data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function createOpticianReferral($data)
    {
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "referral_list` (`first_name`, `last_name`,`mobile`,
		`office_phone`,`email`,`gender`, `dob`, 
		`address1`, `address2`, `city`, `zip_code`,
		`created_by`,`created_at`) VALUES 
		(?,?,?,
		?,?,?,?,
		?,?,?,?,?,?)", array(
		$this->database->escape($data['first_name']), $data['last_name'], 
		$this->database->escape($data['mobile']), 
		
		$this->database->escape($data['office_phone']), $this->database->escape($data['email']),
		$this->database->escape($data['gender']), date("Y-m-d", strtotime($data['dob'])), 
		
		$this->database->escape($data['address_1']), $this->database->escape($data['address_2']), $this->database->escape($data['city']), $this->database->escape($data['zip_code']), 
		
		$this->database->escape($data['user_id']), date('Y-m-d H:i:s')));

        if ($query->num_rows > 0) {
            return $this->database->last_id();
        } else {
            return $query->row;
        }
    }

    public function deleteOpticianReferral($id)
    {
        $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "referral_list` WHERE `id` = ?", array((int)$id));
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getOpticianReferralDocumnet($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "referral_list_document` WHERE `referral_list_id` =" . $id);
        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }

    public function getOpticianReferralPatient($id)
    {
        $query = $this->database->query("Select f.id , p.id AS patient_id,p.firstname,p.lastname From `" . DB_PREFIX . "followup_appointment` AS f JOIN `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE f.optician_id = '" . $id . "' AND f.followup_status = 'ACCEPTED' AND f.optician_invoice_id IS NULL ORDER BY f.created_at DESC");

        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }
    public function validateReferral($data)
    {
        $query = $this->database->query("Select * From `" . DB_PREFIX . "referral_list` WHERE first_name  = '" . $data['first_name'] . "' AND last_name = '" . $data['last_name'] . "' AND dob = '" . date("Y-m-d", strtotime($data['dob'])) . "'");

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
