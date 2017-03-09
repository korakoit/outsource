<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/1
 * Time: 上午7:15
 */
class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function bannerList(){
        $this->load->view('admin/home/edit_banner');
    }

    public function addBanner(){

    }

    public function deleteBanner(){

    }

    public function reccomendList(){

    }

    public function addRecommend(){

    }

    public function deleteRecommend(){

    }

    public function friendLinkList(){

    }

    public function addFriendLink(){

    }

    public function deleteFriendLink(){

    }
}