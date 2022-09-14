

<?php 
require ("../admin/functions/functions.php");

if(isset($_POST['btn-add'])){
    ajoutContact();
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
   

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container" >
      <div class="section-title">
        <h2>Contact</h2>
          <p>Besoin d'aide? <span style="color: #ec2727;"><b>Nous contacter</b></span></p>
        </div>
        

      
        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>Sidi Bounou Street ,OUled berhil Taroudant, Maroc, </p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>Eco@livres.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+212 552 0000 55</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Lun-Sam:</strong> 11:00 - 23:00;
                  <strong>Dimanche:</strong> Fermé
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form style="padding:30px 30px 30px 30px;width: 100%; margin-top: 30px;background: #fff;box-shadow: 0 0 30px rgba(0, 0, 0, 0.08);" action="contact.php" method="post">
          <div class="row">
            <div style=" padding-bottom: 20px;" class="col-xl-6 form-group">
              <input style=" height: 48px;border-radius: 0;box-shadow: none;font-size: 14px;" type="text" name="nom" class="form-control"  placeholder="Votre nom" required>
            </div>
            <div  style="padding-bottom: 20px;" class="col-xl-6 form-group">
              <input style="height: 48px;border-radius: 0;box-shadow: none;font-size: 14px;" type="email" class="form-control" name="mail"  placeholder="Votre Email" required>
            </div>
          </div>
          
          <div  style="padding-bottom: 20px;" class="form-group">
            <textarea style="padding: 10px 12px;border-radius: 0;box-shadow: none;font-size: 14px;" class="form-control" name="messag" rows="5" placeholder="Message" required></textarea>
          </div>
          <br>
          <?php
      
      if (isset($_GET['ajouter']) && $_GET['ajouter'] == "ok"){
          print '<div class="alert alert-success">
          votre message est envoyer , merci
          </div>';
      }
      ?>
          
          <div class="text-center"><button style=" background: var(--color-primary); border: 0; padding: 12px 40px;color: #fff;transition: 0.4s;border-radius: 50px;" name="btn-add" type="submit">Envoyer</button></div>
        </form>
        <!--End Contact Form -->

      </div>
    </section>



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