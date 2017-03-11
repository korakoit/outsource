<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liubibo
 * Date: 17/3/6
 * Time: 下午1:42
 */

class Product extends MY_Controller
{
    public $page_offset = 12;
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function category($pid,$id){
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = $page > 0 ? ($this->page_offset) * ($page-1) : 0;
        $category = $this->db->get('product_category')->result_array();
        $data['category'] = $this->format_tree($category);
        if(isset($id) && $id>0){
            $count_num = $this->db->select('count(distinct id) as num')->where('sub_category',$id)->where('main_category',$pid)->get('product')->row()->num;
            $data['totle'] = $count_num;
            $data['product_lsit'] = $this->db->where('sub_category',$id)->limit($this->page_offset,$start)->get('product')->result_array();
        }else{
            $count_num = $this->db->select('count(distinct id) as num')->get('product')->row()->num;
            $data['totle'] = $count_num;
            $data['product_lsit'] = $this->db->where('main_category',$pid)->limit($this->page_offset,$start)->get('product')->result_array();
        }
        $p_name = $this->db->where('id',$pid)->get('product_category')->row_array();
        $name = $this->db->where('id',$id)->get('product_category')->row_array();
        $data['id'] = $id;
        $data['pid'] = $pid;
        $data['link'] = $this->public_friend();
        $data['title'] = '';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['bre'] = '<a href="/product/category/'.$pid.'/0">'.$p_name['title'].'</a><span>&gt;</span><a class="active">'.$name['title'].'</a>';
        $this->load->view('home/product/list',$data);
    }

    public function details($id){
        $data['category'] = $this->public_category();
        $product = $this->db->where('id',$id)->get('product')->row_array();
        $pic_list = $this->db->where('product_id',$id)->get('product_image')->result_array();
        $similar_product = $this->db->where('sub_category',$product['sub_category'])->limit(6,0)->get('product')->result_array();
        $data['product'] = $product;
        $data['pic_list'] = $pic_list;
        $data['similar_product'] = $similar_product;
        $data['link'] = $this->public_friend();
        $data['title'] = $product['seo_title'];
        $data['keywords'] = $product['seo_title'];
        $data['description'] = $product['seo_desc'];
        $p_name = $this->db->where('id',$product['main_category'])->get('product_category')->row_array();
        $name = $this->db->where('id',$product['sub_category'])->get('product_category')->row_array();
        $data['bre'] = '<a href="/product/category/'.$product['main_category'].'/0/">'.$p_name['title'].'</a><span>&gt;</span><a href="/product/category/'.$product['main_category'].'/'.$product['sub_category'].'/">'.$name['title'].'</a><span>&gt;</span><a class="active">'.$product['name'].'</a>';
        $this->load->view('home/product/details',$data);
    }

    public function download(){
        $data['link'] = $this->public_friend();
        $data['category'] = $this->public_category();
        $data['title'] = '';
        $data['keywords'] = '';
        $data['description'] = '';
        $this->load->view('home/product/download',$data);
    }

    public function format_tree($array, $pid = 0){
        $arr = array();
        $tem = array();
        foreach ($array as $v) {
            if ($v['pid'] == $pid) {
                $tem = $this->format_tree($array, $v['id']);
                //判断是否存在子数组
                $tem && $v['son'] = $tem;
                $arr[] = $v;
            }
        }
        return $arr;
    }
}