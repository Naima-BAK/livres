

<?php 

require ("../admin/functions/functions.php");
if(!isset($_SESSION['name'])){
     
  header("location:login.php");
}
function getAllGroupes(){      
    $conn = DBconnexion();
  
    $requet = "SELECT g.message,g.date,g.user_id,user.nom,user.prenom,user.image from groupes g,utilisateur user where g.user_id=user.id";
    $result = $conn->query($requet);
    $groupes = $result->fetchAll();
    return $groupes;
  }
$groupes = getAllGroupes();
if(isset($_POST['add'])){
    ajoutmessage();
    
  }
?>
<!DOCTYPE html>


<html>
  <head>
   <link rel="stylesheet" href="assets/css/profile.css">
   
<link rel="stylesheet" href="assets/css/desc.css">
     <?php 
        include "includes/head.html" ?>
  </head>

  <body style="background-color: #f5f5f9;overflow-x: hidden;">
     <!-- ======= Header ======= -->
   <?php 
  include "includes/header.php" ?>
  <!-- End Header -->

   

    <div style="margin-top:150px" class="section-title">
          <h2>Paramètres du compte</h2>
          <p>Groupes</p>
       
    </div>
      
    <div class="row">
        <div class="col-md-12">
                   <ul style="margin-left:76px;"  class="nav nav-pills flex-column flex-md-row mb-3">
                      <li class="nav-item">
                         <a class="nav-link " href="profile.php"><i class="bx bx-user me-1"></i> Profile</a>
                       </li>
                       
                        <li class="nav-item">
                              <a style="background-color:#ce1212;color:white" class="nav-link" href="groupes.php"
                             ><i class="bx bx-link-alt me-1"></i> Groupes</a
                            >
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="etat_livraison.php"
                             ><i class="bx bx-link-alt me-1"></i> Suivi de livraison</a
                            >
                        </li>
                   </ul>

                   <div style="background-color: white;border:none;width:1200px;margin-left:76px"  class="card mb-4">
                    <h5 style="padding: 1.5rem 1.5rem; margin-bottom: 0;margin-right:1000px;background-color: transparent; border-bottom: 0 solid #d9dee3;"  class="card-header">
                    Groupes
                    </h5>
                    
                    <hr style="height:2px;" class="my-0" />
                    <div class="card-body">
                     
                    



<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                
                <ul class="list-unstyled chat-list mt-2 mb-0">
                <a href="groupe1.php">
                   <li class="clearfix" style="background-color:#d7f5fc">
                   
                        <img src="assets/img/groupes/dad.png" alt="avatar">
                        <div class="about">
                            <div class="name" style="color:black;">Rich dad Poor dad</div>
                            <div class="status"> <i class="fa fa-circle online"></i></div>
                        </div>
                    </li></a>
                    
                    <a href="groupe2.php">
                    <li class="clearfix">
                        <img src="assets/img/groupes/inter.png" alt="avatar">
                        <div class="about">
                            <div class="name" style="color:black;">Antéchrist
                        </div>
                            <div class="status"> <i class="fa fa-circle online"></i></div>
                        </div>
                    </li></a>

                </ul>
            </div>
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">

                    <!-- ------------------ ------------------- -->
                   
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="assets/img/groupes/dad.png">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">Rich dad Poor dad</h6>
                            </div>
                        </div>
                    <!-- ------------------------------------------------ -->
                        
                    </div>
                </div>
                <div class="chat-history" style="overflow-y:scroll;height:400px;">
                    <ul class="m-b-0">
<!-- -------------------------------- -->
                    <?php
                           foreach($groupes as $msg){
                            if($_SESSION['id'] == $msg['user_id']){
                         print '   
                      
                        <li class="clearfix">
                        <div class="float-right">'.$msg['date'].'</div><br>  <br>  
                          <div class="message other-message float-right">'.$msg['message'].'</div>
                        </li>';
                        
                      }else{?>

                 <!-- -------------------------------- -->    
                    <!-- ---------------------------------- -->
                     
                     <?php  
                     print '
                      <li class="clearfix">
                            <div class="message-data">
                              <span class="message-data-time">'.$msg['date'].'</span>
                            </div>
                            <div class="message my-message">'.$msg['message'].'</div>?>
                        </li>';}}?>
                        <!-- --------------------------------------------- -->


                    </ul>
                </div>
              
            </div>
            
        </div>
        <div class="chat-message clearfix">
                <form action="messages.php" method="post">
        <div style="display:flex;margin-left:350px"> 
            <div  class="div3">
                <div class="mb-3">
                            
                    <div style="width:500px" class="input-group input-group-merge">
                         <input
                            style="width:200px !important;height:50px"
                              type="text"
                              id="message"
                              class="form-control"
                             placeholder="ajouter votre message"
                              name="message"
                            />
                    </div>
                </div>
            </div>
            &emsp;&emsp;
            <div>
            <button style=" background: var(--color-primary); border: 0; padding: 12px 40px;color: #fff;transition: 0.4s;border-radius: 50px;height:45px;" name="add" type="submit">
            Envoyer
  </button>
            </div>
        </div>
        </form>
                </div>
    </div>
</div>
</div>

<style>

body{
    background-color: #f4f7f6;
    margin-top:20px;
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
                    </div>
    </div>
    </div>
    <!-- /Account -->
</div>
</center>



        
<!-- ======= Footer ======= -->
<footer style="margin-top:60px !important;background-color:black" id="footer" class="footer">
<?php 
  include "includes/footer.html" ?>
  </footer><!-- End Footer -->
  

  </body>
</html>
