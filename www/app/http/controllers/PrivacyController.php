<?php

/**
 * Privacy Controller
 */
class PrivacyController extends Controller
{
    /**
     * Privacy controller index method
     * It will call getPage method of this controller
     **/
    public function index()
    {

        $data = array();
        $data['selected_page'] = $this->url->get('route');
        $data['header'] = $this->load->view('front/common/header', $data);
        $data['footer'] = $this->load->view('front/common/footer'); 


        $this->load->controller('common');

        $data = array_merge($data, $this->controller_common->index());
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        if ($this->user_agent->isLogged()) {
            $this->url->redirect('user/appointment');
        }

        $this->response->setOutput($this->load->view('front/privacy_policy', $data));
    }
}