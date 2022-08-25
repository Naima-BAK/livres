<?php
    session_start();
    require ("../functions/functions.php");
   if(!isset($_SESSION['name_admin'])){
       
       header("location:../client/login.php");
   }

$livraisons = getAllLivraisons();
  
    if(isset($_GET['id']) ){
 
        $livraison = getLivraisonById($_GET['id']);
     }
    if(isset($_POST['btnSubmit']))
    {
        //changer etat de livraison :
        changerEtatLivraison($_POST);
        
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
                    <!-- Content wrapper -->
			  <div class="content-wrapper">
              <!-- Content -->
                   <div class="container-xxl flex-grow-1 container-p-y">
                       <div class="card">
                          <div class="card-body">
                             <h5  class="card-title"><b style="background-color: #ffe0db !important;margin-left:20px;  color:  #ff3e1d !important;font-size:large;"> Modifier la Catégorie :</b></h5>
                        
               
                    <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="hidden" name="Livraison_id" value="<?php echo $livraison['id']; ?>">

                         <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Etat de la livraison </label>
                          <div style="margin-left:100px;" class="input-group input-group-merge">
                            <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text"
                              ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill:#ff3e1d;transform: ;msFilter:;"><path d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z"></path></svg></span>
                              <select name="etat" style="width:600px;height:50px;">
                                     <option value="en livraison"><b>En livraison </b></option>
                                      <option value="livraison terminé"><b>Livraison terminé </b></option>
                           </select>
                          </div>
                        </div>

                        
                        
                        
                        <center>
                        <button style="background-color: #ff3e1d;border:0;width:250px;height:40px" type="submit" name="btnSubmit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #e8fadf;transform: ;msFilter:;"><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zm4.799-2.013H8v-1.799l4.977-4.97 1.799 1.799-4.977 4.97zm5.824-5.817-1.799-1.799L15.196 11l1.799 1.799-1.372 1.371zM5 7h14v2H5V7z"></path></svg>&emsp;Mettre à jour</button>
                      </center></form>
                    </div>
                 
                 
                </div>
              </div>
            </div>
          </div>
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

</body>

</html>