<?php
   session_start();
   
      include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/database.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/functions.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/constants.inc.php');
     
      $row=getAdminDetails();

   
      if(!isset($_SESSION['ADMIN'])){
         redirect(SITE_PATH.'templates/adminlogin');
      }
      
      ?>
<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="UTF-8">
      <title>Admin Help</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      
      <!-- Favicons -->
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_PATH; ?>asset/logo/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITE_PATH; ?>asset/logo/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITE_PATH; ?>asset/logo/favicon-16x16.png">
      <link rel="manifest" href="<?php echo SITE_PATH; ?>asset/logo/site.webmanifest">
      <link rel="mask-icon" href="<?php echo SITE_PATH; ?>asset/logo/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="theme-color" content="#ffffff">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Galada' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css'>
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css_user/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/bootstrap.min.css">
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css'>
      <link rel='stylesheet' href='https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css'>

    <style type="text/css">
         .swiper-slide{

            height: auto;
            background: #2c3e50; 
            background: -webkit-linear-gradient(to right, #3498db, #2c3e50);  
            background: linear-gradient(to right, #3498db, #2c3e50); 
            padding: 2rem 10px;
            margin: 0;
         }
         .swiper-slide .headline{
            color: white;
            font-family: poppins;
            text-transform: capitalize;
         }
         .swiper-slide .headline ul li{
            list-style-type: none;
         }
         .swiper-slide .headline h1{
            color: #FFF94C;
            margin-bottom: 1rem;
            font-size: 1.5rem;
         }
         .headline ul li:before {
            font-family: "Font Awesome 5 Free";
            content: "\f0a4";
            color:#fd7e14;
            font-weight:900;
            padding-right:10px;
         }
         .headline h1:before {
            font-family: "Font Awesome 5 Free";
            content: "\f105";
            color:wheat;
            font-weight:900;
            padding-right:10px;
         }
   </style>
   </head>
<body>


        <div class="swiper-container">
        <!-- swiper slides -->
        <div class="swiper-wrapper">
            <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/dash.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Dashboard</h1>
                  <ul>
                        <li>See analytics of tours</li>
                        <li>Earnings statistics per month of year</li>
                        <li>See Number of Payment dues</li>
                  </ul>
                </div>
                    
            </div>

            <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/profile.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Profile</h1>
                  <ul>
                        <li>Change profile photo</li>
                        <li>Change password of admin panel</li>
                        <li>Edit profile details like name,social sites etc.</li>
                  </ul>
                </div>
                    
            </div>

             <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/editview.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Manage View Details page of tour</h1>
                  <ul>
                        <li>Select tour</li>
                        <li>Add location</li>
                        <li>Add description of tour in advanced editor box as beautiful as you can!</li>
                        <li>Add 4 tour relevant images</li>
                        <li>Add youtube video link to fascinate customers</li>
                  </ul>                  
                </div>
                    
            </div>

              <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/addenq.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Manage User Enquiries</h1>
                  <ul>
                        <li>Add Enquiries of offline customers</li>
                        <li>See Enquiries by online users</li>
                        <li>Edit Enquiries</li>
                        <li>You can Delete Enquiries by clicking delete button</li>
                  </ul> 

                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/lsenq.png" class="img-fluid" >                 
                </div>
                    
            </div>


              <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/addPck.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Manage tours</h1>
                  <ul>
                        <li>Add tour in relevant category</li>
                        <li>You can give discount to tours</li>
                        <li>Edit Tour Details</li>
                        <li>You can Delete Tour by clicking delete button</li>
                  </ul> 

                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/listPck.png" class="img-fluid" >                 
                </div>
                    
            </div>

             <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/offlineBook.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Manage Offline Bookings</h1>
                  <ul>
                        <li>Add Booking details</li>
                        <li>You can give your desired discount here</li>
                        <li>Edit Booking if You want</li>
                        <li>Access booking list</li>
                        <li>Access booking receipt in booking list</li>
                  </ul> 

                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/lsOffline.png" class="img-fluid" >                 
                </div>
                    
            </div>

             <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/onlineBook.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Manage Online Bookings</h1>
                  <ul>
                        <li>See online bookings list</li>
                        <li>Confirm pending bookings and acknwoledge customer by calling them</li>
                        <li>After your confirmation online user will get receipt of booking as a confirmation</li>
                        <li>Access booking receipt in booking list</li>
                  </ul>                  
                </div>
                    
            </div>

             <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/payDues.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Manage Payment Dues</h1>
                  <ul>
                        <li>Access payment dues list</li>
                        <li>Edit payment dues if customer want to pay left amount</li>
                        <li>Keep track of total amount, paid amount, remained amount</li>
                  </ul>                  
                </div>
                    
            </div>

            <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/addCate.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Manage categories of tours</h1>
                  <ul>
                        <li>Add tour category</li>
                        <li>Access list of categories</li>
                        <li>Activate or deactivate category if you want to temporary disable that category</li>
                        <li>Delete unnecessary category</li>

                  </ul> 

                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/lscate.png" class="img-fluid" >                 
                </div>
                    
            </div>

             <div class="swiper-slide row">
              <div class="img-container col-sm-7">
                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/addcp.png" class="img-fluid" >
              </div>
                <div class="headline col-sm-5">
                  <h1>Manage coupons</h1>
                  <ul>
                        <li>Add coupon with coupon code, expiry date, minimun amount of booking required, coupon discount value etc.</li>
                        <li>Access list of coupons</li>
                        <li>Activate or deactivate Coupon if you want to temporary disable that Coupon</li>
                        <li>Delete Coupons you don't want</li>

                  </ul> 

                  <img src="<?php echo SITE_PATH; ?>asset/screenshots/lscp.png" class="img-fluid" >                 
                </div>
                    
            </div>
         
     </div>
        <!-- !swiper slides -->
        <!-- next / prev arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      
    </div>



<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js'></script>
<script  src="<?php echo SITE_PATH; ?>asset/js_user/script.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo SITE_PATH; ?>asset/bootstrap.min.js" ></script>

</body>
</html>