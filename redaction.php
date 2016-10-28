<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(isset($_POST['anime_titre'], $_POST['anime_synopsis'], $_POST['annee_sortie'], $_POST['Auteur']))
{
	if(!empty($_POST['anime_titre']) AND !empty($_POST['anime_synopsis']) AND !empty($_POST['annee_sortie']) AND !empty($_POST['Auteur']))
	{

		$anime_titre = htmlspecialchars($_POST['anime_titre']);
		$anime_synopsis = htmlspecialchars($_POST['anime_synopsis']);
		$annee_sortie = intval($_POST['annee_sortie']);
		$auteur = htmlspecialchars($_POST['Auteur']);

		$recherche = $bdd->prepare('SELECT ID_anime FROM anime WHERE Titre_anime = ?');
		$recherche->execute(array($anime_titre));

		if($recherche->rowCount() !=0){
			$message = "Un anime portant ce nom existe déjà";
		} else {

			$ins = $bdd->prepare('INSERT INTO anime (Titre_anime, Synopsis, Annee_sortie, Auteur) VALUES (?,?,?,?)');
			$ins->execute(array($anime_titre, $anime_synopsis, $annee_sortie, $auteur));
			$lastid = $bdd->lastInsertId();

			if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])) {
				if(exif_imagetype($_FILES['miniature']['tmp_name'])) {

					$path = "miniatures/".$lastid.".jpg";
					move_uploaded_file($_FILES['miniature']['tmp_name'], $path);

				} else {
					$message = "Votre image doit etre au format jpg";
				}
			}

				$message = 'L\'anime a bien était ajouté.';
			}
				
	}
	else{
		$message = 'Veuillez remplir tous les champs';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajout anime</title>
	<meta charset="utf-8">
</head>
<body>

	<h2></h2>

	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="anime_titre" placeholder="Titre de l'anime" value="<?php if(!empty($_POST['anime_titre'])){ echo $_POST['anime_titre'];}?>"/> <br/>
		<input type="text" name="Auteur" placeholder="Auteur de l'anime" value="<?php if(!empty($_POST['Auteur'])){ echo $_POST['Auteur'];}?>"/> <br/>
		<input type="number" name="annee_sortie" placeholder="année de sortie" value="<?php if(!empty($_POST['annee_sortie'])){ echo $_POST['annee_sortie'];}?>"/><br />
		<textarea placeholder="Synopsis de l'anime" name="anime_synopsis" rows="8" cols="45"><?php if(!empty($_POST['anime_synopsis'])){ echo $_POST['anime_synopsis'];}?></textarea><br/>
		<labelfor="miniature">Miniature : </label><input type="file" id="miniature" name="miniature"></br>
		<input type="submit" value ="Envoyer l'anime" /><br/>
	</form>
	<br />
	<?php if(isset($message)){ echo $message;} ?></br></br>
	<a href="index.php">Retour vers l'accueil</a>

</body>
</html>