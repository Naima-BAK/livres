
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

					<!-- <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1> -->

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
														<i class="align-middle" data-feather="dollar-sign"></i>
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
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
</svg>
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
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
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
								
								<img src="img/imgAdmin/admin2.png" alt="">
							</div>
						</div>
					</div>
<!-- ---------------------------------------------------------- -->
					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Percentage des utilisateurs selon le genre</h5>
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
													<td style="color:blue;">Femmes</td>
													<td class="text-end">5</td>
												</tr>
												<tr>
													<td  style="color:orange;">Hommes</td>
													<td class="text-end">4</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">calendrier</h5>
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
						<!--  -->
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