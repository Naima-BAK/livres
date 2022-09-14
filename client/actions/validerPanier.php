<?php

session_start();
if(!isset($_SESSION['name'])){
     
  header("location:../login.php");
}

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
 
 // id utilisateur :
 $user_id =$_SESSION['id'];
 $total =$_SESSION['panier'][0];
 $date=date('y-m-d');
 //creation de panier
 $requetPanier = "INSERT INTO paniers (id_user,total,date_creation) VALUES ('$user_id','$total','$date')";
 
 //executer la requette panier :
 $result = $conn->query($requetPanier);
 $panier_id = $conn->lastInsertId();

 $commandes = $_SESSION['panier'][2];
 foreach($commandes as $commande){
     
    $quantite = $commande[0];
    $total = $commande[1];
    $livre_id = $commande[3];
    //ajouter la commande :
    $requet= "INSERT INTO commandes (livre_id,quantite,panier_id,total,date_creation) VALUES ('$livre_id','$quantite','$panier_id','$total','$date')";
    //execution de la requette :
    $result = $conn->query($requet);
    $requet = "SELECT * FROM stocks  where livre_id='$livre_id' ";
      $rs = $conn->query($requet);
      $stock = $rs->fetch();
     
      $q = $stock['quantite'] - $commande[0];
      $id = $commande[3];
      
    if($result ){
      
      $requet1 = "UPDATE  stocks SET quantite='$q' where livre_id = '$id'";
      $rs = $conn->query($requet1);
      $requet1 = "UPDATE  livres SET quantite='$q' where id = '$id'";
      $rs = $conn->query($requet1);
      $notify = "la quantite de livre numéro $id est vide";

      if($q < 1 ){
        $requet1 = "INSERT INTO  notifyAdmin(notification) values ('$notify')";
        $rs = $conn->query($requet1);
        
        $requet1 = "DELETE FROM  livres  where id = '$id'";
        $rs = $conn->query($requet1);
        $notify = "le livre  numéro $id à été supprimé dans les livres";
        $requet1 = "INSERT INTO  notifyAdmin(notification) values ('$notify')";
        $rs = $conn->query($requet1);
      }

      
    }
}
// supprimer le panier:
$_SESSION['panier'] = null;
//redirection 
header("location:../paiement.php?id=$panier_id");





?>