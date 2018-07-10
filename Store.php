<?php

define('SHOPIFY_STOREFRONT_TOKEN', '36c8229ef4432e67f27daf14035e721a');
define('SHOPIFY_PUPLIC_TOKEN', 'd9b6b6ad1f87029a124868c238fa81ac');
define('SHOPIFY_PRIVATE_TOKEN', '1e50e3112d951fbedf0b3ce261ff567e');

class Store
{
	var $store;
	var $url;
	var $json;

	public function __construct($store = 'shopify')
	{
		$this->store = $store;
		if($this->store == 'shopify') {
			$this->url = "https://".SHOPIFY_PUPLIC_TOKEN.":".SHOPIFY_PRIVATE_TOKEN."@testsexshop.myshopify.com/admin/";
			//https://testsexshop.myshopify.com/admin/products.json?X-Shopify-Storefront-Access-Token=36c8229ef4432e67f27daf14035e721a&product_type=underwear
		} else {
			$this->url = "";
		}
	}

	function get_all_items()
	{
		if ($this->store == 'shopify') {

		} else {

		}
	}
	function get_items_by_tag_an_type()
	{
		$url = "products.json?";
		if(isset($_GET['product_type']) && $_GET['product_type']) {
			$url .= 'product_type='.$_GET['product_type'];
		}
		if(isset($_GET['tag']) && $_GET['tag']) {
			$url .= '&tag='.$_GET['tag'];
		}
		$items = [];
		if ($this->store == 'shopify') {
			$items_curl = $this->get_curl($url);
			foreach ($items_curl['products'] as $item) {
				$items[] = $item;
			}
		} else {

		}
		return $items;
	}
	function get_categories()
	{
		$categories = [];
		$categories = [
			'product_type' => [
				'underwear'
			],
			'tag' => [
				'cotton',
				'vintage'
			]
		];
		/*if ($this->store == 'shopify') {
			$items_curl = $this->get_curl($url);
			foreach ($items_curl['products'] as $item) {
				$items[] = $item;
			}
		} else {

		}*/
		return $categories;
	}
	function get_items_by_type($type)
	{
		$items = [];
		if ($this->store == 'shopify') {
			$items_curl = $this->get_curl("products.json?product_type=".$type);
			foreach ($items_curl['products'] as $item) {
				$items[] = $item;
			}
		} else {

		}
		return $items;
	}

	function get_items_by_tag($tag)
	{
		$items = [];
		if ($this->store == 'shopify') {
			$items_curl = $this->get_curl("products.json?tag=".$tag);
			foreach ($items_curl['products'] as $item) {
				$items[] = $item;
			}
		} else {

		}
		return $items;
	}

	function make_order($variant_id)
	{
		$order = '';
		if ($this->store == 'shopify') {
			$post_fields = "{\r\n  \"order\": {\r\n    \"line_items\": [\r\n      {\r\n        \"variant_id\": ".$variant_id.",\r\n        \"quantity\": 1\r\n      }\r\n    ]\r\n  }\r\n}";
			$headers = ["content-type: application/json;charset=utf-8"];
			$order = $this->get_curl('orders.json', 'POST', $post_fields, $headers);
		} else {

		}
		return $order;
	}

	function get_orders()
	{
		$orders = '';
		if ($this->store == 'shopify') {
			$orders = $this->get_curl('orders.json');
		} else {

		}
		return $orders;
	}

	function get_curl($url, $method = 'GET', $post_fields = [], $headers = [])
	{
		$curl = curl_init();
		$headers[] = "cache-control: no-cache";
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->url.$url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_POSTFIELDS => $post_fields,
			CURLOPT_HTTPHEADER => $headers,
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err; exit;
		} else {
			$this->json = json_decode($response, true);
			return $this->json;
		}
	}
}
