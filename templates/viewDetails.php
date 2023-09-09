<?php

       ob_start();
        include 'user_header.php';

   if(isset($_GET['id'])){

     $pckId=getSafeVal($_GET['id']);
      $packages=mysqli_query($con,"select * from package where id='$pckId' ");
      $packagesRow=mysqli_fetch_assoc($packages);
      $price=$packagesRow['packagePrice'];

      $details=mysqli_query($con,"select * from viewdetails where packageId='$pckId' ");
      $detailsRow=mysqli_fetch_assoc($details);
      if(mysqli_num_rows($details)<=0){
        redirect(SITE_PATH);
      }

      $rec=unserialize($_COOKIE['recentlyViewed']);
      
      if(count($rec)>0){
        foreach ($rec as $key=>$value) {
          if($value==$pckId){
            unset($rec[$key]);
          }
        }
      }
      
      $rec[]=$pckId;
      setcookie('recentlyViewed',serialize($rec),time()+60*60*24*365);
      print_r($rec);

   }
   else{
    redirect(SITE_PATH);
   }

 

   ?>
  
  
  <section class="packages" id="packages">  
    <div class="destination">
        <div class="destination-details">
            <h1><?php echo $packagesRow['packageName']; ?></h1>
            <div>
		  <?php 
                      if(isset($_SESSION['CURRENT_USER_ID'])){
                  ?>
                  <a href="<?php echo SITE_PATH.'templates/'; ?>bookTour/<?php echo $pckgRow['id'];  ?>"><button class="sticky-book-btn">Book Now</button></a>
                      <?php
                    }
                    else{
                      ?>
                       <a href="<?php echo SITE_PATH.'templates/'; ?>login"><button class="sticky-book-btn">Book Now</button></a>
                      <?php
                    }
                  ?>
            </div>
            <p><i id="map" class="fa fa-map-marker"></i><?php echo $detailsRow['location']; ?></p>
           
                <iframe  src="<?php echo str_replace('watch?v=','embed/',$detailsRow['link']); ?>"
                 title="YouTube video player" frameborder="0" 
                 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                 allowfullscreen ></iframe>
                 <div class="gallery">
            
                    <img src="<?php echo SITE_PACKAGE_IMAGE.$detailsRow['photoone']; ?>">
                    <img src="<?php echo SITE_PACKAGE_IMAGE.$detailsRow['phototwo']; ?>">
                    <img src="<?php echo SITE_PACKAGE_IMAGE.$detailsRow['photthree']; ?>">
                    <img src="<?php echo SITE_PACKAGE_IMAGE.$detailsRow['photofour']; ?>">
                   
                               
                </div>
                       
              
        </section>    
            <div class="to-do">
              <div class="about-dest">


              <section class="packages" id="packages">


<div class="heading"> <span class="bullet">About The Place</span></div> 

                </section>

                  <p id="about-description" style="width: 95%; margin: 0 auto; text-align: justify;"><?php echo $detailsRow['description']; ?></p>
              </div>
              <div class="things-to-do" style="width: 95%; margin: 0 auto;">
              <section class="packages" id="packages">


              <div class="heading"> <span class="bullet">Things To Know</span></div>
                </section>
                  <ul>
                      <li><i  class="material-icons">access_time</i>Checkin Time - <?php echo $detailsRow['checkin']; ?></li>
                      <li><i  class="material-icons">access_time</i>Checkout Time - <?php echo $detailsRow['checkout']; ?></li>
                      <li><i class="material-icons">info_outline</i>Carry Valid ID proof issued by Government of India</li>
                      <li><i class="material-icons">info_outline</i>Carry RT-PCR Test report prior of 48 hours</li>
                      <li><i class="material-icons">info_outline</i>No refund will be processed if any adventures/activities are cancelled due to an act of God or bad weather conditions</li>
                      <li><i class="material-icons">info_outline</i>Observe COVID-19 safety rules Regional restriction measures in place Further restrictions may be implemented at short notice</li>
                    </ul>       
               </div>
              
          </div>
           
        </div>  
     
       
    </div>
  



 
  <?php

  include 'user_footer.php';


?>
  
