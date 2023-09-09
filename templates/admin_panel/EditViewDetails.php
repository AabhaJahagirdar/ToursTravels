<?php
   include 'top.php';
   
   
   $msg="";
   $placename=' ';
   $location="";
   $placedesc="";
   $link="";
   $checkin="";
   $checkout="";
   
   $one_status='required';
   $two_status='required';
   $three_status='required';
   $four_status='required';
   
   
   
   if (isset($_POST['submit'])) {
        $placeId=getSafeVal( $_POST['placeId'] ) ;
     	$location=getSafeVal( $_POST['placelocation'] ) ;
   	$placedesc=$_POST['placedesc'];
   	$link=getSafeVal($_POST['link'] ) ;
        $checkin=getSafeVal($_POST['checkin'] );
        $checkout=getSafeVal($_POST['checkout'] );
   
   		//check for id
   	$sql="select * from viewdetails where packageId='$placeId' ";      
   
   	if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){
   		$idRow=mysqli_fetch_assoc(mysqli_query($con,$sql));
   $id=$idRow['id'];
   
   
   //if id is set then update exsting package
   
   $image_condition="";
   if($_FILES['photoone']['name']!=""){

   	$type1=$_FILES['photoone']['type'];
   	//add validations on image
   	if($type1!='image/jpeg' && $type1!='image/png' && $type1!='image/jpg'){
   			$msg="Invalid image format";
   	}
   	else{
   		$photoone=rand(111111111,999999999).'_'.$_FILES['photoone']['name'];
   		move_uploaded_file($_FILES['photoone']['tmp_name'],SERVER_PACKAGE_IMAGE.$photoone);
   
   
   		$image_condition.=", photoone='$photoone' ";
   
   	}		
   
   }
   if($_FILES['phototwo']['name']!=""){
   	$type2=$_FILES['phototwo']['type'];
   
   			//add validations on image
   			if($type2!="image/jpeg" && $type2!="image/png" && $type2!="image/jpg"){
   				$msg="Invalid image format";
   			}
   			else{
   
   				$phototwo=rand(111111111,999999999).'_'.$_FILES['phototwo']['name'];
   				move_uploaded_file($_FILES['phototwo']['tmp_name'],SERVER_PACKAGE_IMAGE.$phototwo);
   	$image_condition.=", phototwo='$phototwo' ";
   
   
   			}
   
   }
   if($_FILES['photothree']['name']!=""){
   	$type3=$_FILES['photothree']['type'];
   
   			//add validations on image
   			if($type3!="image/jpeg" && $type3!="image/png" && $type3!="image/jpg"){
   				$msg="Invalid image format";
   			}
   			else{
   
   				$photothree=rand(111111111,999999999).'_'.$_FILES['photothree']['name'];
   				move_uploaded_file($_FILES['photothree']['tmp_name'],SERVER_PACKAGE_IMAGE.$photothree);
   	$image_condition.=", photthree='$photothree' ";
   			}
   
   }
   
   if($_FILES['photoone']['name']!=""){
   	$type4=$_FILES['photofour']['type'];   
   			//add validations on image
   			if($type4!="image/jpeg" && $type4!="image/png" && $type4!="image/jpg"){
   				$msg="Invalid image format";
   			}
   			else{
   
   				$photofour=rand(111111111,999999999).'_'.$_FILES['photofour']['name'];
   				move_uploaded_file($_FILES['photofour']['tmp_name'],SERVER_PACKAGE_IMAGE.$photofour);
   	$image_condition.=", photofour='$photofour' ";
   
   			}
   
   }
   
   
   
                if($msg==""){
   
   		 $checkEx=mysqli_query($con,"update viewdetails set  location='$location', description='$placedesc',link='$link' , checkin='$checkin',checkout='$checkout' $image_condition  where id='$id' and packageId='$placeId'  ");
                         }
   	}
   	else{

   //photo 1
   	$type1=$_FILES['photoone']['type'];
   
   			//add validations on image
   			if($type1!="image/jpeg" && $type1!="image/png" && $type1!="image/jpg"){
   				$msg="Invalid image format";
   			}
   			else{
   
   				$photoone=rand(111111111,999999999).'_'.$_FILES['photoone']['name'];
   				move_uploaded_file($_FILES['photoone']['tmp_name'],SERVER_PACKAGE_IMAGE.$photoone);
   
   			}
   		
   		
   
   		// photo 2
   		$type2=$_FILES['phototwo']['type'];
   
   			//add validations on image
   			if($type2!="image/jpeg" && $type2!="image/png" && $type2!="image/jpg"){
   				$msg="Invalid image format";
   			}
   			else{
   
   				$phototwo=rand(111111111,999999999).'_'.$_FILES['phototwo']['name'];
   				move_uploaded_file($_FILES['phototwo']['tmp_name'],SERVER_PACKAGE_IMAGE.$phototwo);
   
   
   			}
   		
   
   		// photo 3
   		$type3=$_FILES['photothree']['type'];
   
   			//add validations on image
   			if($type3!="image/jpeg" && $type3!="image/png" && $type3!="image/jpg"){
   				$msg="Invalid image format";
   			}
   			else{
   
   				$photothree=rand(111111111,999999999).'_'.$_FILES['photothree']['name'];
   				move_uploaded_file($_FILES['photothree']['tmp_name'],SERVER_PACKAGE_IMAGE.$photothree);
   			}
   		
   		
   
   
   		// photo 4
   		$type4=$_FILES['photofour']['type'];   
   			//add validations on image
   			if($type4!="image/jpeg" && $type4!="image/png" && $type4!="image/jpg"){
   				$msg="Invalid image format";
   			}
   			else{
   
   				$photofour=rand(111111111,999999999).'_'.$_FILES['photofour']['name'];
   				move_uploaded_file($_FILES['photofour']['tmp_name'],SERVER_PACKAGE_IMAGE.$photofour);
   
   			}
   
   if($msg==""){
   		$checkEx=mysqli_query($con,"INSERT INTO `viewdetails`(`packageId`, `location`, `description`, `link`,`photoone`, `phototwo`, `photthree`, `photofour`, `checkin`, `checkout`) VALUES ('$placename','$location','$placedesc','$link','$photoone','$phototwo','$photothree','$photofour','$checkin','$checkout')");
   }
   		
   	}
	
       if($checkEx)
   {
   $msg="Tour Details added successfully";
   }
   }
   
  
   if(isset($_POST['packageName'])){
   $tourId=$_POST['packageName'];
   $sql="select * from viewdetails where packageId='$tourId' ";
   
   if(mysqli_num_rows(mysqli_query($con,$sql)) >0 ){
   $idRow=mysqli_fetch_assoc(mysqli_query($con,$sql));

   $placename=$idRow['packageId'];
   $location=$idRow['location'];
   $placedesc=$idRow['description'];
   $link=$idRow['link'];
   $checkin=$idRow['checkin'];
   $checkout=$idRow['checkout'];
   $one_status='';
   $two_status='';
   $three_status='';
   $four_status='';
   
   }
   }
   
   ?>
