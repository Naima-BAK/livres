<?php
   
    include "../functions.php";



     $idL=  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM livres WHERE id='$idL' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/livres.php?delete=ok');
    }
  

?>