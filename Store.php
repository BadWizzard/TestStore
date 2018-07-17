<?php

define('SHOPIFY_STOREFRONT_TOKEN', '36c8229ef4432e67f27daf14035e721a');
define('SHOPIFY_PUPLIC_TOKEN', 'd9b6b6ad1f87029a124868c238fa81ac');
define('SHOPIFY_PRIVATE_TOKEN', '1e50e3112d951fbedf0b3ce261ff567e');
define('SHOPIFY_STORE', 'testsexshop');

class Store
{
	var $store;
	var $url;
	var $json;

	public function __construct($store = 'shopify')
	{
		$this->store = $store;
		$this->url = "https://".SHOPIFY_STORE.".myshopify.com/api/graphql";
	}

	function get_all_items()
	{
		$products = [];
		$products_curl = $this->get_curl_shopify([
			'post_fields' => "{
							  shop {
								products(first: 100) {
								  edges {
									node {
									  title,
									  description,
									  priceRange {
									  maxVariantPrice {
										amount,
										currencyCode
									  }
									  },
									  variants(first: 1) {
										edges {
										  node {
											id
										  }
										}
									  }
									}
								  }
								}
							  }
							}"
		]);

		$products_curl = $products_curl['data']['shop']['products']['edges'];
		if($products_curl) {
			foreach ($products_curl as $product) {
				$product = $product['node'];
				$products[] = [
					'title' => $product['title'],
					'price' => $product['priceRange']['maxVariantPrice']['amount'],
					'price_currency' => $product['priceRange']['maxVariantPrice']['currencyCode'],
					'id_variant' => $product['variants']['edges'][0]['node']['id'],
					'description' => $product['description']
				];
			}
		}
		return $products;
	}

	function get_categories()
	{
		$categories = [
			'product_type' => [
				'underwear'
			],
			'tag' => [
				'cotton',
				'vintage'
			]
		];
		return $categories;
	}

	function make_order($variant_id, $quantity = 1)
	{
		$order = $this->get_curl_shopify([
			'post_fields' => 'mutation {
							  checkoutCreate(input: {
								lineItems: [{ variantId: "'.$variant_id.'", quantity: '.$quantity.' }]
							  }) {
								checkout {
								   id
								   webUrl
								   lineItems(first: 100) {
									 edges {
									   node {
										 title
										 quantity
									   }
									 }
								   }
								}
							  }
							}'
		]);
		header('Location: '.$order['data']['checkoutCreate']['checkout']['webUrl']);
		return $order;
	}

	function get_curl_shopify($params)
	{
		if (!isset($params['url'])) {
			$params['url'] = '';
		}
		if (!isset($params['method'])) {
			$params['method'] = 'POST';
		}
		if (!isset($params['post_fields'])) {
			$params['post_fields'] = '';
		}
		if (!isset($params['headers'])) {
			$params['headers'] = [];
		}
		$params['headers'][] = "Content-Type: application/graphql";
		$params['headers'][] = "X-Shopify-Storefront-Access-Token: ".SHOPIFY_STOREFRONT_TOKEN;
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->url . $params['url'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $params['method'],
			CURLOPT_POSTFIELDS => $params['post_fields'],
			CURLOPT_HTTPHEADER => $params['headers'],
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
			exit;
		} else {
			$this->json = $response;
			return json_decode($response, true);
		}
	}
}



/*
{
	shop {
	productByHandle(handle: "First") {
		id
    }
  }
}

{
  shop {
    collections(first: 100) {
      edges {
        node {
          id
          handle
        }
      }
      pageInfo {
        hasNextPage
      }
    }
  }
}

Z2lkOi8vc2hvcGlmeS9Db2xsZWN0aW9uLzU1OTg1NzMzNzQ3

product v1
Z2lkOi8vc2hvcGlmeS9Qcm9kdWN0VmFyaWFudC8xMjA2NzQyNTkxMDg5OQ==

checkout

mutation {
  checkoutCreate(input: {
    lineItems: [{ variantId: "Z2lkOi8vc2hvcGlmeS9Qcm9kdWN0VmFyaWFudC8xMjA2NzQyNTkxMDg5OQ==", quantity: 2 }]
  }) {
    checkout {
       id
       webUrl
       lineItems(first: 5) {
         edges {
           node {
             title
             quantity
           }
         }
       }
    }
  }
}
*/