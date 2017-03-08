<?php 

class Api_service{
	public function __construct(){
	}

	private function do_post($params){
		$filed = '';
		foreach ($params as $key => $value) {
			$filed .= $key.'='.$value.'&';
		}
		$filed = rtrim($filed,'&');
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,API_SERVICE_HOST);
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$filed);	
		$result = curl_exec($ch);
		curl_close($ch);
		if( ! $result)
		{
			log_message("DEBUG",__FILE__.",".__LINE__.",从APISERVICE获取不到数据");
		}
		return $result;
	}

	/**
	 * 缓存用户数据，即REDIS键值为USER:USER_ID的数据
	 * @param $user_id
	 * @return result
	 */
	public function cacheUser($user_id){
		$params = ['user_id'=>$user_id,
			       'method'=>'User.cacheUser'];
		return $this->do_post($params);
	}

	/**
	 * 缓存SKU_SALE,即REDIS键值为PRODUCT:DETAIL的数据
	 * @param $sku_sale_id
	 * @return result
	 */
	public function cacheSkuSale($sku_sale_id)
	{
		$params = ['sku_sale_id'=>$sku_sale_id,
			'method'=>'Sku_sale.onShelf'];
		return $this->do_post($params);
		//var_dump($params);
		//echo("do_post res is:".$res."<br>");
	}

	/**
	 * 缓存SKU_SALE_PRICE,即REDIS键值为SKU:DETAIL的数据
	 * @param $sku_sale_id
	 * @return result
	 */
	public function cacheSkuSalePrice($sku_sale_id)
	{
		$params = ['sku_sale_id'=>$sku_sale_id,
			'method'=>'Sku_sale.cacheSkuSalePrice'];
		return $this->do_post($params);
	}

	/**
	 * 缓存SKU_SALE,即REDIS键值为PRODUCT:DETAIL的HASH数据
	 * @param $sale_id
	 * @return result
	 */
	public function cacheProductSale($sale_id)
	{
		$params = ['sale_id'=>$sale_id,
			'method'=>'Product_sale.cacheProductSale'];
		return $this->do_post($params);
	}

	/**
	 * 缓存或更新主题列表
	 * 包括键值有：
	 * SPECIAL:TOPIC:PRODUCT:LIST:CATE_ID
	 * CITY:PRODUCT:LIST:CITY_ID
	 * DESCTINATION
	 */
	public function cacheDestination()
	{
		$params = ['method'=>'Product_sale.cacheProductSale'];
		return $this->do_post($params);
	}

	/**
	 * 修改销售数量
	 * @param $order_item_id
	 * @return mixed
	 */
	public function updateSaleAmount($order_item_id)
	{
		$params = ['order_item_id'=>$order_item_id,
			'method'=>'Product_sale.updateSaleAmount'];
		return $this->do_post($params);
	}


	/**
	 * service端暂未实现，2016-02-27 15:52:00
	 */
	public function cacheUserOrder($user_id)
	{
		$params = ['user_id'=>$user_id,
			'method'=>'Order.cacheUserOrder'];
		$this->do_post($params);
	}

	/**
	 * service端暂未实现，2016-02-27 15:52:00
	 */
	public function cacheHomePage()
	{
		$params = [
			'method'=>'Homepage.cacheHomePage'];
		return $this->do_post($params);
	}

	/**
	 * service端暂未实现，2016-02-27 15:52:00
	 */
	public function cacheHomePageProduct()
	{
		$params = [
			'method'=>'Homepage.cacheHomePageProduct'];
		return $this->do_post($params);
	}

	public function createOrder($order_item_list,$shop_cart_id_list,$user_id,$coupon_id,$order_id){
		$params = ['method'=>'Order.createOrder',
					'order_item_list'=>json_encode($order_item_list),
					'shop_cart_id_list'=>json_encode($shop_cart_id_list),
					'user_id'=>$user_id,
					'coupon_id'=>$coupon_id,
					'order_id'=>$order_id];
		return $this->do_post($params);
	}


	/**
	 * [refreshShopCart 更新购物车]
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public function refreshShopCart($user_id){
		$params = ['method'=>'User.refreshShopCart','user_id'=>$user_id];
		return $this->do_post($params);
	}


	public function refreshCouponCache($user_id){
		$params = ['method'=>'User.refreshCouponCache','user_id'=>$user_id];
		return $this->do_post($params);
	}

}