<?php
session_start(); 

$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(isset($_POST['connexion_form'])){

	$id_connect = htmlspecialchars($_POST['identifiant']);
	$mdpconnect = sha1($_POST['mdpconnect']);

	if(!empty($id_connect) AND !empty($mdpconnect)){

		$membre = $bdd->prepare('SELECT * FROM membres WHERE mot_de_passe = ? AND pseudo = ? OR mail = ?');
		$membre->execute(array($mdpconnect, $id_connect, $id_connect));

		if($membre->rowCount() > 0){
			$userinfo = $membre->fetch();
			$_SESSION['id'] = $userinfo['id_membre'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: profil.php?id_mbr=".$_SESSION['id']);
		} else {
			$message = "Aucun compte trouvé pour ces identifiants.";
		}

	} else {
		$message = "Tous les champs doivent être remplis";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste anime</title>
	<meta charset="utf-8">
</head>
<body>

	<div align="center">
		<h2>Connexion</h2></br></br>

		<form method="POST">
			<input type="text" placeholder="Pseudo ou Mail" name="identifiant">
			<input type="password" placeholder="Mot de passe" name="mdpconnect">
			<input type="submit" name="connexion_form"value="Je me connecte" />
		</form></br></br>
		<a href="index.php">Retour à l'accueil</a>
		<?php if(isset($message)){ echo $message; }?>
	</div>
</body>
</html>