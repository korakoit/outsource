<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: liubibo
 * Date: 2015/12/24
 * Time: 17:09
 */

class Upload extends MY_Controller{

    /**
     * @desc 构造器
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function getExt($file_name){
        return substr($file_name,strrpos($file_name,'.')+1);
    }

    /**
     *  产品类图片上传
     */
    public function uploadImage(){

        $md5_str = md5_file($_FILES['Filedata']['tmp_name']);
        $upload_path = UPLOAD_PATH.'/'.substr($md5_str,0,2).'/';
        $config['file_name'] = $md5_str.'.'.$this->getExt($_FILES['Filedata']['name']);
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|dotx|docx|ppt|zip|rar|xlsx';
        $config['overwrite'] = true;
        $config['max_size'] = '2000';
        $this->load->library('upload',$config);
        $this->checkDir($config['upload_path']);

        if ($this->upload->do_upload('Filedata')) {
            $upload_data = $this->upload->data();
            $data['path'] = substr($upload_data['file_name'],0,2).'/'.$upload_data['file_name'];
            $data['err_code'] = '0000';
            $data['err_msg'] = 'OK';
        }else{
            $data['err_code'] = 1;
            $data['err_msg'] =  $this->upload->display_errors();
        }
        $this->jsonOutput($data);
    }


    /**
     * @param $dir
     * 检测文件路径
     */
    private function checkDir($dir){
        if(!file_exists($dir)){
            mkdir(($dir),0777,true);
        }
    }


}