<?php
include_once("include/navbar.php");
Products();
?>
<?php
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
<?php require('db.php');
$select="SELECT * FROM tbl_category";

$result = $con->query($select);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { ?>
<div class ="picture">
  <img src ="coffee.jpg" style="border-radius:50%;">
    <div class ="desc"><a href="prod-list.php?category=<?php echo $row['id']?>"><?php echo $row['title']?></a></div>
</div>
<?php } }?>
</body>
</html>
