<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }


    public function welcome()
    {
        $this->load->view('admin/welcome');
    }

    public function index()
    {
        $this->load->view('admin/login/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = ['username' => $username,
            'password' => $password];

        if (empty($username)) {
            $data['err_msg'] = 'Miss Username';
            $this->load->view('admin/login/login');
            return;
        }

        if (empty($password)) {
            $data['err_msg'] = 'Miss Password';
            $this->load->view('admin/login/login');
            return;
        }

        $admin = $this->db->where('username', $username)
            ->where('password', $password)
            ->get('seller')->row_array();
        if (empty($admin)) {
            $data['err_msg'] = 'Username Or Password Wrong';
            $this->load->view('admin/login/login', $data);
            return;
        } else {
            $this->session->set_userdata([ADMIN_SESS => $admin]);
            redirect(base_url('admin/admin/welcome'), '', 301);
        }
    }

    public function logout()
    {
        $this->session->set_userdata([ADMIN_SESS => '']);
        redirect(base_url('admin/admin/index'), '', 301);
    }

    public function getSellerInfo()
    {
        $seller = $this->db->where('id', $this->admin['id'])->get('seller')->row_array();
        $this->load->view('admin/admin/edit', $seller);
    }

    public function edit()
    {
        $email_address = $this->input->post('email_address', true);
        $location = $this->input->post('location', true);
        $business_phone = $this->input->post('business_phone', true);
        $logo = $this->input->post('logo', true);
        $two_dimensional_code = $this->input->post('two_dimensional_code', true);
        $update_info = ['email_address' => $email_address,
            'location' => $location,
            'business_phone' => $business_phone,
            'logo' => $logo,
            'two_dimensional_code' => $two_dimensional_code];
        $this->db->where('id', $this->admin['id'])->update('seller', $update_info);
        $this->admin = array_merge($this->admin, $update_info);
        $this->session->set_userdata(ADMIN_SESS, $this->admin);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }


}