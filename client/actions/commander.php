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
 
//  if(!isset($_SESSION['user_name'])){
//    header('location:../login.php');
//    exit();// pour ne pas ajouter la commande à la bas de données
// }



 
$livre_id =$_POST['livre_id'];
$quantite =$_POST['quantite'];


$conn = DBconnexion();
$user_id= $_SESSION['id'];

$requet= "SELECT prix,titre FROM livres WHERE id='$livre_id'";

$result = $conn->query($requet);

$livre = $result->fetch();

$total = $quantite * $livre['prix'];
$date=date('y-m-d');

 if(!isset($_SESSION['panier']) ){  //panier n'existe pas

    $_SESSION['panier'] = array(0,$date, array());  //creer le panier
 }
$_SESSION['panier'][0] +=$total;
$_SESSION['panier'][2][] = array($quantite, $total, $date,$livre_id, $livre['titre']);//une double [] pour ajouté une autre commande
$result = $conn->query($requet);

 header('location:../Panier.php');


?>