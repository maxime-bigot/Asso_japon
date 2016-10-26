<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(!isset($_SESSION['id'])) {
	header("Location: connexion.php");
} else {

	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		
		$id_anime = intval($_GET['id']);

		$reqanime = $bdd->prepare('SELECT Titre_anime FROM anime WHERE ID_anime = ?');
		$reqanime->execute(array($id_anime));

		if($reqanime->rowCount() == 1) {
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
<body align="center">

	<h2>Noter l'anime <?= $nom_anime?></h2></br></br>

	<form method="POST" action="script_php/ajouter_note.php">
		<label for="note">Votre note : </label>
		<select name="choix" id="note">
		    <option value="1">1</option>
		    <option value="2">2</option>
		    <option value="3">3</option>
		    <option value="4">4</option>
		    <option value="5">5</option>
		    <option value="6">6</option>
		    <option value="7">7</option>
		    <option value="8">8</option>
		    <option value="9">9</option>
		    <option value="10">10</option>
		</select></br>
		<label for="description">Description :</label></br><textarea id="description" name="description" placeholder="Optionnel... Si vous voulez détailler votre note c'est le bon endroit :)" rows="8" cols="45"></textarea></br>
		<input type="submit" value="Envoyer!">
		<input type="hidden" name="id_anime" value="<?= $id_anime?>">
	</form>
	
</body>
</html>
