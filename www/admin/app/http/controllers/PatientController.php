<?php

/**
 * PatientController.php
 */
class PatientController extends Controller
{
    /**
     * patient index method
     * This method will be called on @PatientList view
     **/
    public function index()
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
        /**
         * Get all Patient data from DB using User model
         **/
        $this->load->controller('common');
        $data['period']['start'] = $this->url->get('start');
        $data['period']['end'] = $this->url->get('end');

        if (!empty($data['period']['start']) && !empty($data['period']['end']) && !$this->controller_common->validateDate($data['period']['start']) && !$this->controller_common->validateDate($data['period']['end'])) {
            $data['period']['start'] = date_format(date_create($data['period']['start'] . '00:00:00'), "Y-m-d H:i:s");
            $data['period']['end'] = date_format(date_create($data['period']['end'] . '23:59:59'), "Y-m-d H:i:s");
        } else {
            $data['period']['start'] = date('Y-m-d ' . '00:00:00', strtotime("-1 month"));
            $data['period']['end'] = date('Y-m-d ' . '23:59:59');
        }

        $this->load->model('patient');
        if ($data['common']['user']['role_id'] == "3" && $data['common']['info']['doctor_access'] == '1') {
            $data['result'] = $this->model_patient->getPatients($data['period'], $data['common']['user']['doctor'], null);
        } else {
            $data['result'] = $this->model_patient->getPatients($data['period'], null, $data['common']['user']['role']);
        }

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        /* Set page title */
        $data['page_title'] = 'Patients';
        $data['page_view'] = $this->user_agent->hasPermission('patient/view') ? true : false;
        $data['page_add'] = $this->user_agent->hasPermission('patient/add') ? true : false;
        $data['page_edit'] = $this->user_agent->hasPermission('patient/edit') ? true : false;
        $data['page_delete'] = $this->user_agent->hasPermission('patient/delete') ? true : false;

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action_delete'] = URL_ADMIN . DIR_ROUTE . 'patient/delete';

