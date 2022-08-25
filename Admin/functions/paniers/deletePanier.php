<?php
   
    include "../functions.php";



     $idP=  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM paniers WHERE id='$idP' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/paniers.php?delete=ok');
    }
  

?>