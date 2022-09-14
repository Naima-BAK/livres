
<?php
  
    
   require ("../functions/functions.php"); 
    if(!isset($_SESSION['name_admin'])){
        
        header("location:../client/login.php");
    }
   
    // $color = color();
   $categories = getAllCategories();
          if(!empty($_POST)){
           
            if(!empty($_POST['searchId']) && empty($_POST['searchName']) && empty($_POST['searchAuteur'])){
            $livres = searchLivreId($_POST['searchId']);
            } 
            elseif(empty($_POST['searchId']) && !empty($_POST['searchName']) && empty($_POST['searchAuteur'])){
            $livres = searchLivreName($_POST['searchName']);
            }
            elseif(empty($_POST['searchId']) && empty($_POST['searchName']) && !empty($_POST['searchAuteur'])){
              $livres = searchLivreAuteur($_POST['searchAuteur']);
              }
            
          }else{
            $livres = getAllLivres();
          }


       
    
    if(isset($_POST['btn-ajouter'])){
      ajoutLivre();
     }

     if(isset($_POST['btn_delete'])){
      deleteLivre();
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
      
         if (isset($_GET['ajouter']) && $_GET['ajouter'] == "ok"){
             print '<div class="alert alert-success">
             catégorie est ajouté avec succès
             </div>';
         }
         if (isset($_GET['delete']) && $_GET['delete'] == "ok"){
          print '<div class="alert alert-success">
          Catégorie est supprimer avec succès
          </div>';
      }
      if (isset($_GET['edit']) && $_GET['edit'] == "ok"){
        print '<div class="alert alert-success">
        Catégorie est modifier avec succès
        </div>';
    }
         ?>


		      <!-- Content wrapper -->
			  <div class="content-wrapper">
            <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">

          
               <div class="card">
                  <h5 class="card-header" style="background-color: white !important;"><b><span style="background-color: #d7f5fc !important;
    color: #03c3ec !important;font-size:large;">Gestion des catégories</span></b>
                  &nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <svg data-toggle="modal" data-target="#add"  style="margin-left:100px important;" xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="#03c3ec" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                    </svg>
                    
                    
            <style>
              .div1{
                display:flex;
                margin-left:40px;
                margin-top:10px;
              }
                            
            </style>
            <br>
            <form action="livres.php" method="post">
              <div class="div1">
                     
                  
                    <div class="div2">
                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                          <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text"
                              ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec;transform: ;msFilter:;"><path d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z"></path></svg></span>
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
                          <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text"
                              ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19c0-.101.009-.191.024-.273.112-.576.584-.717.988-.727H21V4a2 2 0 0 0-2-2zm0 9-2-1-2 1V4h4v7z"></path></svg></span>
                            <input
                            style="width:200px"
                              type="text"
                              id="description"
                              class="form-control"
                             placeholder="chercher par titre"
                              name="searchName"
                            />
                            </div>
                          </div>
                    </div>
                    
                    &emsp;


                    <div class="div3">
                        <div class="mb-3">
                          <div class="input-group input-group-merge">
                          <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text"
                              > 
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                            </span>
                            <input
                            style="width:200px"
                              type="text"
                              id="description"
                              class="form-control"
                             placeholder="chercher par auteur"
                              name="searchAuteur"
                            />
                            </div>
                          </div>
                    </div>
                    &nbsp;&nbsp; &nbsp; &emsp;&emsp;&emsp;

                    
                        <div class="div4">
                          <button name="s1" type="submit" style="width: 30px;height:30px ;border:0;background-color: #03c3ec !important;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: white;transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path></svg></button></span>
                         </div>
                      
               </div></form>
              
                  </h5>

                   <div class="table-responsive text-nowrap">
                      <table class="table">
                   
                  
                         <thead style="background-color: #d7f5fc !important;" >
                           <tr>
                             <th >Id</th>
                             <th>categorie</th>
                             <th>Titre</th>
                             <TH>Auteur</TH>
                             <th>Prix</th>
                             <th>Image</th>
                            
                             <th>Actions</th>
                           </tr>
                         </thead>
                  
                  
                           <tbody class="table-border-bottom-0">
                    
				                    
                             <?php  
                                foreach($livres as $livre){

                                  print'
                                      <tr>
                                           <td>'.$livre['id'].'
                                           <td>';
                                           foreach($categories as $index=> $c){
                                            if($livre['categorie_id'] == $c['id']){
                                             echo $c['nom'];
                                            }
                                            }
                                           
                                           print'
                                           </td>
                                           </td>
                                           <td>'.$livre['titre'].'</td>
                                           <td>'.$livre['auteur'].'</td>
                                           <td>'.$livre['prix'].'</td>
                                           <td><img height="40" width="40" src="img/imgLivres/'.$livre['image'].'" alt=""></td>
                                        <td>

                                           <a  href="showLivre.php?id='.$livre['id'].'"> <svg   xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffab00" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                 <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                 <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                              </svg> 
                                              &nbsp;
                                            
                                              <a  href="editLivre.php?id='.$livre['id'].'"> <svg   xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#03c3ec" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                               <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                              </svg></a> &nbsp;


                                               <a onclick="return confirmer()" href="../functions/livres/deleteLivre.php?id='.$livre['id'].'"> <svg data-toggle="modal" data-target="#delete" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
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




              <!-- Modal add categorie -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form action="livres.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b style="background-color: #d7f5fc !important;
    color: #03c3ec !important;margin-left:20px;font-size:large;"> Ajouter La catégorie </b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <input type="hidden" name="idc" value="<?php echo $livre['id']; ?>">
      <div class="modal-body">

      <!--------------------Le titre---------------------------- -->
            <div class="mb-3">
                <div class="input-group input-group-merge">
                <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text"
                      >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19c0-.101.009-.191.024-.273.112-.576.584-.717.988-.727H21V4a2 2 0 0 0-2-2zm0 9-2-1-2 1V4h4v7z"></path></svg>
                                  </span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder=" Entrez le titre de livre"
                          id="titre"
                          name="titre"
                          required
                        />
                      </div>
                      </div>

                      
      <!--------------------La categorie---------------------------- -->
           <div class="mb-3">
                        
                        <select id="defaultSelect" name="categorie_id" class="form-select">
                          <?php   foreach($categories as $categorie)
                    {
                      print '
                            <option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';}?>
                         </select>
                      </div>
                      
      <!--------------------auteur---------------------------- -->
                      <div class="mb-3">
                <div class="input-group input-group-merge">
                <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                            </span> <input
                          type="text"
                          class="form-control"
                          placeholder=" Entrez le nom de l'auteur"
                          id="auteur"
                          name="auteur"
                          required
                        />
                      </div>
                      </div>
      <!--------------------le prix---------------------------- -->
                      <div class="mb-3">
                <div class="input-group input-group-merge">
                <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                            </span> <input
                          type="text"
                          class="form-control"
                          placeholder=" Entrez le prix"
                          id="prix"
                          name="prix"
                          required
                        />
                      </div>
                      </div>
                      <!--------------------la quantite---------------------------- -->
                      <div class="mb-3">
                <div class="input-group input-group-merge">
                <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                            </span> <input
                          type="number"
                          min="1"
                          class="form-control"
                          placeholder=" Entrez la quantite"
                          id="quantite"
                          name="quantite"
                          required
                        />
                      </div>
                      </div>
      <!--------------------image---------------------------- -->
       
                    <div  class="input-group">
                        <input  type="file" class="form-control" id="image" name="image" required/>
                        <label style="background-color: #d7f5fc !important;
    color: #03c3ec !important;" class="input-group-text" for="image">Télecharger</label>
                      </div><br>
      <!--------------------nbr_pages---------------------------- -->
                      <div class="mb-3">
                <div class="input-group input-group-merge">
                <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                            </span> <input
                          type="text"
                          class="form-control"
                          placeholder=" Entrez le nombre de pages"
                          id="nbr_pages"
                          name="nbr_pages"
                          required
                        />
                      </div>
                      </div>
      <!--------------------date_pub---------------------------- -->
                      <div class="mb-3">
                <div class="input-group input-group-merge">
                <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                            </span><input
                          type="date"
                          class="form-control"
                          placeholder=" Entrez la date de publiation"
                          id="date_pub"
                          name="date_pub"
                          
                        />
                      </div>
                      </div>
                     
      <!--------------------description---------------------------- -->
                      <div class="mb-3">
                <div class="input-group input-group-merge">
                <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
                            </span><input
                          type="text"
                          class="form-control"
                          placeholder=" Entrez la description"
                          id="description"
                          name="description"
                          required
                        />
                      </div>
                      </div>
                    

                     
                                 
        			
      </div> 

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
        <button  style="background-color: #03c3ec;border:0;" type="submit" value="Ajouter" name="btn-ajouter" class="btn btn-primary">Enregistrer</button>
      </div></form>
    </div>
  </div>
</div>
<!-- end model add categorie -->








</div></div>


		</main>







			<footer class="footer">
				<!-- footer -->
				<?php include "includes/footer.php" ?>
				<!-- end footer -->
			</footer>
		
	</div>

	  <!-- foot -->
	  <?php include "includes/foot.php" ?>
	  <!-- end foot -->
    <script>
          function confirmer(){
              return confirm("Voulez-vous vraiment supprimer la catégorie ?");
          }
    </script>
   
</body>

</html>