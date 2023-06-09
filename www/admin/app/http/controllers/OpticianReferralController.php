<?php

/**
 * Optician Referral Controller
 */
class OpticianReferralController extends Controller
{
    /**
     * Optician Referral index method
     * This method will be called on blog list view
     **/
    public function index()
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
        /**
         * Get all optician referral data from DB using optician referral model
         **/
        $this->load->model('opticianreferral');

        $data['period']['start'] = $this->url->get('start');
        $data['period']['end'] = $this->url->get('end');
        $data['period']['status'] = $this->url->get('status');


        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        if (!empty($data['period']['start']) && !empty($data['period']['end'])) {
            $data['period']['start'] = date_format(date_create($data['period']['start'] . '00:00:00'), "Y-m-d H:i:s");
            $data['period']['end'] = date_format(date_create($data['period']['end'] . '23:59:59'), "Y-m-d H:i:s");
        } else {
            $data['period']['start'] = '2021-01-01 00:00:00';
            $data['period']['end'] = date('Y-m-d ' . '23:59:59');

            $data['period']['status'] = constant('STATUS_NEW');
        }


        $data['result'] = $this->model_opticianreferral->getOpticianReferrals($data['period'], $this->session->data['user_id'], $data['common']['user']['role']);

        $data['page_title'] = 'Referrals';
        $data['page_add'] = $this->user_agent->hasPermission('optician-referral/add') ? true : false;
        $data['page_edit'] = $this->user_agent->hasPermission('optician-referral/edit') ? true : false;
        $data['page_delete'] = $this->user_agent->hasPermission('optician-referral/delete') ? true : false;
        $data['page_view'] = $this->user_agent->hasPermission('optician-referral/view') ? true : false;
        $data['page_document_upload'] = $this->user_agent->hasPermission('optician-referral/report/reportUpload') ? true : false;
        $data['page_document_upload'] = $this->user_agent->hasPermission('optician-referral/report/removeReport') ? true : false;
        $data['page_document_export'] = $this->user_agent->hasPermission('optician-referral/report/reportsExport') ? true : false;

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action_delete'] = URL_ADMIN . DIR_ROUTE . 'optician-referral/delete';

