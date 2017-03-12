<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liubibo
 * Date: 17/3/6
 * Time: 下午1:42
 */

class Search extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function index(){
        if($_POST){
            $keywords = $this->input->post('keywords');
            if(empty($keywords)){
                $data['err_msg'] = 'Please enter the name of the commodity';
                echo json_encode($data);
                exit;
            }
            $data['product_list'] = $this->db->like('name', $keywords)
                ->get('product')->result_array();
            if($data['product_list']){
                $data['err_msg'] = 'successful';
                echo json_encode($data);
                exit;
            }else{
                $data['err_msg'] = 'no data';
                echo json_encode($data);
                exit;
            }
        }else{
            $data['title'] = '';
            $data['keywords'] = '';
            $data['description'] = '';
            $data['link'] = $this->public_friend();
            $data['category'] = $this->public_category();
            $this->load->view('home/search/search',$data);
        }
    }
}