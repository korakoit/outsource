<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liubibo
* Date: 17/3/6
* Time: 下午1:42
*/

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
        $this->load->helper('validate_helper');
    }

    public function index(){

        $this->load->view('home/login/login');
    }

    public function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = ['email_address' => $email,
            'password' => $password];
        if (empty($email)) {
            $data['err_msg'] = 'Miss Email';
            echo json_encode($data);
            exit;
        }

        if (empty($password)) {
            $data['err_msg'] = 'Miss Password';
            echo json_encode($data);
            exit;
        }
        $user = $this->db->where('email_address', $email)
            ->where('password', $password)
            ->get('user')->row_array();
        if (empty($user)) {
            $data['err_msg'] = 'Email Or Password Wrong';
            echo json_encode($data);
            exit;
        } else {
            $this->session->set_userdata([USER_SESS => $user]);
            $data['err_msg'] = 'successful';
            echo json_encode($data);
        }
    }

    public function register(){
        if($_POST){
            $data = array();
            $first = $this->input->post('first');
            $last = $this->input->post('last');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $confirm = $this->input->post('confirm');
            $company = $this->input->post('company');
            $website = $this->input->post('website');
            $location = $this->input->post('location');
            $phone = $this->input->post('phone');
            if(empty($email)){
                $data['err_msg'] = 'Miss Email';
                echo json_encode($data);
                exit;
            }
            if(empty($first)){
                $data['err_msg'] = 'Miss First Name';
                echo json_encode($data);
                exit;
            }
            if(empty($last)){
                $data['err_msg'] = 'Miss Last Name';
                echo json_encode($data);
                exit;
            }
            if(empty($password)){
                $data['err_msg'] = 'Miss Password';
                echo json_encode($data);
                exit;
            }
            if(empty($confirm)){
                $data['err_msg'] = 'Miss Confirm Password';
                echo json_encode($data);
                exit;
            }
            if(!email($email)){
                $data['err_msg'] = 'Email format is wrong';
                echo json_encode($data);
                exit;
            }
            if($password <> $confirm){
                $data['err_msg'] = 'Two passwords are inconsistent';
                echo json_encode($data);
                exit;
            }
            $user = $user = $this->db->where('email_address', $email)->where('password', $password)
                ->get('user')->row_array();
            if($user){
                $data['err_msg'] = 'Current email has been registered ';
                echo json_encode($data);
                exit;
            }
            $inData = array(
                'first_name' => $first,
                'last_name' => $last,
                'email_address' => $email,
                'password' => $password,
                'company_name' => $company,
                'location' => $location,
                'company_website' => $website,
                'business_phone' => $phone,
            );
            $this->db->insert('user', $inData);
            $data['err_msg'] = 'successful';
            echo json_encode($data);
            exit;
        }else{
            $this->load->view('home/login/register');
        }
    }
}