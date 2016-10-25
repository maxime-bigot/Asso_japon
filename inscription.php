<?php

include("fonction_membres.php");

$bdd = new PDO("mysql:host=127.0.0.1;dbname=anime;charset=utf8", "root", "");

if(isset($_POST['inscription_form'])) {

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail_c = htmlspecialchars($_POST['mail_c']);
	$mdp = sha1($_POST['mdp']);
	$mdp_c = sha1($_POST['mdp_c']);

	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail_c']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp_c'])) {
		if(strlen($pseudo) <= 100){
			if($mail == $mail_c){
				if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
					if($mdp == $mdp_c){
						$message = inscription_membre($pseudo, $mail, $mdp);
						header("Location: validation.php");
					} else {
						$message = "Vos 2 mots de passes ne sont pas identiques.";
					}
				} else {
					$message = "Votre adresse mail n'est pas valide";
				}	
			} else {
				$message = "Vos 2 adresses mail ne sont pas identiques.";
			}
		} else {
			$message = "Votre pseudo ne doit pas dépasser 100 caractères.";
		}

	} else {
		$message = "Tous les champs n'ont pas était remplis!";
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
		<h2>Inscription</h2></br></br>

		<form method="POST" action="">
			<table>
				<tr>
					<td align="right">
						<label for="pseudo">Pseudo :</label>
					</td>
					<td>
						<input type="text" id="pseudo" placeholder="Votre pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="mail">Mail :</label>
					</td>
					<td>
						<input type="text" id="mail" placeholder="Votre mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>"> 
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="mail_c">Confirmation mail :</label>
					</td>
					<td>
						<input type="text" id="mail_c" placeholder="Confirmer votre mail" name="mail_c" value="<?php if(isset($mail_c)) { echo $mail_c; } ?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="mdp">Mot de passe :</label>
					</td>
					<td>
						<input type="password" id="mdp" placeholder="Mot de passe" name="mdp" >
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="mdp_c">Confirmation mdp :</label>
					</td>
					<td>
						<input type="password" id="mdp_c" placeholder="Confirmer votre mdp" name="mdp_c" >
					</td>
				</tr>
			</table></br>
			<input type="submit" name="inscription_form"value="Je m'inscris" />
		</form></br>
		<a href="index.php">Retour à l'accueil</a>
		<?php if(isset($message)){ echo $message; }?>
	</div>
</body>
</html>