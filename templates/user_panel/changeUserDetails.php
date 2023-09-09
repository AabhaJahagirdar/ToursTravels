<?php

session_start();

 include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/database.inc.php');
 include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/functions.inc.php');
 include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/constants.inc.php');
   

if(isset($_POST['action']) && $_POST['action']=="check"){

	
     	$phone=$_POST['userPhone'];

        $uid=$_SESSION['CURRENT_USER_ID'];
		$check=mysqli_query($con,"select * from user where mobile='$phone' and id<>'$uid' ");
      
		if(mysqli_num_rows($check)>0){
			$arr=array("status"=>"error","msg"=>"Phone number already exists!");
		   echo json_encode($arr);
		}
		else{

		  $arr=array("status"=>"success","msg"=>"!!!");
		   echo json_encode($arr);
		}

}
	if(isset($_POST['action']) && $_POST['action']=="update"){
		$name=$_POST['userName'];
		$address=$_POST['userAddress'];
		$phone=$_POST['userPhone'];
        $uid=$_SESSION['CURRENT_USER_ID'];
		$check=mysqli_query($con,"update user set name='$name',address='$address',mobile='$phone' where id='$uid' ");
		
		if($check){
		  $arr2=array("status"=>"success","msg"=>"!!!");
		   echo json_encode($arr2);
		}
		else{
		$arr2=array("status"=>"error","msg"=>"");
		   echo json_encode($arr2);
		}

	}




?>