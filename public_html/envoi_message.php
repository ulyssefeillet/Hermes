<?php

$nom=$prenom=$username=$email=$contenu="";


if($_SERVER["REQUEST_METHOD"]=="POST") {

	$destinataire = "hermes.edition@gmail.com"; // adresse email du site
	$expediteur = $_POST['email']; // adresse email de l'expediteur
	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];

	$sujet = "Nouveau message sur le site de la maison d'édition Hermès";
	$sujet2 = "Accusé de réception de votre message sur le site de la maison d'édition Hermès";

	if (!empty($_POST['username'])){
		$add_username = " (nom d'utilisateur: " . $_POST['username'] . "),";
	} else {
		$add_username ="";
	}

	unset($_POST['submit']);

	$message = $nom . " " . $prenom . $add_username .  " vous a écrit:" . "\n\n" . $_POST['contenu'];
	$message2 = "Cher ". $prenom . ", voici l'accusé de réception de votre message. Merci d'avoir contacté la maison d'édition Hermès! " . "\n\n" . "Votre message: " . "\n\n" . $_POST['contenu'];

	$headers = "From:" . $expediteur;
	$headers2 = "From:" . $destinataire;
	mail($destinataire,$sujet,$message,$headers);
	mail($expediteur,$sujet2,$message2,$headers2); // envoie une copie du message à l'expéditeur
	// echo "Mail envoyé. Merci " . $first_name . ", on vous répondera très prochainement.";

	$nom=$prenom=$username=$email=$contenu=$add_username="";
	$destinataire=$expediteur=$sujet=$sujet2=$message=$message2=$headers=$headers2="";
	echo "<script type='text/javascript'>window.location.href = 'redirection.php';</script>";
	exit();


}






















?>
