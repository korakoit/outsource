<?php


class LMapi{

	private function do_post($params){
		$filed = '';
		foreach ($params as $key => $value) {
			$filed .= $key.'='.$value.'&';
		}
		$filed = rtrim($filed,'&');
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$params['url']);
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$filed);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	public function sendOrderItem($order_item_id){
		$param = ['url'=>ADMIN_HOST.'/api/Order/updateOrder',
					'id'=>$order_item_id];
		$this->do_post($param);
	}

}