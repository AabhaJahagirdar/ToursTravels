<?php
header('Content-Type: application/json');

include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/functions.inc.php');


$dt=date("Y");
$earn1=mysqli_query($con,"SELECT sum(paid) as total,MONTH(bookedOn) as month from `booking` where YEAR(bookedOn)='$dt' group by MONTH(bookedOn);");
$earn2=mysqli_query($con,"SELECT sum(total) as total,MONTH(bookedOn) as month from `bookonline` where paymentStatus='success' and YEAR(bookedOn)='$dt' and status=1 group by MONTH(bookedOn);");



$months=array();
$priceArray=array();
$mNames=array();
$getName=array("1"=>"Jan", "2"=>"Feb", "3"=>"March","4"=>"April","5"=>"May","6"=>"June","7"=>"July","8"=>"August","9"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");

if(mysqli_num_rows($earn1)>0){

	while ($row1=mysqli_fetch_assoc($earn1)){
		array_push($months, $getName[$row1['month']]);
		array_push($priceArray, $row1['total']);
	}
}

if(mysqli_num_rows($earn2)>0){
	while ($row2=mysqli_fetch_assoc($earn2)){
		foreach ($months as $key => $value) {
			if($getName[$row2['month']]==$value){
					$priceArray[$key]=$row2['total']+$priceArray[$key];
			}
		}
		
	}
}

mysqli_close($con);
echo json_encode(array('data1'=>$months,'data2'=>$priceArray));
?>