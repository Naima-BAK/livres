<?php
   
    include "../functions.php";



     $id =  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM commentaires WHERE id='$id' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/commentaires.php?delete=ok');
    }
  

?>