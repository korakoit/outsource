<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/12
 * Time: 上午10:30
 */
class Mail extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function index()
    {

        $page = $this->input->get('page', true);
        $page = $page > 0 ? $page : 0;
        $start = $page > 0 ? ($this->page_size) * ($page - 1) : 0;

        $search = array();
        $where = array();


        if (!empty($where)) {
            $this->db->where($where);
        }

        $total = $this->db->select('count(*) as num')->get('mail_list')->row()->num;
        if ($total > 0) {
            if (!empty($where)) {
                $this->db->where($where);
            }
            $result = $this->db->limit($this->page_size, $start)->order_by('id', 'desc')->get('mail_list')->result_array();
            $data['result'] = $result;
        }


        $config['page_query_string'] = true;
        $config['base_url'] = base_url('admin/mail/index?');
        $config['total_rows'] = $total;
        $config['per_page'] = $this->page_size;
        $config['uri_segment'] = 7;
        $config['query_string_segment'] = 'page';
        $config['page'] = $search;
        $this->load->helper("MY_pagination");
        $data['pagination'] = create_pagination($config);

        $data['search'] = $search;
        $this->load->view('admin/mail/list', $data);
    }


}