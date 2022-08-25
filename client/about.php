<?php session_start(); ?>

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
   

 <!-- ======= About Section ======= -->
 <section style="margin-top:50px;" id="about" class="about">
      <div class="container" >

        <div class="section-title">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

    <div  style="display:flex;">

        <div  style="width:550px;height:400px">
            <img style="width:550px;height:400px;" src="assets/img/img1.jpg" alt="">
        </div>

        <div style="margin-left:20px;" >
           <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p> 
           <p>Omnis sed voluptate laborum tenetur libero nam ipsa consequatur</p> 
           <p> voluptatum totam quis blanditiis nemo,</p> 
           <p> atque perferendis! Corrupti vel nobis ut. Dolorum, distinctio.</p> 
           <br>
           <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p> 
           <p>Omnis sed voluptate laborum tenetur libero nam ipsa consequatur</p> 
           <p> voluptatum totam quis blanditiis nemo,</p> 
           <p> atque perferendis! Corrupti vel nobis ut. Dolorum, distinctio.</p> 
        </div>
    </div>

      </div>
    </section><!-- End About Section -->

  


    <!-- ======= Stats Counter Section ======= -->
    <section style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/img/img3.jpg') center center;
  background-size: cover;
  padding: 100px 0;" id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->




  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        
        <div class="section-title">
          
          <p> Check <span style="color: #ec2727;"><b>Our Gallery</b></span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/img1.jpg"><img  src="assets/img/gallery/img1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/img9.jpeg"><img  src="assets/img/gallery/img9.jpeg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/img3.webp"><img src="assets/img/gallery/img3.webp" class="img-fluid" alt=""></a></div>
            <!-- <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/img4.jpg"><img src="assets/img/gallery/img4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/img5.jpg"><img src="assets/img/gallery/img5.jpg" class="img-fluid" alt=""></a></div> -->
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/img6.jpg"><img src="assets/img/gallery/img6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/img7.jpg"><img src="assets/img/gallery/img7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/img8.jpg"><img src="assets/img/gallery/img8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->


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