<?php
session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(isset($_GET['id']) AND !empty($_GET['id']))
{
	$id_anime = intval($_GET['id']);

	$anime = $bdd->prepare('SELECT * FROM anime WHERE ID_anime = ?');
	$anime->execute(array($id_anime));

	if($anime->rowCount() == 1) {
		$anime = $anime->fetch();
		$titre = $anime['Titre_anime'];
		$synopsis = $anime['Synopsis'];
		$annee = $anime['Annee_sortie'];
		$auteur = $anime['Auteur'];
	} else {
		die('Cet anime n\'existe pas');
	}

	$genres = $bdd->prepare('SELECT Nom_genre, genre.id_genre FROM genre INNER JOIN anime_genre ON genre.id_genre = anime_genre.ID_genre WHERE anime_genre.ID_anime = ? ORDER BY Nom_genre;');
	$genres->execute(array($id_anime));

	if($genres->rowCount() == 0) {
		$erreur_genre = "Aucunes catégories trouvé pour cet animé";
	}
}
else {
	die('Erreur');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
</head>
<body>

	<h1><?= $titre ?></h1>
	<h2><?= $annee ?></h2>
	<h2><?= $auteur ?></h2></br>
	<a href="ajouter_note?id="></a>

	<?php 
	$notes = $bdd->prepare('SELECT * FROM note_membre WHERE ID_anime = ?');
	$notes->execute(array($id_anime));

	if($notes->rowCount() > 0) {
		$nombre_notes = $notes->rowCount();
		$notes_total = 0;

		while($n = $notes->fetch()){ 
			$notes_total += $n['note'];
		}
		
		$note_final = $notes_total/$nombre_notes;
		$note_final = round($note_final, 2);
		echo $note_final."/<strong>10</strong> (<a href=\"afficher_note.php?id=".$id_anime."\">".$nombre_notes." notes</a>)";
		echo " <a href=\"note.php?id=".$id_anime."\">Noter cet anime</a></br></br>";
	} else {
		echo "Aucune note pour cet anime";
		echo " <a href=\"note.php?id=".$id_anime."\">Noter cet anime</a></br></br>";
	}
	

	if(isset($erreur_genre)) {
		echo $erreur_genre;?> <a href="modifier_genre.php?id=<?= $id_anime?>">Ajouter des catégories</a> <?php
	}
	else { ?>
	
	<ul>
		<?php while($g = $genres->fetch()){ ?>
		<li><a href="genre.php?id_cat=<?= $g['id_genre']?>"><?= $g['Nom_genre'] ?></a></li>
		<?php } ?>
	</ul>
	<a href="modifier_genre.php?id=<?= $id_anime?>">Modifier les catégories</a>

	<?php } ?>

	<p><?= $synopsis?></p></br></br>
	<a href="index.php">Retour vers l'accueil</a>

</body>
</html>