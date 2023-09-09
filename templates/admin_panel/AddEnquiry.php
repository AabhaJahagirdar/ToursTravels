<?php

include ('top.php');

$msg="";
$name="";
$phone="";
$query="";
$date="";
$id="";




if(isset($_GET['id']) && $_GET['id']>0){
	$id=getSafeVal( $_GET['id'] );


	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from query where id='$id' ") );
	$name=$row['name'];
	$phone=$row['phone'];
	$query=$row['query'];
	$date=$row['date'];

}


if (isset($_POST['submit'])) {
	$name=getSafeVal( $_POST['name'] );
	$phone=getSafeVal( $_POST['phone'] );
	$couponValue=getSafeVal( $_POST['couponValue'] );
	$query=getSafeVal( $_POST['query'] );
 

	
		//if id is not set then insert new coupon 
		if($id==""){
			mysqli_query($con,"insert into query(name,phone,query) values('$name','$phone','$query') ");

		}
		else{
			//if id is set then update exsting coupon
			mysqli_query($con,"update query set name='$name',phone='$phone',query='$query' where id='$id'  ");
		}
		redirect(SITE_PATH.'templates/admin_panel/enquiries');
		
	
}






?>
 


			<main class="content">
				<div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Add Enquiries</strong></h1>

							
					<?php 
					if(strlen( $msg ) > 0){
					?>
					<div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
					<?php
						}

					?>
					<form method="post">

					 	<div class="row">
								    <div class="col-sm-6 mb-3">
								     	<label for="name" class="form-label">Name<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="name" required name="name"  value="<?php echo $name; ?>">
								      		
								    </div>
								     <div class="col-sm-6 mb-3">
									<label for="phone" class="form-label">Phone<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="phone" required name="phone"  value="<?php echo $phone; ?>">

							           </div>
						</div>

						<div class="row">
								     <div class="col-sm-12 mb-3">
								     	<label for="query" class="form-label">Query<span class="redStar">*</span></label>
							       		<textarea class="form-control"  id="query" required name="query" ><?php echo $query; ?> </textarea>
								      		
								    </div>

						</div>
						<input type="submit" name="submit" class="btn btn-success" value="Submit">
					</form>

				


                </div>
			</main>

      <?php

        include 'footer.php';
      ?>
