<?php 

/**
* Report
*/
class Referrallistdocument extends Model
{
	public function createReferralListDocument($data)
	{
	    if(!empty($data['followup_id']))
        {
            $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "referral_list_document` (`followup_id`,`name`, `filename`,`created_at`, `created_by`) VALUES (?,?,?,?,?) ", array($this->database->escape($data['followup_id']), $this->database->escape($data['name']),$this->database->escape($data['file_name']),date('Y-m-d H:i:s'), (int)$data['user_id']));

        }else{
            $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "referral_list_document` (`referral_list_id`,`name`, `filename`,`created_at`, `created_by`) VALUES (?,?,?,?,?) ", array($this->database->escape($data['id']), $this->database->escape($data['name']),$this->database->escape($data['file_name']),date('Y-m-d H:i:s'), (int)$data['user_id']));
        }
		return $query->row;
	}


	public function deleteReferralListDocument($data)
	{
	    if(!empty($data['referral_list_id']))
        {
            $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "referral_list_document` WHERE `filename` = ? AND `referral_list_id` = ?" , array($this->database->escape($data['filename']), (int)$data['referral_list_id']));
        }else{
            $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "referral_list_document` WHERE `filename` = ? AND `followup_id` = ?" , array($this->database->escape($data['filename']), (int)$data['followup_id']));
        }

	}
}