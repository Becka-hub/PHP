<?php
require('../model/Entreprise.php');
require('../model/Utilisateur.php');
require('../model/Domaine.php');
require('../model/Encadreur.php');
require('../model/Posseder.php');
require('../model/Specialiter.php');
require('../model/Stagiaire.php');
require('../model/Avoir.php');
switch ($_GET['action']) {
  case 'ajouterEntreprise':
  $entreprise=new Entreprise();
  $entreprise->setNomEntreprise($_POST['nomEntreprise']);
  $entreprise->setAdresse($_POST['AdresseEntreprise']);
  $entreprise->create();
  $res=$entreprise->readIdEntreprise($_POST['nomEntreprise'],$_POST['AdresseEntreprise']);
  foreach ($res as $resultat) {
    $idEntre=$resultat['IDENTREPRISE'];
  }
  echo $idEntre;
  $utilisateur=new Utilisateur();
  if($_POST['pwd']==$_POST['Cpwd']){
  $utilisateur->setIdEntreprise($idEntre);
  $utilisateur->setNomUtilisateur($_POST['nomUtilisateur']);
  $utilisateur->setMdpUtilisateur($_POST['pwd']);
  $utilisateur->create();
  $message="Votre conte a ete creer";
   header('Location:../index.php');
 }else {
   header('Location:../vue/Formulaire.php');
 }
    break;
    case 'login':
     $utilisateur=new Utilisateur();
     $res=$utilisateur->readLogin($_POST['nom']);
     foreach ($res as $resultat) {
       $nom=$resultat['NOMUTILISATEUR'];
       $mdp=$resultat['MDPUTILISATEUR'];
     }
    if($_POST['nom']==$nom && $_POST['pass']==$mdp){
      $res=$utilisateur->redIdE($_POST['nom'],$_POST['pass']);
      $idE =0;
      foreach($res as $resultat){
        $idE=$resultat['IDENTREPRISE'];
      }
      header('Location:../home.php?idEntreprise='.$idE);
    }
    else {
      $mes="Votre nom et mot de passe n'est pas correct";
      header('Location:../index.php?me');

    }
      break;
   case 'domaine':
   $domaine=new Domaine();
  $domaine->setNomDomaine($_POST['domaine']);
  $domaine->create();
  $encadreur=new Encadreur();
  $encadreur->setNomEncadreur($_POST['encadreur']);
  $encadreur->create();
  $res=$domaine->readId($_POST['domaine']);
  foreach($res as $resultat){
   $idD=$resultat['IDDOMAINE'];
    $idD;
  }
  $res=$encadreur->readIdE($_POST['encadreur']);
  foreach($res as $resultat){
    $idEN=$resultat['IDENCADREUR'];
    $idEN;
    $_GET['idE'];
  }



   $posed=new Posseder();
   $posed->setIdEncadreur($idEN);
   $posed->setIdDomaine($idD);
  $posed->setIdEntreprise($_GET['idE']);
   $posed->create();
   header('Location:../home.php?');
  break;


 
}

 ?>
