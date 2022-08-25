
<?php 

require ("../admin/functions/functions.php");
if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}
   function getAllGroupes(){      
  $conn = DBconnexion();

  $requet = "SELECT g.message,g.date,g.user_id,user.nom,user.prenom,user.image from groupes g,utilisateur user where g.user_id=user.id";
  $result = $conn->query($requet);
  $groupes = $result->fetchAll();
  return $groupes;
}
$groupes = getAllGroupes();

if(isset($_POST['add'])){
  ajoutmessage();
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
                <!-- <p > text about book</p>
                <img style="margin-left:1000px" width="50" height="150" class="card-img card-img-right" src="assets/img/groupes/rdpd.jpg" alt="Card image" />
                -->
            </h5>
            <!-- Account -->
            
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


              

                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      
                      <div class="col-md-8">
                        <div class="card-body">
                         
                          <br>

                          <?php
                           foreach($groupes as $groupe){
                            if($_SESSION['id'] == $groupe['user_id']){
                              print '
                              <div style="background-color:#d7f5fc ;width:500px;margin-left:610px;" class="row g-0 align-items-center">
                                <div class="col-2">
                                  <img style="width:50px; height:50px;margin-left:450px;" src="../admin/static/img/imgUsers/admin.png" class="avatar img-fluid rounded-circle-right" alt="William Harris">
                                </div>
                                <div class="col-10 ps-2">
                                  <div style="margin-left:250px;" class="text-dark">'.$groupe['nom'].' '.$groupe['prenom'].'</div>
                                  <div  class="text-muted small mt-1">'.$groupe['message'].'</div>
                                  <div style="margin-left:250px;" class="text-muted small mt-1">'.$groupe['date'].'</div>
                                </div>
                              </div>
                              <br>
                                                              
                                        ';
                            }else{
									print'	<div style="background-color: #e7e7ff;width:500px" class="row g-0 align-items-center">
											<div class="col-2">
												<img style="width:50px; height:50px;" src="../admin/static/img/imgUsers/admin.png" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">'.$groupe['nom'].' '.$groupe['prenom'].'</div>
												<div class="text-muted small mt-1">'.$groupe['message'].'</div>
												<div class="text-muted small mt-1">'.$groupe['date'].'</div>
											</div>
										</div>
								<br>';}
                           }?>
                       
                              


                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              


              
               
            

              </div>
              </div>
              <!--/ Horizontal -->
              
            </div>
           <form action="groupe1.php" method="post">
        <div style="display:flex;margin-left:250px"> 
            <div  class="div3">
                <div class="mb-3">
                            
                    <div style="width:500px" class="input-group input-group-merge">
                        <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text"
                        > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill:#71dd37;transform: ;msFilter:;"><path d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z"></path></svg>  </span>
                            <input
                            style="width:200px !important;height:50px"
                              type="text"
                              id="message"
                              class="form-control"
                             placeholder="message"
                              name="message"
                            />
                    </div>
                </div>
            </div>
            &emsp;&emsp;
            <div>
            <button style=" background: var(--color-primary); border: 0; padding: 12px 40px;color: #fff;transition: 0.4s;border-radius: 50px;" name="add" type="submit">
            Envoyer
  </button>
            </div>
        </div>
        </form>
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