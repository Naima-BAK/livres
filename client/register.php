

<?php
  require ("../admin/functions/functions.php");

$conn = mysqli_connect('localhost','root','','book');
$error_name = '';
$error_email1 = '';
$error_password = '';
$error_cpassword = '';
if(isset($_POST['btn_inscription'])){

  
        // ------------------------------
        if(empty($_POST['nom'])){
          $error_name= '<label class="text-danger"><b>Entrez votre nom</b></label>';
       }else{
        
           $name = mysqli_real_escape_string($conn, $_POST['nom']);
       }
   

  // ------------------------------
     if(empty($_POST['email'])){
       $error_email1='<label class="text-danger"><b>Entrez votre email</b></label>';
     }else{
      
            $email = mysqli_real_escape_string($conn, $_POST['email']);
     }
    
 //-----------------------------
  if(empty($_POST['password'])){
        $error_password= '<label class="text-danger"><b>Entrez votre mot de passe </b></label>';
  }else{
    
        $pass = md5($_POST['password']);
  }

  if(empty($_POST['cpassword'])){
     $error_cpassword= '<label class="text-danger"><b>Entrez votre mot de passe</b> </label>';
  }else{
      $cpass = md5($_POST['cpassword']);
  }
   
  // $name = mysqli_real_escape_string($conn, $_POST['nom']);
  // $email = mysqli_real_escape_string($conn, $_POST['email']);
  // $pass = md5($_POST['password']);
  // $cpass = md5($_POST['cpassword']);

  $select = " SELECT * FROM utilisateur WHERE email = '$email' and password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){

    $error_email1 ='<label class="text-danger"><b>email deja existe</b></label>';

  }else{

     if($pass != $cpass){
      $error_cpassword= '<label class="text-danger"><b>le mot de passe ne correspond pas !
      </b></label>';
      }else{
        $insert = "INSERT INTO utilisateur(nom, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
        // echo "<script>alert('votre compte est créé avec succès');</script>";

          // $notify = "un nouveau utilisateur est s'inscrie";
          //   $requet1 = "INSERT INTO  notifyAdmin(notification) values ('$notify')";
          //   $rs = $conn->query($requet1);
          header('location:login.php');
      }
   }

    

};

?>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   
    <?php 
        include "includes/head.html" ?>
</head>




<body  style="background-color:orange ! important;">


  <!-- ======= Header ======= -->
  
  
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
      
          <li class="dropdown"><a class="btn-book-a-table" href="#"><span>Connexion</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              
              <li><a href="login.php">Se connecter</a></li>
              <li><a href="register.php">Créer un compte</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->
    </div>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

   
  </div>
</div>




  <!-- End Header -->


<main class="py-4">

<div class="container" style="margin-top:120px;">
    <div style="background-color:black;width:1000px;height:500px;" class="body d-md-flex align-items-center justify-content-between">

         <div style="height:500px;"  class="box-1 mt-md-0 mt-5"> 
            <img style="height:500px;width:400px;"  src="assets/img/login/5.png" class="" alt="">
         </div>

         <div style="width:600px;overflow-y:auto;" class=" box-2 d-flex flex-column h-100">
            <div class="mt-5">
                <p style="color : #71dd37;" class="mb-1 h-1">S'inscrire</p>
                <div style="margin-right:20px ! important;" class="d-flex flex-column ">


                <form method="POST" action="">
                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                            
                          <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text"
                              ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #71dd37;transform: ;msFilter:;"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg></span>
                              <input
                            style="width:90px ! important;"
                              type="text"
                              class="form-control"
                              id="nom"
                              name="nom"
                              placeholder="Entrez votre nom"
                              require
                            />
                          </div>
                         
                        </div>
                        <?php echo $error_name;?>

                        
                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                            <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #71dd37;transform: ;msFilter:;"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                            </span>
                            <input
                            style="width:90px ! important;"
                              type="text"
                              class="form-control"
                              id="email"
                              name="email"
                              placeholder="Entrez votre email"
                              require
                            />
                          </div>
                        </div>
                        
                        <?php echo $error_email1;?>

                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                            <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#71dd37" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
                            
                            </span>
                            <input
                            style="width:90px ! important;"
                              type="password"
                              class="form-control"
                              id="password"
                              name="password"
                              placeholder="*********"
                              require
                            />
                          </div>
                        </div>
                        
                        <?php echo $error_password;?>
                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                            <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#71dd37" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
                            </span>
                            <input
                            style="width:90px ! important;"
                              type="password"
                              class="form-control"
                              id="cpassword"
                              name="cpassword"
                              placeholder="*********"
                              require
                            />
                          </div>
                        </div>
                        <?php echo $error_cpassword;?>


                       



                       


                  

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                           
                               

                            <div class="demo-inline-spacing">
                               <a href=""> 
 <input name="btn_inscription" style="background-color : #71dd37;width:150px;border:0;" value="s'inscrire" type="submit" 
 class="btn rounded-pill btn-success" /></a>
                            </div>



                            </div>
                        </div>
                    </form>
                    <div class="mt-3">
                    <center>    <div style="color:#ffab00;" > Vous avez déjà un compte? 
                            <span class="fas fa-chevron-right ms-1"> </span>
                       <a href="" ><b style="color:#ffab00;font-size:25px;" > Se connecter</b></a>
                        </div></center>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<!-- ======= Footer ======= -->
<footer style="margin-top:60px !important;background-color:black" id="footer" class="footer">
<?php 
  include "includes/footer.html" ?>
  </footer><!-- End Footer -->
</body>