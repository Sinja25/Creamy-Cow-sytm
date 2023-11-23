<?php
include("include/navbar.php");
prod_list();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
//unset qunatity
unset($_SESSION['qty_array']);
include_once("db.php");
// echo ;
if (!isset($_GET['category'])) {
	header("Location:product.php");
}
$categ_id = $_GET['category'];

?>
<?php include('include/cart-count.php') ?>
<?php

$sql = "SELECT a.*,b.title as categ
		FROM tbl_food as a
		LEFT JOIN tbl_category as b
		ON a.category_id = b.id
		 where a.category_id='$categ_id'";
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