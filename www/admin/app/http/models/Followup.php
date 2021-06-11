<?php

/**
 * OpticianReferral Model
 */
class Followup extends Model
{
    public function getFollowup($data)
    {

        if ($data['role'] == constant('DASHBOARD_NOT_SHOW')[0]) {

            if ($data['period']['status'] == null) {
                $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE payment_status ='PAID' AND followup_status != 'NEW' AND created_at  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' ORDER BY created_at DESC ");
            } else {
                $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE payment_status ='PAID' AND followup_status != 'NEW' AND created_at  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' AND followup_status = '" . $data['period']['status'] . "' ORDER BY created_at DESC ");
            }
        } elseif ($data['role'] == constant('DASHBOARD_NOT_SHOW')[1]) {


            if ($data['period']['status'] == null) {

                $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE created_at  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' AND optician_id ='" . $data['id'] . "' AND payment_status = 'PAID' ORDER BY created_at DESC ");

            } else {

                $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE created_at  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' AND optician_id ='" . $data['id'] . "' AND payment_status = 'PAID' AND followup_status = '" . $data['period']['status'] . "' ORDER BY created_at DESC ");

            }
        } else {
            if ($data['period']['status'] == null) {

                $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id  WHERE created_at  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' ORDER BY created_at DESC ");
            } else {
                $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id  WHERE created_at  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' AND payment_status = '" . $data['period']['status'] . "' ORDER BY created_at DESC ");
            }
        }

        return $query->rows;
    }


    public function allFollowup()
    {
        $query = $this->database->query("Select * From `" . DB_PREFIX . "followup_appointment` ORDER BY created_at DESC ");
        return $query->rows;
    }

    public function updateFollowup($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "followup_appointment` SET `payment_status` = ?,`created_at` = ? WHERE `id` = ?", array($this->database->escape($data['status']), date('Y-m-d H:i:s'), $data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function updateFollowupStatus($data)
    {

        if (isset($data['hospitalcode'])) {
            $query = $this->database->query("UPDATE `" . DB_PREFIX . "followup_appointment` SET `followup_status` = ?,`modified_at` = ?,`hospital_code` = ? WHERE `id` = ?", array($this->database->escape($data['status']), date('Y-m-d H:i:s'), $data['hospitalcode'], $data['id']));

        } else {
            $query = $this->database->query("UPDATE `" . DB_PREFIX . "followup_appointment` SET `followup_status` = ?,`modified_at` = ? WHERE `id` = ?", array($this->database->escape($data['status']), date('Y-m-d H:i:s'), $data['id']));
        }
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function getFollowupByID($id)
    {
        $query = $this->database->query("Select f.*,p.email,p.title,p.firstname,p.lastname,p.nhs_patient_number,p.address,p.mobile,p.hospital_code From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE f.id = " . $id);

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function createFollowup($data)
    {

        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "followup_appointment` (`patient_id`,`optician_id`,`due_date`,`created_at`) VALUES (?,?,?,?)", array($this->database->escape($data['patient_id']), $data['optician_id'], $data['due_date'], date('Y-m-d H:i:s')));

        if ($query->num_rows > 0) {
            return $this->database->last_id();;
        } else {
            return false;
        }
    }

    public function deleteFollowup($id)
    {
        $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "followup_appointment` WHERE `id` = ?", array((int)$id));
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getOpticianReferralDocumnet($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "referral_list_document` WHERE `followup_id` =" . $id);
        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }

}