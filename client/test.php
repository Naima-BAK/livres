
<?php 

require ("../admin/functions/functions.php");
if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}
$logo = getlogo();
if(isset($_POST['edit_logo'])){
  editLogo();
}
foreach($logo as $logo){
 ?>

<img width="200" height="200" class="d-block rounded" src="../admin/static/img/imgLogo/<?php echo $logo['image'];?>">
<?php }?>
     <form action="test.php" method="POST">
              <input type="file" name="image" id=""><br><br>
             <button name="edit_logo" style=" background: red; border: 0;color: white;border-radius: 50px;"  type="submit">
                Modifier l'image
              </button>
      </form>
    



               
