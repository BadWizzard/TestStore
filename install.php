<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "fd9ef66e747ba28b32924030a21a7ba8";
$scopes = "read_orders,write_products";
$redirect_uri = "https://testmystore.herokuapp.com/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();