<?php 
if (isset($_COOKIE['user'])) 
{
?>
<?php 
require_once 'conn.php';
	
if($_GET['product_id'] != ""){
    $product_id = $_GET['product_id'];
    $query = $conn->query("SELECT * FROM `products`  WHERE product_id='$product_id'");
    while($fetch = $query->fetch_array()){
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
        <a class="navbar-brand col-sm-3" href="products.php">Market Place</a>
        <a class="navbar-brand col-sm-3" href="dashboard.php">Dash Board</a>
        <a class="navbar-brand col-sm-3" href="my_products.php">My Products</a>
        <a class="navbar-brand col-sm-2" href="create_products.php">Add Product</a>
        <a class="navbar-brand col-sm-1" href="index.php?logout=logout">Log Out</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Update Product</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-1"></div>
		<div class="col-md-11">
			
				<form method="POST" class="form-inline" action="update_product2.php" enctype="multipart/form-data">
                    <label for="product">Product</label>
					<input type="text" class="form-control" name="product" value="<?php echo $fetch['product_name']?>" required/>
                    <label for="price">Price</label>
                    <input type="number" class="form-control" value="<?php echo $fetch['price']?>" name="price" required/>
                    <input type="file" class="" name="fileToUpload" value="<?php echo $fetch['image']?>" id="fileToUpload" style="margin:1%">
					<input type="hidden" name="product_id" value="<?php echo $product_id ?>">
					<button class="btn btn-primary form-control" name="update">Update Product</button>
				</form>
			
		</div>
        </div>
</body>
<?php 
}
?>
</html>        
<?php 
}
?>
<?php 
}else {
	header('location:index.php');
}
?>