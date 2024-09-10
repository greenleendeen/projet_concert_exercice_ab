<?php
/*
    Controleur : vérifie les données dans les input, valide la transmission du message au destinataire, enregistre le message dans la bdd,  affiche la (même) page avec la confirmation d'envoi
    
    Parametres: $expediteur (GET user concted) et $destinataire  (récupère l'id artiste avec GET)   
            //POST: les valeurs inscrites dans les champs 

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// verification des champs

if (
    (isset($_POST['expediteur']) && !empty($_POST['expediteur'])) &&
    (isset($_POST['destinataire']) && !empty($_POST['destinataire']))  &&
    (isset($_POST['objet'])  && !empty($_POST['objet'])) &&
    (isset($_POST['contenu']) && !empty($_POST['contenu']))

) {
    $message = new message();
    if ($message->loadFromTab($_POST)) {
        print_r($message);
        /* $expediteur = $_POST['expediteur'];
    echo("$expediteur");
    $destinataire = $_POST['destinataire'];
    echo "$destinataire";

    $objet =$_POST['objet'];
    $contenu =$_POST['contenu'];*/
    }
}


$artiste = new artiste();
$concert = new concert();
  //  include "templates/pages/detail_concert.php";