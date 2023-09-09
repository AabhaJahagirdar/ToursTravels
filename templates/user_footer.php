<footer class="footer">

  <div class="box-container">
    <div class="box">
      <h5 class="fooLabel">Stay Connected With Us</h5>
      <?php
        $adminSocial=mysqli_fetch_assoc(mysqli_query($con,"select * from admin"));
        $fb="";
        $insta="";
        $whatsapp="";
        $phone="";
        if($adminSocial>0){
          $phone=$adminSocial['phone'];
          $fb=$adminSocial['fb'];
          $insta=$adminSocial['insta'];
          $whatsapp=$adminSocial['whatsapp'];
          $youtube=$adminSocial['youtube'];
        }
      ?>
      <a href="<?php echo $fb;  ?>" target="_blank" class="d-inline">
      <i id="s-icon" class="fab fa-facebook-square" style="color:#4267B2"></i> </a>
      <a href="<?php echo $insta;  ?>" target="_blank" class="d-inline">
        <i  id="s-icon" class="fab fa-instagram" style="color:#e1306c"></i>
      </a>
      <a href="https://wa.me/+91<?php echo $whatsapp;  ?>" target="_blank" class="d-inline">
        <i  id="s-icon" class="fab fa-whatsapp"  style="color:#25D366"></i>
      </a>
      <a href="<?php echo $youtube;  ?>" target="_blank" class="d-inline">
        <i  id="s-icon" class="fab fa-youtube" style="color:#e1306c"></i>
      </a>
      <br><br>
      <h5 class="fooLabel">Address</h5>
      <p class="address">
        315/4,<br>Z.P. Colony,<br> Vijay Nagar,<br>Vijapur Road,<br>Solapur - 413004.
       <br><i class="fa fa-phone"></i> +91<?php echo $phone;  ?></p>
    </div>
      <div class="box">
        <h5 class="fooLabel">Quick Links</h5>
        <a href="<?php echo SITE_PATH; ?>">Home</a>
        <a href="<?php echo SITE_PATH; ?>#packages">Destinations</a>
        <a href="<?php echo SITE_PATH; ?>#services">Services</a>
        <a href="<?php echo SITE_PATH; ?>#offers">Exclusive Deals</a>
        <a href="<?php echo SITE_PATH; ?>#review">Testimonials</a>
        <a href="<?php echo SITE_PATH; ?>#about">About us</a>
      </div>
      <div class="box">
        <h5 class="fooLabel">Discuss Your Queries with us</h5>
        <form method="POST" action="">
          <input type="text" name="phone" id="phone" placeholder="Phone Number" required>
          <textarea name="query" id="query" cols="30" rows="10" placeholder="Any Query.." required></textarea>
          <button class="query-btn"  type="submit" name="submitQuery">Send</button>
        </form>
        </div>

     

  </div>

 <p class="credit">
         <!-- Copyright &copy; -->
            <script>document.write(new Date().getFullYear());</script> <a href="<?php echo SITE_PATH; ?>" style="text-decoration: none; color: #000;"><b>Imperious Tours</b></a>.
          All rights reserved | Developed By <a target="_blank" style="text-decoration: none; color: #000;"><b> Aabha Nandkumar Jahagirdar </b></a> </p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script src="<?php echo SITE_PATH; ?>asset/firebase.js"></script>

<script src="<?php echo SITE_PATH; ?>asset/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Push notification js -->
   <script src="<?php echo SITE_PATH; ?>asset/push.min.js"></script>
   <script src="<?php echo SITE_PATH; ?>asset/serviceWorker.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
      window.addEventListener("scroll",function(){
        var nav =document.querySelector("nav");
        nav.classList.toggle("sticky",window.scrollY>50);
          })
</script>
<script type="text/javascript" src="<?php echo SITE_PATH; ?>asset/js_user/script.js"></script>
<button onclick="topFunction()" id="myBtn"  class="scroll"><i class="material-icons">keyboard_arrow_up</i></button>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
  mybutton.style.display = "block";
} else {
  mybutton.style.display = "none";
}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}


  </script>
  
</body>
</html>
<?php

if(isset($_POST['searchKey'])){
   $key=getSafeVal($_POST['search']);
   $searchRes=mysqli_query($con,"select * from package where packageName like '%$key%' or packageDesc like '%$key%';");
   if(mysqli_num_rows($searchRes)<=0){
	   $searchCate=mysqli_query($con,"select * from category where name like '%$key%' or description like '%$key%' and status=1;");
	   if(mysqli_num_rows($searchCate)>0){
	$cateDom=mysqli_fetch_assoc($searchCate);
?>
<script type="text/javascript">
	id="<?php echo $cateDom['name']; ?>";
    	sc=$(`*[id^="${id}"]`);
	window.scroll(sc.offset().left,parseInt(sc.offset().top)-120);
</script>
<?php
		
	   }else{

    ?>
    <script type="text/javascript">alert("Result Not Found!");</script>
    <?php
    //redirect(SITE_PATH);
    }
   }
   else{
    $keyRow=mysqli_fetch_assoc($searchRes);
    $keyid=$keyRow['id'];
    redirect(SITE_PATH.'templates/viewDetails/'.$keyid);
   }
}
?>
<?php
  
  if (isset($_POST['submitQuery'])) {
    $phone=$_POST['phone'];
    $query=$_POST['query'];
    $q=mysqli_query($con,"INSERT INTO `query`(`phone`, `query`) VALUES ('$phone','$query')");
    if($q){
      ?>
        <script type="text/javascript">swal("Thanks!","Thank you for your response!","success")</script>
      <?php
    }
  }

?>