<?php

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/1
 * Time: 上午7:16
 */
class Product extends MY_Controller
{

    const STATUS_ON_SHELF = 1;
    const STATUS_DOWN_SHELF = 2;

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function list(){
        $name = $this->input->get('name',true);
        $pcode = $this->input->get('pcode',true);
        $category_id = $this->input->get('category_id',true);
        $status = $this->input->get('status',true);

        $page = $this->input->get('page',true);
        $page = cell($page)>0?cell($page):0;
        $start = $page>0?($this->page_size)*($page-1):0;

        $search = array();
        $where = array();

        if (!empty($name)) {
            $search['name'] = $name;
            $where['name like'] = '%'.$name.'%';
        }
        if (!empty($pcode)){
            $search['pcode'] = $pcode;
            $where['pcode'] = $pcode;
        }
        if (!empty($category_id)){
            $search['category_id'] = $category_id;
            $where['category_id'] = $category_id;
        }
        if (!empty($status)){
            $search['status'] = $status;
            $where['status'] = $status;
        }

        if (!empty($where)) {
            $this->db->where($where);
        }

        $category_list = $this->db->get('product_category')->result_array();
        $category_list = array_column($category_list,'title','id');

        $total = $this->db->select('count(id) as num')->get('product')->row()->num;
        if ($total>0){
            if (!empty($where)){
                $this->db->where($where);
            }
            $this->db->limit($this->page_size,$start)->order_by('id','desc')->get('product')->result_array();
            $result = $this->db->limit($this->page_size,$start)->get('product')->result_array();
        }

        $config['page_query_string'] = ture;
        $config['base_url'] = base_url('admin/admin/list?');
        $config['total_rows'] = $total;
        $config['per_page'] = $this->page_size;
        $config['uri_segment'] = 7;
        $config['query_string_segment'] = 'page';
        $config['page'] = $search;
        $this->load->helper("MY_pagination");
        $data['pagination'] = create_pagination($config);

        $data['search'] = $search;
        $data['active_menu'] = 'product-list';
        $data['result'] = $result;
        $data['category_list'] = $category_list;
        $this->load->view('admin/product/list',$data);



    }

    /**
     * User: cheye
     * Desc: 商品详情
     */
    public function detail(){
        $product_id = $this->input->get('product_id');
        $product = $this->db->where('id',$product_id)->get('product')->row_array();
        $this->load->view('admin/product/detail',$product);
    }

    /**
     * User: cheye
     * Desc: 添加商品
     */
    public function add(){

        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $price = $this->input->post('price');
        $detail = $this->input->post('detail');
        $star = $this->input->post('start');
        $category_id = $this->input->post('category_id');
        $seo_title = $this->input->post('seo_title');
        $seo_content = $this->input->post('seo_content');
        $seo_desc = $this->input->post('seo_desc');
        $image = $this->input->post('image');
        $link_list = $this->input->post('link_list');

        $this->db->insert('product',['name'=>$name,
        'title'=>$title,
        'price'=>$price,
        'detail'=>$detail,
        'star'=>$star,
        'category_id'=>$category_id,
        'seo_title'=>$seo_title,
        'seo_content'=>$seo_content,
        'seo_desc'=>$seo_desc,
        'image'=>$image,
        'pcode'=>'P'.time()]);

        $product_id = $this->db->insert_id();
        $link_list = $this->input->post('link_list');
        $this->db->where('product',$product_id)->delete('product_image');
        foreach ($link_list as $value){
            $images[] = ['product_id'=>$product_id,
                'link'=>$value];
        }
        $this->db->insert_batch('product_image',$images);

        redirect(base_url('/admin/product/detail'),'',301);

    }

    /**
     * User: cheye
     * Desc: 修改商品详情
     */
    public function edit(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $price = $this->input->post('price');
        $detail = $this->input->post('detail');
        $star = $this->input->post('start');
        $category_id = $this->input->post('category_id');
        $seo_title = $this->input->post('seo_title');
        $seo_content = $this->input->post('seo_content');
        $seo_desc = $this->input->post('seo_desc');
        $image = $this->input->post('image');

        $this->db->where('id',$id)->update('product',['name'=>$name,
            'title'=>$title,
            'price'=>$price,
            'detail'=>$detail,
            'star'=>$star,
            'category_id'=>$category_id,
            'seo_title'=>$seo_title,
            'seo_content'=>$seo_content,
            'seo_desc'=>$seo_desc,
            'image'=>$image]);
        $this->jsonOutput(['err_code'=>'0000','err_msg'=>'OK']);
    }

    public function downShelf(){
        $product_id = $this->input->post('product_id');
        $this->db->where('id',$product_id)->update('product',['status'=>STATUS_Down_SHELF]);
        redirect($_SERVER['HTTP_REFERER'],'local',301);
    }

    public function onShelf(){
        $product_id = $this->input->post('product_id');
        $this->db->where('id',$product_id)->update('product',['status'=>STATUS_ON_SHELF]);
        redirect($_SERVER['HTTP_REFERER'],'local',301);
    }
}