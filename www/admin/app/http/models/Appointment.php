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
                $query = $this->database->query("SELECT a.*, d.id AS doctor_id, CONCAT(d.firstname, ' ', d.lastname) AS doctor, d.picture AS picture, d.email AS doctor_email, dep.name AS department, user.id AS patient_id , CONCAT(user.firstname, ' ', user.lastname) AS patient_fullname FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS dep ON dep.id = a.department_id LEFT JOIN `" . DB_PREFIX . "patients` AS user ON user.email = a.email WHERE a.date between '" . $period['start'] . "' AND '" . $period['end'] . "' AND a.is_glaucoma_required = 'YES' GROUP BY a.id ORDER BY date DESC, time DESC");
            } else {
                $query = $this->database->query("SELECT a.*, d.id AS doctor_id, CONCAT(d.firstname, ' ', d.lastname) AS doctor, d.picture AS picture, d.email AS doctor_email, dep.name AS department, user.id AS patient_id ,CONCAT(user.firstname, ' ', user.lastname) AS patient_fullname FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS dep ON dep.id = a.department_id LEFT JOIN `" . DB_PREFIX . "patients` AS user ON user.email = a.email WHERE a.date between '" . $period['start'] . "' AND '" . $period['end'] . "' GROUP BY a.id ORDER BY date DESC, time DESC");
            }
        } else {
            $query = $this->database->query("SELECT a.*, d.id AS doctor_id, CONCAT(d.firstname, ' ', d.lastname) AS doctor, d.picture AS picture, d.email AS doctor_email, dep.name AS department, user.id AS patient_id ,CONCAT(user.firstname, ' ', user.lastname) AS patient_fullname FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS dep ON dep.id = a.department_id LEFT JOIN `" . DB_PREFIX . "patients` AS user ON user.email = a.email WHERE a.date between '" . $period['start'] . "' AND '" . $period['end'] . "' AND a.doctor_id = '" . (int)$doctor . "' GROUP BY a.id ORDER BY date DESC, time DESC");
        }
        return $query->rows;
    }

    public function getAppointment($id, $doctor = NULL)
    {
        if ($doctor == NULL) {
            $query = $this->database->query("SELECT a.*, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department,dr.weekly,dr.national, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender,pt.title,pt.firstname,pt.lastname,pt.address,pt.dob, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.gp_name,pt.gp_address, pt.gp_postal_code, pt.nhs_patient_number, pt.dob as patient_dob, pt.gp_email FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.id = a.patient_id WHERE a.id = '" . (int)$id . "' LIMIT 1");
        } else {
            $query = $this->database->query("SELECT a.*, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department,dr.weekly,dr.national, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender,pt.title,pt.firstname,pt.lastname,pt.address,pt.dob, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.gp_name,pt.gp_address, pt.gp_postal_code,pt.nhs_patient_number, pt.dob as patient_dob, pt.gp_email FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.id = a.patient_id WHERE a.id = '" . (int)$id . "' AND a.doctor_id = '" . (int)$doctor . "' LIMIT 1");
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
            $query = $this->database->query("SELECT a.*,u.email AS opticianemail,u.user_name AS opticianname, a.status AS appointment_status, CONCAT(dr.title, ' ', dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id,pt.title,pt.hospital_code, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.dob as patient_dob, pt.gp_name, pt.gp_address, pt.gp_postal_code, pt.gp_email, pt.special_requirements,pt.firstname,pt.lastname FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email LEFT JOIN `" . DB_PREFIX . "users` AS u ON u.user_id = a.optician_id WHERE a.id = '" . (int)$id . "' LIMIT 1");
        } else {
            $query = $this->database->query("SELECT a.*,u.email AS opticianemail,u.user_name AS opticianname, a.status AS appointment_status, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id,pt.title,pt.hospital_code, pt.dob as patient_dob, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.gp_name, pt.gp_address, pt.gp_postal_code, pt.gp_email, pt.special_requirements,pt.firstname,pt.lastname FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email LEFT JOIN `" . DB_PREFIX . "users` AS u ON u.user_id = a.optician_id WHERE a.id = '" . (int)$id . "' AND a.doctor_id = '" . (int)$doctor . "' LIMIT 1");
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
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET `name` = ?, `email` = ?, `mobile` = ?,  `date` = ?, `time` = ?, `message` = ?, `slot` = ?, `department_id` = ?, `status` = ?, `typed_date` = ?, `doctor_id` = ?, `patient_id` = ?, consultation_type = ?, `session_id` = ?, token = ?, video_consultation_token = ?, doctor_note = ?, referee_name = ?, referee_address = ?, referee_email = ?  WHERE `id` = ? ", array($this->database->escape($data['name']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['date']), $this->database->escape($data['time']), $data['message'], $data['slot'], (int)$data['department'], (int)$data['status'], $this->database->escape($data['typed_date']), (int)$data['doctor'], (int)$data['patient_id'], $data['consultation_type'], $data['session_id'], $data['token'], $data['video_consultation_token'], $data['doctor_note'], $data['referee_name'], $data['referee_address'], $data['referee_email'], (int)$data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

	public function updateAppointmentNew($data)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET `name` = ?, `email` = ?, `mobile` = ?,  `date` = ?, `time` = ?, `slot` = ?, `department_id` = ?, `status` = ?, `doctor_id` = ?, `patient_id` = ?, consultation_type = ?, `session_id` = ?, token = ?, video_consultation_token = ?, referee_name = ?, referee_address = ?, referee_email = ?  WHERE `id` = ? ", array($this->database->escape($data['name']), $this->database->escape($data['mail']), $this->database->escape($data['mobile']), $this->database->escape($data['date']), $this->database->escape($data['time']), $data['slot'], (int)$data['department'], (int)$data['status'], (int)$data['doctor'], (int)$data['patient_id'], $data['consultation_type'], $data['session_id'], $data['token'], $data['video_consultation_token'], $data['referee_name'], $data['referee_address'], $data['referee_email'], (int)$data['id']));

        $patient_letter = $this->generatePatientOrGpDocHtml($data['id'], 'HTML');
        $optom_letter = $this->generateOptomOrThirdPartyDocHtml($data['id'], 'HTML');
        $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET patient_letter = ?, optom_letter = ? WHERE id = ? ", array($patient_letter, $optom_letter, $data['id']));


        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Update appointment status
    public function updateAppointmentStatus($id, $status)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET `status` = ? WHERE `id` = ? ", array((int)$status, (int)$id));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

	public function updateAppointmentStatusNew($id, $status)
    {
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET `status` = ? WHERE `id` = ? ", array((int)$status, (int)$id));

        $patient_letter = $this->generatePatientOrGpDocHtml($id, 'HTML');
        $optom_letter = $this->generateOptomOrThirdPartyDocHtml($id, 'HTML');
        $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET patient_letter = ?, optom_letter = ? WHERE id = ? ", array($patient_letter, $optom_letter, $id));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateExaminationNotes($data)
    {
        //echo "<pre>"; print_r($data);exit;
        $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET 
        `current_event` = ?,
        `allergy` = ?,
        `intraocular_pressure_right` = ? ,
        `visual_acuity_unaided_right` = ?,
        `visual_acuity_unaided_left` = ?,
        `visual_acuity_corrected_left` = ?,
        `visual_acuity_corrected_right` = ?,
        `intraocular_pressure_left` = ?,
        `anterior_chamber_right` = ?,
        `anterior_chamber_left` = ?, 
        `anterior_chamber_right_comment` = ?,
        `anterior_chamber_left_comment` = ?,
        `lens_right` = ?, 
        `lens_left` = ?,
        `disc_oct_comment_right` = ?,
        `disc_oct_comment_left` = ?,
        `nfl_thickness_right` = ?, 
        `nfl_thickness_left` = ?,
        `fundus_comment_right` = ?,
        `fundus_comment_left` = ?,
        `visual_field_test_plots_comment_right` = ?,
        `visual_field_test_plots_comment_left` = ?,
        `visual_field_progression_right` = ?,
        `visual_field_progression_left` = ?,
        `mean_deviation_right` = ?, 
        `mean_deviation_left` = ?,
        `psd_deviation_right` = ?,
        `psd_deviation_left` = ?, 
        `cct_right` = ?, 
        `cct_left` = ?, 
        `pupil_right` = ?, 
        `pupil_left` = ?, 
        
        `operation` = ?,
        `outcome` = ?,
        `outcome_comment` = ?,
        `gcp_next_appointment` = ?,
        `other_followup` = ?,
        `is_glaucoma_required` = ?, 
        `diagnosis_eye` = ?,
        `diagnosis` = ?,
        `diagnosis_other` = ?,
        `doctor_note` = ?,
        `doctor_note_optometrist` = ?,
        `special_condition` = ?,
        `family_history_of_glaucoma` = ?,
        `relations_with_glaucoma_patient` = ?
         WHERE `id` = ? ", array(
            $data['current_event'],
            $this->database->escape($data['allergy']),
            $this->database->escape($data['intraocular_pressure_right']),
            $this->database->escape($data['visual_acuity_unaided_right']),
            $this->database->escape($data['visual_acuity_unaided_left']),
            $this->database->escape($data['visual_acuity_corrected_right']),
            $this->database->escape($data['visual_acuity_corrected_left']),
            $data['intraocular_pressure_left'],
            $data['anterior_chamber_right'],
            $data['anterior_chamber_left'],
            $data['anterior_chamber_right_comment'],
            $data['anterior_chamber_left_comment'],
            $data['lens_right'],
            $data['lens_left'],
            $data['disc_oct_comment_right'],
            $data['disc_oct_comment_left'],
            (int)$data['nfl_thickness_right'],
            (int)$data['nfl_thickness_left'],
            $data['fundus_comment_right'],
            $data['fundus_comment_left'],
            $data['visual_field_test_plots_comment_right'],
            $data['visual_field_test_plots_comment_left'],
            $data['visual_field_progression_right'],
            $data['visual_field_progression_left'],
            $data['mean_deviation_right'],
            $data['mean_deviation_left'],
            $data['psd_deviation_right'],
            $data['psd_deviation_left'],
            $data['cct_right'],
            $data['cct_left'],
            $data['pupil_right'],
            $data['pupil_left'],
            
            $data['operation'],
            $data['outcome'],
            $data['outcome_comment'],
            $data['followup'],
            $data['other_followup'],
            $data['gcp_required'],
            $data['diagnosis_eye'],
            json_encode($data['diagnosis']),
            $data['diagnosis_other'],
            $data['doctor_note'],
            $data['doctor_note_optometrist'],
            $data['special_condition'],
            $data['family_history_of_glaucoma'],
            json_encode($data['relations_with_glaucoma_patient']),
            (int)$data['id']
        ));
        /***
         *        //Check database error
        if ($this->database->error()) {
            echo $this->database->error();
            print_r($data);exit;
            return false;
        } 
         */
        //$patient_letter = $this->generatePatientOrGpDocHtml($data['id'], 'HTML');
        //$optom_letter = $this->generateOptomOrThirdPartyDocHtml($data['id'], 'HTML');
        //$this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET patient_letter = ?, optom_letter = ? WHERE id = ? ", array($patient_letter, $optom_letter, $data['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            //echo "test";exit;
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
        //echo "<pre>";print_r($data);exit;

        $query = $this->database->query("UPDATE `" . DB_PREFIX . "prescription` SET `name` = ?, `email` = ?, `prescription` = ?, `doctor_id` = ?, `patient_id` = ? WHERE `id` = ? ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['mail']), $data['prescription']['medicine'], (int)$data['appointment']['doctor'], (int)$data['appointment']['patient_id'], (int)$data['prescription']['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function removePrescription($data)
    {
        //echo "<pre>";print_r($data);exit;

        if(!empty($data['prescription']['id']) AND is_numeric($data['prescription']['id'])){
            $this->database->query("DELETE FROM `" . DB_PREFIX . "prescription` WHERE `id` = ?", array((int)$data['prescription']['id']));

            return true;
        
        } else {
            return false;
        }
    
    }

    public function createPrescription($data)
    {

        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "prescription` (`name`, `email`, `prescription`, `doctor_id`, `appointment_id`, `patient_id`, `user_id`, `date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['mail']), $data['prescription']['medicine'], (int)$data['appointment']['doctor'], (int)$data['appointment']['id'], (int)$data['appointment']['patient_id'], (int)$data['appointment']['user_id'], $data['appointment']['datetime']));

        
        //$patient_letter = $this->generatePatientOrGpDocHtml($data['appointment']['id'], 'HTML');
        //$optom_letter = $this->generateOptomOrThirdPartyDocHtml($data['appointment']['id'], 'HTML');
        //$this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET patient_letter = ?, optom_letter = ? WHERE id = ? ", array($patient_letter, $optom_letter, $data['appointment']['id']));

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createAppointment($data)
    {

        if ($data['patient_id'] > 0) {

            $patient_detail_qry = $this->database->query("SELECT * FROM `" . DB_PREFIX . "patients` WHERE id = ?", array($data['patient_id']));

            $patient_detail = $patient_detail_qry->row;
            $data['referee_name'] = $patient_detail['optician_name'];
            $data['referee_email'] = $patient_detail['optician_email'];
            $data['referee_address'] = $patient_detail['optician_address'];
        }
        
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "appointments`(
        `optician_id`,
        `name`,
        `email`,
        `mobile`,
        `date`,
        `time`, 
        `slot`, 
        `department_id`, 
        `consultation_type`, 
        `status`, 
        `doctor_id`, 
        `patient_id`, 
        `date_of_joining`, 
        `appointment_id`,
        `hospital_code`,
        `referee_name`,
        `referee_email`,
        `referee_address`
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?) ", array(
            $data['optician_id'],
            $this->database->escape($data['name']),
            $this->database->escape($data['mail']),
            $this->database->escape($data['mobile']),
            $this->database->escape($data['date']),
            $this->database->escape($data['time']),
            $data['slot'],
            (int)$data['department'],
            $data['consultation_type'],
            (int)$data['status'],
            (int)$data['doctor'],
            (int)$data['patient_id'],
            $data['datetime'],
            $data['appointment_id'],
            $data['hospital_code'],
            $data['referee_name'],
            $data['referee_email'],
            $data['referee_address']
        ));

        if ($query->num_rows > 0) {
            $appointment_id = $this->database->last_id();

            if ($data['optician_id'] > 0) {

                $optician_detail_qry = $this->database->query("SELECT * FROM `" . DB_PREFIX . "users` WHERE user_id = ?", array($data['optician_id']));

                $optician_details = $optician_detail_qry->row;
                $referee_name = $optician_details['firstname'] . ' ' . $optician_details['lastname'];
                $referee_address = '';
                if(!empty($optician_details['address'])){
                    $referee_address_aar = json_decode($optician_details['address']);
                    $referee_address = $referee_address_aar->address1 . ', ' . $referee_address_aar->address2 . ', ' . $referee_address_aar->city . ' - ' . $referee_address_aar->postal;
                }

                $referee_email = $optician_details['email'];
                $query = $this->database->query("UPDATE " . DB_PREFIX . "appointments SET referee_name = ?, referee_address = ?, referee_email = ? WHERE id = ? ", array($referee_name, $referee_address, $referee_email, $appointment_id));
            }


            return $appointment_id;
        } else {
            echo '<pre>' . print_r($data);
            exit();
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
            // echo "Update";
            // print_r($query->row['id']);
            $insert_update_query = $this->database->query("UPDATE `" . DB_PREFIX . "appointment_notes` SET `name` = ?, `email` = ?, `notes` = ?, `appointment_id` = ?, `doctor_id` = ?, `patient_id` = ? WHERE `id` = ? ", array($this->database->escape($data['appointment']['name']), $this->database->escape($data['appointment']['email']), $data['notes']['notes'], (int)$data['appointment']['id'], (int)$data['appointment']['doctor'], (int)$data['appointment']['patient_id'], $query->row['id']));
        } else {
            // echo "insert";
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
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "reports` WHERE `appointment_id` = ? ORDER BY name ASC ", array((int)$id));
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
        if (isset($data['followupid']) AND is_numeric($data['followupid'])) {

            $images = $this->database->query("SELECT * FROM kk_referral_list_document WHERE followup_id='" . $data['followupid'] . "'");
        }
        if (isset($data['referralid']) AND is_numeric($data['referralid'])) {

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
                $this->database->query("INSERT INTO `" . DB_PREFIX . "reports` (`name`, `report`, `appointment_id`, `patient_id`, `user_id`) VALUES (?, ?, ?, ?, ?)", array($doc['name'], $doc['filename'], $data['id'], $data['patient_id'], $data['user_id']));
            }
        }
    }

    public function getAppointmentByVideoConsultationToken($token)
    {
        if (empty($token)) {
            return false;
        } else {
            $query = $this->database->query("SELECT a.*, a.status AS appointment_status, CONCAT(dr.firstname, ' ', dr.lastname) AS doctor_name, dr.email AS doctor_email, dr.mobile AS doctor_mobile, dr.picture AS doctor_picture, d.name AS department, p.id AS prescription_id, p.prescription AS prescription, pt.id AS patient_id, pt.bloodgroup, pt.gender, TIMESTAMPDIFF (YEAR, pt.dob, CURDATE()) AS age_year, TIMESTAMPDIFF(MONTH, pt.dob, now()) % 12 AS age_month, pt.history, pt.nhs_patient_number, pt.nhs_hospital_number, pt.gp_name, pt.gp_address, pt.gp_postal_code, pt.special_requirements FROM `" . DB_PREFIX . "appointments` AS a LEFT JOIN `" . DB_PREFIX . "doctors` AS dr ON dr.id = a.doctor_id LEFT JOIN `" . DB_PREFIX . "departments` AS d ON d.id = a.department_id LEFT JOIN `" . DB_PREFIX . "prescription` AS p ON p.appointment_id = a.id LEFT JOIN `" . DB_PREFIX . "patients` AS pt ON pt.email = a.email WHERE a.video_consultation_token = '" . $token . "' LIMIT 1");
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
        $about_doctor = json_decode($doctor_data['about'], true);

        $prescription = $this->model_appointment->getPrescription($appointment_id);
        $optician_data = $this->getOpticianDetails($appointment['optician_id']);
        if (!empty($optician_data['address'])) {
            $optician_address = json_decode($optician_data['address'], true);;
        }

        if (!empty($prescription)) {
            $prescription['prescription'] = json_decode($prescription['prescription'], true);
        } else {
            $prescription = NULL;
        }

        $body = "";

        $body .= "<div style='font-size:13px; padding-left:0px; padding-right:0px;'>";

		$body .=  "<table width='100%' border=0 cellspacing='0'>";
        $body .=  "<tr><td style='padding-right:15px;'  valign='top'><br><br>";

        $body .= "Date of visit: " . date_format(date_create($appointment['date']), 'd-m-Y') . "<br>";
        $body .= "Date typed: " . date('d-m-Y');

        //$body .= "<br>". $appointment['referee_address'];
        $body .= "<br><br>";
        $body .= ucfirst($appointment['referee_name']);
        if(strpos($appointment['referee_address'], ",") === false ){

        } else {
            foreach(explode(",", $appointment['referee_address']) AS $key => $address) {
                $body .= "<br>". $address;
            }
        }

        $body .= "</td><td width='202px' style='font-size: 12px; pandding:0px;' valign='top'>
        " . constant('APPOINTMENT_SIDE_BAR') . " 
        </td></tr></table>";
        
        $optician_first_name_arr = explode(" ", strtolower($appointment['referee_name']));
        if(in_array($optician_first_name_arr[0], ['mr.', 'mrs.', 'ms.', 'miss.', 'mr', 'mrs', 'ms', 'miss'])){
            $optician_first_name = ucfirst(strtolower($optician_first_name_arr[1]));
        } else {
            $optician_first_name = ucfirst(strtolower($optician_first_name_arr[0]));
        }

        $body .= "Dear " . $optician_first_name . ",<br><br>";

        $body .= "<u><b>"."Re: ".ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']);
        if (!empty($appointment['address'])) {
            $body .= !empty($appointment['address']['address1']) ? (", " . $appointment['address']['address1']) : '';
            $body .= !empty($appointment['address']['address2']) ? (", " . $appointment['address']['address2']) : '';
            $body .= !empty($appointment['address']['city']) ? (", " . $appointment['address']['city']) : '';
            $body .= !empty($appointment['address']['country']) ? (", " . $appointment['address']['country']) : '';
            $body .= !empty($appointment['address']['postal']) ? (" - " . $appointment['address']['postal']) : '';
        }
        $body .= "</b></u>";

        if (!empty($appointment['diagnosis']) OR !empty($appointment['diagnosis_other'])) {
            $body .= "<br><br>";
            $body .= "Diagnosis: <br>";// . constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'][$appointment['diagnosis_eye']];
            $count = 1;
            if (!empty($appointment['diagnosis'])) {
                foreach(json_decode($appointment['diagnosis'], true) AS $key => $diagnosis){
                    if(!empty($diagnosis)){
                        //$body .= "<br> &nbsp;&nbsp;&nbsp; ".$count . ". ".$diagnosis;
                        //$body .= "<br> &nbsp;&nbsp;&nbsp; <b>".constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'][$diagnosis['eye']] . "</b>: ".$diagnosis['name'];
                    }
                    $body .= "&nbsp;&nbsp;&nbsp; ". $count . " ";
                    if(!empty($diagnosis['eye'])){
                        $body .= constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'][$diagnosis['eye']] . ": ";
                    }
                    if(!empty($diagnosis['name'])){
                        $body .= $diagnosis['name'];
                    }
                    $body .= "<br>";
                    $count++;
                }
            }
            if (!empty($appointment['diagnosis_other'])) {
                //$body .= "<br> &nbsp;&nbsp;&nbsp; ".$count . ". " . $appointment['diagnosis_other'];
                $body .= "&nbsp;&nbsp;&nbsp;  " . $appointment['diagnosis_other']."<br>";
            }
        }
		
        /*if (!empty($appointment['diagnosis_re']) OR !empty($appointment['diagnosis_other_re']) 
                OR !empty($appointment['diagnosis_le']) OR !empty($appointment['diagnosis_other_le'])) {
            $body .= "<br><br>";
            $body .= "Diagnosis";
            $body .= "<table width='100%' border=0 style='border: 0px solid black; border-collapse:collapse;' align=center>
                            <tr>
                                <th align='left'>Right eye</th>
                                <th align='left'>Left eye</th>
                            </tr>";
            if (!empty($appointment['diagnosis_re']) OR !empty($appointment['diagnosis_le'])) {        
                $body .= "<tr><td align='left'>";
                    $re_count = 1;
                    if (!empty($appointment['diagnosis_re'])) {
                        foreach(json_decode($appointment['diagnosis_re'], true) AS $key => $diagnosis){
                            if(!empty($diagnosis)){
                                //$body .= "<li>". $diagnosis."</li>";
                                $body .= $re_count . ". ".$diagnosis."<br>";
                            }
                            $re_count++;
                        }
                    }
                $body .= "</td><td align='left'>";
                    $le_count = 1;
                    if (!empty($appointment['diagnosis_le'])) {
                        foreach(json_decode($appointment['diagnosis_le'], true) AS $key => $diagnosis){
                            if(!empty($diagnosis)){
                                //$body .= "<li>". $diagnosis."</li>";
                                $body .= $le_count . ". ".$diagnosis."<br>";
                            }
                            $le_count++;
                        }
                    }
                $body .= "</td></tr>";
            }
            if (!empty($appointment['diagnosis_other_re']) OR !empty($appointment['diagnosis_other_le'])) {        
                $body .= "<tr>
                            <td align='left'>".$re_count. ". ".$appointment['diagnosis_other_re']."</td>
                            <td align='left'>".$le_count. ". ".$appointment['diagnosis_other_le']."</td>
                        </tr>";
            }
            $body .= "</table>";
        }*/
        
        if (!empty($appointment['operation'])) {
            $body .= "<br>";
            //$body .= !empty($appointment['diagnosis']) ? ", " : "";
            $body .= "Operation: ".$appointment['operation'];
        }
		

        if (!empty($prescription)) {
            $body .= "<br><br>";
            $body .= "Current Treatment:<br>";
            $body .= "<table width='100%' border=1 style='border: 1px solid black; border-collapse:collapse;' align=center>
                                       <tr>
                                            <th align='left'> &nbsp; Drug Name</th>
                                            <th align='left'> &nbsp; Frequency</th>
                                            <th align='left'> &nbsp; Eye</th>
                                        </tr>";

        
            foreach ($prescription['prescription'] as $key => $value) {
                $body .= "<tr>";
                $body .= "<td> &nbsp; " . $value['name'] . "</td>";
                $body .= "<td> &nbsp; " . constant('PRESCRIPTION_FREQUENCY')[$value['duration']] . "</td>";
                $body .= "<td> &nbsp; " . constant('PRESCRIPTION_DROP_DOWNS')['PRESCRIPTION_EYE'][$value['eye']] . "</td>";
                $body .= "</tr>";
            }
            $body .= "</table>";
            
        }

        if (!empty($appointment['gcp_next_appointment'])) {
            $body .= "<br>";
            $body .= "<strong>Follow up: ";
            $body .= constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$appointment['gcp_next_appointment']]['name'] . "</strong>";
        }
        if (!empty($appointment['other_followup'])) {
            $body .= "<br>";
            $body .= "<strong>Follow up: ".$appointment['other_followup'];
        }
        
        if (!empty($appointment['doctor_note_optometrist'])) {
            $body .= "<br>";
            $body .= $appointment['doctor_note_optometrist'];
        }

        //$body .= "<p style='letter-spacing:0.6px'>Thank you for your kind referral for " . ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . " to my private Complex Glaucoma/ Cataract clinic.</p>";

        $body .= "<br><br>";

        $body .= "Kind regards,<br/><br/>Yours sincerely<br>";
        $body .= "<img src='" . URL_ADMIN . "public/images/dr_sharma_sign.png' width='22%' alt='Icon'>";
        $body .= '<br><strong>'.$doctor_data['name'];
        $body .= (!empty($about_doctor['degree']) and !is_null($about_doctor['degree'])) ? ("<br>" . $about_doctor['degree']) : "";
        $body .= (!empty($about_doctor['position']) and !is_null($about_doctor['position'])) ? ("<br>" . $about_doctor['position']) : "";
        $body .= "</strong>";
        
        $body .= "<br><br>";
       
            $body .= "<span style='font-size:12px'>";
            $body .= "CC:"."<br><br>";
            $body .= ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . "<br>";
            if (!empty($appointment['address'])) {
                $body .= $appointment['address']['address1'];
                $body .= !empty($appointment['address']['address2']) ? ("<br> " . $appointment['address']['address2']) : '';
                $body .= !empty($appointment['address']['city']) ? ("<br> " . $appointment['address']['city']) : '';
                $body .= !empty($appointment['address']['country']) ? ("<br> " . $appointment['address']['country']) : '';
                $body .= !empty($appointment['address']['postal']) ? ("<br> " . $appointment['address']['postal']) : '';
            }$body .= "</span>";
        
        $body .= "</div>";
        // echo $body;
        // exit;
        $filename = str_replace(" ", "-", $appointment['name']) . '-third-party-letter.pdf';
        $this->generatePdfFile($appointment_id, $body, $filename, $action);
    }

    public function getAppointmentDocHeaderFooter($appointment_id)
    {
        $appointment = $this->getAppointment($appointment_id);

        $doctor_data = $this->getDoctorData($appointment['doctor_id']);
        $doctor_address = $this->getDoctorAddress($appointment['doctor_id']);
        $about_doctor = json_decode($doctor_data['about'], true);

        $dr_qualification_position_specility = "";
        $dr_qualification_position_specility .= (!empty($about_doctor['position']) and !is_null($about_doctor['position'])) ? ($about_doctor['position']) : "";
        $dr_qualification_position_specility .= (!empty($about_doctor['degree']) and !is_null($about_doctor['degree'])) ? ("<br>" . $about_doctor['degree']) : "";

        $specility_lin_1 = (!empty($about_doctor['degree']) and !is_null($about_doctor['degree'])) ? ($about_doctor['degree']) : "";

        $dr_qualification_position_specility .= (!empty($about_doctor['specility']) and !is_null($about_doctor['specility'])) ? ("<br>" . $about_doctor['specility']) : "";
        $specility_lin_2 = (!empty($about_doctor['specility']) and !is_null($about_doctor['specility'])) ? ("<br>" . $about_doctor['specility']) : "";

        $dr_qualification_position_specility .= (!empty($about_doctor['awards']) and !is_null($about_doctor['awards'])) ? ("<br>" . $about_doctor['awards']) : "";
        // $specility_lin_2 .= (!empty($about_doctor['awards']) and !is_null($about_doctor['awards'])) ? (" " . $about_doctor['awards']) : "";
        $this->load->model('commons');
        $common = $this->model_commons->getCommonData($this->session->data['user_id']);

        // Set Header
        $doc_logo = (isset($doctor_data['logo']) and !empty($doctor_data['logo'])) ? $doctor_data['logo'] : $common['info']['logo'];
        $header = "<table style='width:100%;' border=0 >" .
            "<tr>" .
            "<td align=right width='60%'>
					<div style='text-align:left; color: #333;'>
						<div><span style='font-size:20px; font-weight:bold;'>" . $doctor_data['name'] . "</span>
                        <span style='font-size:12px; font-weight:bold;'>" . html_entity_decode($specility_lin_1) . "</span>
                        <span style='font-size:12px; font-weight:bold;'>" . html_entity_decode($specility_lin_2) . "</span>
                        </div>
						<!-- <span style='font-size: 13px;'>" . html_entity_decode($dr_qualification_position_specility) . "</span> -->
					</div>
				    
				</td>" .   
            "<td width=40% align='left'>
                <img src='" . URL_ADMIN . "public/images/picture1.jpg' width='80%' alt='Icon'>
                </td>" .
            "</tr>" .
            "<tr>
            <td colspan=2>
            <table style='width:100%;' border=0 cellspacing='0'>
                <tr>";
                
        $header .= "<td width='37%' style='padding:0px; color: #333; font-size: 10px;'><strong>" . $doctor_address[0]['title'] . "</strong>
            <br>" . $doctor_address[0]['address'] . ", " . $doctor_address[0]['city'] . ", " . $doctor_address[0]['pincode'] . "
            </td>";
            $header .= "<td width='36%' style='padding:0px; color: #333; font-size: 10px;'><strong>" . $doctor_address[1]['title'] . "</strong>
            <br>" . $doctor_address[1]['address'] . ", " . $doctor_address[1]['city'] . ", " . $doctor_address[1]['pincode'] . "
            </td>";
            $header .= "<td width='28%' style='padding:0px; color: #333; font-size: 10px;'><strong>" . $doctor_address[2]['title'] . "</strong>
            <br>" . $doctor_address[2]['address'] . ", " . $doctor_address[2]['city'] . ", " . $doctor_address[2]['pincode'] . "
            </td>";
        $header .= "</tr>
        </table>
        </td></tr>" .
            "</table>";

        // Set footer
        $footer = "<table style='width:100%' border=0 font-size: 9px;'>";
        $footer .= "<tr><td style='font-size:12px;' align='center'>".constant('FOOTER_LINE_1')."</td></tr>";
        $footer .= "<tr><td style='font-size:12px;' align='center'>".constant('FOOTER_LINE_2')."</td></tr>";
        $footer .= "<tr><td style='font-size:10px;' align='center'>".constant('FOOTER_LINE_3')."</td></tr>";
        $footer .= "<tr><td style='font-size:10px;' align='center'>".constant('FOOTER_LINE_4')."</td></tr>";
        $footer .= "</table>";

        $head = "<head>
        <style>
          
          li { font-size: 13px; }
          H4 { margin-bottom: 0px}
          @page {
              margin: 150px 80px 70px 80px;
          }
          header {
              position: fixed; top: -120px; left: 0px; right: 0px; height: 100px;
          }
          footer {
              position: fixed; bottom: -70px; left: 0px; right: 0px; height: 80px; 
              padding-top: 20px;
          }
          body {  
              font-family: 'Helvetica Neue, Helvetica, Arial, sans-serif';
          }
        </style>
      </head>";

        return ["header" => $header, "footer" => $footer, "head" => $head];
    }

    public function generatePdfFile($appointment_id, $pdf_body, $filename, $action)
    {

        $doc_header_footer = $this->getAppointmentDocHeaderFooter($appointment_id);

        $pdf_body = "<!DOCTYPE html>
        <html lang='en'>
		" . $doc_header_footer['head'] . "
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
            $dompdf->stream($filename, array("Attachment" => false));
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

        if (!empty($prescription)) {
            $prescription['prescription'] = json_decode($prescription['prescription'], true);
        } else {
            $prescription = NULL;
        }

        $body = "";

        $body .= "<div style='font-size:13px; padding-left:0px; padding-right:0px;'>";

		$body .=  "<table width='100%' border=0 cellspacing='0'>";
        $body .=  "<tr><td style='padding-right:15px;' valign='top'><br><br>";
		
        $body .= "Date of visit: " . date_format(date_create($appointment['date']), 'd-m-Y') . "<br>";
        $body .= "Date typed: " . date_format(date_create($appointment['typed_date']), 'd-m-Y') . "<br>";

        $body .= "<br><br>";

        $body .= $appointment['title'] . " " . ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . "<br>";
        if (!empty($appointment['address'])) {
            $body .= $appointment['address']['address1'];
            $body .= !empty($appointment['address']['address2']) ? ("<br>" . $appointment['address']['address2']) : '';
            $body .= !empty($appointment['address']['city']) ? ("<br>" . $appointment['address']['city']) : '';
            $body .= !empty($appointment['address']['country']) ? ("<br>" . $appointment['address']['country']) : '';
            $body .= !empty($appointment['address']['postal']) ? ("<br>" . $appointment['address']['postal']) : '';
        }
        
        
        $body .= "</td><td width='202px' style='font-size: 12px; pandding:0px;' valign='top'>
        " . constant('APPOINTMENT_SIDE_BAR') . " 
        </td></tr></table>";
        
        $patient_first_name_arr = explode(" ", strtolower($appointment['firstname']));
        if(in_array($patient_first_name_arr[0], ['mr.', 'mrs.', 'ms.', 'miss.', 'mr', 'mrs', 'ms', 'miss'])){
            $patient_first_name = ucfirst(strtolower($patient_first_name_arr[1]));
        } else {
            $patient_first_name = ucfirst(strtolower($patient_first_name_arr[0]));
        }

        $body .= "Dear " . $appointment['title'] . ' ' . $appointment['lastname'] . ",";
        
        if (!empty($appointment['diagnosis']) OR !empty($appointment['diagnosis_other'])) {
            $body .= "<br><br>";
            $body .= "Diagnosis: <br>";// . constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'][$appointment['diagnosis_eye']];
            $count = 1;
            if (!empty($appointment['diagnosis'])) {
                foreach(json_decode($appointment['diagnosis'], true) AS $key => $diagnosis){
                    if(!empty($diagnosis)){
                        //$body .= "<br> &nbsp;&nbsp;&nbsp; ".$count . ". ".$diagnosis;
                        //$body .= "<br> &nbsp;&nbsp;&nbsp; <b>".constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'][$diagnosis['eye']] . "</b>: ".$diagnosis['name'];
                    }
                    $body .= "&nbsp;&nbsp;&nbsp; ". $count . " ";
                    if(!empty($diagnosis['eye'])){
                        $body .= constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS_EYE'][$diagnosis['eye']] . ": ";
                    }
                    if(!empty($diagnosis['name'])){
                        $body .= $diagnosis['name'];
                    }
                    $body .= "<br>";
                    $count++;
                }
            }
            if (!empty($appointment['diagnosis_other'])) {
                //$body .= "<br> &nbsp;&nbsp;&nbsp; ".$count . ". " . $appointment['diagnosis_other'];
                $body .= "&nbsp;&nbsp;&nbsp;  " . $appointment['diagnosis_other']."<br>";
            }
        }
        
        if (!empty($appointment['operation'])) {
            $body .= "<br>";
            $body .= "Operation: ".$appointment['operation'];
        }

        if (!empty($prescription)) {
            $body .= "<br><br>Current Treatment:<br>";
            $body .= "<table width='100%' border=1 style='border: 1px solid black; border-collapse:collapse;' align=center>
                                       <tr>
                                            <th align='left'> &nbsp; Drug Name</th>
                                            <th align='left'> &nbsp; Frequency</th>
                                            <th align='left'> &nbsp; Eye</th>
                                        </tr>";

        
            foreach ($prescription['prescription'] as $key => $value) {
                $body .= "<tr>";
                $body .= "<td> &nbsp; " . $value['name'] . "</td>";
                $body .= "<td> &nbsp; " . constant('PRESCRIPTION_FREQUENCY')[$value['duration']] . "</td>";
                $body .= "<td> &nbsp; " . constant('PRESCRIPTION_DROP_DOWNS')['PRESCRIPTION_EYE'][$value['eye']] . "</td>";
                $body .= "</tr>";
            }
            $body .= "</table>";
            
        }

        if (!empty($appointment['gcp_next_appointment'])) {
            $body .= "<br>";
            $body .= "<strong>Follow up: ";
            $body .= constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$appointment['gcp_next_appointment']]['name'] . "</strong>";
        }
        if (!empty($appointment['other_followup'])) {
            $body .= "<br>";
            $body .= "<strong>Follow up: ".$appointment['other_followup'];
        }

        if (!empty($appointment['doctor_note'])) {
            $body .= "<br><br>";
            $body .= $appointment['doctor_note'];
        }
        $body .= "<br>";
        $gp_name = (!empty($appointment['gp_name']) and !is_null($appointment['gp_name'])) ? $appointment['gp_name'] : "";
        $gp_address = (!empty($appointment['gp_address']) and !is_null($appointment['gp_address'])) ? $appointment['gp_address'] : "";
        //$body .= "<p style='letter-spacing:0.6px; text-align: justify'>It was a pleasure to see you in my private clinic today. I am sending a copy of this letter to " . $gp_name . ", " . $appointment['gp_address'] . ". so that you can get glaucoma medications on the repeat prescription. Please watch the video on introduction to eye drops on https://www.worcesterglaucoma.co.uk/. This website will help you to get an up to date education material on glaucoma and use the eye drops with correct drop technique. I shall see you again on your next visit. I am happy for you to get OCT of optic disc and threshold visual fields done at optician if available. Please arrange these test with your optician  or at hospital  before your next visit and bring the results with you on the next visit.</p>";

        $body .= "<br><br>";

        $body .= "Kind regards,<br/><br/>Yours sincerely<br>";
        $body .= "<img src='" . URL_ADMIN . "public/images/dr_sharma_sign.png' width='22%' alt='Icon'>";
        $body .= '<br><strong>'.$doctor_data['name'];
        $body .= (!empty($about_doctor['degree']) and !is_null($about_doctor['degree'])) ? ("<br>" . $about_doctor['degree']) : "";
        $body .= (!empty($about_doctor['position']) and !is_null($about_doctor['position'])) ? ("<br>" . $about_doctor['position']) : "";
        $body .= "</strong>";

		$referee_name = (!empty($appointment['referee_name']) and !is_null($appointment['referee_name'])) ? $appointment['referee_name'] : "";
        $referee_address = (!empty($appointment['referee_address']) and !is_null($appointment['referee_address'])) ? $appointment['referee_address'] : "";
        
        if(!empty($gp_name) OR !empty($referee_name)){
			$body .= "<br><br>";
            $body .= "<span style='font-size:12px'>";
            $body .= "CC:"."<br><br>";

				$body .= "<table border=0 width='80%'>";
				$body .= "<tr>";
				
					if(!empty($gp_name)){
						$body .= "<td width='50%' valign='top'>";
						$body .= "GP<br>";
						$body .= (!empty($gp_name)) ? ('<strong>'.$gp_name.'</strong><br>') : '';
						if(!empty($gp_address)){
						$referee_address_arr = explode(',', str_replace(', ', ',', $gp_address));
							foreach($referee_address_arr as $address){
								$body .= ucfirst(strtolower($address))."<br>";
							}
						}
						$body .= (!empty($appointment['gp_postal_code'])) ? ($appointment['gp_postal_code']) : "";
						$body .= "</td>";
					}
					
					if(!empty($referee_name)){
						$body .= "<td width='50%' valign='top'>";
						$body .= "Optician / Third Party<br>";
						$body .= (!empty($referee_name)) ? ('<strong>'.$referee_name.'</strong><br>') : '';
						if(!empty($referee_address)){
							$referee_address_arr = explode(',', str_replace(', ', ',', $referee_address));
							foreach($referee_address_arr as $address){
								$body .= ucfirst(strtolower($address))."<br>";
							}
						}
						$body .= "</td>";
					}

				$body .= "</tr>";
				$body .= "</table>";
            $body .= "</span>";
        }
		
        $body .= "</div>";

        // echo $body;exit;

        $filename = strtolower(str_replace(" ", "-", $appointment['name'])) . '-patient-letter.pdf';
        $this->generatePdfFile($appointment_id, $body, $filename, $action);
    }

    public function generateToOptomOrThirdPartyDocNew($appointment_id, $action)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments`  WHERE id = '" . (int)$appointment_id . "' LIMIT 1");

        $data = $query->row;
        $pdf_body = $data['optom_letter'];
        $filename = str_replace(" ", "-", $data['name']) . '-third-party-letter.pdf';
        $this->generatePdfFile($appointment_id, $pdf_body, $filename, $action);
    }

    public function generateToPatientOrGpDocNew($appointment_id, $action)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments`  WHERE id = '" . (int)$appointment_id . "' LIMIT 1");

        $data = $query->row;
        $pdf_body = $data['patient_letter'];
        //$pdf_body = $this->generatePatientOrGpDocHtml($appointment_id);
        $filename = str_replace(" ", "-", $data['name']) . '-patient-letter.pdf';
        $this->generatePdfFile($appointment_id, $pdf_body, $filename, $action);
    }

    public function generateOptomOrThirdPartyDocHtmlNew($appointment_id){

        $doc_header_footer = $this->getAppointmentDocHeaderFooter($appointment_id);

        $appointment = $this->getAppointment($appointment_id);
        $appointment['address'] = json_decode($appointment['address'], true);

        $doctor_data = $this->getDoctorData($appointment['doctor_id']);
        $about_doctor = json_decode($doctor_data['about'], true);

        $prescription = $this->model_appointment->getPrescription($appointment_id);
        $optician_data = $this->getOpticianDetails($appointment['optician_id']);
        if (!empty($optician_data['address'])) {
            $optician_address = json_decode($optician_data['address'], true);;
        }

        if (!empty($prescription)) {
            $prescription['prescription'] = json_decode($prescription['prescription'], true);
        } else {
            $prescription = NULL;
        }

        $body = "";

        $body .= "<div style='font-size:13px; padding-left:0px; padding-right:0px;'>";

		$body .=  "<table width='100%' border=0 cellspacing='0'>";
        $body .=  "<tr><td style='padding-right:15px;'  valign='top'>";

        $body .= "Date of visit: " . date_format(date_create($appointment['date']), 'd-m-Y') . "<br>";
        $body .= "Date typed: " . date('d-m-Y');

        //$body .= "<br>". $appointment['referee_address'];
        $body .= "<br><br>";
        if(strpos($appointment['referee_address'], ",") === false ){

        } else {
            foreach(explode(",", $appointment['referee_address']) AS $key => $address) {
                $body .= "<br>". $address;
            }
        }

        $body .= "</td><td width='220px' style='font-size: 12px; pandding:0px;' valign='top'>
        " . constant('APPOINTMENT_SIDE_BAR') . " 
        </td></tr></table>";
        

        $body .= "Dear " . ucfirst($appointment['referee_name']) . ",<br><br>";

        $body .= ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . "<br>";
        if (!empty($appointment['address'])) {
            $body .= $appointment['address']['address1'] . "<br>" . $appointment['address']['address2'] . "<br>";
            $body .= $appointment['address']['city'] . "<br>" . $appointment['address']['country'] . "<br>" . $appointment['address']['postal'];
        }

        if (!empty($appointment['diagnosis']) OR !empty($appointment['diagnosis_other'])) {
            $body .= "<br><br>";
            $body .= "Diagnosis:<br>";
            $body .= "<ol>";
            if (!empty($appointment['diagnosis'])) {
                foreach(json_decode($appointment['diagnosis'], true) AS $key => $diagnosis){
                    if(!empty($diagnosis)){
                        $body .= "<li>". $diagnosis."</li>";
                    }
                }
            }
            if (!empty($appointment['diagnosis_other'])) {
                $body .= "<li>". $appointment['diagnosis_other']."</li>";
            }
            $body .= "</ol>";
        }

        $body .= "<br><br>";
        if (!empty($appointment['operation'])) {
            //$body .= !empty($appointment['diagnosis']) ? ", " : "";
            $body .= "Operation: ".$appointment['operation'];
        }
		
		

        if (!empty($prescription)) {
            $body .= "<br><br>";
            $body .= "Current Treatment:<br>";
            $body .= "<table width='100%' border=1 style='border: 1px solid black; border-collapse:collapse;' align=center>
                                       <tr>
                                            <td align='left'> &nbsp; Drug Name</td>
                                            <td align='left'> &nbsp; Frequency</td>
                                            <td align='left'> &nbsp; Eye</td>
                                        </tr>";

        
            foreach ($prescription['prescription'] as $key => $value) {
                $body .= "<tr>";
                $body .= "<td> &nbsp; " . $value['name'] . "</td>";
                $body .= "<td> &nbsp; " . $value['duration'] . "</td>";
                $body .= "<td> &nbsp; " . $value['eye'] . "</td>";
                $body .= "</tr>";
            }
            $body .= "</table>";
            
        }

        if (!empty($appointment['gcp_next_appointment'])) {
            $body .= "<br><br>";
            $body .= "<strong>Follow up: ";
            $body .= constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$appointment['gcp_next_appointment']]['name'] . "</strong>";
        }
        
        $body .= "<br>";
        if (!empty($appointment['doctor_note_optometrist'])) {
            $body .= "<br><br>";
            $body .= "<strong>Doctor's Comments:</strong> ";
            $body .= $appointment['doctor_note_optometrist'];
        }

        $body .= "<br><br>";

        $body .= "<p style='letter-spacing:0.6px'>Thank you for your kind referral for " . ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . " to my private Complex Glaucoma/ Cataract clinic.</p>";

        $body .= "<br><br>";

        $body .= "Kind regards<br>Yours sincerely<br>";
        $body .= "<img src='" . URL_ADMIN . "public/images/dr_sharma_sign.png' width='22%' alt='Icon'>";
        $body .= '<br><strong>'.$doctor_data['name'];
        $body .= (!empty($about_doctor['degree']) and !is_null($about_doctor['degree'])) ? ("<br>" . $about_doctor['degree']) : "";
        $body .= (!empty($about_doctor['position']) and !is_null($about_doctor['position'])) ? ("<br>" . $about_doctor['position']) : "";
        $body .= "</strong>";

        $body .= "</div>";

        $pdf_body = "<!DOCTYPE html>
        <html lang='en'>
		" . $doc_header_footer['head'] . "
		<body>
		  <header>" . $doc_header_footer['header'] . "</header>
		  <footer>" . $doc_header_footer['footer'] . "</footer>
		  <main>" . $body . "</main>
		</body>
		</html>";

        return $pdf_body;

    }

    public function generatePatientOrGpDocHtmlNew($appointment_id){
        $doc_header_footer = $this->getAppointmentDocHeaderFooter($appointment_id);

        $appointment = $this->getAppointment($appointment_id);
        //echo "<pre>"; print_r($appointment);exit;
        $appointment['address'] = json_decode($appointment['address'], true);
        $doctor_data = $this->getDoctorData($appointment['doctor_id']);
        $prescription = $this->model_appointment->getPrescription($appointment_id);

        $about_doctor = json_decode($doctor_data['about'], true);

        if (!empty($prescription)) {
            $prescription['prescription'] = json_decode($prescription['prescription'], true);
        } else {
            $prescription = NULL;
        }

        $body = "";

        $body .= "<div style='font-size:13px; padding-left:0px; padding-right:0px;'>";

		$body .=  "<table width='100%' border=0 cellspacing='0'>";
        $body .=  "<tr><td style='padding-right:15px;'  valign='top'>";
		
        $body .= "Date of visit: " . date_format(date_create($appointment['date']), 'd-m-Y') . "<br>";
        $body .= "Date typed: " . date('d-m-Y');

        $body .= "<br><br>";

        $body .= ucfirst($appointment['firstname']) . " " . ucfirst($appointment['lastname']) . "<br>";
        if (!empty($appointment['address'])) {
            //$body .= "<strong>Address:</strong> " . $appointment['address']['address1'] . ", " . $appointment['address']['address2'] . "<br>";
            //$body .= $appointment['address']['city'] . ", " . $appointment['address']['country'] . ", " . $appointment['address']['postal'];
            $body .= $appointment['address']['address1'];
            $body .= !empty($appointment['address']['address2']) ? ("<br>" . $appointment['address']['address2']) : '';
            $body .= !empty($appointment['address']['city']) ? ("<br>" . $appointment['address']['city']) : '';
            $body .= !empty($appointment['address']['country']) ? ("<br>" . $appointment['address']['country']) : '';
            $body .= !empty($appointment['address']['postal']) ? ("<br>" . $appointment['address']['postal']) : '';
        }
              
        $body .= "</td><td width='220px' style='font-size: 12px; pandding:0px;' valign='top'>
        " . constant('APPOINTMENT_SIDE_BAR') . " 
        </td></tr></table>";
        
        $body .= "Dear " . ucfirst($appointment['firstname']);
        
        if (!empty($appointment['diagnosis']) OR !empty($appointment['diagnosis_other'])) {
            $body .= "<br><br>";
            $body .= "Diagnosis:<br>";
            $body .= "<ol>";
            if (!empty($appointment['diagnosis'])) {
                foreach(json_decode($appointment['diagnosis'], true) AS $key => $diagnosis){
                    if(!empty($diagnosis)){
                        $body .= "<li>". $diagnosis."</li>";
                    }
                }
            }
            if (!empty($appointment['diagnosis_other'])) {
                $body .= "<li>". $appointment['diagnosis_other']."</li>";
            }
            $body .= "</ol>";
        }

        $body .= "<br><br>";
        if (!empty($appointment['operation'])) {
            //$body .= !empty($appointment['diagnosis']) ? ", " : "";
            $body .= "Operation: ".$appointment['operation'];
        }

        if (!empty($prescription)) {
            $body .= "<br><br>";
            $body .= "Current Treatment:<br>";
            $body .= "<table width='100%' border=1 style='border: 1px solid black; border-collapse:collapse;' align=center>
                                       <tr>
                                            <td align='left'> &nbsp; Drug Name</td>
                                            <td align='left'> &nbsp; Frequency</td>
                                            <td align='left'> &nbsp; Eye</td>
                                        </tr>";

        
            foreach ($prescription['prescription'] as $key => $value) {
                $body .= "<tr>";
                $body .= "<td> &nbsp; " . $value['name'] . "</td>";
                $body .= "<td> &nbsp; " . $value['duration'] . "</td>";
                $body .= "<td> &nbsp; " . $value['eye'] . "</td>";
                $body .= "</tr>";
            }
            $body .= "</table>";
            
        }

        if (!empty($appointment['gcp_next_appointment'])) {
            $body .= "<br><br>";
            $body .= "<strong>Follow up: ";
            $body .= constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$appointment['gcp_next_appointment']]['name'] . "</strong>";
        }

        if (!empty($appointment['doctor_note'])) {
            $body .= "<br><br>";
            $body .= "<strong>Doctor's Comments:</strong> ";
            $body .= $appointment['doctor_note'];
        }
        $body .= "<br>";
        $gp_name = (!empty($appointment['referee_name']) and !is_null($appointment['referee_name'])) ? $appointment['referee_name'] : "Practice Manager";
        $body .= "<p style='letter-spacing:0.6px; text-align: justify'>It was a pleasure to see you in my private clinic today. I am sending a copy of this letter to " . $gp_name . ", " . $appointment['referee_address'] . ". so that you can get glaucoma medications on the repeat prescription. Please watch the video on introduction to eye drops on https://www.worcesterglaucoma.co.uk/. This website will help you to get an up to date education material on glaucoma and use the eye drops with correct drop technique. I shall see you again on your next visit. I am happy for you to get OCT of optic disc and threshold visual fields done at optician if available. Please arrange these test with your optician  or at hospital  before your next visit and bring the results with you on the next visit.</p>";

        $body .= "<br><br>";

        $body .= "Kind regards<br>Yours sincerely<br>";
        $body .= "<img src='" . URL_ADMIN . "public/images/dr_sharma_sign.png' width='22%' alt='Icon'>";
        $body .= '<br><strong>'.$doctor_data['name'];
        $body .= (!empty($about_doctor['degree']) and !is_null($about_doctor['degree'])) ? ("<br>" . $about_doctor['degree']) : "";
        $body .= (!empty($about_doctor['position']) and !is_null($about_doctor['position'])) ? ("<br>" . $about_doctor['position']) : "";
        $body .= "</strong>";

        $body .= "<br><br>";
        $body .= "CC:"."<br>";
        $body .= (!empty($gp_name)) ? ('<strong>'.$gp_name.'</strong><br>') : '';
        if(!empty($appointment['referee_address'])){
            $referee_address_arr = explode(',', str_replace(', ', ',', $appointment['referee_address']));
            foreach($referee_address_arr as $address){
                $body .= $address."<br>";
            }
        }
        $body .= "</div>";

        $pdf_body = "<!DOCTYPE html>
        <html lang='en'>
		" . $doc_header_footer['head'] . "
		<body>
		  <header>" . $doc_header_footer['header'] . "</header>
		  <footer>" . $doc_header_footer['footer'] . "</footer>
		  <main>" . $body . "</main>
		</body>
		</html>";

        return $pdf_body;
    }

    public function generatePdfFileNew($appointment_id, $pdf_body, $filename, $action)
    {
        //echo $pdf_body;exit;
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
            $dompdf->stream($filename, array("Attachment" => false));
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

        //$query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE patient_id ='" . $data['patient_id'] . "' AND status ='5' ");
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE patient_id ='" . $data['patient_id'] . "' ");

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

    public function getOpticianDetails($optician_id)
    {
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "users` WHERE user_id ='" . $optician_id . "'");

        if ($query->num_rows > 0) {
            return $query->row;
        } else {
            return false;
        }
    }

    public function getLastAppointmentPrescription($appointment_id, $patient_id){
        //echo $appointment_id. ' - ' .$patient_id;exit;

        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE patient_id ='" . $patient_id . "' AND id <> '".$appointment_id."' ORDER BY date DESC LIMIT 1");

        if ($query->num_rows > 0) {
            return $this->getPrescription($query->row['id']);
        } else {
            return false;
        }
    }

    public function updateDiagnosis(){

        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "appointments` WHERE diagnosis IS NOT NULL and id < 59");
