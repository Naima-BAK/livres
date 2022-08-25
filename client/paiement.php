


<?php

require ("../admin/functions/functions.php");
if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}
$commandes = getAllCommandes();
$livres = getAllLivres();
 
if(isset($_GET['id'])){
    $panier = getPanierById($_GET['id']);
}
if(isset($_POST['btn_add'])){
    ajoutPaiement();
}
?>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <?php 
        include "includes/head.html" ?>
        <link rel="stylesheet" href="assets/css/service.css">
</head>

<body >
 <!-- ======= Header ======= -->
 <?php 
  include "includes/header.php" ?>
  <!-- End Header -->
<br>
<div style="margin-top:100px;" class="section-title">
          <h2>Effectuer votre paiement</h2>
          
        </div>
  <div  class="container">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div style="overflow-y:scroll;height:400px" class="row">

                <!-- foreach -->
                <?php
               

                foreach($commandes as $c){
                if($_GET['id'] == $c['panier_id']){
                print'
                <div style="display:flex;">
                <div><img style="width:100px; height:100px;" src="../admin/static/img/imgLivres/'.$c['image'].'" alt="">
                &emsp;&emsp;
                </div>
                      <div style="margin-top:15px;">
                         <p>
                            <h4 style="color:#ffab00">'.$c['titre'].'</h4>
                            Quantité : '.$c['quantite'].' &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                             total : <b> '.$c['total'].' DHS</b></p></div>
                      <div><h4></h4></div>
                    
                </div><br> ';
               
                
             
                   
                }}?>

                  
                   

                </div>

            </div>
            <!---->
                <div class="col-lg-5 p-0 ps-lg-4"> 
                    <form action="paiement.php" method="post"> 
                    <input name="total" type="hidden" value="<?php echo $panier['total'];  ?>">
                    <input name="panier_id" type="hidden" value="<?php echo $panier['id'];  ?>">
                    <input name="prix_livraison" type="hidden" value="40">
                    <input name="user_id" type="hidden" value="<?php echo $_SESSION['id'];  ?>">

                    <div class="row m-0">

                        <div class="col-12 px-4">
                        <div class="d-flex justify-content-between mb-3">
                                 <p class="textmuted fw-bold">Prix de livraison</p>
                                <div class="d-flex align-text-top">
                                     <span class="h4">40 DHS</span>
                                     
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                 <p class="textmuted fw-bold">Total</p>
                                <div class="d-flex align-text-top">
                                     <span class="h4"><?php echo $panier['total'];  ?> DHS</span>
                                     
                                </div>
                            </div>
                        </div>

                        <div class="col-12 px-0">
                            <div style="background-color: #fff2d6 !important;" class="row bg-light m-0">
                               <div class="col-12 px-4 my-4">
                                  <p class="fw-bold">Détails du paiement </p>
                                </div>
                                <div class="col-12 px-4">
                                    <div  class="d-flex  mb-4">
                                         <span  class="">
                                        <p class="text-muted">Numéro de la carte</p>
                                        <input name="cartNum" class="form-control" type="text"
                                            placeholder="1234 5678 9012 3456">
                                    </span>
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Expires</p>
                                        <input name="expire" class="form-control2" type="text"  placeholder="MM/YYYY" require>
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5">
                                        <p class="text-muted">Cardholder name</p>
                                        <input class="form-control" name="name" type="text" 
                                            placeholder="Name" require>
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">CVC</p>
                                        <input name="cvc" class="form-control3" type="text" value="" placeholder="XXX" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12  mb-4 p-0">
                                <div  style="background-color:#ffab00 ;" class="btn btn-primary"><button style="background-color:#ffab00 ;border:0;color:white;" name="btn_add" type="submit">Payer Maintenant</button><span class="fas fa-arrow-right ps-2"></span>
                                </div>
                            </div>
                         
                        </div>

                    </div>
                </div>
            </div>
        </div></form>
    </div>
            
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap');




.container {
    margin: 20px auto;
    max-width: 1000px;
    background-color: white;
    padding: 0;
}


