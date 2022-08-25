
<?php 
    require ("../admin/functions/functions.php");

if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}
if(isset($_POST['entrer'])){
  ajoutnotif();
 }

?>
<!DOCTYPE html>


<html>
  <head>
   <link rel="stylesheet" href="assets/css/profile.css">
   
   <link rel="stylesheet" href="assets/css/groupes.css">
   
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
          <p>Groupes</p>
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
                              <a class="nav-link active" href="groupes.php"
                             ><i class="bx bx-link-alt me-1"></i> Groupes</a
                            >
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="etat_livraison.php"
                             ><i class="bx bx-link-alt me-1"></i> Suivi de livraison</a
                            >
                        </li>
                   </ul>

        <div style="background-color: white;border:none;width:1200px;margin-left:76px"  class="card mb-4">
            <h5 style="padding: 1.5rem 1.5rem; margin-bottom: 0;margin-right:1000px;background-color: transparent; border-bottom: 0 solid #d9dee3;"  class="card-header">
                Les groupes
            </h5>
            <!-- Account -->
            <div class="card-body"> 

            </div>
             <hr style="height:2px;" class="my-0" />
            <div class="card-body">
             <!-- Horizontal -->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row mb-5">


              
                     <?php 
                            if($_SESSION['statut'] == 0){
                          print '
                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4"><a href="groupe1.php">
                      <img width="50" height="150" class="card-img card-img-right" src="assets/img/groupes/rdpd.jpg" alt="Card image" />
                        </a></div>
                      <div class="col-md-8">
                        <div class="card-body"><a href="groupe1.php">
                          <h5 class="card-title">Groupe1</h5></a>
                          <a href="groupe1.php"><p class="card-text">
                            description about book
                          </p></a>
                          
                          

                        </div>
                        <form action="groupes.php" method="POST">
                          <p><button name="entrer" type="submit">rejoindre</button></p>
                         </form> 
                      </div>
                    </div>
                  </div>
                </div>';
              
                  }
                  else
                  {
                        print '
              <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4"><a href="groupe1.php">
                      <img width="50" height="150" class="card-img card-img-right" src="assets/img/groupes/rdpd.jpg" alt="Card image" />
                        </a></div>
                      <div class="col-md-8">
                        <div class="card-body"><a href="groupe1.php">
                          <h5 class="card-title">Groupe1</h5></a>
                          <a href="groupe1.php"><p class="card-text">
                            description about book
                          </p></a>
                          
                          

                        </div>
                        <p>Vous étes membre</p>
                      </div>
                    </div>
                  </div>
                </div>';
}?>

                <!--  -->


                <?php 
                            if($_SESSION['statut'] == 0){
                          print '
                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-8">
                        <div class="card-body"><a href="groupe2.php">
                          <h5 class="card-title">Groupe2</h5></a>
                          <a href="groupe2.php"><p class="card-text">
                            description about book
                           </p> </a>
                          
                        </div>
                        <form action="groupes.php" method="POST">
                          <p><button name="entrer" type="submit">rejoindre</button></p>
                       <form>
                      </div>
                      <div class="col-md-4"><a href="groupe2.php">
                        <img width="50" height="150" class="card-img card-img-right" src="assets/img/groupes/rdpd.jpg" alt="Card image" />
                        </a></div>
                    </div>
                  </div>
                </div>
              </div>';
              }else{

                print '
                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-8">
                        <div class="card-body"><a href="groupe2.php">
                          <h5 class="card-title">Groupe2</h5></a>
                          <a href="groupe2.php"><p class="card-text">
                            description about book
                           </p> </a>
                          
                        </div>
                        <p>Vous étes membre</p>
                      </div>
                      <div class="col-md-4"><a href="groupe2.php">
                        <img width="50" height="150" class="card-img card-img-right" src="assets/img/groupes/rdpd.jpg" alt="Card image" />
                        </a></div>
                    </div>
                  </div>
                </div>
              </div>';
              }
            ?>

              </div>
              </div>
              <!--/ Horizontal -->
            </div>
    </div>
    <!-- /Account -->
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
