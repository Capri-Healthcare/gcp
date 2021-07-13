<?php

/**
* Register Model
*/
class Register extends Model
{
	public function checkUser($email) 
	{
		$query = $this->database->query("SELECT `id`, `firstname`, `lastname`, `email`, `status` FROM `" . DB_PREFIX . "patients` WHERE `email` = ? LIMIT 1 ", array($this->database->escape($email)));
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}
	
	public function createAccount($data) 
	{

		$passwordhash = password_hash($data['password'], PASSWORD_DEFAULT);
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "patients` (`firstname`, `lastname`, `email`, `mobile`, `password`, `temp_hash`, `status`, `date_of_joining`, gp_practice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ", array($this->database->escape(ucfirst($data['firstname'])), $this->database->escape(ucfirst($data['lastname'])), $this->database->escape($data['email']), $this->database->escape($data['mobile']), $this->database->escape($passwordhash), $this->database->escape($data['temp_hash']), 1, $data['datetime'], $this->database->escape($data['gp_practice'])));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkOpticianUserExist($email) 
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "users` WHERE `email` = ? LIMIT 1 ", array($this->database->escape($email)));
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

    public function checkOpticianUserNameExist($username)
    {

        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "users` WHERE `user_name` = ? LIMIT 1 ", array($this->database->escape($username)));
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
	public function createOpticianAccount($data) 
	{
		$passwordhash = password_hash($data['password'], PASSWORD_DEFAULT);
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "users` (user_role, `user_name`, `firstname`, `lastname`, `email`, `mobile`, `password`, `optician_shop_name`,`optician_registration_number`, `temp_hash`, `status`, `date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?) ", array(9, $this->database->escape($data['username']), $this->database->escape(ucfirst($data['firstname'])), $this->database->escape(ucfirst($data['lastname'])), $this->database->escape($data['email']), $this->database->escape($data['mobile']), $this->database->escape($passwordhash), $this->database->escape($data['optician_shop_name']),  $this->database->escape($data['optician_register_number']),$this->database->escape($data['temp_hash']), 1, $data['datetime']));
		if (isset($query->num_rows) AND $query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editHash($email, $code)
	{
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `temp_hash` = ? WHERE `email` = ? ", array($this->database->escape($code), $this->database->escape($email)));
	}

	public function checkEmailHash($data)
	{
		$query = $this->database->query("SELECT `email` FROM `" . DB_PREFIX . "patients` WHERE `email` = ? and `temp_hash` = ? LIMIT 1", array($this->database->escape($data['email']), $this->database->escape($data['hash'])));
		
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function changepassword($data)
	{
		$passwordhash = password_hash($data['password'], PASSWORD_DEFAULT);
		$hash = NULL;
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `password` = ?, `temp_hash` = ?, `emailconfirmed` = ?  WHERE `email` = ? AND `temp_hash` = ? ", array($passwordhash, $hash, 1, $this->database->escape($data['email']), $this->database->escape($data['hash'])));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function confirmAccount($data)
	{
		$hash = NULL;
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "patients` SET `temp_hash` = ?, `emailconfirmed` = ? WHERE `email` = ? AND `temp_hash` = ? ", array($hash, 1, $this->database->escape($data['email']), $this->database->escape($data['hash'])));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}
}

