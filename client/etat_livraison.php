<?php


require ("../admin/functions/functions.php");
if(!isset($_SESSION['name'])){
     
    header("location:login.php");
  }
  $livraisons =  getLivraisonsSession();
  $categories = getAllCategories();
?>

<!DOCTYPE html>


<html>
  <head>
   <link rel="stylesheet" href="assets/css/profile.css">
   <script src="assets/vendor/libs/jquery-sticky/jquery-sticky.js"></script>
<link rel="stylesheet" href="assets/css/etat.css">

   
<link rel="stylesheet" href="assets/css/desc.css">
     <?php 
        include "includes/head.html" ?>
  </head>

  <body style="background-color: #f5f5f9;overflow-x: hidden;">
     <!-- ======= Header ======= -->
   <?php 
  include "includes/header.php" ?>
  <!-- End Header -->

   

    <div style="margin-top:150px" class="section-title">
          <h2>Paramètres du compte</h2>
          <p>Suivi de livraison</p>
       
    </div>
      
    <div class="row">
        <div class="col-md-12">
                   <ul style="margin-left:76px;"  class="nav nav-pills flex-column flex-md-row mb-3">
                      <li class="nav-item">
                         <a class="nav-link " href="profile.php">
                          <i class="bx bx-user me-1"></i> Profile</a>
                       </li>
                       
                        <li class="nav-item">
                              <a  class="nav-link" href="groupes.php"
                             ><i class="bx bx-link-alt me-1"></i> Groupes</a
                            >
                        </li>
                        <li class="nav-item">
                              <a style="background-color:#ce1212;color:white" class="nav-link" href="etat_livraison.php"
                             ><i class="bx bx-link-alt me-1"></i> Suivi de livraison</a
                            >
                        </li>
                   </ul>

                   <div style="background-color: white;border:none;width:1200px;margin-left:76px"  class="card mb-4">
                    <h5 style="padding: 1.5rem 1.5rem; margin-bottom: 0;margin-right:1000px;background-color: transparent; border-bottom: 0 solid #d9dee3;"  class="card-header">
                      Etat de votre livraison
                    </h5>
                    
                    <hr style="height:2px;" class="my-0" />
                    <div class="card-body">
                     
                    
                    <div class="row">
          <div class="col-lg-8 mx-auto">
           
          <div class="row">
 <!-- ----------------------------------------------------- -->
 

 <?php  
                foreach($livraisons as $l){



      print ' 
        <div  class="col-md"><center>
      <div style="background-color: #ce1212;color:white;width:300px;height:70px;" class="form-check custom-option custom-option-icon">
        <label class="form-check-label custom-option-content" for="customRadioIcon1">
          <span class="custom-option-body">
            <i class="bx bx-briefcase-alt-2"></i>
            <span class="custom-option-title"> </span>
            <center><b>'.$l['etat'].' </small></b><br><br>
          </span>
        </label>
      </div></center>
    </div>';
}?>   
                            


                          </div>
                        
           
           
          </div>
        </div>




            </div>
        </div>
    </div>
    <!-- /Account -->
</div>
</center>



        
<!-- ======= Footer ======= -->
<footer style="margin-top:60px !important;background-color:black" id="footer" class="footer">
<?php 
  include "includes/footer.html" ?>
  </footer><!-- End Footer -->
  

  </body>
</html>
