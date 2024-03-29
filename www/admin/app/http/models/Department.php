<?php

/**
* Department Model
*/
class Department extends Model
{
	public function allDepartments()
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "departments`");
		return $query->rows;
	}


	public function getDepartment($id)
	{
		$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "departments` WHERE `id` = ? LIMIT 1", array($this->database->escape($id)));
		if ($query->num_rows > 0) {
			return $query->row;
		} else {
			return false;
		}
	}

	public function updateDepartment($data)
	{
		$query = $this->database->query("UPDATE `" . DB_PREFIX . "departments` SET `name` = ?, `description` = ?, `icon` = ?, `status` = ? WHERE `id` = ?", array($this->database->escape($data['name']), $data['description'], $this->database->escape($data['icon']), (int)$data['status'], (int)$data['id']));
	}

	public function createDepartment($data)
	{
		$query = $this->database->query("INSERT INTO `" . DB_PREFIX . "departments` (`name`, `description`, `icon`, `status`, `date_of_joining`) VALUES (?, ?, ?, ?, ?)", array($this->database->escape($data['name']), $data['description'], $this->database->escape($data['icon']), (int)$data['status'], $data['datetime']));
		if ($query->num_rows > 0) {
			return $this->database->last_id();
		} else {
			return false;
		}
	}

	public function deleteDepartment($id)
	{
		$query = $this->database->query("DELETE FROM `" . DB_PREFIX . "departments` WHERE `id` = ?", array((int)$id));
		if ($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}
}