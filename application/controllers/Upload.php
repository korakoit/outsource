<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends MY_Controller {
	
	/**
	 * @desc 默认上传
	 * @param
	 */
	public function uploadAppImage(){
		$config ['upload_path'] 	= UPLOAD_IMG_PATH;
		$config ['allowed_types'] 	= 'gif|jpg|png';
		$config ['max_size'] 		= '51200';
		$config ['encrypt_name'] 	= TRUE;

		//保存上传的文件
		$upload_result = $this->saveFileBatch('file');

		//如果文件未上传成功
		if (! $upload_result) {
			$result['error_code'] = '2005';
			$result['error_msg'] = $this->error_code['2005'];
			$this->dealWithOutput($result);
			exit();
		}

		if($upload_result)
		{
			$path = [];
			foreach($upload_result as $ku=>$vu) {
				//生成缩略图
				$fileName = $vu['file_name'];
				$image_file = $this->getPathByFileName($fileName) . $fileName;
				$image = $this->resizeImage($image_file);
				//取图片访问URL
				$path[] .= $this->getUrlByFileName($fileName);
			}
		}

		if(isset($path) AND count($path) > 0) {
			//$thumb = $this->getThumbFileName($upload_result['file_name']);
			//$path = $this->getUrlByFileName($thumb);
			$result = ['error_code' => '0000',
				'error_msg' => $this->error_code['0000'],
				'path' => $path];
			$this->dealWithOutput($result);
		}else{
			log_message("DEBUG","生成缩略图错误");
		}
	}

	/**
	 * 处理zebra_image的错误
	 * @param $image
	 */
	private function dealZebraError($image)
	{
		if($image)
		{
			switch ($image->error) {
				case 1:
					$err_msg =  'Source file could not be found!';
					break;
				case 2:
					$err_msg =  'Source file is not readable!';
					break;
				case 3:
					$err_msg =  'Could not write target file!';
					break;
				case 4:
					$err_msg =  'Unsupported source file format!';
					break;
				case 5:
					$err_msg =  'Unsupported target file format!';
					break;
				case 6:
					$err_msg =  'GD library version does not support target file format!';
					break;
				case 7:
					$err_msg =  'GD library is not installed!';
					break;
			}
			$result['error_code'] = '2005';
			$result['error_msg'] = $this->error_code['2005'].",error:".$err_msg;
			$this->dealWithOutput($result);
		}
	}
	/**
	 * 根据上传的文件名获取图片URL
	 * @param $fileName
	 * @return mixed
	 */
	public function getUrlByFileName($fileName)
	{
		return "http://".IMAGE_HOST."/".substr($fileName, 0, 2)."/".$fileName;;
	}
	/**
	 * 传入图片路径进行图片的裁切
	 * @param $path
	 * @param string $width
	 * @param string $height
	 * @return bool
	 */
	private function resizeImage($path,$width="152",$height="152")
	{
		if( ! is_file($path))
		{
			log_message("DEBUG","传入的需裁切图路径不正确：".$path);
			return FALSE;
		}
		$this->load->library ('Zebra_Image');
		$image = new Zebra_Image();
		// indicate a source image
		$image->source_path = $path;
		//indicate jpeg quality
		$image->jpeg_quality = 100;
		//indicate png compression,low compression means big file output
		$image->png_compression = 0;
		$thumb_file = $this->getThumbFileName($path);
		// indicate a target image
		$image->target_path = $this->getFilePathByFileName($thumb_file);
		$image->resize($width, $height, ZEBRA_IMAGE_CROP_CENTER);
		return $image;
	}
	/**
	 * 根据传入路径或图片名获取缩略图名，OK
	 * @param $path
	 * @return string
	 */
	private function getThumbFileName($path,$thumb_ext="_thumb")
	{
		//get the ext name
		$ext = substr($path, strrpos($path, '.') + 1);
		//get the file name
		$base_name = basename($path);
		$base_name = substr($base_name,0,strpos($base_name,'.'));
		//calc the thumb image path
		$thumb_file = $base_name.$thumb_ext.".".$ext;
		return $thumb_file;
	}
	/**
	 * 根据文件名获取文件全路径
	 * @param $file_name
	 * @return string
	 */
	private function getFilePathByFileName($file_name)
	{
		return $this->getPathByFileName($file_name).$file_name;
	}
	/**
	 * 根据文件名获取文件夹路径
	 * @param $file_name
	 * @return string
	 */
	private function getPathByFileName($file_name)
	{
		return UPLOAD_IMG_PATH.substr($file_name,0,2)."/";
	}
	/**
	 * 保存$_FILES里的上传的一个图片
	 * @param $upload_file_name
	 * @return array|bool|string
	 */
	public function saveFile($upload_file_name){
		$name = FALSE;
		$tmp_file = isset($_FILES[$upload_file_name])?$_FILES[$upload_file_name]:FALSE;
		if( ! $tmp_file){
			log_message("ERROR","上传文件时并未指定图片或传入file参数：");
			return FALSE;
		}
		//按规则生成文件名，文件夹名
		$file_name = md5_file($tmp_file['tmp_name']).substr($tmp_file['name'],strpos($tmp_file['name'],'.'));
		$path = substr($file_name, 0, 2).'/';
		//若目录不存在则创建
		if( ! is_dir(UPLOAD_IMG_PATH.$path))
		{
			chmod(UPLOAD_IMG_PATH, 0777);
			mkdir(iconv("UTF-8", "GBK", UPLOAD_IMG_PATH.$path),0777,true);
		}
		$path = $path.$file_name;
		//移动文件
		if ( ! @copy($tmp_file['tmp_name'], UPLOAD_IMG_PATH.$path)){
			if ( ! @move_uploaded_file($tmp_file['tmp_name'], UPLOAD_IMG_PATH.$path))
			{
				log_message("ERROR","无法写入文件：".UPLOAD_IMG_PATH.$path);
				return FALSE;
			}else{
				$name = $file_name;
			}
		}else{
			$name = ['file_name'=>$file_name,
				'file_path'=>UPLOAD_IMG_PATH.substr($tmp_file['name'], 0, 2).'/'];
		}
		return $name;
	}

	/**
	 * 保存$_FILES里的上传的一个图片
	 * @param $upload_file_name
	 * @return array|bool|string
	 */
	public function saveFileBatch($upload_file_name){
		$name = FALSE;
		$tmp_file = isset($_FILES[$upload_file_name])?$_FILES[$upload_file_name]:FALSE;
		if( ! $tmp_file){
			log_message("ERROR","上传文件时并未指定图片或传入file参数：");
			return FALSE;
		}
		for($i=0;$i<count($tmp_file['tmp_name']);$i++) {
			//按规则生成文件名，文件夹名
			$file_name = md5_file($tmp_file['tmp_name'][$i]) . substr($tmp_file['name'][$i], strpos($tmp_file['name'][$i], '.'));
			$path = substr($file_name, 0, 2) . '/';
			//若目录不存在则创建
			$full_path = iconv("UTF-8", "GBK", UPLOAD_IMG_PATH . $path);
			if (!is_dir($full_path)){
				mkdir($full_path,0777,true);
				chmod($full_path, 0777);
			}
			$path = $path . $file_name;
			//移动文件
			if (!@copy($tmp_file['tmp_name'][$i], UPLOAD_IMG_PATH . $path)) {
				if (!@move_uploaded_file($tmp_file['tmp_name'][$i], UPLOAD_IMG_PATH . $path)) {
					log_message("ERROR", "无法写入文件：" . UPLOAD_IMG_PATH . $path);
					return FALSE;
				} else {
					$name[] = ['file_name' => $file_name,
						'file_path' => UPLOAD_IMG_PATH . substr($file_name, 0, 2) . '/'];
				}
			} else {
				$name[] = ['file_name' => $file_name,
					'file_path' => UPLOAD_IMG_PATH . substr($tmp_file['name'][$i], 0, 2) . '/'];
			}
		}
		return $name;
	}

	///////////////////////////////////////////////////////////////////////////////////////

	public function uploadAppImageBatch(){
		$this->validate_token();
	}

    private function cropPic($file){
	        $this->load->library('image_lib');
	        list($width,$height) = getimagesize($file);
	        $config['image_library'] = 'gd2';
	        $config['source_image'] = $file;
	        $config['width'] = 228;
	        $config['height'] = 2;
	        $config['quality'] = 100;
	        $config['maintain_ratio'] = FALSE;
	        $config['create_thumb'] = false;
	        $config['x_axis'] = floor(($width * 276 / $height - 276)/2);
	        $this->image_lib->initialize($config);
	        $this->image_lib->crop();
    }
    //缩放图片
    private function setPic($file,$path,$height,$width){
	        $config['image_library'] = 'gd2';
	        $config['source_image'] = $file;
	        $config['quality'] = 100;
	        $config['maintain_ratio'] = TRUE;
	        if($height>$width){
	        	$config['width'] = 228;
	        }else{
	        	$config['height'] = 228;
	        }
	        $config['create_thumb'] = TRUE;
	        $config['new_image'] = $path;
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();
    }

}
/* End of file upload.php */
/* Location: ./application/controllers/upload.php */