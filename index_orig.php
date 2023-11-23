<?php
// session_start();

?>
<?php include_once("include/navbar.php");
about();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
include_once("db.php");
if (isset($_SESSION['message'])) {
?>
	<div class="alert alert-info text-center">
		<?php echo $_SESSION['message']; ?>
	</div>
<?php
	unset($_SESSION['message']);
}

?>

<?php include_once("include/cart-count.php") ?>
<?php

$sql = "SELECT * FROM tbl_food";
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
					<img src="admin/<?php echo $row['image_name'] ?>" width="60%" height="40%">
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