<?php
require_once 'Store.php';

$shop_type = isset($_GET['shop']) || $_GET['shop'] ? $_GET['shop'] : 'shopify';
$store = new Store($shop_type);
$order = $store->make_order($_GET['variant_id']);
$orders = $store->get_orders();
?>
<pre>
	<?php print_r($order)?>
</pre>

Orders
<pre>
	<?php print_r($orders)?>
</pre>
