<?php
// Démonstration d'envoi de mails


// paramétrer l'afichage des erreurs
ini_set("display_errors", 1);       // Aficher les erreurs
error_reporting(E_ALL);             // Toutes les erreurs

// Préparer le destinataire
$to = '"Christophe Blanchot" <demo@mywebecom.ovh>';
//   $to = "demo@mywebecom.ovh";

// Sujet : attention : la gestion de UTF8 est galère
$sujet = "Vous avez un nouveau message";


// Gestion de l'expéditeur
// En-tete : from
$head = [];
$head["From"] =  "'Christophe Blanchot' <mywebecom@mywebecom.ovh>";
$head["Reply-to"] = "cblanchot@cbcd.fr";

// Ajputer les infos pour faire un email HTML
$head["MIME-version"] = "1.0";
$head["Content-Type"] = "text/html; charset=utf-8";

// Utilisation du template
ob_start();
include "templates/mails/message_recu.php";
$message = ob_get_clean();




 if (mail($to, $sujet, $message, $head)) {
    echo "Message envoyé";
 } else {
    echo "Echec envoi message";
 }


?>
