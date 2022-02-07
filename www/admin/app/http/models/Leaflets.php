<?php

/**
 * Leaflets Model
 */
class Leaflets extends Model
{
    public function getLeafletss($period, $id, $role)
    {
        $status = '';

        if ($period['status'] == constant('STATUS_ALL')) {

            if ($role == constant('USER_ROLE_MED')) {
                $status = implode("','", array_keys(constant('REFERRAL_MED_SEC_STATUS')));
            } else {
                $status = implode("','", array_keys(constant('REFERRAL_OPTICIAN_STATUS')));
            }
        } else {
            $status =  $period['status'];
        }
    }


    public function allLeaflets()
    {
        $query = $this->database->query("Select * From `" . DB_PREFIX . "leaflets` ORDER BY created_at DESC ");
        return $query->rows;
    }



    public function getLeaflets($id)
    {
        $query = $this->database->query("Select * From `" . DB_PREFIX . "leaflets` WHERE id = " . $id);

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }



    public function createLeaflets($data)
    {
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "leaflets` (  `doc_name`,`created_at`) VALUES ( ?,?)", array($data['picture'], date('Y-m-d H:i:s')));

        if ($query->num_rows > 0) {
            return $this->database->last_id();
        } else {
            return $query->row;
        }
    }

    public function deleteLeaflets($id)
    {
        $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "leaflets` WHERE `id` = ?", array((int)$id));
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getLeafletsDocumnet($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "leaflets_document` WHERE `leaflets_id` =" . $id);
        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }
}
