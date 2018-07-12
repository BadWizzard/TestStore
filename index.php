<?php include 'header.php'; ?>

	<p class="text-center">
		<a href="/index.php?page=list&shop=shopify" class="btn btn-primary" role="button">Shopify Store</a>
		<a href="/index.php?page=list&shop=ecwid" class="btn btn-default" role="button">Ecwid Store</a>
	</p>

<?php
if (isset($_GET['page'])) {
	include $_GET['page'] . '.php';
}
$api_key = "fd9ef66e747ba28b32924030a21a7ba8";
$shared_secret = "d58d169635887ce098f88fed71b08f83";
$params = [
	'code' => 'fed726bec45e218718bcf1de421fcb68',
	'shop' => 'testsexshop.myshopify.com'
];
// Set variables for our request
$query = array(
	"client_id" => $api_key, // Your API key
	"client_secret" => $shared_secret, // Your app credentials (secret key)
	"code" => $params['code'] // Grab the access key from the URL
);

// Generate access token URL
$access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";

// Configure curl client and execute request
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $access_token_url);
curl_setopt($ch, CURLOPT_POST, count($query));
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
$result = curl_exec($ch);
curl_close($ch);

// Store the access token
$result = json_decode($result, true);
$access_token = $result['access_token'];
echo $access_token;
?><!--Product Browser-->
	<!--<div id="my-store-14321398"></div>
	<div>
		<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?14321398&data_platform=code&data_date=2018-07-07" charset="utf-8"></script><script type="text/javascript"> xProductBrowser("categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list","id=my-store-14321398");</script>
	</div>-->
	<!--Categories-->
	<!--<div id="my-categories-14321398"></div>
	<div>
		<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?14321398&data_platform=code&data_date=2018-07-07" charset="utf-8"></script>
		<script type="text/javascript"> xCategoriesV2("id=my-categories-14321398"); </script>
	</div>-->
	<!--Mini Cart-->
	<!--<div class="ec-cart-widget"></div>
	<div>
		<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?14321398&data_platform=code&data_date=2018-07-07" charset="utf-8"></script>
		<script type="text/javascript">Ecwid.init();</script>
	</div>-->
	<!--Search Box-->
	<!--<div id="my-search-14321398"></div>
	<div>
		<script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?14321398&data_platform=code&data_date=2018-07-07" charset="utf-8"></script>
		<script type="text/javascript"> xSearch("id=my-search-14321398"); </script>
	</div>-->
<?php

/*$shopify = new Store('shopify');
echo $shopify->get_categories();*/
/*https://testsexshop.myshopify.com/admin/products/1174840574067
/admin/products.json*/

/*// create curl resource
	   $ch = curl_init();

	   // set url
	   curl_setopt($ch, CURLOPT_URL, "https://testsexshop.myshopify.com/admin/shop.json");

	   //return the transfer as a string
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	   // $output contains the output string
	   $output = curl_exec($ch);
var_dump($output);
	   // close curl resource to free up system resources
	   curl_close($ch);*/

// create curl resource
/*$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "https://app.ecwid.com/api/v3/api/v3/4870020/categories?hidden_categories=true&token=123abcd");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);
var_dump($output);
// close curl resource to free up system resources
curl_close($ch);*/

/*$ch = curl_init();*/
?>

<?php include 'footer.php'; ?>