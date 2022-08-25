
<?php
 session_start();
 require ("../functions/functions.php");
if(!isset($_SESSION['name_admin'])){
	
	header("location:../client/login.php");
}

$contact = getAllContact();
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


		<div  class="main">
			<!-- nav2 -->
			<?php include "includes/nav2.php" ?>
			<!-- end nav2 -->

		<main class="content">
			

            
        
            <div style="overflow-y:scroll ! important; height:400px;" class="list-group">
            <?php foreach($contact as $contact){?>
                <a href="#" class="list-group-item">
                        
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <?php echo $contact['nom']; ?>
                        </div>
                        <div class="col-10 ps-2">
                                    <div class="text-dark"><b><?php echo $contact['email']; ?></b></div>
                                    <div class="text-muted small mt-1"><?php echo $contact['message']; ?></div>
                                    <div class="text-muted small mt-1"><?php echo $contact['date']; ?></div>
                        </div>
                    </div>
                </a>
                 <?php }?>       
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