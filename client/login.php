


<?php
require ("../admin/functions/functions.php");

$conn = mysqli_connect('localhost','root','','book');

$error_email= '';
$error_password = '';
$error_all='';
$error_captcha = '';
if(isset($_POST['btn-login'])){

  
   $captcha =  $_POST['captcha'];
        
  // // ------------------------------
    if(empty($_POST['email'])){
       $error_email='<label class="text-danger"><b>Entrez votre email</b></label>';
     }else{
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      
     }
    // ------------------------------
    if(empty($_POST['confirmcaptcha'])){
      $error_captcha='<label class="text-danger"><b>Entrez votre email</b></label>';
    }else{
     
           $confirmcaptcha =$_POST['confirmcaptcha'];
    }
   
 //-----------------------------
  if(empty($_POST['password'])){
        $error_password= '<label class="text-danger"><b>Entrez votre mot de passe </b></label>';
  }else{
    
        
  $pass = md5($_POST['password']);
  }

 
   if($captcha == $confirmcaptcha){
    $error_captcha = '<label class="text-danger"><b>incorrect captcha</b></label>';
   }else{
  

       $select = " SELECT * FROM utilisateur WHERE email = '$email' and password = '$pass' ";
       $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['nom'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['age'] = $row['age'];
            $_SESSION['telephone'] = $row['telephone'];
            $_SESSION['about'] = $row['about'];
            $_SESSION['profession'] = $row['profession'];
            $_SESSION['livre'] = $row['livre'];
            $_SESSION['genre'] = $row['genre'];
            $_SESSION['statut'] = $row['statut'];
            $_SESSION['email'] = $row['email'];

            
            
                if($row['type'] == 'admin'){

                $_SESSION['name_admin'] = $row['nom'];
                $_SESSION['id_admin'] = $row['id'];
                $_SESSION['email_admin'] = $row['email'];
                $_SESSION['image_admin'] = $row['image'];
                header('location:../admin/static/index.php');

            }elseif($row['type'] == 'user'){

                 $_SESSION['name'] = $row['nom'];
                 $_SESSION['id'] = $row['id'];
                 $_SESSION['email'] = $row['email'];
                 
                 $_SESSION['image'] = $row['image'];
                 header('location:index.php');
            }
   
        }
        else
        {
             $error_all= 'incorrect email or password!';
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
 


    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   
    <?php 
        include "includes/head.html" ?>
</head>

<body style="background-image: url('assets/img/login/4.png');">




   
  <!-- ======= Header ======= -->
  <?php 
  include "includes/header.php" ?>
  <!-- End Header -->


<main class="py-4">

<div class="container" style="margin-top:120px;">

    <div style="background-color:black;width:500px;margin-right:900px;" class="body d-md-flex align-items-center justify-content-between">

       

         <div style="width:500px;" class=" box-2 d-flex flex-column h-100">
            <div class="mt-5">
               <center> <p style="color : red;" class="mb-1 h-1">Connexion</p></center><br>
                <div style="margin-left:30px ! important;margin-right:30px ! important;" class="d-flex flex-column ">
                    <form method="POST" action="login.php">

                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                            <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: red;transform: ;msFilter:;"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                            </span>
                            <input
                            style="width:40px ! important;height:40;"
                              type="text"
                              class="form-control"
                              id="email"
                              name="email"
                              placeholder="Entrez votre email"
                            />
                          </div>
                        </div>
                        <?php echo $error_email;?>
                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                            <span style="background-color : white;"  id="basic-icon-default-fullname2" class="input-group-text"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-key" viewBox="0 0 16 16">
                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                               </svg>
                            </span>
                            <input
                            style="width:40px ! important;height:40;"
                              type="password"
                              class="form-control"
                              id="password"
                              name="password"
                              placeholder="*********"
                            />
                          </div>
                        </div>
                        <?php echo $error_password;?>
                        

                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                          
                            <input
                            style="width:40px ! important;height:40;pointer-events:none;letter-spacing:12px;text-decoration:line-through;"
                              type="text"
                              class="form-control"
                              id="captcha"
                              name="captcha"
                              placeholder="<?php echo substr(uniqid(),5);  ?>"
                            />
                          </div>
                        </div>
                        
                        

                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                           
                            <input
                            style="width:40px ! important;height:40;"
                              type="text"
                              class="form-control"
                              id="confirmcaptcha"
                              name="confirmcaptcha"
                              placeholder="  captcha"
                              value=""
                            />
                          </div>
                        </div>
                        <?php echo $error_captcha;?>
                        <?php echo $error_all;?>
                       

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                           
                               

                            <div class="demo-inline-spacing">
                               <a href="">  <button name="btn-login" style="background-color : red;width:150px;border:0;" type="submit" class="btn rounded-pill btn-success">S'inscrire</button></a>
                            </div>



                            </div>
                        </div>
                    </form>
                    <div class="mt-3">
                    <center>    <div style="color:#03c3ec;" >
Vous n'avez pas de compte ? 
                            <span class="fas fa-chevron-right ms-1"> </span>
                       <a href="register.php" ><b style="color:#03c3ec;font-size:20px;">S'inscrire</b></a>
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