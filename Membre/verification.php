<?php
	session_start();
	try {
		$base = new PDO("mysql:host=127.0.0.1;dbname=gestionmembre", "root", "");
	} catch(Exception $e) {
		die($e->getMessage());
	}
	if(isset($_POST["email"]) and isset($_POST["mdp"])) {
		$email = $_POST["email"];
		$mdp = $_POST["mdp"];
		if(!empty($email) and !empty($mdp)) {
			$requete = $base->prepare("select * from membre where email = :email and motpasse = :motpasse");
			$mot = "";
			$nom = "";
			$requete->execute(array(
				"email" => $email,
				"motpasse" => $mdp
			));
			while($donnees = $requete->fetch()) {
				$mot = $donnees["MOTPASSE"];
				$nom = $donnees["NOM"];
				$idm = $donnees["IDM"];
			}
			if($mot == $mdp) {
				$_SESSION["nom"] = $nom;
				$_SESSION["idm"] = $idm;
				header("Location: accueil.php");
			} else {
				header("Location: login.php");
			}
		} else {
			header("Location: login.php");
		}
	} else {
		header("Location: login.php");
	}
?>