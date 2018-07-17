<?php
require_once 'Store.php';

$shop_type = isset($_GET['shop']) || $_GET['shop'] ? $_GET['shop'] : 'shopify';
$store = new Store($shop_type);
//$_GET['variant_id']
$order = $store->make_order($_GET['variant_id'], 1);
//$orders = $store->get_orders();
?>

<h1><a href="<?=$order['data']['checkoutCreate']['checkout']['webUrl']?>">Click on this link to finish order</a></h1>
<h2>Order Status</h2>
<pre>
	<?php print_r($order)?>
</pre>

<h2>Orders</h2>
<pre>
	<?php //print_r($orders)?>
</pre>