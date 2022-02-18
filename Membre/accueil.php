<?php
	session_start();
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
	$requete = $base->query("select * from publication natural join membre");
	while($donnees = $requete->fetch()) {
?>
		<h3>Par <a href="publication.php?id=<?php echo $donnees["IDP"]; ?>"><?php echo $donnees["NOM"]; ?></a></h3>
		<p><?php echo $donnees["CONTENU"]; ?> (le <?php echo $donnees["DATEPUBLICATION"]; ?>)</p>
<?php
	}
?>
		<h1>Publier quelque chose</h1>
		<form action="" method="post">
			Contenu : <textarea name="contenu"></textarea><br />
			<input type="submit" value="OK" />
		</form>
<?php
	if(isset($_POST["contenu"])) {
		$contenu = $_POST["contenu"];
		if(!empty($contenu)) {
			$requete = $base->prepare("insert into publication values(:idp, :idm, :contenu, sysdate())");
			$requete->execute(array(
				"idp" => '',
				"idm" => $_SESSION["idm"],
				"contenu" => $contenu
			));
			header("Location: accueil.php?");
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