//echo "<pre>";
        if ($query->num_rows > 0) {
            foreach ($query->rows as $key => $appointment) {
                
                $new_diagnosis_format = [];
                foreach(json_decode($appointment['diagnosis'], true) as $key => $value){
                    $new_diagnosis_format[] = array('name'=> $value, 'eye'=>'BOTH');
                }

                /* echo $appointment['id']."<br>";
                print_r(json_decode($appointment['diagnosis'], true));
                print_r(json_encode($new_diagnosis_format)); */

                $query = $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET `diagnosis` = ? WHERE `id` = ? ", array(json_encode($new_diagnosis_format), (int)$appointment['id']));
                //echo "<br><br><br>";
            }
        } else {
            return true;
        }
    }

    public function updateDiagnosisAndPrescription($appointment_id, $patient_id){

        $query = $this->database->query("SELECT a.diagnosis, p.* FROM `" . DB_PREFIX . "appointments` a LEFT JOIN `" . DB_PREFIX . "prescription` p ON a.id = p.appointment_id WHERE a.patient_id ='" . $patient_id . "' AND a.id <> '".$appointment_id."' ORDER BY date DESC LIMIT 1");
        $data = $query->row;
       
        if ($query->num_rows > 0) {     
            $this->database->query("UPDATE `" . DB_PREFIX . "appointments` SET `diagnosis` = ? WHERE `id` = ? ", array($data['diagnosis'], (int)$appointment_id));

            $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "prescription` (`name`, `email`, `prescription`, `doctor_id`, `appointment_id`, `patient_id`, `user_id`, `date_of_joining`) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ", array($this->database->escape($data['name']), $this->database->escape($data['email']), $data['prescription'], (int)$data['doctor_id'], (int)$appointment_id, (int)$data['patient_id'], (int)$data['user_id'], $data['date_of_joining']));
            
            return true;

        } else {
            return false;
        }
    }
}
