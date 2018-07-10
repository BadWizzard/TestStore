<?php
require_once 'Store.php';

$shop_type = isset($_GET['shop']) || $_GET['shop'] ? $_GET['shop'] : 'shopify';
$store = new Store($shop_type);
$order = $store->make_order($_GET['variant_id']);
$orders = $store->get_orders();
?>
<pre>
	<? var_dump($order)?>
</pre>

Orders
<pre>
	<? var_dump($orders)?>
</pre>
