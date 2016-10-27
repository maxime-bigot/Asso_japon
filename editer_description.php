<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

	if(isset($_SESSION['id']) AND !empty($_SESSION['id'])){

		if(isset($_GET['post']) AND !empty($_GET['post'])) {

			$id_note = intval($_GET['post']);

			$requser = $bdd->prepare('SELECT ID_membre FROM note_membre WHERE id_note = ?');
			$requser->execute(array($id_note));
			$requser = $requser->fetch();

			$id_user = $requser['ID_membre'];

			if($_SESSION['id'] == $id_user) {

				$reqpost = $bdd->prepare('SELECT Description FROM note_membre WHERE id_note = ?');
				$reqpost->execute(array($id_note));
				$reqpost = $reqpost->fetch();

			} else {
				die('erreur');
			}

		} else {
			die('erreur');
		}

	} else {
		header("Location: connexion.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="POST" action="script_php/update_description.php">
		<label for="description">Description :</label></br>
		<textarea id="description" name="description" rows="8" cols="45"><?= $reqpost['Description'] ?></textarea></br>
		<input type="submit" value="Valider">
		<input type="hidden" name="id_note" value="<?= $id_note ?>">
	</form>
	

</body>
</html>