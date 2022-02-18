<?php
require('../model/Domaine.php');
require('../model/Encadreur.php');
require('../model/Specialiter.php');
require('../model/Stagiaire.php');
require('../model/Avoir.php');
switch ($_GET['action']) {
case 'AjouteSta':
  $chemin ='';
  if ($_FILES["uploadFile"]["error"] > 0)
  $chemin =  "Return Code: " . $_FILES["uploadFile"]["error"] . "<br>";
  else                
  {                
  if (file_exists("uploadFile/" . $_FILES["uploadFile"]["name"]))                
   $chemin = $_FILES["uploadFile"]["name"] . " already exists. ";                
  else                
  {                
    move_uploaded_file($_FILES["uploadFile"]["tmp_name"],
    "uploadFile/" . $_FILES["uploadFile"]["name"]);
   
    $chemin = "uploadFile/".$_FILES["uploadFile"]["name"];  
  }                
  }
  $specialiter=new Specialiter();
  $specialiter->setNomSpecialiter($_POST['specialiter']);
  $specialiter->create();
  $stagiaire=new Stagiaire();
  $stagiaire->setIdEntreprise($_GET['idE']);
  $stagiaire->setNomStagiaire($_POST['nom']);
  $stagiaire->setAdresseStagiaire($_POST['adresse']);
  $stagiaire->setPhoto($chemin);
  $stagiaire->setDateDebut($_POST['debut']);
  $stagiaire->setDateFin($_POST['fin']);
  $stagiaire->setIdDomaine($_POST['domaine']);
  $stagiaire->create();

  $res=$specialiter->readID($_POST['specialiter']);
  foreach($res as $resultat){
    $idSpe=$resultat['IDSPECIALITER'];
  }

  $res=$stagiaire->readID($_POST['nom'],$_POST['adresse']);
  foreach($res as $resultat){
   $idSTA=$resultat['IDSTAGIAIRE'];
  }
  $avoir=new Avoir();
  $avoir->setIdStagiaire($idSTA);
  $avoir->setIdSpecialiter($idSpe);
  $avoir->create();

  $res=$specialiter->readNom($idSpe);
  foreach($res as $resultat){
    $nomspe=$resultat['NOMSPECIALITER'];
  }
  $domaine=new Domaine();
  $res=$domaine->readNomd($_POST['domaine']);
  foreach($res as $resultat){
    $nomD=$resultat['NOMDOMAINE'];
  }

  
  break;
}
 
  ?>