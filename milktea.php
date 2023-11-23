<?php
session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
include_once("db.php")
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Bubble CTea</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style>
		.product_image {
			height: 320px;
		}

		.product_name {
			height: 80px;
			padding-left: 20px;
			padding-right: 20px;
		}

		.product_footer {
			padding-left: 50px;
			padding-right: 50px;
		}

		footer {
			background: black;
			padding: 20px;
		}

		footer p {
			color: #fff;
		}
	</style>
</head>

<body>
	<div>
		<nav class="navbar navbar-default" style="background-color: black;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" style="color: white;" href="homepage.php">Bubble Ctea</a>
					<a class="navbar-brand" style="color: white;" href="homepage.php">Home</a>
					<a class="navbar-brand" style="color: white;" href="product.php">Product</a>
					<a class="navbar-brand" style="color: white;" href="about.php">About</a>
					<a class="navbar-brand" style="color: white;" href="login.php">Login</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<!-- left nav here -->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="view_cart.php" style="color: black;"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
		</ul>
	</div>
	<?php

	$sql = "SELECT * FROM tbl_food where category_id='12'";
	$query = $con->query($sql);
	$inc = 4;
	while ($row = $query->fetch_assoc()) {
		$inc = ($inc == 4) ? 1 : $inc + 1;
		if ($inc == 1) echo "<div class='row text-center'>";
	?>
		<div class="col-sm-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row product_image">
						<img src="admin/<?php echo $row['image_name'] ?>" width="60%" height="100%">
					</div>
					<div class="row product_name">
						<h4><?php echo $row['title']; ?></h4>
					</div>
					<div>
						<p class="pull-left"><b><?php echo $row['price']; ?></b></p>
						<span class="pull-right"><a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	if ($inc == 1) echo "<div></div><div></div><div></div></div>";
	if ($inc == 2) echo "<div></div><div></div></div>";
	if ($inc == 3) echo "<div></div></div>";
	?>
	</div>
	<footer class="text-center">
		<p>Copyright &copy; 2023 All rights reserved</p>
	</footer>
</body>

</html>