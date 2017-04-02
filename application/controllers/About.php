<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liubibo
 * Date: 17/3/6
 * Time: 下午1:42
 */

class About extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
        $this->load->helper('validate_helper');
    }

    public function index()
    {
        $data['link'] = $this->public_friend();
        $data['category'] = $this->public_category();
        $data['title'] = '';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['bre'] = '<a href="/home">Home Page</a><span>&gt;</span><a class="active">About Us</a>';
        $this->load->view('home/about/aboutus',$data);
    }

    public function contactus(){
        $data['title'] = '';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['bre'] = '<a href="/home">Home Page</a><span>&gt;</span><a class="active">Contact Us</a>';
        $data['link'] = $this->public_friend();
        $data['category'] = $this->public_category();
        $data['seller'] = $this->db->get('seller')->row_array();
        $this->load->view('home/about/contactus',$data);
    }

    public function add(){
        $post = $this->input->post();
        $name = $post['name'];
        $email = $post['email'];
        $subject = $post['subject'];
        $note = $post['note'];
        if(!required($name)){
            $data['err_code'] = 'Miss Name';
            echo json_encode($data);
            exit;
        }
        if(!required($email)){
            $data['err_code'] = 'Miss Email';
            echo json_encode($data);
            exit;
        }
        if(!required($subject)){
            $data['err_code'] = 'Miss Subject';
            echo json_encode($data);
            exit;
        }
        if(!required($note)){
            $data['err_code'] = 'Miss NOTE';
            echo json_encode($data);
            exit;
        }
        if(!email($email)){
            $data['err_code'] = 'Email format is not correct';
            echo json_encode($data);
            exit;
        }
        $inData = array(
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'note' => $note
        );
        $this->db->insert('contact', $inData);
        $data['err_code'] = '0000';
        echo json_encode($data);
    }

    public function addemail(){
        $post = $this->input->post();
        $email = $post['email'];
        if(!email($email)){
            $data['err_code'] = 'Email format is not correct';
            echo json_encode($data);
            exit;
        }
        $mail = $this->db->where('email',$email)->get('mail_list')->row_array();
        if($mail){
            $data['err_code'] = 'Email already exists';
            echo json_encode($data);
        }else{
            $this->db->insert('mail_list', array('email' => $email));
            $data['err_code'] = '0000';
            echo json_encode($data);
        }
    }
}