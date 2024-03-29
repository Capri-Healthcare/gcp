<?php


use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\ArchiveMode;
use OpenTok\Session;
use OpenTok\Role;

/**
 * Appointment Controller
 */
class AppointmentController extends Controller
{
    public function index()
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->controller('common');
        $data['period']['start'] = $this->url->get('start');
        $data['period']['end'] = $this->url->get('end');
        $data['followupid'] = (null !== $this->url->get('followupid')) ? $this->url->get('followupid') : '';

        if (!empty($data['period']['start']) && !empty($data['period']['end']) && !$this->controller_common->validateDate($data['period']['start']) && !$this->controller_common->validateDate($data['period']['end'])) {
            $data['period']['start'] = date_format(date_create($data['period']['start'] . '00:00:00'), "Y-m-d H:i:s");
            $data['period']['end'] = date_format(date_create($data['period']['end'] . '23:59:59'), "Y-m-d H:i:s");
        } else {
            $data['period']['start'] = date('Y-m-d ' . '00:00:00');
            $data['period']['end'] = date('Y-m-d ' . '23:59:59');
        }

        // get Patient Detail From id

        $this->load->model('patient');


        $patient_id = $this->url->get('id');
        $referralid = $this->url->get('referralid');

        if (!empty($patient_id)) {
            $data['patient'] = $this->model_patient->getPatient($patient_id);
            $data['hospital_code'] = $data['patient']['hospital_code'];
        }
        if (!empty($referralid)) {
            $this->load->model('opticianreferral');
            $referral = $this->model_opticianreferral->getOpticianReferral($referralid);
            $data['hospital_code'] = $referral['hospital_code'];
        }

        $this->load->model('appointment');

        if ($data['common']['user']['role_id'] == '3' && $data['common']['info']['doctor_access'] == '1') {
            $data['result'] = $this->model_appointment->getAppointments($data['period'], $data['common']['user']['doctor']);
        } else {
            $data['result'] = $this->model_appointment->getAppointments($data['period'], null, $data['common']['user']['role']);
        }

        $data['doctors'] = $this->model_commons->getAppointmentDoctors();

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $data['page_title'] = 'Appointments';
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action_delete'] = URL_ADMIN . DIR_ROUTE . 'appointment/delete';
        $data['delete_msg'] = 'All Docuements and Records Related to this appointment will be deleted.';
        $data['action_new_appointment'] = URL_ADMIN . DIR_ROUTE . 'appointment/add';

        $data['page_add'] = $this->user_agent->hasPermission('appointment/add') ? true : false;
        $data['page_view'] = $this->user_agent->hasPermission('appointment/view') ? true : false;
        $data['page_edit'] = $this->user_agent->hasPermission('appointment/edit') ? true : false;
        $data['page_delete'] = $this->user_agent->hasPermission('appointment/delete') ? true : false;
        $data['invoice_add'] = $this->user_agent->hasPermission('invoice/add') ? true : false;
        $data['invoice_view'] = $this->user_agent->hasPermission('invoice/view') ? true : false;

