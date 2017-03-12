<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liubibo
 * Date: 17/3/6
 * Time: 下午1:42
 */

class Cart extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function index(){
        $data['link'] = $this->public_friend();
        $data['category'] = $this->public_category();
        if(empty($this->user)){
            redirect(base_url('home/login/login'), '', 301);
        }else{
            $cart = $this->db->select('s.*,p.*')->from('shop_cart as s')
                ->join('product as p','p.id = s.product_id')
                ->get()->result_array();
            $data['cart'] = $cart;
            $data['title'] = '';
            $data['keywords'] = '';
            $data['description'] = '';
            $this->load->view('home/cart/list',$data);
        }
    }

    public function addcart(){
        if($this->user){
            $post = $this->input->post();
            $product_id = $post['product_id'];
            $num = $post['num'];
            $cart_list = $this->db->where('user_id',$this->user['id'])->where('product_id',$product_id)->get('shop_cart')->row_array();
            if($cart_list){
                $new_num = $cart_list['num'] + $num;
                $update_data = ['num' => $new_num];
                $this->db->where('id', $cart_list['id'])->update('shop_cart',$update_data);
            }else{
                $indate = ['user_id' => $this->user['id'],'product_id'=>$product_id,'num'=>$num];
                $this->db->insert('shop_cart', $indate);
            }
            $data['err_code'] = '0000';
        }else{
            $data['err_code'] = '0001';
        }
        echo json_encode($data);
    }

    public function delcart(){
        if($this->user){
            $post = $this->input->post();
            $product_id = $post['product_id'];
            $this->db->where('user_id',$this->user['id'])->where('product_id',$product_id)->delete('shop_cart');
            $data['err_code'] = '0001';
        }else{
            $data['err_code'] = '0001';
        }
        echo json_encode($data);
    }
}