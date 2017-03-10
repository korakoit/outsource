<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liubibo
 * Date: 17/3/6
 * Time: 下午1:42
 */

class Search extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data['category'] = $this->public_category();
        $this->load->view('home/search/search',$data);
    }
}