<?php
session_start();
include 'include/database.inc.php';
include 'include/functions.inc.php';
include 'include/constants.inc.php';


$pkgId=getSafeVal($_POST['id']);
$operation=getSafeVal($_POST['operation']);

if($operation=="add"){
	if(isset($_SESSION['CURRENT_USER_ID'])){
		//user is logged in
		$uid=$_SESSION['CURRENT_USER_ID'];
		manageFav($uid,$pkgId);
	}
	else{
		//user is not logged in

			$_SESSION['favourites'][]=array(
				'pckgId'=>$pkgId,

			);

		

		
	}
	$totalItems=count(getFavourites());
	$arr=array('totalItems'=>$totalItems);
	echo json_encode($arr);
}

if($operation=="remove"){

	if(isset($_SESSION['CURRENT_USER_ID'])){
		//user is logged in
		$uid=$_SESSION['CURRENT_USER_ID'];
		$getUid=mysqli_fetch_assoc(mysqli_query($con,"select * from user where id='$uid' "));
		$uid=$getUid['id'];

		mysqli_query($con,"delete from favourites where userId='$uid' and pckgId='$pkgId' ");

		

	}
	else{
		//user is not logged in

			foreach ($_SESSION['favourites'] as $key => $value) {

				if($value['pckgId']==$pkgId){
					unset($_SESSION['favourites'][$key]);

				}
			}

		
	}
	$arr=array('action'=>'remove');
	echo json_encode($arr);

}


?>