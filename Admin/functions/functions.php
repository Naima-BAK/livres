<?php
session_start();
// fonction pour établir la connection avec la base de données
function DBconnexion(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="book";
  try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  echo "Connected successfully";
  } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
  }
  return $conn;
}
// --------------------------------------------------------------------


// -------------------------------------------------------------------
// Gestion des catégories :
// afficher :
function getAllCategories(){      
    $conn = DBconnexion();

    $requet = "SELECT * from categories";
    $result = $conn->query($requet);
    $categories = $result->fetchAll();
    return $categories;
}

// ajouter :
function    ajoutCategorie(){
  
    $conn = DBconnexion();
    $nom = $_POST['nom'];
    $desc = $_POST['description'];

    $target_dir = "C:/xampp/htdocs/myProject/admin/static/img/imgCat/";
    $target_file = $target_dir . basename($_FILES["imageCat"]["name"]);
 
    if (move_uploaded_file($_FILES["imageCat"]["tmp_name"], $target_file)) 
     {
        $image = $_FILES["imageCat"]["name"];
        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
     } else
     {
         echo "Sorry, there was an error uploading your file.";
      }


     //creation de la requet :
    $requet = "INSERT INTO categories( nom, description, image) VALUES  ('$nom','$desc','$image')";
    $result = $conn->query($requet);

       if($result){
      //      move_uploaded_file($_FILES["imagCat"]["tmp_name"], "C:/xampp/htdocs/myProject/admin/functions/imgCat/".$_FILES["imageCat"]["name"]);
           header('location:categories.php?ajouter=ok');
       }else{
            echo "Impossible d'ajouter cette catégorie";
       }
      }
//Modifier :
  function editCategorie(){ 
       $id = $_POST['idc'];
      $idd=$_POST['id'];
    $conn = DBconnexion();
    $nom = $_POST['nom'];
    $desc = $_POST['description'];


     //creation de la requet :
    $requet = "update categories set id='$idd', nom='$nom', description='$desc' where id='$id'";
    $result = $conn->query($requet);

       if($result){
        header('location:categories.php?edit=ok');
       }else{
            echo "Impossible d'ajouter cette catégorie";
       }
}

//get id categorie:
function  getCategoryById($id){
      $conn = DBconnexion();
  
      $requet = "SELECT * FROM categories WHERE id=$id";
      $result = $conn->query($requet);
      $category = $result->fetch();
      return $category;
    }

//chercher la catégorie par id:
    function searchCategoryId($mot){
      $conn = DBconnexion();

      $requet = "SELECT * FROM categories WHERE id LIKE '%$mot%'";
      $result = $conn->query($requet);
      $categories = $result->fetchAll();
      return $categories;
  }
  
//chercher la catégorie par nom:
  function searchCategoryName($mot){
    $conn = DBconnexion();

    $requet = "SELECT * FROM categories WHERE nom LIKE '%$mot%'";
    $result = $conn->query($requet);
    $categories = $result->fetchAll();
    return $categories;
}




// ------------------------------------------------------------------------
// -------------------------------------------------------------------
// Gestion des livres :
// afficher :
function getAllLivres(){      
  $conn = DBconnexion();

  $requet = "SELECT * from livres";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}

// ajouter :
function    ajoutLivre(){

  $conn = DBconnexion();
  $titre = $_POST['titre'];
  $categorie_id = $_POST['categorie_id'];
  $auteur = $_POST['auteur'];
  $quantite = $_POST['quantite'];
  $prix = $_POST['prix'];
  $pages = $_POST['nbr_pages'];
  $date_pub = $_POST['date_pub'];
  $desc = $_POST['description'];
  $target_dir = "C:/xampp/htdocs/myProject/admin/static/img/imgLivres/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
   {
      $image = $_FILES["image"]["name"];
      } else
      {
       echo "Sorry, there was an error uploading your file.";
    }


   //creation de la requet :
  $requet = "INSERT INTO livres( titre,categorie_id,auteur,prix,image,nbr_pages,date_pub,description,quantite ) VALUES  ( '$titre','$categorie_id','$auteur','$prix','$image','$pages','$date_pub','$desc','$quantite') ";
  $result = $conn->query($requet);
  

     if($result){

        $livre_id = $conn->lastInsertId();
        $requet3 = "SELECT * FROM livres WHERE id='$livre_id'";
        $result3 = $conn->query($requet3);
        $livre = $result3->fetch();
        $q = $livre['quantite'];
        $idL = $livre['id'];
        $titre = $livre['titre'];

        $requet2 = "INSERT INTO stocks (livre_id,titre,quantite) values ('$idL','$titre','$q')";
        if($conn->query($requet2)){
          header('location:livres.php?ajouter=ok');
        }else{
          echo "Impossible d'ajouter ce livre";
        }
      }
    }
