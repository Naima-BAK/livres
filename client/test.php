
<?php


require ("../admin/functions/functions.php");
if(!isset($_SESSION['name'])){
     
    header("location:login.php");
  }
  $livraison = getAllLivraisons();

?>

<script src="assets/vendor/libs/jquery-sticky/jquery-sticky.js"></script>
<link rel="stylesheet" href="assets/css/etat.css">

      
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 mx-auto">
           
          <div class="row">
 <!-- ----------------------------------------------------- -->
                <?php       foreach($livraison as $l){
                          if($l['user_id'] == $_SESSION['id']){
                              if($l['etat'] == 'préparation de la commande'){
                                print '
                            <div  class="col-md">
                              <div style="background-color:black" class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                  <span class="custom-option-body">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span class="custom-option-title"> Standard </span>
                                    <small> Delivery in 3-5 days. </small>
                                  </span>
                                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                                </label>
                              </div>
                            </div>';
                              }
                              elseif($l['etat'] == 'en livraison'){
                                print '
                            <div  class="col-md">
                              <div style="background-color:red" class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                  <span class="custom-option-body">
                                  <i class="bx bx-briefcase-alt-2"></i>
                                    <span class="custom-option-title"> Standard </span>
                                    <small> Delivery in 3-5 days. </small>
                                  </span>
                                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                                </label>
                              </div>
                            </div>';
                              }
                              if($l['etat'] == 'livraion terminé'){
                                print '
                            <div  class="col-md">
                              <div style="background-color:blue" class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                  <span class="custom-option-body">
                                  <i class="bx bx-briefcase-alt-2"></i>
                                    <span class="custom-option-title"> Standard </span>
                                    <small> Delivery in 3-5 days. </small>
                                  </span>
                                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                                </label>
                              </div>
                            </div>';
                              }else
                              {
                                print '
                                <div  class="col-md">
                              <div style="" class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                  <span class="custom-option-body">
                                  <i class="bx bx-briefcase-alt-2"></i>
                                    <span class="custom-option-title"> Standard </span>
                                    <small> Delivery in 3-5 days. </small>
                                  </span>
                                  <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon1" checked />
                                </label>
                              </div>
                            </div>';
                              }
                            }
                        }?>
 <!-- ----------------------------------------------------- -->

                         
<!-- ----------------------------------------------------- -->
                           
<!-- ----------------------------------------------------- -->


                          </div>
                        
           
           
          </div>
        </div>
      </div>
   
