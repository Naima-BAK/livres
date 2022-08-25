
<?php
  
 
  session_start();
  require ("../functions/functions.php");
 if(!isset($_SESSION['name_admin'])){
     
     header("location:../client/login.php");
 }
 
   $paniers = getAllLivraisons();
   // $color = color();
  
   if(!empty($_POST)){
          
       if(!empty($_POST['searchId']) && empty($_POST['searchDate']) && empty($_POST['searchEtat'])){
       $livraisons = searchLivraisonId($_POST['searchId']);
       } 
       if(empty($_POST['searchId']) && !empty($_POST['searchDate']) && empty($_POST['searchEtat'])){
        $livraisons = searchLivraisonDate($_POST['searchDate']);
        } 
        if(empty($_POST['searchId']) && empty($_POST['searchDate']) && !empty($_POST['searchEtat'])){
            $livraisons = searchLivraisonEtat($_POST['searchEtat']);
            } 
       
     }else{
       $livraisons = getAllLivraisons();
     }

    

   

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
         Panier est supprimer avec succès
         </div>';
        }
       
        ?>

             <!-- Content wrapper -->
             <div class="content-wrapper">
           <!-- Content -->

           <div class="container-xxl flex-grow-1 container-p-y">

         
              <div class="card">

                 <h5 class="card-header" style="background-color: white !important;"><b><span style="background-color:  #ffe0db !important;  color:#ff3e1d  !important;font-size:large;">Gestion des Paniers</span></b>
                 
                   
                   <br>
           <style>
             .div1{
               display:flex;
               margin-left:40px;
               margin-top:10px;
             }
                           
           </style>
           
           <form action="livraison.php" method="post">
             <div class="div1">
                    
             <div class="div2">
                       <div class="mb-3">
                         <div class="input-group input-group-merge">
                         <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text"
                             ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #ff3e1d ;transform: ;msFilter:;"><path d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z"></path></svg></span>
                           </span>
                           <input
                           style="width:200px"
                             type="search"
                             id="description"
                             class="form-control"
                            placeholder="chercher par id"
                             name="searchId"
                           />
                          </div>
                       </div>
                   </div>


                   &emsp;


                   <div class="div3">
                     <div class="mb-3">
                       <div class="input-group input-group-merge">
                         <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ff3e1d " class="bi bi-calendar-date" viewBox="0 0 16 16">
                            <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                          </svg>
                         
                         </span>
                           <input
                           style="width:200px"
                             type="date"
                             id="description"
                             class="form-control"
                            placeholder="yyyy-mm-dd"
                             name="searchDate"
                           />
                           </div>
                         </div>
                   </div>
                   &emsp;
                   <div class="div3">
                     <div class="mb-3">
                       <div class="input-group input-group-merge">
                         <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#696cff " class="bi bi-calendar-date" viewBox="0 0 16 16">
                            <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                          </svg>
                         
                         </span>
                           <input
                           style="width:200px"
                             type="text"
                             id="description"
                             class="form-control"
                            placeholder="chercher par etat"
                             name="searchEtat"
                           />
                           </div>
                         </div>
                   </div>
                   
                  
                  
                   
                   &emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <div class="div4">
                         <button name="s1" type="submit" style="width: 30px;height:30px ;border:0;background-color: #ff3e1d  !important;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: white;transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path></svg></button></span>
                        </div>
                     
              </div></form>
             
                 </h5>

                  <div class="table-responsive text-nowrap">
                     <table style=""  class="table">
                  
                 
                        <thead style="background-color:   #e7e7ff!important;" >
                          <tr>
                            <th>Id</th>
                            <th>Utilisateur</th>
                            <th>adresse</th>
                            <th>ville</th>
                            <th>etat</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                 
                 
                          <tbody style=""  class="table-border-bottom-0">
                   
                             
                            <?php  
                               foreach($livraisons as $l){

                                 print'
                                     <tr>
                                          <td>'.$l['id'].'
                                        
                                          </td>

                                          <td>'.$l['user_id'].'</td>
                                         


                                          
                                          <td>'.$l['adresse'].'</td>
                                          <td>'.$l['ville'].'</td>
                                          <td>'.$l['etat'].'</td>
                                          <td>'.$l['date_creation'].'</td>
                                          <td>

                                          
                                          <a  href="showLivraison.php?id='.$l['id'].'"> <svg   xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffab00" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                             </svg> 
                                             &nbsp;
                                             <a href="traitementLivraison.php?id='.$l['id'].'"><button class="btn"><h3>Traiter</h3></button></a>
                                             &nbsp;


                                              <a onclick="return confirmer()" href="../functions/livraison/deleteLivraison.php?id='.$l['id'].'"> <svg data-toggle="modal" data-target="#delete" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg></a>
                                          </td>
                                      </tr>';
                                     

                                   }
                                  
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