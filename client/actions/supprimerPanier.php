<?php 

require "../includes/functions.php";
 
session_start();

$id = $_GET['id'];
  $total_supprimer = $_SESSION['panier'][2][$id][1];
  //$_SESSION['panier'][3][$id] : la premiere commande avec son indice 
 $_SESSION['panier'][1] -=   $total_supprimer;

unset($_SESSION['panier'][2][$id]);  // unset pour supprimer un element de tableau

header('location:../Panier.php');


?>
