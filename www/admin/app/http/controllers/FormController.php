<?php
/**
* Invoice Controller
*/
class FormController extends Controller
{
	/**
	* Invoice index edit method
	* This method will be called on Invoice list view
	**/
	public function index()
	{
		$this->load->model('commons');
		$data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
		
		$this->load->model('form');
		$this->load->controller('common');

		$data['result'] = $this->model_form->allForms();

		//print_r($data['result']);exit;

		/* Set confirmation message if page submitted before */
		if (isset($this->session->data['message'])) {
			$data['message'] = $this->session->data['message'];
			unset($this->session->data['message']);
		}

		/* Set page title */
		$data['page_title'] = 'Forms';
		$data['page_add'] = $this->user_agent->hasPermission('form/add') ? true : false;
		$data['page_edit'] = $this->user_agent->hasPermission('form/edit') ? true : false;

		$data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
		$data['action_delete'] = URL_ADMIN.DIR_ROUTE.'form/delete';

		/*Render Invoice list view*/
		$this->response->setOutput($this->load->view('forms/form_list', $data));
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

		/* Set confirmation message if page submitted before */
		if (isset($this->session->data['message'])) {
			$data['message'] = $this->session->data['message'];
			unset($this->session->data['message']);
		}
		
		$data['page_title'] = 'Invoice View';
		$data['page_edit'] = $this->user_agent->hasPermission('form/edit') ? true : false;
		$data['page_pdf'] = $this->user_agent->hasPermission('form/pdf') ? true : false;
		$data['page_send_mail'] = $this->user_agent->hasPermission('form/sentmail') ? true : false;
		$data['page_addpayment'] = $this->user_agent->hasPermission('addpayment') ? true : false;

		$data['action'] = URL_ADMIN.DIR_ROUTE.'addpayment';
		$data['token'] = hash('sha512', TOKEN . TOKEN_SALT);

		/*Render Invoice list view*/
		$this->response->setOutput($this->load->view('form/invoice_view', $data));
	}

	public function indexAdd()
	{
		$this->load->model('commons');
		$data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

		$this->load->model('department');

		$data['departments'] = $this->model_department->allDepartments();

		$data['result'] =  NULL;

		/* Set confirmation message if page submitted before */
		if (isset($this->session->data['message'])) {
			$data['message'] = $this->session->data['message'];
			unset($this->session->data['message']);
		}

		// Get selected departments by forms
		$data['selected_departments'] = [];

		$data['page_title'] = 'Form Add';
		$data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
		$data['action'] = URL_ADMIN.DIR_ROUTE.'form/add';
		$this->response->setOutput($this->load->view('forms/add_form', $data));
	}
	/**
	* Invoice index edit method
	* This method will be called on invoice edit view
	**/
	public function indexEdit()
	{
		/**
		* Check if id exist in url if not exist then redirect to form list view 
		**/
		$id = (int)$this->url->get('id');
		if (empty($id) || !is_int($id)) {
			$this->url->redirect('forms');
		}

		$this->load->model('commons');
		$this->load->model('department');

		$data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);
		$data['departments'] = $this->model_department->allDepartments();

		/**
		* Call getForm method from form model to get data from DB for single form
		* If form does not exist then redirect it to form list view
		**/
		$this->load->model('form');
		$data['result']['form'] = $this->model_form->getForm($id);
		$data['result']['form_field'] = $this->model_form->getFormField($id);

		// Get selected departments by forms
		$data['selected_departments'] = $this->model_form->getSelectDepartmentsByForm($id);
		
		if (!$data['result']) {
			$this->session->data['message'] = array('alert' => 'warning', 'value' => 'Form does not exist in database!');
			$this->url->redirect('forms');
		}

		/* Set Form data to array */
		//$data['result']['items'] = json_decode($data['result']['items'], true);

		/* Set confirmation message if page submitted before */
		if (isset($this->session->data['message'])) {
			$data['message'] = $this->session->data['message'];
			unset($this->session->data['message']);
		}
		
		$data['page_title'] = 'Form Edit';
		$data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
		$data['action'] = URL_ADMIN.DIR_ROUTE.'form/edit&id='.$data['result']['form']['id'];
		/*Render invoice edit view*/
		$this->response->setOutput($this->load->view('forms/add_form', $data));
	}
	

	public function indexAction()
	{
		/**
		* Check if from is submitted or not 
		**/
		if (!isset($_POST['submit'])) { $this->url->redirect('forms'); }
		/**
		* Validate form data
		* If some data is missing or data does not match pattern
		* Return to info view 
		**/
		$data = $this->url->post;
		$this->load->model('commons');
		$this->load->controller('common');
		$data['info'] = $this->model_commons->getSiteInfo($this->session->data['user_id']);

		$this->load->controller('common');
		if ($validate_field = $this->validateField($data)) {			
			$this->session->data['message'] = array('alert' => 'error', 'value' => 'Please enter/select valid '.implode(", ",$validate_field).'!');
			exit();
			if (!empty($data['form']['id'])) {
				$this->url->redirect('form/edit&id='.$data['form']['id']);
			} else {
				$this->url->redirect('form/add');
			}
		}

		$data['form']['input_list'] = $data['form']['input_list'];
		$data['form']['user_id'] = $this->session->data['user_id'];

		$this->load->model('form');
		if (!empty($data['form']['id'])) {
			$this->model_form->updateForm($data['form']);
			$this->session->data['message'] = array('alert' => 'success', 'value' => 'Form updated successfully.');
			$this->url->redirect('forms');
		} else {
			$result = $this->model_form->createForm($data['form']);
			if ((int)$result) {
				$this->session->data['message'] = array('alert' => 'success', 'value' => 'Form created successfully.');
				$this->url->redirect('forms');
			} else {
				$this->session->data['message'] = array('alert' => 'error', 'value' => 'Form does not created (Server Error).');
				$this->url->redirect('form/add');
			}
		}
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
	* Validate user field from server side
	**/
	protected function validateField($data)
	{
		$error = [];
		$error_flag = false;
		//echo "<pre>"; print_r($data);
		if ($this->controller_common->validateText($data['form']['name'])) {
			$error_flag = true;
			$error['name'] = 'Name';
		}

		if ($this->controller_common->validateText($data['form']['input_list'])) {
			$error_flag = true;
			$error['input_list'] = 'Input List';
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
		$this->load->model('invoice');
		$user = $this->model_commons->getUserInfo($this->session->data['user_id']);
		$info = $this->model_commons->getSiteInfo();
		if ($user['role_id'] == '3' && $info['doctor_access'] == '1') {
			$result = $this->model_invoice->getInvoiceView($id, $user);
		} else {
			$result = $this->model_invoice->getInvoiceView($id);
		}
		//$result = $this->model_invoice->getInvoiceView($id);
		
		if (empty($result)) { $this->url->redirect('optician/invoice'); }

		$result['items'] = json_decode($result['items'], true);
		$result['info'] = $info;
		
		ob_start();
		if (!empty($result['info']['invoice_template'])) {
			include DIR_APP.'views/form/invoice_pdf_'.(int)$result['info']['invoice_template'].'.tpl.php';
		} else {
			include DIR_APP.'views/form/invoice_pdf_1.tpl.php';
		}
		
		$html = ob_get_clean();
		
		if(ob_get_length() > 0) {
			ob_end_flush();
		}
		return array('html' => $html, 'result' => $result);
	}
}