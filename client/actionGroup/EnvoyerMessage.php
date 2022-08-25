<?php
session_start();
 // fonction pour établir la connection avec la base de données
 function DBconnexion(){
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname="book";
   try {
         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
         // set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //  echo "Connected successfully";
   } catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
   }
   return $conn;
 }
 

$conn = DBconnexion();
$message= $_Post['message'];
//creation de panier
$requet = "INSERT INTO groupe1 (user_id,nom,prenom,image,message) VALUES ('$_SESSION['id']',$_SESSION['name']','$_SESSION['prenom']','$_SESSION['image']','$message')";
$result = $conn->query($requet);

$user = $result->fetch();


 header('location:../groupes.php');


?>