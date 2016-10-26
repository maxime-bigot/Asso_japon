<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(!isset($_SESSION['id'])) {
	header("Location: connexion.php");
} else {

	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		
		$id_anime = intval($_GET['id']);

		$del_note = $bdd->prepare('DELETE FROM note_membre WHERE ID_membre = ? AND ID_anime = ?')
		$del_note->execute(array($_SESSION['id']), $id_anime);

	} else {
		die('erreur');
	}

} ?>	
