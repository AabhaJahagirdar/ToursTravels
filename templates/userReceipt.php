<?php 
  session_start();
   include ('include/database.inc.php');
   include ('include/functions.inc.php');
   include ('include/constants.inc.php');
   ob_start();

if(!isset($_SESSION['ADMIN'])){
   redirect(SITE_PATH.'templates/adminlogin');
}

require_once __DIR__ . '/vendor/autoload.php';

$css=file_get_contents(SITE_PATH.'asset/bootstrap.min.css');

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);



if(isset($_GET['id']) && $_GET['id']>0){
 
$id=getSafeVal($_GET['id']);

	$html=userReceipt($id);
	try {
		$mpdf->debug = true;
		$mpdf->writeHTML($css,1);//first load css in dom
		$mpdf->writeHTML($html);
		$mpdf->Output();
	} 
	catch (\Mpdf\MpdfException $e) 
	{
		echo $e->getMessage();
	}


}

ob_end_flush(); 

?>