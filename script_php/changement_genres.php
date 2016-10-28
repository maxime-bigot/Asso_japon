<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(isset($_POST['id']) AND !empty($_POST['id'])) {
	$id_anime = intval($_POST['id']);
	$delete = $bdd->prepare('DELETE FROM anime_genre WHERE ID_anime = ?');
	$delete->execute(array($id_anime));
}
else{
	die("erreur");
}

foreach($_POST as $key => $val) { 
	$nom = $val;
	$id = $key;

	if(strpos($id, "_") !== false) {
		$id = str_replace ("_", " ", $id);
	}

	if($id == $nom){
		$recherche = $bdd->prepare('SELECT id_genre FROM genre WHERE Nom_genre = ?');
		$recherche->execute(array($nom));
		$recherche = $recherche->fetch();
		$id_genre = $recherche['id_genre'];

		$insert = $bdd->prepare('INSERT INTO anime_genre (ID_anime, ID_genre) VALUES (?,?);');
		$insert->execute(array($id_anime, $id_genre));
	}

	
}

header("location:../anime.php?id=".$id_anime);

?>