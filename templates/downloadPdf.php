<?php 
session_start();

include 'include/database.inc.php';
include 'include/functions.inc.php';
include 'include/constants.inc.php';

ob_start();

if(!isset($_SESSION['CURRENT_USER_ID'])){
	redirect(SITE_PATH.'templates/login');
}

require_once __DIR__ . '/vendor/autoload.php';

$css=file_get_contents(SITE_PATH.'asset/bootstrap.min.css');

$mpdf = new \Mpdf\Mpdf();

if(isset($_GET['id'])){
 
 $id=getSafeVal($_GET['id']);

$html=userReceipt($id);
try {
        $mpdf->debug = true;
	$mpdf->writeHTML($css,1);//first load css in dom
	$mpdf->writeHTML($html);
	$mpdf->Output(time().'.pdf','D');
} catch (\Mpdf\MpdfException $e) { 
        echo $e->getMessage();
}


}

ob_end_flush(); 

?>