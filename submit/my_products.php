<?php 
if (!empty($_COOKIE['user'])) 
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
		<h3 class="text-primary">My Products</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		
		<table class="table">
			<tbody>
				<?php
                    require 'conn.php';
                    $user =  $_COOKIE['user'];
					$query = $conn->query("SELECT * FROM `products`  WHERE username='$user' ORDER BY `product_id` ASC");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $count++?></td>
					<td><?php echo $fetch['product_name']?></td>
					<!-- <td><?php echo $fetch['sold']?></td> -->
                    <td><?php echo $fetch['price']?></td>
                    <td><img class="img-responsive" src="<?php echo $fetch['image'] ?>" alt="<?php echo $fetch['product_name']?>"></td>
					<td colspan="2">
						<center>
							<?php
									echo 
									'<a href="update_product.php?product_id='.$fetch['product_id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check">Update</span></a> |';
							?>
							<a href="delete_product.php?product_id=<?php echo $fetch['product_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove">Delete</span></a>
						</center>
					</td>
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