<?php

$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(isset($_POST['profil']) AND !empty($_POST['profil']))
{
	$nom_profil = htmlspecialchars($_POST['profil']);

	$profil = $bdd->prepare('SELECT id_membre FROM membres WHERE pseudo = ?');
	$profil->execute(array($nom_profil));

	if($profil->rowCount() == 1) {
		$profil = $profil->fetch();
		$id = $profil['id_membre'];
		header("Location: ../profil.php?id_mbr=".$id);
	} else {
		header("Location: ../profil.php?id_mbr=0");
	}
}
?>