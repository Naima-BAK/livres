<?php  


$notifications = getAllNotifiClient();
if(isset($_POST['add'])){
  contactAdmin();
}
if(isset($_POST['edit'])){
  var_dump($user['id']);
var_dump($pass);
var_dump($npass);
  editPassword();
}
$logo = getlogo();

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div  style="width:100%;" id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

 

      <div style="width:15%;">
         <a href="index.php" >
<?php
foreach($logo as $logo){
 ?>
          <h1><img width="120" height="50" src="../admin/static/img/imgLogo/<?php echo $logo['image'];?>" alt=""><span></span></h1>
          <?php }?></a>
      </div>
      <div style="width:85%;">
      <nav id="navbar" style="margin-right:50px" class="navbar">
        <ul>
          <li ><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">services</a></li>
          <li><a href="categories.php">Catégories</a></li>
          <li><a href="livres.php">Livres</a></li>
          <li><a href="avis.php">Témognages</a></li>
          <li><a href="contact.php">Contact</a></li>
          

<!-------------------Panier-- ------------------- -->
      <?php  if(isset($_SESSION['panier']) && is_array($_SESSION['panier'][2]))   {
          print'<li>
    <a href="panier.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M21 4H2v2h2.3l3.521 9.683A2.004 2.004 0 0 0 9.7 17H18v-2H9.7l-.728-2H18c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 4z">
          </path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="16.5" cy="19.5" r="1.5"></circle>
          
          </svg>('.count($_SESSION['panier'][2]).')
    </a>
  </li>';
      }
      else{
        print'<li>
        <a href="panier.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M21 4H2v2h2.3l3.521 9.683A2.004 2.004 0 0 0 9.7 17H18v-2H9.7l-.728-2H18c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 4z">
              </path><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="16.5" cy="19.5" r="1.5"></circle>
             
              </svg> (0)
        </a>
      </li>';
      }?>
<!-- ----------------------------------------------------- -->
<!-- ----------------------------------------------------- -->
<!-- ---------------avec session--------------------------- -->
<?php  
  if(isset($_SESSION['name'])){         
   print '   
  <li class="dropdown">

     <a  href="#">
       <div class="position-relative">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ce1212" class="bi bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
          </svg>
          <span class="indicator">';
          $i = 0;
          foreach($notifications as $n){
                if( $n['date1'] == date("d/m/Y")){
                   $i++;
                 }
          } echo $i ;
          print '
          </span>
        </div>
     </a>

     <ul style="width:320px;">  
    <center> <div class="dropdown-menu-header">';
     echo "$i Nouveau Notifications";
     print' </div> </center>
     <hr>';
     $a = "Contacter l'administrateur";
     foreach($notifications as $n){

        if( $n['date1'] == date("d/m/Y")){
          print'
            <a href="#" class="list-group-item">
                <div class="row g-0 align-items-center">
                
             <div class="col-10">
                  <div class="text-muted small mt-1">'.$n['notification'].'</div>
                  <div class="text-muted small mt-1">'.$n['date'].'</div>
              </div>
          </div>
      </a><hr>'; }}
     print'
     <div class="dropdown-menu-footer">
     <center><a href="notifications.php" class="text-muted">Afficher toutes les notifications
</a></center>
 </div>
    </ul>
 </li>  ';     
print '
            <li class="dropdown"><a  href="#"><span><img width="40px" height="40px" src="../admin/static/img/imgUsers/'.$_SESSION['image'].'">'.$_SESSION['name'].' '.$_SESSION['prenom'].'</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              
              <li><a href="profile.php">Profile</a></li>
              <li><a href="messages.php">Messages</a></li>
              <li><a href="etat_livraison.php">Suivi de livraison</a></li>
              <li ><a data-toggle="modal" data-target="#exampleModal" href="">'.$a.'</a></li>
              <li><a  data-toggle="modal" data-target="#password" href="">CHanger le mot de passe</a></li>
              <li><a href="logout.php">logout</a></li>
              
            </ul>
          </li>';
        }
    // ------------ Pas de session----------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------
          else{
          print '
          <li class="dropdown"><a class="btn-book-a-table" href="#"><span>Connexion</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              
              <li><a href="login.php">Se connecter</a></li>
              <li><a href="register.php">Créer un compte</a></li>
            </ul>
          </li>';}?>
        </ul>
      </nav><!-- .navbar -->
    </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

   
  </div>
</div>



<!-- ------------------------------ ----------------->
<!-- ---------------------------------------------- -->
<!-- ---------------------envoyer message--------------------- -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">à BKE Naima</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input style="height:70px;"
             type="text" 
              class="form-control" name="message" 
              placeholder="entrez votre message"/>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button name="add" type="submit" class="btn btn-primary">Envoyer</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- --------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------- -->
<!-- ------------------------CHANGER LE MOT DE PASSE----------------------------->
<!-- Modal -->
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="background-color: #fff2d6 !important;  color: #ffab00 !important;font-size:large;">Changer le mot de passe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">       
<!-- ----------------------------------------------->
  <label for="" style="font-size:18px;">Ancien mot de passe </label>
  <div class="mb-3">
    <div class="input-group input-group-merge">
      <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffab00" class="bi bi-key" viewBox="0 0 16 16">
          <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
          <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>
      </span>
      <input type="password" name="password" placeholder="*****" class="form-control">
    </div>
  </div>
<!-- -------------------------------------------->
  <?php
  if (isset($_GET['err2']) && $_GET['err2'] == "ok"){
        print '<label>le mot de passe est incorrect </label>';
        }
         ?>
  
  <!-- -------------------------------------------->
  <label for="" style="font-size:18px;">Nouveau mot de passe</label>
  <div class="mb-3">
    <div class="input-group input-group-merge">
      <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffab00" class="bi bi-key" viewBox="0 0 16 16">
          <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
          <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>
      </span>
      <input type="password" name="newpassword" placeholder="*****" class="form-control">
    </div>
  </div> 
<!-- ----------------------------------------------->
  <label for="" style="font-size:18px;">confirmer le nouveau mot de passe
</label>

  <div class="mb-3">
    <div class="input-group input-group-merge">
      <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffab00" class="bi bi-key" viewBox="0 0 16 16">
          <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
          <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>
      </span>
      <input type="password" name="cnewpassword" placeholder="*****" class="form-control">
    </div>
  </div> 
<!-- --------------------------------------------------->
  <?php
  if (isset($_GET['err1']) && $_GET['err1'] == "ok"){
        print '<label>les mots de passe ne correspond pas</label>';
        }
         ?>
<!-- ------------------------------------------------------->
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button name="edit" type="submit" class="btn btn-primary">Modifier</button>
      </div>
  </form>
    </div>
  </div>
</div> 