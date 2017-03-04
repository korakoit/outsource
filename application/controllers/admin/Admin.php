<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
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

        $this->load->database('default');
        $admin = $this->db->where('username', $username)
            ->where('password', $password)
            ->get('seller')->row_array();
        if (empty($admin)) {
            $data['err_msg'] = 'Username Or Password Wrong';
            $this->load->view('admin/login/login',$data);
            return;
        } else {
            $this->session->set_userdata([ADMIN_SESS => $admin]);
            redirect(base_url('admin/admin/welcome'), '', 301);
        }
    }

    public function logout()
    {
        $this->session->set_userdata([ADMIN_SESS => '']);

    }


}