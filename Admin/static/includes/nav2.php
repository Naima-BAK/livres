<?php
if(!isset($_SESSION['name_admin'])){
	
	header("location:../client/login.php");

}
$navColor = getNavColor();
$notifications = getAllNotifi();
function getAllMessages(){      
    $conn = DBconnexion();
  
    $requet = "SELECT DATE_FORMAT(g.date, '%d/%m/%Y') as date1, g.message,g.date,g.user_id,user.nom,user.prenom,user.image,user.email from messages g,utilisateur user where g.user_id=user.id";
    $result = $conn->query($requet);
    $messages = $result->fetchAll();
    return $messages;
  }
$messages = getAllMessages();

?>
<?php  
 foreach($navColor as $nav){ 
     $color= $nav['background'];
     $c = $nav['color'];
 
 }
 
 ?>
<nav style="background-color:<?php echo $color; ?> ;" class="navbar navbar-expand navbar-light navbar-bg">


<a class="sidebar-toggle js-sidebar-toggle">
<i class="hamburger align-self-center"></i>
</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="<?php echo $c;?>" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>
                        <span class="indicator">4</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                   
                    <div class="dropdown-menu-header">
                       <?php
                       $i = 0;
                       foreach($notifications as $n){
                             if( $n['date1'] == date("d/m/Y")){
                                $i++;
                              }
                       }  echo "$i Nouveau Notifications";
                       ?>
                    </div>

                    <div class="list-group">
                    <?php
                       foreach($notifications as $n){
                        if( $n['date1'] == date("d/m/Y")){
                            print'
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                            <div class="col-2">
                            <i class="text-warning" data-feather="bell"></i>
                        </div>

                                <div class="col-10">
                                    <div class="text-muted small mt-1">'.$n['notification'].'</div>
                                    <div class="text-muted small mt-1">'.$n['date'].'</div>
                                </div>
                            </div>
                        </a>'; }}?>
                       
                        <!-- // <a href="#" class="list-group-item">
                        //     <div class="row g-0 align-items-center">
                        //         <div class="col-2">
                        //             <i class="text-primary" data-feather="home"></i>
                        //         </div>
                        //         <div class="col-10">
                        //             <div class="text-dark">Login from 192.186.1.8</div>
                        //             <div class="text-muted small mt-1">5h ago</div>
                        //         </div>
                        //     </div>
                        // </a>

                        // <a href="#" class="list-group-item">
                        //     <div class="row g-0 align-items-center">
                        //         <div class="col-2">
                        //             <i class="text-success" data-feather="user-plus"></i>
                        //         </div>
                        //         <div class="col-10">
                        //             <div class="text-dark">New connection</div>
                        //             <div class="text-muted small mt-1">Christina accepted your request.</div>
                        //             <div class="text-muted small mt-1">14h ago</div>
                        //         </div>
                        //     </div>
                        // </a> -->
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="notifications.php" class="text-muted">Afficher toutes les notifications
</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="<?php echo $c;?>" class="bi bi-chat-left" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
</svg>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                    <div class="dropdown-menu-header">
                       
                    </div>
                    <div class="list-group">
                      <?php foreach($messages as $contact){
                         if( $contact['date1'] == date("d/m/Y")){?>  
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <img src="img/imgUsers/<?php echo  $contact['image'];?>" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                                </div>
                                <div class="col-10 ps-2">
                                    <div class="text-dark"><?php echo $contact['nom']; ?></div>
                                    <div class="text-muted small mt-1"><?php echo $contact['message']; ?></div>
                                    <div class="text-muted small mt-1"><?php echo $contact['date']; ?></div>
                                </div>
                            </div>
                        </a>
                        <?php }}?> 

                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="msgs.php" class="text-muted">Afficher les messages</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown" >
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                  <i class="align-middle" data-feather="settings"></i>
                </a>

                <a  class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                   <img src="img/imgUsers/<?php   echo $_SESSION['image'] ; ?>" class="avatar img-fluid rounded me-1" alt="" />
                    <span class="text-dark" ><?php echo $_SESSION['name'];echo ' '.$_SESSION['prenom'];?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="../../client/profile.php"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="settings.php"><i class="align-middle me-1" data-feather="settings"></i> Parametres</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../client/logout.php">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>


