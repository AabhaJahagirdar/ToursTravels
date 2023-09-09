<?php

session_start();

include ('include/database.inc.php');
include ('include/constants.inc.php');
include ('include/functions.inc.php');

$type=$_POST['type'];

if($type=="signUp"){


		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$add=$_POST['add'];


		$check=mysqli_query($con,"INSERT INTO `user`(`name`, `mobile`, `address`) VALUES ('$name','$mobile','$add') ");

		if($check){
			$arr=array("status"=>"success","msg"=>"Registered successfully!");
			$check=mysqli_query($con,"select * from user where mobile='$mobile' ");
			$row=mysqli_fetch_assoc($check);
			$_SESSION['CURRENT_USER_ID']=$row['id'];
		   echo json_encode($arr);
		}
		else{

		  $arr=array("status"=>"fail","msg"=>"Please Try Again");
		   echo json_encode($arr);
		}


}

if($type=="checkMobile"){


		$mobile=$_POST['mobile'];

		$checkMb=mysqli_query($con,"select * from user where mobile='$mobile'");

		if(mysqli_num_rows($checkMb)>0){
			$arr=array("status"=>"success","msg"=>"Enter OTP sent to ".$mobile);
		    echo json_encode($arr);
		}
		else{
			$arr=array("status"=>"fail","msg"=>"Mobile no. not registered ");
		    echo json_encode($arr);

		}
	
}

if($type=="checkMbEmail"){


		$mobile=$_POST['mobile'];
		$email=$_POST['email'];

		$checkMb=mysqli_query($con,"select * from user where mobile='$mobile'");
		$checkEm=mysqli_query($con,"select * from user where email='$email'");

		if(mysqli_num_rows($checkMb)>0 || mysqli_num_rows($checkEm)>0){
			if(mysqli_num_rows($checkMb)>0){
				$arr=array("fail"=>"success","msg"=>"Mobile already registered!");
		    	echo json_encode($arr);
			}
			if(mysqli_num_rows($checkEm)>0){
				$arr=array("fail"=>"success","msg"=>"Email already registered!");
		    	echo json_encode($arr);
			}
	
		}
		else{
			$arr=array("status"=>"success","msg"=>"Register successfully!");
		    echo json_encode($arr);
		}
		
}

if($type=="login"){


		$mobile=$_POST['mobile'];

		$check=mysqli_query($con,"select * from user where mobile='$mobile' ");

		if(mysqli_num_rows($check)>0){
			$row=mysqli_fetch_assoc($check);
			$_SESSION['CURRENT_USER_ID']=$row['id'];
			$arr=array("status"=>"success","msg"=>"login successfully");
		    echo json_encode($arr);
		}
		else{
			$arr=array("status"=>"fail","msg"=>"Unable to login!");
		    echo json_encode($arr);

		}
		



}
if($type=="adminlogin"){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];

		$check=mysqli_query($con,"select * from admin where name='$uname' ");

		if(mysqli_num_rows($check)>0){

			$row=mysqli_fetch_assoc($check);
			$adminpass=$row['pass'];

			if (password_verify($pass, $adminpass)) {
				$_SESSION['ADMIN']=$row['id'];
				$arr=array("status"=>"success","msg"=>"login successfully");
			    echo json_encode($arr);
			} else {
				$arr=array("status"=>"fail","msg"=>"Invalid username or password!");
			    echo json_encode($arr);
			}

		}
		else{
			$arr=array("status"=>"fail","msg"=>"Invalid username or password!");
		    echo json_encode($arr);

		}
		
}

if($type=="regUsingGmail"){


		$name=getSafeVal($_POST['name']);
		$email=getSafeVal($_POST['email']);
		$profile=getSafeVal($_POST['profile']);

		$checkEmailExist=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email' "));
       if($checkEmailExist>0){
       		    $arr=array("status"=>"success","msg"=>"Login successfully!");
				$check=mysqli_query($con,"select * from user where email='$email' ");
				$row=mysqli_fetch_assoc($check);
				$_SESSION['CURRENT_USER_ID']=$row['id'];
			   echo json_encode($arr);
       }else{

			$check=mysqli_query($con,"INSERT INTO `user`(`name`, `email`, `profile`) VALUES ('$name','$email','$profile') ");

			if($check){
				$arr=array("status"=>"success","msg"=>"Registered successfully!");
				$check=mysqli_query($con,"select * from user where email='$email' ");
				$row=mysqli_fetch_assoc($check);
				$_SESSION['CURRENT_USER_ID']=$row['id'];
			   echo json_encode($arr);
			}
			else{

			  $arr=array("status"=>"fail","msg"=>"Please Try Again");
			   echo json_encode($arr);
			}

       }


}

?>