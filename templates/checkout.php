<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include 'user_header.php';

if(!isset($_SESSION['CURRENT_USER_ID'])){
	redirect(SITE_PATH);
}

if(isset($_POST['book'])){

	$oid="IMPERIOUS".rand(10000,99999999)."_".$_SESSION['CURRENT_USER_ID'];

	$check_in=$_POST['check-in-date'];
    $check_out=$_POST['check-out-date'];
    $adults=$_POST['adults'];
    $children=$_POST['children'];
    $total=$_POST['total'];
    $package=$_POST['package'];
    $adultPrice=$_POST['adultPrice'];
    $childrenPrice=$_POST['childrenPrice'];
    $days=$_POST['days'];

    $pck=mysqli_query($con,"select * from package where id='$package' ");
    $packageRow=mysqli_fetch_assoc($pck);

    $dis=floatval(($packageRow['discount']));
    $disType=$packageRow['disType'];
    $payAmt=$_POST['total'];
    if($dis >0){
    	if($disType=="cash"){
    		$payAmt=intval($payAmt)-$dis;
    	}
    	if($disType=="per"){
    		$damt=$payAmt*(($dis)/100);
    		$payAmt=$payAmt-$damt;

    	}

    }

  


}
else{
	redirect(SITE_PATH);
}

?>
<section id="bookingProcess" style="padding-top: 10% !important;" class="container-fluid">
	
	<div class="outer d-flex justify-content-evenly  flex-wrap" style="width: 100%;">
		<div class="innerLeft ">
			<h5>Booking Submission</h5>
			<hr>
<!-- Address Details starts -->
  <div class="">
        <form method="post" id="checkOutForm" name="checkOutForm" action="<?php echo SITE_PATH; ?>templates/pgRedirect">

		<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $oid; ?>" hidden>
		<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo rand(1000,9999).'_'.$_SESSION['CURRENT_USER_ID']; ?>" hidden>
		<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" hidden value="Retail">
		<input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" hidden>
		<input title="TXN_AMOUNT" id="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT" hidden
						value="<?php echo $payAmt; ?>">
		<input type="text" name="package" value="<?php echo $package; ?>" hidden>
		<input type="text" name="packagePrice" value="<?php echo $packageRow['packagePrice']; ?>" hidden>
		<input type="text" name="check_in" value="<?php echo $check_in; ?>" hidden>
		<input type="text" name="check_out" value="<?php echo $check_out; ?>" hidden>
		<input type="text" name="adults" value="<?php echo $adults; ?>" hidden>
		<input type="text" name="children" value="<?php echo $children; ?>" hidden>
		<input type="text" name="total" value="<?php echo $total; ?>" hidden>
		<input type="text" name="dis" value="<?php echo $dis; ?>" hidden>
		<input type="text" name="disType" value="<?php echo $disType; ?>" hidden>
		<input type="text" id="couponSetValue" name="payAmt" value="<?php echo $payAmt; ?>" hidden>

						<div class="row">
							 <div class="col-sm-6 mb-3">
							    	<label for="name" class="form-label">Your Name<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="name" required name="name" value="<?php echo $currentUserDetails['name']; ?>">
							 </div>

							 <div class="col-sm-6 mb-3">
							    	<label for="email" class="form-label">Email<span class="redStar">*</span></label>
							       <input type="email" class="form-control" rows="3" id="email" required name="email" value="<?php echo $currentUserDetails['email']; ?>">
							 </div>

						</div>
						<div class="row">

							 <div class="col-sm-6 mb-3">
							    	<label for="mobile" class="form-label">Phone<span class="redStar">*</span></label>
							    	<span id="bookPhoneVerifyMsg" class="text-danger">(Not Verified)</span>
							       <input type="text" class="form-control" rows="3" id="mobile" name="mobile" required name="mobile" value="<?php echo $currentUserDetails['mobile']; ?>">
							       <div id="recaptcha-container"></div><br>
                  					<button id="sendOTPWhileBooking" class="btn btn-primary btn-sm" >Send OTP</button>
							</div>
                  					 <div class="col-sm-6 mb-3 mt-4" id="changePhUserOtp" style="display: none;">
                                  		<input type="text" class="form-control" name="userOTP" id="userOTP" placeholder="Enter OTP"><br>
                                  		<button id="verifyOTPWhileBookBtn" class="btn btn-primary btn-sm ">Verify</button>
                                	</div>

							 </div>
							 
						</div>

						<div class="row">
							 
								
								<div class="col-sm-12 mb-3">
										<label for="adrs" class="form-label">Address<span class="redStar">*</span></label>
										<textarea class="form-control" rows="3"  id="adrs" name="adrs" required><?php echo trim($currentUserDetails['address']); ?></textarea>
									      	
								</div>
								
							</div>
							<div class="row">
								<div class="col-sm-4 mb-3">
							    	<input type="text" class="form-control form-control-sm" rows="3" id="coupon" name="coupon" placeholder="Coupon Code">
								</div>
								<div class="col-sm-4 mb-3">
							    	<button class="btn btn-sm btn-primary" type="button" onclick="applyCoupon()">Apply Coupon</button>
								</div>
							</div>
							<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Please Verify mobile and then continue to payment">
           					 <button name="payNow" type="submit" id="paymentButton" class="btn  btn-success  mb-5" disabled >Proceed to Payment</button>
        					</span>


			</form>
      </div>
