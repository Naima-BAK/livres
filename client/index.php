
<?php  
require ("../admin/functions/functions.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
        include "includes/head.html" ?>
 
</head>

<body>

  <!-- ======= Header ======= -->
  <?php 
  include "includes/header.php" ?>
  <!-- End Header -->
  <?php>
              if (isset($_GET['edit']) && $_GET['edit'] == "ok"){
        print '<script"> alert("password est modifier avec succès");
        </script>';
        } ?>

  <div style="height: 50px important;">
  <ul  style="height: 100px important;" class="slideshow">
        <li>
          <h3>Eco_Livres <br> 
          <div class="card-body">
                      <div class="demo-inline-spacing">
                        
                        <button type="button" class="btn rounded-pill btn-info">Plus d'informations</button>
                      </div>
                    </div></h3>
          
          <span>Slide One</span> </li>
        <li><h3>Eco_Livres <br> 
          <div class="card-body">
                      <div class="demo-inline-spacing">
                        
                        <a href="about.php"><button type="button" class="btn rounded-pill btn-info">Plus d'informations</button>
                     </a> </div>
                    </div></h3> <span>Slide Two</span> </li>
        <li><h3>Eco_Livres <br> 
          <div class="card-body">
                      <div class="demo-inline-spacing">
                        
                      <a href="about.php"> <button type="button" class="btn rounded-pill btn-info">Plus d'informations</button>
                      </a> </div>
                    </div></h3> <span>Slide Three</span> </li>
        <li><h3>Eco_Livres <br> 
          <div class="card-body">
                      <div class="demo-inline-spacing">
                        
                        <button type="button" class="btn rounded-pill btn-info">Plus d'informations</button>
                      </div>
                    </div></h3> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
        <li> <span>Slide Four</span> </li>
  </ul>
  </div>
<!-- ======= Footer ======= -->
<footer style="margin-top: 570px !important;
  height: 20px !important;background-color:black" id="footer" class="footer">
 <?php 
  include "includes/footer.html" ?>

  </footer><!-- End Footer -->
  <!-- End Footer -->

</div>









  <style> html { min-height: 300px!important; }

body { height: 300px !important; 
background-color: black; }
.foot .mere .div1 h5{
color: #fff;
}
.slideshow li h3{
  margin-bottom: 100px !important;
}

#footer{
  margin-top: 520px !important;
  height: 20px !important;

}
.slideshow {
  list-style: none;
  z-index: 1;
}

.slideshow li span {
  margin-top: 80px !important;
  width: 100%;
  height: 500px !important;
  position: absolute;
  top: 0px;
  left: 0px;
  color: transparent;
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: none;
  opacity: 0;
  z-index: 0;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-animation: imageAnimation 24s linear infinite 0s;
  -moz-animation: imageAnimation 24s linear infinite 0s;
  animation: imageAnimation 24s linear infinite 0s;
}

.slideshow li h3 {
  position: absolute;
  text-align: center;
  z-index: 2;
  bottom: 150px;
  left: 0;
  right: 0;
  opacity: 0;
  font-size: 2em;
  font-family: 'roboto', sans-serif;
  text-transform: uppercase;
  color: #fff;
  -webkit-animation: titleAnimation 24s linear 1 0s;
  -moz-animation: titleAnimation 24s linear 1 0s;
  animation: titleAnimation 24s linear 1 0s;
}
@media only screen and (min-width: 768px) {

.slideshow li h3 {
  bottom: 30px;
  font-size: 2em;
}
}
@media only screen and (min-width: 1024px) {

.slideshow li h3 { font-size: 2em; }
}

.slideshow li:nth-child(1) span { background-image:url('https://getwallpapers.com/wallpaper/full/0/e/6/165796.jpg'); }

.slideshow li:nth-child(2) span{
  background-image: url('https://getwallpapers.com/wallpaper/full/0/6/b/1184902-book-pages-as-wallpaper-2800x2100-for-windows-10.jpg');
  -webkit-animation-delay: 6s;
  -moz-animation-delay: 6s;
  animation-delay: 6s;
}

