<!DOCTYPE html>
<html>
<head>
	<title></title>

  <!-- google sign in -->
  <meta name="google-signin-client_id" content="19666336114-r81ci252rgmv8ee73ikpjb6i4j8o7uf9.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">


    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init().then(function() {
             var a=gapi.auth2.getAuthInstance();
             a.signOut();
          })
      });
    }



  </script>
</body>
</html>

<?php

session_start();
 
include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/database.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/functions.inc.php');
include ($_SERVER['DOCUMENT_ROOT'].'/templates/include/constants.inc.php');

unset( $_SESSION['CURRENT_USER_ID']);
session_destroy();
redirect(SITE_PATH);

?>