        /*Render User list view*/
        $this->response->setOutput($this->load->view('patient/patient_list', $data));
    }

    public function indexView()
    {
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('patients');
        }
        $data = $this->url->get;

        $this->load->model('patient');
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
        $data['gp_practices'] = $this->model_patient->getALlGpPractice();

        if ($data['common']['user']['role_id'] == "3") {
            $data['result'] = $this->model_patient->getPatient($id, $data['common']['user']['doctor']);
        } else {
            $data['result'] = $this->model_patient->getPatient($id);
        }

        if (empty($data['result'])) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Patient does not exist in database!');
            $this->url->redirect('patients');
        }
        $data['result']['history'] = json_decode($data['result']['history'], true);
        $data['result']['address'] = json_decode($data['result']['address'], true);

        $data['page_title'] = 'Patient View';
        $data['page_edit'] = $this->user_agent->hasPermission('patient/edit') ? true : false;
        $data['page_appointments'] = $this->user_agent->hasPermission('appointments') ? true : false;
        $data['appointment_view'] = $this->user_agent->hasPermission('appointment/view') ? true : false;
        $data['appointment_add'] = $this->user_agent->hasPermission('appointment/add') ? true : false;
        $data['page_invoices'] = $this->user_agent->hasPermission('invoices') ? true : false;
        $data['invoice_view'] = $this->user_agent->hasPermission('invoice/view') ? true : false;
        $data['invoice_add'] = $this->user_agent->hasPermission('invoice/add') ? true : false;
        $data['invoice_delete'] = $this->user_agent->hasPermission('invoice/delete') ? true : false;
        $data['page_sendmail'] = $this->user_agent->hasPermission('patient/sendmail') ? true : false;
        $data['page_prescriptions'] = $this->user_agent->hasPermission('prescriptions') ? true : false;
        $data['page_notes'] = $this->user_agent->hasPermission('patient/notes') ? true : false;
        $data['page_documents'] = $this->user_agent->hasPermission('patients/documents') ? true : false;


        $data['history'] = $this->medicalHistoryData();
        if ($data['page_appointments']) {
            $data['appointments'] = $this->model_patient->getAppointments($data['result']);
        }
        if ($data['page_invoices']) {
            $data['invoices'] = $this->model_patient->getInvoices($data['result']);
        }
        if ($data['page_prescriptions']) {
            $data['prescriptions'] = $this->model_patient->getPrescriptions($data['result']);
        }
        if ($data['page_notes']) {
            //$data['notes'] = $this->model_patient->getClinicalNotes($data['result']);
            // Get pre consultation forms
            $this->load->model('form');
            $data['formObj'] = $this->model_form;
        }
        if ($data['page_documents']) {
            $data['reports'] = $this->model_patient->getDocuments($data['result']);
        }

        $data['appointment_images'] = $this->model_patient->getAppointmentImagesByPatient($id);

        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $this->load->model('doctor');
        $data['doctorObj'] = $this->model_doctor;
        $this->load->model('appointment');
        $data['appointmentObj'] = $this->model_appointment;

        $data['action'] = URL_ADMIN . DIR_ROUTE . 'patient/add';
        $data['doctors'] = $this->model_commons->getAppointmentDoctors();
        $data['action_new_appointment'] = URL_ADMIN . DIR_ROUTE . 'appointment/add';
        //echo "<pre>";print_r($data);exit;

        // Add email template for invitation
        $data['cc'] = '';
        $data['email_subject'] = $data['email_body'] = "";
        if (isset($data['email_type']) && $data['email_type'] == 'videocallinvitation') {
            // Generate tokbox session
            $this->load->controller('appointment');
            $user_id = $this->session->data['user_id'];
            $doctor_id = ($data['common']['user']['role_id'] == 3) ? $data['common']['user']['doctor'] : 0;
            $data['tokBoxSession'] = $this->controller_appointment->generateTokBoxSession(0, $doctor_id, $data['result']['id'], $user_id);

            // Get email template
            $this->load->controller('mail');
            $result = $this->controller_mail->getTemplate('videocallinvitation');

            $email_subject = $email_body = "";

            $email_subject = str_replace('{clinic_name}', $data['common']['info']['name'], $result['template']['subject']);
            $email_body = $result['template']['message'];
            $video_consultation_link = URL . DIR_ROUTE . 'video-consultation&token=' . $data['tokBoxSession']['video_consultation_token'];

            $email_body = str_replace('{name}', $data['result']['title'] . ' ' . $data['result']['firstname'] . ' ' . $data['result']['lastname'], $email_body);
            $email_body = str_replace('{doctor_name}', $data['common']['user']['firstname'] . ' ' . $data['common']['user']['lastname'], $email_body);
            $email_body = str_replace('{clinic_name}', $data['common']['info']['name'], $email_body);
            $email_body = str_replace('{video_consultation_link}', $video_consultation_link, $email_body);

            $data['cc'] = $data['common']['user']['email'];
            $data['email_subject'] = $email_subject;
            $data['email_body'] = $email_body;
            $data['video_consultation_link'] = $video_consultation_link;
        } else {
            $data['email_body'] = "<br><br><br><br><br><br><br><br>
            Best Regards, <br>
            My Eye Record & Care";
        }

        if ($data['common']['user']['role_id'] == '3') {
            $data['appointment_result'] = $this->model_appointment->getAppointmentView($id, $data['common']['user']['doctor']);
        } else {
            $data['appointment_result'] = $this->model_appointment->getAppointmentView($id);
        }
        $appointment_completed = $this->model_appointment->getPatientCompletedAppointment($data['appointment_result']);
        $summary['appointment_count'] = !empty($appointment_completed)?count($appointment_completed):0;
        if ($summary['appointment_count'] != 0) {

            // Get Last Appointment Data
            $appointment_last = $this->model_appointment->getLastPatientAppointment($data['appointment_result']);
            $highestIop = $this->model_appointment->getMaxIOPAppointment($data['appointment_result']);

            $summary['summarykey']['cct_right'] = $appointment_last['cct_right'];
            $summary['summarykey']['cct_left'] = $appointment_last['cct_left'];
            $summary['summarykey']['iop_right'] = $highestIop['iop_right'];
            $summary['summarykey']['iop_left'] = $highestIop['iop_left'];
            $summary['summarykey']['allergy'] = $appointment_last['allergy'];

            foreach ($appointment_completed as $key => $list) {

                $summary['appointment']['appointment_date'][$key] = $list['date'];

                $summary['appointment']['data'][$key]['date'] = $list['date'];
                $summary['appointment']['data'][$key]['data'][] = $list['cct_right'];
                $summary['appointment']['data'][$key]['data'][] = $list['cct_left'];
                $summary['appointment']['data'][$key]['data'][] = $list['intraocular_pressure_right'];
                $summary['appointment']['data'][$key]['data'][] = $list['intraocular_pressure_left'];
                $summary['appointment']['data'][$key]['data'][] = $list['allergy'];

                // Get Prescription From Appointment id
                $prescription = $this->model_appointment->getPrescription($list['id']);
                if ($prescription) {
                    $summary['appointment']['data'][$key]['prescription'] = $prescription['prescription'];
                }

                // Preparing Chart Data
                $intraocularPressureChart[0]['name'] = 'RE';
                $intraocularPressureChart[1]['name'] = 'LE';
                $intraocularPressureChart[0]['data'][] = (int)$list['intraocular_pressure_right'];
                $intraocularPressureChart[1]['data'][] = (int)$list['intraocular_pressure_left'];

                $nflThicknessChart[0]['name'] = 'RE';
                $nflThicknessChart[1]['name'] = 'LE';
                $nflThicknessChart[0]['data'][] = (int)$list['nfl_thickness_right'];
                $nflThicknessChart[1]['data'][] = (int)$list['nfl_thickness_left'];

                $meanDeviationChart[0]['name'] = 'RE';
                $meanDeviationChart[1]['name'] = 'LE';
                $meanDeviationChart[0]['data'][] = (int)$list['mean_deviation_right'];
                $meanDeviationChart[1]['data'][] = (int)$list['mean_deviation_left'];


                $psdDeviationChart[0]['name'] = 'RE';
                $psdDeviationChart[1]['name'] = 'LE';
                $psdDeviationChart[0]['data'][] = (int)$list['psd_deviation_right'];
                $psdDeviationChart[1]['data'][] = (int)$list['psd_deviation_left'];
                $categories[] = date_format(date_create($list['date']), 'd-m-Y');

            }

            $data['intraocularPressureChart'] = $intraocularPressureChart;
            $data['nflThicknessChart'] = $nflThicknessChart;
            $data['meanDeviationChart'] = $meanDeviationChart;
            $data['psdDeviationChart'] = $psdDeviationChart;
            $data['categories'] = $categories;
        }

        $data['summary'] = $summary;
