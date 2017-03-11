<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function index(){
        $banner = $this->db->get('banner')->row_array();
        $data['banner'] = $banner;
        $six_product = $this->db->get('six_product')->row_array();
        $data['six_product'] = $this->product_detail($six_product);
        $eight_product = $this->db->get('eight_product')->row_array();
        $data['eight_product'] = $this->product_detail($eight_product);
        $recommend_product = $this->db->get('recommend_product')->row_array();
        $data['recommend_product'] = $this->product_detail($recommend_product);
        $data['category'] = $this->public_category();
        $data['link'] = $this->public_friend();
        $data['title'] = '';
        $data['keywords'] = '';
        $data['description'] = '';
        $this->load->view('home/index',$data);
    }

    public function product_detail($product_array){
        if(count($product_array)>0){
            $ids = array_column($product_array,'id');
            $detail = $this->db->where_in('id',$ids)->get('product')->result_array();
            return $detail;
        }
    }

}