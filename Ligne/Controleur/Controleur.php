<?php
session_start();
require('../Model/Document.php');
require('../Model/Message.php');
require('../Model/Notif.php');
require('../Model/Etudiant.php');
$document=new Document();
$message=new Message();
$notif=new Notif();
$etudiant=new Etudiant();
if(isset($_POST['type']) && isset($_POST['categorie']) ){

	$diplome=$_POST['diplome'];
	$type=$_POST['type'];
	$categorie=$_POST['categorie'];
    $vague=$_POST['vague'];
    $filiere=$_POST['filiere'];
    $titre=$_POST['titre'];

          if ($_FILES["couverture"]["error"] > 0)
          $couverture =  "Return Code: " . $_FILES["couverture"]["error"] . "<br>";
          else                
          {                
          if (file_exists("uploadFile/" . $_FILES["couverture"]["name"]))                
           $couverture = $_FILES["couverture"]["name"] . " already exists. ";                
          else                
          {                
            move_uploaded_file($_FILES["couverture"]["tmp_name"],
            "uploadFile/" . $_FILES["couverture"]["name"]);
           
            $couverture = "uploadFile/".$_FILES["couverture"]["name"];  
          }                
          }

          if ($_FILES["contenu"]["error"] > 0)
          $contenu =  "Return Code: " . $_FILES["contenu"]["error"] . "<br>";
          else                
          {                
          if (file_exists("uploadFile/" . $_FILES["contenu"]["name"]))                
           $contenu = $_FILES["contenu"]["name"] . " already exists. ";                
          else                
          {                
            move_uploaded_file($_FILES["contenu"]["tmp_name"],
            "uploadFile/" . $_FILES["contenu"]["name"]);
           
            $contenu = "uploadFile/".$_FILES["contenu"]["name"];  
          }                
          }

          $document->setDIPLOME($diplome);
          $document->setVAGUE($vague);
          $document->setFILIERE($filiere);
          $document->setTYPE($type);
          $document->setCATEGORIE($categorie);
          $document->setTITRE($titre);
          $document->setCOUVERTURE($couverture);
          $document->setCONTENU($contenu);
          $document->Insert();
             $res=$document->AfficheTo($titre,$vague,$diplome,$filiere);
               foreach($res as $resultat){
               $ntitre=$resultat['TITRE'];
               $ntype=$resultat['TYPE'];
               $ncategorie=$resultat['CATEGORIE'];
               $nvague=$resultat['VAGUE'];
               $ndiplome=$resultat['DIPLOME'];
               $nfiliere=$resultat['FILIERE'];
              }
              echo $ntitre;
              echo $ntype;
              echo $ncategorie;
              echo $nvague;
              echo $ndiplome;
              echo $nfiliere;
              $notif->setNOTIF($ntitre);
              $notif->setTYPE($ntype);
              $notif->setCATEGORIE($ncategorie);
              $notif->setVAGUE($nvague);
              $notif->setDIPLOME($ndiplome);
              $notif->setFILIERE($nfiliere);
              $notif->Insert();
              header('Location:../index.php');
   
}






if(isset($_POST['nom']) && isset($_POST['mdp'])){
  if ($_FILES["photo"]["error"] > 0)
  $photo =  "Return Code: " . $_FILES["photo"]["error"] . "<br>";
  else                
  {                
  if (file_exists("uploadFile/" . $_FILES["photo"]["name"]))                
   $photo = $_FILES["photo"]["name"] . " already exists. ";                
  else                
  {                
    move_uploaded_file($_FILES["photo"]["tmp_name"],
    "uploadFile/" . $_FILES["photo"]["name"]);
   
    $photo = "uploadFile/".$_FILES["photo"]["name"];  
  }                
  }
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $diplome=$_POST['diplome'];
  $filiere=$_POST['filiere'];
  $vagueE=$_POST['vague'];
  $photo=$photo;
  $mdp=$_POST["mdp"];
  $etudiant->setNOM($nom);
  $etudiant->setPRENOM($prenom);
  $etudiant->setDIPLOME($diplome);
  $etudiant->setFILIERE($filiere);
  $etudiant->setVAGUE($vagueE);
  $etudiant->setPHOTO($photo);
  $etudiant->setMDP($mdp);
  $etudiant->Insert();
 header('Location:../login.php');
 
}


if(isset($_POST["login"])){
  $prenom=$_POST["prenom"];
  $mdp=$_POST["mdp"];
  if($res=$etudiant->Affiche($prenom,$mdp)){
     foreach($res as $row){
       $_SESSION['IDETUDIANT']=$row['IDETUDIANT'];
       $_SESSION['NOM']=$row['NOM'];
       $_SESSION['PRENOM']=$row['PRENOM'];
       $_SESSION['DIPLOME']=$row['DIPLOME'];
       $_SESSION['FILIERE']=$row['FILIERE'];
       $_SESSION['VAGUE']=$row['VAGUE'];
       $_SESSION['PHOTO']=$row['PHOTO'];
       $_SESSION['login']=true;
     }
    header('Location:../page.php');
  }else{
    header('Location:../login.php');
    echo "Prenom ou mdp incorrect!";
  }
}

?>