



<?php
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
// --------------------------------------------------------------------



// --------------------------
// ---------contact-----------
function  ajoutContact(){

  $conn = DBconnexion();
  $message = $_POST['message'];
  $email = $_POST['email'];
  $nom = $_POST['name'];
  
  
  $requet = "INSERT INTO contact(nom,email,message) values ('$nom','$email','$message') ";
  $result = $conn->query($requet);
  if($requet){
    header("location:contact.php");
  }
  }

  ?>