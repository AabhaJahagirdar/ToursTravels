<?php

include 'top.php';
$packages=packages();
$payDues=payDues();

?>
		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-header">
												<h5 class="card-title">Bookings</h5>
											</div>
											<div class="card-body">
												<div class="row">
														<div class="chart chart-sm">
															<canvas id="chartjs-pie"></canvas>
														</div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Tours</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="briefcase"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $packages; ?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-header">
												<h5 class="card-title">Earnings</h5>
											</div>
											<div class="card-body">
												<div class="row">
														<div class="chart">
															<canvas id="chartjs-bar"></canvas>
														</div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Payment Dues</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $payDues; ?></h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						
					</div>

				

				</div>
			</main>
			<?php 

			include 'footer.php';
			?>
