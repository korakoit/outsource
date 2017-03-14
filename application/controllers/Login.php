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
        $data['title'] = '';
        $data['keywords'] = '';
        $data['description'] = '';
        if($this->user){
            redirect(base_url('/home'), '', 301);
        }else{
            $this->load->view('home/login/login',$data);
        }
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
            $data['title'] = '';
            $data['keywords'] = '';
            $data['description'] = '';
            $this->load->view('home/login/register',$data);
        }
    }

    public function sendMail()
    {

        require_once(APPPATH . '/libraries/PHPMailer-master/PHPMailerAutoload.php');

        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = MAIL_HOST;


        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = MAIL_PORT;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = MAIL_USER;

        //Password to use for SMTP authentication
        $mail->Password = MAIL_PASS;

        //Set who the message is to be sent from
        $mail->setFrom(MAIL_USER, 'CLEAD');

        //Set an alternative reply-to address
        $mail->addReplyTo(MAIL_USER, 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress('277010883@qq.com', 'John Doe');

        //Set the subject line
        $mail->Subject = 'PHPMailer GMail SMTP test';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML('helloworld', dirname(__FILE__));

        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
}