<?php
require_once 'Store.php';

$shop_type = isset($_GET['shop']) || $_GET['shop'] ? $_GET['shop'] : 'shopify';
$store = new Store($shop_type);
$order = $store->make_order($_GET['variant_id'], 1);
?>
<?php include 'header.php'; ?>
<h1><a href="<?=$order['data']['checkoutCreate']['checkout']['webUrl']?>">Click on this link to finish order</a></h1>
<script>
	console.log(<?php print_r($store->json); ?>);
</script>