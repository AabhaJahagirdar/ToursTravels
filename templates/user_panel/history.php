<?php  
   include 'userHeader.php';
   ?>
<main class="content">
   <div class="container-fluid p-0">
   <h1 class="h3 mb-3"><strong>History</strong></h1>
  
      <div class="container-fluid mt-2 ">

            <?php 
               $uid=$_SESSION['CURRENT_USER_ID'];
               $his=mysqli_query($con,"select bookonline.*,package.packageName,package.packagePrice,package.packagePhoto from bookonline,package where bookonline.packageId=package.id and bookonline.uid='$uid' and bookonline.paymentStatus='success' and bookonline.status=1 ORDER BY bookonline.id DESC ");
               if(mysqli_num_rows($his)>0){
                  while($row=mysqli_fetch_assoc($his)){         

            ?>
            <!-- card starts -->
            <div class="card mb-3" style="max-width: 100%">
               <div class="row g-0">
                  <div class="col-md-4" style="max-width: 500px; max-height:400px">
                     <img src="<?php echo SITE_PACKAGE_IMAGE.$row['packagePhoto']; ?>" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-8">
                     <div class="card-body">
                        <h6 ><?php echo $row['packageName']; ?></h6>
                        <h6 >&#8377; <?php echo $row['total']; ?></h6>
                        <h6 >Booked On: <?php echo date('d/m/Y',strtotime($row['bookedOn'])); ?></h6>
                 <a href="<?php echo SITE_PATH.'templates/'; ?>downloadPdf/<?php echo $row['bookId'];  ?>">
                        <button class="btn btn-success">
                          <span class="svg-icon svg-icon-white svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="1" width="2" height="14" rx="1"/>
        <path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) "/>
    </g>
   </svg></span>
                        Receipt</button></a>
                     </div>
                  </div>
               </div>
             </div>
            <!-- card ends -->
            <?php
               }
            }
               else{
                  echo "<h3>You haven't booked tours yet!</h3>";
               }
            ?>

            <br/>
            <br/>
         </div>
  
</main>
<?php  
   include 'userFooter.php';
?>