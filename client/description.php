

<?php
    require ("../admin/functions/functions.php");
    $categories = getAllCategories();
    
  
if(isset($_GET['id']) ){

$livre = getLivreById($_GET['id']);
$idLivre = $_GET['id'];
// var_dump($idLivre);
}

if(isset($_POST['btn_comment'])){
   ajoutComment();
  }
  $commentaires = getAllComments();
 
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include "includes/head.html" ?>
    <link rel="stylesheet" href="assets/css/desc.css">
    <link rel="stylesheet" href="assets/css/comment.css">
  </head>

  <body>
    <?php  include "includes/header.php" ?>
    <!-- End Header -->

    <!-- ======= Portfolio Details Section ======= -->
    <div style="margin-top:150px" class="section-title">
      <h2>Details de livre</h2>
    </div>
    <section  id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <?php 
                   print'
                    <div class="swiper-slide">
                      <img width="100px" height="400px" src="../admin/static/img/imgLivres/'.$livre['image'].'" alt="">
                    </div>
              </div>
              <div class="swiper-pagination"></div>
              </div>
            </div>

            <div  class="col-lg-4">
              <div style="background-color:  #e8fadf !important; height:400px; " class="portfolio-info">
                <h3 style="color: #71dd37 ;">Informatio de livre </h3>
                <ul>
                  <li><strong>Titre</strong>: '.$livre['titre'].'</li>
                  <li><strong>Auteur</strong>: '.$livre['auteur'].' </li>
                  <li><strong>Categorie</strong>: ';
                  foreach($categories as $index =>$c){
                       if($livre['categorie_id'] == $c['id']){
                        echo $c['nom'];
                       }
                  }
                  print'
                  </li>
                  <li><strong>Prix</strong>: '.$livre['prix'].' DHS</li>
                  <li><strong>date de publication</strong>:'.$livre['date_pub'].'</li>
                  <li><strong>nombre de pages</strong>:'.$livre['nbr_pages'].'</li>
                </ul>
                <form action="actions/commander.php" method="POST">
                  <input type="hidden" value="'.$livre['id'].'" name="livre_id" id="livre_id">
                  
                  <div class="mb-3">
                    <div class="input-group input-group-merge">
                      <span style="background-color: white" id="basic-icon-default-fullname2" class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#71dd37" class="bi bi-list-ol" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
                          <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z"/>
                        </svg>
                      </span>
                      <input type="number" name="quantite" value="1" min="1" max="'.$livre['quantite'].'"class="form-control" />
                    </div>
                  </div> 
                  <center>
                  <button style="background-color:#71dd37;color:white;border:0;width:180px;height:30px;" type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg> 
                  Ajouter au panier</button></center>
              </form>
            </div>
            
          </div>
          <br>
          <div style=" height:200px; width: ! important;" class="portfolio-info">
            <h2>Resume de livre :</h2>
            <p>
              '.$livre['description'].'
            </p>
          </div>';?>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

    

<!-- pdf -->
<br>
<br>


<div class="text-center"><a href="assets/pdf/<?php echo $livre['titre'];?>.pdf" target="_thapa"><button style=" background: var(--color-primary); border: 0; padding: 12px 40px;color: #fff;transition: 0.4s;border-radius: 50px;" name="btn-add" type="submit">Lire en eligne</button></a></div>





<br>
<br>
<!-- -------------------Commentaire-------- -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <div  class="section-title">
    <h2>Commentaires</h2>
    <p><?php
    $i=0;
        foreach($commentaires as $comment){ 
         if($comment['livre_id'] == $idLivre){
             $i+=1;
          }} 
         echo $i; ?> Commentaires
    
  </p>
  </div>

<!-- ----------------------si l'utilisateur est connecté--------------------------- -->
<?php if(isset($_SESSION['id']))
{  ?>
  <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
      <div class="d-flex flex-column col-md-8">
          <!-- Image user connect en cours -->
            <form action="description.php" method="POST">
               <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'];  ?>">
              <input type="hidden" value="<?php echo $idLivre;  ?>" name="livre_id" id="livre_id">
              
              <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                <img  class="img-fluid img-responsive rounded-circle mr-2" src="../admin/static/img/imgUsers/<?php echo $_SESSION['image'];?>"  width="38">
                <div class="input-group input-group-merge">
                  <span style="background-color:white;"  id="basic-icon-default-fullname2" class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#03c3ec" class="bi bi-chat" viewBox="0 0 16 16">
                      <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg>
                  </span>
                  <input type="text" class="form-control mr-3" id="comment"  name="comment" placeholder="Ajouter votre commentaire">
                  <button style="background-color: #03c3ec;border:0;" name="btn_comment" class="btn btn-primary" type="submit">Ajouter</button>
                </div>
              </div>
            </form>
                    <!-- ---------------------------- -->
                    <div style="background-color:#999;overflow-y:scroll;height:400px;">
                    <br>
          <div  >
             <?php foreach($commentaires as $comment){ 
              if($comment['livre_id'] == $idLivre){
          print'   <center> <div style=" background-color: #e7e7ff  !important;width:700px;" class="commented-section mt-2">
                <div class="d-flex flex-row align-items-center commented-user">
                  <img class="img-fluid img-responsive rounded-circle mr-2" src="../admin/static/img/imgUsers/'. $comment['image'].'" width="50">
                  &nbsp;&nbsp; <h5 style="color: #ff3e1d"  class="mr-2">'.$comment['nom'] .' '.$comment['prenom'] .'</h5>
                  <!-- <span class="dot mb-1"></span> -->
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  <span  class="mb-1 ml-2">'. $comment['date'].'</span>
                </div>
                <div class="comment-text-sm">
                &emsp;&emsp;&emsp;&emsp;<span style="margin-right:400px;">'.$comment['comment'].'</span>
                </div>
              </div></center>
              <br>';
               }} ?></div>
              <!-- endforeach -->
            </div>
          </div>
        </div>
      </div>

<?php 
}
else
{ ?>
<!-- ------------------Si l'utilisateur n'est pas connecté-------------------- -->

  <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
       <div class="d-flex flex-column col-md-8">
       
                    <!-- ---------------------------- -->
                    <div style="background-color:#999;overflow-y:scroll;height:400px;">
                    <br>
          <div  >
             <?php foreach($commentaires as $comment){ 
          print'   <center> <div style=" background-color: #e7e7ff  !important;width:700px;" class="commented-section mt-2">
                <div class="d-flex flex-row align-items-center commented-user">
                  <img class="img-fluid img-responsive rounded-circle mr-2" src="../admin/static/img/imgUsers/'. $comment['image'].'" width="50">
                  &nbsp;&nbsp; <h5 style="color: #ff3e1d"  class="mr-2">'.$comment['nom'] .' '.$comment['prenom'] .'</h5>
                  <!-- <span class="dot mb-1"></span> -->
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  <span  class="mb-1 ml-2">'. $comment['date'].'</span>
                </div>
                <div class="comment-text-sm">
                &emsp;&emsp;&emsp;&emsp;<span style="margin-right:400px;">'.$comment['comment'].'</span>
                </div>
              </div></center>
              <br>';
               } ?></div>
              <!-- endforeach -->
            </div>
          </div>
        </div>
      </div>
 <?php
} ?>


<!-- -------------------livres similaires  -->

<!-- ------------------------------------- -->








<!-- ======= Footer ======= -->
<footer style="margin-top:150px !important;background-color:black;" id="footer" class="footer">
<?php 
 include "includes/footer.html" ?>
  </footer>
  
</body>




