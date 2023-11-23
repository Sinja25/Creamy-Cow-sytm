<style>
	.tble .name,
	.tble .desc {
		width: 15%;
	}

	.img-cart {
		height: 150px;
	}
</style>

<div class="row">
	<div class="col-sm-8 col-sm-offset-2 col-md-12">
		<?php
		if (isset($_SESSION['message'])) {
			?>
			<div class="alert alert-info text-center">
				<?php echo $_SESSION['message']; ?>
			</div>
			<?php
			unset($_SESSION['message']);
		}
		?>
		<form method="POST">
			<div class="container-fluid" style="margin-top: 8rem;">
				<h1 class="page-header text-center">My Cart</h1>
				<table class="table table-bordered tble">
					<thead>
						
						<th class="name">Image</th>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Add ons</th>
						<th>Subtotal</th>
						<th></th>
					</thead>
					<tbody>
						<?php
						//initialize total
						$total = 0;
						$index = 0;
						$checker = 1;

						$sql = "SELECT a.*,b.image_name, b.title as prodname , b.price
						FROM `tbl_cart` as a
						LEFT JOIN tbl_food as b
						ON a.food_id = b.id
						WHERE a.user_id='{$_SESSION['id']}'";

						$query = $con->query($sql);
						while ($row = $query->fetch_assoc()) {
							?>
							<tr>
								<center>
								
										<!-- <div class="modal-body">Are you ready to logout?</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
							  <a href="logout.php" class="btn" style="background-color:rgb(221, 160, 47);">Yes, logout.</a>
								</div>
						  </div> -->
										
									
									<td><img style="width: 100%;" src="admin/<?php echo $row['image_name'] ?>"
											class="img-cart"></td>
									<td>
										<?php echo $row['prodname']; ?>
									</td>
									<td>
										<?php echo number_format($row['price'], 2); ?>
									</td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<input type="hidden" name="food_id[<?php echo $index ?>]"
										value="<?php echo $row['food_id'] ?>">
									<input type="hidden" name="id[<?php echo $index ?>]" value="<?php echo $row['id'] ?>">
									<td>
										<input type="number" min="1" class="form-control qty"
											value="<?php echo $row['food_quantity'] ?>" name="qty_<?php echo $index; ?>"
											data-id="<?= $row['id'] ?>">
									</td>
									<td>
										<select name="addons[]" class="form-control addons" data-id="<?= $row['id'] ?>">
											<?= (($row['add_ons'] == "") || ($row['add_ons'] == 0) ? "" : "<option value='" . $row['add_ons'] . "'>
												" . ($row['add_ons'] == 15 ? "P15 Nata" : "P10 Pearl") . " </option>") ?>
											<option value="0">Select Add ons</option>
											<option value="10">P10 Pearl </option>
											<option value="15">P15 Nata </option>
										</select>
									</td>
									<td id="indiTotal">
										<?php
										$addOnsVal = $row['add_ons'] == "" ? 0 : $row["add_ons"];
										?>
										<?php echo number_format(($row['price'] * $row['food_quantity']) + ($addOnsVal * $row['food_quantity']), 2); ?>
									</td>

									<?php $total += ($row['price'] * $row['food_quantity']) + ($addOnsVal * $row['food_quantity']) ?>
									<td>
										<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>"
											class="btn btn-danger btn-sm">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
												fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
												<path
													d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
											</svg></a>
									</td>
								</center>
							</tr>

							<?php
							$index++;
							$checker++;
						}
						if ($checker == 1) {
							?>
							<tr>
								<td colspan="10" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						} else {
							echo '<tr>
							<td colspan="5" align="right"><b>Total</b></td>
							<td><b>' . number_format($total, 2) . '</b></td>
							</tr>
						';
						}

						?>

					</tbody>
				</table>
			</div>
			<!-- for subtotal -->
			<script>
				$(".addons").change(function () {
					var addOnsId = $(this).val();
					var id = $(this).data("id");
					$.ajax({
						url: 'newAjax.php',
						type: 'post',
						data: { addOnsId: addOnsId, id: id },
						success: function (response) {
							location.reload()
						}
					});
				});

				$('.qty').change(function () {
					var qty = $(this).val();
					var id = $(this).data("id");
					$.ajax({
						url: 'newAjax.php',
						type: 'post',
						data: { qty: qty, id: id },
						success: function (response) {
							location.reload()
							console.log(response)
						}
					});
				});

			</script>