<?php

/**
* 
*/
class Login extends Model
{
	public function checkUser($email)
	{
		$query = $this->database->query("SELECT `id`, `firstname`, `lastname`, `email`, `password`, `status` FROM `" . DB_PREFIX . "patients` WHERE `email` = ? LIMIT 1", array($this->database->escape($email)));
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

    public function checkAdminUser($data)
    {
        $query = $this->database->query( "SELECT `user_id`, `user_role`, `firstname`, `lastname`, `email`, `mobile`, `password`, `status` FROM `" . DB_PREFIX . "users` WHERE `email` = ? AND `user_role` = ? AND `status` = ? LIMIT 1", array($data['email'],$data['role'], 1));
        if ($query->num_rows) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function checkAttempts($email)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "login_attempts` WHERE `email` = ?", array($this->database->escape($email)));
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

	public function editHash($data)
	{
		$this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `temp_hash` = ? WHERE `email` = ? ", array($this->database->escape($data['temp_hash']), $this->database->escape($data['email'])));
	}

	public function addAttempt($email)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "login_attempts` WHERE `email` = ?", array($this->database->escape($email)));
		if ($query->num_rows > 0) {
			$this->database->query(" UPDATE `" . DB_PREFIX . "login_attempts` SET `count` = ?, `date_modified` = ? WHERE `email` = ? ", array( $query->row['count'] + 1 , date('Y-m-d H:i:s'), $email));
		} else {
			$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "login_attempts` SET `email` = ?, `count` = ?, `date_added` = ?, `date_modified` = ? ", array($email, 1, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')));
		}
	}

	public function deleteAttempt($email)
	{
		$query = $this->database->query("DELETE FROM `" . DB_PREFIX . "login_attempts` WHERE `email` = ? ", array($this->database->escape($email)));
	}

	public function isPatientProfileUpToDate($email){
		
		$query = $this->database->query("SELECT `id`, `firstname`, `lastname`, `email`, `password`, `status` FROM `" . DB_PREFIX . "patients` WHERE `email` = ? AND title != '' AND firstname != '' AND lastname != '' AND email != '' AND mobile != '' AND address != '' LIMIT 1", array($this->database->escape($email)));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}
}