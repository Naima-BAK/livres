<?php
   
    include "../functions.php";



     $idcategory =  $_GET['id'];
     $conn = DBconnexion();
   
    $requet = "DELETE FROM categories WHERE id='$idcategory' ";
     
     $result = $conn->query($requet);
    if($result){
       header('location:../../static/categories.php?delete=ok');
    }
  

?>