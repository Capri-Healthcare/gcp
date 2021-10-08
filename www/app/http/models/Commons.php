<?php

/**
* Common Class for getting data from DB
*/
class Commons extends Model
{
	public function siteInfo() 
	{
		$query = $this->database->query("SELECT data FROM `" . DB_PREFIX . "setting` WHERE `name` = ? LIMIT 1", array('siteinfo'));
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function getSettings()
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "setting` WHERE `name` IN ('siteinfo', 'pagetheme', 'sociallink')");
		if ($query->num_rows > 0) {
			return $query->rows;
		} else {
			return false;
		}
	}

	public function getSocialLink()
	{
		$query = $this->database->query("SELECT data FROM `" . DB_PREFIX . "setting` WHERE `name` = ? LIMIT 1", array('sociallink'));
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function getMenu()
	{
		$query = $this->database->query("SELECT `data` FROM `" . DB_PREFIX . "setting` WHERE `name` = ? LIMIT 1 ", array('pageheader'));
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function getFooter() 
	{
		$query = $this->database->query("SELECT `data` FROM `" . DB_PREFIX . "setting` WHERE `name` = ? LIMIT 1", array('pagefooter') );
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function getTheme()
	{
		$query = $this->database->query("SELECT data FROM `" . DB_PREFIX . "setting` WHERE `name` = ? LIMIT 1", array('pagetheme'));
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function getTemplate($name)
	{
		$query = $this->database->query("SELECT data FROM `" . DB_PREFIX . "setting` WHERE `name` = ? LIMIT 1", array('pagetheme'));
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function getMailInfo()
	{
		$query = $this->database->query("SELECT `data` FROM `" . DB_PREFIX . "setting` WHERE `name` = ?", array('emailsetting'));
		return json_decode($query->row['data'], true);
	}

	public function getTemplateAndInfo($id)
	{
		$query = $this->database->query("SELECT subject, message, status FROM `" . DB_PREFIX . "email_template` WHERE `template` = ? LIMIT 1", array($id));
		$data['template'] = $query->row;

		$query = $this->database->query("SELECT * FROM  `" . DB_PREFIX . "setting` WHERE `name` = ? LIMIT 1", array('siteinfo'));
		$data['common'] = json_decode($query->row['data'], true);
		return $data;
	}

	public function dep() 
	{
		$query = $this->database->query("SELECT `id`, `name` FROM `" . DB_PREFIX . "departments` WHERE status = 1");
		return $query->rows;
	}

	public function getDoctors() 
	{
		$query = $this->database->query("SELECT `id`, `name`, `department_id` AS department, `weekly`, `national` FROM `" . DB_PREFIX . "doctors` WHERE `web_status` = ?", array(1));
		return $query->rows;
	}

	public function doctors() 
	{
		$query = $this->database->query("SELECT `id`, `name`, `department_id` AS department, `weekly`, `national` FROM `" . DB_PREFIX . "doctors` WHERE `appointment` = ?", array(1) );
		return $query->rows;
	}

	public function generalSettings()
	{
		$query = $this->database->query("SELECT `data` FROM `" . DB_PREFIX . "setting` WHERE `name` = ? AND `status` = ? LIMIT 1", array('generalsetting', 1));
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function analytics() 
	{
		$query = $this->database->query("SELECT `data` FROM `" . DB_PREFIX . "setting` WHERE `name` = ? AND `status` = ? LIMIT 1", array('analytics', 1));
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function customCss() 
	{
		$query = $this->database->query("SELECT `data` FROM `" . DB_PREFIX . "setting` WHERE `name` = ? AND `status` = ? LIMIT 1", array('css', 1));
		if ($query->num_rows > 0) {
			return $query->row['data'];
		} else {
			return false;
		}
	}

	public function userData($id)
	{
		$query = $this->database->query(" SELECT `firstname`, `lastname`, `email`, `mobile` FROM `" . DB_PREFIX . "patients` WHERE `id` = ? AND `status` = ? LIMIT 1", array($id, 1));
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

	public function createSubscriber($data)
	{
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "subscribe` (`email`, `status`) VALUES (?, ?)", array($this->database->escape($data['email']), 1));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

    public function getFollowupforRemainder()
    {
        $query = $this->database->query("Select f.*,a.is_glaucoma_required From `" . DB_PREFIX . "followup_appointment` as f JOIN `" . DB_PREFIX . "appointments` AS a ON f.appointment_id = a.id WHERE f.followup_status ='NEW' AND f.reminder_count = '0' ");

        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }

    }

    public function updateFollowupStatus($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "followup_appointment` SET `followup_status` = ?,`reminder_count` = ?,`modified_at` = ? WHERE `id` = ?", array($this->database->escape($data['status']),$data['reminder_count'], date('Y-m-d H:i:s'), $data['id']));

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
}