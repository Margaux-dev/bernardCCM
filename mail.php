<?php

// Vérification de remplissage des champs du formulaire
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
}
  

// Définition des variables (en UTF-8 par défault)
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
   

// Création du mail et envoi du message
$to = 'bernard.ccm@orange.fr'; // Où envoyer le message
$email_subject = "Nouveau message de:  $name"; // Objet du message
$email_body = "Vous avez reçu un nouveau message depuis le formulaire de contact du site.\n\n"."Details:\n\nNom: $name\n\nEmail: $email_address\n\nTéléphone: $phone\n\nMessage:\n$message"; // Corps du message
$headers = "From: bernard.ccm@orange.fr\n"; 

$headers .= 'From:Bernard CCM <'."bernard.ccm@orange.fr".'>' . 
"\r\n" . 
'Reply-To:'.$email_address. "\r\n" . 
"Content-Type: text/plain; charset=\"utf-8\"\r\n" .'X-Mailer:PHP/'.phpversion(); // Permet de convertir les caractères spéciaux afin de les rendre visibles

mail ($to,$email_subject,$email_body,$headers); // Composition du mail
return true;			
?>