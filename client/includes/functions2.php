<?php
//session_start();
// fonction pour établir la connection avec la base de données
// function DBconnexion(){
//   $servername = "localhost";
//   $username = "root";
//   $password = "";
//   $dbname="book";
//   try {
//         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//         // set the PDO error mode to exception
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         //  echo "Connected successfully";
//   } catch(PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
//   }
//   return $conn;
// }

// ---------------------------------
//profile
//editImage :profileImg

function editImage(){
    $target_dir = "C:/xampp/htdocs/myProject/admin/static/img/profileImg/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
     {
        $image = $_FILES["image"]["name"];
        } else
        {
         echo "Sorry, there was an error uploading your file.";
      }
  
   $id = $_SESSION['id'];
     //creation de la requet :
    $requet = "UPDATE livres SET image='$image' where id='$id'";
    $result = $conn->query($requet);
  
       if($result){
            header('location:profile.php');
       }else{
            echo "Impossible d'ajouter cette image";
       }
}

// 


    