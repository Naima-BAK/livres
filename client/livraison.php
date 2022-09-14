
<?php


require ("../admin/functions/functions.php");
if(!isset($_SESSION['name'])){
     
    header("location:login.php");
  }
if(isset($_GET['id'])){
    $paiement = getPaiementById($_GET['id']);
}
if(isset($_POST['btn_add'])){
    ajoutLivraison();
}
?>


<!DOCTYPE html>
<html>
<head>

   <link rel="stylesheet" type="text/css" href="assets/css/livraison.css">
   <?php 
        include "includes/head.html" ?> 
<body>
 <!-- ======= Header ======= -->
 <?php 
 include "includes/header.php" ?>
  <!-- End Header -->


    <div class="limiter">
       <div style="background-color:white;" class="container-login100">
           <div style="width:1000px;" class="wrap-login100">
                <div class="login100-form-title" style="height:400px;background-image: url(img.jpeg);">
                   <span style="margin-top:100px;" class="login100-form-title-1">
                     Livraison
                   </span>
                </div>
                <form action="livraison.php" method="POST" class="login100-form validate-form">
                <input class="input100" type="hidden" name="paiement_id" value="<?php echo $paiement['id'];  ?>" readonly>
                <input class="input100" type="hidden" name="user_id" value="<?php echo $_SESSION['id'];  ?>" readonly>

               
                <br><br>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Adresse</span>
                        <input class="input100" type="text" name="adresse" placeholder="Enterez votre adresse" require>
                    <span class="focus-input100"></span>
                </div>
<br><br>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Ville</span>
                        <select style="border:0;" class="input100"  name="ville" require>
                            <option value="Agadir">Agadir</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Casablanca">Casablanca</option>
                        </select>
                    <span class="focus-input100"></span>
                </div>
                <br><br>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Numero de télephone</span>
                    <input class="input100" type="number" name="num" placeholder="Enterez votre numéro de télephone" require>

                    <span class="focus-input100"></span>
                </div>
                
               
                <br><br>
            <div class="container-login100-form-btn">
                
                <button style="" type="submit" name="btn_add" class="login100-form-btn">Ajouter</button>
            </div>
            </form>
        </div>
    </div>
</div>




<!-- ======= Footer ======= -->
<footer style="margin-top:60px !important;background-color:black" id="footer" class="footer">
<?php 
  include "includes/footer.html" ?>
  </footer><!-- End Footer -->
  
</body>
</html>
<style>

</style>