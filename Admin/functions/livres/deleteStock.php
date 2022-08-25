<?php
   
    include "../functions.php";



     $ids=  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM stocks WHERE id='$ids' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/stocks.php?delete=ok');
    }
  

?>