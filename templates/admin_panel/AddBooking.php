
<?php
	include 'top.php';
    
    $name="";
    $phone="";
    $address="";
    $packageId="";
    $checkIn="";
    $checkOut="";
    $payMode="";
    $adults=1;
    $children=0;
    $packagePrice="";
    $subTotal=""; 
    $discount=""; 
    $total=""; 
    $paid=""; 
    $rem=""; 
    $pname=array();
    $pertype=array();
    $pamt=array();

	if(isset($_GET['id']) && $_GET['id']>0){
			$id=getSafeVal( $_GET['id'] );


			$row=mysqli_fetch_assoc(mysqli_query($con,"select * from booking where id='$id' ") );
			$bookId=$row['bookId'];
			$name=$row['name'];
		    $phone=$row['phone'];
		    $address=$row['address'];
		    $packageId=$row['packageId'];
		    $checkIn=$row['checkIn'];
		    $checkOut=$row['checkOut'];
		    $payMode=$row['payMode'];
		    $adults=$row['adults'];
		    $children=$row['children'];
		    $packagePrice=$row['packagePrice'];
		    $subTotal=$row['subTotal']; 
		    $discount=$row['discount']; 
		    $total=$row['total']; 
		    $paid=$row['paid']; 
		    $rem=$row['rem']; 

		    $pname=array();
		    $pertype=array();
		    $pamt=array();

		    $otherMem=mysqli_query($con,"select * from `tourmembers` where bookId='$bookId' ");
		    
		    if(mysqli_num_rows($otherMem)>0){
		    	while($memb=mysqli_fetch_assoc($otherMem)){
		    		$pname[]=$memb['name'];
		    		$pertype[]=$memb['type'];
		    		$pamt[]=$memb['amount'];

		    	}
		    }
		    
		   

	}


