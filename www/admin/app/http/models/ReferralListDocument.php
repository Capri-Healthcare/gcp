<?php 

/**
* Report
*/
class ReferralListDocument extends Model
{
	public function createReferralListDocument($data)
	{
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "referral_list_document` (`referral_list_id`,`name`, `filename`, `created_by`) VALUES (?, ?, ?,?) ", array($this->database->escape($data['id']), $this->database->escape($data['name']),$this->database->escape($data['file_name']), (int)$data['user_id']));
		return $query->row;
	}


	public function deleteReferralListDocument($data)
	{
        $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "referral_list_document` WHERE `filename` = ? AND `referral_list_id` = ?" , array($this->database->escape($data['filename']), (int)$data['referral_list_id']));

	}
}