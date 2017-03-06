<?php
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
        $this->load->model('Upload_model', 'uppic');
        $this->load->helper('public_helper');
        $this->load->library('api_service');
    }

    private function getExt($file_name){
        return substr($file_name,strrpos($file_name,'.')+1);
    }

    /**
     *  产品类图片上传
     */
    public function uploadImage(){

        $md5_str = md5_file($_FILES['Filedata']['tmp_name']);
        $upload_path = UPLOAD_FILE_PATH.substr($md5_str,0,2).'/';
        $config['file_name'] = $md5_str.'.'.$this->getExt($_FILES['Filedata']['name']);
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = true;
        $config['max_size'] = '100';
        $this->load->library('upload',$config);
        $this->checkDir($config['upload_path']);

        if ($this->upload->do_upload('Filedata')) {
            $upload_data = $this->upload->data();
            $arr_return['path'] = substr($upload_data['file_name'],0,2).'/'.$upload_data['file_name'];
            $arr_return['raw_name'] = $upload_data['file_name'];
        }else{
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] =  $this->upload->display_errors();
        }

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