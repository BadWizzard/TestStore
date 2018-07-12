<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "fd9ef66e747ba28b32924030a21a7ba8";
$scopes = "read_orders,write_orders,read_draft_orders,write_draft_orders,read_products,write_products,read_product_listings,read_customers,write_customers,read_inventory,write_inventory,read_fulfillments,write_fulfillments,read_users,write_users,read_checkouts,write_checkouts,read_reports,write_reports,read_shopify_payments_payouts,read_resource_feedbacks,write_resource_feedbacks";
$redirect_uri = "https://testmystore.herokuapp.com/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();