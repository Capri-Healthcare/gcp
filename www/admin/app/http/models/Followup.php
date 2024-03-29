<?php

/**
 * OpticianReferral Model
 */
class Followup extends Model
{
    public function getFollowup($data)
    {
        $status = '';
        if($data['role'] == constant('USER_ROLE_DOCTOR')){
            if ($data['period']['status'] == constant('STATUS_ALL')) {
                $followup_status = implode("','", array_keys(constant('STATUS_DOCTOR_FOLLOWUP')));
            }else{
                $followup_status = $data['period']['status'];
            }
        }else{
            if ($data['period']['status'] == constant('STATUS_ALL')) {
                if ($data['role'] == constant('USER_ROLE_MED')) {
                    $status = implode("','", array_keys(constant('FOLLOWUP_MED_SEC_STATUS')));
                } elseif ($data['role'] == constant('USER_ROLE_MERC')) {
                    $status = implode("','", array_keys(constant('STATUS_PAYMENT')));
                } elseif ($data['role'] == constant('USER_ROLE_OPTOMETRIST')) {
                    $status = implode("','", array_keys(constant('FOLLOWUP_OPTICIAN_STATUS')));
                } else {
                    //exit;
                    //$status = $data['period']['status'];
                    $status = implode("','", array_keys(constant('FOLLOWUP_OPTICIAN_STATUS')));
                }
            } else {
                $status = $data['period']['status'];
            }
        }

        // Med Sec Query
        if ($data['role'] == constant('USER_ROLE_MED')) {
            $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE ((payment_status ='PAID' AND followup_status != 'NEW') OR followup_status = 'NON_MERC_FOLLOWUP') AND followup_status IN ('".$status."') AND due_date  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' ORDER BY due_date DESC ");
        } // Optician Query
        elseif ($data['role'] == constant('USER_ROLE_OPTOMETRIST')) {
            $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE due_date  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' AND optician_id ='" . $data['id'] . "' AND payment_status = 'PAID' AND followup_status IN ('" . $status . "') ORDER BY due_date DESC ");
        } // MERCAND ADMIN Query
        elseif ($data['role'] == constant('USER_ROLE_MERC')) {
            // $query = $this->database->query("Select f.*,a.is_glaucoma_required,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id JOIN  `" . DB_PREFIX . "appointments` AS a ON f.appointment_id = a.id WHERE f.due_date  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' AND f.payment_status IN ('" . $status . "') AND f.followup_status != '" . constant('STATUS_FOLLOWUP_IN_QUEUE') . "' AND a.is_glaucoma_required != 'NO'  ORDER BY f.due_date DESC ");
            $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE f.due_date  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' AND f.payment_status IN ('" . $status . "') AND f.followup_status != '" . constant('STATUS_FOLLOWUP_IN_QUEUE') . "'  ORDER BY f.due_date DESC ");
        } elseif ($data['role'] == constant('USER_ROLE_DOCTOR')) {
            $query = $this->database->query("Select f.*,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE f.due_date  between '" . $data['period']['start'] . "' AND '" . $data['period']['end'] . "' AND f.followup_status IN ('" . $followup_status . "') ORDER BY f.due_date DESC ");
        } else {
            // $query = $this->database->query("Select f.*,a.is_glaucoma_required,CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id JOIN  `" . DB_PREFIX . "appointments` AS a ON f.appointment_id = a.id WHERE f.due_date  between '" . $data['period']['start'] . "' AND '" . $data['period']['end']."'  ORDER BY f.due_date DESC ");
            $query = $this->database->query("Select f.*, CONCAT(p.firstname, ' ', p.lastname) AS patient_name ,p.email,p.mobile,p.dob,p.gender From `" . DB_PREFIX . "followup_appointment` as f JOIN  `" . DB_PREFIX . "patients` AS p ON f.patient_id = p.id WHERE f.due_date  between '" . $data['period']['start'] . "' AND '" . $data['period']['end']."' AND f.followup_status IN ('" . $status . "')   ORDER BY f.due_date DESC ");
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

    public function updateFollowupAppointmentID($data){
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "followup_appointment` SET `appointment_id` = ?, `followup_status` = ? WHERE `id` = ?", array($data['appointment_id'], $data['followup_status'], $data['id']));
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

    public function getOpticianDetailsByFollowupID($id)
    {
        $query = $this->database->query("Select f.*, u.email, u.firstname, u.lastname, u.address, u.mobile From `" . DB_PREFIX . "followup_appointment` as f LEFT JOIN `" . DB_PREFIX . "users` AS u ON f.optician_id = u.user_id WHERE f.id = " . $id);

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function createFollowup($data)
    {
        // print_r($data);exit;

        // $query = $this->database->query("Select * From `" . DB_PREFIX . "followup_appointment` WHERE appointment_id = " . $data['appointment_id']);
        // $query = $this->database->query("Select * From `" . DB_PREFIX . "followup_appointment` WHERE id = " . $data['id']);
        
        if ($data['id'] != NULL) {
            $query = $this->database->query("UPDATE `" . DB_PREFIX . "followup_appointment` SET `appointment_id` = ?,`patient_id` = ? ,`optician_id` = ? ,`due_date` = ?, `payment_status` = ?,`followup_status` = ? WHERE `id` = ?", array($this->database->escape($data['appointment_id']), $this->database->escape($data['patient_id']), $this->database->escape($data['optician_id']), $this->database->escape($data['due_date']), $data['payment_status'], $data['followup_status'], $data['id']));
            return $data['id'];
        } else {
            
            $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "followup_appointment` (`patient_id`,`optician_id`,`due_date`,`created_at`,`appointment_id`, `payment_status`, `followup_status`) VALUES (?,?,?,?,?,?,?)", array($this->database->escape($data['patient_id']), $data['optician_id'], $data['due_date'], date('Y-m-d H:i:s'), $data['appointment_id'], $data['payment_status'],$data['followup_status']));
            return $this->database->last_id();
        }
    }

    public function checkFollowupAppointment($data)
    {

        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "followup_appointment` (`patient_id`,`optician_id`,`due_date`,`created_at`) VALUES (?,?,?,?)", array($this->database->escape($data['patient_id']), $data['optician_id'], $data['due_date'], date('Y-m-d H:i:s')));
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