<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(!isset($_SESSION['id'])) {
	header("Location: connexion.php");
} else {

	if (isset($_POST['id_anime'], $_POST['description'], $_POST['choix']) AND !empty($_POST['id_anime']) AND !empty($_POST['choix'])) {
		
		$id_anime = intval($_POST['id_anime']);
		$choix = intval($_POST['choix']);
		$description = htmlspecialchars($_POST['description']);

		$reqanime = $bdd->prepare('SELECT ID_anime FROM anime WHERE ID_anime = ?');
		$reqanime->execute(array($id_anime));

		if($reqanime->rowCount() != 1) {
			die('erreur');
		}
		$del_note = $bdd->prepare('DELETE FROM note_membre WHERE ID_anime = ? AND ID_membre = ?');
		$del_note->execute(array($id_anime, $_SESSION['id']));
		
		$ins_note = $bdd->prepare('INSERT INTO note_membre (ID_membre, ID_anime, note, Description) VALUES (?, ?, ?, ?)');
		$ins_note->execute(array($_SESSION['id'], $id_anime, $choix, $description));

		header("Location: ../anime.php?id=".$id_anime);

	} else {
		die('erreur');
	}

} ?>	
