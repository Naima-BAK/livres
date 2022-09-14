<?php
 
  
 require ("../functions/functions.php");
if(!isset($_SESSION['name_admin'])){
    
    header("location:../client/login.php");
}

    $livres = getAllLivres();
    $categories = getAllCategories();
    if(isset($_POST['btn-edit'])){
        editLivre();
    }
    if(isset($_GET['id']) ){
 
       $livre = getLivreById($_GET['id']);
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
                             <h5  class="card-title"><b style="background-color: #d7f5fc  !important;margin-left:20px;  color: #03c3ec !important;font-size:large;"> Modifier le livre :</b></h5>
                        
               
                    <div class="card-body">
                    <form action="editLivre.php" method="POST">
                         <input type="hidden" name="idc" value="<?php echo $livre['id']; ?>">

                         <div class="mb-3">
                          <label  class="form-label" for="basic-icon-default-fullname">id </label>
                          <div class="input-group input-group-merge">
                            <input
                            
                              type="text"
                              class="form-control"
                              id="id"
                              value="<?php echo $livre['id']; ?>"
                              name="id"
                           
                            />
                          </div>
                        </div>

                        <div class="mb-3">
                          <label  class="form-label" for="basic-icon-default-fullname">Titre </label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              class="form-control"
                              id="title"
                              value="<?php echo $livre['titre']; ?>"
                              name="titre"
                           
                            />
                          </div>
                        </div>


                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Categorie</label>
                          <div class="input-group input-group-merge">
                         <select id="defaultSelect" name="categorie_id" class="form-select" value="<?php echo $livre['categorie_id']; ?>">
                         <option  value="<?php echo $livre['categorie_id']; ?>" selected ><?php echo $livre['categorie_id']; ?></option>
                         <?php   foreach($categories as $categorie)
                    {
                      print '
                            <option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';}?>
                         </select>
                          </div>
                        </div>
              
      <!--------------------auteur---------------------------- -->
      <div class="mb-3">
      <label  class="form-label" for="basic-icon-default-fullname">l'auteur </label>
                                        
      <div class="input-group input-group-merge">
                <input
                          type="text"
                          class="form-control"
                          
                          id="auteur"
                          value="<?php echo $livre['auteur']; ?>"
                          name="auteur"
                        />
                      </div>
                      </div>
      <!--------------------le prix---------------------------- -->
                      <div class="mb-3">
                      <label  class="form-label" for="basic-icon-default-fullname">le prix </label>
                          
                <div class="input-group input-group-merge">
               <input
                          type="text"
                          class="form-control"
                          
                          id="prix"
                          value="<?php echo $livre['prix']; ?>"
                          name="prix"
                        />
                      </div>
                      </div>
      <!--------------------image---------------------------- -->

                        <div class="mb-3">
                       
                          
                          <label class="form-label" for="image">Image</label>
                          <div  class="input-group input-group-merge">
                            <input
                              type="file"
                              id="imageCat"
                              class="form-control"
                              value="<?php echo $livre['image']; ?>"
                             name="image"
                            />
                            </div>
                          
                        </div>
                        <!--------------------nbr_pages---------------------------- -->
                      <div class="mb-3">
                      <label  class="form-label" for="basic-icon-default-fullname">nombre de page </label>
                          
                <div class="input-group input-group-merge">
                 <input
                          type="text"
                          class="form-control"
                          placeholder=" Entrez le nombre de pages"
                          id="nbr_pages"
                          value="<?php echo $livre['nbr_pages']; ?>"
                          name="nbr_pages"
                        />
                      </div>
                      </div>
      <!--------------------date_pub---------------------------- -->
                      <div class="mb-3">
                      <label  class="form-label" for="basic-icon-default-fullname">date de publication </label>
                          
                <div class="input-group input-group-merge">
               <input
                          type="text"
                          class="form-control"
                          placeholder=" Entrez la date de publiation"
                          id="date_pub"
                          value="<?php echo $livre['date_pub']; ?>"
                          name="date_pub"
                        />
                      </div>
                      </div>
                     
      <!--------------------description---------------------------- -->
                      <div class="mb-3">
                      <label  class="form-label" for="basic-icon-default-fullname">description </label>
                          
                <div class="input-group input-group-merge">
               <input
                          type="text"
                          class="form-control"
                          placeholder=" Entrez la description"
                          id="description"
                          value="<?php echo $livre['description']; ?>"
                          name="description"
                        />
                      </div>
                      </div>
                        <center>
                        <button style="background-color:#03c3ec;border:0;width:200px;height:40px" type="submit" name="btn-edit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #e8fadf;transform: ;msFilter:;"><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zm4.799-2.013H8v-1.799l4.977-4.97 1.799 1.799-4.977 4.97zm5.824-5.817-1.799-1.799L15.196 11l1.799 1.799-1.372 1.371zM5 7h14v2H5V7z"></path></svg>&emsp;Mettre à jour</button>
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