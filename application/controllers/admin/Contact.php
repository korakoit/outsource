<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Contact extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function index()
    {
        $name = $this->input->get('name', true);
        $email = $this->input->get('email', true);
//        $begin = $this->input->get('begin', true);
//        $end = $this->input->get('end', true);

        $page = $this->input->get('page', true);
        $page = $page > 0 ? $page : 0;
        $start = $page > 0 ? ($this->page_size) * ($page - 1) : 0;

        $search = array();
        $where = array();

        if (!empty($name)) {
            $search['name'] = $name;
            $where['name like'] = '%' . $name . '%';
        }
        if (!empty($email)) {
            $search['email'] = $email;
            $where['email'] = $email;
        }

//        if (!empty($begin)) {
//            $search['ctime >='] = $begin;
//            $where['begin'] = $begin;
//        }
//
//        if (!empty($end)) {
//            $search['ctime <='] = $end;
//            $where['end'] = $end;
//        }

        if (!empty($where)) {
            $this->db->where($where);
        }

        $total = $this->db->select('count(id) as num')->get('contact')->row()->num;
        if ($total > 0) {
            if (!empty($where)) {
                $this->db->where($where);
            }
            $result = $this->db->limit($this->page_size, $start)->order_by('id', 'desc')->get('contact')->result_array();
            $data['result'] = $result;
        }


        $config['page_query_string'] = true;
        $config['base_url'] = base_url('admin/contact/index?');
        $config['total_rows'] = $total;
        $config['per_page'] = $this->page_size;
        $config['uri_segment'] = 7;
        $config['query_string_segment'] = 'page';
        $config['page'] = $search;
        $this->load->helper("MY_pagination");
        $data['pagination'] = create_pagination($config);

        $data['search'] = $search;
        $data['active_menu'] = 'product-list';
        $this->load->view('admin/contact/list', $data);
    }


}