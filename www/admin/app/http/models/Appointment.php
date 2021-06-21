<?php

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Appointment Model
 */
class Appointment extends Model
{
    public function getAppointments($period, $doctor = NULL, $role = null)
    {
        if ($doctor == NULL) {
            if ($role != null && $role == constant('USER_ROLE')[2]) {
                $query = $this->database->query("SELECT a.*, d.id AS doctor_id, CONCAT(d.firstname, ' ', d.lastname) AS doctor, d.picture AS picture, d.email AS doctor_email, dep.name AS department, user.id AS patient_id FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS dep ON dep.id = a.department_id LEFT JOIN `" . DB_PREFIX . "patients` AS user ON user.email = a.email WHERE a.date between '" . $period['start'] . "' AND '" . $period['end'] . "' AND a.is_glaucoma_required = 'YES' ORDER BY date DESC");
            } else {
                $query = $this->database->query("SELECT a.*, d.id AS doctor_id, CONCAT(d.firstname, ' ', d.lastname) AS doctor, d.picture AS picture, d.email AS doctor_email, dep.name AS department, user.id AS patient_id FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS dep ON dep.id = a.department_id LEFT JOIN `" . DB_PREFIX . "patients` AS user ON user.email = a.email WHERE a.date between '" . $period['start'] . "' AND '" . $period['end'] . "' ORDER BY date DESC");
            }
        } else {
            $query = $this->database->query("SELECT a.*, d.id AS doctor_id, CONCAT(d.firstname, ' ', d.lastname) AS doctor, d.picture AS picture, d.email AS doctor_email, dep.name AS department, user.id AS patient_id FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS dep ON dep.id = a.department_id LEFT JOIN `" . DB_PREFIX . "patients` AS user ON user.email = a.email WHERE a.date between '" . $period['start'] . "' AND '" . $period['end'] . "' AND a.doctor_id = '" . (int)$doctor . "' ORDER BY date DESC");
        }
        return $query->rows;
    }

