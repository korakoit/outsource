<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *@package helper
 */
if ( ! function_exists('create_pagination')){
	function create_pagination($config){
		if(isset($config['search']) && is_array($config['search']) && !empty($config['search'])){
			$queryStr = "";
			foreach ($config['search'] as $key => $v){
				if(is_array($v) && !empty($v)){
					foreach($v as $i){
						if($i != '' && $i != NULL && $i !=null ){
							$queryStr .= $key . '[]=' . $i ."&";
						}
					}
				}else{
					if($v != '' && $v != NULL && $v !=null ){
						$queryStr .= $key . '=' . $v ."&";
					}
				}
			}
			$queryStr = trim($queryStr,"&");
			$config['base_url'] = trim($config['base_url'], "?"). "?" .$queryStr;
		}
		
		$pagination = &load_class("Pagination");
		//全页
		$html['full_tag_open'] = "<ul>";
		$html['full_tag_close'] = "</ul>";
		//数字页面
		$html['num_tag_open'] = "<li>";
		$html['num_tag_close'] = "</li>";
		//第一页
		$html['first_link']   = "第一页";
		$html['first_tag_open'] = "<li>";
		$html['first_tag_close'] = "</li>";
		//最后一页
		$html['last_link']    = "最后一页";
		$html['last_tag_open'] = "<li>";
		$html['last_tag_close'] = "</li>";
		//前一页
		$html['prev_tag_open']   ="<li>";
		$html['prev_tag_close']   ="</li>";
		//后一页
		$html['next_tag_open']   ="<li>";
		$html['next_tag_close']   ="</li>";
		//当前页
		$html['cur_tag_open'] = "<li  class=\"active\"><a href=\"javascript:void(0)\">";
		$html['cur_tag_close'] = "</a></li>";
		$html['use_page_numbers'] = TRUE;
		$config = array_merge($html,$config);
		$pagination->initialize($config);
		return $pagination->create_links();
	}
}