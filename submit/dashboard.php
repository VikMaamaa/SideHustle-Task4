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
        <a class="bg-dark navbar-brand col-sm-3 " href="dashboard.php">Dash Board</a>
        <a class="navbar-brand col-sm-3" href="my_products.php">My Products</a>
        <a class="navbar-brand col-sm-2" href="create_products.php">Add Product</a>
        <a class="navbar-brand col-sm-1" href="index.php?logout=logout">Log Out</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Dash Board</h3>
		
		<table class="table">
			<tbody>
				<?php
                    require 'conn.php';
                    $user =  $_COOKIE['user'];
					$query = $conn->query("SELECT * FROM `users`  WHERE username='$user' ");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><h3>My Username: </h3><?php echo $fetch['username']?></td>
					<!-- <td><?php echo $fetch['email']?></td> -->
                    <td><h3>My Email: </h3><?php echo $fetch['email']?></td>
                    <!-- <td><img class="img-responsive" src="<?php echo $fetch['image'] ?>" alt="<?php echo $fetch['product_name']?>"></td>d -->
				</tr>
				<form method="POST" class="form-inline" action="reset.php" >
                    <label for="product">Email</label>
					<input type="text" class="form-control" name="email" required/>
                    <label for="price">Password</label>
                    <input type="text" class="form-control" name="password" required/>
                    <!-- <input type="file" class="" name="fileToUpload" id="fileToUpload" style="margin:1%"> -->
					<button class="btn btn-primary form-control" name="reset">Reset</button>
				</form>
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