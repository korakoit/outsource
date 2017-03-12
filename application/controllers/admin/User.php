<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/1
 * Time: 上午7:16
 */
class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function index()
    {

        $last_name = $this->input->get('last_name', true);
        $first_name = $this->input->get('first_name', true);
        $email_address = $this->input->get('email_address', true);
        $status = $this->input->get('status', true);

        $page = $this->input->get('page', true);
        $page = $page > 0 ? $page : 0;
        $start = $page > 0 ? ($this->page_size) * ($page - 1) : 0;

        $search = array();
        $where = array();

        if (!empty($last_name)) {
            $search['last_name'] = $last_name;
            $where['last_name like'] = '%' . $last_name . '%';
        }
        if (!empty($first_name)) {
            $search['first_name'] = $first_name;
            $where['first_name like'] = '%' . $first_name . '%';
        }
        if (!empty($email_address)) {
            $search['email_address'] = $email_address;
            $where['email_address like'] = '%' . $email_address . '%';
        }
        if (!empty($status)) {
            $search['status'] = $status;
            $where['status'] = $status;
        }

        if (!empty($where)) {
            $this->db->where($where);
        }

        $total = $this->db->select('count(id) as num')->get('user')->row()->num;
        if ($total > 0) {
            if (!empty($where)) {
                $this->db->where($where);
            }
            $result = $this->db->limit($this->page_size, $start)->order_by('id', 'desc')->get('user')->result_array();
            $data['result'] = $result;
        }

        $config['page_query_string'] = true;
        $config['base_url'] = base_url('admin/user/index?');
        $config['total_rows'] = $total;
        $config['per_page'] = $this->page_size;
        $config['uri_segment'] = 7;
        $config['query_string_segment'] = 'page';
        $config['page'] = $search;
        $this->load->helper("MY_pagination");
        $data['pagination'] = create_pagination($config);

        $data['search'] = $search;
        $this->load->view('admin/user/list', $data);
    }


    public function edit()
    {
        $id = $this->input->post('id');
        $first_name = $this->input->post('first_name', true);
        $last_name = $this->input->post('last_name', true);
        $email_address = $this->input->post('email_address', true);
        $company_name = $this->input->post('company_name', true);
        $location = $this->input->post('location', true);
        $company_website = $this->input->post('company_website', true);
        $business_phone = $this->input->post('business_phone', true);

        $this->db->where('id', $id)->update('user', ['first_name' => $first_name,
            'last_name' => $last_name,
            'email_address' => $email_address,
            'company_name' => $company_name,
            'location' => $location,
            'company_website' => $company_website,
            'business_phone' => $business_phone]);

        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK', 'id' => $id]);
    }

    public function beforeEdit()
    {
        $id = $this->input->get('id', true);
        $user = $this->db->where('id', $id)->get('user')->row_array();
        $user['active'] = 'admin-user-index';
        $this->load->view('admin/user/edit', $user);
    }

    public function setUserStatus()
    {
        $id = $this->input->post('id', true);
        $status = $this->input->post('status', true);
        $this->db->where('id', $id)->update('user', ['status' => $status]);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function delete()
    {
        $id = $this->input->post('id', true);
        $this->db->where('id', $id)->delete('user');
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
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
        $mail->addAddress('box201041404210@163.com', 'John Doe');

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