?>


		
			<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Add Booking</h1>
					</div>
					<hr>
					<span id="popMsg"></span>

					<form method="post" id="bookingForm">

						<div class="row">
							 <div class="col-sm-6 mb-3">
							    	
							    	<label for="name" class="form-label">Customer Name<span class="redStar">*</span></label>
							       	<input type="text" class="form-control" rows="3" id="name" required name="name"  value="<?php echo $name; ?>">	 
							       	
							 </div>

							 <div class="col-sm-6 mb-3">
							    	<label for="mobile" class="form-label">Customer Mobile<span class="redStar">*</span></label>
							       <input type="text" class="form-control" rows="3" id="mobile" required name="mobile"  value="<?php echo $phone; ?>">
							 </div>

						</div>
						<div class="row">
							<div class="col-sm-12 mb-3">
							    	<label for="address" class="form-label">Customer Address<span class="redStar">*</span></label>
							       <textarea class="form-control" id="address" required name="address">
							       	<?php echo $address; ?>
							       </textarea>
							 </div>
							

						</div>

						<div class="row">
							 <div class="col-sm-6 mb-3">
							    	
							    	<label for="pc" class="form-label">Package Name<span class="redStar">*</span></label>
							       		<select class="form-select mb-3" id="pc" name="pc" required onchange="nameChange()" value="<?php echo $category; ?>">
							       			<option selected disabled value="">Select Package</option>
											  <?php
											  	$pck=mysqli_query($con,"select * from package");
											    if(mysqli_num_rows($pck)>0){
											      while ($pckRow=mysqli_fetch_assoc($pck)) {

												      	if($pckRow['id']==$packageId){
												      		echo "<option selected value='".$pckRow['id']."'>".$pckRow['packageName']."</option>";
												    	}
												    	else{
												    		echo "<option  value='".$pckRow['id']."'>".$pckRow['packageName']."</option>";
												    	}
													}
												}
											  ?>
								
											  
									</select> 
							       	
							 </div>
							
							<div class="col-sm-3 mb-3">
				           		   <label for="checkIn" class="form-label">Check In<span class="redStar">*</span></label>
				                    <input type="date" name="checkIn" id="checkIn" required value="<?php echo $checkIn; ?>">
				                
				            </div>
				             <div class="col-sm-3 mb-3">
				                    <label for="checkOut" class="form-label">Check Out<span class="redStar">*</span></label>
				                    <input type="date" name="checkOut" id="checkOut" required value="<?php echo $checkOut; ?>">
				             </div> 


						</div>


						<div class="row">

							 <div class="col-sm-3 mb-3">
							    	<label for="ptype" class="form-label">Payment Mode<span class="redStar">*</span></label>
							    	<select name="ptype" id="ptype" required>

							    	<option selected disabled value="">Payment Mode</option>
							    	 <?php
							    	 if($payMode=="cash"){
							    	 		echo "<option selected value='cash'>Cash</option>";
							    	 }
							    	 else{
							    	 	echo "<option  value='cash'>Cash</option>";
							    	 }
							    	 if($payMode=="UPI"){
							    	 		echo "<option selected value='UPI'>UPI</option>";
							    	 }
							    	 else{
							    	 	echo "<option  value='UPI'>UPI</option>";
							    	 }
							    	 if($payMode=="OnlineTransfer"){
							    	 		echo "<option selected value='OnlineTransfer'>Online Transfer</option>";
							    	 }
							    	 else{
							    	 	echo "<option  value='OnlineTransfer'>Online Transfer</option>";
							    	 }
							    	 ?>
				           		   	
				           		   </select>
							 </div>
				       
				                <div class="col-sm-3 mb-3">
				                    <label for="adults" class="form-label">Adults<span class="redStar">*</span></label>
				                    <input type="number" id="adults" name="adults" min="1" required readonly value="<?php echo $adults; ?>">
				                </div>
				                <div class="col-sm-3 mb-3">
				                   <label for="children" class="form-label">Children<span class="redStar">*</span></label>
				                    <input type="number" id="children" name="children" min="0" required readonly value="<?php echo $children; ?>">
				                </div>
				                 <div class="col-sm-3 mb-3">
				                    <input type="number" id="packagePrice" name="packagePrice" required hidden value="<?php echo $packagePrice; ?>">
				                </div>
				     
										
						</div>
						<div class="row">

							<div class="col-sm-12 mb-3">
								<hr>
								<div class="table-responsive">
								<table class="table table-sm ">
								  <thead class="">
								    <tr>
								      <th scope="col">Name</th>
								      <th scope="col">Type</th>
								      <th scope="col">Amt</th>
								      <th scope="col">Action</th>

								    </tr>
								  </thead>
								  <tbody id="addRows">

								  	<?php 

								  		if(count($pname)>0 || count($pertype)>0 || count($pamt)>0){

											
											for ($i=0; $i <count($pname) ; $i++) { 
												$name=$pname[$i];
												$type=$pertype[$i];
												$amount=$pamt[$i];
												?>

												<tr class="addPerRow">
												   <td>
												      <input type="text" id="pname" name="pname[]" required value="<?php echo $name; ?>">
												   </td>
												   <td>
												      <select class="pertype" name="pertype[]" required>
												         <option selected disabled value="">Select</option>
												         <?php 
												         	 if($type=="child"){
													    	 		echo "<option selected value='child'>Child</option>";
													    	 }
													    	 else{
													    	 	echo "<option value='child'>Child</option>";
													    	 }
													    	 if($type=="adult"){
													    	 		echo "<option selected value='adult'>Adult</option>";
													    	 }
													    	 else{
													    	 	echo "<option  value='adult'>Adult</option>";
													    	 }

												         ?>
												      </select>
												   </td>
												   <td>
												      <input type="text" class="pamt" name="pamt[]"  readonly required value="<?php echo $amount; ?>">
												   </td>
												   <td>
												      <button type="button" class="btn btn-danger removePer">Delete</button>
												   </td>
												</tr>

												<?php
											}

										}


								  	?>
								   
								  </tbody>
								</table>

							   </div>
								<button type="button" class="btn btn-primary" onclick="addRow()">Add</button>

							    	
							 </div>
						
						</div>

						<div class="row">
							<div class="col-sm-3 mb-3">
				           		   <label for="totalPrice" class="form-label">Total Amount<span class="redStar">*</span></label>
				                    <input type="text" name="totalPrice" id="totalPrice"  required readonly value="<?php echo $subTotal; ?>">
				                
				            </div>
							<div class="col-sm-3 mb-3">
				           		   <label for="dis" class="form-label">Discount<span class="redStar">*</span></label>
				                    <input type="text" name="dis" id="dis"  required value="<?php echo $discount;?>">
				                
				            </div>
				            <div class="col-sm-3 mb-3">
				           		   <label for="distype" class="form-label">Dis Type<span class="redStar">*</span></label>
				           		   <select name="distype" id="distype" required>
				           		   	<option selected disabled value="">Discount Type</option>
				           		   	<?php
				           		   		if($discount>100){
				           		   			echo "<option value='cash' selected>Cash (&#8377;)</option>";
				           		   		}
				           		   		else{
				           		   			echo "<option value='cash' >Cash (&#8377;)</option>";
				           		   		}
				           		   		if($discount<100){
				           		   			echo "<option value='per' selected>Per (%)</option>";
				           		   		}
				           		   		else{
				           		   			echo "<option value='per'>Per (%)</option>";
				           		   		}

				           		   	?>
				           		   	 
				           		   </select>
				                
				            </div>
				            <div class="col-sm-3 mb-3">
				           		   <label for="grtotal" class="form-label">Grand Total<span class="redStar">*</span></label>
				                    <input type="text" name="grtotal" id="grtotal" required readonly value="<?php echo $total; ?>">
				                
				            </div>


							
						</div>
						<div class="row">

							<div class="col-sm-3 mb-3">
				           		   <label for="payamt" class="form-label">Pay Amount<span class="redStar">*</span></label>
				                    <input type="text" name="payamt" id="payamt" required onchange="payamt" value="<?php echo $paid; ?>">
				                
				            </div>
				            <div class="col-sm-3 mb-3">
				           		   <label for="remAmt" class="form-label">Remaining Amount<span class="redStar">*</span></label>
				                    <input type="text" name="remAmt" id="remAmt" required readonly value="<?php echo $rem; ?>">
				                
				            </div>

						</div>
						<?php 
							if(isset($_GET['id']))
							{
						?>
						<input type="text" name="bid" id="bid" hidden required readonly value="<?php echo $bookId; ?>">

						<?php		
							}

						 ?>

						
							 <input type="submit" id="submitBtn" oper="<?php if(isset($_GET['id'])){ echo 'update'; }else{ echo 'add'; } ?>" name="submit" class="btn btn-success" value="Submit">

					</form>


				</div>
			</main>


