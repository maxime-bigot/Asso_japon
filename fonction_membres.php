<?php 

function inscription_membre($pseudo, $mail, $mdp) {

	global $bdd;

	$recherche = $bdd->prepare('SELECT id_membre FROM membres WHERE pseudo = ?');
	$recherche->execute(array($pseudo));
	if ($recherche->rowCount() > 0) {
		$retour = "Pseudo déjà utilisé";
	}
	else {
		$recherche = $bdd->prepare('SELECT id_membre FROM membres WHERE mail = ?');
		$recherche->execute(array($mail));
		if ($recherche->rowCount() > 0) {
			$retour = "Adresse mail déjà utilisé";
		}
		else {
			$inscription = $bdd->prepare('INSERT INTO membres (pseudo, mail, mot_de_passe) VALUES (?, ?, ?)');
			$inscription->execute(array($pseudo, $mail, $mdp));
			$retour = 1;
		}
	}

	return $retour;

}

?>