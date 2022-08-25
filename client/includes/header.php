<?php  session_start();

// if(!isset($_SESSION['user_name'])){
//   header('location:login.php');
// }
?>
<div  style="width:100%;" id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

 

      <div style="width:15%;">
         <a href="index.php" >
          <h1><img width="120" height="50" src="logo.png" alt=""><span></span></h1>
        </a>
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
          <?php  
          if(isset($_SESSION['name'])){
            
 print '
 
        
            <li class="dropdown"><a  href="#"><span><img width="40px" height="40px" src="../admin/static/img/imgUsers/'.$_SESSION['image'].'">'.$_SESSION['name'].' '.$_SESSION['prenom'].'</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              
              <li><a href="profile.php">Paramètres du compte</a></li>
              <li><a href="etat_livraison.php">Suivi de livraison</a></li>
              <li><a href="logout.php">logout</a></li>
              
            </ul>
          </li>';
        }
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