<?php

session_start();

include ('include/database.inc.php');
include ('include/functions.inc.php');
include ('include/constants.inc.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>

  <!-- google sign in -->
  <meta name="google-signin-client_id" content="19666336114-r81ci252rgmv8ee73ikpjb6i4j8o7uf9.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_PATH; ?>asset/logo/apple-touch-icon.png">
   <title><?php echo SITE_NAME; ?></title>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo SITE_PATH; ?>asset/css_user/login-signup-css.css">
<link rel='stylesheet' href='https://unpkg.com/aos@2.3.0/dist/aos.css'>
</head>
<body>
  <button onclick="go_home()" id="home-btn"  class="home-btn"><i class="material-icons">keyboard_arrow_left</i></button>
  <script>
    function go_home(){
      window.location.href = "<?php echo SITE_PATH; ?>";
    }
   
  </script>
  <div class="video-container">
    <video src="<?php echo SITE_PATH; ?>asset/img_user/vid-1.mp4" id="video-slider" loop autoplay muted></video>
</div>
<div class="container">

  <div class="box">

     <!-- sign up using gmail or facebook -->
       <div>
         <div class="g-signin2" data-onsuccess="gmailLogIn"></div>
       </div>
       <div class="line-between"><span>OR</span></div>
     
    
  <form method="post" class="loginForm text-center">
    <h1>Login</h1>
     <span id="msg"></span>
     <div id="mainLoginForm" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <input type="text" name="phone" id="loginPhone" placeholder="Enter your Phone" required  />   
    <div class="text-center mt-3">
    <button type="submit" id="loginBtn" class="login-btn"  name="submit" >Continue</button>
    </div>
   </div>
   </form>
    <div class="loginVerify" style="display: none; flex-direction: column; justify-content: center; align-items: center;">
      <div id="recaptcha-container"></div>
      <input type="text" id="logotp" name="logotp" placeholder="OTP" required  /> 
      <button type="submit" id="verifyLoginOtp" class="login-btn"  name="submit" >Verify</button>
    </div>


    <a href="<?php echo SITE_PATH; ?>templates/sign-up">Don't have an account? Sign up</a>
    
    <br/><br/>
    <a href="<?php echo SITE_PATH; ?>templates/adminlogin">ADMIN LOGIN</a>
<br/>
    <small class="text-center">This site is protected by reCAPTCHA and the Google <br>
      <a href="https://policies.google.com/privacy">Privacy Policy</a> and
      <a href="https://policies.google.com/terms">Terms of Service</a> apply.
    </small>

  </div>
    
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script src="<?php echo SITE_PATH; ?>asset/firebase.js"></script>









</body>
</html>
