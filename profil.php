<?php
session_start(); 

$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if (isset($_GET['id_mbr']) AND $_GET['id_mbr'] > 0) {

	$getid = intval($_GET['id_mbr']);

	$requser = $bdd->prepare('SELECT * FROM membres WHERE id_membre = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();

	$reqnote = $bdd->prepare('SELECT id_note, ID_membre, note_membre.ID_anime, note, Description, Date_note, anime.Titre_anime FROM note_membre INNER JOIN anime ON note_membre.ID_anime = anime.ID_anime WHERE note_membre.ID_membre = ? ORDER BY Date_note DESC');
	$reqnote->execute(array($getid));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/afficher_note.css" />
</head>
<body align="center">

	<h2>Profil de <?= $userinfo['pseudo'] ?></h2></br></br>
	<p>Pseudo = <?= $userinfo['pseudo'] ?></p></br>
	<p>Mail = <?= $userinfo['mail'] ?></p>
	<?php if(isset($_SESSION['id']) AND $userinfo['id_membre'] == $_SESSION['id']){ ?>
	<a href="#">Editer mon profil</a>
	<a href="script_php/deconnexion.php">Se déconnecter</a>
	<?php } ?></br>
	<a href="index.php">Accueil</a></br></br></br>

	<?php if(isset($_SESSION['id']) AND $userinfo['id_membre'] == $_SESSION['id']){
		echo "Vos notes :</br></br>";
	} else {
		echo "les notes de ".$userinfo['pseudo']."</br></br>";
	}
	while ($n = $reqnote->fetch()) {?>
		<h3><a href="anime.php?id=<?= $n['ID_anime'] ?>"><?= $n['Titre_anime'] ?> :</a></h3></br>
		<div class="message_note">
			<div class="info_posteur">
				<p><?= "<strong>".$userinfo['pseudo']."</strong>" ?> le</br><?= $n['Date_note'] ?></p>
			</div>
			<div class="note">
				<div><?= $n['note'] ?></div>
			</div>
			<div class="contenu_poste">
				<div><?= $n['Description'] ?></div>
				<?php if(isset($_SESSION['id']) AND $n ['ID_membre'] == $_SESSION['id']) { echo "<a href=\"editer_description.php?post=".$n['id_note']."\">Editer votre description</a>"; } ?>
			</div>
			
		</div></br></br>
	<?php } ?> 


	
</body>
</html>

<?php }
elseif(isset($_GET['id_mbr']) AND $_GET['id_mbr'] == 0) { ?>

<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
</head>
<body>

	<div align="center">
		<h3>Aucun profil ne correspond à votre recherche</h3>
	</div>
</body>
</html>

<?php } else {
	die("erreur");
}?>