<main class="content">
   <div class="container-fluid p-0">
 <?php 
               if(strlen( $msg ) > 0){
               ?>
            <div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
            <?php
               }
               
               ?> 
      <h1 class="h3 mb-3"><strong>Edit View Details</strong></h1><hr/>
<div class="row">
     <div class="col-sm-6 mb-3">
               <label for="pc" class="form-label"><b>Package Name<span class="redStar">*</span></b></label>
      <form name="toursOptionForm" method="post">
      <select class="form-select mb-3" id="packageName" name="packageName" required onchange="this.form.submit();">
	<option selected disabled>Select Tour</option>
      <?php
         $pck=mysqli_query($con,"select * from package");
          if(mysqli_num_rows($pck)>0){
            while ($pckRow=mysqli_fetch_assoc($pck)) {
                 if($placename==$pckRow['id']){
                  echo "<option selected value='".$pckRow['id']."'>".$pckRow['packageName']."</option>";
         }else{
         echo "<option value='".$pckRow['id']."'>".$pckRow['packageName']."</option>";
         
         }
           	
         	}
         }
         ?>
      </select> 
      </form>
      </div></div>

      <form method="post" enctype="multipart/form-data" id="detailsForm">
         <div class="row">
            
       
      <div class="col mb-3">
      <label for="placelocation" class="form-label">Location<span class="redStar">*</span></label>
      <input class="form-control"  id="placelocation" name="placelocation" required value="<?php echo $location; ?>">
     <input hidden value="<?php echo $placename; ?>" name="placeId" ></input>
      </div>
      </div>
      <div class="row">
         <div class="col mb-3">
