<?php

/**
 * Commmons Model
 */
class Commons extends Model
{
    public function getCommonData($user_id)
    {
        $data['user'] = $this->user_agent->getUserData();
        $data['info'] = $this->user_agent->getInfo();
        $data['info']['opt_invoice_prefix'] = 'OPT'.$data['info']['invoice_prefix'];
        $data['theme'] = $this->user_agent->getTheme();
        $data['page_search'] = $this->user_agent->hasPermission('patients');
        $data['token'] = hash('sha512', TOKEN . TOKEN_SALT);
        $data['admin_menu'] = $this->createAdminMenu();
        return $data;
    }

    public function getUserInfo($user_id)
    {
        $query = $this->database->query("SELECT u.user_id, u.firstname, u.lastname, u.picture, ur.id AS role_id, ur.name AS role, ur.permission, d.id AS doctor FROM `" . DB_PREFIX . "users` AS u LEFT JOIN `" . DB_PREFIX . "user_role` AS ur ON ur.id = u.user_role LEFT JOIN `" . DB_PREFIX . "doctors` AS d ON d.user_id = u.user_id WHERE u.user_id = ?", array((int)$user_id));
        return $query->row;
    }

    public function getReferrals($id)
    {
        $data['user'] = $this->user_agent->getUserData($id);
        if($data['user']['role'] == constant('USER_ROLE_MED'))
        {
            $query = $this->database->query("Select count(*) As Total From `" . DB_PREFIX . "referral_list` WHERE status = 'NEW' ORDER BY created_at DESC ");
            return $query->row['Total'];
        }

    }

    public function getFollowups($id)
    {
        $data['user'] = $this->user_agent->getUserData($id);
        if($data['user']['role'] == constant('USER_ROLE_MERC'))
        {
            $query = $this->database->query("Select count(*) AS Total From `" . DB_PREFIX . "followup_appointment` WHERE payment_status ='UNPAID' AND followup_status != '".constant('STATUS_FOLLOWUP_IN_QUEUE')."' ORDER BY created_at DESC ");
            return $query->row['Total'];
        }
        if($data['user']['role'] == constant('USER_ROLE_MED'))
        {
            $query = $this->database->query("Select count(*) AS Total From `" . DB_PREFIX . "followup_appointment` WHERE followup_status ='".constant('STATUS_FOLLOWUP_OPTICIAN')."' AND payment_status ='PAID' ORDER BY created_at DESC ");
            return $query->row['Total'];
        }
        if($data['user']['role'] == constant('USER_ROLE_OPTOMETRIST'))
        {
            $query = $this->database->query("Select count(*) AS Total From `" . DB_PREFIX . "followup_appointment` WHERE optician_id ='" . $id. "' AND followup_status ='".constant('STATUS_FOLLOWUP_NEW')."' AND payment_status ='PAID' ORDER BY created_at DESC ");
            return $query->row['Total'];
        }
    }

    public function getSiteInfo()
    {
        return $this->user_agent->getInfo();
    }

    public function getAdminTheme()
    {
        $query = $this->database->query("SELECT `data` FROM `" . DB_PREFIX . "setting` WHERE `name` = ?", array('admintheme'));
        return json_decode($query->row['data'], true);
    }

    public function getMailInfo()
    {
        $query = $this->database->query("SELECT `data` FROM `" . DB_PREFIX . "setting` WHERE `name` = ?", array('emailsetting'));
        return json_decode($query->row['data'], true);
    }

    public function getAppointmentDoctors()
    {
        $query = $this->database->query("SELECT d.id, CONCAT(d.title, ' ', d.firstname, ' ', d.lastname) AS name, d.weekly, d.national, dep.name AS department, dep.id AS department_id FROM `" . DB_PREFIX . "doctors` AS d LEFT JOIN `" . DB_PREFIX . "departments` AS dep ON dep.id = d.department_id WHERE d.appointment_status = ? AND d.status  = ? ORDER BY d.department_id ASC", array(1, 1));
        return $query->rows;
    }

    public function getInvoiceData()
    {
        return $this->user_agent->getInfo();
    }

    public function getUserData($id)
    {
        $query = $this->database->query("SELECT `firstname`, `lastname` FROM `" . DB_PREFIX . "users` WHERE `user_id` = ?", array((int)$id));
        if ($query->num_rows > 0) {
            return $query->row['firstname'] . ' ' . $query->row['lastname'];
        } else {
            return '';
        }
    }

    public function getTemplateAndInfo($id)
    {
        $query = $this->database->query("SELECT subject, message FROM `" . DB_PREFIX . "email_template` WHERE `template` = ? LIMIT 1", array($id));
        $data['template'] = $query->row;
        $data['common'] = $this->user_agent->getInfo();
        return $data;
    }

