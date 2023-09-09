<footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="<?php echo SITE_PATH; ?>" target="_blank"><strong><?php echo SITE_NAME; ?></strong></a> &copy;
              </p>
            </div>
          
          </div>
        </div>
</footer>
</div>
</div>
      <!-- footer ends here -->
    

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
   <script src="<?php echo SITE_PATH; ?>asset/js_admin/app.js"></script>
  <script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo SITE_PATH; ?>templates/ckeditor/ckeditor.js"></script>
   <link href="<?php echo SITE_PATH; ?>asset/bootstrap.min.js" rel="stylesheet">

  <script type="text/javascript">
    $(document).ready( function () {
      $('#dttable').DataTable();
  } );

    CKEDITOR.replace('placedesc');
  </script>
 
  <script>


        function showBarGraph()
        {
            {
                $.post("bardata.php",
                function (data)
                {

                     console.log(data);
                     var earnings =[];
                     var lb=[];
                     
                     for (var i in data['data2']) {
                        earnings.push(data['data2'][i]);
                     }
                     for (var k in data['data1']) {
                        lb.push(data['data1'][k]);
                     }

                     console.log(earnings);
                     console.log(lb);

                     var bardata = {
                        labels:lb,
                        datasets: [{
                          label: "This year",
                          backgroundColor:"#34495E",
                          borderColor: window.theme.primary,
                          hoverBackgroundColor: window.theme.primary,
                          hoverBorderColor: window.theme.primary,
                          data:earnings,
                          barPercentage: .75
                        }]
                      };

                    var graphTarget =document.getElementById("chartjs-bar");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: bardata,
                        options: {
                          maintainAspectRatio: false,
                          legend: {
                            display: false
                          },
                          scales: {
                            yAxes: [{
                              gridLines: {
                                display: false
                              },
                              stacked: false,
                              ticks: {
                                stepSize: 5000
                              }
                            }],
                            xAxes: [{
                              stacked: false,
                              gridLines: {
                                color: "transparent"
                              }
                            }]
                          }
                        }
                        
                    });
                });
            }
        }
  </script>

  <script>


     $(document).ready(function () {
            showGraph();
             showBarGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                     var bookCount = [];
                    for (var i in data) {
                        bookCount.push(data[i]);
                    }
                     var chartdata = {
                        labels: ["Todays", "Online", "Offline", "Pending","Confirmed"],
                        datasets: [
                            {
                                label: 'Bookings',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: bookCount,
                                  backgroundColor: [
                                    window.theme.primary,
                                    window.theme.warning,
                                    "#C39BD3",
                                    window.theme.danger,
                                    "#246e17"
                                  ],
                                  borderColor: "transparent"
                            }
                        ]
                    };

                    var graphTarget =document.getElementById("chartjs-pie");

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                        
                    });
                });
            }
        }
  </script>
  

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
      var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
      document.getElementById("datetimepicker-dashboard").flatpickr({
        inline: true,
        prevArrow: "<span title=\"Previous month\">&laquo;</span>",
        nextArrow: "<span title=\"Next month\">&raquo;</span>",
        defaultDate: defaultDate
      });
    });

    
        
        $(".userdropdown").click(function(){
            
            $("#userDrop").toggle();
        });     


        $( "#changePassFrom" ).submit(function( event ) {  

            event.preventDefault(); 
            oldp=$( "#oldPass" ).val();
            newp=$( "#newPass" ).val(); 
            renewp=$( "#renewp" ).val(); 

            if ( oldp=== "" || newp=== "" || renewp==="") {  
              $( "#passMsg" ).text( "All fields are mandatory" ).show();  
              return;  
            }
            if(newp!==renewp){
                 $( "#repassMsg" ).text( "Password not matching!" ).show();  
              return;  
            }

              jQuery.ajax({
                  url:'changepass',
                  type:'post',
                  data:"oldPass="+oldp+"&newPass="+newp,
                  success:function(result){
                    msg=jQuery.parseJSON(result);
                    if(msg.action=="success"){
                        $( "#passMsg" ).text( "Password Changed Successfully" ).show();
                         $( "#changePassFrom" )[0].reset();
                    }
                    else{

                        $( "#passMsg" ).text( "Incorrect old password" ).show();
                    }

                  }

              }); 

        });  


  </script>



</body>
</html>