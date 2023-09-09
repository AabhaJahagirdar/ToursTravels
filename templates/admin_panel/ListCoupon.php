
<?php

include ('top.php');

$sql="select * from coupon";
$res=mysqli_query($con,$sql);


?>
<!-- </div>-->



			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Coupons</h1>
					</div>
					<hr>
				<div class="container table-responsive">

					<table id="dttable" class="table table-striped   table-hover  table-sm pt-3">
					<thead class="table-primary">
						<tr>
						<th scope="col" width="2%">Sr. No</th>
						<th scope="col">Coupon Code</th>
						<th scope="col" width="2%">Type</th>
						<th scope="col">Value</th>
						<th scope="col">Min Value</th>
						<th scope="col">Expired On</th>
						<th scope="col" width="10%">Added On</th>
						<th scope="col" width="28%">Actions</th>

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
						<td scope="col"> <?php  echo $row['couponCode']; ?></td>
						<td scope="col"> <?php  echo $row['couponType']; ?></td>
						<td scope="col"> <?php  echo $row['couponValue']; ?></td>
						<td scope="col"> <?php  echo $row['minValue']; ?></td>
						<td scope="col"> <?php  echo date("d/m/Y",strtotime($row['expiredOn'])); ?></td>
						<td scope="col"> <?php  echo date("d/m/Y",strtotime($row['addedOn'])); ?></td>
						<td scope="col">

							<a href="<?php echo SITE_PATH.'templates/admin_panel/'; ?>AddCoupon/<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm">Edit</button> </a>


							<?php
								if( $row['status'] == 1 ){
							?>
							<a href="?id=<?php echo $row['id']; ?>&type=deactive "> <button class="btn btn-primary btn-sm">Active</button> </a>

							<?php

								}
								else
								{
							?>
							<a href="?id=<?php echo $row['id']; ?>&type=active "> <button class="btn btn-secondary btn-sm">Deactive</button> </a>

							<?php
								}

							?>
							
							<a href="?id=<?php echo $row['id']; ?>&type=delete "> <button class="btn btn-danger btn-sm">Delete</button> </a>


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


if( isset($_GET['type']) && $_GET['type']!==' '  &&  isset($_GET['id']) && $_GET['id'] > 0  )
{

	$type=$_GET['type'];
	$id=$_GET['id'];

	if( $type == 'delete')
	{
		 mysqli_query($con,"delete from coupon where id='$id' ");
		 redirect(SITE_PATH.'templates/admin_panel/ListCoupon');

	}

	if( $type=='active' || $type=='deactive'){
		$status=1;

		if($type=='deactive'){
			$status=0;
		}

		mysqli_query($con,"update coupon set status='$status' where id='$id' ");
		redirect(SITE_PATH.'templates/admin_panel/ListCoupon');

	}
}

?>