    public function createAdminMenu()
    {
        $data['user'] = $this->user_agent->getUserData();
        $referrals = $this->getReferrals($this->session->data['user_id']);
        $followup = $this->getFollowups($this->session->data['user_id']);

        $tree = array();
        $query = $this->database->query("SELECT * FROM `" . DB_PREFIX . "menu` WHERE `status` = ? ORDER BY `priority` DESC", array(1));
        $list = $query->rows;
        if (!empty($list)) {
            $active = $this->activeMenuList($this->url->get('route'));
            foreach ($list as $key => $value) {
                if ($value['link'] == '#' || $this->user_agent->hasPermission($value['link'])) {
                    if ($value['parent'] == 0) {
                        $tree[$value['id']] = $value;
                        if ($value['active'] == $active) {
                            $tree[$value['id']]['active_menu'] = 1;
                        }
                    } else {
                        $tree[$value['parent']]['child'][$value['id']] = $value;
                    }
                }
            }
        }
//echo "<pre>";print_r($tree);exit;
        $menu = '<ul>';
        if (!empty($tree)) {
            foreach ($tree as $key => $value) {
                if (isset($value['child']) && $value['link'] == '#') {
                    if (isset($value['active_menu'])) {
                        $active = ' active';
                    } else {
                        $active = '';
                    }
                    $menu .= '<li class="has-sub' . $active . '"><a><i class="' . $value['icon'] . '"></i><span>' . $value['name'] . '</span><i class="arrow"></i></a><ul class="sub-menu">';
                    foreach ($value['child'] as $s_key => $s_value) {
                        $menu .= '<li><a href="' . URL_ADMIN . DIR_ROUTE . $s_value['link'] . '"><span>' . $s_value['name'] . '</span></a></li>';
                    }
                    $menu .= '</ul></li>';
                } elseif (isset($value['link']) && $value['link'] != '#') {
                    if (isset($value['active_menu'])) {
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    if (!in_array($data['user']['role'], constant('USER_ROLE'))) {
                        if ($value['name'] == 'Referrals') {
                            $menu .= '<li class="' . $active . '"><a href="' . URL_ADMIN . DIR_ROUTE . $value['link'] . '"><i class="' . $value['icon'] . '"></i><span>' . "My " . $value['name'] . '</span></a></li>';
                        } else {
                            if ($value['name'] == 'Dashboard' && in_array($data['user']['role'], constant('DASHBOARD_NOT_SHOW'))) {

                            }
                            elseif ($value['name'] == 'Followup') {
                                $menu .= '<li class="' . $active . '"><a href="' . URL_ADMIN . DIR_ROUTE . $value['link'] . '"><i class="' . $value['icon'] . '"></i><span>' . $value['name'] . '&nbsp;&nbsp;&nbsp;<span class="badge badge-sm badge-danger">' .$followup. '</span></span></a></li>';

                            }
                            else {
                                $menu .= '<li class="' . $active . '"><a href="' . URL_ADMIN . DIR_ROUTE . $value['link'] . '"><i class="' . $value['icon'] . '"></i><span>' . $value['name'] . '</span></a></li>';

                            }

                        }
                    } else {
                        if ($value['name'] == 'Referrals') {
                            $menu .= '<li class="' . $active . '"><a href="' . URL_ADMIN . DIR_ROUTE . $value['link'] . '"><i class="' . $value['icon'] . '"></i><span>' . $value['name'] . '&nbsp;&nbsp;&nbsp;<span class="badge badge-sm badge-danger">' . $referrals . '</span></span></a></li>';

                        } else if ($value['name'] == 'Followup') {

                            $menu .= '<li class="' . $active . '"><a href="' . URL_ADMIN . DIR_ROUTE . $value['link'] . '"><i class="' . $value['icon'] . '"></i><span>' . $value['name'] . '&nbsp;&nbsp;&nbsp;<span class="badge badge-sm badge-danger">' .$followup. '</span></span></a></li>';

                        }
                        else {
                            if ($value['name'] == 'Dashboard' && in_array($data['user']['role'], constant('DASHBOARD_NOT_SHOW'))) {

                            } else {
                                $menu .= '<li class="' . $active . '"><a href="' . URL_ADMIN . DIR_ROUTE . $value['link'] . '"><i class="' . $value['icon'] . '"></i><span>' . $value['name'] . '</span></a></li>';

                            }
                        }

                    }
                }
            }
        }
        $menu .= '</ul>';
        return $menu;
    }

    public function activeMenuList($key)
    {
        $data = array(
            'dashboard' => 'dashboard',
            'request' => 'request',
            'request/add' => 'request',
            'request/edit' => 'request',
            'request/view' => 'request',
            'patients' => 'patients',
            'patient/view' => 'patients',
            'patient/add' => 'patients',
            'patient/edit' => 'patients',
            'noticeboard' => 'noticeboard',
            'noticeboard/view' => 'noticeboard',
            'noticeboard/add' => 'noticeboard',
            'noticeboard/edit' => 'noticeboard',
            'users' => 'users',
            'user/add' => 'users',
            'user/edit' => 'users',
            'role' => 'users',
            'role/add' => 'users',
            'role/edit' => 'users',
            'appointments' => 'appointments',
            'appointment/view' => 'appointments',
            'appointment/edit' => 'appointments',
            'prescriptions' => 'prescriptions',
            'prescription/view' => 'prescriptions',
            'prescription/add' => 'prescriptions',
            'prescription/edit' => 'prescriptions',
            'optician-referral' => 'optician-referral',
            'optician-referral/view' => 'optician-referral',
            'optician-referral/add' => 'optician-referral',
            'optician-referral/edit' => 'optician-referral',
            'optician-referral/delete' => 'optician-referral',
            'optician-referral/report/reportUpload' => 'optician-referral',
            'optician-referral/report/removeReport' => 'optician-referral',
            'optician-referral/report/reportsExport' => 'optician-referral',
            'invoices' => 'invoices',
            'invoice/view' => 'invoices',
            'invoice/add' => 'invoices',
            'invoice/edit' => 'invoices',
            'optician-invoices' => 'optician-invoices',
            'optician/invoice/add' => 'optician-invoices',
            'optician/invoice/edit' => 'optician-invoices',
            'optician/invoice/delete' => 'optician-invoices',
            'optician/invoice/view' => 'optician-invoices',
            'follow-up' => 'follow-up',
            'follow-up/edit' => 'follow-up',
            'follow-up/report/reportUpload' => 'follow-up',
            'follow-up/report/removeReport' => 'follow-up',
            'staffattendance' => 'staffattendance',
            'staffattendance/add' => 'staffattendance',
            'staffattendance/edit' => 'staffattendance',
            'staffattendance/view' => 'staffattendance',
            'medicines' => 'pharmacy',
            'medicine/view' => 'pharmacy',
            'medicine/add' => 'pharmacy',
            'medicine/edit' => 'pharmacy',
            'medicine/billing' => 'pharmacy',
            'medicine/billing/add' => 'pharmacy',
            'medicine/billing/edit' => 'pharmacy',
            'medicine/billing/view' => 'pharmacy',
            'medicine/purchase' => 'pharmacy',
            'medicine/purchase/add' => 'pharmacy',
            'medicine/purchase/edit' => 'pharmacy',
            'medicine/purchase/view' => 'pharmacy',
            'medicine/category' => 'pharmacy',
            'medicine/stock' => 'pharmacy',
            'salarytemplate' => 'payroll',
            'salarytemplate/add' => 'payroll',
            'salarytemplate/edit' => 'payroll',
            'makepayment' => 'payroll',
            'makepayment/add' => 'payroll',
            'managesalary' => 'payroll',
            'managesalary/view' => 'payroll',
            'managesalary/edit' => 'payroll',
            'managesalary/history' => 'payroll',
            'managesalary/history/view' => 'payroll',
            'expenses' => 'expenses',
            'expense/add' => 'expenses',
            'expense/edit' => 'expenses',
            'expensetype' => 'settings',
            'birthrecords' => 'birthdeath',
            'birthrecord/add' => 'birthdeath',
            'birthrecord/edit' => 'birthdeath',
            'birthrecord/view' => 'birthdeath',
            'deathrecords' => 'birthdeath',
            'deathrecord/add' => 'birthdeath',
            'deathrecord/edit' => 'birthdeath',
            'deathrecord/view' => 'birthdeath',
            'doctors' => 'doctors',
            'doctor/add' => 'doctors',
            'doctor/edit' => 'doctors',
            'subscribers' => 'subscribers',
            'subscriber/add' => 'subscribers',
            'subscriber/edit' => 'subscribers',
            'blogs' => 'blogs',
            'blog/add' => 'blogs',
            'blog/edit' => 'blogs',
            'comment' => 'blogs',
            'comment/edit' => 'blogs',
            'category' => 'blogs',
            'category/edit' => 'blogs',
            'reviews' => 'webcms',
            'review/edit' => 'webcms',
            'departments' => 'departments',
            'department/add' => 'departments',
            'department/edit' => 'departments',
            'facility' => 'webcms',
            'facility/add' => 'webcms',
            'facility/edit' => 'webcms',
            'services' => 'webcms',
            'service/add' => 'webcms',
            'service/edit' => 'webcms',
            'testimonials' => 'webcms',
            'testimonial/add' => 'webcms',
            'testimonial/edit' => 'webcms',
            'icons' => 'webcms',
            'pages' => 'webcms',
            'page/add' => 'webcms',
            'page/edit' => 'webcms',
            'page/menu' => 'webcms',
            'page/footer' => 'webcms',
            'page/theme' => 'webcms',
            'page/settings' => 'webcms',
            'info' => 'settings',
            'paymentmethod' => 'settings',
            'tax' => 'settings',
            'paymentgateway' => 'settings',
            'suppliers' => 'settings',
            'items' => 'settings',
            'notes' => 'settings',
            'send/email' => 'email',
            'sendbulk/email' => 'email',
            'emaillogs' => 'email',
            'emailtemplate' => 'email',
            'emailsetting' => 'email',
            'customization' => 'customization',
            'forms' => 'forms',
            'form/view' => 'forms',
            'form/add' => 'forms',
            'form/edit' => 'forms',
        );
        if (isset($data[$key])) {
            return $data[$key];
        } else {
            return false;
        }
    }
}