        /*Render optician referral view*/
        $this->response->setOutput($this->load->view('optician_referral/optician_referral_list', $data));
    }

    /**
     * Optician Referral index add method
     * This method will be called on Optician Referral add
     **/
    public function indexAdd()
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        /* Set empty data to array */
        $data['result'] = NULL;
        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }
        $this->load->model('opticianreferral');

        /* Set page title */
        $data['page_title'] = 'Refer a patient';

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'optician-referral/add';

        /*Render Optician Referral add view*/
        $this->response->setOutput($this->load->view('optician_referral/optician_referral_form', $data));
    }

    /**
     * Optician Referral index edit method
     * This method will be called on Optician Referral Edit view
     **/
    public function indexEdit()
    {
        /**
         * Check if id exist in url if not exist then redirect to Optician Referral list view
         **/
        $id = (int)$this->url->get('id');
        $status = $this->url->get('status');


        if (empty($id) || !is_int($id)) {
            $this->url->redirect('optician-referral');
        }
        /**
         * Call getOptician Referral method from Optician Referral model to get data from DB for single Optician Referral
         * If Optician Referral does not exist then redirect it to Optician Referral list view
         **/
        $this->load->model('opticianreferral');
        $data['result'] = $this->model_opticianreferral->getOpticianReferral($id);
        $data['reports'] = $this->model_opticianreferral->getOpticianReferralDocumnet($id);
        if (empty($data['result'])) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Optician Referral does not exist in database!');
            $this->url->redirect('optician-referral');
        }
        if (empty($status)) {

            $data['page_edit'] = $this->user_agent->hasPermission('optician-referral/edit') ? true : false;


            $this->load->model('commons');
            $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);


            /* Set confirmation message if page submitted before */
            if (isset($this->session->data['message'])) {
                $data['message'] = $this->session->data['message'];
                unset($this->session->data['message']);
            }

            $data['page_title'] = 'Edit Referral Details';


            $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
            $data['action'] = URL_ADMIN . DIR_ROUTE . 'optician-referral/edit';

            /*Render Optician Referral edit view*/
            $this->response->setOutput($this->load->view('optician_referral/optician_referral_edit_form', $data));
        } else {
            $referral['id'] = $id;
            $referral['status'] = $status;

            if ($this->model_opticianreferral->updateStatus($referral)) {
                // $this->referralMail($id);
                $this->session->data['message'] = array('alert' => 'success', 'value' => 'Optician Referral Status Updated.!');
            } else {
                $this->session->data['message'] = array('alert' => 'danger', 'value' => 'Optician Referral Status Not Updated.!');
            }
            $this->url->redirect('optician-referral');
        }
    }

    public function indexView()
    {
        /**
         * Check if id exist in url if not exist then redirect to list view
         **/
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('optician-referral');
        }
        $data = $this->url->get;
        //print_r($data);exit;
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('opticianreferral');
        $data['result'] = $this->model_opticianreferral->getOpticianReferral($id);
        $data['reports'] = $this->model_opticianreferral->getOpticianReferralDocumnet($id);


        if (!$data['result']) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Optician Referral does not exist in database!');
            $this->url->redirect('optician-referral');
        }

        $this->load->model('user');
        $data['user'] = $this->model_user->getUser($data['result']['created_by']);

        $data['page_title'] = 'Referral Details';
        $data['page_add'] = $this->user_agent->hasPermission('optician-referral/add') ? true : false;
        $data['page_view'] = $this->user_agent->hasPermission('optician-referral/view') ? true : false;
        $data['page_edit'] = $this->user_agent->hasPermission('optician-referral/edit') ? true : false;
        $data['page_delete'] = false;
        $data['page_documents'] = true;

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'optician-referral/edit&id=' . $data['result']['id'];

        /*Render Blog edit view*/
        $this->response->setOutput($this->load->view('optician_referral/optician_referral_view', $data));
    }


    /**
     * Optician Referral index action method
     * This method will be called on Optician Referral submit/save view
     **/
    public function indexAction()
    {
        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['submit'])) {
            $this->url->redirect('optician-referral');
        }

        $data = $this->url->post;
        $this->load->controller('common');
        if ($this->controller_common->validateToken($data['_token'])) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->redirect('optician-referral');
        }

        if ($validate_field = $this->validateField($data['referral'])) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Please enter valid ' . implode(", ", $validate_field) . '!');
            if (!empty($data['referral']['id'])) {
                $this->url->redirect('optician-referral/edit&id=' . $data['referral']['id']);
            } else {
                $this->url->redirect('optician-referral/add');
            }
        }

        $this->load->model('opticianreferral');
        $this->load->model('patient');
        $this->load->model('user');

        if (!empty($data['referral']['id'])) {
            $data['referral']['user_id'] = $this->session->data['user_id'];

            //$address['address1'] = $data['referral']['address_1'];
            //$address['address2'] = $data['referral']['address_2'];
            //$address['city'] = $data['referral']['city'];
            //$address['country'] = "";
            //$address['postal'] = $data['referral']['zip_code'];

            if ($this->model_opticianreferral->updateOpticianReferral($data['referral'])) {

                if (trim($data['referral']['status']) == 'ACCEPTED') {
                    //$patient = $this->model_patient->checkPatientEmail($data['referral']['email']);
                    $check_data = ['firstname' => $data['referral']['first_name'], 'lastname' => $data['referral']['last_name'], 'dob' => $data['referral']['dob'], 'return_type' => 'record'];
                    $patient = $this->model_patient->checkPatientForDuplicate($check_data);

                    $patient_id = $patient['id'];
                    $referral_details = $this->model_opticianreferral->getOpticianReferral($data['referral']['id']); 
                    $optician_user = $this->model_user->getUser($referral_details['created_by']);

                    $optician_user_address = json_decode($optician_user['address'], true);
                    $optician_user_address_for_save = "";
                    $optician_user_address_for_save .= isset($optician_user_address['address1']) ? $optician_user_address['address1'] : '';
                    $optician_user_address_for_save .= isset($optician_user_address['address2']) ? (',' . $optician_user_address['address2']) : '';
                    $optician_user_address_for_save .= isset($optician_user_address['city']) ? (',' . $optician_user_address['city']) : '';
                    $optician_user_address_for_save .= isset($optician_user_address['postal']) ? (' - ' . $optician_user_address['postal']) : '';

                    $patient_data['firstname'] = $data['referral']['first_name'];
                    $patient_data['lastname'] = $data['referral']['last_name'];
                    $patient_data['mobile'] = $data['referral']['mobile'];
                    $patient_data['dob'] = $data['referral']['dob'];
                    $patient_data['user_id'] = $data['referral']['user_id'];
                    $patient_data['optician_address'] = $optician_user_address_for_save;
                    $patient_data['hospital_code'] = $data['referral']['hospital_code'] == null ? null : $data['referral']['hospital_code'];
                    $patient_data['datetime'] = date('Y-m-d H:s:a');


                    if (empty($patient_id)) {

                        $patient_id = $this->model_patient->createPatientFromReferral($patient_data);

                        if (!empty($patient_id)) {
                            $data['patientid'] = $patient_id;
                            $this->model_opticianreferral->updatePatientID($data);

                            // $this->patientMail($patient_id);
                            $this->session->data['message'] = array('alert' => 'success', 'value' => 'Patient created successfully.');
                            // $this->url->redirect('patient/edit&id=' .$patient['id']. '&referralid=' . $data['referral']['id']);
                        }
                    } else {
                        $patient_data['id'] = $patient_id;
                        $this->model_patient->updatePatientFromReferral($patient_data);
                    }

                    //$this->notificationToPatientForAppointmentBooking($patient_id);
                    //$this->url->redirect('patient/edit&id=' . $patient_id . '&referralid=' . $data['referral']['id']);
                    $this->url->redirect('patient/edit&id=' . $patient_id . '&referralid=' . $data['referral']['id'] . '&opticianid=' . $referral_details['created_by']);
                    //$this->url->redirect('optician-referral');

                }

                $this->session->data['message'] = array('alert' => 'success', 'value' => 'Optician Referral updated successfully.');
            } else {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Optician Referral not updated successfully.');
            }
            $this->url->redirect('optician-referral/edit&id=' . $data['referral']['id']);
        } else {

            $validate_referral = $this->model_opticianreferral->validateReferral($data['referral']);

            if ($validate_referral) {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'You have already created referral with this patient.');
                $this->url->redirect('optician-referral');
            } 

            //Check for validations
            if ($this->model_patient->checkPatientForDuplicate($data['referral'])) {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Firstname, Lastname and Date of birth already exist in database.');
                $this->url->redirect('optician-referral');
            }