    public function getAppointment($id, $doctor = NULL)
    {
        if ($doctor == NULL) {
            $query = $this->database->query("SELECT a.*, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender,pt.firstname,pt.lastname,pt.address, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.gp_name, pt.nhs_patient_number, pt.dob as patient_dob, pt.gp_email FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.id = '" . (int)$id . "' LIMIT 1");
        } else {
            $query = $this->database->query("SELECT a.*, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.gp_name, pt.nhs_patient_number, pt.dob as patient_dob, pt.gp_email FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.id = '" . (int)$id . "' AND a.doctor_id = '" . (int)$doctor . "' LIMIT 1");
        }

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function getAppointmentView($id, $doctor = NULL)
    {

        if ($doctor == NULL) {
            $query = $this->database->query("SELECT a.*, a.status AS appointment_status, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id,pt.title,pt.hospital_code, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.gp_name, pt.gp_address, pt.gp_email, pt.special_requirements,pt.firstname,pt.lastname FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.id = '" . (int)$id . "' LIMIT 1");
        } else {
            $query = $this->database->query("SELECT a.*, a.status AS appointment_status, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id,pt.title,pt.hospital_code, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.gp_name, pt.gp_address, pt.gp_email, pt.special_requirements,pt.firstname,pt.lastname FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.id = '" . (int)$id . "' AND a.doctor_id = '" . (int)$doctor . "' LIMIT 1");
            echo $id;
            exit();
        }

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function getPrescription($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "prescription` WHERE appointment_id = ? LIMIT 1", array((int)$id));
        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function getClinicalNotes($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_notes` WHERE appointment_id = ? LIMIT 1", array((int)$id));
        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function clinicalNotesPDF($id)
    {
        $query = $this->database->query("SELECT an.*, CONCAT(d.firstname, ' ', d.lastname) AS doctor  FROM `" . DB_PREFIX . "appointment_notes` AS an LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = an.doctor_id WHERE an.id = ? LIMIT 1", array((int)$id));

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }


    public function getSingleRecords($id)
    {
        $query = $this->database->query("SELECT a.id, a.name, a.notes, a.date, CONCAT(d.firstname, ' ', d.lastname) AS doctor FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id WHERE a.id = ? LIMIT 1", array($this->database->escape($id)));
        return $query->row;
    }

    public function createPatientDoctor($data)
    {
        $this->database->query("INSERT INTO `" . DB_PREFIX . "patient_doctor` (`patient_id`, `doctor_id`, `user_id`, `appointment_id`) VALUES (?, ?, ?, ?)", array($data['appointment']['patient_id'], $data['user']['doctor'], $data['user']['user_id'], $data['appointment']['id']));
    }

    public function updateAppointment($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET `name` = ?, `email` = ?, `mobile` = ?,  `date` = ?, `time` = ?, `message` = ?, `slot` = ?, `department_id` = ?, `status` = ?, `doctor_id` = ?, `patient_id` = ?, consultation_type = ?, `session_id` = ?, token = ?, video_consultation_token = ?, doctor_note = ?  WHERE `id` = ? ", array($this->database->escape($data['name']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['date']), $this->database->escape($data['time']), $data['message'], $data['slot'], (int)$data['department'], (int)$data['status'], (int)$data['doctor'], (int)$data['patient_id'], $data['consultation_type'], $data['session_id'], $data['token'], $data['video_consultation_token'], $data['doctor_note'], (int)$data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateExaminationNotes($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET 
        `current_event` = ?,
        `allergy` = ?,
        `visual_acuity_right` = ?,
        `intraocular_pressure_right` = ? ,
        `visual_acuity_left` = ?,
        `intraocular_pressure_left` = ?,
        `anterior_chamber_right` = ?,
        `anterior_chamber_left` = ?, 
        `lens_right` = ?, 
        `lens_left` = ?,
        `nfl_thickness_right` = ?, 
        `nfl_thickness_left` = ?,
         mean_deviation_right = ?, 
        `mean_deviation_left` = ?,
        `psd_deviation_right` = ?,
        `psd_deviation_left` = ?, 
        `cct_right` = ?, 
        `cct_left` = ?, 
        `diagnosis` = ?,
        `outcome` = ?,
        `gcp_next_appointment` = ?,
        `is_glaucoma_required` = ?, `diagnosis_eye` = ?  WHERE `id` = ? ", array(
            $this->database->escape($data['current_event']),
            $this->database->escape($data['allergy']),
            $this->database->escape($data['visual_acuity_right']),
            $this->database->escape($data['intraocular_pressure_right']),
            $this->database->escape($data['visual_acuity_left']),
            $data['intraocular_pressure_left'],
            $data['anterior_chamber_right'],
            $data['anterior_chamber_left'],
            $data['lens_right'],
            $data['lens_left'],
            (int)$data['nfl_thickness_right'],
            $data['nfl_thickness_left'],
            $data['mean_deviation_right'],
            $data['mean_deviation_left'],
            $data['psd_deviation_right'],
            $data['psd_deviation_left'],
            $data['cct_right'],
            $data['cct_left'],
            $data['diagnosis'],
            $data['outcome'],
            $data['followup'],
            $data['gcp_required'],
            $data['diagnosis_eye'],
            (int)$data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateSideBarAppointment($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET `name` = ?, `email` = ?, `mobile` = ?,  `date` = ?, `time` = ?, `slot` = ?, `department_id` = ?, `status` = ?, `doctor_id` = ?, `patient_id` = ? WHERE `id` = ? ", array($this->database->escape($data['name']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['date']), $this->database->escape($data['time']), $data['slot'], (int)$data['department'], (int)$data['status'], (int)$data['doctor'], (int)$data['patient_id'], (int)$data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePrescription($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "prescription` SET `name` = ?, `email` = ?, `prescription` = ?, `doctor_id` = ?, `patient_id` = ? WHERE `id` = ? ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['mail']), $data['prescription']['medicine'], (int)$data['appointment']['doctor'], (int)$data['appointment']['patient_id'], (int)$data['prescription']['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createPrescription($data)
    {

        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "prescription` (`name`, `email`, `prescription`, `doctor_id`, `appointment_id`, `patient_id`, `user_id`, `date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['mail']), $data['prescription']['medicine'], (int)$data['appointment']['doctor'], (int)$data['appointment']['id'], (int)$data['appointment']['patient_id'], (int)$data['appointment']['user_id'], $data['appointment']['datetime']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createAppointment($data)
    {
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "appointments` (`optician_id`,`name`, `email`, `mobile`, `date`, `time`, `slot`, `department_id`, `status`, `doctor_id`, `patient_id`, `date_of_joining`, `appointment_id`,`hospital_code`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?) ", array($data['optician_id'], $this->database->escape($data['name']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['date']), $this->database->escape($data['time']), $data['slot'], (int)$data['department'], (int)$data['status'], (int)$data['doctor'], (int)$data['patient_id'], $data['datetime'], $data['appointment_id'], $data['hospital_code']));

        if ($query->num_rows > 0) {
            return $this->database->last_id();
        } else {
            return false;
        }
    }

    public function updateNotes($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointment_notes` SET `name` = ?, `email` = ?, `notes` = ?, `appointment_id` = ?, `doctor_id` = ?, `patient_id` = ? WHERE `id` = ? ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['mail']), $data['notes']['notes'], (int)$data['appointment']['id'], (int)$data['appointment']['doctor'], (int)$data['appointment']['patient_id'], (int)$data['notes']['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createNotes($data)
    {
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "appointment_notes` (`name`, `email`, `notes`, `appointment_id`, `doctor_id`, `patient_id`, `user_id`, `date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['mail']), $data['notes']['notes'], (int)$data['appointment']['id'], (int)$data['appointment']['doctor'], (int)$data['appointment']['patient_id'], (int)$data['appointment']['user_id'], $data['appointment']['datetime']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function saveNotes($data)
    {

        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_notes` WHERE appointment_id = ? ", array((int)$data['appointment']['id']));
        echo $query->num_rows;
        if ($query->num_rows > 0) {
            echo "Update";
            print_r($query->row['id']);
            $insert_update_query = $this->database->query("UPDATE `" . DB_PREFIX . "appointment_notes` SET `name` = ?, `email` = ?, `notes` = ?, `appointment_id` = ?, `doctor_id` = ?, `patient_id` = ? WHERE `id` = ? ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['email']), $data['notes']['notes'], (int)$data['appointment']['id'], (int)$data['appointment']['doctor'], (int)$data['appointment']['patient_id'], $query->row['id']));

        } else {
            echo "insert";
            $insert_update_query = $this->database->query("INSERT INTO `" . DB_PREFIX . "appointment_notes` (`name`, `email`, `notes`, `appointment_id`, `doctor_id`, `patient_id`, `user_id`, `date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['email']), $data['notes']['notes'], (int)$data['appointment']['id'], (int)$data['appointment']['doctor'], (int)$data['appointment']['patient_id'], (int)$data['user_id'], date('Y-m-d H:i:s')));

        }


        if ($insert_update_query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getDoctors()
    {
        $query = $this->database->query("SELECT d.id, CONCAT(d.firstname, ' ', d.lastname) AS name, d.weekly, d.national, dep.name AS department, dep.id AS department_id FROM `" . DB_PREFIX . "doctors` AS d LEFT JOIN `" . DB_PREFIX . "departments` AS dep ON dep.id = d.department_id WHERE d.appointment_status = ? AND d.status = ? ORDER BY d.department_id ASC", array(1, 1));
        return $query->rows;
    }

    public function getDoctorData($id)
    {
        $query = $this->database->query("SELECT CONCAT(title, ' ', firstname, ' ', lastname) AS name, `email`, mobile, picture, logo, website, about, department_id, social, web_status, status, priority, time, weekly, national, appointment_status, user_id FROM `" . DB_PREFIX . "doctors` WHERE id = ? LIMIT 1", array($id));
        return $query->row;
    }

    public function getPatientInfo($id)
    {
        $query = $this->database->query("SELECT `id`, CONCAT(`firstname`, ' ', `lastname`) AS name, `email`, `mobile` FROM `" . DB_PREFIX . "patients` WHERE id = ? LIMIT 1", array($id));
        return $query->row;
    }

    public function getDoctorTime($doctor)
    {
        $query = $this->database->query("SELECT `time` FROM `" . DB_PREFIX . "doctors` WHERE `id` = ? LIMIT 1", array($this->database->escape($doctor)));
        if ($query->num_rows > 0) {
            return $query->row['time'];
        } else {
            return false;
        }
    }

    public function bookedSlot($date, $doctor)
    {
        $date = date("Y-m-d", strtotime($date));
        $query = $this->database->query("SELECT `time` FROM `" . DB_PREFIX . "appointments` WHERE `date`= ? AND `doctor_id` = ? AND `status` != ? ", array($this->database->escape($date), $this->database->escape($doctor), 1));
        $result = [];
        if ($query->num_rows > 0) {
            foreach ($query->rows as $key => $value) {
                $result[] = $value['time'];
            }
        }
        return $result;
    }

    public function deleteAppointment($id)
    {
        $this->database->query("DELETE FROM `" . DB_PREFIX . "appointment_notes` WHERE `appointment_id` = ?", array((int)$id));
        $this->database->query("DELETE FROM `" . DB_PREFIX . "prescription` WHERE `appointment_id` = ?", array((int)$id));
        $this->database->query("DELETE FROM `" . DB_PREFIX . "reports` WHERE `appointment_id` = ?", array((int)$id));
        $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "appointments` WHERE `id` = ?", array((int)$id));
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getReports($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_images` WHERE `appointment_id` = ? ORDER BY name ASC ", array((int)$id));
        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }

    public function createReport($data)
    {
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "reports` (`name`, `report`, `email`, `appointment_id`, `patient_id`, `user_id`) VALUES (?, ?, ?, ?, ?, ?) ", array($data['report_name'], $this->database->escape($data['report']), $this->database->escape($data['email']), (int)$data['id'], (int)$data['patient'], (int)$data['user_id']));
    }

    public function deleteReport($data)
    {
        $user_id = $this->session->data['user_id'];
       $query = $this->database->query("DELETE FROM `" . DB_PREFIX . "reports` WHERE `report` = ? AND `appointment_id` = ?", array($this->database->escape($data['report']), (int)$data['appointment_id']));

        // if its image then allow to patient to delete image
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_images` WHERE appointment_id = '" . (int)$data['appointment_id'] . "' AND `filename` = '" . $data['report'] . "'");

        $is_exist = $query->row;
        if (!empty($is_exist)) {

            $this->database->query("UPDATE `" . DB_PREFIX . "appointment_images` SET `move_to_report` = ?, `updated_at` = ?, `updated_by` = ? WHERE `appointment_id` = ? AND `filename` = ? ", array('N', date('Y-m-d H:i:s'), $user_id, (int)$data['appointment_id'], $data['report']));

        }
    }

    public function getSearchedMedicine($data)
    {
        $query = $this->database->query("SELECT id, name AS label, generic FROM `" . DB_PREFIX . "medicines` WHERE name like '%" . $data . "%' LIMIT 5");
        return $query->rows;
    }

    public function getAppointmentImages($id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_images` WHERE `appointment_id` = ?", array((int)$id));
        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }

    public function updatePreConsultationForms($data)
    {
        $user_id = $this->session->data['user_id'];
        $appointment_id = (int)$data['appointment']['id'];
        //echo "<pre>"; print_r($data);exit;

        // Inactive old form and department link
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointment_forms` SET `is_active` = ?, `updated_at` = ?, `updated_by` = ? WHERE `appointment_id` = ?", array('N', date('Y-m-d H:i:s'), $user_id, $appointment_id));

        foreach ($data['pre_consultation_forms'] as $form_id) {
            $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_forms` WHERE form_id = " . $form_id . " AND appointment_id = '" . $appointment_id . "'");
            $is_exist = $query->row;
            if (empty($is_exist)) {
                $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "appointment_forms` (`form_id`, `appointment_id`, `is_active`, `created_at`, `created_by`) VALUES (?, ?, ?, ?, ?)", array($form_id, $appointment_id, 'Y', date('Y-m-d H:i:s'), $user_id));

            } else {
                $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointment_forms` SET `is_active` = ?, `updated_at` = ?, `updated_by` = ? WHERE `id` = ?", array('Y', date('Y-m-d H:i:s'), $user_id, $is_exist['id']));
            }
        }

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function moveImageToReport($data)
    {
        $user_id = $this->session->data['user_id'];
        $image_id = $data['image_id'];

        // Update image row in DB
        $this->database->query("UPDATE `" . DB_PREFIX . "appointment_images` SET `move_to_report` = ?, `updated_at` = ?, `updated_by` = ? WHERE `id` = ? ", array('Y', date('Y-m-d H:i:s'), $user_id, $image_id));

        // Get image recaord
        $image = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointment_images` WHERE id = " . $image_id);
        $imageRec = $image->row;
        $appointment_id = $imageRec['appointment_id'];
        $filename = $imageRec['filename'];

        // Get appointment
        $appointment = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE id = " . $appointment_id);
        $appointmentRec = $appointment->row;


        if (!empty($imageRec)) {
            // Create folder if its not exist
            $report_folder = DIR . "public/uploads/appointment/reports/" . $appointment_id;
            if (!file_exists($report_folder)) {
                mkdir($report_folder, 0777, true);
            }

            $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "reports` (`name`, `report`, `email`, `appointment_id`, `patient_id`, `user_id`, `date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?)", array($imageRec['name'], $filename, $appointmentRec['email'], $appointment_id, $appointmentRec['patient_id'], $user_id, date('Y-m-d H:i:s')));
            $source_path = DIR . "public/uploads/appointment/images/" . $appointment_id . '/' . $filename;
            $destination_path = $report_folder . '/' . $filename;

            copy($source_path, $destination_path);
        }
    }

    public function moveimagefromopticiantoappointment($data)
    {
        if (isset($data['followupid'])) {

            $images = $this->database->query("SELECT * FROM kk_referral_list_document WHERE followup_id='" . $data['followupid'] . "'");
        }
        if (isset($data['referralid'])) {

            $images = $this->database->query("SELECT * FROM kk_referral_list_document WHERE referral_list_id='" . $data['referralid'] . "'");

        }
        if ($images->num_rows > 0) {
            foreach ($images->rows as $doc) {
                //  Create folder if its not exist
                $report_folder = DIR . "public/uploads/appointment/reports/" . $data['id'];
                if (!file_exists($report_folder)) {
                    mkdir($report_folder, 0777, true);
                }
                if (isset($data['followupid'])) {
                    $source_path = DIR . "public/uploads/optician-referral/followup/" . $data['followupid'] . '/' . $doc['filename'];
                }
                if (isset($data['referralid'])) {

                    $source_path = DIR . "public/uploads/optician-referral/document/" . $data['referralid'] . '/' . $doc['filename'];
                }
                $destination_path = $report_folder . '/' . $doc['filename'];
                copy($source_path, $destination_path);
                $this->database->query("INSERT INTO `" . DB_PREFIX . "appointment_images` (`name`, `filename`, `appointment_id`, `patient_id`, `user_id`) VALUES (?, ?, ?, ?, ?)", array($doc['name'], $doc['filename'], $data['id'], $data['patient_id'], $data['user_id']));

            }
        }


    }

    public function getAppointmentByVideoConsultationToken($token)
    {
        if (empty($token)) {
            return false;
        } else {
            $query = $this->database->query("SELECT a.*, a.status AS appointment_status, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.gp_name, pt.gp_address, pt.special_requirements FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.video_consultation_token = '" . $token . "' LIMIT 1");
        }
        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function getDoctorAddress($doctor_id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "doctor_address` WHERE doctor_id = ? ", array($doctor_id));
        return $query->rows;
    }

    public function generateToOptomOrThirdPartyDoc($appointment_id, $action)
    {

        $appointment = $this->getAppointment($appointment_id);
        $appointment['address'] = json_decode($appointment['address'], true);
        $doctor_data = $this->getDoctorData($appointment['doctor_id']);
        $prescription = $this->model_appointment->getPrescription($appointment_id);
        if (!empty($prescription)) {
            $prescription['prescription'] = json_decode($prescription['prescription'], true);
        } else {
            $prescription = NULL;
        }

        $body = "";

        $body .= "<div style='font-size:13px;  padding-left:5px; padding-right:0px;'>";

        $body .= "<strong>Date of visit:</strong> " . date_format(date_create($appointment['date']), 'd-m-Y') . "<br>";
        $body .= "<strong>Date typed:</strong> " . date('d-m-Y');

        $body .= ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . "<br>";
        $body .= $appointment['address']['address1'] . "," . $appointment['address']['address1'] . "<br>";
        $body .= $appointment['address']['city'] . "," . $appointment['address']['country'] . "," . $appointment['address']['postal'];

        $body .= "<br><br><br>";

        $body .= "Dear " . ucfirst($appointment['firstname']) . "<br><br>";

        $body .= "<b>Name: </b>".ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . "<br>";
        $body .= "<b>DOB: </b>".date_format(date_create($appointment['patient_dob']), 'd-m-Y'). "<br>";
        $body .= "<b>Address: </b>".$appointment['address']['address1'] . "," . $appointment['address']['address1'] . "<br>";
        $body .= $appointment['address']['city'] . "," . $appointment['address']['country'] . "," . $appointment['address']['postal'];

        $body .= "Diagnosis: " . constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS'][$appointment['diagnosis']] . "<br>";
        $body .= "<br>";
        $body .= "Current Treatment:<br><br>";
        $body .= "<table width='100%' border='1'>
                                       <tr>
                                            <th>Drug Name</th>
                                            <!--th>Generic</th-->
                                            <th>Frequency</th>
                                            <!--th style='width: 13%;'>Duration</th-->
                                            <th>Instruction</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Eye</th>
                                        </tr>";

        if (!empty($prescription)) {
            foreach ($prescription['prescription'] as $key => $value) {
                $body .= "<tr>";
                $body .= "<td>" . $value['name'] . "</td>";
                $body .= "<td>" . $value['dose'] . "</td>";
                $body .= "<td>" . $value['instruction'] . "</td>";
                $body .= "<td>" . date_format(date_create($value['start_date']), 'd-m-Y') . "</td>";
                $body .= "<td>" . date_format(date_create($value['end_date']), 'd-m-Y') . "</td>";
                $body .= "<td>" . $value['eye'] . "</td>";
                $body .= "</tr>";
            }
        }else{
            $body .= "<tr>";
            $body .= "<td colspan='6' style='text-align: center'>Treatment does not specified.</td>";
            $body .= "</tr>";
        }
        $body .= "</table>";
        $body .= "<br>";

        $body .= "Follow up: ";
        $body .= (isset($appointment['gcp_next_appointment']) && !empty($appointment['gcp_next_appointment'])) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$appointment['gcp_next_appointment']] : '';

        $body .= "<br>";

        $body .= str_replace('{Patient: Name}', ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) , "<p style='letter-spacing:0.6px'>Thank you for your kind referral for {Patient: Name} to my private Complex Glaucoma/ Cataract clinic.</p>");

        $body .= "<br><br>";

        $body .= "Kind regards<br>Yours sincerely";

        $body .= "<br><br><br>";

        $body .= "<b>Mr Tarun Sharma</b><br><b>MBBS, MD in Glaucoma, FRCS Ed.</b><br><b>Consultant Ophthalmic Surgeon.</b>";

        $body .= "</div>";

        $filename = str_replace(" ", "-", $appointment['name']) . 'appointment-latter-notes-letter.pdf';
        $this->generatePdfFile($appointment_id, $body, $filename, $action);
    }

    public function getAppointmentDocHeaderFooter($appointment_id)
    {
        $appointment = $this->getAppointment($appointment_id);

        $doctor_data = $this->getDoctorData($appointment['doctor_id']);
        $doctor_address = $this->getDoctorAddress($appointment['doctor_id']);
        $about_doctor = json_decode($doctor_data['about'], true);

        //echo "<pre>";print_r($doctor_data);exit;
        $qualification = $about_doctor['degree'] . ', ' . $about_doctor['awards'];
        $position_specility = $about_doctor['position'] . ', ' . $about_doctor['specility'];

        $this->load->model('commons');
        $common = $this->model_commons->getCommonData($this->session->data['user_id']);

        // Set Header
        $doc_logo = (isset($doctor_data['logo']) and !empty($doctor_data['logo'])) ? $doctor_data['logo'] : $common['info']['logo'];
        $header = "<table style='width:100%' border=0' >" .
            "<tr>" .
                "<td width='30%'>
				    <img src='".URL."public/images/logo.jpg' alt='Glaucoma Care Plan' title='Glaucoma Care Plan' width='234' height='119' />
				</td>" .
                "<td align=right>
					<div style='text-align:right; color: #333;'>
						<h4 style='font-size:18px; margin: 0 0 0;'><strong>" . $doctor_data['name'] . "</strong></h4>
						<span style='font-size: 13px;'>" . $qualification . " </span><br/>
						<span style='font-size: 13px;'>" . $position_specility . "</span>
					</div>
				    
				</td>" .
            "</tr>" .
            "</table>";

        // Set footer
        $footer = "<table style='width:100%' border=0 font-size: 9px;'>";
        if (!empty($doctor_address)) {
            $footer .= "<table style='width:100%' border=0'><tr>";
            foreach ($doctor_address as $key => $address) {
                $footer .= "<td>";
                $footer .= "<span style='color: #333; font-size: 10px;'><strong> " . $address['title'] . "</strong></span><br/>";
                $footer .= "<span style='color: #333; font-size: 9px;'>T: " . $address['contact_number'] . "</span><br/>";
                $footer .= "<span style='color: #333; font-size: 9px;'>E: " . $address['email'] . "</span>";
                $footer .= "</td>";
            }
            $footer .= "</tr></table>";

        } else {
            $footer .= "<tr><td><center>" . $doctor_data['website'] . "</center></td></tr>";
        }
        $footer .= "</table>";

        return ["header" => $header, "footer" => $footer];
    }

    public function generatePdfFile($appointment_id, $pdf_body, $filename, $action)
    {

        $doc_header_footer = $this->getAppointmentDocHeaderFooter($appointment_id);

        $pdf_body = "<!DOCTYPE html>
        <html lang='en'>
		<head>
		  <style>
			
			li { font-size: 13px; }
			H4 { margin-bottom: 0px}
			@page {
                margin: 150px 30px 50px 30px;
            }
            header {
                position: fixed; top: -125px; left: 0px; right: 0px; height: 50px;
            }
            footer {
				position: fixed; bottom: -90px; left: 0px; right: 0px; height: 100px; 
            }
            body {  
                font-family: 'Helvetica Neue, Helvetica, Arial, sans-serif';
            }
		  </style>
		</head>
		<body>
		  <header>" . $doc_header_footer['header'] . "</header>
		  <footer>" . $doc_header_footer['footer'] . "</footer>
		  <main>" . $pdf_body . "</main>
		</body>
		</html>";

        // instantiate and use the dompdf class
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $options->set('isRemoteEnabled', TRUE);
        $options->set('isHtml5ParserEnabled', TRUE);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($pdf_body);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();


        if ($action == "DOWNLOAD") {
            // Output the generated PDF to Browser
            $dompdf->stream($filename, array("Attachment" => true));
            exit;
            return true;
        } else {
            // Save to folder
            $output = $dompdf->output();
            $filedir = DIR . "public/uploads/appointment/letters/" . $appointment_id . "/";
            // Create folder if its not exist
            if (!file_exists($filedir)) {
                mkdir($filedir, 0777, true);
            }

            $file_path = $filedir . $filename;
            file_put_contents($file_path, $output);

            return $file_path;
        }
    }


    public function generateToPatientOrGpDoc($appointment_id, $action)
    {
        $appointment = $this->getAppointment($appointment_id);
        $appointment['address'] = json_decode($appointment['address'], true);
        $doctor_data = $this->getDoctorData($appointment['doctor_id']);
        $prescription = $this->model_appointment->getPrescription($appointment_id);

        $about_doctor = json_decode($doctor_data['about'], true);
        $qualification = $about_doctor['degree'] . ', ' . $about_doctor['awards'];
        $position_specility = $about_doctor['position'] . ', ' . $about_doctor['specility'];

        if (!empty($prescription)) {
            $prescription['prescription'] = json_decode($prescription['prescription'], true);
        } else {
            $prescription = NULL;
        }

        $body = "";

        $body .= "<div style='font-size:13px;  padding-left:5px; padding-right:0px;'>";

        $body .= "<strong>Date of visit:</strong> " . date_format(date_create($appointment['date']), 'd-m-Y') . "<br>";
        $body .= "<strong>Date typed:</strong> " . date('d-m-Y');

        $body .= "<br><br><br><br>";

        $body .= ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . "<br>";
        $body .= $appointment['address']['address1'] . "," . $appointment['address']['address1'] . "<br>";
        $body .= $appointment['address']['city'] . "," . $appointment['address']['country'] . "," . $appointment['address']['postal'];

        $body .= "<br><br><br>";

        $body .= "Dear " . ucfirst($appointment['firstname']);
        $body .= "<br><br>";
        $body .= "<strong>Diagnosis:</strong> " . constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS'][$appointment['diagnosis']] . "<br>";
        $body .= "<br>";
        $body .= "<strong>Current Treatment:</strong><br>";
        $body .= "<table width='100%' border=1 style='border: 1px solid black; border-collapse:collapse;'>
                                       <tr>
                                            <th>Drug Name</th>
                                            <th>Frequency</th>
                                            <th>Instruction</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Eye</th>
                                        </tr>";

        if (!empty($prescription)) {
            foreach ($prescription['prescription'] as $key => $value) {
                $body .= "<tr>";
                $body .= "<td>" . $value['name'] . "</td>";
                $body .= "<td>" . $value['dose'] . "</td>";
                $body .= "<td>" . $value['instruction'] . "</td>";
                $body .= "<td>" . date_format(date_create($value['start_date']), 'd-m-Y') . "</td>";
                $body .= "<td>" . date_format(date_create($value['end_date']), 'd-m-Y') . "</td>";
                $body .= "<td>" . $value['eye'] . "</td>";
                $body .= "</tr>";
            }
        }else{
            $body .= "<tr>";
            $body .= "<td colspan='6' style='text-align: center'>Treatment does not specified.</td>";
            $body .= "</tr>";
        }
        $body .= "</table>";
        $body .= "<br>";

        $body .= "<strong>Follow up:</strong> ";
        $body .= (isset($appointment['gcp_next_appointment']) && !empty($appointment['gcp_next_appointment'])) ? constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$appointment['gcp_next_appointment']] : '';

        $body .= "<br>";

        $body .= "<p style='letter-spacing:0.6px; text-align: justify'>It was a pleasure to see you in my private clinic today. I am sending a copy of this letter to {GP: Name} so that you can get glaucoma medications on the repeat prescription. Please watch the video on introduction to eye drops on https://www.worcesterglaucoma.co.uk/. This website will help you to get an up to date education material on glaucoma and use the eye drops with correct drop technique. I shall see you again on your next visit. I am happy for you to get OCT of optic disc and threshold visual fields done at optician if available. Please arrange these test with your optician  or at hospital  before your next visit and bring the results with you on the next visit.</p>";

        $body .= "<br><br>";

        $body .= "Kind regards<br>Yours sincerely";

        $body .= "<br>";

        $body .= $doctor_data['name'] . "<br>" . $qualification . "<br>" . $position_specility;

        $body .= "</div>";

        //echo $pdf_body;exit;
        $filename = strtolower(str_replace(" ", "-", $appointment['name'])) . '-patient-letter.pdf';
        $this->generatePdfFile($appointment_id, $body, $filename, $action);
    }

    public function getVideoConsultationDetails($token)
    {
        if (empty($token)) {
            return false;
        } else {
            $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "video_consultation_session` WHERE video_consultation_token = '" . $token . "'");
        }
        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }


    public function getPatientCompletedAppointment($data)
    {

        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE patient_id ='" . $data['patient_id'] . "' AND status ='5' ");

        if ($query->num_rows > 0) {
            return $query->rows;
        } else {
            return false;
        }
    }

    public function getLastPatientAppointment($data)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE patient_id ='" . $data['patient_id'] . "' AND status ='5' ORDER BY date DESC");

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function getMaxIOPAppointment($data)
    {
        $query = $this->database->query("SELECT MAX(`intraocular_pressure_right`) AS iop_right,MAX(`intraocular_pressure_left`) AS iop_left FROM `" . DB_PREFIX . "appointments` WHERE patient_id ='" . $data['patient_id'] . "' AND status ='5' ORDER BY date DESC");

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }
}