<?php

        include 'user_header.php';

   if(isset($_GET['id'])){
     $pckId=getSafeVal($_GET['id']);
      $packages=mysqli_query($con,"select * from package where id='$pckId' ");
      $packagesRow=mysqli_fetch_assoc($packages);
      $price=$packagesRow['packagePrice'];

   }
   else{
    redirect(SITE_PATH);
   }

 

   ?>
    <section class="book " id="book">

      <h1 class="head">
          <span>b</span>
          <span>o</span>
          <span>o</span>
          <span>k</span>
          <span class="space"></span>
          <span>n</span>
          <span>o</span>
          <span>w</span>
      </h1>
  
      <div class="content">
          <div class="booking-form">

            <form method="post" action="<?php echo SITE_PATH.'templates/checkout'; ?>" >

            <p id="red-msg">Please select valid check-in and check-out date</p>
            <div class="dates">
                <div class="check">
                    <p><i class="fa fa-calendar"></i> Check-in Date </p>
                    <input type="date" name="check-in-date" id="check-in-date" required>
                </div>
                <div class="check">
                    <p><i class="fa fa-calendar"></i> Check-out Date </p>
                    <input type="date" name="check-out-date" id="check-out-date" required>
                </div> 
            </div>
            <div class="passengers">
                <div class="passenger">
                    <h6 id="p-ac">Adults</h6><p>(18 Years and Above 18Years)</p>
                    <input type="number" id="adults" name="adults" value="1" min="1" required>
                </div>
                <div class="passenger">
                    <h6 id="p-ac">Children </h6><p>(Below 18Years)</p>
                    <input type="number" id="children" name="children" value="0" min="0" required>
                </div>
      
            </div>
            <div class="display-total">
                <p>Sub Total: <span id="bookingPrice"> </span></p>
                <p><span id="msgUser" class="text-danger"> </span></p>
                <input type="text" name="total" id="total" hidden value="" required>
                <input type="text" name="days" id="days" hidden value="" required>
                <input type="text" name="adultPrice" id="adultPrice" hidden value="" required>
                <input type="text" name="childrenPrice" id="childrenPrice" hidden value="" required>
                <input type="text" name="package" id="package" hidden value="<?php echo $pckId; ?>" required>
            </div>
            <button type="submit" name="book" class="book-btn" id="book-btn">BOOK NOW</button>
          </form>
          </div>
  
      </div>
  
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

    $("#check-in-date").on("change",function(){
     bookingData();
     dateMan();
     })
    $("#check-out-date").on("change",function(){
      bookingData();
    })
    
    $("#adults").on("change",function(){
     bookingData();
     })
    $("#children").on("change",function(){
      bookingData();
    })

  
  function bookingData(){
    checkIn=$("#check-in-date").val();
    checkOut=$("#check-out-date").val();
    adults=$("#adults").val();
    children=$("#children").val();


        var date1 = new Date(checkIn);
        var date2 = new Date(checkOut);
  
      // calculate the time difference of two dates
      var Difference_In_Time = date2.getTime() - date1.getTime();
      // calculate the no. of days between two dates
      var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);


     chPrice=0;
      packagePrice="<?php echo $price; ?>";
      if(children<1){
        adultPrice=parseInt(packagePrice)*parseInt(Difference_In_Days)*parseInt(adults);
        Total=adultPrice;
      }
      else{
        chPrice=parseInt(children)*parseInt(Difference_In_Days)*(parseInt(packagePrice)/2);
        adultPrice=parseInt(packagePrice)*parseInt(Difference_In_Days)*parseInt(adults);
        Total=adultPrice+chPrice;
      }
      
      if(Total<=0){
        swal("Please select valid checkin checkout dates");
        $("#msgUser").html("Please select valid checkin checkout dates");
         $("#bookingPrice").html("0");
        $("#book-btn").attr("disabled",true);

      }else{
        $("#book-btn").attr("disabled",false);
        $("#msgUser").html("");
        $("#bookingPrice").html(Total);
        $("#total").val(Total);
        $("#adultPrice").val(adultPrice);
        $("#childrenPrice").val(chPrice);
        $("#days").val(Difference_In_Days); 
      }
         

  
  }



//disable past dates
$(document).ready(function(){
  dateMan();
  bookingData();
})
  
function dateMan(){

  date = new Date();
  y=date.getFullYear();
  m=date.getMonth()+1;
  d=date.getDate();
 
  if(d<10){
    d='0'+d;
  }
  if(m<10){
    m='0'+m;
  }
  
   mindt=y+"-"+m+"-"+d;

  dbt=new Date($("#check-in-date").val());
  dbt.setDate(dbt.getDate() + 1);

  yy=dbt.getFullYear();
  mm=dbt.getMonth()+1;
  dd=dbt.getDate();
 
  if(dd<10){
    dd='0'+dd;
  }
  if(mm<10){
    mm='0'+mm;
  }
  
   chkOutMin=yy+"-"+mm+"-"+dd;

  $("#check-in-date").attr("min",mindt);
  $("#check-out-date").attr("min",chkOutMin);
  console.log(mindt+" "+chkOutMin);

}


</script>

 
<?php
    include 'user_footer.php';
?>
  
<script type="text/javascript">
  
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
