<?php
include_once("include/nav.php");
error_reporting(0);

// cart();
// echo print_r($_S	ESSION)."<br>";
// echo "<br>".implode(',',$_SESSION['cart']);
// for($i=0; $i<=sizeof($_SESSION['cart']); $i++ )
// {
// echo $_SESSION['qty_array'][0];
// }
// echo sizeof($_SESSION['cart']);
require './includes/pdo_conn.php';
include_once("db.php");
if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
	header("Location:logout.php");
}
if (isset($_SESSION['message'])) {
?>
	<div class="alert alert-info text-center">
		<?php echo $_SESSION['message']; ?>
	</div>
<?php
	unset($_SESSION['message']);
}

// echo $_SESSION['username'];
?>
<?php
// if(isset($_POST['login'])&& isset($_POST['user'])&& isset($_POST['pass'])){

// $username = stripslashes($_REQUEST['user']);    // removes backslashes
// $username = mysqli_real_escape_string($con, $username);
// $password = stripslashes($_REQUEST['pass']);
// $password = mysqli_real_escape_string($con, $password);

// $query = "SELECT * FROM `users` WHERE username='$username'
//              AND password='" . md5($password) . "'";
// $result = mysqli_query($con, $query) or die(mysqli_error($con));
// $rows = mysqli_num_rows($result);
// $row=$result->fetch_assoc();
// if ($rows == 1) {
//     $_SESSION['username'] = $username;
//     $_SESSION['user']=$row['user'];
//     // header("Location: dashboard.php");
// 	echo"sdasdasd";
// 	unset($_SESSION['cart']);
// 	unset($_SESSION['qty_array']);
// 	unset($_SESSION['qty']);
// 	header("Refresh:0");
// } else {
//     error('incorrect password');
// }
// }
?>


<?php
if (isset($_SESSION['user']) && $_SESSION['user'] == '0') {
	include_once("view_order-user.php");
	echo '<a href="index.php" class="btn btn-primary" style="margin-right:2%; position:absolute; right:0;    " ><span class="glyphicon glyphicon-arrow-left"></span>Back</a>';
} else {
	$_SESSION['message'] = "You must login to see orders.";
	header("Location: index.php");
}
?>
</div>
</div>
</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center">Login</h4>
			</div>
			<div class="modal-body">
				<input type="text" name="user" class="form-control" placeholder="Input Username" style="margin-bottom: 2%;" required>
				<input type="password" name="pass" class="form-control" placeholder="Input Password" required>
			</div>
			<div class="modal-footer">
				<button type="submit" name="login" class="btn btn-success">Login</button>

				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			</div>
			</form>
		</div>

	</div>
</div>

<?php include 'include/footer.php'; ?>
</body>

</html>