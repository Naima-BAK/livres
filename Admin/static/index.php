
<?php
 require ("../functions/functions.php");
if(!isset($_SESSION['name_admin'])){
	
	header("location:../client/login.php");
}

$paniers = getAllPaniers();
$users = getAllUsers();
$avis = getAllAvis();
$livres =  getAllLivres();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<?php include "includes/head.html" ?>
</head>

<body>
	<div class="wrapper">
		
  <!-- nav -->
  <?php include "includes/nav.php" ?>
	    <!-- end nav -->


		<div class="main">
			<!-- nav2 -->
			<?php include "includes/nav2.php" ?>
			<!-- end nav2 -->

			<main class="content">
			<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									
								<div class="col-sm-6">
										<!--sales  -->
								       <div style="background-color:#ffab00;" class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 style="color:white;" class="card-title">Sales</h5>
													</div>

													<div class="col-auto">
														<div style="background-color:white;" class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
                                            <?php 
											$total = 0;
											foreach($paniers as $p){
												$total = $total + $p['total'];
											}
                                            echo $total;

                                             ?> DHS
												</h1>
												
											</div>
										</div>
										<!-- end sales -->

										<div style="background-color:#71dd37;" class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 style="color:white;" class="card-title">Utilisateurs</h5>
													</div>

													<div class="col-auto">
														<div style="background-color:white;" class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"> <?php 
											$count = 0;
											foreach($users as $p){
												$count +=  1;
											}
                                            echo $count;

                                             ?> utilistaeurs
												</h1>
												
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div style="background-color:#03c3ec;" class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 style="color:white;" class="card-title">Avis</h5>
													</div>

													<div class="col-auto">
														<div style="background-color:white;" class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php 
											$count = 0;
											foreach($avis as $p){
												$count +=  1;
											}
                                            echo $count;

                                             ?> avis</h1>
												
											</div>
										</div>
										<div style="background-color:#ff3e1d;" class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 style="color:white;" class="card-title">Livres</h5>
													</div>

													<div class="col-auto">
														<div style="background-color:white;" class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
												<?php 
											$count = 1;
											foreach($livres as $p){
												$count +=  $p['quantite'];
											}
                                            echo $count;

                                             ?> livres
												</h1>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<!-- ---------------------------------------------------- -->
						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Movement</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
<!-- ---------------------------------------------------------- -->
					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Browser Usage</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Chrome</td>
													<td class="text-end">4306</td>
												</tr>
												<tr>
													<td>Firefox</td>
													<td class="text-end">3801</td>
												</tr>
												<tr>
													<td>IE</td>
													<td class="text-end">1689</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div> -->
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								
							<img src="img/imgAdmin/admin1.png" alt="">
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<!-- footer -->
				<?php include "includes/footer.php" ?>
				<!-- end footer -->
			</footer>
		</div>
	</div>

	  <!-- foot -->
	  <?php include "includes/foot.php" ?>
	  <!-- end foot -->

</body>

</html>