<?php
/*
    Controleur : prépare le formulaire pour la rédaction d'un  message 
    
    Parametres: $expediteur (GET user concted) et $destinataire  (récupère l'id artiste avec GET)  

*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

//verification si user connecté
require_once "utils/verif_connexion.php";

// récupération des paramertes et vérification

$user = new user;
//$concert->getTarget("artiste")->get("nom")
$expediteur = session_userconnected()->get("login");
//echo " l'expediteur est $expediteur <br>";

// récupérer l'id artiste dans le get pour préparer le 'destinataire'

// si l'utilisateur connecté (celui qui ecrit le message) est organisateur: 
    //faire l'opération pour destinataire artiste; 
            // recuperer et charger l'id de l'artiste, 
            //trouver le login qui correspond à son champ 'user' $artiste->getTarget("user")->get("login") ;
            // créer le destinataire

    //sinon: faire l'opération pour l'organisateur??? ça c'est plutot sur le controleur pour 'repondre au messsage':
    // puisque le 1ère message part de l'organisateur


// recupere le id du produit dans le GET 
if (isset($_GET["id"])) {
    $artistId = $_GET["id"];
} else {
    $artistId = 0;
}

// charger l'objet 
$artiste = new artiste();
$artiste->load($artistId);

//echo "L'ID artiste est: $artistId <br> <br>";

// récupérer le login de l'artiste  (destinataire)
$destinataire = $artiste->getTarget("user")->get("login");

//print_r("$destinataire");

//créér l'objet message pour l'enregistrer dans la bdd
$message = new message();

//$organisateur = new organisateur();

// affichage

include "templates/mails/form_message_envoi.php";
