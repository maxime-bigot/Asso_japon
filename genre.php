<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

$id_genre = intval($_GET['id_cat']);

$nom = $bdd->prepare('SELECT Nom_genre FROM genre WHERE ID_genre = ?');
$nom-> execute(array($id_genre));
$nom = $nom->fetch();
$cat = $nom['Nom_genre'];

$genres = $bdd->prepare('SELECT * FROM anime INNER JOIN anime_genre ON anime.ID_anime = anime_genre.ID_anime WHERE anime_genre.ID_genre = ? ORDER BY Titre_anime');
$genres->execute(array($id_genre));

if(isset($_GET['q']) AND !empty($_GET['q'])){
	$q = htmlspecialchars($_GET['q']);

	$genres = $bdd->prepare('SELECT * FROM anime INNER JOIN anime_genre ON anime.ID_anime = anime_genre.ID_anime WHERE anime_genre.ID_genre = ? AND Titre_anime LIKE "%'.$q.'%" ORDER BY Titre_anime');
	$genres->execute(array($id_genre));
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
</head>
<body>

	<h1><?= $cat ?></h1>

	<form method="GET">
		<input type="search" name="q" placeholder="Votre recherche" />
		<input type="hidden" name="id_cat" value="<?= $id_genre?>" />
		<input type="submit" value="valider" /><?php if(isset($_GET['q']) AND !empty($_GET['q'])){ ?><a href="genre.php?id_cat=<?= $id_genre?>">annuler la recherche</a><?php } ?>
	</form>

	<ul>
		<?php while($a = $genres->fetch()){ ?>
		<li><a href="anime.php?id=<?= $a['ID_anime']?>"><?= $a['Titre_anime'] ?></a></li>
		<?php } ?>
	</ul></br></br>
	<a href="index.php">Retour a l'accueil</a></br></br>
	

</body>
</html>