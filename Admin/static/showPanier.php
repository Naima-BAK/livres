
<?php
  
  session_start();
  
 if(!isset($_SESSION['name_admin'])){
     
     header("location:../client/login.php");
 }
   require ("../functions/functions.php");
   $commandes = getAllCommandes2();
   $panier = getPanierById($_GET['id']);

  


   ?>
<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
   <meta name="author" content="AdminKit">
   <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
   <?php include "includes/head.html" ?>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
 th{
  
   color:#495057!important;
 }
</style>
</head>



<body>
   <div class="wrapper">
       

 <!-- nav -->
 <?php include "includes/nav.php" ?>
       <!-- end nav -->




       <div class="main">


           <!-- nav2 -->
           <?php include "includes/nav2.php" ?>
           <!-- end nav2 -->

     <main class="content">


    
     <?php
     
      
        if (isset($_GET['delete']) && $_GET['delete'] == "ok"){
         print '<div class="alert alert-success">
         Commande est supprimer avec succès
         </div>';
        }
       
        ?>

             <!-- Content wrapper -->
             <div class="content-wrapper">
           <!-- Content -->

           <div class="container-xxl flex-grow-1 container-p-y">

         
              <div class="card">

                 <h5 class="card-header" style="background-color: white !important;"><b><span style="background-color: #e7e7ff  !important;  color:#696cff  !important;font-size:large;">La liste des commandes</span></b>
                
                   <br>
           <style>
             .div1{
               display:flex;
               margin-left:40px;
               margin-top:10px;
             }
                           
           </style>
           
             
                 </h5>

                  <div class="table-responsive text-nowrap">
                     <table class="table">
                  
                 
                        <thead style="background-color:  #e7e7ff !important;" >
                          <tr>
                            <th >Id</th>
                            <th>titre du livre</th>
                            <th>Image</th>
                            <th>Quantité</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                 
                 
                          <tbody class="table-border-bottom-0">
                   
                                   
                            <?php  
                               foreach($commandes as $c){
                                if($c['panier_id'] == $panier['id']) {
                                    
                                 print'
                                     <tr>
                                          <td>'.$c['id'].'</td>
                                          <td>'.$c['titre'].'</td>
                                          <td><img src="img/imgLivres/'.$c['image'].'" height="100" width="100" /> </td>';
                                        


                                        print '  
                                          <td>'.$c['quantite'].'</td>   
                                          <td>'.$c['total'].'</td>
                                          
                                    </tr>';
                                     

                                 } }
                                  
                                   ?>
                    
                     
                   </tbody>
                 </table>
               </div>
             </div>


</div></div>


       </main>


           <footer class="footer">
               <!-- footer -->
               <?php include "includes/footer.php" ?>
               <!-- end footer -->
           </footer>
       </div>
   </div>

     <!-- foot -->
     <?php include "includes/foot.php" ?>
     <!-- end foot -->
   <script>
         function confirmer(){
             return confirm("Voulez-vous vraiment supprimer le panier ?");
         }
   </script>
  
</body>

</html>