<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

$videosParPage = 5;
$videoTotal = $bdd->query('SELECT ID_anime FROM anime');
$videoTotal = $videoTotal->rowCount();
$pagesTotales = ceil($videoTotal/$videosParPage);

if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
	$page = intval($_GET['page']);
} else {
	$page = 1;
}

$depart = ($page-1)*$videosParPage;

$animes = $bdd->query('SELECT * FROM anime ORDER BY Titre_anime LIMIT '.$depart.','.$videosParPage);

if(isset($_GET['q']) AND !empty($_GET['q'])){
	$q = htmlspecialchars($_GET['q']);

	$animes = $bdd->query('SELECT * FROM anime WHERE Titre_anime LIKE "%'.$q.'%" ORDER BY Titre_anime LIMIT '.$depart.','.$videosParPage);
}

$categories = $bdd->query('SELECT COUNT(anime_genre.ID_genre), genre.Nom_genre, genre.id_genre FROM anime_genre INNER JOIN genre ON anime_genre.ID_genre = genre.id_genre GROUP BY genre.Nom_genre, genre.id_genre');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
</head>
<body>

	
	<?php if(isset($_SESSION['id'])){
		echo "<h1>".$_SESSION['pseudo']."</h1>";
		echo "<h2><a href=\"profil.php?id_mbr=".$_SESSION['id']."\">Mon Profil</a></h2>";
	} else { ?>
	<h2><a href="inscription.php">Inscription</a></h2>
	<h2><a href="connexion.php">Connexion</a></h2>
	<?php } ?>

	<form action="script_php/recherche_profil.php" method="POST">
		<label for="profil">Chercher un profil :</label>
		<input type="text" name="profil" id="profil" placeholder="Votre recherche">
		<input type="submit" value="Valider">
	</form>

	</br><h2>Anime</h2></br></br>

	<form method="GET">
		<input type="search" name="q" placeholder="Votre recherche" />
		<input type="submit" value="valider" />
	</form>

	<ul>
		<?php while($a = $animes->fetch()){ ?>
		<div class="anime" style="display: flex; align-items: center; margin: 15px;">
			<img src="miniatures/<?= $a['ID_anime'] ?>.jpg" width="100" height="100" style="margin-right: 30px;">
			<li><a href="anime.php?id=<?= $a['ID_anime']?>"><?= $a['Titre_anime'] ?></a></li>
		</div>
		<?php } ?>
	</ul></br></br><p>Page : </p>
	<?php
	for ($i=1; $i <= $pagesTotales; $i++) { 
		if($i != $page) {
			if(isset($q)) {
				echo "<a href=\"index.php?q=".$q."&page=".$i."\">".$i."</a> ";
			} else {
				echo "<a href=\"index.php?page=".$i."\">".$i."</a> ";
			}
		} else {
			echo $i." ";
		}
		
	}
	?></br></br>
	<a href="redaction.php">Ajouter un anime</a></br></br>

	<h2>Catégories</h2></br></br>

	<ul>
		<?php while($c = $categories->fetch()){ ?>
		<li><a href="genre.php?id_cat=<?= $c['id_genre']?>"><?= $c['Nom_genre'] ?></a>[<?= $c['COUNT(anime_genre.ID_genre)'] ?>]</li>
		<?php } ?>
	</ul></br></br>

</body>
</html>