
<?php
 require ("../functions/functions.php");
if(!isset($_SESSION['name_admin'])){
	
	header("location:../client/login.php");
}

$contacts = getAllContact();
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
			

            
        <div style="" class="section-title">
          <h2>Contact</h2>
</div>
<style>
                                  .section-title {
    text-align: center;
    padding-bottom: 30px;
  }
  .section-title h2 {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 20px;
    position: relative;
  }
  .section-title h2::before {
    content: "";
    position: absolute;
    display: block;
    width: 120px;
    height: 1px;
    background: #ddd;
    bottom: 1px;
    left: calc(50% - 60px);
  }
  .section-title h2::after {
    content: "";
    position: absolute;
    display: block;
    width: 40px;
    height: 3px;
    background: #71dd37;
    bottom: 0;
    left: calc(50% - 20px);
  }
                            </style>
            <div style="overflow-y:scroll ! important; height:400px;" class="list-group">
            <?php foreach($contacts as $contact){?>
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