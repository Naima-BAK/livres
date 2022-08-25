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
$conn = DBconnexion();
var_dump($idLivre);

