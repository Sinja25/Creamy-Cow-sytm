<?php
include_once("include/nav.php");
// cart();
// check();
include_once("db.php");
require './includes/check_session.php';
require './includes/cart-handles.php';

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
if (!isset($_POST['checkout']) && !isset($_POST['confirmed'])) {
	include_once("view_cart-user.php");
	if ($checker == 1) {
		echo '<a href="index.php" class="btn btn-primary" style="margin-right:2%; position:absolute; right:0;"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>';
	} else {
		echo '<a href="index.php" class="btn btn-primary" style="margin-right:5%;position:absolute; right:350px;"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>';
		echo '<button type="submit" name="checkout" class="btn btn-success" style="
		position:absolute; right:30px;"><span class="glyphicon glyphicon-check"></span>Checkout</button> </form>';
		// echo'<input type="submit" name="checkout"></form>';
	}
} else if (isset($_POST['checkout']) || isset($_POST['confirmed'])) {
	if (isset($_POST['checkout'])) {

		echo '<form method="POST" enctype="multipart/form-data">';
		for ($i = 0; $i < sizeof($_POST['id']); $i++) {
?>
			<input type="hidden" name="check_id[]" value="<?php echo $_POST['id'][$i] ?>">
			<input type="hidden" name="check_quantity[]" value="<?php echo $_POST['qty_' . $i] ?>">
			<input type="hidden" name="check_food_id[]" value="<?php echo $_POST['food_id'][$i] ?>">
			<input type="hidden" name="check_addons[]" value="<?php echo $_POST['addons'][$i] ?>">


		<?php	} ?>
		<style>
			body {
				font-family: arial;
				background-image: url(images/milkt.jpg);
				background-repeat: no-repeat;
				overflow: scroll;
				background-size: cover;
			}

			form {
				margin: 175px auto;
				width: 1000px;
				padding: 30px 25px;
				background: rgba(220, 220, 220, .5);
				border-radius: 5px;
			}
		</style>
		<center>
			<h1>Checkout Form</h1>
			<div class="row">
				<div class="alert alert-info col col-sm-12 col-md-6 offset-md-3" role="alert">
					Payment method is through <strong>GCash</strong> only, please send payment and using the QR code below and upload the screen shot with the reference number.
				</div>
			</div>
			<div class="d-flex justify-content-center">
				<div class="card border-primary">
					<img src="./resources/images/qrcode.png" width="150px" height="150px" alt="">
				</div>
			</div>
		</center>

		<form>
			<input type="hidden" name="check_sel" value="Gcash">
			<input type="text" class="form-control" placeholder="Contact name" style="width: 40%; margin-left:30%; margin-bottom:1%;" name="check_name" value="<?= $_SESSION['full_name'] ?>" Required readonly />
			<input type="text" class="form-control" placeholder="Contact address" style="width: 40%; margin-left:30%; margin-bottom:1%;" name="check_address" value="<?= $_SESSION['address'] ?>" Required readonly />
			<input type="text" onkeypress="return isNumberKey(event)" maxlength="11" class="form-control" placeholder="Contact number" style="width: 40%; margin-left:30%; margin-bottom:1%;" name="check_contact" value="<?= $_SESSION['contact_no'] ?>" readonly Required />
			<input required type="file" id="sel_file" class="form-control" style="width: 40%; margin-left:30%; margin-bottom:1%;" name="check_img">
			<select required class="form-control" style="width: 40%; margin-left:30%; margin-bottom:1%;" name="order_type" id="select">
				<option selected disabled value="">Choose...</option>
				<option value="Delivery">Delivery</option>
				<option value="Pick-up">Pick-Up</option>
			</select>
			<input type="submit" name="confirmed" class="btn btn-success" style="width: 40%; margin-left:30%; margin-bottom:1%;">
		</form>

	<?php	}
	?>
	<!-- for selecting payment mode -->
	<!-- <script>
		$('#sel_file').hide();
		$("#select").change(function() {
			if ($(this).val() === "Gcash") {
				$('#sel_file').show();
			} else {
				$('#sel_file').hide();
			}
		});
	</script> -->

<?php
}
?>
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

<script>
	function isNumberKey(evt) {
		console.log(evt.target.textLength);
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if ((charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) || (evt.target.textLength < 0 || evt.target.textLength == 11))
			return false;
		return true;
	}
</script>

</body>

</html>