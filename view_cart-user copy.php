<h1 class="page-header text-center">My Cart</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
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
			<style>
				.tble .name,.tble .desc{
				width: 15%;
				}
			</style>
			<form method="POST">
			<table class="table table-bordered tble">
				<thead>
					<th></th>
					<th class="name">Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						// if(!empty($_SESSION['cart'])){
						//create array of initail qty which is 1
 						$index = 0;
						$checker=1;
 						// if(!isset($_SESSION['qty_array'])){
 						// 	$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						// }
						$sql = "SELECT a.*,b.image_name, b.title as prodname , b.price
						FROM `tbl_cart` as a
						LEFT JOIN tbl_food as b
						ON a.food_id = b.id
						WHERE a.user_id='{$_SESSION['id']}'";

						$query = $con->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr><center>
									<td>
										<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm">
										<span class="glyphicon glyphicon-trash"></span></a>
										<!-- <button type="submit" class="btn btn-success" name="save">
											<span class="glyphicon glyphicon-check"></span>
										</button> -->
									</td>
									<td><img style="width: 100%;" src="admin/<?php echo $row['image_name'] ?>"  ></td>
									<td><?php echo $row['prodname']; ?></td>
									<td><?php echo number_format($row['price'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<input type="hidden" name="food_id[<?php echo $index?>]" value="<?php echo $row['food_id']?>">
									<input type="hidden" name="id[<?php echo $index?>]" value="<?php echo $row['id']?>">
									<td>
										<input type="number" min="1" class="form-control" value="<?php echo $row['food_quantity'] ?>" name="qty_<?php echo $index; ?>">
									</td>
									<td>
										<?php echo number_format( $row['price'] *$row['food_quantity'], 2); ?>
									</td>
									<?php $total +=  $row['price'] *$row['food_quantity']?>
								</center></tr>
								
								<?php
								$index ++;
								$checker++;
							}
						if($checker==1){
							?>
							<tr>
								<td colspan="10" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}else{
							echo'<tr>
							<td colspan="5" align="right"><b>Total</b></td>
							<td><b>'.number_format($total, 2).'</b></td>
							</tr>
						';
						}

					?>

				</tbody>
			</table>
			