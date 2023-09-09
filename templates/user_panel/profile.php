	<?php  

	include 'userHeader.php';
$msg="";
                          
//update admin profile
if(isset($_FILES['userProfile'])){

  $type=$_FILES['userProfile']['type'];

  if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
        $msg="Invalid image format";
      }
      else{

        $userProfile=rand(111111111,999999999).'_'.$_FILES['userProfile']['name'];
        move_uploaded_file($_FILES['userProfile']['tmp_name'],SERVER_PROFILE_IMAGE.$userProfile);
        $uid=$row['id'];
        mysqli_query($con,"update user set profile='$userProfile' where id='$uid' ");
        redirect(SITE_PATH.'templates/user_panel/profile');
      }
  
}

?>

<!--     PROFILE      -->

<main class="content">
<div class="container-fluid">


          <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Profile</h1>
          
          </div>
          <div class="row">
              <?php 
                    if(strlen( $msg ) > 0){
                    ?>
                    <div class="alert alert-danger" role="alert" >  <?php echo $msg;  ?> </div>
                    <?php
                      }

                  ?>    
            <div class="col-md-4 col-xl-3">
              <div class="card mb-3">
                  
                <div class="card-header">
                  <h5 class="card-title mb-0">Profile</h5>
                </div>
                <div class="card-body text-center">

                    <img src="<?php  echo SITE_PROFILE_IMAGE.$row['profile']; ?>" alt="user" class="img-fluid  mb-2 img-thumbnail" onerror="this.onerror=null;this.src=`<?php  echo $row['profile']; ?>`;"/>
      

                  <h5 class="card-title mb-0"><?php   echo $row['name']; ?></h5>

               
                  <form method="post" enctype="multipart/form-data">
                    <input class="form-control form-control-sm" type="file" id="userProfile" name="userProfile" accept="image/*">
                     <label for="userProfile"><button type="submit" class="btn btn-success btn-sm mt-3 p-1"><span data-feather="user"></span> Change Profile</button> </label>
                  </form>

                </div>
                
                
                
              </div>
            </div>

            <div class="col-md-8 col-xl-9">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title mb-0">Basic Infromation</h5>
                </div>
                  <div class="card-body text-center">

                  <table class="table" style="text-align: left;">
                    <tbody>
                      
                      <tr>
                        <th scope="row">Name</th>
                        <td><?php   echo $row['name']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">Phone Number</th>
                        <td><?php   echo $row['mobile']; ?></td>
                      </tr>

                       <tr>
                        <th scope="row">Email</th>
                        <td><?php   echo $row['email']; ?></td>
                      </tr>

                       <tr>
                        <th scope="row">Address</th>
                        <td><?php   echo $row['address']; ?></td>
                      </tr>

                  


                    </tbody>
                  </table>
                  

                </div>
              </div>

          
            </div>

          </div>
    <div class="col-xl-12">
      <div class="accordion accordion-flush" id="accordionFlushExample">

        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Edit Profile
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                        <div class="card">
                    
                    <div class="card-body h-100">

                           <form method="post" id="changeUserProfileForm" name="changeUserProfileForm">
                             <div id="recaptcha-container"></div>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                  <label for="userName" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="userName" id="userName" value="<?php   echo $row['name']; ?>">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-5 mb-3">
                                  <label for="userPhone" class="form-label">Phone</label>
                                  <input type="text" class="form-control" name="userPhone" id="userPhone" value="<?php echo $row['mobile']; ?>"><span id="phVerifyMsg"></span>
                                  <input type="hidden" id="checkVerified" value="0">
                                </div>
                                 <div class="col-sm-3 mb-3">
                                  <button id="sendOTPWalaBtn" class="btn btn-primary btn-sm mt-4">Send OTP</button>
                                </div>
                                <div class="col-sm-3 mb-3" id="changePhUserOtp" style="display: none;">
                                  <input type="text" class="form-control" name="userOTP" id="userOTP" placeholder="Enter OTP"><br>
                                  <button id="verifyOTPWalaBtn" class="btn btn-primary btn-sm " ><span class="round"></span>Verify</button>
                                </div>
                             </div>

                            <div class="row">
                                <div class="col mb-3">
                                  <label for="userAddress" class="form-label">Address</label>
                                  <textarea class="form-control" rows="3" id="userAddress" name="userAddress">
                                    <?php   echo $row['address']; ?>
                                  </textarea>
                                </div>
                              </div>
                            <button class="btn btn-success" name="submit" type="submit" id="changeSaveBtn">Save Changes</button>
                            </form>
                         </div>
                      </div> 
                      <!-- card ends -->
                  </div>
           </div>
         </div>

</div>
<!--  -->   
</div>

</div>
</main>
	<?php  

		include 'userFooter.php';
	?>
