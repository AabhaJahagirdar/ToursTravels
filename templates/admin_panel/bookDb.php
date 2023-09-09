<?php

      include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/database.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/functions.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/constants.inc.php');

$type=$_POST['type'];


if($type=="add"){

	$name=getSafeVal($_POST['name']);
    $phone=getSafeVal($_POST['mobile']);
    $address=getSafeVal($_POST['address']);
    $packageId=getSafeVal($_POST['pc']);
    $checkIn=getSafeVal($_POST['checkIn']);
    $checkOut=getSafeVal($_POST['checkOut']);
    $payMode=getSafeVal($_POST['ptype']);
    $adults=getSafeVal($_POST['adults']);
    $children=getSafeVal($_POST['children']);
    $packagePrice=getSafeVal($_POST['packagePrice']);
    $subTotal=getSafeVal($_POST['totalPrice']); 
    $discount=getSafeVal($_POST['dis']); 
    $disType=getSafeVal($_POST['distype']); 
    $total=getSafeVal($_POST['grtotal']); 
    $paid=getSafeVal($_POST['payamt']); 
    $rem=getSafeVal($_POST['remAmt']); 
    $shuf=str_shuffle('abdjndcbdbuidsbwoabcsjneiewiwjpajdjytessaiygvsge');
    $bookId=substr($shuf,7,5);



	$status1=mysqli_query($con,"INSERT INTO `booking`(`bookId`,`name`, `phone`,`address`,`packageId`, `packagePrice`, `checkIn`, `checkOut`, `payMode`, `adults`, `children`, `subTotal`, `discount`,`distype`, `total`, `paid`, `rem`) VALUES ('$bookId','$name','$phone','$address','$packageId','$packagePrice','$checkIn','$checkOut','$payMode','$adults','$children','$subTotal','$discount','$disType','$total','$paid','$rem')");
	$pname=$_POST['pname']; 
	$pertype=$_POST['pertype']; 
	$pamt=$_POST['pamt']; 
	 

	if(count($_POST['pname'])>0 || count($_POST['pertype'])>0 || count($_POST['pamt'])>0){
		for ($i=0; $i <count($_POST['pname']) ; $i++) { 
			$name=$pname[$i];
			$type=$pertype[$i];
			$amount=$pamt[$i];
			$status2=mysqli_query($con,"INSERT INTO `tourmembers`(`bookId`, `name`, `type`, `amount`) VALUES ('$bookId','$name','$type','$amount')");
		}

	}


	if($status1 && $status2){
		echo "success";
	}
			
			
}

if($type=="update"){

	$name=getSafeVal($_POST['name']);
    $phone=getSafeVal($_POST['mobile']);
    $packageId=getSafeVal($_POST['pc']);
    $checkIn=getSafeVal($_POST['checkIn']);
    $checkOut=getSafeVal($_POST['checkOut']);
    $payMode=getSafeVal($_POST['ptype']);
    $adults=getSafeVal($_POST['adults']);
    $children=getSafeVal($_POST['children']);
    $packagePrice=getSafeVal($_POST['packagePrice']);
    $subTotal=getSafeVal($_POST['totalPrice']); 
    $discount=getSafeVal($_POST['dis']); 
    $total=getSafeVal($_POST['grtotal']); 
    $paid=getSafeVal($_POST['payamt']); 
    $rem=getSafeVal($_POST['remAmt']); 
    $bookId=getSafeVal($_POST['bid']); 



	$status1=mysqli_query($con,"update `booking` set `name`='$name', `phone`='$phone', `packageId`='$packageId', `packagePrice`='$packagePrice', `checkIn`='$checkIn', `checkOut`='$checkOut', `payMode`='$payMode', `adults`='$adults', `children`='$children', `subTotal`='$subTotal', `discount`='$discount', `total`='$total', `paid`='$paid', `rem`='$rem' where `bookId`='$bookId' ");
	$pname=$_POST['pname']; 
	$pertype=$_POST['pertype']; 
	$pamt=$_POST['pamt']; 
	 

	if(count($_POST['pname'])>0 || count($_POST['pertype'])>0 || count($_POST['pamt'])>0){
		mysqli_query($con,"delete from `tourmembers` where bookId='$bookId' ");
		
		for ($i=0; $i <count($_POST['pname']) ; $i++) { 
			$name=$pname[$i];
			$type=$pertype[$i];
			$amount=$pamt[$i];
			$status2=mysqli_query($con,"INSERT INTO `tourmembers`(`bookId`, `name`, `type`, `amount`) VALUES ('$bookId','$name','$type','$amount')");
		}

	}else{
		mysqli_query($con,"delete from `tourmembers` where bookId='$bookId' ");
	}


	if($status1 && $status2){
		echo "success";
	}
			
			
}

?>