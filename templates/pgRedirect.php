<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
require_once("include/database.inc.php");
include ('include/constants.inc.php');

$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;


$paramList["CALLBACK_URL"] = SITE_PATH."templates/pgResponse";
// $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
// $paramList["EMAIL"] = $EMAIL; //Email ID of customer
// $paramList["VERIFIED_BY"] = "EMAIL"; //
// $paramList["IS_USER_VERIFIED"] = "YES"; //


//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);


?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>"   name="f1">
			
		<table border="1">
			<tbody>

			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
	</form>
</body>
</html>

<?php
$name=$_POST['name'];
$phone=$_POST['mobile'];
$adrs=$_POST['adrs'];
$check_in=$_POST['check_in'];
$check_out=$_POST['check_out'];
$adults=$_POST['adults'];
$children=$_POST['children'];
$subTotal=$_POST['total'];
$packageId=$_POST['package'];
$packagePrice=$_POST['packagePrice'];
$dis=$_POST['dis'];
$disType=$_POST['disType'];
$coupon=$_POST['coupon'];
$uid=explode("_", $CUST_ID)[1];

$q=mysqli_query($con,"INSERT INTO `bookonline`(`uid`, `bookId`, `name`, `phone`, `address`, `packageId`, `packagePrice`, `checkIn`, `checkOut`, `adults`, `children`, `subTotal`, `discount`, `disType`, `coupon`, `total`, `paymentStatus`) VALUES ('$uid','$ORDER_ID','$name','$phone','$adrs','$packageId','$packagePrice','$check_in','$check_out','$adults','$children','$subTotal','$dis','$disType','$coupon','$TXN_AMOUNT','pending')");

if($q){
	?>
	<script type="text/javascript">
			document.f1.submit();
		</script>
	<?php

}
?>