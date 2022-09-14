<?php
  
  require ("../admin/functions/functions.php");
 if(!isset($_SESSION['name'])){
     
     header("location:client/login.php");
 }
 
$notifications = getAllNotifiClient();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="assets/css/service.css">
<?php include "includes/head.html" ?>
</head>

<body>
    <!-- ======= Header ======= -->
  <?php 
  include "includes/header.php" ?>
  <!-- End Header -->
<br>
<br>
<br>
<br><br>
	
               <div class="section-title">
                    <h2 style="font-size:25px;">Toutes les  notifications</h2>
               </div>
               
               		<!------------------------------------------------------  -->
					<div style="width:700px;margin-left:400px;" class="list-group">
						
                    <?php
                       foreach($notifications as $n){
                          
                            print'
                      <a href="#" class="list-group-item">
                        <div class="row g-0 align-items-center">
                          <div class="col-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="orange" class="bi bi-bell-fill" viewBox="0 0 16 16">
                              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                            </svg>
									        </div>
                          <div class="col-10">
                            <div class="text-muted small mt-1"><b style="font-size:20px;">'.$n['notification'].'</b></div>
                            <div class="text-muted small mt-1" style="font-size:15px;">'.$n['date'].'</div>
                          </div>
                        </div>
                      </a>';}

                        
						
                        ?>
								</div>


  <!-- ======= Footer ======= -->
<footer style="margin-top: 500px !important;
  height: 20px !important;background-color:black" id="footer" class="footer">

<div style="background-color:black ! important;"  class="container">
  <div style="background-color:black"  class="row gy-3">
    <div style="background-color:black"  class="col-lg-3 col-md-6 d-flex">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red " class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
        </svg>&nbsp;
        <div style="background-color:black">
          <h4 style="color:red ;">Addresse</h4>
          <p>
              SIDI BOUNOU Street <br>
             TAROUDANT,  MAROC<br>
           </p>
        </div>
      </div>
     <div style="background-color:black" class="col-lg-3 col-md-6 footer-links d-flex">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#71dd37 " class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>&nbsp;
      <div style="background-color:black">
        <h4 style="color:#71dd37 ;">Réservations</h4>
        <p>
          <strong>Télephone:</strong> +212 552 0000 55<br>
          <strong>Email:</strong> E_co@livres.com<br>
        </p>
      </div>
    </div>

    <div style="background-color:black" class="col-lg-3 col-md-6 footer-links d-flex">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff4500" class="bi bi-clock-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
</svg>&nbsp;
      <div style="background-color:black">
        <h4 style="color:#ff4500;">Horaires d'ouvertures
</h4>
        <p>
          <strong>Lun-Sam : 11 h 00
</strong> - 23 h 00<br>
Dimanche : Fermé

        </p>
      </div>
    </div>

    <div style="background-color:black" class="col-lg-3 col-md-6 footer-links">
      <h4 >Follow Us</h4>
      <div style="background-color:black" class="social-links d-flex">
        <a href="#" class="twitter"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #71dd37;"><path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path></svg></a>
        <a href="#" class="facebook"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec ;"><path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"></path></svg></a>
        <a href="#" class="instagram"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #696cff ;"><path d="M20.947 8.305a6.53 6.53 0 0 0-.419-2.216 4.61 4.61 0 0 0-2.633-2.633 6.606 6.606 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.606 6.606 0 0 0-2.185.42 4.607 4.607 0 0 0-2.633 2.633 6.554 6.554 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.59 6.59 0 0 0 2.186-.419 4.615 4.615 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709zm-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246zm4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078z"></path><circle cx="11.994" cy="11.979" r="3.003"></circle></svg></a>
        <a href="#" class="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #03c3ec ;"><path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM8.339 18.337H5.667v-8.59h2.672v8.59zM7.003 8.574a1.548 1.548 0 1 1 0-3.096 1.548 1.548 0 0 1 0 3.096zm11.335 9.763h-2.669V14.16c0-.996-.018-2.277-1.388-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248h-2.667v-8.59h2.56v1.174h.037c.355-.675 1.227-1.387 2.524-1.387 2.704 0 3.203 1.778 3.203 4.092v4.71z"></path></svg></a>
      </div>




    </div>

  </div>
</div>


<div style="background-color:black" class="container">
  <div style="background-color:black" class="copyright">
    &copy; Copyright <strong><span>Naima</span></strong>. 
  </div>
</div>


  </footer>
  <!-- End Footer -->
 

</body>

</html>