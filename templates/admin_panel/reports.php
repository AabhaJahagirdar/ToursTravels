
<?php
include ('top.php');
?>



<script src="<?php echo SITE_PATH; ?>asset/js_user/chart.min.js" type="text/javascript"></script>



<body>


		<div class="main">
			
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="..\..\asset\img_user\avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="..\..\asset\img_user\avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="..\..\asset\img_user\avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="..\..\asset\img_user\avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="..\..\asset\img_user\avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">Charles Hall</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="profile.php"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.php"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../home.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">


                    <h1 class="h3 mb-3"><strong>Reports</strong></h1>


					<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
						<div class="card flex-fill w-100">


                            <div class="main">
	
                                <div class="main-inner">
                            
                                    <div class="container">
                                        
                                     <div class="row">
                                          
                                          <div class="span12">
                                      
                                          <div class="info-box">
                                           <div class="row-fluid stats-box">
                                              <div class="span4">
                                                  <div class="stats-box-title">Visitor</div>
                                                <div class="stats-box-all-info"><img src="..\..\asset\img_user\userlogo.jpg" width="50" height="60"> 555K</div>
                                                <div class="wrap-chart"><div id="visitor-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart1" class="chart-holder" height="150" width="325"></canvas></div></div>
                                              </div>
                                              
                                              <div class="span4">
                                                <div class="stats-box-title">Likes</div>
                                                <div class="stats-box-all-info"><img src="..\..\asset\img_user\likelogo.jpg" width="40" height="50"> 66.66</div>
                                                <div class="wrap-chart"><div id="order-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart2" class="chart-holder" height="150" width="325"></canvas></div></div>
                                              </div>
                                              
                                              <div class="span4">
                                                <div class="stats-box-title">Orders</div>
                                                <div class="stats-box-all-info"><img src="..\..\asset\img_user\cartlogo.png" width="40" height="50">  15.55</div>
                                                <div class="wrap-chart">
                                                
                                                <div id="user-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart3" class="chart-holder" height="150" width="325"></canvas></div>
                                                
                                                </div>
                                              </div>
                                           </div>
                                           
                                           
                                         </div>
                                           
                                           
                                     </div>
                                     </div>      
                                          
                                        <!-- /row -->
                                
                                      <div class="row">
                                          
                                          <div class="span6">
                                              
                                              <div class="widget">
                                                    
                                                <div class="widget-header">
                                                    <i class="icon-star"></i>
                                                    <h3>Some Stats</h3>
                                                </div> <!-- /widget-header -->
                                                
                                                <div class="widget-content">
                                                    <canvas id="pie-chart" class="chart-holder" height="250" width="538"></canvas>
                                                </div> <!-- /widget-content -->
                                                    
                                            </div> <!-- /widget -->
                                            
                                              
                                              
                                              
                                        </div> <!-- /span6 -->
                                          
                                          
                                          <div class="span6">
                                              
                                              <div class="widget">
                                                        
                                                <div class="widget-header">
                                                    <i class="icon-list-alt"></i>
                                                    <h3>Another Chart</h3>
                                                </div> <!-- /widget-header -->
                                                
                                                <div class="widget-content">
                                                    <canvas id="bar-chart" class="chart-holder" height="250" width="538"></canvas>
                                                </div> <!-- /widget-content -->
                                            
                                            </div> <!-- /widget -->
                                                                
                                          </div> <!-- /span6 -->
                                          
                                      </div> <!-- /row -->
                                      
                                      
                                      
                                      
                                        
                                      
                                      
                                    </div> <!-- /container -->
                                    
                                </div> <!-- /main-inner -->
                                
                            </div> <!-- /main -->
                               </div></div></div></main>
                            
                            


                            <script>

                                var pieData = [
                                            {
                                                value: 30,
                                                color: "#F38630"
                                            },
                                            {
                                                value: 50,
                                                color: "#E0E4CC"
                                            },
                                            {
                                                value: 100,
                                                color: "#69D2E7"
                                            }
                            
                                        ];
                            
                                var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);
                            
                                var barChartData = {
                                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                                    datasets: [
                                            {
                                                fillColor: "rgba(220,220,220,0.5)",
                                                strokeColor: "rgba(220,220,220,1)",
                                                data: [65, 59, 90, 81, 56, 55, 40]
                                            },
                                            {
                                                fillColor: "rgba(151,187,205,0.5)",
                                                strokeColor: "rgba(151,187,205,1)",
                                                data: [28, 48, 40, 19, 96, 27, 100]
                                            }
                                        ]
                            
                                }
                            
                                var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
                                var myLine = new Chart(document.getElementById("bar-chart1").getContext("2d")).Bar(barChartData);
                                var myLine = new Chart(document.getElementById("bar-chart2").getContext("2d")).Bar(barChartData);
                                var myLine = new Chart(document.getElementById("bar-chart3").getContext("2d")).Bar(barChartData);
                                
                                </script>



			<script src="<?php echo SITE_PATH; ?>asset/js_admin/app.js"></script>

	
<?php

include 'footer.php';
?>
