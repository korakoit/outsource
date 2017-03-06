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

    /**
     *  产品类图片上传
     */
    public function uploadPic(){
        $post = $this->input->post();
        $width = !empty($post['width']) ? $post['width'] : 0;
        $min = !empty($post['min'] )? $post['min'] : 0;
        $height = !empty($post['height']) ? $post['height'] : 0;
        $arr_return = array('error_code'=>0,'error_msg'=>'OK');
        $md5_str = md5_file($_FILES['Filedata']['tmp_name']);
        $image_url = UPLOAD_FILE_PATH.substr($md5_str,0,2).'/';
        $config['file_name'] = $md5_str.'.'.getPicExt($_FILES['Filedata']['name']);
        $config['upload_path'] = $image_url;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = true;
        $config['max_size'] = '100';
        if($min>0){
            $config['min_width']  = $min;
        }
        $this->load->library('upload',$config);
        $this->checkDir($config['upload_path']);
        $return = $this->checkWidthHeight($_FILES['Filedata']['tmp_name'],$width,$min);

        $img_info = getimagesize($_FILES['Filedata']['tmp_name']);

        if($return['error_code']==1){
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] = $return['error_msg'];
            echo json_encode($arr_return);exit;
        }
        if ($this->upload->do_upload('Filedata')) {
            $upload_data = $this->upload->data();
            //if($min>0){
            //    $this->cutPic($config['upload_path'].$upload_data['file_name'],true,'692');
            //    $this->cutPic($config['upload_path'].$upload_data['file_name'],true,'638');
           // }
            $arr_return['path'] = substr($upload_data['file_name'],0,2).'/'.$upload_data['file_name'];
            $arr_return['raw_name'] = $upload_data['file_name'];
            $arr_return['width'] = $img_info[0];
            $arr_return['height'] = $img_info[1];

        }else{
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] =  $this->upload->display_errors();
        }
        echo json_encode($arr_return);exit;
    }

    /**
     *  国家图片上传
     */
    public function uploadCountryPic(){
        $post = $this->input->post();
        $width = !empty($post['width']) ? $post['width'] : 0;
        $min = !empty($post['min'] )? $post['min'] : 0;
        $height = !empty($post['height']) ? $post['height'] : 0;
        $arr_return = array('error_code'=>0,'error_msg'=>'OK');
        //$time_stamp = $this->makeTimeStamp();
        $md5_str = md5_file($_FILES['Filedata']['tmp_name']);
        $image_url = UPLOAD_FILE_PATH.substr($md5_str,0,2).'/';
        $config['file_name'] = $md5_str.'.'.getPicExt($_FILES['Filedata']['name']);
        $config['upload_path'] = $image_url;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = true;
        $config['max_size'] = '4096';
        if($min>0){
            $config['min_width']  = $min;
        }
        $this->load->library('upload',$config);
        $this->checkDir($config['upload_path']);
        $return = $this->checkWidthHeight($_FILES['Filedata']['tmp_name'],$width,$min);

        $img_info = getimagesize($_FILES['Filedata']['tmp_name']);

        if($return['error_code']==1){
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] = $return['error_msg'];
            echo json_encode($arr_return);exit;
        }
        if ($this->upload->do_upload('Filedata')) {
            $upload_data = $this->upload->data();
            //if($min>0){
            //    $this->cutPic($config['upload_path'].$upload_data['file_name'],true,'692');
            //    $this->cutPic($config['upload_path'].$upload_data['file_name'],true,'638');
            // }
            $arr_return['path'] = substr($upload_data['file_name'],0,2).'/'.$upload_data['file_name'];
            $arr_return['raw_name'] = $upload_data['file_name'];

            $arr_return['width'] = $img_info[0];
            $arr_return['height'] = $img_info[1];

        }else{
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] =  $this->upload->display_errors();
        }
        echo json_encode($arr_return);exit;
    }

    /**
     * 商品图片管理上传
     */
    public function uploadList($id){
        $arr_return = array('error_code'=>0,'error_msg'=>'OK');
        $post = $this->input->post();
        $width = $post['width'];
        //$height = $post['height'];
        $type = $post['type'];
        $list_count = $this->uppic->db->select('count(id) as num')->where('type',$type)->where('sale_id',$id)->get('product_pic')->row()->num;
        if($list_count>=5){
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] = '最多上传5张图片';
            echo json_encode($arr_return);exit;
        }
        $md5_str = md5_file($_FILES['Filedata']['tmp_name']);
        $image_url = UPLOAD_FILE_PATH.substr($md5_str,0,2).'/';
        $config['file_name'] = $md5_str.'.'.getPicExt($_FILES['Filedata']['name']);
        $config['upload_path'] = $image_url;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        if($type==2){
            $config['max_size'] = '100';
        }else{
            $config['max_size'] = '1024';
        } 
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        $this->checkDir($config['upload_path']);
        $return = $this->checkWidthHeight($_FILES['Filedata']['tmp_name'],$width,$type);
        if($return['error_code']==1){
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] = $return['error_msg'];
            echo json_encode($arr_return);exit;
        }

        if ($this->upload->do_upload('Filedata')) {
            if($type==1){
                $thumb = '726';
            }elseif($type==2){
                $thumb = '748';
            }
            $upload_data = $this->upload->data();
            $this->cutPic($config['upload_path'].$upload_data['file_name'],true,$thumb);
        
            $this->setPic($config['upload_path'].$upload_data['file_name'],$config['upload_path'],$type);
            $this->cropPic($config['upload_path'].$upload_data['raw_name'].'_thumb.'.getPicExt($upload_data['file_name']));
            
            $inData = array(
                'sale_id' => $id,
                'type' => $type,
                'img_url' => $upload_data['file_name'],
                'img_title' => getPicName($upload_data['client_name']),
                'img_size' => $upload_data['file_size'],
                'is_first' => 0,
            );
            $this->uppic->db->insert('product_pic', $inData);
            $insid = $this->uppic->db->insert_id();
            $arr_return['id'] = $insid;
            $arr_return['url'] = substr($upload_data['file_name'],0,2).'/'.$upload_data['file_name'];
            $arr_return['type'] = $type;
            $arr_return['title'] = getPicName($upload_data['client_name']);
            $arr_return['size'] = $upload_data['file_size'];
            //同步数据到API缓存
            $product_sale = $this->uppic->db->select('lm_status')->where('sale_id',$id)->get('product_sale')->row_array();
            if($product_sale['lm_status']==1){
                $this->api_service->cacheProductSale($id);
            }
        }else{
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] =  $this->upload->display_errors();
        }
        echo json_encode($arr_return);exit;
    }


    /*
    *   TEST
    */
    function index()
    {   
        $this->load->view('upload/view');
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

    /**
     * @return string
     * 取时间戳md5前2位为目录
     */
    private function makeTimeStamp(){
        list($t1, $t2) = explode(' ', microtime());
        $time_stamp = (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
        return $time_stamp;
    }

    /**
     * @param $path
     * @param int $width
     * @param int $type
     * @return array
     */
    private function checkWidthHeight($path,$width=0,$type=0){
        $img_info = getimagesize($path);
        if($width>0){
            if($img_info[0] < $width){
                return array('error_code'=>1,'error_msg'=>'请上传宽度大于'.$width.'的图片');
            }
            if($type == 1){
                if($img_info[0]/$img_info[1]!=1.5){
                    return array('error_code'=>1,'error_msg'=>'请上传宽高比3:2的图片');
                }
            }else if($type == 2){
                if($img_info[0]/$img_info[1]!=1.7){
                    return array('error_code'=>1,'error_msg'=>'请上传宽高比等于1.7的图片');
                }
            }
        }
        return $arr_return = array('error_code'=>0,'error_msg'=>'OK');
    }

    //图片处理缩放宽度
    private function cutPic($file,$is_thumb=false,$width){
        $img_info = getimagesize($file);
        $config['image_library'] = 'gd2';
        $config['source_image'] = $file;
        $config['quality'] = 100;
        if($is_thumb == true){
            $config['create_thumb'] = TRUE;
            $config['thumb_marker'] = '_'.$width;
        }
        $config['maintain_ratio'] = TRUE;
        $config['width']    = $width;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    //图片裁剪
    private function cropPic($file){
        $this->load->library('image_lib');
        list($width,$height) = getimagesize($file);
        $config['image_library'] = 'gd2';
        $config['source_image'] = $file;
        $config['width'] = 276;
        $config['height'] = 276;
        $config['quality'] = 100;
        $config['maintain_ratio'] = FALSE;
        $config['create_thumb'] = false;
        $config['x_axis'] = floor(($width * 276 / $height - 276)/2);
        $this->image_lib->initialize($config);
        $this->image_lib->crop();
    }

    //缩放图片
    private function setPic($file,$path,$type){
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $file;
        //$config['height']  =  276;
        if($type == 1){
           $config['width']  = 414;
        }else{
           $config['width']  = 469;
        }
        //$config['height']   = 276;
        $config['quality'] = 100;
        $config['maintain_ratio'] = TRUE;
        $config['create_thumb'] = TRUE;
        $config['thumb_marker'] = '_thumb';
        $config['new_image'] = $path;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    function uploadConfirm()
        {
        $arr_return = array('error_code'=>0,'error_msg'=>'ok');
        require_cache(APPPATH.'libraries/QiniuStorage.php');
        $file = $_FILES['file'];
        $allowed = array('jpg','gif','png','bmp','jpeg');
        $type = explode('.',$file['name']);
        $filename = md5(time().'confirm').'.'.$type['1'];
        if(!in_array($type['1'], $allowed)){
            $arr_return['error_code'] = 1;
            $arr_return['error_msg'] = '请上传图片格式';
        }
        if($arr_return['error_code']==0){
            $path = 'http://7xoadw.com2.z0.glb.qiniucdn.com/'.$filename;
            $qiniu = new QiniuStorage;
            $upfile = array(
               'name'=>'file',
               'fileName'=>$filename,
               'fileBody'=>file_get_contents($file['tmp_name'])
            );
            $config = array();
            $result = $qiniu->upload($config,$upfile);
            if($result){
                $arr_return['url'] = $path;
            }
        }
        //header('content-type:application/json');
        echo json_encode($arr_return);exit;
    }
}