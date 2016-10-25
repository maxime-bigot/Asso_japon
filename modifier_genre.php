<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(isset($_GET['id']) AND !empty($_GET['id'])){

	$id_anime = htmlspecialchars($_GET['id']);

	$nom_anime = $bdd->prepare('SELECT Titre_anime FROM anime WHERE ID_anime = ?');
	$nom_anime->execute(array($id_anime));
	$nom_anime = $nom_anime->fetch();

	$categories = $bdd->query('SELECT Nom_genre FROM genre ORDER BY Nom_genre');

} else {
	die('erreur');
}
if (sizeof($_POST) > 0){
	$genres = $bdd->query('SELECT Nom_genre FROM genre ORDER BY Nom_genre');
	$cat = array();
	while($g = $genres->fetch()){
		$nom_cat = $g['Nom_genre'];
		if(strpos($nom_cat, " ") !== false) {
			$nom_remplace = str_replace (" ", "_", $nom_cat);
			if(isset($_POST[$nom_remplace]) AND !empty($_POST[$nom_remplace])){
				array_push($cat, $nom_cat);		
			}
		} else {
			if(isset($_POST[$nom_cat]) AND !empty($_POST[$nom_cat])){
				array_push($cat, $nom_cat);		
			}
		}
		
	}
	echo"vous avez donc choisi les ".sizeof($cat)." catégories suivantes :</br>";
	foreach ($cat as $nom_cat) {
		echo "<strong>".$nom_cat."</strong></br>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/modifier_genre.css" />
</head>
<body>

	<p>Est-ce correct ?</p></br>
	<form method="POST" action="script_php/changement_genres.php">
		<input type="submit" class="test" value ="Oui"/>
		<a href="modifier_genre.php?id=<?= $id_anime?>" class="test">Non</a>
		<input type="hidden" name="id" value="<?= $id_anime?>"/></br>
		<?php for($i=0; $i<sizeof($cat); $i++){ ?>
		<input type="hidden" name="<?= $cat[$i]?>" value="<?= $cat[$i]?>"/></br>
		<?php } ?>
	</form>

	<?php } else{ ?>

	<h1>Vous êtes en train de modifier les genres de l'anime <?= $nom_anime['Titre_anime'] ?></h1></br>
	<h3>Choisissez les nouveaux genres :</h3>

	<form method="POST">
		<?php while($c = $categories->fetch()){ ?>
		<input type="checkbox" 
		<?php if(strpos($c['Nom_genre'], " ") !== false) {
			str_replace (" ", "_", $c['Nom_genre']);
			echo "name=\"".$c['Nom_genre']."\"";
		} else {
			echo "name=\"".$c['Nom_genre']."\"";
		}?>
		<?php $recherche = $bdd->prepare('SELECT anime_genre.ID_anime, anime_genre.ID_genre FROM anime_genre INNER JOIN genre ON anime_genre.ID_genre = genre.id_genre WHERE ID_anime = ? AND genre.Nom_genre = ?');
		$recherche->execute(array($id_anime, $c['Nom_genre']));
		if($recherche->rowCount() !=0){
			echo "checked=\"checked\"";
		}?>id="<?= $c['Nom_genre'] ?>"/><label for="<?= $c['Nom_genre'] ?>"><?= $c['Nom_genre'] ?></label></br>
		<?php } ?>
		<input type="submit" value ="Valider"/>
	</form>
	<?php } ?>
</body>
</html>