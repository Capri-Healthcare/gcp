<?php


class FollowupController extends Controller
{

    public function index()
    {
        $this->load->model('commons');
        $this->load->model('followup');
        $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

        $followup['id'] = $this->session->data['user_id'];
        $followup['role'] = $data['common']['user']['role'];


        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $followup['period']['start'] = $this->url->get('start');
        $followup['period']['end'] = $this->url->get('end');
        $followup['period']['status'] = $this->url->get('status');


        if (!empty($followup['period']['start']) && !empty($followup['period']['end'])) {
            $followup['period']['start'] = date_format(date_create($followup['period']['start'] . '00:00:00'), "Y-m-d H:i:s");
            $followup['period']['end'] = date_format(date_create($followup['period']['end'] . '23:59:59'), "Y-m-d H:i:s");

        } else {
            $followup['period']['start'] = date_format(date_create(date('Y-m-d') . '00:00:00'), "Y-m-d H:i:s");
            $followup['period']['end'] = date_format(date_create(date('Y-m-d') . '23:59:59'), "Y-m-d H:i:s");

        }
        $data['result'] = $this->model_followup->getFollowup($followup);

        $data['page_title'] = 'Follow Up';
        $data['page_edit'] = $this->user_agent->hasPermission('follow-up/edit') ? true : false;

        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['action'] = URL_ADMIN . DIR_ROUTE . 'followup/add';
        /*Render Blog view*/
        $this->response->setOutput($this->load->view('followup/followup_list', $data));
    }

    public function indexEdit()
    {
        $id = (int)$this->url->get('id');
        $status = $this->url->get('status');

        if (empty($id) || !is_int($id)) {
            $this->url->redirect('follow-up');
        }

        $this->load->model('followup');
        $data['followup'] = $this->model_followup->getFollowupByID($id);

        if (!$data['followup']) {
            $this->session->data['message'] = array('alert' => 'warning', 'value' => 'Followup does not exist in database!');
            $this->url->redirect('follow-up');
        }
        $this->load->model('commons');

        $this->load->model('followup');
        $data['reports'] = $this->model_followup->getOpticianReferralDocumnet($id);
        /* Set confirmation message if page submitted before */
        if (isset($this->session->data['message'])) {
            $data['message'] = $this->session->data['message'];
            unset($this->session->data['message']);
        }

        $data['page_edit'] = $this->user_agent->hasPermission('follow-up/edit') ? true : false;
        $data['page_title'] = 'Edit Followup';
        $data['id'] = $id;
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);

        if (!empty($status)) {
            $data['id'] = $id;
            $data['status'] = $status;

            if ($this->model_followup->updateFollowup($data)) {
                $this->session->data['message'] = array('alert' => 'success', 'value' => 'Followup updated successfully.');
            } else {
                $this->session->data['message'] = array('alert' => 'error', 'value' => 'Followup status not updated successfully.');
            }

            $this->url->redirect('follow-up');
        } else {

            $this->load->model('commons');
            $data['common'] = $this->model_commons->getCommonData($this->session->data['user_id']);

            $this->response->setOutput($this->load->view('followup/followup_edit_form', $data));
        }
    }

    public function documentUpload()
    {
        $data = $this->url->post;

        $data['user_id'] = $this->session->data['user_id'];

        $file = $this->url->files['file'];
        $data['ext'] = pathinfo($file['name'], PATHINFO_EXTENSION);

        $data['filedir'] = DIR . 'public/uploads/optician-referral/document/' .$data['id']. '/';
        $data['file_name'] = 'Doc-' . uniqid(rand()) . $data['id'];

        $filesystem = new Filesystem();
        $result = $filesystem->moveUpload($file, $data);

        if ($result['error'] === false) {
            $data['file_name'] = $result['name'];
            $data['followup_id'] = $data['followup']['id'];

            $this->load->model('referrallistdocument');
            $this->model_referrallistdocument->createReferralListDocument($data);
            $result['ext'] = $data['ext'];
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }
    public function documentRemove()
    {
        $file = $this->url->post('name');
        $referral_list_id = $this->url->post('id');
        $optician_id = $this->url->post('optician_id');
        if (!is_string($file)) {
            echo "2";
            exit();
        }

        if (!unlink(DIR . '/public/uploads/optician-referral/document/' . $optician_id . '/' . $file)) {
            echo("Error deleting $file");
        } else {
            $data['filename'] = $this->url->post('name');
            $data['followup_id'] = $referral_list_id;
            $this->load->model('referrallistdocument');
            $result = $this->model_referrallistdocument->deleteReferralListDocument($data);
            echo $result;
        }
    }


}