<?php

/**
 * OpticianReferral Model
 */
class Opticianreferral extends Model
{
    public function getOpticianReferrals($period,$id,$role)
    {

        if(in_array($role,constant('USER_ROLE')))
        {
        $query = $this->database->query("Select r.* ,CONCAT(u.firstname, ' ', u.lastname) AS optician_name  From `" . DB_PREFIX . "referral_list` AS r LEFT  JOIN `" . DB_PREFIX . "users` AS u ON r.created_by = u.user_id WHERE created_at  between '".$period['start']."' AND '".$period['end']."' ORDER BY created_at DESC ,status ASC");

        }else{
            $query = $this->database->query("Select r.* ,CONCAT(u.firstname, ' ', u.lastname) AS optician_name  From `" . DB_PREFIX . "referral_list` AS r LEFT  JOIN `" . DB_PREFIX . "users` AS u ON r.created_by = u.user_id WHERE created_at  between '".$period['start']."' AND '".$period['end']."' AND created_by = '".$id."'  ORDER BY created_at DESC ,status ASC");

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
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "referral_list` SET `first_name` = ?,  `last_name` = ?,`mobile` = ?,`email` = ?,`gender`= ?, `dob` = ?, `address1` = ?, `address2` = ?, `city` = ?, `updated_by` = ?, `zip_code` = ?,`status` = ?,`updated_at` = ? WHERE `id` = ?", array($this->database->escape($data['first_name']), $this->database->escape($data['last_name']),$this->database->escape($data['mobile']),$this->database->escape($data['email']),$this->database->escape($data['gender']),date("Y-m-d", strtotime($data['dob'])), $this->database->escape($data['address_1']), $this->database->escape($data['address_2']), $this->database->escape($data['city']), $this->database->escape($data['user_id']), $this->database->escape($data['zip_code']),$this->database->escape($data['status']), date('Y-m-d H:i:s'), $data['id'] ));

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

    public function createOpticianReferral($data)
    {
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "referral_list` (`first_name`, `last_name`,`mobile`,`email`,`gender`, `dob`, `address1`, `address2`, `city`, `zip_code`,`created_by`,`created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)", array($this->database->escape($data['first_name']), $data['last_name'],$this->database->escape($data['mobile']),$this->database->escape($data['email']),$this->database->escape($data['gender']), date("Y-m-d", strtotime($data['dob'])), $this->database->escape($data['address_1']), $this->database->escape($data['address_2']), $this->database->escape($data['city']), $this->database->escape($data['zip_code']), $this->database->escape($data['user_id']),date('Y-m-d H:i:s')));

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
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "referral_list_document` WHERE `referral_list_id` =".$id);
        if ($query->num_rows > 0) {
            return  $query->rows;
        } else {
            return false;
        }
    }
}