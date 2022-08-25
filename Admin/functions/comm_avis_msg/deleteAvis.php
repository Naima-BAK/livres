<?php
   
    include "../functions.php";



     $id =  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM avis WHERE id='$id' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/avis.php?delete=ok');
    }
  

?>