<?php
include 'user_header.php';

if(isset($_SESSION['bookId'])){

 $id=$_SESSION['bookId'];
 $uid=$_SESSION['CURRENT_USER_ID'];

}
else{
	redirect(SITE_PATH);
}
?>

<section id="bookingProcess"  style="padding-top: 10% !important; height: 100vh;">

	<div class="container pt-3">
		<h3>Thank You!</h3>
		<h4>Your booking is successful!</h4>
		<small>After booking confirmation your booking history will be updated!</small>
		<small>You will get confirmation acknowledgement shortly!</small>
	</div>
	


</section>


<?php

include 'user_footer.php';
unset($_SESSION['bookingArray']);

?>