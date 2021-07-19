<?php 
if (isset($_COOKIE['user'])) 
{
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
		<h3 class="text-primary">Add Product</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-1"></div>
		<div class="col-md-11">
			
				<form method="POST" class="form-inline" action="add_query.php" enctype="multipart/form-data">
                    <label for="product">Product</label>
					<input type="text" class="form-control" name="product" required/>
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" required/>
                    <input type="file" class="" name="fileToUpload" id="fileToUpload" style="margin:1%">
					<button class="btn btn-primary form-control" name="add">Add Product</button>
				</form>
			
		</div>
        </div>
</body>
</html>   
<?php 
}else {
	header('location:index.php');
}
?>     