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
        $data['id'] = $id;
        $data['pid'] = $pid;
        $this->load->view('home/product/list',$data);
    }

    public function details(){

        $this->load->view('home/product/details');
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