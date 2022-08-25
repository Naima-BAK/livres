
<?php
   
    require ("../admin/functions/functions.php");
    $categories = getAllCategories();

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
        include "includes/head.html" ?>
 <link rel="stylesheet" href="assets/css/categorie.css">
</head>

<body style="background:white;">
 <!-- ======= Header ======= -->
 <?php 
  include "includes/header.php" ?>
  <!-- End Header -->


 <!-- ======= Services Section ======= -->
 <section style="margin-top:50px !important;background-color:white;" id="services" class="services section-bg">
      <div   class="container">

        <div class="section-title">
          <h2>Catégories</h2>
          <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem</p>
        </div>

        <div class="row">
<!-- -------------------------------- -->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>   <link rel="stylesheet" href="assets/css/groupes.css">

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mb-5">

<?php 


    foreach($categories as $cat){
print'
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img class="card-img card-img-left" src="../admin/static/img/imgCat/'.$cat['image'].'" alt="Card image" />
            </div>
            <div style="overflow-y:scroll;height:200px" class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">'.$cat['nom'].'</h5>
                <p class="card-text">
                '.$cat['description'].'
                </p>
              </div>
            </div>
          </div>
        </div>
      </div> 
  ';
} 
?>
</div>
</div>
<!-- -------------------------------- -->
</div>
</div>
</section><!-- End Services Section -->
<!-- ---------------------------------- -->



<!-- ======= Footer ======= -->
<footer style="margin-top:60px !important;background-color:black" id="footer" class="footer">
<?php 
  include "includes/footer.html" ?>
  </footer><!-- End Footer -->
  

</body>








