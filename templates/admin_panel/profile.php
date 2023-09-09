<?php

include ('top.php');

$msg="";

                          

//update admin profile
if(isset($_POST['submit'])){
  
  $adminName=$_POST['adminName'];
    $adminPhone=$_POST['adminPhone'];
    $adminLocation=$_POST['adminLocation'];
  $adminEmail=$_POST['adminEmail'];
    $adminWeb=$_POST['adminWeb'];
    $adminFb=$_POST['adminFb'];
    $adminInsta=$_POST['adminInsta'];
    $adminWh=$_POST['adminWh'];
    $adminYt=$_POST['adminYt'];



    $adminQ=mysqli_query($con,"update `admin` set `name`='$adminName', `email`='$adminEmail', `phone`='$adminPhone', `address`='$adminLocation',`website`='$adminWeb',`fb`='$adminFb',`insta`='$adminInsta',`whatsapp`='$adminWh',`youtube`='$adminYt' ");
      if($adminQ){
        redirect(SITE_PATH.'templates/admin_panel/profile');
      }

    ?>

      <script type="text/javascript"></script>
    <?php

  
}

if(isset($_FILES['adminProfile'])){

  $type=$_FILES['adminProfile']['type'];

  if($type!="image/jpeg" && $type!="image/png" && $type!="image/jpg"){
        $msg="Invalid image format";
      }
      else{

        $adminProfile=rand(111111111,999999999).'_'.$_FILES['adminProfile']['name'];
        move_uploaded_file($_FILES['adminProfile']['tmp_name'],SERVER_PROFILE_IMAGE.$adminProfile);
        mysqli_query($con,"update admin set profile='$adminProfile'");
        
           
        redirect(SITE_PATH.'templates/admin_panel/profile');

      }

  
}

?>
      
      <main class="content">
        <div class="container-fluid p-0">



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
                  <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">
                  
                  <a target="_blank" href="<?php echo SITE_PROFILE_IMAGE.$row['profile']; ?>">
                    <img src="<?php  echo SITE_PROFILE_IMAGE.$row['profile']; ?>" alt="user" class="img-fluid  mb-2 img-thumbnail" />
                  </a>
                  
                  <h5 class="card-title mb-0"><?php   echo $row['name']; ?></h5>

                  <form method="post" enctype="multipart/form-data">
                    <input class="form-control form-control-sm" type="file" id="adminProfile" name="adminProfile" accept="image/*">
                     <label for="adminProfile"><button type="submit" class="btn btn-success btn-sm mt-3 p-1"><span data-feather="user"></span> Change Profile</button> </label>

                  </form> 
<br>
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span data-feather="key"></span> Change Password
</button>


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
                        <th scope="row">Email Address</th>
                        <td><?php   echo $row['email']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">Phone Number</th>
                        <td><?php   echo $row['phone']; ?></td>
                      </tr>
                      <tr>
                        <th scope="row">Website</th>
                        <td><a target="_blank" href=<?php echo $row['website']; ?> > <?php   echo $row['website']; ?> </a> </td>
                      </tr>
                       <tr>
                        <th scope="row">Location</th>
                        <td><?php   echo $row['address']; ?></td>
                      </tr>

                  


                    </tbody>
                  </table>
                  

                </div>
              </div>

          
            </div>
            <!-- Change pass modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span id="passMsg" class="text-danger"></span>
        <form id="changePassFrom">
          <div class="mb-3">
            <label for="oldPass" class="col-form-label">Old Password:</label>
            <input type="text" class="form-control" id="oldPass">
          </div>
          <span id="repassMsg" class="text-danger"></span>
          <div class="mb-3">
            <label for="newPass" class="col-form-label">New Password:</label>
            <input class="form-control" id="newPass">
          </div>

          <div class="mb-3">
            <label for="renewp" class="col-form-label">Repeat Password:</label>
            <input class="form-control" id="renewp">
          </div>

        <button type="submit" class="btn btn-primary">Change Password</button>

        </form>
      </div>
    </div>
  </div>
</div>

          </div>
    <div class="col-md-8 col-xl-12">
        
                <div class="card">
                  <div class="card-header">
                    <h3>Edit Profile</h3>
                  </div>
                    
                    <div class="card-body h-100">

                           <form method="post" id="adminFrom">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                  <label for="adminName" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="adminName" id="adminName" value="<?php   echo $row['name']; ?>">
                                </div>
                                <div class="col-sm-6 mb-3">
                                  <label for="adminPhone" class="form-label">Phone</label>
                                  <input type="text" class="form-control" name="adminPhone" id="adminPhone" value="<?php   echo $row['phone']; ?>">
                                </div>
                             </div>

                            <div class="row">
                                <div class="col mb-3">
                                  <label for="adminLocation" class="form-label">Location</label>
                                  <textarea class="form-control" rows="3" id="adminLocation" name="adminLocation">
                                    <?php   echo $row['address']; ?>
                                  </textarea>
                                </div>
                              </div>

                             <div class="row">
                                 <div class="col-sm-6 mb-3">
                                  <label for="adminEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="adminEmail" name="adminEmail" value="<?php   echo $row['email']; ?>">
                                </div>
                                <div class="col-sm-6 mb-3">
                                  <label for="adminWeb" class="form-label">Website</label>
                                  <input type="text" class="form-control" id="adminWeb" name="adminWeb" value="<?php   echo $row['website']; ?>">
                                </div>
                            </div>

                             <div class="row">
                            
                                  <label class="form-label">Social Links</label>
                                  <div class="col-sm-6 mb-3">
                                  <i class="fab fa-facebook p-3"></i>
                                      <input type="text" class="form-control" name="adminFb"  value="<?php   echo $row['fb']; ?>">
                                   </div>
                                   <div class="col-sm-6 mb-3">
                                  <i class="fab fa-instagram p-3"></i>
                                      <input type="text" class="form-control" name="adminInsta" value="<?php   echo $row['insta']; ?>">
                                   </div>
                                   <div class="col-sm-6 mb-3">
                                  <i class="fab fa-whatsapp p-3"></i>
                                      <input type="text" class="form-control" name="adminWh" value="<?php   echo $row['whatsapp']; ?>">
                                   </div>

                                   <div class="col-sm-6 mb-3">
                                  <i class="fab fa-youtube p-3"></i>
                                      <input type="text" class="form-control" name="adminYt" value="<?php   echo $row['youtube']; ?>">
                                   </div>
                              
                             </div>


                            <button class="btn btn-success" name="submit" type="submit">Save Changes</button>

                            </form>
                         </div>
                      </div> 
                      <!-- card ends -->

</div>



      
      </main>

      <?php

        include 'footer.php';

      ?>
