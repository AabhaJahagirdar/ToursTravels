<?php
   session_start();

   
      include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/database.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/functions.inc.php');
      include ($_SERVER['DOCUMENT_ROOT'].'/Travello/templates/include/constants.inc.php');
   
   
   $favArray=getFavourites();
   $row=getCurrentUserDetails();
   
   if(!isset($_SESSION['CURRENT_USER_ID'])){
   	redirect(SITE_PATH.'templates/login');
   }
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
      <meta name="author" content="AdminKit">
      <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_PATH; ?>asset/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITE_PATH; ?>asset/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITE_PATH; ?>asset/logo/favicon-16x16.png">
    <link rel="manifest" href="<?php echo SITE_PATH; ?>asset/logo/site.webmanifest">
    <link rel="mask-icon" href="<?php echo SITE_PATH; ?>asset/logo/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
      <link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css_user/style.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Galada' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <script src="<?php echo SITE_PATH; ?>asset/js_user/script.js"></script>
      <link rel="canonical" href="https://demo-basic.adminkit.io/" />
      <title>User Panel</title>
      <link href="<?php echo SITE_PATH; ?>asset/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo SITE_PATH; ?>asset/css_admin/app.css" rel="stylesheet">
      <link href="<?php echo SITE_PATH; ?>asset/css_user/cards.css" rel="stylesheet">
      <link href="<?php echo SITE_PATH; ?>asset/css_user/rateus.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="wrapper">
      <nav id="sidebar" class="sidebar js-sidebar">
         <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="<?php echo SITE_PATH; ?>">
            <span class="align-middle">Home</span>
            </a>
            <ul class="sidebar-nav">
            <li class="sidebar-header">
               Pages
            </li>
            <li class="sidebar-item ">
               <a class="sidebar-link" href="<?php echo SITE_PATH.'templates/user_panel/'; ?>profile">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                     <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>
                  <span class="align-middle">Profile</span>
               </a>
            </li>
            <li class="sidebar-item ">
               <a class="sidebar-link" href="<?php echo SITE_PATH.'templates/user_panel/'; ?>history">
               <i class="fa fa-history fa-lg" aria-hidden="true"></i> 
               <span class="align-middle">History</span>
               </a>
            </li>
            <li class="sidebar-item ">
               <a class="sidebar-link" href="<?php echo SITE_PATH.'templates/user_panel/'; ?>favourites">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                  </svg>
                  <span class="align-middle">Favourites</span>
               </a>
            </li>

            <li class="sidebar-item">
               <a class="sidebar-link" href="<?php echo SITE_PATH.'templates/user_panel/'; ?>rateus">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                     <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>
                  <!--<i class="align-middle" data-feather="book"></i> --> <span class="align-middle">Rate Us</span>
               </a>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link" href="<?php echo SITE_PATH.'templates/user_panel/'; ?>termsandconditions">
               <i class="align-middle" data-feather="book"></i> <span class="align-middle">Terms and Conditions</span>
               </a>
            </li>
            <div class="sidebar-cta">
            </div>
         </div>
      </nav>
      <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
         <a class="sidebar-toggle js-sidebar-toggle">
         <i class="hamburger align-self-center"></i>
         </a>
         <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
               <li class="nav-item">
                  <a class="nav-link  userdropdown d-sm-inline-block" href="javascript:void(0)"  >
                  <img src="<?php  echo SITE_PROFILE_IMAGE.$row['profile']; ?>" class="avatar img-fluid rounded me-1" alt="<?php echo getCurrentUserName(); ?>" onerror="this.onerror=null;this.src=`<?php  echo $row['profile']; ?>`;">
                  <span class="text-dark"><?php echo getCurrentUserName(); ?></span>
                  <span> <i class="fas fa-caret-down"></i> </span>
                  </a>
                  <div class="card" style="width: 7rem;" id="userDrop">
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a class="dropdown-item" href="<?php echo SITE_PATH.'templates/user_panel/'; ?>logout">Log out</a></li>
                     </ul>
                  </div>
               </li>
            </ul>
         </div>
      </nav>