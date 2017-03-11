<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/1
 * Time: 上午7:15
 */
class Home extends MY_Controller
{
    const STATUS_IS_HOME = 1;
    const STATUS_UN_HOME = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function bannerList()
    {
        $data['result'] = $this->db->get('banner')->result_array();
        if (!empty($data['result'])){
            $product_list = $this->db->where_in('id', array_column($data['result'], 'product_id'))
                ->get('product')->result_array();
            $product_list = array_column($product_list, 'name', 'id');
            foreach ($data['result'] as $key => $value) {
                $data['result'][$key]['name'] = $product_list[$value['product_id']];
            }
        }
        $this->load->view('admin/home/edit_banner', $data);
    }

    public function addBanner()
    {

        $pcode = $this->input->post('pcode', true);
        $image = $this->input->post('image', true);

        $product = $this->db->where('pcode', $pcode)->get('product')->row_array();
        if (empty($product)) {
            $this->jsonOutput(['err_code' => '0001', 'err_msg' => 'Product Un Exist']);
        }
        $this->db->insert('banner', ['image' => $image, 'pcode' => $pcode, 'product_id' => $product['id']]);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function deleteBanner()
    {
        $id = $this->input->post('id',true);
        $this->db->where('id',$id)->delete('banner');
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function recommendList()
    {
        $data = [];
        $recommend_list = $this->db->get('recommend_product')->result_array();
        if (!empty($recommend_list)){
            $data['result'] = $this->db->where_in('id', array_column($recommend_list, 'product_id'))
                ->get('product')->result_array();
        }
        $this->load->view('admin/home/edit_recommend', $data);
    }

    public function addRecommend()
    {
        $pcode = $this->input->post('pcode', true);

        $product = $this->db->where('pcode', $pcode)->get('product')->row_array();
        if (empty($product)) {
            $this->jsonOutput(['err_code' => '0001', 'err_msg' => 'Product Un Exist']);
        }
        $this->db->insert('recommend_product', ['product_id' => $product['id']]);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function deleteRecommend()
    {
        $product_id = $this->input->post('product_id',true);
        $this->db->where('product_id',$product_id)->delete('recommend_product');
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function friendLinkList()
    {
        $data['result'] = $this->db->get('friend_link')->result_array();
        $this->load->view('admin/home/edit_link', $data);
    }

    public function addFriendLink()
    {
        $link = $this->input->post('link', true);
        $logo = $this->input->post('logo', true);
        $this->db->insert('friend_link', ['link' => $link,'logo'=>$logo]);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function deleteFriendLink()
    {
        $id = $this->input->post('id',true);
        $this->db->where('id',$id)->delete('friend_link');
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function homeList()
    {
        $data['result'] = $this->db->where('is_home',Home::STATUS_IS_HOME)->get('product')->result_array();
        $this->load->view('admin/home/edit_home_product', $data);
    }

    public function addHome()
    {
        $pcode = $this->input->post('pcode', true);
        $this->db->where('pcode',$pcode)->update('product',['is_home'=>Home::STATUS_IS_HOME]);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function deleteHome()
    {
        $product_id = $this->input->post('product_id', true);
        $this->db->where('id',$product_id)->update('product',['is_home'=>Home::STATUS_UN_HOME]);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function sixList()
    {
        $data['result'] = $this->db->get('six_product')->result_array();
        if (!empty($data['result'])){
            $product_list = $this->db->where_in('id', array_column($data['result'], 'product_id'))
                ->get('product')->result_array();
            $product_list = array_column($product_list, 'name', 'id');
            foreach ($data['result'] as $key => $value) {
                $data['result'][$key]['name'] = $product_list[$value['product_id']];
            }
        }
        $this->load->view('admin/home/edit_six', $data);
    }

    public function addSix()
    {

        $pcode = $this->input->post('pcode', true);
        $image = $this->input->post('image', true);

        $product = $this->db->where('pcode', $pcode)->get('product')->row_array();
        if (empty($product)) {
            $this->jsonOutput(['err_code' => '0001', 'err_msg' => 'Product Un Exist']);
        }
        $this->db->insert('six_product', ['image' => $image, 'pcode' => $pcode, 'product_id' => $product['id']]);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }

    public function deleteSix()
    {
        $id = $this->input->post('id',true);
        $this->db->where('id',$id)->delete('six_product');
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK']);
    }
}