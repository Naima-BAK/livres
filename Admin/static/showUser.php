<?php
   
   session_start();
   require ("../functions/functions.php");
  if(!isset($_SESSION['name_admin'])){
      
      header("location:../client/login.php");
  }


    if(isset($_GET['id']) ){
 
       $user = getUserById($_GET['id']);
    }
 
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
                    <!-- Content wrapper -->
			  <div class="content-wrapper">
              <!-- Content -->
                   <div class="container-xxl flex-grow-1 container-p-y">



            <div class="card mb-4" id="btn-dropdown-demo" >
                <h5 class="card-header" style="background-color: #fff2d6 !important;  color:  #ffab00 !important;font-size:large;">Détails de la catégorie :</h5>

                <!-- Basic Dropdowns -->
                <div class="card-body">
                  <b>L'utilisateur numéro  :</b> &emsp;
                  <?php echo $user['id']; ?>
                    </div>
                <div class="card-body">
                  <b>Le nom d'utilisateur :</b> &emsp;
                  <?php echo $user['nom']; ?>
                    </div>
                  <hr class="m-0" />
                <div class="card-body">
                      <b>L'email d'utilisateur :</b> &emsp;
                      <?php echo $user['email']; ?>
               </div>
               <hr class="m-0" />
               <div class="card-body">
               <b>L'image d'utilisateur :</b> &emsp;
                      <img style="width:50px;height:50px;" src="img/imgUsers/<?php echo $user['image'];?>" alt="">
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