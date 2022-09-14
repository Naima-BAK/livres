

<?php 

require ("../admin/functions/functions.php");
$avis = getAllAvis();
if(isset($_POST['btn-add'])){
    ajoutAvis();
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="assets/css/service.css">
<?php 
        include "includes/head.html" ?>
</head>
sty
<body>

 
           <!-- ======= Header ======= -->
   <?php 
  include "includes/header.php" ?>
  <!-- End Header -->
    <!-- ======= Testimonials Section ======= -->
    <section style="margin-top:50px;background-color:white" id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
      <div class="section-title">
          <h2>Témoignages
</h2>
        </div>
        
          
        

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

           <!--  testimonial item -->
          <?php foreach($avis as $avis){  ?>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <?php echo $avis['avis']; ?>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3><?php echo $avis['nom'] ; echo ' '.$avis['prenom']; ?></h3>
                      <h4><?php echo $avis['date']; ?></h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="../admin/static/img/imgUsers/<?php echo $avis['image']; ?>" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div> 
         
        </div>
     <!-- --------------------- -->
     <?php if(isset($_SESSION['id'])){ ?>
            <form action="avis.php" method="post" >
              
              <div class="form-group mt-3 text-center">
                <textarea style="margin-left:170px;width:800px;padding: 12px 15px; border-radius: 0;box-shadow: none;font-size: 14px; " class="form-control " name="avis" rows="4" placeholder="avis"></textarea>
                <div class="validate"></div>
              </div>
              <br>
              <div class="text-center"><button name="btn-add" style="border: 0;padding: 14px 60px;color: #fff;transition: 0.4s;border-radius: 50px;background: #ec2727;" type="submit">Ajouter un avis</button></div>
            </form>
          
            <?php 
            }else
            { 
              print '<br>';
            }
                ?>

     <!-- ------------------ -->
      </div>
    </section><!-- End Testimonials Section -->

<!-- ======= Footer ======= -->
<footer  id="footer" class="footer">
 <?php 
  include "includes/footer.html" ?>

  </footer><!-- End Footer -->
  <!-- End Footer -->
  <?php 
  include "includes/foot.html" ?>
</body>

</html>