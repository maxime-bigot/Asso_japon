<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(!isset($_SESSION['id'])) {
	header("Location: connexion.php");
} else {

	if (isset($_POST['description'], $_POST['id_note']) AND !empty($_POST['description']) AND !empty($_POST['id_note'])) {
		
		$description = htmlspecialchars($_POST['description']);
		$id_note = intval($_POST['id_note']);

		$reqnote = $bdd->prepare('SELECT id_note FROM note_membre WHERE id_note = ?');
		$reqnote->execute(array($id_note));

		if($reqnote->rowCount() != 1) {
			die('erreur');
		}
		$upd_note = $bdd->prepare('UPDATE note_membre SET Description = ?, Date_note = NOW() WHERE id_note = ?');
		$upd_note->execute(array($description, $id_note));

		$reqanime = $bdd->prepare('SELECT ID_anime FROM note_membre WHERE id_note = ?');
		$reqanime->execute(array($id_note));
		$reqanime = $reqanime->fetch();


		header("Location: ../afficher_note.php?id=".$reqanime['ID_anime']);

	} else {
		die('erreur');
	}

} ?>	
