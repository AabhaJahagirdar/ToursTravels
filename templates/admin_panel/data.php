<?php
header('Content-Type: application/json');

include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/functions.inc.php');

$onbookings=onbookings();
$offbookings=offbookings();
$pendingBook=pendingBook();
$todaybookings=todaybookings();
$cnfBook=cnfBook();
$data = array($todaybookings,$onbookings,$offbookings,$pendingBook,$cnfBook);


mysqli_close($con);

echo json_encode($data);
?>