//Modifier :
function editLivre(){ 
   $id = $_POST['id'];
  $idd=$_POST['categorie_id'];
  $conn = DBconnexion();
  $nom = $_POST['titre'];
  
  $auteur = $_POST['auteur'];
  $desc = $_POST['description'];
  $date_pub = $_POST['date_pub'];
  $nbr_pages = $_POST['nbr_pages'];
  $prix = $_POST['prix'];



   //creation de la requet :
  $requet = "update livres set  id='$id', categorie_id='$idd', titre='$nom', prix='$prix', nbr_pages='$nbr_pages', date_pub='$date_pub', description='$desc' where id='$id'";
  $result = $conn->query($requet);

     if($result){
      header('location:livres.php?edit=ok');
     }else{
          echo "Impossible d'ajouter cette catégorie";
     }
}

//get id livre:
function getLivreById($id){
    $conn = DBconnexion();

    $requet = "SELECT * FROM livres WHERE id=$id";
    $result = $conn->query($requet);
    $livre = $result->fetch();
    return $livre;
  }

//chercher le livre par id:
  function searchLivreId($mot){
    $conn = DBconnexion();

    $requet = "SELECT * FROM livres WHERE id LIKE '%$mot%'";
    $result = $conn->query($requet);
    $livres = $result->fetchAll();
    return $livres;
}

