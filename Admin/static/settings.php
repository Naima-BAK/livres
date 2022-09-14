

<?php 

require ("../functions/functions.php");
if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}
$logo = getlogo();

if(isset($_POST['orange'])){
  editNavOrange();
}

if(isset($_POST['white'])){
    editNavWhite();
  }

  if(isset($_POST['blue'])){
    editNavBlue();
  }

  if(isset($_POST['move'])){
    editNavMove();
  }
  if(isset($_POST['green'])){
    editNavGreen();
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
                
            <div style="" class="section-title">
               <h2>Paramètres</h2>
            </div>
<div class="row">
  <div class="col-md-12">
     <div style="background-color: white;border:none;"  class="card mb-4">
      <h5  class="card-header"> Modifier le logo</h5>
      <hr>
<br>
     <?php
        foreach($logo as $logo){
      ?>
      <div style="display:flex;">
      
      <div>
         <img style="margin-left:10px" width="120" height="50" class="d-block rounded" src="img/imgLogo/<?php echo $logo['image'];?>">
         <?php }?>
        </div>
     <div>
     <form style="margin-left:30px" action="settings.php" method="POST">
        <input type="file" name="image" id=""><br><br>
        <button name="edit_logo" style=" background: red; border: 0;color: white;border-radius: 50px;"  type="submit">
        Modifier l'image
        </button>
      </form>
    </div>
        </div>
<br><br>
       
 
  


  <hr  class="my-0" />
  <h5  class="card-header"> Modifier la couleur du navbar</h5>
  <div style="margin-right:100;" class="card-body" >


     <!-- <form action="settings.php" method="POST">
     <input type="hidden" name="color" value="black">
     <button id="cercle" style="background: black;border:0;" name="black"></button>
    </form> -->

    <div style="display:flex;">

    <div> <form action="settings.php" method="POST">
        <input type="hidden" name="color" value="white">
     <button id="cercle" style="background: white;" name="white"></button>
     </form></div>

     &emsp;&emsp;

     <div><form action="settings.php" method="POST">
     <input type="hidden" name="color" value="#d7f5fc">
     <button id="cercle" style="border:0;background:#03c3ec" name="blue"></button>
     </form></div>

     &emsp;&emsp;

     <div><form action="settings.php" method="POST">
     <input type="hidden" name="color" value="orange">
     <button id="cercle" style="border:0;background:#ffab00;"name="orange"></button>
     </form></div>

     &emsp;&emsp;

<div><form action="settings.php" method="POST">
<input type="hidden" name="color" value="#696cff">
<button id="cercle" style="border:0;background:#696cff;"name="move"></button>
</form></div>
&emsp;&emsp;
<div><form action="settings.php" method="POST">
<input type="hidden" name="color" value="#71dd37">
<button id="cercle" style="border:0;background: #71dd37 ;"name="green"></button>
</form></div>

    </div>

    </div>
    </div>
    </div>
    <!-- /Account -->
</div>
<style>
  #cercle {
    
    width: 40px;
    height: 40px;
    border-radius: 20px;
    
}
</style>
</center>


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



<style>
                                  .section-title {
    text-align: center;
    padding-bottom: 30px;
  }
  .section-title h2 {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 20px;
    position: relative;
  }
  .section-title h2::before {
    content: "";
    position: absolute;
    display: block;
    width: 120px;
    height: 1px;
    background: #ddd;
    bottom: 1px;
    left: calc(50% - 60px);
  }
  .section-title h2::after {
    content: "";
    position: absolute;
    display: block;
    width: 40px;
    height: 3px;
    background: #71dd37;
    bottom: 0;
    left: calc(50% - 20px);
  }
                            </style>



















