<?php
	session_start();
	$_SESSION["idp"] = $_GET["id"];
	if(!isset($_SESSION["nom"])) {
		header("Location: login.php");
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
	</head>
	<body>
		<p>Utilisateur actuellement connecté : <?php echo $_SESSION["nom"]; ?></p>
		<h1>Publications</h1>
<?php
	try {
		$base = new PDO("mysql:host=127.0.0.1;dbname=gestionmembre", "root", "");
	} catch(Exception $e) {
		die($e->getMessage());
	}
	$requete = $base->prepare("select * from publication natural join membre where idp = :idp");
	$requete->execute(array(
		"idp" => $_SESSION["idp"]
	));
	while($donnees = $requete->fetch()) {
?>
		<p>Par <?php echo $donnees["NOM"]; ?></p>
		<p><?php echo $donnees["CONTENU"]; ?> (le <?php echo $donnees["DATEPUBLICATION"]; ?>)</p>
		<h3>Réponses</h3>
<?php
	}
?>
<?php
	$requete = $base->prepare("select * from membre natural join repondre where idp = :idp");
	$requete->execute(array(
		"idp" => $_SESSION["idp"]
	));
	while($donnees = $requete->fetch()) {
?>
		<p><?php echo $donnees["REPONSE"]; ?> (par <?php echo $donnees["NOM"]; ?>)</p>
<?php
	}
?>
		<h3>Répondre</h3>
		<form action="publication.php?id=<?php echo $_SESSION["idp"]; ?>" method="post">
			Contenu : <textarea name="contenu"></textarea><br />
			<input type="submit" value="OK" />
		</form>
<?php
	if(isset($_POST["contenu"])) {
		$contenu = $_POST["contenu"];
		if(!empty($contenu)) {
			$requete = $base->prepare("insert into repondre values(:idr, :idm, :idp, :reponse)");
			$requete->execute(array(
				"idr" => '',
				"idm" => $_SESSION["idm"],
				"idp" => $_SESSION["idp"],
				"reponse" => $contenu
			));
			header("Location: publication.php?id=".$_GET['id']);
?>
		<p>Votre texte a été publié</p>
<?php
		} else {
?>
		<p>Publication échouée</p>
<?php
		}
	}
?>
		<form action="deconnexion.php" method="post">
			<input type="submit" value="Deconnecter" />
		</form>
	</body>
</html>