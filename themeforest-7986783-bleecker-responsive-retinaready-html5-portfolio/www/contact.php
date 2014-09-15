<?php



if(!$_POST) exit;



function tommus_email_validate($email) { return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email); }


$name = $_POST['name']; $email = $_POST['email']; $phone = $_POST['phone']; $comments = $_POST['comments'];



if(trim($name) == '') {

	exit('<div class="error_message">Vous devez entrer votre nom.</div>');

} else if(trim($name) == 'Nom *') {

	exit('<div class="error_message">Vous devez entrer votre nom.</div>');

} else if(trim($email) == '') {

	exit('<div class="error_message">Vous devez renseigner un email valide.</div>');

} else if(!tommus_email_validate($email)) {

	exit('<div class="error_message">Le mail renseigner n\'est pas valide</div>');

} else if(trim($comments) == 'Commentaire *') {

	exit('<div class="error_message">Merci d\'écrire un message.</div>');

} else if(trim($comments) == '') {

	exit('<div class="error_message">Merci d\'écrire un message.</div>');
	
} else if( strpos($comments, 'href') !== false ) {

	exit('<div class="error_message">Merci de ne pas taper de liens•</div>');
	
} else if( strpos($comments, '[url') !== false ) {

	exit('<div class="error_message">Merci de ne pas taper de liens•</div>');

} if(get_magic_quotes_gpc()) { $comments = stripslashes($comments); }



$address = 'chef.jordandelamotte@gmail.com';



$e_subject = 'Site || nouveau message de ' . $name . '.';

$e_body = "Vous avez un message de $name envoyé depuis le formulaire de contact, le message est le suivant." . "\r\n" . "\r\n";

$e_content = "\"$comments\"" . "\r\n" . "\r\n";

$e_reply = "Vous pouvez contacter $name par mail, via l'adresse $email (ou par téléphone au : $phone)";



$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );



$headers = "From: $email" . "\r\n";

$headers .= "Reply-To: $email" . "\r\n";

$headers .= "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type: text/plain; charset=utf-8" . "\r\n";

$headers .= "Content-Transfer-Encoding: quoted-printable" . "\r\n";

if(mail($address, $e_subject, $msg, $headers)) { echo "<fieldset><div id='success_page'><p>Merci $name, votre message a bien été envoyé.</p></div></fieldset>"; }
else echo "no";
