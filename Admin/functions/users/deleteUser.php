<?php
   
    include "../functions.php";



     $id=  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM utilisateur WHERE id='$id' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/users.php?delete=ok');
    }
  

?>