<label for="placedesc" class="form-label">Description<span class="redStar">*</span></label>
            <textarea class="form-control" rows="3" id="placedesc" name="placedesc" required><?php echo $placedesc; ?></textarea>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4  mb-3">
            <label for="checkin" class="form-label">Checkin Time<span class="redStar">*</span></label>
            <input type="time" class="form-control"  id="checkin" name="checkin" required value="<?php echo $checkin; ?>">
         </div>
         <div class="col-sm-4  mb-3">
            <label for="checkout" class="form-label">Checkout Time<span class="redStar" >*</span></label>
            <input type="time" class="form-control"  id="checkout" name="checkout" required value="<?php echo $checkout; ?>">
         </div>
      </div>
      <div class="row">
         <!-- photo 1 -->
         <div class="col-sm-4 mb-3">
            <label for="packagePhoto" class="form-label">Package Photo 1
            <?php if($one_status=='required')
               {
               ?> 
            <span class="redStar">*</span>
            <?php
               }
               ?>
            </label>
            <input class="form-control form-control-sm" type="file" id="photoone" name="photoone"  <?php echo $one_status; ?>>
         </div>
         <!-- photo 2 -->
         <div class="col-sm-4 mb-3">
            <label for="phototwo" class="form-label">Package Photo 2
            <?php if($two_status=='required')
               {
               ?> 
            <span class="redStar">*</span>
            <?php
               }
               ?>
            </label>
            <input class="form-control form-control-sm" type="file" id="phototwo" name="phototwo"  <?php echo $two_status; ?>>
         </div>
         <!-- photo 3 -->
         <div class="col-sm-4 mb-3">
            <label for="photothree" class="form-label">Package Photo 3
            <?php if($three_status=='required')
               {
               ?> 
            <span class="redStar">*</span>
            <?php
               }
               ?>
            </label>
            <input class="form-control form-control-sm" type="file" id="photothree" name="photothree"  <?php echo $three_status; ?>>
         </div>
         <!-- photo 4 -->
         <div class="col-sm-4 mb-3 mr-3">
            <label for="photofour" class="form-label">Package Photo 4
            <?php if($four_status=='required')
               {
               ?> 
            <span class="redStar">*</span>
            <?php
               }
               ?>
            </label>
            <input class="form-control form-control-sm" type="file" id="photofour" name="photofour"  <?php echo $four_status; ?>>
         </div>
         <div class="col-sm-6 mb-3">
		<label for="link" class="form-label">Youtube video link<span class="redStar">*</span></label>
            <input type="text" class="form-control" id="link" required name="link" value="<?php echo $link; ?>">
         </div>
      </div>
      <input name="submit" type="submit"  class="btn btn-success" value="Submit">
      </form>
   </div>
</main>
<script src="<?php echo SITE_PATH; ?>asset\js_admin\app.js"></script>
<?php
   include 'footer.php';
   ?>