
<?php

if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}

?>
<!DOCTYPE html>


<html>
  <head>
   <link rel="stylesheet" href="assets/css/profile.css">
   
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
                         <a class="nav-link " href="profile.php"><i class="bx bx-user me-1"></i> Profile</a>
                       </li>
                        <li class="nav-item">
                           <a class="nav-link" href="messages.php">
                           <i class="bx bx-bell me-1"></i> Message</a>
                       </li>
                        <li class="nav-item">
                              <a class="nav-link" href="groupes.php"
                             ><i class="bx bx-link-alt me-1"></i> Groupes</a
                            >
                        </li>
                        <li class="nav-item">
                              <a class="nav-link active" href="etat_livraison.php"
                             ><i class="bx bx-link-alt me-1"></i> Suivi de livraison</a
                            >
                        </li>
                   </ul>

                   <div style="background-color: white;border:none;width:1200px;margin-left:76px"  class="card mb-4">
                    <h5 style="padding: 1.5rem 1.5rem; margin-bottom: 0;margin-right:1000px;background-color: transparent; border-bottom: 0 solid #d9dee3;"  class="card-header">
                      Profile Details
                    </h5>
                    
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="../assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Modifier l'image</span>
                        </div>
                      </div>
                    </div>
                    <hr style="height:2px;" class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          
                        
                        <div class="col-md-4">
                           <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>


                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti Ghelani</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>kshitighelani@gmail.com</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>123 456 7890</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            
                        
         </form>
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