<!-- Address Details ends -->
		<div class="innerRight">
			<h5>Your Booking</h5>
			<hr>
			<div class="card bookingInfo" >
				<div class="text-center">
					<div >
						<h6><?php  echo $packageRow['packageName'];?></h6>
				    </div>

					<div > <img src="<?php  echo SITE_PACKAGE_IMAGE.$packageRow['packagePhoto']; ?>"> </div>
				</div>
				<hr>
				<div class="tbl">
					<table class=" table-sm fs-6">
						<tr><td>Departure Date</td><td><?php echo date("d/m/Y", strtotime($check_in)); ?></td></tr>
						<tr><td>Duration</td><td><?php echo $days; ?> Days</td></tr>
						<tr><td>Adults</td><td><?php echo $adults; ?></td></tr>
						<tr><td>Children</td><td><?php echo $children; ?></td></tr>
					</table>
					

				</div>
				<hr>
				<div class="tbl">
					<table class=" table-sm fs-6">
						<tr><td>Adult Price</td><td><?php echo $adultPrice; ?></td></tr>
						<tr><td>Children Price</td><td><?php echo $childrenPrice; ?></td></tr>
						<tr><td>Subtotal</td><td><?php echo $total; ?></td></tr>
						<tr><td>Discount</td><td><?php echo $packageRow['discount']; if($disType=='cash'){
							echo "&#8377;";}if($disType=='per'){echo "%";} ?></td></tr>

						<tr class="text-success"><td>Total</td><td><?php echo $payAmt; ?></td></tr>

						<tr class="text-success couponMsg"><td>Coupon</td><td><span class="couponCode"></span></td></tr>

						<tr class="text-success couponMsg"><td>Pay Amount</td><td><span class="finalPrice"></span></td></tr>
					</table>
					

				</div>

		


			</div>
			
		</div>

	</div>


</section>





<?php

include 'user_footer.php';

?>
<script type="text/javascript">

	function applyCoupon(){
		coupon=$("#coupon").val();
		if(coupon==""){
			swal("Failed", "Please enter Coupon Code!", "error");
		}
		else{
			jQuery.ajax({
				url:'<?php echo SITE_PATH; ?>templates/applyCoupon',
				type:'post',
				data:'coupon='+coupon+'&bookPrice='+<?php echo $payAmt; ?>,
				success:function(result){
					console.log(result);
					data=jQuery.parseJSON(result);
					if(data.status=="success"){
						swal("Success",data.msg,"success");
						$(".couponMsg").show();
						$(".couponCode").html(coupon);
						$(".finalPrice").html(data.couponApplied);
						$("#couponSetValue").val(data.couponApplied);
						$("#TXN_AMOUNT").val(data.couponApplied);
						
					}
					if(data.status=="error"){
						swal("Failed",data.msg, "error");
						coupon=$("#coupon").val("");
					}
				}


			})
		}
		
	}

</script>
<script type="text/javascript">
  
  if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
}
</script>