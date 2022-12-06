<?php
 
/**
 * Invoice Controller
 */
class InvoiceController extends Controller
{
    /**
     * Invoice index edit method
     * This method will be called on Invoice list view
     **/
    public function index()
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('invoice');
        $this->load->controller('common');
        $data['period']['start'] = $this->url->get('start');
        $data['period']['end'] = $this->url->get('end');
        $data['period']['status'] = $this->url->get('status');
        $data['period']['insurers_company_name'] = $this->url->get('insurers_company_name', '');


        if (!empty($data['period']['start']) && !empty($data['period']['end']) && !$this->controller_common->validateDate($data['period']['start']) && !$this->controller_common->validateDate($data['period']['end'])) {
            $data['period']['start'] = date_format(date_create($data['period']['start'] . '00:00:00'), "Y-m-d H:i:s");
            $data['period']['end'] = date_format(date_create($data['period']['end'] . '23:59:59'), "Y-m-d H:i:s");
            if (!empty($data['period']['status'])) {
                $data['dropdown_selected'] = $data['period']['status'];
            } else {
                $data['period']['status'] = ucfirst(constant('STATUS_PAYMENT_UNPAID'));
            }
        } else {
            $data['period']['start'] = date('Y-m-d ' . '00:00:00');
            $data['period']['end'] = date('Y-m-d ' . '23:59:59');
            $data['period']['status'] = ucfirst(constant('STATUS_ALL'));
        }

        if ($data['common']['user']['role_id'] == '3' && $data['common']['info']['doctor_access'] == '1') {
            $data['result'] = $this->model_invoice->allInvoices($data['period'], $data['common']['user']);
        } else {

            $data['result'] = $this->model_invoice->allInvoices($data['period'], null, $data['common']['user']);
        }

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        /* Set page title */
        $data['page_title'] = 'Invoices';
        $data['page_view'] = $this->user_agent->hasPermission('invoice/view') ? true : false;
        $data['page_pdf'] = $this->user_agent->hasPermission('invoice/pdf') ? true : false;
        $data['page_add'] = $this->user_agent->hasPermission('invoice/add') ? true : false;
        $data['page_edit'] = $this->user_agent->hasPermission('invoice/edit') ? true : false;
        $data['page_delete'] = $this->user_agent->hasPermission('invoice/delete') ? true : false;
        $data['page_addpayment'] = $this->user_agent->hasPermission('addpayment') ? true : false;
        
        $data['method'] = $this->model_invoice->getPaymentMethod();
        $payment_url_params = "&list=true&status=".$data['period']['status']."&insurers_company_name=".$data['period']['insurers_company_name']."&start=".$this->url->get('start')."&end=".$this->url->get('end');
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'addpayment'.$payment_url_params;
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action_delete'] = URL_ADMIN . DIR_ROUTE . 'invoice/delete';

