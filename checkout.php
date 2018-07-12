<?php
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://testsexshop.myshopify.com/admin/checkouts.json",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{\r\n  \"checkout\": {\r\n    \"line_items\": [\r\n      {\r\n        \"variant_id\": 12284932423795,\r\n        \"quantity\": 1\r\n      }\r\n    ]\r\n  }\r\n}",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"content-type: application/json;charset=utf-8",
		"postman-token: 47b8d26f-b0f3-d42c-8d2f-08527a01781b",
		"x-shopify-access-token: fed726bec45e218718bcf1de421fcb68"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	var_dump($response);
}