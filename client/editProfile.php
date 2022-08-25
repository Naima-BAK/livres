
<?php 
session_start();
if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}
require ("../admin/functions/functions.php");
if(isset($_GET['id']) ){
$user = getUtilisateurById();
}

 if(isset($_POST['btn-edit'])){
    editUser();
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
                           <a class="nav-link" href="messages.php">
                           <i class="bx bx-bell me-1"></i> Message</a>
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
            <div  style="background-color: white;border:none;width:1200px;margin-left:76px"  class="card mb-4">
                <h5 style="padding-top:20px;padding-left:20px;margin-bottom: 0;margin-right:1000px;background-color: transparent; border-bottom: 0 solid #d9dee3;"  class="card-header">
                    <b style="background:#ffe0db;color:#ce1212;font-size:18px;" >Modifier le profile</b> 
               </h5>               <hr>
               <div style="" class="card-body">
                    <form action="contrat.php" method="POST">
                         <input type="hidden" name="idUser" value="<?php echo $user['id']; ?>">

                         
                         <div class="row">
                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-icon-default-fullname">Nom </label>
                          <div class="input-group input-group-merge">
                            <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill:#ce1212"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                         </span>
                            <input
                              type="text"
                              class="form-control"
                              id="nom"
                              value="<?php echo $user['nom']; ?>"
                              name="nom"
                           
                            />
                          </div>
                        </div>

                        <!--  -->

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-icon-default-company">Prenom</label>
                          <div class="input-group input-group-merge">
                            <span style="background-color: white"  id="basic-icon-default-company2" class="input-group-text"
                              > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill:#ce1212"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                             </span>
                            <input
                              type="text"
                              id="prenom"
                              class="form-control"
                              value="<?php echo $user['prenom']; ?>"
                              name="prenom"
                            />
                          </div>
                        </div>

                        <!--  -->

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-icon-default-company">email</label>
                          <div class="input-group input-group-merge">
                            <span style="background-color: white"  id="basic-icon-default-company2" class="input-group-text"
                              >  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #ce1212;transform: ;msFilter:;"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg></span>

                            <input
                              type="text"
                              id="email"
                              class="form-control"
                              value="<?php echo $user['email']; ?>"
                              name="email"
                            />
                          </div>
                        </div>

                     <!--  -->

                     <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-icon-default-company">Numéro de téléphone</label>
                          <div class="input-group input-group-merge">
                          <span style="color:#ce1212;background-color:white;" class="input-group-text">MAD (+212)</span>
                            <input
                              type="text"
                              id="tele"
                              class="form-control"
                              value="<?php echo $user['telephone']; ?>"
                              name="tele"
                            />
                          </div>
                        </div>

                        <!--  -->

                        <!--  -->

                     <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-icon-default-company">Profession</label>
                          <div class="input-group input-group-merge">
                            <span style="background-color: white"  id="basic-icon-default-company2" class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ce1212" class="bi bi-gear" viewBox="0 0 16 16">
                              <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                              </svg>         </span>
                            <input
                              type="text"
                              id="profession"
                              class="form-control"
                              value="<?php echo $user['profession']; ?>"
                              name="profession"
                            />
                          </div>
                        </div>

                        <!--  -->

  <!--  -->

  <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-icon-default-company">Meilleurs livres</label>
                          <div class="input-group input-group-merge">
                            <span style="background-color: white"  id="basic-icon-default-company2" class="input-group-text"
                              >  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #ce1212;transform: ;msFilter:;"><path d="M3 5v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3z"></path></svg></span>

                            <input
                              type="text"
                              id="livre"
                              class="form-control"
                              value="<?php echo $user['livre']; ?>"
                              name="livre"
                            />
                          </div>
                        </div>

                        <!--  -->
                          <!--  -->

                     <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-icon-default-company">Date de naissance</label>
                          <div class="input-group input-group-merge">
                            <span style="background-color: white"  id="basic-icon-default-company2" class="input-group-text"
                              >  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ce1212" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                   <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                   <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                               </svg></span>
                            <input
                              type="date"
                              id="age"
                              class="form-control"
                              value="<?php echo $user['age']; ?>"
                              name="age"
                            />
                          </div>
                        </div>

                        <!--  -->
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-icon-default-company">Genre</label>
                          
                            <select value="<?php echo $user['genre']; ?>"  class="form-control" name="genre" >
                              <option value="<?php echo $user['genre']; ?>" selected><?php echo $user['genre']; ?></option>
                              <option value="Femme">Femme</option>
                              <option value="Homme">Homme</option>
                            </select>
                        </div>
                         <!--  -->

                     <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">à propos de vous</label>
                          <div class="input-group input-group-merge">
                            <span style="background-color: white"  id="basic-icon-default-company2" class="input-group-text"
                              > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ce1212" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                              <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                              <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                                 </svg></span>
                            <input
                            style="height:50px;"
                              type="text"
                              id="desc"
                              class="form-control"
                              value="<?php echo $user['about']; ?>"
                              name="desc"
                            />
                          </div>
                        </div>

          
</div>
<div class="mt-2">
                        <button style="background-color:#ce1212;border:0;" type="submit" name="btn-edit" class="btn btn-primary">Enregistrer</button>
                        <button  type="reset" class="btn btn-outline-secondary">Annuler</button>

                        </div>
                    </form>
                    </div>
                 
                 
                </div>
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
