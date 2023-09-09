<?php 

include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/database.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/functions.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/constants.inc.php');


	if(isset($_POST['id'])){
	$pid=$_POST['id'];
	$row=mysqli_fetch_assoc( mysqli_query($con,"select * from package where id='$pid' ") );
	$packagePrice=$row['packagePrice'];

	$arr=array("status"=>"success","price"=>$packagePrice);
	echo json_encode($arr);
}









?>