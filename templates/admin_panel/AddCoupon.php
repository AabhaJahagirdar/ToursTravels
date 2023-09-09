<?php

include ('top.php');

$msg="";
$couponCode="";
$couponType="";
$couponValue="";
$minValue="";
$expiredOn="";
$id="";




if(isset($_GET['id']) && $_GET['id']>0){
	$id=getSafeVal( $_GET['id'] );


	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from coupon where id='$id' ") );
	$couponCode=$row['couponCode'];
	$couponType=$row['couponType'];
	$couponValue=$row['couponValue'];
	$minValue=$row['minValue'];
	$expiredOn=$row['expiredOn'];

}


if (isset($_POST['submit'])) {
	$couponCode=getSafeVal( $_POST['couponCode'] );
	$couponType=getSafeVal( $_POST['couponType'] );
	$couponValue=getSafeVal( $_POST['couponValue'] );
	$minValue=getSafeVal( $_POST['minValue'] );
	$expiredOn=getSafeVal( $_POST['expiredOn'] );
 

	if($id==""){
		//here id is blank means admin wants to add new coupon
		$sql="select * from coupon where couponCode='$couponCode' ";

	}
	else{
		//here id is set means admin wants to edit existing coupon
		$sql="select * from coupon where couponCode='$couponCode' and id!='$id' ";

	}


	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){

		$msg="coupon already exists";

	}
	else{

		//if id is not set then insert new coupon 
		if($id==""){
			mysqli_query($con,"insert into coupon(couponCode,couponType,couponValue,minValue,expiredOn,status) values('$couponCode','$couponType','$couponValue','$minValue','$expiredOn',1) ");

		}
		else{
			//if id is set then update exsting coupon
			mysqli_query($con,"update coupon set couponCode='$couponCode',couponType='$couponType',couponValue='$couponValue',minValue='$minValue',expiredOn='expiredOn' where id='$id'  ");
		}
		redirect(SITE_PATH.'templates/admin_panel/ListCoupon');
		
	}
	
}






?>
 


			<main class="content">
				<div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Add Coupons</strong></h1>

							
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
								     	<label for="couponCode" class="form-label">Coupon Code<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="couponCode" required name="couponCode"  value="<?php echo $couponCode; ?>">
								      		
								    </div>
								     <div class="col-sm-6 mb-3">
								     	<label for="couponType" class="form-label">Coupon Type<span class="redStar">*</span></label>
							       		<select class="form-select mb-3" id="couponType" name="couponType" required  value="<?php echo $couponType; ?>">
							    
											  <?php
											  
												      	if($couponType=="p"){
												      		echo "<option selected value='p'>Percentage (%)</option>";
												    	}
												    	else{
												    		echo "<option  value='p'>Percentage (%)</option>";
												    	}
												    	if($couponType=="r"){
												      		echo "<option selected value='r'>Rupees (&#8377)</option>";
												    	}
												    	else{
												    		echo "<option  value='r'>Rupees (&#8377)</option>";
												    	}
											
											  ?>
								
											  
									</select> 
								      		
								    </div>
						</div>

						<div class="row">
								     <div class="col-sm-4 mb-3">
								     	<label for="couponValue" class="form-label">Coupon Value<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="couponValue" required name="couponValue"  value="<?php echo $couponValue; ?>">
								      		
								    </div>
								     <div class="col-sm-4 mb-3">
								     	<label for="minValue" class="form-label">Booking Min Value<span class="redStar">*</span></label>
							       		<input type="text" class="form-control"  id="minValue" required name="minValue"  value="<?php echo $minValue; ?>">
								      		
								    </div>
								     <div class="col-sm-4 mb-3">
								     	<label for="expiredOn" class="form-label">Coupon Expire Date<span class="redStar">*</span></label>
							       		<input type="date" class="form-control"  id="expiredOn" required name="expiredOn"  value="<?php echo $expiredOn; ?>">
								      		
								    </div>

						</div>
						<input type="submit" name="submit" class="btn btn-success" value="Submit">
					</form>

				


                </div>
			</main>

      <?php

        include 'footer.php';
      ?>
