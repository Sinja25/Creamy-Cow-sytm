<?php include 'include/nav.php';

//initialize cart if not set or is unset
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}
	//unset qunatity
	unset($_SESSION['qty_array']);
	include_once("db.php");
	// echo ;
	if(!isset($_GET['category'])){
		header("Location:product.php");
	}
	$categ_id=$_GET['category'];

?>
<?php include('include/cart-count.php')?>
<link rel="stylesheet" href="css/new2.css">

<div class="container-fluid">
  <div class="row">
    <div class="col-2 text-center nav2">
        <ul class="navbar-nav">
        <?php 
          $select="SELECT * FROM tbl_category";

          $result = $con->query($select);

          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) { ?>
          <li class="nav-item nav2-item"><a  href="prod-list.php?category=<?php echo $row['id']?>"><?php echo $row['title']?></a></li>
          <?php } 
		  }
          ?>
          
        </ul>
    </div>
    <div class="col-10">
      <div class="row justify-content-center ms-4 mt-10">
      <?php
    $sql = "SELECT a.*,b.title as categ
    FROM tbl_food as a
    LEFT JOIN tbl_category as b
    ON a.category_id = b.id
	where a.category_id='$categ_id'";
    $query = $con->query($sql);
	  if ($query->num_rows > 0) {
	
    $inc = 4;
    while($row = $query->fetch_assoc()){
      $inc = ($inc == 4) ? 1 : $inc + 1;
      if($inc == 1)?>
        
       
        <div class="col-lg-3 text-center col-auto card">
          <img src="admin/<?php echo $row['image_name']?>" width="100%" height="250px" alt="">
          <h6 class="text-center ttrow h2 m-1 p-2"><?php echo $row['title']?></h6>
          <?php echo isset($_SESSION['id']) ? '<a href="add_cart.php?id='.$row['id'].'" class="btn-order btn-none text-decoration-none text-dark"><span class="glyphicon glyphicon-plus"></span> Add to cart</a>' : '<a href="registration.php" class="btn-order btn-none text-decoration-none text-dark"><span class="glyphicon glyphicon-plus"></span> Add to cart</a>' ?>
        </div>
        </div>
      <?php
       }}else{
		echo '<p class="mt-3 text-center text-danger">No items</p>';
	  }
  ?>
    
    </div>
  </div>
</div>
<?php include 'include/footer.php';?>

