
<?php 

require ("../admin/functions/functions.php");
if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}
$user = getUtilisateurById();
if(isset($_POST['edit_pic'])){
  editImgUser();
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
          <p>Profile</p>
       
    </div>
      
    <div class="row">
        <div class="col-md-12">
                   <ul style="margin-left:76px;"  class="nav nav-pills flex-column flex-md-row mb-3">
                      <li class="nav-item">
                         <a style="background-color:#ce1212;" class="nav-link active" href="profile.php"><i class="bx bx-user me-1"></i> Profile</a>
                       </li>
                       
                        <li class="nav-item">
                              <a class="nav-link" href="groupes.php"
                             ><i class="bx bx-link-alt me-1"></i> Groupes</a
                            >
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="etat_livraison.php"
                             ><i class="bx bx-link-alt me-1"></i> Suivi de livraison</a
                            >
                        </li>
                   </ul>
                   <!--  -->
<div style="background-color: white;border:none;width:1200px;margin-left:76px"  class="card mb-4">
  <h5 style="padding-top:20px;padding-left:20px;margin-bottom: 0;margin-right:1000px;background-color: transparent; border-bottom: 0 solid #d9dee3;"  class="card-header">
    Details de profile 
  </h5>
  <hr>
  <!-- image -->
  <div style="display:flex;margin-left:10px;">
    <div>
        <img width="200" height="200" class="d-block rounded" src="../admin/static/img/imgUsers/<?php echo $_SESSION['image'];?>"  width="100">
    </div>

    <div style="margin-left:30px;margin-top:50px">
     <form action="profile.php" method="POST">
              <input type="file" name="image" id=""><br><br>
             <button name="edit_pic" style=" background: red; border: 0;color: white;border-radius: 50px;"  type="submit">
                Modifier l'image
              </button>
      </form>
    </div>

  </div>  <br> 
  <!--  --><p style="margin-left:10px;"><?php echo $_SESSION['about'];?></p>
  
  <!-- Account -->
  


  <hr style="height:2px;" class="my-0" />
  <div class="card-body">
    <form id="formAccountSettings" method="POST" onsubmit="return false">
      <div class="row">
                          
                        
                        <div class="col-md-4">
                           <div class="profile-work">
                           
                            
                            <p>Date de naissance</p>
                            <b style="color :#ce1212;margin-left:10px;"> <?php echo $_SESSION['age'];?></b>
                            <p>Genre</p>
                            <b style="color :#ce1212;margin-left:10px;"> <?php echo $_SESSION['genre'];?></b>
                            <p>Meilleurs livres  </p> 
                            <b style="color :#ce1212;margin-left:10px;"><?php echo $_SESSION['livre'];?></b>
                            
                        </div>
                    </div>


                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <b style="color :#ce1212;margin-left:10px;"><?php echo $_SESSION['name'];?> <?php echo $_SESSION['prenom'];?></b>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <b style="color :#ce1212;margin-left:10px;"><?php echo $_SESSION['email'];?></b>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Télephone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <b style="color :#ce1212;margin-left:10px;"><?php echo $_SESSION['telephone'];?></b>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <b style="color :#ce1212;margin-left:10px;"><?php echo $_SESSION['profession'];?></b>
                                            </div>
                                        </div>


                            </div>
                            
                        </div>
                    </div>
                </div>
            
                        
         </form>
         <!-- ------Bouton modifier -->
                               
         <a style="margin-left:500px;" href="editProfile.php?id=<?php echo $_SESSION['id'];?>">
             <button style="padding-top:5px;padding-bottom:5px;padding-right:5px;padding-left:5px; ; background:red; border: 0;color: white;border-radius: 50px;" name="btn-add" type="submit">
                Modifier le compte
              </button>
           </a> 
<!-- ------------------------ -->
    </div>
    </div>
    </div>
    <!-- /Account -->
</div>
</center>



                  <center>
                  <div style="width:1200px;background-color: white;border:none;" class="card">
                    <h5 style="text-align:left;padding: 1.5rem 1.5rem;margin-bottom: 0;background-color: transparent;border-bottom: 0 solid #d9dee3;" class="card-header">Supprimer votre profile</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div style="text-align:left;" class="alert alert-warning">
                          <h6 style="background-color: #fff2d6;border-color: #ffe6b3;color: #ffab00;" class="alert-heading fw-bold mb-1">Vous etes sur?</h6>
                          <p style="color: #ffab00;" class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" >
                        
                      <a onclick="return confirmer()" href="../admin/functions/users/delete.php?id=<?php echo $_SESSION['id']; ?>"><button style="background-color: #ff3e1d;margin-right:980px;border:0;" type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button></a>
                      </form>
                    </div>
                  </div>
                  </center>

        
<!-- ======= Footer ======= -->
<footer style="margin-top:60px !important;background-color:black" id="footer" class="footer">
<?php 
  include "includes/footer.html" ?>
  </footer><!-- End Footer -->
  
  <script>
          function confirmer(){
              return confirm("Voulez-vous vraiment désactivé votre compte ?");
          }
    </script>
  </body>
</html>
