<?php

/**
 * Leaflets Controller
 */
class LeafletsController extends Controller
{
    /**
     * Leaflets index method
     * This method will be called to display list view
     **/
    public function index()
    {
        $this->load->model('commons');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $this->load->model('leaflets');


        $data['result'] = $this->model_leaflets->allLeaflets();

        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $data['page_title'] = 'Leaflets';
        $data['page_add'] = $this->user_agent->hasPermission('leaflets/add') ? true : false;
        $data['page_delete'] = $this->user_agent->hasPermission('leaflets/delete') ? true : false;

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action_delete'] = URL_ADMIN . DIR_ROUTE . 'leaflets/delete';
        /*Leaflets view*/
        $this->response->setOutput($this->load->view('leaflets/leaflets_list', $data));
    }
    /**
     * Leaflets add method
     * This method will be called on leaflet add
     **/
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


        $data['page_title'] = 'Add Leaflets';
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'leaflets/add';
        /*Leaflets add view*/
        $this->response->setOutput($this->load->view('leaflets/leaflets_form', $data));
    }

    /**
     * Leaflets index action method
     * This method will be called on Leaflets submit/save view
     **/
    public function indexAction()
    {
        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['submit'])) {
            $this->url->redirect('leaflets');
        }

        $data = $this->url->post;
        $this->load->controller('common');
        $this->load->model('leaflets');
        if ($data['form_type'] == 'leaflets-basic') {

            $data['leaflets']['hash'] = md5(uniqid(mt_rand(), true));

            $file = $this->url->files['leaflets'];
            $data['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);
            if ($validate_field = $this->validateDoc($file)) {
                $this->session->data['message'] = array('alert' => 'error', 'value' => implode(", ", $validate_field));
                $this->url->redirect('leaflets/add');
            }
            $data['filedir'] = DIR . 'public/uploads/';
            $data['file_name'] = 'Leaflet-' . uniqid(rand());

            $filesystem = new Filesystem();
            $result = $filesystem->moveUpload($file, $data);

            if ($result['error'] === false) {
                $data['picture'] = $result['name'];

                $result = $this->model_leaflets->createLeaflets($data);

                $this->session->data['message'] = array('alert' => 'success', 'value' => 'Leaflets uploaded successfully.');
                $this->url->redirect('leaflets');
            } else {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Error in uploading leaflets.');
                $this->url->redirect('leaflets');
            }
        }

        $this->url->redirect('leaflets');
    }
    /**
     * Validate Register data on server side
     * Validation is also done on client side (Using html5 and javascripts)
     **/
    protected function validateDoc($data)
    {
        $error = [];
        $error_flag = false;
        if (strlen($data['name']) == '') {
            $error_flag = true;
            $error['name'] = 'File should not be null!';
        }

        if ($error_flag) {
            return $error;
        } else {
            return false;
        }
    }
    /**
     * Leaflets index delete method
     * This method will be called on Leaflets delete action
     **/
    public function indexDelete()
    {
        $this->load->controller('common');
        if ($this->controller_common->validateToken($this->url->post('_token'))) {
            $this->session->data['message'] = array('alert' => 'error', 'value' => 'Security token is missing!');
            $this->url->redirect('leaflets');
        }

        /**
         * Check if from is submitted or not
         **/
        if (!isset($_POST['delete']) || empty($this->url->post('id'))) {
            $this->url->redirect('leaflets');
        }
        /**
         * Call delete method
         **/
        $this->load->model('leaflets');
        $result = $this->model_leaflets->deleteLeaflets($this->url->post('id'));
        $this->session->data['message'] = array('alert' => 'success', 'value' => 'Leaflets deleted successfully.');
        $this->url->redirect('leaflets');
    }

    /**
     * Upload leaflets documents
     * This method will be called on leaflets upload documents
     */
    public function documentUpload()
    {
        $data = $this->url->post;
        $data['user_id'] = $this->session->data['user_id'];

        $file = $this->url->files['file'];
        $data['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);

        $data['filedir'] = DIR . 'public/uploads/leaflets/document/' . $data['id'] . '/';
        $data['file_name'] = 'Doc-' . uniqid(rand()) . $data['id'];

        $filesystem = new Filesystem();
        $result = $filesystem->moveUpload($file, $data);

        if ($result['error'] === false) {
            $data['file_name'] = $result['name'];
            $this->load->model('leaflets');
            $result['ext'] = $data['ext'];
            $result['id'] = $this->model_leaflets->createLeafletsDocument($data);;
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }
    /**
     * Remove documents
     * This method will call to remove documents
     */
    public function documentRemove()
    {
        $file = $this->url->post('name');
        $list_id = $this->url->post('id');
        if (!is_string($file)) {
            echo "2";
            exit();
        }

        unlink(DIR . 'public/uploads/leaflets/document/' . $list_id . '/' . $file);
        $data['filename'] = $this->url->post('name');
        $data['list_id'] = $list_id;
        $this->load->model('leaflets');
        $result = $this->model_leaflets->deleteLeafletsDocument($data);
        echo $result;
    }
}
