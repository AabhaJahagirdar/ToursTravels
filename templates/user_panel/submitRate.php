<?php      

session_start();

include 'include/database.inc.php';
include 'include/functions.inc.php';
include 'include/constants.inc.php';


if(isset($_POST['stars']) && isset($_POST['msg'])){



 $stars=$_POST['stars'];
 $msg=$_POST['msg'];

 $uid=$_SESSION['CURRENT_USER_ID'];
 $q=mysqli_query($con,"INSERT INTO `reviews`( `userId`, `description`, `stars`) VALUES ('$uid','$msg','$stars')");

if($q){
	$arr=array("status"=>"success");
	echo json_encode($arr);
}





}




?>