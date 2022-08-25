<?php
   
    include "../functions.php";



     $id=  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM livraison WHERE id='$id' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/livraison.php?delete=ok');
    }
  

?>