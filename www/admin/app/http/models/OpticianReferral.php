<?php

/**
 * OpticianReferral Model
 */
class OpticianReferral extends Model
{
    public function getOpticianReferrals($period)
    {
        $query = $this->database->query("Select * From `" . DB_PREFIX . "referral_list` WHERE created_at  between '".$period['start']."' AND '".$period['end']."' ORDER BY created_at DESC");

        return $query->rows;
    }

    public function allOpticianReferral()
    {
        $query = $this->database->query("Select * From `" . DB_PREFIX . "referral_list` ORDER BY created_at DESC ");
        return $query->rows;
    }

    public function updateOpticianReferral($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "referral_list` SET `first_name` = '".$this->database->escape($data['first_name'])."',  `last_name` = '".$this->database->escape($data['last_name'])."', `dob` = '".date("Y-m-d", strtotime($data['dob']))."', `address1` = '".$this->database->escape($data['address_1'])."', `address2` = '".$this->database->escape($data['address_2'])."',`city` ='".$this->database->escape($data['city'])."',`updated_by` = '".$this->database->escape($data['user_id'])."',`zip_code` = '".$this->database->escape($data['zip_code']).",`updated_at` = '".date('Y-m-d H:i:s')."' WHERE `id` =".$data['id']);

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
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "referral_list` (`first_name`, `last_name`, `dob`, `address1`, `address2`, `city`, `zip_code`,`created_by`,`created_at`) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)", array($this->database->escape($data['first_name']), $data['last_name'], date("Y-m-d", strtotime($data['dob'])), $this->database->escape($data['address_1']), $this->database->escape($data['address_2']), $this->database->escape($data['city']), $this->database->escape($data['zip_code']), $this->database->escape($data['user_id']),date('Y-m-d H:i:s')));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
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