<?php
   
    include "../functions.php";



     $id =  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM messages WHERE id='$id' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/messages.php?delete=ok');
    }
  

?>