//echo "<pre>"; print_r($data); exit;
        /*Render User add view*/
        $this->response->setOutput($this->load->view('patient/patient_view', $data));
    }

    public function indexAdd()
    {
        $this->load->model('commons');
        $this->load->model('patient');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $data['result'] = NULL;
        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $data['history'] = $this->medicalHistoryData();


        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $data['page_title'] = 'Add Patient';
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'patient/add';
        /*Render User add view*/
        $this->response->setOutput($this->load->view('patient/patient_form', $data));
    }

    public function indexEdit()
    {
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('patients');
        }

        $this->load->model('patient');
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        if ($data['common']['user']['role_id'] == "3") {
            $data['result'] = $this->model_patient->getPatient($id, $data['common']['user']['doctor']);
        } else {
            $data['result'] = $this->model_patient->getPatient($id);
        }

        if (empty($data['result'])) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Patient does not exist in database!');
            $this->url->redirect('patients');
        }

        $data['result']['history'] = json_decode($data['result']['history'], true);
        $data['result']['address'] = json_decode($data['result']['address'], true);
        $data['history'] = $this->medicalHistoryData();
        $data['gp_practices'] = $this->model_patient->getALlGpPractice();

        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }
        $data['page_title'] = 'Edit Patient';
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'patient/edit&id=' . $data['result']['id'];

        // Check is patient referred by optician
        $data['is_patient_referred_by_optician'] = $this->model_patient->isPatientReferredByOptician($data['result']['id']);
        
        /*Render User add view*/
        $this->response->setOutput($this->load->view('patient/patient_form', $data));
    }

    public function indexAction()
    {
        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['submit'])) {
            $this->url->redirect('patients');
        }

        $data = $this->url->post('patient');
        /**
         * Validate form data
         * If some data is missing or data does not match pattern
         * Return to info view
         **/
        $this->load->model('commons');
        $data['info'] = $this->model_commons->getSiteInfo();

        $this->load->controller('common');
        if ($validate_field = $this->validateField($data)) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Please enter valid ' . implode(", ", $validate_field) . '!');
            if (!empty($data['id'])) {
                $this->url->redirect('patient/edit&id=' . $data['id']);
            } else {
                $this->url->redirect('patient/add');
            }
        }

        $data['user'] = $this->model_commons->getUserInfo($this->session->data['user_id']);

        if (!empty($data['dob'])) {
            $data['dob'] = DateTime::createFromFormat($data['info']['date_format'], $data['dob'])->format('Y-m-d');
        } else {
            $data['dob'] = '';
        }

        $data['address'] = json_encode($data['address']);
        $data['user_id'] = $this->session->data['user_id'];

        $this->load->model('patient');
        if (!empty($data['history'])) {
            $data['history'] = json_encode($data['history']);
        } else {
            $data['history'] = json_encode(array());
        }

        $data['datetime'] = date('Y-m-d H:i:s');
        if (!empty($data['id'])) {
            $gp_data['gp_practice'] = $data['gp_practice'];
            $gp_data['gp_name'] = $data['gp_name'];
            $gp_data['gp_address'] = $data['gp_address'];
            $gp_data['gp_email'] = $data['gp_email'];
            $gcpID = $this->model_patient->gpPractice($gp_data);
            $data['gp_practice'] = $gcpID;

            $result = $this->model_patient->updatePatient($data);

//            $referral_data['id'] = $data['referral_id'];
//            $referral_data['hospital_code'] = $data['hospital_code'];
//            $this->load->model('opticianreferral');
//            $this->model_opticianreferral->updateReferralHospitalCode($referral_data);

            $this->notificationToPatientForAppointmentBooking($data['id']);

           //$this->notificationToHospitalForAppointmentBooking($data['id']);

            $this->session->data['message'] = array('alert' => 'success', 'value' => 'Patient Information updated successfully.');
        } else {
            $gcpID = $this->model_patient->gpPractice($data['gp_practice']);
            $data['gp_practice'] = $gcpID;

            if (!$this->model_patient->checkPatientEmail($data['mail'])) {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Email  \'' . $this->url->post('email') . '\'  already exist in database.');
                $this->url->redirect('patient/add');
            }
            $data['hash'] = md5(uniqid(mt_rand(), true));
            $data['id'] = $this->model_patient->createPatient($data);
            $result = $this->model_patient->updatePatient($data); // Call update patient for update other patient data
            if ($data['id']) {
                $this->patientMail($data['id']);
                if ($data['user']['role_id'] == '3') {
                    $this->model_patient->createPatientDoctor($data);
                }
            }
            $this->session->data['message'] = array('alert' => 'success', 'value' => 'Patient created successfully.');
        }

        $this->url->redirect('patient/view&id=' . $data['id']);
    }

    public function patientMail($id)
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('newpatient');

        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $patient = $this->model_patient->getPatient($id);

        $password_link = '<a href="' . URL . DIR_ROUTE . 'profile/changepassword&id=' . $patient['email'] . '&code=' . $patient['temp_hash'] . '">Patient Dashboard</a>';
        $result['template']['message'] = str_replace('{patient_title}', $patient['title'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient_fname, patient_lname}', $patient['firstname'] . ' ' . $patient['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{user_name}', $patient['email'], $result['template']['message']);
        $result['template']['message'] = str_replace('{user_password}', $patient['mobile'], $result['template']['message']);
        $result['template']['message'] = str_replace('Patient Dashboard', $password_link, $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);

        $data['name'] = $patient['firstname'] . ' ' . $patient['lastname'];
        $data['email'] = $patient['email'];
        $data['subject'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }

    public function indexDelete()
    {
        $this->load->controller('common');
        if ($this->controller_common->validateToken($this->url->post('_token'))) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->redirect('patients');
        }
        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['delete']) || empty($this->url->post('id'))) {
            $this->url->redirect('patients');
        }
        $this->load->model('patient');
        $this->model_patient->deletePatient($this->url->post('id'));
        $this->session->data['message'] = array('alert' => 'success', 'value' => 'Patient deleted successfully.');
        $this->url->redirect('patients');
    }

    public function indexMail()
    {
        if (!isset($_POST['submit'])) {
            $this->url->redirect('patients');
        }

        $data = $this->url->post;
        $this->load->controller('common');
        $this->load->model('commons');
        $this->load->model('patient');
        $result = $this->model_patient->getPatient($data['mail']['id']);
        if (empty($result)) {
            $this->url->redirect('patients');
        }
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        // Prepare SMS text and send SMS
        if (isset($data['mail']['video_consultation_link']) and $data['mail']['video_consultation_link'] != '') {
            $sms_text = TEXT_MSG_OPEN_CALL_INVITATION;
            $sms_text = str_replace('{doctor_name}', $data['common']['user']['firstname'] . ' ' . $data['common']['user']['lastname'], $sms_text);
            $sms_text = str_replace('{video_consultation_link}', $data['mail']['video_consultation_link'], $sms_text);

            $this->controller_common->sendSMSUsingTwilio($result['mobile'], $sms_text);
        }


        // Send eamil
        $data['mail']['email'] = $result['email'];
        $data['mail']['name'] = $result['firstname'] . ' ' . $result['lastname'];
        $data['mail']['redirect'] = 'patient/view&id=' . $result['id'];

        $this->load->controller('Mail');
        $mail_result = $this->controller_mail->sendmail($data['mail']);

        if ($mail_result == 1) {
            $data['mail']['type'] = 'patient';
            $data['mail']['type_id'] = $data['mail']['id'];
            $data['mail']['user_id'] = $this->session->data['user_id'];

            $this->controller_mail->createMailLog($data['mail']);

            if (isset($data['mail']['tokbox_session_id']) and !empty($data['mail']['tokbox_session_id'])) {

                $tokBoxSession = $this->model_patient->getTokBoxSession($data['mail']['tokbox_session_id']);
                $video_consultation_link = URL . DIR_ROUTE . 'appointment/videoConsultation&token=' . $tokBoxSession['video_consultation_token'];
                $this->url->redirect('appointment/videoConsultation&token=' . $tokBoxSession['video_consultation_token']);
            }
            $this->session->data['message'] = array('alert' => 'success', 'value' => 'Success: Message sent successfully.');
            $this->url->redirect('patient/view&id=' . $result['id']);
        } else {
            $this->session->data['message'] = array('alert' => 'error', 'value' => $mail_result);
            $this->url->redirect('patient/view&id=' . $result['id']);
        }
    }

    public function searchPatient()
    {
        $data = $this->url->get;
        $this->load->model('patient');
        if (isset($data['term'])) {
            $this->load->model('commons');
            $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
            $result = $this->model_patient->getSearchedPatient($data['term'], $data['common']['user']['role']);
        }

        if (isset($data['email'])) {
            $result = $this->model_patient->getPatientByEmail($data['email']);
        }

        echo json_encode($result);
    }

    public function searchGpPractices()
    {
        $data = $this->url->get;
        $this->load->model('patient');
        if (isset($data['term'])) {
            $result = $this->model_patient->getGpPractice($data['term']);
        }
        echo json_encode($result);
    }

    public function medicalHistoryData()
    {
        return array(
            'diabetes' => 'Diabetes',
            'high-blood-pressure' => 'High Blood Pressure',
            'high-cholesterol' => 'High Cholesterol',
            'heart-problems' => 'Heart Problems',
            'asthma' => 'Asthma',
            'kidney-disease' => 'Kidney Disease',
            'kidney-stones' => 'Kidney Stones',
            'jaundice' => 'Jaundice',
            'rheumatic-fever' => 'Rheumatic Fever',
            'cancer' => 'Cancer',
            'hiv-aids' => 'HIV/AIDS',
            'epilepsy' => 'Epilepsy',
            'pregnancy' => 'Pregnancy',
            'blood-thinners' => 'Blood Thinners'
        );
    }

    public function validateField($data)
    {
        $error = [];
        $error_flag = false;
        if ($this->controller_common->validateText($data['firstname'])) {
            $error_flag = true;
            $error['firstname'] = 'First Name';
        }
        if ($this->controller_common->validateText($data['lastname'])) {
            $error_flag = true;
            $error['lastname'] = 'Last Name';
        }
        if ($this->controller_common->validateEmail($data['mail'])) {
            $error_flag = true;
            $error['email'] = 'Email Address';
        }
        if (!empty($data['dob'])) {
            if ($this->controller_common->validateDate($data['dob'], $data['info']['date_format'])) {
                $error_flag = true;
                $error['date'] = 'Date of Birth';
            }
        }
        if ($this->controller_common->validateMobileNumber($data['mobile'])) {
            $error_flag = true;
            $error['mobile'] = 'Mobile number';
        }

        if ($error_flag) {
            return $error;
        } else {
            return false;
        }
    }

    public function gcpMail()
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('newpatiengcp');


        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $this->load->model('user');
        $user_gcp_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')['MERCSecretary']);
        $user_med_sec_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')['Med. Secretary']);

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $link = '<a href="' . URL . 'admin">' . $result['common']['name'] . 'Dashboard</a>';
        $result['template']['message'] = str_replace('{gcp_fname}', $user_gcp_data['firstname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{gcp_lname}', $user_gcp_data['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{URL}', $link, $result['template']['message']);

        $data['email'] = $user_gcp_data['email'];
        $data['cc'] = $user_med_sec_data['email'];
        $data['subject'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

//        echo print_r($result['template']);
//        exit();
        return $this->controller_mail->sendMail($data);
    }

    public function notificationToPatientForAppointmentBooking($id)
    {

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('notification_to_the_patient_for_appointment_booking_at_hospital');

        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $this->load->model('patient');
        $patient = $this->model_patient->getPatient($id);

        $result['template']['message'] = str_replace('{patient_title}', $patient['title'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient_fullname}', $patient['firstname'] . ' ' . $patient['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{hospital_name}',constant('HOSPITAL_LIST')[$patient['hospital_code']]['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{hospital_address}',constant('HOSPITAL_LIST')[$patient['hospital_code']]['address'], $result['template']['message']);
        $result['template']['message'] = str_replace('{hospital_number}',constant('HOSPITAL_LIST')[$patient['hospital_code']]['mobile'], $result['template']['message']);
        $result['template']['message'] = str_replace('{email}',constant('HOSPITAL_LIST')[$patient['hospital_code']]['email'], $result['template']['message']);

        $data['email'] = $patient['email'];
        $data['subject'] = str_replace('{hospital_name}',constant('HOSPITAL_LIST')[$patient['hospital_code']]['name'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }
    public function notificationToHospitalForAppointmentBooking($id)
    {

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('notification_to_the_hospital_for_patient_details');
        $this->load->model('user');
        $user_doctor_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')[constant('USER_ROLE_DOCTOR')]);


        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $this->load->model('patient');
        $patient = $this->model_patient->getPatient($id);
        $patient['address'] = json_decode($patient['address'], true);

       // $result['template']['message'] = str_replace('{patient_title}', $patient['title'], $result['template']['message']);
        $result['template']['message'] = str_replace('{patient name}', $patient['firstname'] . ' ' . $patient['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{name}',$patient['firstname'] . ' ' . $patient['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{address}', $patient['address']['address1'].", ".$patient['address']['address2'].", ".$patient['address']['city'].", ".$patient['address']['postal'], $result['template']['message']);
        $result['template']['message'] = str_replace('{mobile}',$patient['mobile'], $result['template']['message']);
        $result['template']['message'] = str_replace('{email}',$patient['email'], $result['template']['message']);

        $data['name'] = constant('HOSPITAL_LIST')[$patient['hospital_code']]['email'];
        $data['email'] = constant('HOSPITAL_LIST')[$patient['hospital_code']]['email'];
        $data['subject'] = str_replace('{patient_name}',$patient['firstname'] . ' ' . $patient['lastname'], $result['template']['subject']);
        $data['subject'] = str_replace('{Docter_name}',$user_doctor_data['firstname']." ".$user_doctor_data['lastname'], $data['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }

}