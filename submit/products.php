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
    <table class="table">
			<tbody>
				<?php
                    require 'conn.php';
                    $user =  $_COOKIE['user'];
					$query = $conn->query("SELECT * FROM `products`  ORDER BY `product_id` ASC");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td class="badge"><?php echo $fetch['product_name']?></td>
                    <td class="btn btn-primary"><?php echo $fetch['price']?></td>
                    <td colspan="2"><img class="img-responsive" src="<?php echo $fetch['image'] ?>" alt="<?php echo $fetch['product_name']?>"></td>
					<td class="badge">Seller: <?php echo $fetch['username']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
<?php 
}else {
	header('location:index.php');
}
?>