<?php
	require_once 'conn.php';
	
	if($_GET['product_id']){
		$product_id = $_GET['product_id'];
		$conn->query("DELETE FROM `products` WHERE `product_id` = $product_id") or die();
		header("location: my_products.php");
	}	
?>