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
  $id=$_POST['idUser'];
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $prenom=$_POST['prenom'];
  $profession = $_POST['profession'];
  $desc = $_POST['desc'];
  $age = $_POST['age'];
  $genre=$_POST['genre'];
  $tele = $_POST['tele'];
  $livre = $_POST['livre'];

var_dump(  $livre);
  //creation de la requet :
 $requet = "UPDATE utilisateur set nom='$nom',email='$email', prenom='$prenom',age='$age',profession='$profession',genre='$genre',telephone='$tele',livre='$livre', desc='$desc' WHERE id='$id'";
 $result = $conn->query($requet);

    if($result){
     header('location:../client/profile.php');
    }else{
         echo "Impossible de modifier votre compte";
    }
?>