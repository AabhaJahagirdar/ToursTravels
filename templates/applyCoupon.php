<?php

session_start();

include 'include/database.inc.php';
include 'include/functions.inc.php';
include 'include/constants.inc.php';

$coupon=getSafeVal($_POST['coupon']);
$bookPrice=getSafeVal($_POST['bookPrice']);

$res=mysqli_query($con,"select * from coupon where couponCode='$coupon' and status='1' ");

if(mysqli_num_rows($res)>0){
	$couponRow=mysqli_fetch_assoc($res);
	$couponType=$couponRow['couponType'];
	$couponValue=$couponRow['couponValue'];
	$minValue=$couponRow['minValue'];
	$expiredOn=$couponRow['expiredOn'];


	if($bookPrice<$minValue){
		$arr=array("status"=>"error","msg"=>"Coupon need minimum value of booking: ".$minValue);
	}else{
		$date=strtotime(date('Y-m-d'));
	   if($date>strtotime($expiredOn)){
			$arr=array("status"=>"error","msg"=>"Coupon code has expired!");
		}else{

			$couponApplied=0;
			if($couponType=="r"){
				$couponApplied=$bookPrice-$couponValue;
			}
			if($couponType=="p"){
				$couponApplied=$bookPrice-$bookPrice*($couponValue/100);
			}

			$arr=array("status"=>"success","msg"=>"Coupon Code Applied!","couponApplied"=>$couponApplied);
		}
	}


}
else{

	$arr=array("status"=>"error","msg"=>"Coupon Code does not exist");

}
echo json_encode($arr);









?>