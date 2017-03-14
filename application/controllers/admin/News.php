<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/12
 * Time: 上午10:30
 */
class News extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function index()
    {
        $title = $this->input->get('title', true);

        $page = $this->input->get('page', true);
        $page = $page > 0 ? $page : 0;
        $start = $page > 0 ? ($this->page_size) * ($page - 1) : 0;

        $search = array();
        $where = array();

        if (!empty($title)) {
            $search['title'] = $title;
            $where['title like'] = '%' . $title . '%';
        }

        if (!empty($where)) {
            $this->db->where($where);
        }

        $total = $this->db->select('count(id) as num')->get('news')->row()->num;
        if ($total > 0) {
            if (!empty($where)) {
                $this->db->where($where);
            }
            $result = $this->db->limit($this->page_size, $start)->order_by('id', 'desc')->get('news')->result_array();
            $data['result'] = $result;
        }


        $config['page_query_string'] = true;
        $config['base_url'] = base_url('admin/news/index?');
        $config['total_rows'] = $total;
        $config['per_page'] = $this->page_size;
        $config['uri_segment'] = 7;
        $config['query_string_segment'] = 'page';
        $config['page'] = $search;
        $this->load->helper("MY_pagination");
        $data['pagination'] = create_pagination($config);

        $data['search'] = $search;
        $this->load->view('admin/news/list', $data);
    }

    public function beforeAdd()
    {
        $data['active'] = 'admin-new-index';
        $data['action'] = base_url('admin/news/add');
        $this->load->view('admin/news/edit',$data);
    }

    public function add()
    {
        $title = $this->input->post('title', true);
        $content = $this->input->post('editorValue', true);

        $this->db->insert('news',['title'=>$title,'content'=>$content]);
        $this->jsonOutput(['err_code'=>'0000','err_msg'=>'OK']);
    }

    public function beforeEdit()
    {
        $id = $this->input->get('id',true);
        $data['news'] = $this->db->where('id',$id)->get('news')->row_array();
        $data['active'] = 'admin-new-index';
        $data['action'] = base_url('admin/news/edit');
        $this->load->view('admin/news/edit',$data);
    }

    public function edit()
    {
        $id = $this->input->post('id',true);
        $title = $this->input->post('title', true);
        $content = $this->input->post('editorValue', true);

        $this->db->where('id',$id)->update('news',['title'=>$title,'content'=>$content]);
        $this->jsonOutput(['err_code'=>'0000','err_msg'=>'OK']);
    }

}