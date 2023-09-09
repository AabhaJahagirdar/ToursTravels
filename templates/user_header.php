<?php
session_start();
include 'include/database.inc.php';
include 'include/functions.inc.php';
include 'include/constants.inc.php';

$favArray=getFavourites();
$fav_count=count($favArray);
$currentUserDetails=getCurrentUserDetails();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
   <head>
      <!-- google sign in -->
      <meta name="google-signin-client_id" content="875579401591-3sthut12r3le5hl4noodducetvrmek04.apps.googleusercontent.com">
      <script src="https://apis.google.com/js/platform.js" async defer></script>

      <meta charset="UTF-8">
      <title><?php echo SITE_NAME; ?></title>
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
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css_user/home-css.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Galada' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css'>
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css_user/style.css">
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css_user/destination-details-css.css"/>
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css_user/home-css.css"/>
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
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css_user/home-css.css">
   </head>
   <body>
      <nav class="navbar">
         <div class="logo">
            <a href="<?php echo SITE_PATH; ?>"><img src="<?php echo SITE_PATH; ?>asset/logo/apple-touch-icon.png"></a>
            <div class="bars" onclick="menuToggle()"><i class="fas fa-bars"></i></div>
         </div>
         <ul class="nav-menu">
            <li class="nav-item"><a href="<?php echo SITE_PATH; ?>">Home</a></li>
            <?php
               if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                   $url = "https://";   
               }
               else{
                   $url = "http://";  
               }
                if($url.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==SITE_PATH.'templates/favourites'){
                   echo '';
                } 
                else{
                   echo '<li class="nav-item"><a href="#about">About us</a></li>';
                }
               
                ?>
            <li class="nav-item"><a href="<?php if(isset($_SESSION['CURRENT_USER_ID'])){
               echo SITE_PATH."templates/user_panel/profile";
               }else{
               echo SITE_PATH."templates/login";
               } ?>">
               <?php if(isset($_SESSION['CURRENT_USER_ID']))
                  { ?>Hi, <?php echo getCurrentUserName(); }
                  else{
                    ?>
               <i class="material-icons">person</i>
               <?php
                  }
                  
                  ?>
               </a>
            </li>
            <li class="nav-item" >
              <a  href="<?php echo SITE_PATH; ?>templates/favourites">    <i class="material-icons is-liked bouncy">favorite 
                <span id="favItems" class="count"><?php echo $fav_count; ?></span></i>
              </a> 
              </li>
         </ul>
      </nav>
      <div class="alert alert-success w-20 successMsg" id="addToCartSuccess" role="alert" >
         <i class="fas fa-check-circle green-tick"></i>Added to cart successfully!
      </div>
      <div class="alert alert-success w-20 successMsg" id="addToFavSuccess" role="alert" >
         <i class="fas fa-check-circle green-tick"></i>Added to Favourites successfully!
      </div>