        /*Render Invoice list view*/
        $this->response->setOutput($this->load->view('invoice/invoice_list', $data));
    }

    public function indexView()
    {
        /**
         * Check if id exist in url if not exist then redirect to blog list view
         **/
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('invoices');
        }

        /**
         * Call getInvoice method from invoice model to get data from DB for single blog
         * If blog does not exist then redirect it to invoice list view
         **/

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('invoice');
        if ($data['common']['user']['role_id'] == '3' && $data['common']['info']['doctor_access'] == '1') {
            $data['result'] = $this->model_invoice->getInvoiceView($id, $data['common']['user']);
        } else {
            $data['result'] = $this->model_invoice->getInvoiceView($id);
        }

        if (!$data['result']) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Invoice does not exist in database!');
            $this->url->redirect('invoices');
        }
        $data['result']['items'] = json_decode($data['result']['items'], true);
        $data['method'] = $this->model_invoice->getPaymentMethod();
        $data['payments'] = $this->model_invoice->getPayments($id);
        $data['attachments'] = $this->model_invoice->getAttachments($id);

        unset($data['method']['0']); // Self pay

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }
        $data['email_preview'] = $this->getInvoicePreivew($id);

        $data['page_title'] = 'Invoice View';
        $data['page_edit'] = $this->user_agent->hasPermission('invoice/edit') ? true : false;
        $data['page_pdf'] = $this->user_agent->hasPermission('invoice/pdf') ? true : false;
        $data['page_send_mail'] = $this->user_agent->hasPermission('invoice/sentmail') ? true : false;
        $data['page_addpayment'] = $this->user_agent->hasPermission('addpayment') ? true : false;

        $data['action'] = URL_ADMIN . DIR_ROUTE . 'addpayment';
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);

        if (!in_array($data['common']['user']['role'], constant('USER_ROLE'))) {
            $address = json_decode($data['common']['user']['address'], true);
            $data['common']['info']['legal_name'] = $data['common']['user']['optician_shop_name'];
            $data['common']['info']['address']['address1'] = $address['address1'];
            $data['common']['info']['address']['address2'] = $address['address1'];
            $data['common']['info']['address']['city'] = $address['city'];
            $data['common']['info']['address']['country'] = $address['country'];
            $data['common']['info']['address']['postal'] = $address['postal'];
        }
        /*Render Invoice list view*/
        $this->response->setOutput($this->load->view('invoice/invoice_view', $data));
    }

    public function indexAdd()
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('invoice');
        $data['payment_method'] = $this->model_invoice->getPaymentMethod();
        $data['taxes'] = $this->model_invoice->getTaxes();

        if ($this->url->get('appointment')) {
            $data['result'] = NULL;
            $data['result'] = $this->model_invoice->getAppointmentData($this->url->get('appointment'));
            $data['result']['duedate'] = NULL;
            $data['result']['invoicedate'] = NULL;
            $data['result']['currency'] = NULL;
            $data['result']['method'] = NULL;
            $data['result']['treatmentdate'] =  $data['result']['date'];
            $data['result']['status'] = NULL;
            $data['result']['inv_status'] = NULL;
            $data['result']['items'] = NULL;
            $data['result']['subtotal'] = NULL;
            $data['result']['tax'] = NULL;
            $data['result']['discounttype'] = NULL;
            $data['result']['discount'] = NULL;
            $data['result']['discount_value'] = NULL;
            $data['result']['amount'] = NULL;
            $data['result']['paid'] = NULL;
            $data['result']['due'] = NULL;
            $data['result']['note'] = NULL;
            $data['result']['tc'] = NULL;
            $data['result']['id'] = NULL;
        } else {
            $data['result'] = NULL;
        }

        unset($data['payment_method']['2']); // Cheque
        unset($data['payment_method']['3']); // Bank Transfer
        unset($data['payment_method']['4']); // Cash

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }
        $data['page_title'] = 'Invoice Add';
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'invoice/add';
        $this->response->setOutput($this->load->view('invoice/invoice_form', $data));
    }

    /**
     * Invoice index edit method
     * This method will be called on invoice edit view
     **/
    public function indexEdit()
    {
        /**
         * Check if id exist in url if not exist then redirect to blog list view
         **/
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('invoices');
        }

        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
        /**
         * Call getInvoice method from invoice model to get data from DB for single blog
         * If blog does not exist then redirect it to invoice list view
         **/
        $this->load->model('invoice');
        if ($data['common']['user']['role_id'] == '3' && $data['common']['info']['doctor_access'] == '1') {
            $data['result'] = $this->model_invoice->getInvoice($id, $data['common']['user']);
        } else {
            $data['result'] = $this->model_invoice->getInvoice($id);
        }

        if (!$data['result']) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Invoice does not exist in database!');
            $this->url->redirect('invoices');
        }

        $data['payment_method'] = $this->model_invoice->getPaymentMethod();
        $data['taxes'] = $this->model_invoice->getTaxes();

        /* Set Blog data to array */
        $data['result']['items'] = json_decode($data['result']['items'], true);

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }
        $data['page_title'] = 'Invoice Edit';
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'invoice/edit&id=' . $data['result']['id'];
        /*Render invoice edit view*/
        $this->response->setOutput($this->load->view('invoice/invoice_form', $data));
    }

    public function indexMail()
    {
        if (!isset($_POST['submit'])) {
            $this->url->redirect('invoices');
        }
        $data = $this->url->post;
        $this->load->controller('common');

        $this->load->model('invoice');
        $result = $this->model_invoice->getInvoice($data['mail']['id']);
        if (empty($result)) {
            $this->url->redirect('invoices');
        }

        $data['mail']['email'] = $result['email'];
        $data['mail']['name'] = $result['name'];
        $data['mail']['bcc'] = $data['mail']['bcc'];
        $data['mail']['redirect'] = 'invoice/view&id=' . $result['id'];
        if ($data['mail']['attachPdf'] == '1' && file_exists(DIR . 'public/uploads/invoice/invoice-' . $data['mail']['id'] . '.pdf')) {
            $data['mail']['attachments'][] = array('file' => DIR . 'public/uploads/invoice/invoice-' . $data['mail']['id'] . '.pdf', 'name' => 'invoice-' . $data['mail']['id'] . '.pdf');
        }

        $this->load->controller('Mail');
        $mail_result = $this->controller_mail->sendmail($data['mail']);

        if ($mail_result == 1) {
            $data['mail']['type'] = 'invoice';
            $data['mail']['type_id'] = $data['mail']['id'];
            $data['mail']['user_id'] = $this->session->data['user_id'];

            $this->controller_mail->createMailLog($data['mail']);
            $this->session->data['message'] = array('alert' => 'success', 'value' => 'Success: Message sent successfully.');
            $this->url->redirect('invoice/view&id=' . $result['id']);
        } else {
            $this->session->data['message'] = array('alert' => 'error', 'value' => $mail_result);
            $this->url->redirect('invoice/view&id=' . $result['id']);
        }
    }

    public function indexPdf()
    {
        /**
         * Check if id exist in url if not exist then redirect to Invoice list view
         **/
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('invoices');
        }

        $data = $this->createPDFHTML($id);

        $pdf = new PDF();
        $pdf->createPDF($data);
    }

    public function indexPrint()
    {
        /**
         * Check if id exist in url if not exist then redirect to Invoice list view
         **/
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('invoices');
        }

        $data = $this->createPDFHTML($id, 1);
        $pdf = new PDF();
        $pdf->createPDF($data);
    }

    public function indexAction()
    {
        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['submit'])) {
            $this->url->redirect('invoices');
        }
        /**
         * Validate form data
         * If some data is missing or data does not match pattern
         * Return to info view
         **/
        $data = $this->url->post;
        $this->load->model('commons');
        $this->load->controller('common');
        $data['info'] = $this->model_commons->getSiteInfo($this->session->data['user_id']);
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->controller('common');

        if ($validate_field = $this->validateField($data)) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Please enter/select valid ' . implode(", ", $validate_field) . '!');

            if (!empty($data['invoice']['id'])) {
                $this->url->redirect('invoice/edit&id=' . $data['invoice']['id']);
            } else {
                $this->url->redirect('invoice/add');
            }
        }

        $this->load->model('commons');
        $info = $this->model_commons->getSiteInfo();

        $data['invoice']['item'] = json_encode($data['invoice']['item']);
        $data['invoice']['duedate'] = DateTime::createFromFormat($data['info']['date_format'], $data['invoice']['duedate'])->format('Y-m-d');
        $data['invoice']['invoicedate'] = DateTime::createFromFormat($data['info']['date_format'], $data['invoice']['invoicedate'])->format('Y-m-d');
        if (!empty($data['invoice']['treatmentdate'])) {
            $data['invoice']['treatmentdate'] = DateTime::createFromFormat($data['info']['date_format'], $data['invoice']['treatmentdate'])->format('Y-m-d');
        }
        $data['invoice']['datetime'] = date('Y-m-d H:i:s');
        $data['invoice']['tc'] = ''; // Set TC blank
        // Get tation last name
        $data['invoice']['name_for_email'] = '';
        if(isset($data['invoice']['patient_id']) AND !empty($data['invoice']['patient_id']) AND is_numeric($data['invoice']['patient_id']) AND $data['invoice']['patient_id'] > 0){
            $this->load->model('patient');
            $patient_detail = $this->model_patient->getPatient($data['invoice']['patient_id']);
            $data['invoice']['name_for_email'] = $patient_detail['title'] . ' ' . $patient_detail['lastname'];
        }
        $this->load->model('invoice');
        if (!empty($data['invoice']['id'])) {
            $this->model_invoice->updateInvoice($data['invoice']);
            $this->model_invoice->updateInsurersDetailsInInvoice($data['invoice']['id'], $data['invoice']);
            $this->createPDF($data['invoice']['id']);
            if ($data['invoice']['inv_status'] == "1") {
                $checkMailStatus = $this->model_invoice->checkInvoiceMailStatus($data['invoice']['id']);
                if ($checkMailStatus == '0') {
                    // $this->invoiceMail($data['invoice']['id']);
                    // $this->model_invoice->updateInvoiceMailStatus($data['invoice']['id']);
                }
            }
            $this->session->data['message'] = array('alert' => 'success', 'value' => 'Invoice updated successfully.');
            $this->url->redirect('invoice/view&id=' . $data['invoice']['id']);
        } else {

            $data['invoice']['user_id'] = $this->session->data['user_id'];
            $result = $this->model_invoice->createInvoice($data['invoice']); 
            if ((int)$result) {
                $this->model_invoice->updateInsurersDetailsInInvoice($result, $data['invoice']);
                $this->createPDF($result);
                if ($data['invoice']['inv_status'] == "1") {
                    $checkMailStatus = $this->model_invoice->checkInvoiceMailStatus($result);
                    if ($checkMailStatus == '0') {
                        // $this->invoiceMail($result);
                        // $this->model_invoice->updateInvoiceMailStatus($result);
                    }
                }

                if ((int)$result && $data['invoice']['appointment_id']) {
                    $this->model_invoice->updateInvoiceIdAppointment($result, $data['invoice']['appointment_id']);
                }

                $this->session->data['message'] = array('alert' => 'success', 'value' => 'Invoice created successfully.');
                $this->url->redirect('invoice/view&id=' . $result);
            } else {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Invoice does not created (Server Error).');
                $this->url->redirect('invoice/add');
            }
        }
    }

    public function createPDF($id)
    {
        $html_array = $this->createPDFHTML($id);

        $pdf = new Pdf();
        $pdf->saveInvoicePDF($html_array);
    }

    public function invoicePayment()
    {
        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['submit'])) {
            $this->url->redirect('invoices');
        }
        /**
         * Validate form data
         * If some data is missing or data does not match pattern
         * Return to info view
         **/
        $data = $this->url->post;

        $this->load->controller('common');
        if ($validate_field = $this->validateInvoicePaymentField($data['payment'])) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Please enter valid ' . implode(", ", $validate_field) . '!');
            $this->url->redirect('invoice/view&id=' . $data['payment']['invoice']);
        }
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getInvoiceData($this->session->data['user_id']);
        $data['payment']['date'] = DateTime::createFromFormat($data['common']['date_format'], $data['payment']['date'])->format('Y-m-d');

        $this->load->model('invoice');
        $result = $this->model_invoice->addInvoicePayment($data['payment']);
        $this->model_invoice->invoiceTotal($data['payment']);
        
        if(isset($_GET['list'])){
            $this->url->redirect('invoices&status='.$this->url->get('status').'&insurers_company_name='.$this->url->get('insurers_company_name').'&start='.$this->url->get('start').'&end='.$this->url->get('end'));
        }
        //$this->paymentConfirmationMail($data['payment']['invoice'],$result);
        $this->session->data['message'] = array('alert' => 'success', 'value' => 'Payment added successfully');
        $this->url->redirect('invoice/view&id=' . $data['payment']['invoice']);
    }

    protected function validateInvoicePaymentField($data)
    {
        $error = [];
        $error_flag = false;

        if ($this->controller_common->validateNumeric($data['method'])) {
            $error_flag = true;
            $error['method'] = 'Payment Method';
        }

        if ($this->controller_common->validateNumeric($data['amount'])) {
            $error_flag = true;
            $error['method'] = 'Amount';
        }

        if ($error_flag) {
            return $error;
        } else {
            return false;
        }
    }

    /**
     * invoice index delete method
     * This method will be called on blog delete action
     **/
    public function indexDelete()
    {
        $this->load->controller('common');
        if ($this->controller_common->validateToken($this->url->post('_token'))) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->redirect('invoices');
        }
        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['delete']) || empty($this->url->post('id'))) {
            $this->url->redirect('invoices');
        }
        $this->load->model('invoice');
        $result = $this->model_invoice->deleteInvoice($this->url->post('id'));
        $this->session->data['message'] = array('alert' => 'success', 'value' => 'Invoice deleted successfully.');
        $this->url->redirect('invoices');
    }

    public function invoiceMail()
    {
        $id = (int)$this->url->get('id');

        $this->load->model('invoice');
        $this->load->controller('mail');

        $result = $this->controller_mail->getTemplate('newinvoice');
        // if (empty($result['template']) || $result['template']['status'] == '0') {
        //     return false;
        // }
        if (empty($result['template'])) {
            return false;
        }
        $invoice = $this->model_invoice->getInvoiceView($id);

        $data['id'] = $result['common']['invoice_prefix'] . str_pad($invoice['id'], 4, '0', STR_PAD_LEFT);
        $site_link = '<a href="' . URL . '">Click Here</a>';
        $invoice['duedate'] = date_format(date_create($invoice['duedate']), $result['common']['date_format']);

        $result['template']['message'] = str_replace('{name}', $invoice['name_for_email'], $result['template']['message']);
        $result['template']['message'] = str_replace('{inv_id}', $data['id'], $result['template']['message']);
        $result['template']['message'] = str_replace('{amount}', $result['common']['currency_abbr'] . $invoice['amount'], $result['template']['message']);
        $result['template']['message'] = str_replace('{paid}', $result['common']['currency_abbr'] . $invoice['paid'], $result['template']['message']);
        $result['template']['message'] = str_replace('{due}', $result['common']['currency_abbr'] . $invoice['due'], $result['template']['message']);
        $result['template']['message'] = str_replace('{due_date}', $invoice['duedate'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{inv_url}', $site_link, $result['template']['message']);

        $data['name'] = $invoice['name'];
        $data['email'] = $invoice['email'];
        $data['subject'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        if (file_exists(DIR . 'public/uploads/invoice/invoice-' . $invoice['id'] . '.pdf')) {
            $data['attachments'][] = array('file' => DIR . 'public/uploads/invoice/invoice-' . $invoice['id'] . '.pdf', 'name' => 'invoice-' . $invoice['id'] . '.pdf');
        }

        //This line is copied from indexAction to update status of mail after sent
        $this->model_invoice->updateInvoiceMailStatus($id);

        $this->controller_mail->sendMail($data);

        $this->session->data['message'] = array('alert' => 'success', 'value' => 'Invoice sent successfully.');
        $this->url->redirect('invoice/view&id=' . $id);
    }
    public function invoicePreviewMail()
    {
        $data = $this->url->post['mail'];
        $this->load->model('invoice');
        $this->load->controller('mail');

        $id = $data['id'];
        $result = $this->controller_mail->getTemplate('newinvoice');
        
        if (empty($result['template'])) {
            return false;
        }
        $invoice = $this->model_invoice->getInvoiceView($id);

        $data['id'] = $result['common']['invoice_prefix'] . str_pad($invoice['id'], 4, '0', STR_PAD_LEFT);

        $data['name'] = $invoice['name'];
        $data['email'] = $invoice['email'];
        $data['subject'] = $data['subject'];
        $data['message'] = $data['message'];

        if (file_exists(DIR . 'public/uploads/invoice/invoice-' . $invoice['id'] . '.pdf')) {
            $data['attachments'][] = array('file' => DIR . 'public/uploads/invoice/invoice-' . $invoice['id'] . '.pdf', 'name' => 'invoice-' . $invoice['id'] . '.pdf');
        }
        
        //This line is copied from indexAction to update status of mail after sent
        $this->model_invoice->updateInvoiceMailStatus($id);

        $this->controller_mail->sendMail($data);
        
        $this->session->data['message'] = array('alert' => 'success', 'value' => 'Invoice sent successfully.');
        $this->url->redirect('invoice/view&id=' . $id);
    }

    // Payment Confirmation Mail

    private function paymentConfirmationMail($id, $payments_id)
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('paymentconfirmation');
        if (empty($result['template']) || $result['template']['status'] == '0') {
            return false;
        }

        $invoice = $this->model_invoice->getInvoiceView($id);
        $payments = $this->model_invoice->getPaymentsByID($payments_id);

        $data['id'] = $result['common']['invoice_prefix'] . str_pad($invoice['id'], 4, '0', STR_PAD_LEFT);
        $invoice['duedate'] = date_format(date_create($invoice['duedate']), $result['common']['date_format']);
        $result['template']['message'] = str_replace('{name}', $invoice['name_for_email'], $result['template']['message']);
        $result['template']['message'] = str_replace('{invoice_id}', $data['id'], $result['template']['message']);
        $result['template']['message'] = str_replace('{txn_id}', $payments['txn_id'], $result['template']['message']);
        $result['template']['message'] = str_replace('{paid_amount}', $result['common']['currency_abbr'] . $invoice['paid'], $result['template']['message']);
        $result['template']['message'] = str_replace('{due_amount}', $result['common']['currency_abbr'] . $invoice['due'], $result['template']['message']);
        $result['template']['message'] = str_replace('{due_date}', $invoice['duedate'], $result['template']['message']);
        $result['template']['message'] = str_replace('{paid_date}', date_format(date_create($payments['payment_date']), $result['common']['date_format']), $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);

        $data['name'] = $invoice['name'];
        $data['email'] = $invoice['email'];
        $data['subject'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        return $this->controller_mail->sendMail($data);
    }
    /**
     * Validate user field from server side
     **/
    protected function validateField($data)
    {
        $error = [];
        $error_flag = false;

        /*if ($this->controller_common->validateNumeric($data['invoice']['method'])) {
            $error_flag = true;
            $error['method'] = 'Payment method';
        }*/
        if (!empty($data['invoice']['invoicedate'])) {
            if ($this->controller_common->validateDate($data['invoice']['invoicedate'], $data['info']['date_format'])) {
                $error_flag = true;
                $error['invoicedate'] = 'Date';
            }
        }
        if (!empty($data['invoice']['duedate'])) {
            if ($this->controller_common->validateDate($data['invoice']['duedate'], $data['info']['date_format'])) {
                $error_flag = true;
                $error['invoicedate'] = 'Date';
            }
        }
        if (isset($data['invoice']['email'])) {
            if ($this->controller_common->validateEmail($data['invoice']['email'])) {
                $error_flag = true;
                $error['email'] = 'Email Address';
            }

            if ($this->controller_common->validatePhoneNumber($data['invoice']['mobile'])) {
                $error_flag = true;
                $error['mobile'] = 'Mobile Number';
            }
            if ($this->controller_common->validateText($data['invoice']['name'])) {
                $error_flag = true;
                $error['name'] = 'Name';
            }
        }

        if ($error_flag) {
            return $error;
        } else {
            return false;
        }
    }

    /**
     * Validate Field Method
     * This method will be called on to validate invoice field
     **/
    private function vaildateMailField($data)
    {
        $error = [];
        $error_flag = false;

        if ($this->controller_common->validateText($data['to'])) {
            $error_flag = true;
            $error['to'] = 'Email!';
        }

        if ($this->controller_common->validateText($data['subject'])) {
            $error_flag = true;
            $error['subject'] = 'Subject!';
        }

        if ($this->controller_common->validateText($data['message'])) {
            $error_flag = true;
            $error['message'] = 'Message!';
        }

        if ($error_flag) {
            return $error;
        } else {
            return false;
        }
    }

    private function createPDFHTML($id, $printInvoice = NULL)
    {
        $this->load->model('commons');
        $info = $this->model_commons->getSiteInfo();
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('invoice');
        $user = $this->model_commons->getUserInfo($this->session->data['user_id']);
        if ($user['role_id'] == '3' && $info['doctor_access'] == '1') {
            $result = $this->model_invoice->getInvoiceView($id, $user);
        } else {
            $result = $this->model_invoice->getInvoiceView($id);
        }
        //$result = $this->model_invoice->getInvoiceView($id);

        if (empty($result)) {
            $this->url->redirect('invoices');
        }


        $result['items'] = json_decode($result['items'], true);
        $result['address'] = json_decode($result['address'], true);

        $result['info'] = $info;
        $result['common'] = $data['common'];

        if (!in_array($data['common']['user']['role'], constant('USER_ROLE'))) {
            $address = json_decode($data['common']['user']['address'], true);
            $result['info']['legal_name'] = $data['common']['user']['optician_shop_name'];
            $result['info']['address']['$result'] = $address['address1'];
            $result['info']['address']['address2'] = $address['address1'];
            $result['info']['address']['city'] = $address['city'];
            $result['info']['address']['country'] = $address['country'];
            $result['info']['address']['postal'] = $address['postal'];
        }

        ob_start();
        if (!empty($result['info']['invoice_template'])) {
            include DIR_APP . 'views/invoice/invoice_pdf_' . (int)$result['info']['invoice_template'] . '.tpl.php';
        } else {
            include DIR_APP . 'views/invoice/invoice_pdf_1.tpl.php';
        }

        $html = ob_get_clean();

        if (ob_get_length() > 0) {
            ob_end_flush();
        }
        return array('html' => $html, 'result' => $result);
    }
    private function createReminderEmailPDFHTML($id, $printInvoice = NULL)
    {
        $invoice_number = 'INV-' . str_pad($id, 5, '0', STR_PAD_LEFT);

        $this->load->model('commons');
        $common = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('appointment');
        $headerfooter = $this->model_appointment->getAppointmentDocHeaderFooter($id);

        $this->load->model('invoice');
        $result = $this->model_invoice->getInvoiceView($id);
        $address_arr = json_decode($result['address'], true);
        $patient_address = "";
        $patient_address .= !empty($address_arr['address1']) ? ('<br>' . $address_arr['address1']) : '';
        $patient_address .= !empty($address_arr['address2']) ? ('<br>' . $address_arr['address2']) : '';
        $patient_address .= !empty($address_arr['city']) ? ('<br>' . $address_arr['city']) : '';
        $patient_address .= !empty($address_arr['postal']) ? ('<br>' . $address_arr['postal']) : '';
        $patient_first_name_arr = explode(" ", strtolower($result['name']));
        if (in_array($patient_first_name_arr[0], ['mr.', 'mrs.', 'ms.', 'miss.', 'mr', 'mrs', 'ms', 'miss'])) {
            $patient_first_name = ucfirst(strtolower($patient_first_name_arr[1]));
        } else {
            $patient_first_name = ucfirst(strtolower($patient_first_name_arr[0]));
        }

        $emial_body = INVOICE_REMINDER_LETTER_TEMPLATE;
        $emial_body = str_replace("#TODAY_DATE", date('d-m-Y'), $emial_body);
        $emial_body = str_replace("#PATIENT_FULLNAME", $result['name'], $emial_body);
        $emial_body = str_replace("#PATIENT_TITLE_LAST_NAME", $result['name_for_email'], $emial_body);
        $emial_body = str_replace("#PATIENT_ADDRESS", $patient_address, $emial_body);
        $emial_body = str_replace("#INVOICE_NUMBER", $invoice_number, $emial_body);
        $emial_body = str_replace("#INVOICE_DATE", $result['invoicedate'], $emial_body);
        $emial_body = str_replace("#INVOICE_TREATMENT_DATE", $result['treatmentdate'], $emial_body);
        $emial_body = str_replace("#INVOICE_TOTAL", $common['info']['currency_abbr'] . $result['amount'], $emial_body);
        $emial_body = str_replace("#INVOICE_DUE", $common['info']['currency_abbr'] . $result['due'], $emial_body);
        ob_start();

        include DIR_APP . 'views/invoice/reminder_email_pdf.tpl.php';

        $html = ob_get_clean();

        if (ob_get_length() > 0) {
            ob_end_flush();
        }
        return array('html' => $html, 'result' => $result);
    }

    public function autoGenrateInvoice()
    {
        $startDate = null;
        $dueDate = null;
        $patient_name = null;
        $patient_mobile = null;
        $patient_email = null;
        $doctor_id = null;
        $payment_method = 1;
        $payment_status = "Unpaid";
        $invoice_status = 0;

        echo "Hello";
    }
    public function reminderemailpdf()
    {
        /**
         * Check if id exist in url if not exist then redirect to Invoice list view
         **/
        $id = (int)$this->url->get('id');
        if (empty($id) || !is_int($id)) {
            $this->url->redirect('invoices');
        }

        $data = $this->createReminderEmailPDFHTML($id);

        $pdf = new PDF();
        $pdf->createPDF($data);
    }
    public function getInvoicePreivew($id)
    {
        $this->load->controller('mail');
        $result = $this->controller_mail->getTemplate('newinvoice');
        if (empty($result['template'])) {
            return false;
        }
        $invoice = $this->model_invoice->getInvoiceView($id);
        $invoice['paid'] = empty($invoice['paid']) ? 0 : $invoice['paid'];

        $data['id'] = $result['common']['invoice_prefix'] . str_pad($invoice['id'], 4, '0', STR_PAD_LEFT);
        $site_link = '<a href="' . URL . '">Click Here</a>';
        $invoice['duedate'] = date_format(date_create($invoice['duedate']), $result['common']['date_format']);

        $result['template']['message'] = str_replace('{name}', $invoice['name_for_email'], $result['template']['message']);
        $result['template']['message'] = str_replace('{inv_id}', $data['id'], $result['template']['message']);
        $result['template']['message'] = str_replace('{amount}', $result['common']['currency_abbr'] . $invoice['amount'], $result['template']['message']);
        $result['template']['message'] = str_replace('{paid}', $result['common']['currency_abbr'] . $invoice['paid'], $result['template']['message']);
        $result['template']['message'] = str_replace('{due}', $result['common']['currency_abbr'] . $invoice['due'], $result['template']['message']);
        $result['template']['message'] = str_replace('{due_date}', $invoice['duedate'], $result['template']['message']);
        $result['template']['message'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['message']);
        $result['template']['message'] = str_replace('{inv_url}', $site_link, $result['template']['message']);

        $data['name'] = $invoice['name'];
        $data['email'] = $invoice['email'];
        $data['subject'] = str_replace('{clinic_name}', $result['common']['name'], $result['template']['subject']);
        $data['message'] = $result['template']['message'];

        if (file_exists(DIR . 'public/uploads/invoice/invoice-' . $invoice['id'] . '.pdf')) {
            $data['attachments'][] = array('file' => DIR . 'public/uploads/invoice/invoice-' . $invoice['id'] . '.pdf', 'name' => 'invoice-' . $invoice['id'] . '.pdf');
        }

        return $data;
    }
}