<script type="text/javascript">

   $("#bookingForm").submit(function(e){
   		$("#submitBtn").val("Submitting...");
   		e.preventDefault();
   		tp=$("#submitBtn").attr("oper");
 
   		$.ajax({
   			url:"<?php echo SITE_PATH; ?>templates/admin_panel/bookDb",
   			method:'post',
   			data:$(this).serialize()+"&type="+tp,
   			success:function(response){
   				if(response=="success"){
   					$("#submitBtn").val("Submit");
	   				swal("Thanks!", "Booking Successfull!" ,"success");
	   				window.location.href="<?php echo SITE_PATH; ?>templates/admin_panel/ListBooking";

   				}
   			}

   		});

   });


	function addRow(){

		$("#addRows").append(`<tr class="addPerRow">
			   <td>
			      <input type="text" id="pname" name="pname[]" required>
			   </td>
			   <td>
			      <select class="pertype" name="pertype[]" required>
			         <option selected disabled value="">Select</option>
			         <option value="child">Child</option>
			         <option value="adult">Adult</option>
			      </select>
			   </td>
			   <td>
			      <input type="text" class="pamt" name="pamt[]"  readonly required>
			   </td>
			   <td>
			      <button type="button" class="btn btn-danger removePer">Delete</button>
			   </td>
		</tr>`);

		

	}

	 $(document).on("click",".removePer",function(){
       remove=$(this).parent().parent();
      
       remtype=$(this).parent().parent().find(".pertype").val();

		if(remtype=="adult"){
          ad=parseInt($("#adults").val())-1;
          $("#adults").val(ad);
          bookingData();
		}
		if(remtype=="child"){
			ch=parseInt($("#children").val())-1;
           $("#children").val(ch);
           bookingData();

		}
		 $(remove).remove();
		bookingData();
       calGrandTotal();
   })

  $(document).on("change",".pertype",function(){
     type=$(this).val();
    
		pkgPrice=parseInt($("#packagePrice").val());

		if(type=="adult"){
          $(this).parent().parent().find(".pamt").val(pkgPrice);
          ad=parseInt($("#adults").val())+1;
          $("#adults").val(ad);
          bookingData();
		}
		if(type=="child"){
			cPr=pkgPrice/2;
			$(this).parent().parent().find(".pamt").val(cPr);
			ch=parseInt($("#children").val())+1;
           $("#children").val(ch);
           bookingData();

		}
   })


	function nameChange(){
			pcname=$("#pc").val();
			 $.ajax({  
                   type:"POST",  
                   url:"<?php echo SITE_PATH; ?>templates/admin_panel/getPckPrice",  
                   data:"id="+pcname,
                   success:function(result){

                      msg=jQuery.parseJSON(result);

                     if(msg.status=="success"){
                       $("#packagePrice").val(msg.price);
                       bookingData();

                     }
                     
                   }
                   
             });

     }


  $("#distype").on("change",function(){
     calGrandTotal();
     })

     $("#dis").on("change",function(){
     calGrandTotal();
     }) 

