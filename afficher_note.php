<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(isset($_GET['id']) AND !empty($_GET['id'])) {

	$id_anime = intval($_GET['id']);

	$req_note = $bdd->prepare('SELECT Note, Description, Date_note, membres.pseudo FROM note_membre INNER JOIN membres ON note_membre.ID_membre = membres.id_membre WHERE note_membre.ID_anime = ? AND Description NOT LIKE ""');
	$req_note->execute(array($id_anime));
	$nbr_note =  $req_note->rowCount();

	$getanime = $bdd->prepare('SELECT Titre_anime FROM anime WHERE ID_anime = ?');
	$getanime->execute(array($id_anime));
	$getanime = $getanime->fetch();

} else {
	die('erreur');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/afficher_note.css" />
</head>
<body>

	<h2><?= $getanime['Titre_anime'] ?></h2>

	<?php 

	while ($n = $req_note->fetch()) {?>
		<div class="message_note">
			<div class="info_posteur">
				<p><?= "<strong>".$n['pseudo']."</strong>" ?> le</br><?= $n['Date_note'] ?></p>
			</div>
			<div class="note">
				<div><?= $n['Note'] ?></div>
			</div>
			<div class="contenu_poste">
				<div><?= $n['Description'] ?></div>
			</div>
		</div></br></br>
	<?php } ?> 

	
	<a href="index.php">Retour a l'accueil</a>

</body>
</html>