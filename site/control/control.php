<?php
require ("../Model/livre.php");
switch ($_GET['action']) {
	case 'ajouter':
	$insert=new Livre();
	$insert->setTitre($_POST['titre']);
	$insert->setCategorie($_POST['categorie']);
	$insert->setLangue($_POST['langue']);
	$insert->create();
	//mampiditra anle izy anaty base.Miantso anle methode mampiditra anle izy anaty base.
	header('Location:../index.php');
		break;
	case 'suprimer':
	   $sup=new Livre();
	   $sup->delete($_GET['idL']);
	   header('Location:../index.php');
	break;
	case 'modifier':
	$modifier=new livre();
	$res=$modifier->readByid($_GET['idM']);
	foreach ($res as $resultat){
		$idl=$resultat['idl'];
		$titre=$resultat['titre'];
		$categorie=$resultat['categorie'];
		$langue=$resultat['langue'];
	}
	include('../Vue/modifier.php');
	break;
	case 'update':
	$update=new Livre();

	$update->update($_GET['idM'],$_POST['titre'],$_POST['categorie'],$_POST['langue']);
    header('Location:../index.php');
    break;
}
	
	

?>