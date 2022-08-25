
<?php
  
  session_start();
  require ("../functions/functions.php");
 if(!isset($_SESSION['name_admin'])){
     
     header("location:../client/login.php");
 }
  
   $stocks = getAllStocks();
   // $color = color();
  
   if(!empty($_POST)){
          
       if(!empty($_POST['searchId']) && empty($_POST['searchTitre'])){
       $stocks = searchStockId($_POST['searchId']);
       } 
       if(empty($_POST['searchId']) && !empty($_POST['searchTitre'])){
        $stocks = searchStockTitre($_POST['searchTitre']);
        } 
       
     }else{
       $stocks = getAllStocks();
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
         Stock est supprimer avec succès
         </div>';
        }
       
        ?>

             <!-- Content wrapper -->
             <div class="content-wrapper">
           <!-- Content -->

           <div class="container-xxl flex-grow-1 container-p-y">

         
              <div class="card">

                 <h5 class="card-header" style="background-color: white !important;"><b><span style="background-color: #ffe0db !important;  color:#ff3e1d   !important;font-size:large;">Gestion des Stocks</span></b>
                 &nbsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                   
                   
                   <br>
           <style>
             .div1{
               display:flex;
               margin-left:40px;
               margin-top:10px;
             }
                           
           </style>
           
           <form action="stocks.php" method="post">
             <div class="div1">
                    
             <div class="div2">
                       <div class="mb-3">
                         <div class="input-group input-group-merge">
                         <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text"
                             ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #ff3e1d  ;transform: ;msFilter:;"><path d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z"></path></svg></span>
                           </span>
                           <input
                           style="width:270px"
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
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #ff3e1d "><path d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19c0-.101.009-.191.024-.273.112-.576.584-.717.988-.727H21V4a2 2 0 0 0-2-2zm0 9-2-1-2 1V4h4v7z">

                            </path>
                        </svg>
                         
                         </span>
                           <input
                           style="width:270px"
                             type="text"
                             id="description"
                             class="form-control"
                            placeholder="chercher par titre de livre"
                             name="searchTitre"
                           />
                           </div>
                         </div>
                   </div>
                   
                  
                  
                   
                   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                   &emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <div class="div4">
                         <button name="s1" type="submit" style="width: 30px;height:30px ;border:0;background-color: #ff3e1d   !important;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: white;transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path></svg></button></span>
                        </div>
                     
              </div></form>
             
                 </h5>

                  <div class="table-responsive text-nowrap">
                     <table style=""  class="table">
                  
                 
                        <thead style="background-color:#ffe0db !important;" >
                          <tr>
                            <th>Id</th>
                            <th>Titre de livre</th>
                            <th>Quantite</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody style=""  class="table-border-bottom-0">
                            <?php  
                               foreach($stocks as $stock){

                                 print'
                                 <td>'.$stock['id'].'</td>
                                 <td>'.$stock['titre'].'</td>
                                 <td>'.$stock['quantite'].'</td>
                                 <td>
                                    <a onclick="return confirmer()" href="../functions/livres/deleteStock.php?id='.$stock['id'].'"> <svg data-toggle="modal" data-target="#delete" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                     <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                   </svg></a>
                                 </td>
                             </tr>
                                     ';
                                     

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
             return confirm("Voulez-vous vraiment supprimer le stock ?");
         }
   </script>
  
</body>

</html>