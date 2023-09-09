<?php

include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/database.inc.php');

if(isset($_POST['oldPass']) && isset($_POST['newPass'])){


	$oldp=$_POST['oldPass'];
	$newp=$_POST['newPass'];

	$adminRow=mysqli_fetch_assoc(mysqli_query($con,"select * from admin"));
	$dbpass=$adminRow['pass'];

	if(password_verify($oldp,$dbpass)){
		$insertPass = password_hash($newp, PASSWORD_BCRYPT);
		$check=mysqli_query($con,"update admin set pass='$insertPass' ");
		if($check){
			$data = array("action"=>"success");	
		}
		echo json_encode($data);
	}
	else{
		$data = array("action"=>"fail");
		echo json_encode($data);
	}


}


mysqli_close($con);

?>