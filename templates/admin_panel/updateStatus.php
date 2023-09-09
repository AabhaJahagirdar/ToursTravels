<?php 

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/database.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/functions.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/constants.inc.php');

$id=getSafeVal($_POST['confirmid']);
$cnf=mysqli_query($con,"update bookonline set status=1 where id='$id' ");
if($cnf){
	echo 1;
}				  
				   

				   

?>
