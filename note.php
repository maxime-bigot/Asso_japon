<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(!isset($_SESSION['id'])) {
	header("Location: connexion.php");
} else {

	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		
		$id_anime = intval($_GET['id']);

		$reqanime = $bdd->prepare('SELECT Titre_anime FROM anime WHERE ID_anime = ?');
		$reqanime->execute(array($id_anime);

		if($reqanime->rowCount == 1) {
			$reqanime = $reqanime->fetch();
			$nom_anime = $reqanime['Titre_anime'];
		} else {
			die('erreur');
		}

	} else {
		die('erreur');
	}

} ?>	
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
</head>
<body>

	<h2>Noter l'anime <?= $nom_anime?></h2>
	
</body>
</html>
