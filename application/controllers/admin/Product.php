<?php

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/1
 * Time: 上午7:16
 */
class Product extends MY_Controller
{

    const STATUS_ON_SHELF = 2;
    const STATUS_DOWN_SHELF = 1;
    const STATUS_DELETE = 3;


    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function index()
    {
        $name = $this->input->get('name', true);
        $pcode = $this->input->get('pcode', true);
        $main_category = $this->input->get('main_category', true);
        $sub_category = $this->input->get('sub_category', true);
        $status = $this->input->get('status', true);

        $page = $this->input->get('page', true);
        $page = $page > 0 ? $page : 0;
        $start = $page > 0 ? ($this->page_size) * ($page - 1) : 0;

        $search = array();
        $where = array();

        if (!empty($name)) {
            $search['name'] = $name;
            $where['name like'] = '%' . $name . '%';
        }
        if (!empty($pcode)) {
            $search['pcode'] = $pcode;
            $where['pcode'] = $pcode;
        }
        if (!empty($main_category)) {
            $search['main_category'] = $main_category;
            $where['main_category'] = $main_category;
        }
        if (!empty($sub_category)) {
            $search['sub_category'] = $sub_category;
            $where['sub_category'] = $sub_category;
        }
        if (!empty($status)) {
            $search['status'] = $status;
            $where['status'] = $status;
        }

        if (!empty($where)) {
            $this->db->where($where);
        }

        $total = $this->db->select('count(id) as num')->get('product')->row()->num;
        if ($total > 0) {
            if (!empty($where)) {
                $this->db->where($where);
            }
            $result = $this->db->limit($this->page_size, $start)->order_by('id', 'desc')->get('product')->result_array();
            $data['result'] = $result;
        }

        $data['main_list'] = array_column($this->db->where('pid',0)->get('product_category')->result_array(), 'title', 'id');
        if (!empty($main_category)){
            $data['sub_list'] = array_column($this->db->where('pid',$main_category)
                ->get('product_category')->result_array(), 'title', 'id');
        }

        $config['page_query_string'] = true;
        $config['base_url'] = base_url('admin/admin/index?');
        $config['total_rows'] = $total;
        $config['per_page'] = $this->page_size;
        $config['uri_segment'] = 7;
        $config['query_string_segment'] = 'page';
        $config['page'] = $search;
        $this->load->helper("MY_pagination");
        $data['pagination'] = create_pagination($config);

        $data['search'] = $search;
        $data['active_menu'] = 'product-list';
        $this->load->view('admin/product/list', $data);
    }

    /**
     * User: cheye
     * Desc: 商品详情
     */
    public function detail()
    {
        $product_id = $this->input->get('product_id');
        $data['product'] = $this->db->where('id', $product_id)->get('product')->row_array();
        $image_list = $this->db->where('product_id', $product_id)->get('product_image')->result_array();
        if (!empty($image_list)) {
            $data['image_list'] = array_column($image_list, 'link');
        }
        $data['main_list'] = array_column($this->db->where('pid',0)->get('product_category')->result_array(), 'title', 'id');
        if (!empty($data['main_list'])) {
            $data['sub_list'] = array_column($this->db->where('pid',key($data['main_list']))
                ->get('product_category')->result_array(),'title','id');
        }
        $data['action'] = base_url('admin/product/edit');
        $this->load->view('admin/product/edit', $data);
    }

    public function beforeAdd()
    {

        $data['main_list'] = $this->db->get('product_category')->result_array();
        $data['action'] = base_url('admin/product/add');
        $this->load->view('admin/product/edit', $data);
    }

    public function ajaxGetSubCategory()
    {
        $pid = $this->input->post('pid', true);
        $category_list = $this->db->where('pid', $pid)->get('product_category')->result_array();
        $data = array_column($category_list, 'title', 'id');
        $this->jsonOutput($data);
    }

    /**
     * User: cheye
     * Desc: 添加商品
     */
    public function add()
    {

        $name = $this->input->post('name', true);
        $title = $this->input->post('title', true);
        $price = $this->input->post('price', true);
        $storage = $this->input->post('storage', true);
        $detail = $this->input->post('detail', true);
        $star = $this->input->post('star', true);
        $main_category = $this->input->post('main_category', true);
        $sub_category = $this->input->post('sub_category', true);
        $seo_title = $this->input->post('seo_title', true);
        $seo_content = $this->input->post('seo_content', true);
        $seo_desc = $this->input->post('seo_desc', true);
        $image = $this->input->post('image', true);

        $link_list = $this->input->post('images', true);

        $this->db->insert('product', ['name' => $name,
            'title' => $title,
            'price' => $price,
            'storage' => $storage,
            'detail' => $detail,
            'star' => $star,
            'main_category' => $main_category,
            'sub_category' => $sub_category,
            'seo_title' => $seo_title,
            'seo_content' => $seo_content,
            'seo_desc' => $seo_desc,
            'image' => $image,
            'pcode' => 'P' . time()]);

        $product_id = $this->db->insert_id();
        $this->db->where('product_id', $product_id)->delete('product_image');

        if (!empty($link_list) && is_array($link_list))
            foreach ($link_list as $value) {
                $images[] = ['product_id' => $product_id,
                    'link' => $value];
            }
        $this->db->insert_batch('product_image', $images);
        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK', 'product_id' => $product_id]);


    }

    /**
     * User: cheye
     * Desc: 修改商品详情
     */
    public function edit()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $price = $this->input->post('price');
        $storage = $this->input->post('storage', true);
        $detail = $this->input->post('detail');
        $star = $this->input->post('start');
        $main_category = $this->input->post('main_category');
        $sub_category = $this->input->post('sub_category');
        $seo_title = $this->input->post('seo_title');
        $seo_content = $this->input->post('seo_content');
        $seo_desc = $this->input->post('seo_desc');
        $image = $this->input->post('image');

        $link_list = $this->input->post('images', true);

        $this->db->where('id', $id)->update('product', ['name' => $name,
            'title' => $title,
            'price' => $price,
            'storage' => $storage,
            'detail' => $detail,
            'star' => $star,
            'main_category' => $main_category,
            'sub_category' => $sub_category,
            'seo_title' => $seo_title,
            'seo_content' => $seo_content,
            'seo_desc' => $seo_desc,
            'image' => $image]);

        $this->db->where('product_id', $id)->delete('product_image');
        if (!empty($link_list) && is_array($link_list))
            foreach ($link_list as $value) {
                $images[] = ['product_id' => $id,
                    'link' => $value];
            }
        $this->db->insert_batch('product_image', $images);

        $this->jsonOutput(['err_code' => '0000', 'err_msg' => 'OK', 'product_id' => $id]);
    }

    public function delete()
    {
        $product_id = $this->input->post('id', true);
        $this->db->where('id', $product_id)->delete('product');
        $this->db->where('product_id', $product_id)->delete('product_image');
        $this->jsonOutput(['err_code'=>'0000','err_msg'=>'OK']);
    }

    public function downShelf()
    {
        $product_id = $this->input->post('id');
        $this->db->where('id', $product_id)->update('product', ['status' => Product::STATUS_DOWN_SHELF]);
        $this->jsonOutput(['err_code'=>'0000','err_msg'=>'OK']);
    }

    public function onShelf()
    {
        $product_id = $this->input->post('id');
        $this->db->where('id', $product_id)->update('product', ['status' => Product::STATUS_ON_SHELF]);
        $this->jsonOutput(['err_code'=>'0000','err_msg'=>'OK']);
    }

}