<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by cheye.
 * User: cheye
 * Date: 2017/3/5
 * Time: 下午6:14
 */
class Upload extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function uploadImage(){

        $md5_dir = md5_file($_FILES['Filedata']['tmp_name']);

        $config['file_name']            = $md5_dir.''
        $config['upload_path']          = UPLOAD_PATH;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('Filedata'))
        {
            log_message('error',$this->upload->display_errors());
            $data['err_code'] = '0001';
            $data['err_msg'] = 'Upload Fail';

        }
        else
        {
            $uploadData = $this->upload->data();
//            $data['path'] = $uploadData['orig_name'];
            var_dump($uploadData);
            $data['err_code'] = '0000';
            $data['err_msg'] = 'OK';
        }
        $this->jsonOutput($data);
    }
}