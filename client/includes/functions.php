<?php


// --------------------------------------------------------------------
 $error_name='';  
 $error_email1='';
 $error_password='';
 $error_cpassword= '';
function ajouterCompte(){

      $conn = DBconnexion();
      $nom = $_POST['nom'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $cpass = md5($_POST['cpassword']);

      // ------------------------------
      if(empty($_POST['nom'])){
            $error_name= '<label class="text-danger"><b>Entrez votre nom</b></label>';
       }
     

     // ------------------------------
       if(empty($_POST['email'])){
         $error_email1='<label class="text-danger"><b>Entrez votre email</b></label>';
       }
      
     // ------------------------------
       if(empty($_POST['password'])){
         $error_password= '<label class="text-danger">Entrez votre mot de passe </label>';
      }
  
       if(empty($_POST['cpassword'])){
         $error_cpassword= '<label class="text-danger">Entrez votre mot de passe </label>';
       }
      //  

      $email_exist ="SELECT * FROM utilisateur where email='$email' and password='$password'";
      $result = $conn->query($email_exist);
      if(isset($result)){
            echo "<script> alert('email déja existe')</script>";
      }
      else
      {
            if($password != $cpass){
                  $error_cpassword = 'password not matched!';
          }
           else
            {
               $insert = "INSERT INTO utilisateur(nom, email, password) VALUES ('$nom','$email','$password',)";
               $result1 = $conn->query($insert);
               if(isset($result1)){
                   echo "<script> alert('votre compte à été créee avec succés')</script>";
                   header('location:login.php');
               }
             }
      }
      
           


}