
<?php 
require ("../admin/functions/functions.php");
$livres = getAllLivresLangues();
$categories = getAllCategories();

if(!empty($_POST)){
           
  if(!empty($_POST['searchTitre']) && empty($_POST['searchAuteur']) && empty($_POST['searchPrix'])){
      $livres = searchLivrelangueName($_POST['searchTitre']);
  } 
  elseif(empty($_POST['searchTitre']) && !empty($_POST['searchAuteur']) && empty($_POST['searchPrix'])){
      $livres = searchLivrelangueAuteur($_POST['searchAuteur']);
  }
  elseif(empty($_POST['searchTitre']) && empty($_POST['searchAuteur']) && !empty($_POST['searchPrix'])){
     
     if($_POST['searchPrix'] == 'prix bas'){
      $livres = searchLivrelanguePrixBas();
     }else{
      $livres = searchLivrelanguePrixEleve();
     }
          
    }

}else{
  $livres = getAllLivresLangues();
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="assets/css/services.css">
<?php 
        include "includes/head.html" ?>
</head>
sty
<body>


           <!-- ======= Header ======= -->
           <?php 
  include "includes/header.php" ?>
  <!-- End Header -->
   
 <!-- ======= Portfolio Section ======= -->
 <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit</p>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
            <a href="livres.php"> <li data-filter="*" class="filter">Tout</li></a>
              <?php  
                foreach($categories as $cat){
                  if($cat['nom'] == "Dictionnaires & langues"){
                    print '<a href="livres_'.$cat['nom'].'.php"> <li data-filter="*" class="filter-active">'.$cat['nom'].' </li></a>';
                      }else{
                  print'
                    <a href="livres_'.$cat['nom'].'.php"> <li data-filter=".filter-app">'.$cat['nom'].' </li></a>';
                }}?>
            </ul>
          </div>
        </div>


<div class="row">
  <div class="col-lg-12">
    <form action="livres_Dictionnaires & langues.php" method="post">
    <ul id="portfolio-flters">

    <li style="background: white ! important;" > 
    <div class="mb-3">
            <select style="width:200px;height:50px;" name="searchPrix" id="defaultSelect" class="form-select">
              <option value="">choisir le prix</option>
               <option value="prix bas">prix bas</option>
               <option value="prix élvé">prix élvé</option>
            </select>
              </div>
    </li>

    <li style="background: white ! important;"> <div class="mb-3">
                      <div class="input-group input-group-merge">
                        <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #ce1212"><path d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19c0-.101.009-.191.024-.273.112-.576.584-.717.988-.727H21V4a2 2 0 0 0-2-2zm0 9-2-1-2 1V4h4v7z"></path></svg> 
                        </span>
                            <input
                            style="width:200px;height:50px"
                              type="text"
                              id="description"
                              class="form-control"
                             placeholder="chercher par titre"
                              name="searchTitre"
                            />
                            </div>
                          </div></li>
    <li style="background: white ! important;"> <div class="mb-3">
                          <div class="input-group input-group-merge">
                          <span style="background-color:white;" id="basic-icon-default-fullname2" class="input-group-text"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #ce1212"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>
 
                            </span>
                            <input
                            style="width:200px;height:50px"
                              type="text"
                              id="description"
                              class="form-control"
                             placeholder="chercher par auteur"
                              name="searchAuteur"
                            />
                            </div>
                          </div></li>
                          <li  style="background: white ! important;"> <button name="s1" type="submit" style="width: 50px;height:40px ;border:0;background-color: #ce1212 !important;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: white;transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path></svg></button></span>
</li>
    </ul>
    </form>
  </div>
</div>

        <div class="row portfolio-container">
        <?php  
                foreach($livres as $livre){
                  print '
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div style="width : 300px ! important;" class="portfolio-wrap">
              <figure>
                <img src="../admin/static/img/imgLivres/'.$livre['image'].'"class="img-fluid" alt="">
              
              
                <a width="400px" height="400px" href="../admin/static/img/imgLivres/'.$livre['image'].'" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-zoom-in" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
              </svg> </a>


              <a href="description.php?id='.$livre['id'].'"  class="link-details" title="More Details">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg> 
              </a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="description.php?id='.$livre['id'].'">'.$livre['titre'].'</a></h4>
                <b style="color:#f05656">'.$livre['prix'].' DHS</b>
              </div>
            </div>
          </div>';}
          ?>


        </div>

      </div>
    </section><!-- End Portfolio Section -->