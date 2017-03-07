<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liubibo
 * Date: 17/3/6
 * Time: 下午1:42
 */

class Product extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $this->load->view('home/product/list');
    }

    public function details(){

        $this->load->view('home/product/details');
    }
}