<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/5
 * Time: 下午2:21
 */
class Category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function beforeEdit()
    {

        $category_list = $this->db->order_by('pid', 'asc')->get('product_category')->result_array();

        $main_list = [];
        foreach ($category_list as $value) {
            if ($value['pid'] == 0) {
                $main_list[$value['id']] = $value;
            } else {
                $main_list[$value['pid']]['sub'][] = $value;
            }
        }

        $this->load->view('admin/category/edit', ['main_list' => $main_list]);
    }

    public function addMainCategory()
    {
        $title = $this->input->post('title', true);

        $num = $this->db->select('count(id) as num')->where('title', $title)->where('pid', 0)
            ->get('product_category')->row()->num;
        if ($num > 0) {
            $this->jsonOutput(['err_code' => '00001', 'err_msg' => 'Main Category exist']);
        } else {
            $this->db->insert('product_category', ['title' => $title]);
            $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
        }
    }

    public function addSubCategory()
    {
        $title = $this->input->post('title', true);
        $pid = $this->input->post('pid', true);

        $num = $this->db->select('count(id) as num')->where('title', $title)->where('pid', $pid)
            ->get('product_category')->row()->num;
        if ($num > 0) {
            $this->jsonOutput(['err_code' => '00001', 'err_msg' => 'Main Category exist']);
        } else {
            $this->db->insert('product_category', ['title' => $title, 'pid' => $pid]);
            $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
        }
    }

    public function deleteSubCategory(){

        $id = $this->input->post('id',true);
        $num = $this->db->select('count(id) as num')->where('sub_category',$id)->get('product')->row()->num;
        if ($num>0) {
            $this->jsonOutput(['err_code' => '00001', 'err_msg' => 'The Category has Product']);
        }else{
            $this->db->where('id',$id)->delete('product_category');
            $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
        }
    }
}