.slideshow li:nth-child(2) h3{
 -webkit-animation-delay: 6s;
  -moz-animation-delay: 6s;
  animation-delay: 6s;
}

.slideshow li:nth-child(3) span {
  background-image: url('https://getwallpapers.com/wallpaper/full/8/7/3/651927.jpg');
  -webkit-animation-delay: 12s;
  -moz-animation-delay: 12s;
  animation-delay: 12s;
}

.slideshow li:nth-child(4) span {
  background-image: url('Ressources/images/Chaussures/d.jpg');
  -webkit-animation-delay: 18s;
  -moz-animation-delay: 18s;
  animation-delay: 18s;
}
.slideshow li:nth-child(5) span {
  background-image: url('Ressources/images/Vetement/T-shirts/t (4).jpg');
  -webkit-animation-delay: 24s;
  -moz-animation-delay: 24s;
  animation-delay: 24s;
}
.slideshow li:nth-child(6) span {
  background-image: url('Ressources/images/Vetement/Robes/r14.jpg');
  -webkit-animation-delay: 30s;
  -moz-animation-delay: 30s;
  animation-delay: 30s;
}
.slideshow li:nth-child(7) span {
  background-image: url('Ressources/images/Vetement/Robes/r1.jpg');
  -webkit-animation-delay: 34s;
  -moz-animation-delay: 34s;
  animation-delay: 34s;
}

.slideshow li:nth-child(8) span {
  background-image: url('Ressources/images/Vetement/Robes/r20.jpg');
  -webkit-animation-delay: 40s;
  -moz-animation-delay: 40s;
  animation-delay:40s;
}
.slideshow li:nth-child(9) span {
  background-image: url('Ressources/images/Vetement/Robes/r16.jpg');
  -webkit-animation-delay: 44s;
  -moz-animation-delay: 44s;
  animation-delay:44s;
}
 @-webkit-keyframes 
imageAnimation {  0% {
 opacity: 0;
 -webkit-animation-timing-function: ease-in;
}
 12.5% {
 opacity: 1;
 -webkit-animation-timing-function: ease-out;
}
 25% {
 opacity: 1;
}
 37.5% {
 opacity: 0;
}
 100% {
 opacity: 0;
}
}
@-moz-keyframes 
imageAnimation {  0% {
 opacity: 0;
 -moz-animation-timing-function: ease-in;
}
 12.5% {
 opacity: 1;
 -moz-animation-timing-function: ease-out;
}
 25% {
 opacity: 1;
}
 37.5% {
 opacity: 0;
}
 100% {
 opacity: 0;
}
}
@keyframes 
imageAnimation {  0% {
 opacity: 0;
 -webkit-animation-timing-function: ease-in;
 -moz-animation-timing-function: ease-in;
 animation-timing-function: ease-in;
}
 12.5% {
 opacity: 1;
 -webkit-animation-timing-function: ease-out;
 -moz-animation-timing-function: ease-out;
 animation-timing-function: ease-out;
}
 25% {
 opacity: 1;
}
 37.5% {
 opacity: 0;
}
 100% {
 opacity: 0;
}
}
@-webkit-keyframes 
titleAnimation {  0% {
 opacity: 0;
}
 12.5% {
 opacity: 1;
}
 25% {
 opacity: 1;
}
 37.5% {
 opacity: 0;
}
 100% {
 opacity: 0;
}
}
@-moz-keyframes 
titleAnimation {  0% {
 opacity: 0;
}
 12.5% {
 opacity: 1;
}
 25% {
 opacity: 1;
}
 37.5% {
 opacity: 0;
}
 100% {
 opacity: 0;
}
}
@keyframes 
titleAnimation {  0% {
 opacity: 0;
}
 12.5% {
 opacity: 1;
}
 25% {
 opacity: 1;
}
 37.5% {
 opacity: 0;
}
 100% {
 opacity: 0;
}
}

.no-cssanimations .slideshow li span { opacity: 1; }
</style>