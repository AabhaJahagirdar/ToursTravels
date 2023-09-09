
<?php

include ('top.php');

$sql="select booking.*,package.packageName from booking,package where booking.packageId=package.id and booking.rem>0";
$res=mysqli_query($con,$sql);


?>
<!-- </div>-->



			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Payment Dues</h1>
					</div>
					<hr>
				<div class="container table-responsive">

					<table id="dttable">
					<thead class="table-primary">
						<tr>
						<th scope="col">Sr. No</th>
						<th scope="col">Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Address</th>
						<th scope="col">Package</th>
						<th scope="col">Price</th>
						<th scope="col">CheckIn</th>
						<th scope="col">CheckOut</th>
						<th scope="col">PayMode</th>
						<th scope="col" width="10%">Adults</th>
						<th scope="col" width="10%">Children</th>
						<th scope="col">subTotal</th>
						<th scope="col">Dis</th>
						<th scope="col">GrandTotal</th>
						<th scope="col">Paid</th>
						<th scope="col">Remain</th>
						<th scope="col">Actions</th>

						</tr>
					</thead>
					<tbody>

						<?php  

							if(mysqli_num_rows($res) > 0){
								$i=1;
								while( $row=mysqli_fetch_assoc($res) ){

						?>

						<tr>
						<td scope="col"> <?php  echo $i; ?></td>
						<td scope="col"> <?php  echo $row['name']; ?></td>
						<td scope="col"> <?php  echo $row['phone']; ?></td>
						<td scope="col"> <?php  echo $row['address']; ?></td>
						<td scope="col"> <?php  echo $row['packageName']; ?></td>
						<td scope="col"> <?php  echo $row['packagePrice']; ?></td>
						<td scope="col"><?php echo date("d/m/Y", strtotime($row['checkIn']));?></td>
						<td scope="col"> <?php echo date("d/m/Y", strtotime($row['checkOut']));?></td>
						<td scope="col"> <?php  echo $row['payMode']; ?></td>
						<td scope="col"> <?php  echo $row['adults']; ?></td>
						<td scope="col"> <?php  echo $row['children']; ?></td>
						<td scope="col"> <?php  echo $row['subTotal']; ?></td>
						<td scope="col"> <?php  echo $row['discount']; $disType=$row['distype']; if($disType=='cash'){echo "&#8377;";}if($disType=='per'){echo "%";}  ?></td>
						<td scope="col"> <?php  echo $row['total']; ?></td>
						<td scope="col"> <?php  echo $row['paid']; ?></td>
						<td scope="col"> <?php  echo $row['rem']; ?></td>
						<td scope="col">

							<a href="<?php echo SITE_PATH.'templates/admin_panel/'; ?>AddBooking/<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>
							
							<a target="_blank" href="<?php echo SITE_PATH.'templates/admin_panel/'; ?>bookReceipt<?php echo $row['id'];?>"> <button class="btn btn-danger btn-sm">View</button> </a>


						</td>

						</tr>


						<?php
								$i++;

								}
							}
							else{
							?>
							<td colspan="4">Data not found</td>

							<?php

							}

						?>
						

						
						
					</tbody>

					</table>


				</div>



					
				</div>
			</main>

      <?php

        include 'footer.php';
      ?>

   
<?php




?>