        /*call appointment list view*/
        $this->response->setOutput($this->load->view('appointment/appointment_list', $data));
    }

    public function indexView()
    {
        /**
         * Check if id exist in url if not exist then redirect to list view
         **/
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('appointments');
        }
        $data = $this->url->get;
        //print_r($data);exit;

        $this->load->model('commons');
        $this->load->model('patient');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
        $this->load->model('appointment');
        if ($data['common']['user']['role_id'] == '3') {

            $data['result'] = $this->model_appointment->getAppointment($id, $data['common']['user']['doctor']);
        } else {
            $data['result'] = $this->model_appointment->getAppointment($id);
        }

        if (!$data['result']) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Appointment does not exist in database!');
            $this->url->redirect('appointments');
        }

        $data['page_title'] = 'Appointment View';
        $data['page_add'] = $this->user_agent->hasPermission('appointment/add') ? true : false;
        $data['page_view'] = $this->user_agent->hasPermission('appointment/view') ? true : false;
        $data['page_edit'] = $this->user_agent->hasPermission('appointment/edit') ? true : false;
        $data['page_sendmail'] = $this->user_agent->hasPermission('appointment/sendmail') ? true : false;
        $data['page_delete'] = $this->user_agent->hasPermission('appointment/delete') ? true : false;
        $data['invoice_add'] = $this->user_agent->hasPermission('invoice/add') ? true : false;
        $data['invoice_view'] = $this->user_agent->hasPermission('invoice/view') ? true : false;
        $data['page_notes'] = $this->user_agent->hasPermission('appointment/notes') ? true : false;
        $data['page_documents'] = $this->user_agent->hasPermission('appointment/documents') ? true : false;
        $data['page_prescriptions'] = $this->user_agent->hasPermission('prescriptions') ? true : false;
        $data['page_letters'] = $this->user_agent->hasPermission('appointment/letters') ? true : false;

        $data['notes'] = $this->model_appointment->getClinicalNotes($id);
        if (!empty($data['notes'])) {
            $data['notes']['notes'] = json_decode($data['notes']['notes'], true);
        } else {
            $data['notes'] = NULL;
        }


        $data['doctors'] = $this->model_appointment->getDoctors();
        if ($data['page_prescriptions']) {
            $data['prescription'] = $this->model_appointment->getPrescription($id);

            if (!empty($data['prescription'])) {
                $data['prescription']['prescription'] = json_decode($data['prescription']['prescription'], true);
            }
        }
        if ($data['page_documents']) {
            $data['reports'] = $this->model_appointment->getReports($id);
        }

        $data['appointment_images'] = $this->model_appointment->getAppointmentImages($id);

        // Get pre consultation forms
        $this->load->model('form');
        $data['pre_consultation_forms'] = $this->model_form->getPreConsultationFormsByDepartments($data['result']['department_id']);
        //print_r($data['pre_consultation_forms']);exit;

        // Get PreConsultation Forms by Appointment
        $data['selected_forms'] = $this->model_form->getPreConsultationFormsByAppointment($id);
        $data['formObj'] = $this->model_form;

        $data['finding_forms'] = $this->model_form->getFindingFormsByDepartments($data['result']['department_id']);

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'appointment/edit&id=' . $data['result']['id'];

        //Get leaflets to attach in mail
        $this->load->model('leaflets');
        $data['leaflets'] = $this->model_leaflets->allLeaflets();
        //Get email content based on doc_type
        //echo "<pre>";print_r($data);exit;
        if (isset($data['doc_type']) && $data['doc_type'] == "to_optom") {
            $third_party_name_arr = explode(' ', $data['result']['optician_name']);
            $data['email']['body'] = str_replace("#THIRD_PARTY_NAME", $third_party_name_arr[1], constant('THIRD_PARTY_EMAIL_BODY'));
            $data['email']['body'] .= constant('PATIENT_GP_EMAIL_FOOTER_GREETING');
        }elseif (isset($data['doc_type']) && $data['doc_type'] == "third_party"){
            $third_party_name_arr = explode(' ', $data['result']['third_party_name']);
            $data['email']['body'] = str_replace("#THIRD_PARTY_NAME", $third_party_name_arr[1], constant('THIRD_PARTY_EMAIL_BODY'));
            $data['email']['body'] .= constant('PATIENT_GP_EMAIL_FOOTER_GREETING');
        } else {
            $patient_first_name_arr = explode(' ', strtolower($data['result']['name']));
            $title = !empty($data['result']['title']) ? $data['result']['title'] : '';

            if (in_array($patient_first_name_arr[0], ['mr.', 'mrs.', 'ms.', 'miss.', 'mr', 'mrs', 'ms', 'miss'])) {
                $patient_first_name = ucfirst(strtolower($patient_first_name_arr[2]));
            } else {
                $patient_first_name = ucfirst(strtolower($patient_first_name_arr[1]));
            }

            // $email_body = isset($data['doc_type']) && $data['doc_type'] == "to_patient_or_gp" ? constant('PATIENT_GP_EMAIL_BODY') : constant('PATIENT_GP_EMAIL_GREETING');
            // $data['email']['body'] = str_replace("#PATIENT_FIRST_NAME", $title." ".$patient_first_name, $email_body);

            if (isset($data['doc_type']) && $data['doc_type'] == "to_patient_or_gp") {
                $data['email']['body'] = str_replace("#PATIENT_FIRST_NAME", $title . " " . $patient_first_name, constant('PATIENT_GP_EMAIL_BODY'));
                $data['email']['body'] .= constant('PATIENT_GP_EMAIL_FOOTER_GREETING');
            } else {
                $data['email']['body'] = str_replace("#PATIENT_FIRST_NAME", $title . " " . $patient_first_name, constant('PATIENT_GP_EMAIL_GREETING'));
            }
        }
        // Summary Data

        $appointment_completed = $this->model_appointment->getPatientCompletedAppointment($data['result']);
        $summary['appointment_count'] = !empty($appointment_completed) ? count($appointment_completed) : 0;

        if ($summary['appointment_count'] != 0) {

            // Get Last Appointment Data
            $highestIop = $this->model_appointment->getMaxIOPAppointment($data['result']);
            $summary['summarykey']['iop_right'] = $highestIop['iop_right'];
            $summary['summarykey']['iop_left'] = $highestIop['iop_left'];

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

        $data['gp_practices'] = $this->model_patient->getALlGpPractice();
        
        $data['summary'] = $summary;
        //echo "<pre>"; print_r($data);exit;
        /*Render Blog edit view*/
        $this->response->setOutput($this->load->view('appointment/appointment_view', $data));
    }

    /**
     * Appointment index add method
     * This method will be called on Appointment add
     **/
    public function indexAdd()
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        /* Set empty data to array */
        $patient = (int)$this->url->get('patient');
        $this->load->model('appointment');
        if (empty($patient)) {
            $data['result'] = NULL;
        } else {
            $data['result'] = $this->model_appointment->getPatientInfo($patient);
        }

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }
        $data['doctors'] = $this->model_appointment->getDoctors();

        /* Set page title */
        $data['page_title'] = 'Add Appointment';
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'appointment/add';
        /*Render Blog add view*/
        $this->response->setOutput($this->load->view('appointment/appointment_add', $data));
    }

    /**
     * Appointment index edit method
     * This method will be called on Appointment edit view
     **/
    public function indexEdit()
    {
        $firstChart = $nflChart = $mdChart = $psdChart = $summary = [];

        /**
         * Check if id exist in url if not exist then redirect to blog list view
         **/
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('appointments');
        }
        $this->load->model('appointment');
        $data['reports'] = $this->model_appointment->getReports($id);

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
        /**
         * Call getBlog method from Blog model to get data from DB for single blog
         * If blog does not exist then redirect it to blog list view
         **/


        if ($this->url->get('update_diagnosis') == 'Y') {
            $this->model_appointment->updateDiagnosis();
            exit;
        }

        if ($data['common']['user']['role_id'] == '3') {
            $data['result'] = $this->model_appointment->getAppointment($id, $data['common']['user']['doctor']);
        } else {
            $data['result'] = $this->model_appointment->getAppointment($id);
        }
        $data['result']['diagnosis'] = json_decode($data['result']['diagnosis'], true);
        $data['result']['relations_with_glaucoma_patient'] = json_decode($data['result']['relations_with_glaucoma_patient'], true);

        if (!$data['result']) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Appointment does not exist in database!');
            $this->url->redirect('appointments');
        }


        $data['doctors'] = $this->model_appointment->getDoctors();
        $data['prescription'] = $this->model_appointment->getPrescription($id);
        $is_repeat_prescription = false;
        if (empty($data['prescription'])) {
            $data['prescription'] = $this->model_appointment->getLastAppointmentPrescription($id, $data['result']['patient_id']);
            $is_repeat_prescription = true;
        }
        if (!empty($data['prescription'])) {
            $data['prescription']['prescription'] = json_decode($data['prescription']['prescription'], true);
        } else {
            $data['prescription'] = NULL;
        }

        if ($is_repeat_prescription) {
            // reset start date and end date
            if ($data['prescription']['prescription']) {
                foreach ($data['prescription']['prescription'] as $key => $prescription) {
                    $prescription['start_date'] = '';
                    $prescription['end_date'] = '';
                    $data['prescription']['prescription'][$key] = $prescription;
                }
            }
        }

        $data['notes'] = $this->model_appointment->getClinicalNotes($id);
        if (!empty($data['notes'])) {
            $data['notes']['notes'] = json_decode($data['notes']['notes'], true);
        } else {
            $data['notes'] = NULL;
        }

        $data['reports'] = $this->model_appointment->getReports($id);
        $data['appointment_images'] = $this->model_appointment->getAppointmentImages($id);

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $data['page_title'] = 'Edit Appointment';
        $data['invoice_add'] = $this->user_agent->hasPermission('invoice/add') ? true : false;
        $data['invoice_view'] = $this->user_agent->hasPermission('invoice/view') ? true : false;
        $data['page_document_upload'] = $this->user_agent->hasPermission('report/reportUpload') ? true : false;
        $data['page_document_remove'] = $this->user_agent->hasPermission('report/removeReport') ? true : false;
        $data['page_notes'] = $this->user_agent->hasPermission('appointment/notes') ? true : false;
        $data['page_documents'] = $this->user_agent->hasPermission('appointment/documents') ? true : false;
        $data['page_prescriptions'] = $this->user_agent->hasPermission('prescriptions') ? true : false;
        $data['page_finding'] = true;


        // Get pre consultation forms
        $this->load->model('form');
        $data['pre_consultation_forms'] = $this->model_form->getPreConsultationFormsByDepartments($data['result']['department_id']);
        //print_r($data['pre_consultation_forms']);exit;

        // Get PreConsultation Forms by Appointment
        $data['selected_forms'] = $this->model_form->getPreConsultationFormsByAppointment($id);
        $data['formObj'] = $this->model_form;


        // Ger finding form by department
        $data['finding_forms'] = $this->model_form->getFindingFormsByDepartments($data['result']['department_id']);
        //print_r($data['finding_forms']);exit;

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'appointment/edit';

        // Summary Data

        $appointment_completed = $this->model_appointment->getPatientCompletedAppointment($data['result']);
        $summary['appointment_count'] = !empty($appointment_completed) ? count($appointment_completed) : 0;
        $data['cct_right'] = 0;
        $data['cct_left'] = 0;
        if ($summary['appointment_count'] != 0) {

            // Get Last Appointment Data
            //echo "<pre>";print_r($appointment_last);exit;
            $highestIop = $this->model_appointment->getMaxIOPAppointment($data['result']);

            $summary['summarykey']['cct_right'] = $data['result']['cct_right'];
            $summary['summarykey']['cct_left'] = $data['result']['cct_left'];
            $summary['summarykey']['iop_right'] = $highestIop['iop_right'];
            $summary['summarykey']['iop_left'] = $highestIop['iop_left'];
            $summary['summarykey']['allergy'] = $data['result']['allergy'];
            $isDiagnosisJson = $this->isJson($data['result']['diagnosis']);
            if ($isDiagnosisJson === true) {
                $summary['summarykey']['diagnosis'] = json_decode($data['result']['diagnosis'], TRUE);
            } else {
                $summary['summarykey']['diagnosis'] = '';
            }


            $summary['summarykey']['special_condition'] = $data['result']['special_condition'];

            foreach ($appointment_completed as $key => $list) {

                $summary['appointment']['appointment_date'][$key] = $list['date'];

                $summary['appointment']['data'][$key]['date'] = $list['date'];
                $summary['appointment']['data'][$key]['data']['cct_right'] = $list['cct_right'];
                $summary['appointment']['data'][$key]['data']['cct_left'] = $list['cct_left'];
                $summary['appointment']['data'][$key]['data']['iop_right'] = $list['intraocular_pressure_right'];
                $summary['appointment']['data'][$key]['data']['iop_left'] = $list['intraocular_pressure_left'];
                $summary['appointment']['data'][$key]['data']['allergy'] = $list['allergy'];
                $summary['appointment']['data'][$key]['data']['diagnosis'] = '';
                if (!empty($list['diagnosis'])) {
                    // $summary['appointment']['data'][$key]['data'][] = implode(',', json_decode($list['diagnosis'], true));
                    $isDiagnosisJson = $this->isJson($list['diagnosis']);
                    if ($isDiagnosisJson === true) {
                        $summary['summarykey']['diagnosis'] = json_decode($list['diagnosis'], TRUE);
                        $summary['appointment']['data'][$key]['data']['diagnosis'] = json_decode($list['diagnosis'], TRUE);
                    } else {
                        $summary['summarykey']['diagnosis'] = '';
                    }
                }

                $summary['appointment']['data'][$key]['data']['special_condition'] = $list['special_condition'];

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
                $meanDeviationChart[0]['data'][] = $list['mean_deviation_right'];
                $meanDeviationChart[1]['data'][] = $list['mean_deviation_left'];


                $psdDeviationChart[0]['name'] = 'RE';
                $psdDeviationChart[1]['name'] = 'LE';
                $psdDeviationChart[0]['data'][] = $list['psd_deviation_right'];
                $psdDeviationChart[1]['data'][] = $list['psd_deviation_left'];
                $categories[] = date_format(date_create($list['date']), 'd-m-Y');
            }

            $data['intraocularPressureChart'] = $intraocularPressureChart;
            $data['nflThicknessChart'] = $nflThicknessChart;
            $data['meanDeviationChart'] = $meanDeviationChart;
            $data['psdDeviationChart'] = $psdDeviationChart;
            $data['categories'] = $categories;
        }

        $data['examination_notes_readonly'] = false;
        /*if($data['result']['date']  < date('Y-m-d', strtotime("-1 weeks", strtotime(date('Y-m-d'))))){
            $data['examination_notes_readonly'] = true;
        }*/
        $data['summary'] = $summary;
