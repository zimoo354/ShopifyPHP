<?php

include 'WPShopifier.php';

$wps = new WPShopifier(
	$url, // Your shopify Store URL goes here
	$apikey, // Your Private App Api Key goes here
	$psw // Your Private App Password goes here
);

function products() {
	global $wps;
	$wps->curl('products.json');
}

products();


?>