function calGrandTotal(){

	subTotal=parseInt($("#totalPrice").val());
	discount=parseInt($("#dis").val());
	distype=$("#distype").val();
    

    if(discount<=0){
    	$("#grtotal").val(subTotal);
    }
    else{
         grTot=0;
    	if(distype=="cash"){
    	 grTot=subTotal-discount;
    	}
    	if(distype=="per"){
    		d=subTotal*((discount)/100);
    		grTot=subTotal-d;
    	}
    	$("#grtotal").val(grTot);
    }

           total=parseInt($("#grtotal").val());
     		pay=parseInt($("#payamt").val());
     		amt=total-pay;
     		$("#remAmt").val(amt);


}

 $("#payamt").on("change",function payamt(){
            
     		total=parseInt($("#grtotal").val());
     		pay=parseInt($("#payamt").val());
     		amt=total-pay;
     		$("#remAmt").val(amt);
   })
     



  $(document).ready(function(){

  date = new Date();

  y=date.getFullYear();
  m=date.getMonth()+1;
  d=date.getDate();
 
  if(d<10){
    d='0'+d;
  }
  if(m<10){
    m='0'+m;
  }
  
   mindt=y+"-"+m+"-"+d;
  $("#checkIn").attr("min",mindt);
  $("#checkOut").attr("min",mindt);

})

   
   $("#checkIn").on("change",function(){
     bookingData();
     })
    $("#checkOut").on("change",function(){
      bookingData();
    })
    
    $("#adults").on("change",function(){
     bookingData();
     })
    $("#children").on("change",function(){
      bookingData();
    })

  
  function bookingData(){
    checkIn=$("#checkIn").val();
    checkOut=$("#checkOut").val();
    adults=$("#adults").val();
    children=$("#children").val();


        var date1 = new Date(checkIn);
        var date2 = new Date(checkOut);
  
      // calculate the time difference of two dates
      var Difference_In_Time = date2.getTime() - date1.getTime();
      // calculate the no. of days between two dates
      var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);


     chPrice=0;
      packagePrice=$("#packagePrice").val();
      if(children<1){
        adultPrice=parseInt(packagePrice)*parseInt(Difference_In_Days)*parseInt(adults);
        Total=adultPrice;
      }
      else{
        chPrice=parseInt(children)*parseInt(Difference_In_Days)*(parseInt(packagePrice)/2);
        adultPrice=parseInt(packagePrice)*parseInt(Difference_In_Days)*parseInt(adults);
        Total=adultPrice+chPrice;
      }
      
      	$("#totalPrice").val(Total);
      	calGrandTotal();
      
  
  }


	

</script>

<?php

include 'footer.php';
?>

