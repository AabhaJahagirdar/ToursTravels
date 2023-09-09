
<?php

include ('top.php');

$sql="select bookonline.*,package.packageName from bookonline,package where bookonline.packageId=package.id and bookonline.paymentStatus='success' order by bookonline.id desc";
$res=mysqli_query($con,$sql);


?>
<!-- </div>-->



			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Online Bookings</h1>
					</div>
					<hr>
				<div class="container table-responsive">

					<table id="dttable">
					<thead class="table-primary">
						<tr>
						<th scope="col">Sr. No</th>
						<th scope="col">Status</th>
						<th scope="col">Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Address</th>
						<th scope="col">Package</th>
						<th scope="col">Price</th>
						<th scope="col">CheckIn</th>
						<th scope="col">CheckOut</th>
						<th scope="col" width="10%">Adults</th>
						<th scope="col" width="10%">Children</th>
						<th scope="col">SubTotal</th>
						<th scope="col">Dis</th>
						<th scope="col">Coupon</th>
						<th scope="col">GrandTotal</th>
						<th scope="col">Payment Status</th>
						<th scope="col">Booked On</th>
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
						<td scope="col"> <?php  
							if($row['status']==1){
								echo "<span class='badge bg-success'>Confirmed</span>";
							}
							else{
								echo "<button onclick='toConfirm(".$row['id'].",".$row['uid'].")' class='badge bg-danger'>Pending</button>";
							}


						 ?></td>
						<td scope="col"> <?php  echo $row['name']; ?></td>
						<td scope="col"> <?php  echo $row['phone']; ?></td>
						<td scope="col"> <?php  echo $row['address']; ?></td>
						<td scope="col"> <?php  echo $row['packageName']; ?></td>
						<td scope="col"> <?php  echo $row['packagePrice']; ?></td>
						<td scope="col"><?php echo date("d/m/Y", strtotime($row['checkIn']));?></td>
						<td scope="col"> <?php echo date("d/m/Y", strtotime($row['checkOut']));?></td>
						<td scope="col"> <?php  echo $row['adults']; ?></td>
						<td scope="col"> <?php  echo $row['children']; ?></td>
						<td scope="col"> <?php  echo $row['subTotal']; ?></td>
						<td scope="col"> <?php  echo $row['discount']; $disType=$row['disType']; if($disType=='cash'){echo "&#8377;";}if($disType=='per'){echo "%";}  ?></td>
						<td scope="col"> <?php  echo $row['coupon']; ?></td>
						<td scope="col"> <?php  echo $row['total']; ?></td>
						<td scope="col"> <?php  echo $row['paymentStatus']; ?></td>
						<td scope="col"> <?php  echo date("d/m/Y", strtotime($row['bookedOn'])); ?></td>
						<td scope="col">
							<a target="_blank" href="<?php echo SITE_PATH.'templates/'; ?>userReceipt/<?php echo $row['bookId'];?>"> <button class="btn btn-danger btn-sm">View</button> </a>


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

  <script type="text/javascript">
  	function toConfirm(confirmid,uid){
  		
  			swal({
				  title: "Are you sure?",
				  text: "Once booking successful, you will not be able to cancel booking!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((book) => {
				  if (book) {
				    jQuery.ajax({
				    	type:'post',
				    	url:'updateStatus',
				    	data:"confirmid="+confirmid,
				    	success:function(result){
				    		if(result){
				    			swal("Booking successful!", {
						      		icon: "success",
						    	});
						    	window.location.href=window.location.href;
				    		}
				    		
				    	}

				    })
				  }else {
				    swal("Booking is pending!");
				  }
			});
  	}
  </script>