//            $patient = $this->model_patient->checkPatientEmail($data['referral']['email']);
//            $patient_id = $patient['id'];
//            if (!empty($patient_id)) {
//                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Email  \'' . $data['referral']['email'] . '\'  already exist in database.');
//                $this->url->redirect('optician-referral');
//            }
            
            $data['referral']['user_id'] = $this->session->data['user_id'];
            $opticianID = $this->model_opticianreferral->createOpticianReferral($data['referral']);
            if (!empty($opticianID)) {
                $this->session->data['message'] = array('alert' => 'success', 'value' => 'Optician Referral created successfully.');
                $this->url->redirect('optician-referral/edit&id=' . $opticianID . '&document=true');
            } else {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Optician Referral not created successfully.');
                $this->url->redirect('optician-referral');
            }
        }
    }

    /**
     * Optician Referral index delete method
     * This method will be called on Optician Referral delete action
     **/
    public function indexDelete()
    {
        $this->load->controller('common');
        if ($this->controller_common->validateToken($this->url->post('_token'))) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->redirect('optician-referral');
        }

        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['delete']) || empty($this->url->post('id'))) {
            $this->url->redirect('optician-referral');
        }
        /**
         * Call delete method
         **/
        $this->load->model('opticianreferral');
        $result = $this->model_opticianreferral->deleteOpticianReferral($this->url->post('id'));
        $this->session->data['message'] = array('alert' => 'success', 'value' => 'Optician Referral deleted successfully.');
        $this->url->redirect('optician-referral');
    }

    protected function validateField($data)
    {
        $error = [];
        $error_flag = false;
        if ($this->controller_common->validateText($data['first_name'])) {
            $error_flag = true;
            $error['title'] = 'First Name!';
        }
        if ($this->controller_common->validateText($data['last_name'])) {
            $error_flag = true;
            $error['title'] = 'Last Name!';
        }
        if ($this->controller_common->validateText($data['dob'])) {
            $error_flag = true;
            $error['title'] = 'Date of Birth!';
        }
        //        if ($this->controller_common->validateText($data['address_1'])) {
        //            $error_flag = true;
        //            $error['title'] = 'Address !';
        //        }
        //        if ($data['gender'] == null) {
        //            $error_flag = true;
        //            $error['title'] = 'Gender !';
        //        }
        //        if ($this->controller_common->validateText($data['email'])) {
        //            $error_flag = true;
        //            $error['title'] = 'Email !';
        //        }
        //        if ($this->controller_common->validateEmail($data['email'])) {
        //            $error_flag = true;
        //            $error['title'] = 'Email address !';
        //        }
        if ($this->controller_common->validateMobileNumber($data['mobile'])) {
            $error_flag = true;
            $error['title'] = 'Preferred Contact Number !';
        }

        //        if ($this->controller_common->validateText($data['city'])) {
        //            $error_flag = true;
        //            $error['title'] = 'City !';
        //        }
        //        if ($this->controller_common->validateText($data['zip_code'])) {
        //            $error_flag = true;
        //            $error['title'] = 'Post Code  !';
        //        }

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

    public function documentUpload()
    {
        $data = $this->url->post;
        $data['user_id'] = $this->session->data['user_id'];

        $file = $this->url->files['file'];
        $data['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);

        $data['filedir'] = DIR . 'public/uploads/optician-referral/document/' . $data['id'] . '/';
        $data['file_name'] = 'Doc-' . uniqid(rand()) . $data['id'];

        $filesystem = new Filesystem();
        $result = $filesystem->moveUpload($file, $data);

        if ($result['error'] === false) {
            $data['file_name'] = $result['name'];
            $this->load->model('referrallistdocument');
            $result['ext'] = $data['ext'];
            $result['id'] = $this->model_referrallistdocument->createReferralListDocument($data);;
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    public function documentRemove()
    {
        $file = $this->url->post('name');
        $referral_list_id = $this->url->post('id');
        if (!is_string($file)) {
            echo "2";
            exit();
        }

        /*if (!unlink(DIR . 'public/uploads/optician-referral/document/' . $referral_list_id . '/' . $file)) {
            echo("Error deleting $file");
        } else {
            $data['filename'] = $this->url->post('name');
            $data['referral_list_id'] = $referral_list_id;
            $this->load->model('referrallistdocument');
            $result = $this->model_referrallistdocument->deleteReferralListDocument($data);
            echo $result;
        }*/
        unlink(DIR . 'public/uploads/optician-referral/document/' . $referral_list_id . '/' . $file);
        $data['filename'] = $this->url->post('name');
        $data['referral_list_id'] = $referral_list_id;
        $this->load->model('referrallistdocument');
        $result = $this->model_referrallistdocument->deleteReferralListDocument($data);
        echo $result;
    }

    public function reportsExport()
    {
        $id = (int)$this->url->get('id');

        if (empty($id) || !is_int($id)) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Document id missing.');
            $this->url->redirect('optician-referral/edit&id=' . $id);
        }

        $export_docs = [];

        $this->load->model('opticianreferral');
        $export_docs = $this->model_opticianreferral->getOpticianReferralDocumnet($id);
        $source_dir = DIR . "public/uploads/optician-referral/document/" . $id . "/";

        if (empty($export_docs)) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Documents not available.');
            $this->url->redirect('appointment/edit&id=' . $id);
        }

        $document_code = "APNT" . str_pad($id, 5, '0', STR_PAD_LEFT);
        $path = "../public/uploads/optician-referral/document/";
        $zip_file_path = $path . date('Ymd') . "_" . $document_code . "_reports_export.zip";
        if (file_exists($zip_file_path)) {
            unlink($zip_file_path);
        }

        $source_files = [];
        foreach ($export_docs as $doc) {

            $filePath = $source_dir . $doc['filename'];
            $relativePath = 'document/' . $doc['filename'];

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

    public function referralMail($id)
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('referral_notification_to_medical_secretary');


        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }
        $this->load->model('user');
        $user_data = $this->model_user->checkUserRole(constant('USER_ROLE_ID')[constant('USER_ROLE_MED')]);

        $referral = $this->model_opticianreferral->getOpticianReferral($id);

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $link = '<a href="' . URL . 'admin">Click Here</a>';
        $result['template']['message'] = str_replace('{Opto_fname, Opto_lname}', $data['common']['user']['firstname'] . " " . $data['common']['user']['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{med_sec_fname, lname}', $user_data['firstname'] . " " . $user_data['lastname'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{dashboard login link}', $link, $result['template']['message']);

        $data['email'] = $user_data['email'];
        $data['cc'] = $data['common']['user']['email'];
        $data['subject'] = str_replace('{Opto_fname, Opto_lname}', $data['common']['user']['firstname'] . " " . $data['common']['user']['lastname'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

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
        $result['template']['message'] = str_replace('{hospital_name}', constant('HOSPITAL_LIST')[$patient['hospital_code']]['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{hospital_address}', constant('HOSPITAL_LIST')[$patient['hospital_code']]['address'], $result['template']['message']);
        $result['template']['message'] = str_replace('{hospital_number}', constant('HOSPITAL_LIST')[$patient['hospital_code']]['mobile'], $result['template']['message']);
        $result['template']['message'] = str_replace('{email}', constant('HOSPITAL_LIST')[$patient['hospital_code']]['email'], $result['template']['message']);

        $data['email'] = $patient['email'];
        $data['subject'] = str_replace('{hospital_name}', constant('HOSPITAL_LIST')[$patient['hospital_code']]['name'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }
}