.form-control {
    height: 25px;
    width: 150px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
    font-size: 14px;
}

.form-control:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

.form-control2 {
    font-size: 14px;
    height: 20px;
    width: 55px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
}

.form-control2:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

.form-control3 {
    font-size: 14px;
    height: 20px;
    width: 30px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
}

.form-control3:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

p {
    margin: 0;
}

img {
    width: 100%;
    height: 100%;
    object-fit: fill;
}

.text-muted {
    font-size: 10px;
}

.textmuted {
    color: #6c757d;
    font-size: 13px;
}

.fs-14 {
    font-size: 14px;
}

.btn.btn-primary {
    width: 100%;
    height: 55px;
    border-radius: 0;
    padding: 13px 0;
    background-color: black;
    border: none;
    font-weight: 600;
}

.btn.btn-primary:hover .fas {
    transform: translateX(10px);
    transition: transform 0.5s ease
}


.fw-900 {
    font-weight: 900;
}

::placeholder {
    font-size: 12px;
}

.ps-30 {
    padding-left: 30px;
}

.h4 {
    font-family: 'Work Sans', sans-serif !important;
    font-weight: 800 !important;
}

.textmuted,
h5,
.text-muted {
    font-family: 'Poppins', sans-serif;
}
    </style>

  

<!-- ======= Footer ======= -->
<footer style="margin-top:60px !important;background-color:black" id="footer" class="footer">
<div   class="container">
  <div style="background-color:black"   class="row gy-3">
    <div  class="col-lg-3 col-md-6 d-flex">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red " class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>&nbsp;
      <div>
        <h4 style="color:red ;">Addresse</h4>
        <p>
         SIDI BOUNOU Street <br>
        TAROUDANT,  MAROC<br>
        </p>
      </div>

    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#71dd37 " class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>&nbsp;
      <div>
        <h4 style="color:#71dd37 ;">Réservations</h4>
        <p>
          <strong>Télephone:</strong> +212 552 0000 55<br>
          <strong>Email:</strong> E_co@livres.com<br>
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff4500" class="bi bi-clock-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
</svg>&nbsp;
      <div>
        <h4 style="color:#ff4500;">Horaires d'ouvertures
</h4>
        <p>
          <strong>Lun-Sam : 11 h 00
</strong> - 23 h 00<br>
Dimanche : Fermé

        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
      <h4 >Follow Us</h4>
      <div class="social-links d-flex">
        <a href="#" class="twitter"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #71dd37;transform: ;msFilter:;"><path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path></svg></a>
        <a href="#" class="facebook"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec ;transform: ;msFilter:;"><path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"></path></svg></a>
        <a href="#" class="instagram"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #696cff ;transform: ;msFilter:;"><path d="M20.947 8.305a6.53 6.53 0 0 0-.419-2.216 4.61 4.61 0 0 0-2.633-2.633 6.606 6.606 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.606 6.606 0 0 0-2.185.42 4.607 4.607 0 0 0-2.633 2.633 6.554 6.554 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.59 6.59 0 0 0 2.186-.419 4.615 4.615 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709zm-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246zm4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078z"></path><circle cx="11.994" cy="11.979" r="3.003"></circle></svg></a>
        <a href="#" class="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec ;transform: ;msFilter:;"><path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM8.339 18.337H5.667v-8.59h2.672v8.59zM7.003 8.574a1.548 1.548 0 1 1 0-3.096 1.548 1.548 0 0 1 0 3.096zm11.335 9.763h-2.669V14.16c0-.996-.018-2.277-1.388-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248h-2.667v-8.59h2.56v1.174h.037c.355-.675 1.227-1.387 2.524-1.387 2.704 0 3.203 1.778 3.203 4.092v4.71z"></path></svg></a>
      </div>
    </div>

  </div>
</div>

<div class="container">
  <div style="background-color:black"  class="copyright">
    &copy; Copyright <strong><span>Naima</span></strong>. 
  </div>
 
</div>

  </footer>
  
  <!-- End Footer -->
</body>