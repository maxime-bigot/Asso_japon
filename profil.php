<?php
session_start(); 

$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if (isset($_GET['id_mbr']) AND $_GET['id_mbr'] > 0) {

	$getid = intval($_GET['id_mbr']);

	$requser = $bdd->prepare('SELECT * FROM membres WHERE id_membre = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
</head>
<body>

	<div align="center">
		<h2>Profil de <?= $userinfo['pseudo'] ?></h2></br></br>
		<p>Pseudo = <?= $userinfo['pseudo'] ?></p></br>
		<p>Mail = <?= $userinfo['mail'] ?></p>
		<?php if(isset($_SESSION['id']) AND $userinfo['id_membre'] == $_SESSION['id']){ ?>
		<a href="#">Editer mon profil</a>
		<a href="script_php/deconnexion.php">Se déconnecter</a>
		<?php } ?></br>
		<a href="index.php">Accueil</a>

		
	</div>
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