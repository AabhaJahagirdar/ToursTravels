<?php 
   session_start();
   include ('include/database.inc.php');
   include ('include/functions.inc.php');
   include ('include/constants.inc.php');
    ob_start();

if(!isset($_SESSION['ADMIN'])){
   redirect(SITE_PATH.'templates/adminlogin.php');
}

require_once __DIR__ . '/vendor/autoload.php';

$css=file_get_contents(SITE_PATH.'asset/bootstrap.min.css');

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);


if(isset($_GET['id']) && $_GET['id']>0){
 
$id=$_GET['id'];

$html='<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		h1{
			font-size:30px;
		}
		h6{
			font-size:18px;
		}
		th{
			font-size:18px;
		}
		td{
			font-size:18px;
		}
		.heading{
				background-color:#034f84;
				color:white;
			    padding:5px 0;
				border-bottom:1px solid black;
		}
		.brec{
			margin:12px 0;
		}
		.details{
			border-top:1px solid black;
			margin:10px;
			padding:10px;
			border-bottom:1px solid black;
		}
		.btm{
			background-color:#034f84;
		}
		.btm td{
      		font-size:20px;
			padding:5px 0;
			color:white;
		}


	</style>
</head>
<body>
	<div class="col-12 mb-4" style="border: 1px solid black;">
		<div class="text-center heading">
			<h1>Imperious Tours</h1>
			<p>Shushant Lok 3 Near Hong Kong Bazzar,Gurugram Pin 122001, Haryana.</p>
			
		</div>
	
		<h5 class="text-center brec">BILL RECEIPT</h5>
		<div class="details">
		  <table class="table">';

		 $sql="select booking.*,package.packageName from booking,package where booking.packageId=package.id and booking.id='$id' ";
		 $res=mysqli_query($con,$sql);
		 if(mysqli_num_rows($res) > 0){
		 	$row=mysqli_fetch_assoc($res);
		 	$CheckIn=date("d/m/Y", strtotime($row['checkIn']));
		 	$CheckOut=date("d/m/Y", strtotime($row['checkOut']));
		 	
		 	$diff=date_diff(date_create($row['checkIn']),date_create($row['checkOut']));
			$days=$diff->format("%a");

			$disType=$row['distype']; 
			if($disType=='cash')
			{
				$sign="&#8377;";
		    }
		    if($disType=='per')
		    {
		    	$sign="%";
			}
		 }

		  	$html.='<tbody>
		  	   <tr>
			    
		        	<td>Name: </td><td>'.$row['name'].'</td>
		        	<td>Mobile: </td><td>'.$row['phone'].'</td>
		        </tr>
		        <tr>
		        	<td>Address: </td><td>'.$row['address'].'</td>
		        </tr>

		        <tr>
		        	<td>Package: </td><td>'.$row['packageName'].'</td>
		        	<td>Payment Mode: </td><td>'.$row['payMode'].'</td>
		        </tr>
		        <tr>
		        	<td>Check In: </td><td>'.$CheckIn.'</td>
		        	<td>Check Out: </td><td>'.$CheckOut.'</td>
		       
		        </tr>
		        </tbody>
		    </table>
		    </div>
		

		<table class="table  m-3">
			<thead>
				<tr class="table-secondary">
					<th>Persons</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Days</th>
					<th>Amount</th>
				</tr>
			</thead>
			<br><br>


			<tbody>
				<tr>
					<td>Adult</td>
					<td>'.$row['adults'].'</td>
					<td>'.$row['packagePrice'].'</td>
					<td>'.intval($days).'</td>
					<td>'.intval($row['adults'])*intval($row['packagePrice'])*intval($days).'</td>
				</tr>
				<tr>
					<td>Child</td>
					<td>'.$row['children'].'</td>
					<td>'.(intval($row['packagePrice'])/2).'</td>
					<td>'.intval($days).'</td>
					<td>'.intval($row['children'])*(intval($row['packagePrice'])/2)*intval($days).'</td>
				</tr>
					<br><br>
				<tr class="btm">
					<td></td><td></td><td></td>
					<td>Subtotal</td>
					<td>&#8377;'.$row['subTotal'].'</td>
				</tr>
				<tr class="btm">
					<td></td><td></td><td></td>
					<td>Discount</td>
					<td>'.$row['discount'].$sign.'</td>
				</tr>
				<tr class="btm">
					<td></td><td></td><td></td>
					<td class="table-active">Grand Total</td>
					<td class="table-active">&#8377;'.$row['total'].'</td>
				</tr>

			</tbody>
		</table>


	</div>

</body>
</html>';


// $mpdf->Output('test.pdf','F');
try {
        $mpdf->debug = true;
	$mpdf->writeHTML($css,1);//first load css in dom
	$mpdf->writeHTML($html);
	$mpdf->Output();
} catch (\Mpdf\MpdfException $e) { 
        echo $e->getMessage();
}



}

ob_end_flush(); 
?>