//chercher le livre le livre par titre:
function searchLivreName($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE titre LIKE '%$mot%'";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
//chercher le livre le livre par auteur:
function searchLivreAuteur($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE auteur LIKE '%$mot%'";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
//chercher le livre le livre par prix:
function searchLivrePrixBas(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE prix <= 50";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
function searchLivrePrixEleve(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE prix > 50";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}

//afficher le stock:
function getAllStocks(){      
  $conn = DBconnexion();

  $requet = "SELECT * from stocks ";
  $result = $conn->query($requet);
  $stocks = $result->fetchAll();
  return $stocks;
  
}
//chercher le stock par id
function searchStockId($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM stocks WHERE id LIKE '%$mot%'";
  $result = $conn->query($requet);
  $stocks = $result->fetchAll();
  return $stocks;
}
//chercher le stock par titre
function searchStockTitre($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM stocks WHERE titre LIKE '%$mot%'";
  $result = $conn->query($requet);
  $stocks = $result->fetchAll();
  return $stocks;
}
// afficher les livres de categorie histoire :
function getAllLivresHistoires(){      
  $conn = DBconnexion();

  $requet = "SELECT * from livres  where categorie_id = 1";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
// afficher les livres de categorie cuisine :
function getAllLivresCuisine(){      
  $conn = DBconnexion();

  $requet = "SELECT * from livres  where categorie_id = 2";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
// afficher les livres de categorie langues :
function getAllLivresLangues(){      
  $conn = DBconnexion();

  $requet = "SELECT * from livres  where categorie_id = 3";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
// livres histoire :

function searchLivrehistoireName($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE titre LIKE '%$mot%' and categorie_id = 1";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
//chercher le livre le livre par auteur:
function searchLivrehistoireAuteur($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE auteur LIKE '%$mot%' and categorie_id = 1";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
//chercher le livre le livre par prix:
function searchLivrehistoirePrixBas(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE prix <= 50 and categorie_id = 1";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
function searchLivrehistoirePrixEleve(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE prix > 50 and categorie_id = 1";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
// livres cuisine :

function searchLivrecuisineName($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE titre LIKE '%$mot%' and categorie_id = 2";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
//chercher le livre le livre par auteur:
function searchLivrecuisineAuteur($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE auteur LIKE '%$mot%' and categorie_id = 2";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
//chercher le livre le livre par prix:
function searchLivrecuisinePrixBas(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE prix <= 50 and categorie_id = 2";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
function searchLivrecuisinePrixEleve(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE prix > 50 and categorie_id = 2";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}

// livres cuisine :

function searchLivrelangueName($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE titre LIKE '%$mot%' and categorie_id = 3";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
//chercher le livre le livre par auteur:
function searchLivrelangueAuteur($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE auteur LIKE '%$mot%' and categorie_id = 3";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
//chercher le livre le livre par prix:
function searchLivrelanguePrixBas(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE prix <= 50 and categorie_id = 3";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}
function searchLivrelanguePrixEleve(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livres WHERE prix > 50 and categorie_id = 3";
  $result = $conn->query($requet);
  $livres = $result->fetchAll();
  return $livres;
}







// ------------------------------------------------------------------------
// commandes & panier---------------------------

//les commandes d'un panier:
function  getPanierById($id){
  $conn = DBconnexion();

  $requet = "SELECT * FROM paniers where id=$id";
  $result = $conn->query($requet);
  $panier = $result->fetch();
  return $panier;
  
}
function getAllCommandes(){
 
  $conn = DBconnexion();

  $requet = "SELECT l.titre, l.image, c.quantite, c.total, c.panier_id from livres l,commandes c where l.id=c.livre_id";
  $result = $conn->query($requet);
  $commandes = $result->fetchAll();
  return $commandes;
  
}




    
  // --------------------------------------------
  // -------- paiement---------------------------- 

// ajouter  paiement:
function    ajoutPaiement(){
  
  $conn = DBconnexion();
  $total = $_POST['total'] + $_POST['prix_livraison'];
  $nom = $_POST['name'];
  $cvc = $_POST['cvc'];
  $user_id=$_SESSION['id'];
  $cartNum=$_POST['cartNum'];
  $expire=$_POST['expire'];
  $panier_id=$_POST['panier_id'];

   //creation de la requet :
  $requet = "INSERT INTO paiement( total, user_id, nom,cartNum,date_expire,cvc,panier_id) VALUES  ('$total','$user_id','$nom','$cartNum','$expire','$cvc','$panier_id')";
  $result = $conn->query($requet);
  $paiement_id = $conn->lastInsertId();
  

     if($result){
      
         header("location:../client/livraison.php?id=$paiement_id");
      }else{
          echo "Impossible d'ajouter ce paiement";
     }
    }




function  getPaiementById($id){
  $conn = DBconnexion();

  $requet = "SELECT * FROM paiement where id=$id";
  $result = $conn->query($requet);
  $paiement = $result->fetch();
  return $paiement;
  
}
function  getPaiement(){
  $conn = DBconnexion();

  $requet = "SELECT * FROM paiement ";
  $result = $conn->query($requet);
  $paiement = $result->fetch();
  return $paiement;
  
}




// ----------------------------------------
// ---- Livraison ---------------------
// ajouter :
function    ajoutLivraison(){
  
  $conn = DBconnexion();
  $adresse = $_POST['adresse'];
  $user_id=$_SESSION['id'];
  $paiement_id=$_POST['paiement_id'];
  $ville=$_POST['ville'];

   //creation de la requet :
  $requet = "INSERT INTO livraison(user_id,paiement_id,adresse,ville) VALUES ('$user_id','$paiement_id','$adresse','$ville')";
  $result = $conn->query($requet);

  // $livraison_id = $conn->lastInsertId();

     if($result){
         header("location:../client/etat_livraison.php");
     }else{
          echo "Impossible d'ajouter ce paiement";
     }
    }
    //livraison Avant paiement


    function    ajoutLivraisonAvantPaiement(){
  
      $conn = DBconnexion();
      $adresse = $_POST['adresse'];
      $user_id=$_SESSION['id'];
      $paiement_id=null;
      $ville=$_POST['ville'];
    
       //creation de la requet :
      $requet = "INSERT INTO livraison(user_id,paiement_id,adresse,ville) VALUES ('$user_id','$paiement_id','$adresse','$ville')";
      $result = $conn->query($requet);
    
      
         if($result){
             header("location:../client/contrat.php");
         }else{
              echo "Impossible d'ajouter ce paiement";
         }
        }



// ---------------------------------------
// ------Users-------------------------------
// -------------------------------------------------------------------

// afficher :
function getAllUsers(){      
  $conn = DBconnexion();

  $requet = "SELECT * from utilisateur where type='user'";
  $result = $conn->query($requet);
  $users = $result->fetchAll();
  return $users;
}

//Modifier :
function editUser(){ 
  $conn = DBconnexion();
  $idu=$_POST['idUser'];
  $nom = $_POST['nom'];
  $email = $_POST['email'];
   $prenom=$_POST['prenom'];
 $profession = $_POST['profession'];
   $desc = $_POST['desc'];
   $age = $_POST['age'];
  $genre=$_POST['genre'];
   $tele = $_POST['tele'];
   $livre = $_POST['livre'];

  //creation de la requet :
 $requet = "UPDATE utilisateur set nom='$nom', email='$email', prenom='$prenom',
  telephone='$tele', profession='$profession', livre='$livre', age='$age', about='$desc', genre='$genre' where id='$idu'";
 $result = $conn->query($requet);

    if($result){
     header('location:../client/profile.php');
    }else{
         echo "Impossible de modifier votre compte";
    }
}
//valider l'utilisateur :
function ValiderUser(){
  $conn = DBconnexion();
  $id=$_POST['user_id'];
  $requet = "UPDATE utilisateur set statut=1 where id='$id'";
  $result = $conn->query($requet);
  if($result){
    header('location:users.php?valide=ok');
   }
}
//get id user:
function getUserById($id){
    $conn = DBconnexion();

    $requet = "SELECT * FROM utilisateur WHERE id=$id";
    $result = $conn->query($requet);
    $user= $result->fetch();
    return $user;
  }

//chercher la user par id:
  function searchUserId($mot){
    $conn = DBconnexion();

    $requet = "SELECT * FROM utilisateur WHERE id LIKE '%$mot%'";
    $result = $conn->query($requet);
    $users = $result->fetchAll();
    return $users;
}
function searchUserName($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM utilisateur WHERE nom LIKE '%$mot%'";
  $result = $conn->query($requet);
  $users = $result->fetchAll();
  return $users;
}
function searchUserEmail($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM utilisateur WHERE email LIKE '%$mot%'";
  $result = $conn->query($requet);
  $users = $result->fetchAll();
  return $users;
}

//edit image user :

// ajouter :
function    editImgUser(){
  
  $conn = DBconnexion();
  $id= $_SESSION['id'];
  $target_dir = "C:/xampp/htdocs/myProject/admin/static/img/imgUsers/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
   {
      $image = $_FILES["image"]["name"];
      } else
      {
       echo "Sorry, there was an error uploading your file.";
    }

  $requet = "UPDATE utilisateur SET image='$image' where id='$id'";
  $result = $conn->query($requet);

 
    }



// ---------------------------------------
// ------Paniers-------------------------------
// -------------------------------------------------------------------

// afficher :
function getAllPaniers(){      
  $conn = DBconnexion();

  $requet = "SELECT * from paniers";
  $result = $conn->query($requet);
  $paniers = $result->fetchAll();
  return $paniers;
}
// ------------

//chercher la panier par id:
  function searchPanierId($mot){
    $conn = DBconnexion();

    $requet = "SELECT * FROM paniers WHERE id LIKE '%$mot%'";
    $result = $conn->query($requet);
    $paniers = $result->fetchAll();
    return $paniers;
}
function searchPanierDate($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM paniers WHERE date_creation LIKE '%$mot%'";
  $result = $conn->query($requet);
  $paniers= $result->fetchAll();
  return $paniers;
}


//-------------------------------------
// ------Commandes-------------------------------
// -------------------------------------------------------------------

// afficher :
function getAllCommandes2(){
 
  $conn = DBconnexion();

  $requet = "SELECT c.id, p.titre, p.image, c.quantite, c.total, c.panier_id from livres p,commandes c where p.id=c.livre_id";
  $result = $conn->query($requet);
  $commandes = $result->fetchAll();
  return $commandes;
}


//get id commande:
function getCommandeById($id){
    $conn = DBconnexion();

    $requet = "SELECT * FROM commandes WHERE id=$id";
    $result = $conn->query($requet);
    $commande= $result->fetch();
    return $commande;
  }



// ------livraison-------------------------------
// -------------------------------------------------------------------

// afficher :
function getAllLivraisons(){
 
  $conn = DBconnexion();

  $requet = "SELECT l.id, l.date_creation, user.nom,l.user_id, l.adresse, l.ville,l.etat from livraison l,utilisateur user where user.id=l.user_id";
  $result = $conn->query($requet);
  $livraisons = $result->fetchAll();
  return $livraisons;
}


//get id livraison:
function getLivraisonById($id){
    $conn = DBconnexion();

    $requet = "SELECT * FROM livraison WHERE id=$id";
    $result = $conn->query($requet);
    $livraison= $result->fetch();
    return $livraison;
  }

//chercher la livraison par id:
function searchLivraisonId($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM livraison WHERE id LIKE '%$mot%'";
  $result = $conn->query($requet);
  $livraisons = $result->fetchAll();
  return $livraisons;
}
function searchLivraisonDate($mot){
$conn = DBconnexion();

$requet = "SELECT * FROM livraison WHERE date_creation LIKE '%$mot%'";
$result = $conn->query($requet);
$livraisons= $result->fetchAll();
return $livraisons;
}

function searchLivraisonEtat($mot){
  $conn = DBconnexion();
  
  $requet = "SELECT * FROM livraison WHERE etat LIKE '%$mot%'";
  $result = $conn->query($requet);
  $livraisons= $result->fetchAll();
  return $livraisons;
  }

function  changerEtatLivraison($data){
   
  $conn = DBconnexion();

  $requet = "UPDATE   livraison set etat='".$data['etat']."' WHERE id='".$data['Livraison_id']."'";
  $result = $conn->query($requet);
  $livraison = $result->fetch();
  if($requet){
    header('location:livraison.php');
  }
}

// -----------------------------------
// ----- commentaires ------------------
//ajout

function  ajoutComment(){

  $conn = DBconnexion();
  $livre_Id = $_POST['livre_id'];
  $user_Id = $_SESSION['id'];
  $comments = $_POST['comment'];
  
  
  $requet = "INSERT INTO commentaires(comment,livre_Id ,user_id) values ('$comments','$livre_Id','$user_Id') ";
  $result = $conn->query($requet);
  if($requet){
    header("location:description.php?id=$livre_Id");
  }
  }

  
function  getAllComments(){
  $conn = DBconnexion();
  $requet= "SELECT user.nom,user.prenom,user.image,c.comment,c.date,c.livre_id,c.id FROM commentaires c,utilisateur user WHERE user.id=c.user_id ";
           
  $result = $conn->query($requet);
  $comments = $result->fetchAll();
  return $comments;
 
}  
// chercher comment par id
function searchCommentaireId($mot){
  $conn = DBconnexion();
  $requet = "SELECT  user.nom,c.comment,c.date,c.livre_id,c.id FROM commentaires c,utilisateur user WHERE c.id like '%$mot%' AND   user.id=c.user_id ";
  $result = $conn->query($requet);
  $commentaires= $result->fetch();
  return $commentaires;
}
// chercher comment par date
function searchCommentaireDate($mot){
  $conn = DBconnexion();
  $requet = "SELECT  user.nom,c.comment,c.date,c.livre_id,c.id FROM commentaires c,utilisateur user WHERE c.date like '%$mot%' AND   user.id=c.user_id ";
  $result = $conn->query($requet);
  $commentaires= $result->fetch();
  return $commentaires;
}

//get id livre:
function getCommentById($id){
  $conn = DBconnexion();

  $requet = "SELECT user.nom,c.comment,c.date,c.id FROM commentaires c,utilisateur user WHERE c.id=$id AND user.id=c.user_id";
  $result = $conn->query($requet);
  $commentaire = $result->fetch();
  return $commentaire;
}

// -----------------------------------------

function getUtilisateurById(){
  $conn = DBconnexion();
  $id = $_SESSION['id'];
  $requet = "SELECT * FROM utilisateur WHERE id=$id";
  $result = $conn->query($requet);
  $user= $result->fetch();
  return $user;
}

// -----------------------------------
// ----- avis ------------------
// //ajout

function  ajoutAvis(){

  $conn = DBconnexion();
  $user_Id = $_SESSION['id'];
  $avis = $_POST['avis'];
  
  
  $requet = "INSERT INTO avis(user_id,avis) values ('$user_Id','$avis') ";
  $result = $conn->query($requet);
  if($requet){
    header("location:avis.php");
  }
  }

//get id livre:
function getAvisById($id){
  $conn = DBconnexion();

  $requet = "SELECT  user.nom,a.avis,user.prenom,a.date,a.id FROM avis a ,utilisateur user WHERE user.id=a.user_id AND a.id=$id";
  $result = $conn->query($requet);
  $avis = $result->fetch();
  return $avis;
}
  
function  getAllAvis(){
  $conn = DBconnexion();
  $requet= "SELECT user.nom,user.prenom,user.image,a.avis,a.date,a.id FROM avis a ,utilisateur user WHERE user.id=a.user_id ";
           
  $result = $conn->query($requet);
  $avis = $result->fetchAll();
  return $avis;
 
}  
//chercher avis par id:
function searchAvisId($mot){
  $conn = DBconnexion();

  $requet = "SELECT * FROM avis WHERE id LIKE '%$mot%'";
  $result = $conn->query($requet);
  $avis = $result->fetchAll();
  return $avis;
}
function searchAvisDate($mot){
$conn = DBconnexion();

$requet = "SELECT * FROM avis WHERE date LIKE '%$mot%'";
$result = $conn->query($requet);
$avis= $result->fetchAll();
return $avis;
}



// --------------------------
// ---------contact-----------
function  ajoutContact(){

  $conn = DBconnexion();
  $message = $_POST['messag'];
  $email = $_POST['mail'];
  $nom = $_POST['nom'];
  
  
  $requet = "INSERT INTO contact(nom,email,message) values ('$nom','$email','$message') ";
  $result = $conn->query($requet);
  if($requet){
    header('location:contact.php?ajout=ok');
  }
  }
  //afficher les contacts
  function  getAllContact(){
    $conn = DBconnexion();
    $requet= "SELECT * FROM contact ";
             
    $result = $conn->query($requet);
    $contact = $result->fetchAll();
    return $contact;
   
  }  
function ajoutmessage(){
  $conn = DBconnexion();
$message= $_POST['message'];
$user_id = $_SESSION['id'];
//creation de panier
$requet = "INSERT INTO groupes(user_id, message) VALUES  ('$user_id','$message')";
$result = $conn->query($requet);
if($requet){
 header('location:groupe1.php');}

}
function ajoutmessage2(){
  $conn = DBconnexion();
$message= $_POST['message'];
$user_id = $_SESSION['id'];
//creation de panier
$requet = "INSERT INTO groupes2(user_id, message) VALUES  ('$user_id','$message')";
$result = $conn->query($requet);
if($requet){
 header('location:groupe2.php');}

}
// ------------------------
// Notification admin
function ajoutnotif(){
  $conn = DBconnexion();
  $id = $_SESSION['id'];
  $notif="utilisatateur numéro "."$id"."veux rejoindre les groupes";
//creation de panier
$requet = "INSERT INTO notifyAdmin(notification) VALUES  ('$notif')";
$result = $conn->query($requet);
if($requet){
 header('location:../client/att_acceptation.php');}

}
// 
// afficher :
function getAllNotifi(){  

  $conn = DBconnexion();
  $requet = "SELECT  DATE_FORMAT(date, '%d/%m/%Y') as date1,notification,date,type from notifyAdmin";
  $result = $conn->query($requet);
  $notifications = $result->fetchAll();
  return $notifications;
}




      
       
      // function  color()
      // {
      //   $conn = DBconnexion();

      //  $requet = "SELECT color FROM color WHERE color='red'";
      //   $result = $conn->query($requet);
      //   $color = $result->fetch();
      //   return $color;
   
      // }

      