<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
	</head>
	<body>
		<form action="" method="post">
			Nom : <input type="text" name="nom" /><br />
			Date de naissance : Jour : <input type="text" name="jour" /> Mois : <input type="text" name="mois" /> Année : <input type="text" name="annee" /><br />
			Email : <input type="text" name="email" /><br />
			Mot de passe : <input type="password" name="mdp" /><br />
			<input type="submit" value="OK" />
		</form>
<?php
	try {
		$base = new PDO("mysql:host=127.0.0.1;dbname=gestionmembre", "root", "");
	} catch(Exception $e) {
		die($e->getMessage());
	}
	if(isset($_POST["nom"]) and isset($_POST["jour"]) and isset($_POST["mois"]) and isset($_POST["annee"]) and isset($_POST["email"]) and isset($_POST["mdp"])) {
		$nom = $_POST["nom"];
		$jour = $_POST["jour"];
		$mois = $_POST["mois"];
		$annee = $_POST["annee"];
		$email = $_POST["email"];
		$mdp = $_POST["mdp"];
		if(!empty($nom) and !empty($jour) and !empty($mois) and !empty($annee) and !empty($email) and !empty($mdp)) {
			$datenaissance = $annee."-".$mois."-".$jour;
			$requete = $base->prepare("insert into membre values(:idm, :nom, :datenaissance, :email, :motpasse)");
			$requete->execute(array(
				"idm" => "",
				"nom" => $nom,
				"datenaissance" => $datenaissance,
				"email" => $email,
				"motpasse" => $mdp
			));
			header("Location: login.php");
		}
	}
?>
	</body>
</html>