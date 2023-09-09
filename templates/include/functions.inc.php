<?php

function redirect ($path)
{
    ?>
    <script>
        window.location.href='<?php echo $path ?>'
    </script>
    <?php
    die();
}

//print array
function pra($arr){
  echo "<pre>";
  print_r($arr);
}




function getSafeVal($str){
  global $con;
  $str=strip_tags(mysqli_real_escape_string($con,htmlspecialchars($str)));
  return $str;
}



//if user is logged in then add its favorites items in database
function manageFav($uemail,$pckgId){

    global $con;
  
    $uid=$_SESSION['CURRENT_USER_ID'];


    $res=mysqli_query($con,"select * from favourites where userId='$uid' and pckgId='$pckgId'  ");

        //insert into db
        if(mysqli_num_rows($res)==0){
            mysqli_query($con,"insert into favourites(userId, pckgId) VALUES ('$uid','$pckgId')");

        }

}

function getUserFav(){
    global $con;
    $arr=array();
    $uid=$_SESSION['CURRENT_USER_ID'];

    $res=mysqli_query($con,"select * from favourites where userId='$uid' ");
    while ($row=mysqli_fetch_assoc($res) ) {
        $arr[]=$row;
    }
    return $arr;

}

function getFavourites(){
    $fav_array=array(); //store fav

if(isset($_SESSION['CURRENT_USER_ID'])){
  //if user is logged in get fav of user from database
  $getUserFav=getUserFav();

  foreach ($getUserFav as $key => $value) {

   $fav_array[]= array(
        'pckgId'=>$value['pckgId']

      );
  }
 
}
else{

  //if user is not logged in then get cart from session
  if (isset($_SESSION['favourites']) && count($_SESSION['favourites'])>0) {
    $fav_array=$_SESSION['favourites'];
  }

}
return $fav_array;

}

function getCurrentUserName(){
     global $con;
    $uid=$_SESSION['CURRENT_USER_ID'];
    $getname=mysqli_fetch_assoc(mysqli_query($con,"select * from user where id ='$uid' "));
    $name=$getname['name'];
    return $name;
}
function getCurrentUserDetails(){

   global $con;
    $arr=array();
    if(isset($_SESSION['CURRENT_USER_ID'])){
      $uid=$_SESSION['CURRENT_USER_ID'];
      $res=mysqli_query($con,"select * from user where id ='$uid' ");
       $row=mysqli_fetch_assoc($res);
      $arr=$row;
    }
    
    return $arr;
}

function getAdminDetails(){

   global $con;
    $arr=array();
    if(isset($_SESSION['ADMIN'])){
      $uid=$_SESSION['ADMIN'];
      $res=mysqli_query($con,"select * from admin where id ='$uid' ");
       $row=mysqli_fetch_assoc($res);
      $arr=$row;
    }
    
    return $arr;
}

function onbookings(){
  global $con;
  $bookings=mysqli_num_rows(mysqli_query($con,"select * from bookonline"));

  return $bookings;

}
function offbookings(){
  global $con;
  $bookings=mysqli_num_rows(mysqli_query($con,"select * from booking"));

  return $bookings;

}
function todaybookings(){
   global $con;
   $tdate=date('Y-m-d');
   $b1=mysqli_num_rows(mysqli_query($con,"select * from booking where bookedOn='$tdate' "));
   $b2=mysqli_num_rows(mysqli_query($con,"select * from bookonline where bookedOn='$tdate' "));
  return intval($b1)+intval($b2);
}
function pendingBook(){
  global $con;
  $bookings=mysqli_num_rows(mysqli_query($con,"select * from bookonline where status=0"));
  return $bookings;

}
function cnfBook(){
  global $con;
  $bookings=mysqli_num_rows(mysqli_query($con,"select * from bookonline where status=1"));
  return $bookings;

}

function packages(){
  global $con;
  $pkg=mysqli_num_rows(mysqli_query($con,"select * from package"));
  return $pkg;

}
function payDues(){
  global $con;
  $rem=mysqli_fetch_assoc(mysqli_query($con,"SELECT count(rem) FROM `booking` WHERE rem>0"));
  return $rem['count(rem)'];

}
function userReceipt($id){

  global $con;
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

     $sql="select bookonline.*,package.packageName from bookonline,package where bookonline.packageId=package.id and bookonline.bookId='$id'";
     $res=mysqli_query($con,$sql);
     if(mysqli_num_rows($res) > 0){
      $row=mysqli_fetch_assoc($res);
      $CheckIn=date("d/m/Y", strtotime($row['checkIn']));
      $CheckOut=date("d/m/Y", strtotime($row['checkOut']));
      
      $diff=date_diff(date_create($row['checkIn']),date_create($row['checkOut']));
      $days=$diff->format("%a");

      $disType=$row['disType']; 
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
              <td>Payment Mode: </td><td>Online Transfer</td>
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

return $html;
}

?>