//echo "<pre>"; print_r($data['summary']);exit;
        /*Render Blog edit view*/
        $this->response->setOutput($this->load->view('appointment/appointment_form', $data));
    }

    function isJson($string)
    {
        return ((is_string($string) &&
            (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }

    /**
     * Appointment index action method
     * This method will be called on appointment submit/save view
     **/
    public function indexAction()
    {
        /**
         * Validate form input field
         * If some data is missing or data does not match pattern
         * Return to info view
         **/
        $data = $this->url->post;

        $data['appointment']['date'] = date_format(date_create($data['appointment']['date']), 'Y-m-d');
        $data['appointment']['typed_date'] = date_format(date_create($data['appointment']['typed_date']), 'Y-m-d');

        //echo "<pre>"; print_r($data);exit;

        $this->load->controller('common');
        if ($this->controller_common->validateToken($data['_token'])) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->redirect('appointments');
        }


        $data['appointment']['datetime'] = date('Y-m-d H:i:s');
        $data['appointment']['user_id'] = $this->session->data['user_id'];
        $appointment_id = $data['appointment']['id'];

        $this->load->model('appointment');

        if (!empty($data['appointment']['id'])) {

            // Update Appointment Info
            if ($data['form_type'] == 'appointment_info') {

                $this->load->model('commons');
                $data['common'] = $this->model_commons->getSiteInfo();

                //$data['appointment']['date'] = DateTime::createFromFormat($data['common']['date_format'], $data['appointment']['date'])->format('Y-m-d');

                if ($validate_field = $this->validateField($data['appointment'])) {
                    $this->session->data['message'] = array('alert' => 'error', 'value' => 'Please enter/select valid ' . implode(", ", $validate_field) . '!');
                    $this->url->redirect('appointment/edit&id=' . $data['appointment']['id']);
                }

                // Get appointment old status
                $appointment_details = $this->model_appointment->getAppointmentView($data['appointment']['id']);

                // Generate TokBox Sesstion
                $data['appointment']['session_id'] = '';
                $data['appointment']['token'] = '';
                $data['appointment']['video_consultation_token'] = '';
                if ($data['appointment']['status'] == CONFIRMED_APPOINTMENT_STATUS_ID and $data['appointment']['consultation_type'] == APPOINTMENT_VIDEO_CONSULTATION_TYPE) {
                    //echo "<pre>";print_r($data);exit;
                    $user_id = $data['appointment']['user_id'];
                    $tokBoxSession = $this->generateTokBoxSession($data['appointment']['id'], $data['appointment']['doctor'], $data['appointment']['patient_id'], $this->session->data['user_id']);

                    $data['appointment']['session_id'] = $tokBoxSession['sessionId'];
                    $data['appointment']['token'] = $tokBoxSession['token'];
                    $data['appointment']['video_consultation_token'] = $tokBoxSession['video_consultation_token'];
                }
                if (isset($data['submitComplete'])) {
                    $data['appointment']['status'] = COMPLETED_APPOINTMENT_STATUS_ID;
                }

                $result = $this->model_appointment->updateAppointment($data['appointment']);


                $this->load->model('patient');

                // Notify patient when status change
                if ($appointment_details['status'] != $data['appointment']['status'] and $data['appointment']['date'] >= date('Y-m-d')) {

                    $mail_result = $this->appointmentMail($data['appointment']['id'], 'appointmentstatusupdate');

                    $this->controller_common->notifyPatientBySMS($data['appointment']['id'], 'UPDATE_APPOINTMENT');
                }
                $message = "Appointment Clinical Note updated successfully.";
                $redirect_to = "view";
            }


            // Update Prescription
            if ($data['form_type'] == 'appointment_prescription') {

                //Update appointment as completed
                if (isset($data['submitComplete'])) {
                    $data['appointment']['status'] = COMPLETED_APPOINTMENT_STATUS_ID;
                    $result = $this->model_appointment->updateAppointmentStatus($data['appointment']['id'], $data['appointment']['status']);
                }


                $data['prescription']['medicine'] = array_values($data['prescription']['medicine']);
                if (!empty($data['prescription']['medicine'][0]['name']) || !empty($data['prescription']['medicine'][0]['description'])) {
                    $data['prescription']['medicine'] = json_encode($data['prescription']['medicine']);
                    //echo "<pre>";print_r($data);exit;
                    if (!empty($data['prescription']['id'])) {
                        $this->model_appointment->updatePrescription($data);
                    } else {
                        $this->model_appointment->createPrescription($data);
                    }
                }
                $message = "Appointment Prescription updated successfully.";
                $redirect_to = "edit";
            }
            // Update Examination Notes
            if ($data['form_type'] == 'appointment_records') {

                //Update appointment as completed
                if (isset($data['submitComplete'])) {
                    $data['appointment']['status'] = COMPLETED_APPOINTMENT_STATUS_ID;
                    $result = $this->model_appointment->updateAppointmentStatus($data['appointment']['id'], $data['appointment']['status']);
                }


                $data['appointment']['gcp_required'] = 'YES';
                //  if ($data['appointment']['gcp_required'] == 'YES') {

                if ($data['appointment']['optician_id'] > 0) {
                    $this->newpatiengcpMail($data['appointment']['optician_id']);
                }
                $this->load->model('followup');
                $followup['appointment_id'] = $data['appointment']['id'];
                $followup['patient_id'] = $data['appointment']['patient_id'];
                $followup['optician_id'] = $data['appointment']['optician_id'] ?? 0;
                $followup['payment_status'] = 'UNPAID';
                //$followup['due_date'] = date('Y-m-d', strtotime("+" . $data['appointment']['followup'] . "months", strtotime(date('Y-m-d'))));

                $next_followup = constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$data['appointment']['followup']];
                if (is_numeric($next_followup['value']) and $next_followup['value'] > 0) {
                    $followup['due_date'] = date('Y-m-d', strtotime("+ " . $next_followup['value'] . $next_followup['intervalrime'], strtotime(date('Y-m-d'))));
                    if ($this->model_followup->createFollowup($followup)) {

                        //$this->notificationToMERCForPatientFollowup();
                    }
                }
                //  }

                $this->load->model('patient');
                $patient['id'] = $data['appointment']['patient_id'];
                $patient['is_glaucoma_required'] = $data['appointment']['gcp_required'];
                $patient['gcp_followup_frequency'] = $data['appointment']['followup'];
                $this->model_patient->updatePatientMERCStatus($patient);

                $this->model_appointment->updateExaminationNotes($data['appointment']);
                $message = "Appointment Examination Note updated successfully.";
                $redirect_to = "edit";
            }


            // Update Clinical Note
            if ($data['form_type'] == 'appointment_clinical_note') {
                if (!empty($data['notes']['notes'])) {
                    $data['notes']['notes'] = json_encode($data['notes']['notes']);
                    if (!empty($data['notes']['id'])) {
                        $this->model_appointment->updateNotes($data);
                    } else {
                        $this->model_appointment->createNotes($data);
                    }
                }
                $message = "Appointment Clinical Note updated successfully.";
                $redirect_to = "edit";
            }

            // Update pre_consultation_forms
            if ($data['form_type'] == 'appointment_pre_consultation') {
                if (!empty($data['pre_consultation_forms'])) {
                    $this->model_appointment->updatePreConsultationForms($data);
                }
                $message = "Appointment Pre consultation updated successfully.";
                $redirect_to = "edit";
            }

            // Update Finding
            if ($data['form_type'] == 'appointment_finding') {
                $form_id = $data['finding_form_id'];
                //echo "<pre>"; print_r($data['form']);exit;
                foreach ($data['form'] as $key => $form_data) {
                    $form_field_id = substr($key, strpos($key, '_') + 1);
                    $input_type = substr($key, 0, strpos($key, '_'));
                    $answer = $form_data;
                    if ($input_type == 'checkbox') {
                        $answer = implode(",", $form_data);
                    }
                    $params = [];
                    $params['appointment_id'] = $appointment_id;
                    $params['form_id'] = $form_id;
                    $params['answer'] = $answer;
                    $params['form_field_id'] = $form_field_id;
                    $params['user_id'] = $this->session->data['user_id'];

                    $this->load->model('form');

                    //echo "<pre>"; print_r($params);exit;
                    $this->model_form->updateAppointmentFormAnswer($params);
                }

                // File upload
                $files = $this->url->files;
                //echo "<pre>"; print_r($files);exit;
                if (!empty($files)) {
                    foreach ($files as $key => $file) {
                        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                        $filedir = DIR . 'public/uploads/appointment/forms/' . $appointment_id . '/' . $form_id . '/';
                        if (!file_exists($filedir)) {
                            mkdir($filedir, 0777, true);
                        }
                        $file_name = 'Doc-' . uniqid(rand()) . $appointment_id;

                        $filesystem = new Filesystem();
                        $allow_filetype = array('jpg', 'jpeg', 'gif', 'png');
                        $file_data = ['filedir' => $filedir, 'file_name' => $file_name];
                        $result = $filesystem->moveUpload($file, $file_data, $allow_filetype);
                        //echo "<pre>"; print_r($result);exit;

                        if ($result['error'] === false) {
                            $form_field_id = substr($key, strpos($key, '_') + 1);
                            $params = [];
                            $params['appointment_id'] = $appointment_id;
                            $params['form_id'] = $form_id;
                            //$params['answer'] = $file_name;
                            $params['answer'] = $result['name'];
                            $params['form_field_id'] = $form_field_id;
                            $params['user_id'] = $this->session->data['user_id'];
                            //echo "<pre>"; print_r($params);exit;

                            $this->model_form->updateAppointmentFormAnswer($params);
                        }
                    }
                }

                $message = "Appointment Finding updated successfully.";
                $redirect_to = "edit";
            }

            $this->session->data['message'] = array('alert' => 'success', 'value' => $message);
            // $this->url->redirect('appointment/' . $redirect_to . '&id=' . $data['appointment']['id']);
            $this->url->redirect('appointments');
        }
        $this->url->redirect('appointments');
    }

    public function getMedicine()
    {
        $data = $this->url->get;
        $this->load->model('appointment');
        $result = $this->model_appointment->getSearchedMedicine($data['term']);
        echo json_encode($result);
        exit();
    }

    //Get diagnosis list
    public function getDiagnosis()
    {
        $data = $this->url->get;
        $diagnosis = constant('OCULAR_EXAMINATION_DROP_DOWNS')['DIAGNOSIS'];
        $result = preg_grep("/{$data['term']}/i", $diagnosis);
        echo json_encode($result);
        exit();
    }

    public function appointmentSidebar()
    {
        $data = $this->url->post;
        $this->load->controller('common');
        if ($this->controller_common->validateToken($data['_token'])) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->abs_redirect('dashboard');
        }

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getSiteInfo();
        $data['user'] = $this->model_commons->getUserInfo($this->session->data['user_id']);
        $data['appointment']['date'] = DateTime::createFromFormat($data['common']['date_format'], $data['appointment']['date'])->format('Y-m-d');
        if ($validate_field = $this->validateField($data['appointment'])) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Please enter/select valid ' . implode(", ", $validate_field) . '!');
            $this->url->abs_redirect($_SERVER['HTTP_REFERER']);
        }

        $data['appointment']['user_id'] = $this->session->data['user_id'];
        $data['appointment']['datetime'] = date('Y-m-d H:i:s');

        $this->load->model('appointment');
        if (!empty($data['appointment']['id'])) {
            // Get appointment old status
            $appointment_details = $this->model_appointment->getAppointmentView($data['appointment']['id']);

            // Generate TokBox Sesstion
            $data['appointment']['session_id'] = '';
            $data['appointment']['token'] = '';
            $data['appointment']['video_consultation_token'] = '';
            if ($data['appointment']['status'] == CONFIRMED_APPOINTMENT_STATUS_ID and $data['appointment']['consultation_type'] == APPOINTMENT_VIDEO_CONSULTATION_TYPE) {
                //echo "<pre>";print_r($data);exit;
                $user_id = $data['appointment']['user_id'];
                $tokBoxSession = $this->generateTokBoxSession($data['appointment']['id'], $data['appointment']['doctor'], $data['appointment']['patient_id'], $this->session->data['user_id']);

                $data['appointment']['session_id'] = $tokBoxSession['sessionId'];
                $data['appointment']['token'] = $tokBoxSession['token'];
                $data['appointment']['video_consultation_token'] = $tokBoxSession['video_consultation_token'];
            }

            $this->model_appointment->updateSideBarAppointment($data['appointment']);
            $this->session->data['message'] = array('alert' => 'success', 'value' => 'Appointment updated successfully.');
        } else {

            $data['appointment']['appointment_id'] = date('Ymd') . rand(10, 100) . date('his');
            $data['appointment']['consultation_type'] = 'face_to_face';
            $data['appointment']['id'] = $this->model_appointment->createAppointment($data['appointment']);

            if ($data['appointment']['id']) {

                //update folloup with appointment id and folloup status
                $folloupid = (null !== $data['appointment']['followupid']) ? $data['appointment']['followupid'] : '';
                if (!empty($folloupid)) {
                    $this->load->model('followup');

                    $folloup['id'] = $folloupid;
                    $folloup['followup_status'] = 'APPOINTMENT_CREATED';
                    $folloup['appointment_id'] = $data['appointment']['id'];
                    $followup_result = $this->model_followup->updateFollowupAppointmentID($folloup);
                }

                $this->model_appointment->moveimagefromopticiantoappointment($data['appointment']);
                $this->load->controller('common');

                if ($data['appointment']['date'] >= date('Y-m-d')) {
                    $mail_result = $this->appointmentMail($data['appointment']['id'], 'newappointment');
                    // if ($data['user']['role_id'] == '3') {
                    // 	$this->model_appointment->createPatientDoctor($data);
                    // }
                    $this->controller_common->notifyPatientBySMS($data['appointment']['id'], 'NEW_APPOINTMENT');
                }

                $this->model_appointment->updateDiagnosisAndPrescription($data['appointment']['id'], $data['appointment']['patient_id']);

                $this->session->data['message'] = array('alert' => 'success', 'value' => 'Appointment created successfully.');
            } else {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Appointment does not created. Server Error');
            }
        }

        $this->url->redirect('appointments');
    }

    /**
     * Appointment index delete method
     * This method will be called on blog delete action
     **/
    public function indexDelete()
    {
        $this->load->controller('common');
        if ($this->controller_common->validateToken($this->url->post('_token'))) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->redirect('appointments');
        }

        if (!isset($_POST['delete']) || empty($this->url->post('id'))) {
            $this->url->redirect('appointments');
        }
        $this->load->model('appointment');
        $result = $this->model_appointment->deleteAppointment((int)$this->url->post('id'));
        $this->session->data['message'] = array('alert' => 'success', 'value' => 'Appointment deleted successfully.');
        $this->url->redirect('appointments');
    }

    public function indexMail()
    {
        if (!isset($_POST['submit'])) {
            $this->url->redirect('appointments');
        }

        $data = $this->url->post;


        $this->load->controller('common');
        if ($this->controller_common->validateToken($data['_token'])) {
            $this->url->redirect('appointments');
        }

        $this->load->model('appointment');
        $result = $this->model_appointment->getAppointment($data['mail']['id']);
        if (empty($result)) {
            $this->url->redirect('appointments');
        }

        //Leaflet attachments
        $this->load->model('leaflets');
        if (!empty($data['mail']['attached_leaflets'])) {
            $leaflets = explode(",", $data['mail']['attached_leaflets']);
            foreach ($leaflets as $each) {
                $res_leaflets = $this->model_leaflets->getLeaflets($each);
                $data['mail']['attachments'][] = ['name' => $res_leaflets['doc_name'], 'file' => DIR . "public/uploads/" . $res_leaflets['doc_name']];
            }
        }

        // External file upload
        if (isset($data['mail']['external_file'])) {
            foreach ($data['mail']['external_file'] as $file) {
                $data['mail']['attachments'][] = ['name' => $file, 'file' => DIR . "public/uploads/attachments/" . $file];
            }
        }

        if (isset($data['mail']['doc_type']) && $data['mail']['doc_type'] == "to_optom") {
            $data['mail']['email'] = $data['mail']['email'];
        } else if (isset($data['mail']['doc_type']) && $data['mail']['doc_type'] == "third_party") {
            $data['mail']['email'] = $result['third_party_email'];
        } else {
            $data['mail']['email'] = $result['email'];
        }
        $data['mail']['name'] = $result['name'];
        $data['mail']['redirect'] = 'appointment/view&id=' . $result['id'];

        if ($data['mail']['doc_type']) {

            if ($data['mail']['doc_type'] == "to_optom") {
                // Generate examination doc 
                if (isset($data['mail']['attachment'])) {
                    $filename = str_replace(" ", "-", $result['name']) . '-third-party-letter.pdf';
                    $appointment_id = $data['mail']['id'];
                    $this->model_appointment->generateToOptomOrThirdPartyDoc($data['mail']['doc_type'],$appointment_id, 'email');
                    $data['mail']['attachments'][] = ['name' => $filename, 'file' => DIR . "public/uploads/appointment/letters/" . $appointment_id . '/' . $filename];
                }
            }
            if ($data['mail']['doc_type'] == "third_party") {
                // Generate examination doc
                if (isset($data['mail']['attachment'])) {
                    $filename = str_replace(" ", "-", $result['name']) . '-third-party-letter.pdf';
                    $appointment_id = $data['mail']['id'];
                    $this->model_appointment->generateToOptomOrThirdPartyDoc($data['mail']['doc_type'],$appointment_id, 'email');
                    $data['mail']['attachments'][] = ['name' => $filename, 'file' => DIR . "public/uploads/appointment/letters/" . $appointment_id . '/' . $filename];
                }
            }

            if ($data['mail']['doc_type'] == "to_patient_or_gp") {

                if (isset($data['mail']['gp_email'])) {
                    if (!empty($data['mail']['cc'])) {
                        $data['mail']['cc'] = str_replace(' ', '', $data['mail']['cc'] . "," . $data['mail']['gp_email']);
                    } else {
                        $data['mail']['cc'] = trim($data['mail']['gp_email']);
                    }
                }

                // Generate examination doc
                if (isset($data['mail']['attachment'])) {
                    $filename = strtolower(str_replace(" ", "-", $result['name'])) . '-patient-letter.pdf';
                    $appointment_id = $data['mail']['id'];
                    $this->model_appointment->generateToPatientOrGpDoc($appointment_id, 'email');
                    $data['mail']['attachments'][] = ['name' => $filename, 'file' => DIR . "public/uploads/appointment/letters/" . $appointment_id . '/' . $filename];
                }
            }
        }

        //        if (isset($_FILES['mail']['name']['attach_file'])) {
        //            foreach ($_FILES['mail']['name']['attach_file'] as $key => $file) {
        //                $tmp_name = $_FILES['mail']['tmp_name']['attach_file'][$key];
        //                $data['mail']['attachments'][] = ['name' => $file, 'file' => $tmp_name];
        //            }
        //
        //        }

        $this->load->controller('mail');
// print_r($data['mail']);exit;
        $mail_result = $this->controller_mail->sendMail($data['mail']);
        if ($mail_result == 1) {
            $data['mail']['type'] = 'appointment';
            $data['mail']['type_id'] = $data['mail']['id'];
            $data['mail']['user_id'] = $this->session->data['user_id'];
            $this->controller_mail->createMailLog($data['mail']);
            $this->session->data['message'] = array('alert' => 'success', 'value' => 'Success: Message sent successfully.');
            $this->url->redirect('appointment/view&id=' . $result['id']);
        } else {
            $this->session->data['message'] = array('alert' => 'error', 'value' => $mail_result);
            $this->url->redirect('appointment/view&id=' . $result['id']);
        }
    }

    public function indexAppointment()
    {
        $data = $this->url->post;
        /**
         * Check if request is POST or not
         * Validate input field
         **/
        $this->load->controller('common');
        if (!$this->validate($data)) {
            echo '<div class="font-14 text-danger">Please enter valid Doctor and Date.</div>';
            exit();
        }

        $this->load->model('appointment');
        if (!$time = json_decode($this->model_appointment->getDoctorTime($data['doctor']), true)) {
            echo '<div class="font-14 text-danger">No slot available.</div>';
            exit();
        }

        $slot_html = '<input type="hidden" name="appointment[slot]" value="' . $time[$data['day']]['slot'] . '" required>';
        $time_slot = $this->makeSlot($time[$data['day']]);
        $booked_slot = $this->model_appointment->bookedSlot($data['date'], $data['doctor']);
        if (empty($time_slot)) {
            echo '<div class="font-14 text-danger">No slot available.</div>';
            exit();
        }
        $count = 0;
        $booked = '';
        foreach ($time_slot as $key => $time) {
            foreach ($booked_slot as $booked) {
                if ($time === $booked) {
                    $count++;
                }
            }
            if ($count > 0) {
                $booked = '<span>' . $count . '</span>';
            } else {
                $booked = '';
            }

            if ($count > 0) {
                $slot_html .= '<div><input type="radio" name="appointment[time]" id="apnt-time-' . $key . '" value="' . $time . '" disabled><label for="apnt-time-' . $key . '" style="background-color:#e9ecef">' . $time . $booked . '</label></div>';
            } else {
                $slot_html .= '<div><input type="radio" name="appointment[time]" id="apnt-time-' . $key . '" value="' . $time . '" required><label for="apnt-time-' . $key . '">' . $time . $booked . '</label></div>';
            }
            $count = 0;
            $booked = '';
        }
        echo $slot_html;
        exit();
    }

    public function pdfRecords()
    {
        $id = $this->url->get('id');
        if (empty($id)) {
            $this->url->redirect('appointments');
        }

        if (!$this->user_agent->hasPermission('appointment/records') || !$this->user_agent->hasPermission('patient/notes')) {
            $this->url->redirect('appointments');
        }

        $this->load->model('commons');
        $this->load->model('appointment');

        $result = $this->model_appointment->clinicalNotesPDF($id);
        if (empty($result)) {
            $this->url->redirect('appointments');
        } else {
            $result['notes'] = json_decode($result['notes'], true);
        }

        $common = $this->model_commons->getSiteInfo();
        $meta_title = 'Clinical Notes';

        ob_start();
        include DIR_ADMIN . 'app/views/appointment/records_pdf.tpl.php';
        $html = ob_get_clean();

        if (ob_get_length() > 0) {
            ob_end_flush();
        }

        $string = array('html' => $html, 'result' => $result);;
        $pdf = new PDF();
        $pdf->createPDF($string);
    }

    public function documentUpload()
    {
        $data = $this->url->post;
        $data['user_id'] = $this->session->data['user_id'];

        $file = $this->url->files['file'];
        $data['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);

        $data['filedir'] = DIR . 'public/uploads/appointment/reports/' . $data['id'] . '/';
        $data['file_name'] = 'Doc-' . uniqid(rand()) . $data['id'];

        $filesystem = new Filesystem();
        $result = $filesystem->moveUpload($file, $data);

        if ($result['error'] === false) {
            $data['report'] = $result['name'];
            $this->load->model('appointment');
            $this->model_appointment->createReport($data);
            $result['ext'] = $data['ext'];
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    public function documentRemove()
    {
        $file = $this->url->post('name');
        $appointment_id = $this->url->post('id');
        if (!is_string($file)) {
            echo "2";
            exit();
        }

        /*if (!unlink(DIR . 'public/uploads/appointment/reports/' . $appointment_id . '/' . $file)) {
            echo("Error deleting $file");
        } else {
            $data['report'] = $this->url->post('name');
            $data['appointment_id'] = $appointment_id;
            $this->load->model('appointment');
            $result = $this->model_appointment->deleteReport($data);
            echo $result;
        }*/
        unlink(DIR . 'public/uploads/appointment/reports/' . $appointment_id . '/' . $file);
        $data['report'] = $this->url->post('name');
        $data['appointment_id'] = $appointment_id;
        $this->load->model('appointment');
        $result = $this->model_appointment->deleteReport($data);
        echo $result;
    }

    public function appointmentMail($id, $template = 'newappointment')
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate($template);
        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $this->load->model('appointment');
        $this->load->model('user');
        $appointment = $this->model_appointment->getAppointmentView($id);
        $optician = $this->model_user->getUser($appointment['optician_id']);

        $video_consultation_link = " - ";
        $link = '<a href="' . URL . '">Click</a>';
        if ($appointment['status'] == CONFIRMED_APPOINTMENT_STATUS_ID and $appointment['consultation_type'] == APPOINTMENT_VIDEO_CONSULTATION_TYPE) {
            $video_consultation_link = URL . DIR_ROUTE . 'appointment/openVideoConsultation&token=' . $appointment['video_consultation_token'];
        }

        if ($template == 'appointmentstatusupdate') {

            $result['template']['message'] = str_replace('{appointment_id}', $appointment['appointment_id'], $result['template']['message']);
            $result['template']['message'] = str_replace('{name}', $appointment['name'], $result['template']['message']);
            $result['template']['message'] = str_replace('{email}', $appointment['email'], $result['template']['message']);
            $result['template']['message'] = str_replace('{mobile}', $appointment['mobile'], $result['template']['message']);
            $result['template']['message'] = str_replace('{doctor}', $result['common']['name'], $result['template']['message']);
            $result['template']['message'] = str_replace('{date}', $appointment['date'], $result['template']['message']);
            $result['template']['message'] = str_replace('{reason}', $appointment['message'], $result['template']['message']);
            $result['template']['message'] = str_replace('{status}', constant('APPOINTMENT_STATUS')[$appointment['status']], $result['template']['message']);
            $result['template']['message'] = str_replace('{consultation_method}', $appointment['consultation_type'], $result['template']['message']);
            $result['template']['message'] = str_replace('{video_consultation_link}', $video_consultation_link, $result['template']['message']);
            $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
            $result['template']['message'] = str_replace('{time}', $appointment['time'], $result['template']['message']);
            $result['template']['message'] = str_replace('{link}', $link, $result['template']['message']);

            $data['name'] = $result['template']['name'];
            $data['email'] = $appointment['email'];
            // as per tarun, he dont want doctor email in CC.
            //$data['cc'] = $appointment['doctor_email'];
            $data['subject'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['subject']);
            $data['message'] = $result['template']['message'];
        } else {
            $result['template']['message'] = str_replace('{ophth_title}', "", $result['template']['message']);
            $result['template']['message'] = str_replace('{Ophth_fname, lname}', $appointment['doctor_name'], $result['template']['message']);
            $result['template']['message'] = str_replace('{appt_date}', date('d-m-Y', strtotime($appointment['date'])), $result['template']['message']);
            $result['template']['message'] = str_replace('{appt_time}', $appointment['time'], $result['template']['message']);
            $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
            $result['template']['message'] = str_replace('{patient_title}', $appointment['title'], $result['template']['message']);
            $result['template']['message'] = str_replace('{patient fname, lname}', $appointment['firstname'] . " " . $appointment['lastname'], $result['template']['message']);
            $result['template']['message'] = str_replace('{appt_loaction}', constant('HOSPITAL_LIST')[$appointment['hospital_code']]['name'], $result['template']['message']);

            $data['name'] = $result['template']['name'];
            $data['email'] = $appointment['email'];
            // as per tarun, he dont want doctor email in CC.
            //$data['cc'] = $appointment['doctor_email'];
            $data['subject'] = str_replace('{ophth_title}', "", $result['template']['subject']);
            $data['subject'] = str_replace('{Ophth_fname, lname}', $appointment['doctor_name'], $data['subject']);
            $data['message'] = $result['template']['message'];
        }

        return $this->controller_mail->sendMail($data);
    }

    public function newpatiengcpMail($id, $template = 'newpatiengcp')
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate($template);
        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }

        $this->load->model('user');
        $user_med_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')[constant('USER_ROLE_MED')]);
        $user_gcp_sec_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')[constant('USER_ROLE_MERC')]);
        $optician = $this->model_user->getUser($id);
        $role = $this->model_user->userRoleByID($optician['user_role']);

        $link = '<a href="' . URL . 'admin">MERCDashboard</a>';
        $result['template']['message'] = str_replace('{gcp_fname}', $user_gcp_sec_data['firstname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{gcp_lname}', $user_gcp_sec_data['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('MERCDashboard', $link, $result['template']['message']);

        $data['email'] = $user_gcp_sec_data['email'];
        $data['name'] = $user_gcp_sec_data['firstname'] . ' ' . $user_gcp_sec_data['lastname'];
        $data['cc'] = $user_med_data['email'];
        $data['subject'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];


        return $this->controller_mail->sendMail($data);
    }

    public function notificationToMERCForPatientFollowup($id, $template = 'notification_to_gcp_sec_for_patient_follow_up_coming')
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate($template);
        $this->load->model('followup');
        $followup = $this->model_followup->getFollowupByID($id);

        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $this->load->model('user');

        $optician = $this->model_user->getUser($followup['optician_id']);
        $user_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')[constant('USER_ROLE_MERC')]);

        $result['template']['message'] = str_replace('{gcp_sec_fname}', $user_data['firstname'], $result['template']['message']);
        $result['template']['message'] = str_replace('gcp_lname', $optician['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{followup_date}', date('d-m-Y', strtotime($followup['due_date'])), $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);


        $data['email'] = $user_data['email'];
        $data['subject'] = str_replace('{patient_fname, patient_lname}', $followup['firstname'] . " " . $followup['lastname'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }

    public function reportsExport()
    {
        $id = (int)$this->url->get('id');

        if (empty($id) || !is_int($id)) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Appointment id missing.');
            $this->url->redirect('appointment/edit&id=' . $id);
        }

        $export_docs = [];
        $this->load->model('appointment');
        $export_docs = $this->model_appointment->getReports($id);
        $source_dir = DIR . "public/uploads/appointment/reports/" . $id . "/";

        if (empty($export_docs)) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Documents not available.');
            $this->url->redirect('appointment/edit&id=' . $id);
        }

        $appointment_code = "APNT" . str_pad($id, 5, '0', STR_PAD_LEFT);
        $path = "../public/uploads/appointment/";
        $zip_file_path = $path . date('Ymd') . "_" . $appointment_code . "_reports_export.zip";
        if (file_exists($zip_file_path)) {
            unlink($zip_file_path);
        }

        $source_files = [];
        foreach ($export_docs as $doc) {

            $filePath = $source_dir . $doc['report'];
            $relativePath = 'reports/' . $doc['report'];

            $source_files[] = [
                'filePath' => $filePath,
                'relativePath' => $relativePath,
            ];
        }

        $parems = [];
        $parems['source_files'] = $source_files;
        $parems['zip_file_path'] = $zip_file_path;
        $this->createZipFile($parems);

        if (file_exists($zip_file_path)) {
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . basename($zip_file_path) . '"');
            header('Content-Length: ' . filesize($zip_file_path));

            flush();
            readfile($zip_file_path);
            // delete file
            unlink($zip_file_path);
        }
    }

    public function imagesExport()
    {
        $id = (int)$this->url->get('id');

        if (empty($id) || !is_int($id)) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Appointment id missing.');
            $this->url->redirect('appointment/edit&id=' . $id);
        }

        $export_docs = [];
        $this->load->model('appointment');
        $export_docs = $this->model_appointment->getAppointmentImages($id);
        $source_dir = DIR . "public/uploads/appointment/images/" . $id . "/";

        if (empty($export_docs)) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Documents not available.');
            $this->url->redirect('appointment/edit&id=' . $id);
        }

        $appointment_code = "APNT" . str_pad($id, 5, '0', STR_PAD_LEFT);
        $path = "../public/uploads/appointment/";
        $zip_file_path = $path . date('Ymd') . "_" . $appointment_code . "_images_export.zip";
        if (file_exists($zip_file_path)) {
            unlink($zip_file_path);
        }

        $source_files = [];
        foreach ($export_docs as $doc) {

            $filePath = $source_dir . $doc['filename'];
            $relativePath = 'images/' . $doc['filename'];

            $source_files[] = [
                'filePath' => $filePath,
                'relativePath' => $relativePath,
            ];
        }

        $parems = [];
        $parems['source_files'] = $source_files;
        $parems['zip_file_path'] = $zip_file_path;
        $this->createZipFile($parems);

        if (file_exists($zip_file_path)) {
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . basename($zip_file_path) . '"');
            header('Content-Length: ' . filesize($zip_file_path));

            flush();
            readfile($zip_file_path);
            // delete file
            unlink($zip_file_path);
        }
    }

    public function createZipFile($parems = [])
    {
        if (!empty($parems['source_files'])) {
            $zip = new \ZipArchive();
            $zip->open($parems['zip_file_path'], \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

            foreach ($parems['source_files'] as $image) {
                $zip->addFile($image['filePath'], $image['relativePath']);
            }

            $zip->close();
        }
    }

    public function moveImageToReport()
    {
        $image_id = $this->url->post('image_id');
        if (!is_numeric($image_id)) {
            echo "Invalid image id";
            exit();
        }

        $data['image_id'] = $image_id;
        $this->load->model('appointment');
        $result = $this->model_appointment->moveImageToReport($data);
        echo $result;
    }

    protected function makeSlot($time)
    {
        $time_slot = [];
        $st1 = strtotime($time['st1']);
        $et1 = strtotime($time['et1']);
        $st2 = strtotime($time['st2']);
        $et2 = strtotime($time['et2']);
        if (!empty($time['slot'])) {
            if ($st1 < $et1) {
                while ($st1 < $et1) {
                    $time_slot[] = date("H:i", $st1);
                    $st1 += $time['slot'] * 60;
                }
            }

            if ($st2 < $et2) {
                while ($st2 < $et2) {
                    $time_slot[] = date("H:i", $st2);
                    $st2 += $time['slot'] * 60;
                }
            }
        }
        return $time_slot;
    }

    /**
     * Validate form input field on server side
     **/
    protected function validate($data)
    {
        if ($this->controller_common->validateNumber($data['doctor'])) {
            /**
             * If doctor is not int
             * Return false
             **/
            return false;
        } elseif (!$this->validateDate($data['date'])) {
            /**
             * If date is not valid
             * also date is less than today
             * Return false
             **/
            return false;
        } elseif ($this->controller_common->validateNumber($data['day'])) {
            /**
             * If date is not valid
             * also date is less than today
             * Return false
             **/
            return false;
        } else {
            return true;
        }
    }

    protected function validateField($data)
    {
        $error = [];
        $error_flag = false;
        if ($this->controller_common->validateText($data['name'])) {
            $error_flag = true;
            $error['name'] = 'name';
        }

        if ($this->controller_common->validateEmail($data['mail'])) {
            $error_flag = true;
            $error['email'] = 'email address';
        }

        if ($this->controller_common->validatePhoneNumber($data['mobile'])) {
            $error_flag = true;
            $error['mobile'] = 'mobile number';
        }

        if ($this->controller_common->validateNumber($data['doctor'])) {
            $error_flag = true;
            $error['doctor'] = 'doctor';
        }

        if ($this->controller_common->validateDate($data['date'])) {
            $error_flag = true;
            $error['date'] = 'date';
        }

        if ($this->controller_common->validateText($data['time'])) {
            $error_flag = true;
            $error['time'] = 'time';
        }

        if ($this->controller_common->validateNumber($data['department'])) {
            $error_flag = true;
            $error['department'] = 'department';
        }

        if ($error_flag) {
            return $error;
        } else {
            return false;
        }
    }

    /**
     * function to check Date format
     * If matches then good else invalidate
     **/
    protected function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function startVideoConsultation()
    {

        $token = $this->url->get('token', '');

        $this->load->model('appointment');

        if (!$this->user_agent->isLogged()) {
            $this->url->redirect('login');
        }

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
        $data['common']['admin_menu'] = '';
        //echo "<pre>"; print_r($data['common']);exit;
        $data['tokbox_details'] = $this->model_appointment->getVideoConsultationDetails($token);
        $appointment_id = (isset($data['tokbox_details']['appointment_id']) and !empty($data['tokbox_details']['appointment_id'])) ? $data['tokbox_details']['appointment_id'] : 0;

        if (!empty($appointment_id) and $appointment_id > 0) {
            $data['result'] = $this->model_appointment->getAppointmentView($appointment_id);

            if (!$data['result']) {
                $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Appointment does not exist in database!');
                $this->url->redirect('appointments');
            }

            // Get Appointments details
            //$id = $data['result']['id'];
            //$data['result'] = $this->model_appointment->getAppointment($id);

            $data['doctors'] = $this->model_appointment->getDoctors();
            $data['prescription'] = $this->model_appointment->getPrescription($appointment_id);

            if (!empty($data['prescription'])) {
                $data['prescription']['prescription'] = json_decode($data['prescription']['prescription'], true);
            } else {
                $data['prescription'] = NULL;
            }

            $data['notes'] = $this->model_appointment->getClinicalNotes($appointment_id);
            if (!empty($data['notes'])) {
                $data['notes']['notes'] = json_decode($data['notes']['notes'], true);
            } else {
                $data['notes'] = NULL;
            }

            $data['reports'] = $this->model_appointment->getReports($appointment_id);
            $data['appointment_images'] = $this->model_appointment->getAppointmentImages($appointment_id);

            // Get pre consultation forms
            $this->load->model('form');
            $data['pre_consultation_forms'] = $this->model_form->getPreConsultationFormsByDepartments($data['result']['department_id']);
            $data['finding_forms'] = $this->model_form->getFindingFormsByDepartments($data['result']['department_id']);
            //print_r($data['pre_consultation_forms']);exit;

            // Get PreConsultation Forms by Appointment
            $data['selected_forms'] = $this->model_form->getPreConsultationFormsByAppointment($appointment_id);
            $data['formObj'] = $this->model_form;

            $data['page_title'] = ' Appointment : Video consultation';
            $data['invoice_add'] = $this->user_agent->hasPermission('invoice/add') ? true : false;
            $data['invoice_view'] = $this->user_agent->hasPermission('invoice/view') ? true : false;
            $data['page_document_upload'] = $this->user_agent->hasPermission('report/reportUpload') ? true : false;
            $data['page_document_remove'] = $this->user_agent->hasPermission('report/removeReport') ? true : false;
            $data['page_notes'] = $this->user_agent->hasPermission('appointment/notes') ? true : false;
            $data['page_documents'] = $this->user_agent->hasPermission('appointment/documents') ? true : false;
            $data['page_prescriptions'] = $this->user_agent->hasPermission('prescriptions') ? true : false;

            $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);

            $this->response->setOutput($this->load->view('appointment/video-call', $data));
        } else {

            // Load Open appoiment
            if (isset($data['tokbox_details']['doctor_id'])) {
                $data['doctor_data'] = $this->model_appointment->getDoctorData($data['tokbox_details']['doctor_id']);
            }
            $data['page_title'] = 'Video consultation';

            $this->response->setOutput($this->load->view('appointment/open-video-call', $data));
        }
    }

    public function generateTokBoxSession($appointment_id = 0, $doctor_id = 0, $patient_id = 0, $user_id = 0)
    {

        $apiKey = TOKBOX_APIKEY;
        $apiSecret = TOKBOX_APISECRET;

        $opentok = new OpenTok($apiKey, $apiSecret);

        // Create a session that attempts to use peer-to-peer streaming:
        //$session = $opentok->createSession();

        // An automatically archived session:
        $sessionOptions = array(
            //'archiveMode' => ArchiveMode::ALWAYS,
            'mediaMode' => MediaMode::ROUTED
        );
        $session = $opentok->createSession($sessionOptions);


        // Store this sessionId in the database for later use
        $sessionId = $session->getSessionId();

        $options = array(
            'role' => Role::MODERATOR,
            'expireTime' => time() + (1 * 24 * 60 * 60), // in one week
            'data' => 'name=APPT-' . $appointment_id,
            'initialLayoutClassList' => array('focus')
        );
        $token = $session->generateToken($options);

        $video_consultation_token = bin2hex(random_bytes(24));
        $query = $this->database->query("INSERT INTO `" . DB_PREFIX . "video_consultation_session` (`appointment_id`, `doctor_id`, `patient_id`, `user_id`, `sessionId`, `token`, `video_consultation_token`) VALUES (?, ?, ?, ?, ?, ?, ?) ", array($appointment_id, $doctor_id, $patient_id, $user_id, $sessionId, $token, $video_consultation_token));

        if ($query->num_rows > 0) {
            $last_inserted_id = $this->database->last_id();
        }

        return ['sessionId' => $sessionId, 'token' => $token, 'video_consultation_token' => $video_consultation_token, 'tokbox_session_id' => $last_inserted_id];
    }

    public function clinicalNoteUpdate()
    {

        /**
         * Validate form input field
         * If some data is missing or data does not match pattern
         * Return to info view
         **/
        $data = $this->url->post;
        $this->load->model('appointment');
        if (!empty($data['appointment_id'])) {

            // Get appointment old status
            $data['appointment'] = $this->model_appointment->getAppointmentView($data['appointment_id']);
            $data['appointment']['doctor'] = $data['appointment']['doctor_id'];

            if (isset($data['form_type']) and $data['form_type'] == 'appointment_finding') {
                $form_id = $data['finding_form_id'];
                $appointment_id = $data['appointment_id'];
                foreach ($data['form'] as $key => $form_data) {
                    $form_field_id = substr($key, strpos($key, '_') + 1);
                    $input_type = substr($key, 0, strpos($key, '_'));
                    $answer = $form_data;
                    if ($input_type == 'checkbox') {
                        $answer = implode(",", $form_data);
                    }
                    $params = [];
                    $params['appointment_id'] = $appointment_id;
                    $params['form_id'] = $form_id;
                    $params['answer'] = $answer;
                    $params['form_field_id'] = $form_field_id;
                    $params['user_id'] = $this->session->data['user_id'];

                    $this->load->model('form');

                    //echo "<pre>"; print_r($params);exit;
                    $this->model_form->updateAppointmentFormAnswer($params);
                }

                // File upload
                $files = $this->url->files;
                //echo "<pre>"; print_r($files);exit;
                if (!empty($files)) {
                    foreach ($files as $key => $file) {
                        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                        $filedir = DIR . 'public/uploads/appointment/forms/' . $appointment_id . '/' . $form_id . '/';
                        if (!file_exists($filedir)) {
                            mkdir($filedir, 0777, true);
                        }
                        $file_name = 'Doc-' . uniqid(rand()) . $appointment_id;

                        $filesystem = new Filesystem();
                        $allow_filetype = array('jpg', 'jpeg', 'gif', 'png');
                        $file_data = ['filedir' => $filedir, 'file_name' => $file_name];
                        $result = $filesystem->moveUpload($file, $file_data, $allow_filetype);
                        //echo "<pre>"; print_r($result);exit;

                        if ($result['error'] === false) {
                            $form_field_id = substr($key, strpos($key, '_') + 1);
                            $params = [];
                            $params['appointment_id'] = $appointment_id;
                            $params['form_id'] = $form_id;
                            //$params['answer'] = $file_name;
                            $params['answer'] = $result['name'];
                            $params['form_field_id'] = $form_field_id;
                            $params['user_id'] = $this->session->data['user_id'];
                            //echo "<pre>"; print_r($params);exit;

                            $this->model_form->updateAppointmentFormAnswer($params);
                        }
                    }
                }
            } else {
                if (!empty($data['notes']['notes'])) {
                    $data['user_id'] = $this->session->data['user_id'];
                    $data['notes']['notes'] = json_encode($data['notes']['notes']);
                    /*if (!empty($data['notes']['id'])) {
                        $this->model_appointment->updateNotes($data);
                    } else {
                        $this->model_appointment->createNotes($data);
                    }*/
                    $this->model_appointment->saveNotes($data);
                }
            }

            $result['error'] = FALSE;
            $result['message'] = "Clinical note saved";
        } else {
            $result['error'] = True;
            $result['message'] = "Appointment id missing";
        }

        echo json_encode($result);
    }

    public function PrescriptionUpdate()
    {
        /**
         * Validate form input field
         * If some data is missing or data does not match pattern
         * Return to info view
         **/
        $data = $this->url->post;
        $this->load->model('appointment');
        if (!empty($data['appointment_id'])) {

            // Get appointment old status
            $data['appointment'] = $this->model_appointment->getAppointmentView($data['appointment_id']);
            $data['appointment']['doctor'] = $data['appointment']['doctor_id'];
            $data['appointment']['mail'] = $data['appointment']['email'];
            $data['appointment']['datetime'] = $data['appointment']['date'] . ' ' . $data['appointment']['time'];
            $data['appointment']['user_id'] = $this->session->data['user_id'];

            $data['prescription']['medicine'] = array_values($data['prescription']['medicine']);
            if (!empty($data['prescription']['medicine'][0]['name']) || !empty($data['prescription']['medicine'][0]['description'])) {
                $data['prescription']['medicine'] = json_encode($data['prescription']['medicine']);
                if (!empty($data['prescription']['id'])) {
                    $this->model_appointment->updatePrescription($data);
                } else {
                    $this->model_appointment->createPrescription($data);
                }
            }

            $result['error'] = FALSE;
            $result['message'] = "Prescription updated successfully";
        } else {
            $result['error'] = True;
            $result['message'] = "Appointment id missing";
        }
        echo json_encode($result);
    }

    public function AppointmentLetters()
    {
        $appointment_id = (int)$this->url->get('id');
        if (empty($appointment_id) || !is_int($appointment_id)) {
            $this->url->redirect('appointments');
        }

        $doc_type = $this->url->get('doc_type');
        if (empty($doc_type) || !in_array($doc_type, ['to_patient_or_gp', 'to_optom', 'third_party', 'discharge'])) {
            // echo "Check 1" . $doc_type;
            // exit;
            $this->url->redirect('appointment/view&id=' . $appointment_id);
        }

        $action = $this->url->get('action');
        if (empty($action) || !in_array($action, ['download', 'email'])) {
            // echo "Check 2";
            // exit;
            $this->url->redirect('appointment/view&id=' . $appointment_id);
        }

        $this->load->model('appointment');

        if ($action == 'download') {
            if ($doc_type == 'to_optom') {
                $this->model_appointment->generateToOptomOrThirdPartyDoc($doc_type, $appointment_id, "DOWNLOAD");
            }
            if ($doc_type == 'third_party') {
                $this->model_appointment->generateToOptomOrThirdPartyDoc($doc_type, $appointment_id, "DOWNLOAD");
            }
            if ($doc_type == 'to_patient_or_gp') {
                $this->model_appointment->generateToPatientOrGpDoc($appointment_id, "DOWNLOAD");
            }
        }

        /*if($action == 'email'){
            $this->url->redirect('appointment/view&id='.$appointment_id.'&doc_type='.$doc_type);
        }*/
    }

    public function UpdateAppintmentInfo()
    {
        /**
         * Validate form input field
         * If some data is missing or data does not match pattern
         * Return error
         **/
        $data = $this->url->post;
        // print_r($data);exit;
        $data['appointment']['date'] = date_format(date_create($data['appointment']['date']), 'Y-m-d');

        $this->load->controller('common');
        if ($this->controller_common->validateToken($data['_token'])) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->redirect('appointments');
        }

        $data['appointment']['datetime'] = date('Y-m-d H:i:s');
        $data['appointment']['user_id'] = $this->session->data['user_id'];

        $this->load->model('appointment');

        if (!empty($data['appointment']['id'])) {

            // Update Appointment Info
            if ($data['form_type'] == 'appointment_info') {

                $this->load->model('commons');
                $data['common'] = $this->model_commons->getSiteInfo();

                $data['appointment']['typed_date'] = date_format(date_create($data['appointment']['typed_date']), 'Y-m-d');

                if ($validate_field = $this->validateField($data['appointment'])) {
                    $this->session->data['message'] = array('alert' => 'error', 'value' => 'Please enter/select valid ' . implode(", ", $validate_field) . '!');
                    $this->url->redirect('appointment/edit&id=' . $data['appointment']['id']);
                }

                // Get appointment old status
                $appointment_details = $this->model_appointment->getAppointmentView($data['appointment']['id']);

                // Generate TokBox Sesstion
                $data['appointment']['session_id'] = '';
                $data['appointment']['token'] = '';
                $data['appointment']['video_consultation_token'] = '';
                if ($data['appointment']['status'] == CONFIRMED_APPOINTMENT_STATUS_ID and $data['appointment']['consultation_type'] == APPOINTMENT_VIDEO_CONSULTATION_TYPE) {
                    //echo "<pre>";print_r($data);exit;
                    $user_id = $data['appointment']['user_id'];
                    $tokBoxSession = $this->generateTokBoxSession($data['appointment']['id'], $data['appointment']['doctor'], $data['appointment']['patient_id'], $this->session->data['user_id']);

                    $data['appointment']['session_id'] = $tokBoxSession['sessionId'];
                    $data['appointment']['token'] = $tokBoxSession['token'];
                    $data['appointment']['video_consultation_token'] = $tokBoxSession['video_consultation_token'];
                }
                if (isset($data['submitComplete'])) {
                    $data['appointment']['status'] = COMPLETED_APPOINTMENT_STATUS_ID;
                }

                $result = $this->model_appointment->updateAppointment($data['appointment']);


                $this->load->model('patient');

                $patient_update_parames = [
                    'mail' => $data['appointment']['mail'],
                    'mobile' => $data['appointment']['mobile'],
                    'id' => $data['appointment']['patient_id']
                ];
                $this->model_patient->updatePatientEmailAndMobile($patient_update_parames);

                // Notify patient when status change
                if ($appointment_details['status'] != $data['appointment']['status'] and $data['appointment']['date'] >= date('Y-m-d')) {

                    $mail_result = $this->appointmentMail($data['appointment']['id'], 'appointmentstatusupdate');

                    $this->controller_common->notifyPatientBySMS($data['appointment']['id'], 'UPDATE_APPOINTMENT');
                }
                $message = "Appointment detail updated successfully.";
            }


            // Update Prescription
            if ($data['form_type'] == 'appointment_prescription') {

                //Update appointment as completed
                if (isset($data['submitComplete'])) {
                    $data['appointment']['status'] = COMPLETED_APPOINTMENT_STATUS_ID;
                    $result = $this->model_appointment->updateAppointmentStatus($data['appointment']['id'], $data['appointment']['status']);
                }

                if (isset($data['prescription']['medicine']) and !empty($data['prescription']['medicine'])) {
                    $data['prescription']['medicine'] = array_values($data['prescription']['medicine']);
                    if (!empty($data['prescription']['medicine'][0]['name']) || !empty($data['prescription']['medicine'][0]['description'])) {
                        $data['prescription']['medicine'] = json_encode($data['prescription']['medicine']);
                        //echo "<pre>";print_r($data);exit;
                        if (!empty($data['prescription']['id'])) {
                            $this->model_appointment->updatePrescription($data);
                        } else {
                            $this->model_appointment->createPrescription($data);
                        }
                    }
                } else {
                    $this->model_appointment->removePrescription($data);
                }
                $message = "Appointment Prescription updated successfully.";
            }
            // Update Examination Notes
            if ($data['form_type'] == 'appointment_records') {

                //Update appointment as completed
                if (isset($data['submitComplete'])) {
                    $data['appointment']['status'] = COMPLETED_APPOINTMENT_STATUS_ID;
                    $result = $this->model_appointment->updateAppointmentStatus($data['appointment']['id'], $data['appointment']['status']);
                }

                $data['appointment']['gcp_required'] = 'YES';
                //  if ($data['appointment']['gcp_required'] == 'YES') {

                if ($data['appointment']['optician_id'] > 0) {
                    $this->newpatiengcpMail($data['appointment']['optician_id']);
                }
                $this->load->model('followup');
                $followup['appointment_id'] = $data['appointment']['id'];
                $followup['patient_id'] = $data['appointment']['patient_id'];
                $followup['optician_id'] = $data['appointment']['optician_id'] ?? 0;
                $followup['payment_status'] = 'UNPAID';
                //$followup['due_date'] = date('Y-m-d', strtotime("+" . $data['appointment']['followup'] . "months", strtotime(date('Y-m-d'))));

                $next_followup = constant('OCULAR_EXAMINATION_DROP_DOWNS')['FOLLOW_UP_OR_NEXT_APPOINTMENT'][$data['appointment']['followup']];
                if ($next_followup['value'] > 0) {
                    $followup['due_date'] = date('Y-m-d', strtotime("+ " . $next_followup['value'] . $next_followup['intervalrime'], strtotime(date('Y-m-d'))));
                    if ($this->model_followup->createFollowup($followup)) {

                        //$this->notificationToMERCForPatientFollowup();
                    }
                }
                //  }

                $this->load->model('patient');
                $patient['id'] = $data['appointment']['patient_id'];
                $patient['is_glaucoma_required'] = $data['appointment']['gcp_required'];
                $patient['gcp_followup_frequency'] = $data['appointment']['followup'];
                $this->model_patient->updatePatientMERCStatus($patient);

                $this->model_appointment->updateExaminationNotes($data['appointment']);
                $message = "Appointment Examination Note updated successfully.";
            }
            $results['error'] = FALSE;
            $results['message'] = $message;
        } else {
            $results['error'] = True;
            $results['message'] = "Appointment id missing";
        }
        echo json_encode($results);
    }
}
