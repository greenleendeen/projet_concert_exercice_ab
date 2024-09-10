<?php
/*
    Controleur :  affiche la liste de tous les concerts proposes sur le site
    
    Parametres: néant
*/


// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

//verification si user connecté
require_once "utils/verif_connexion.php";

$user  = new user();
 // si type= artiste affiche page artiste; sinon affiche page organisateur
 $typeUser = $user->get("type");
 //  echo $typeUser;
if ($typeUser === "org") { 
    $organisateur = new organisateur();

} 

    // ***préparation de la page artiste!!!!!!

$artiste = new artiste();

// récupération / analyse des paramètres : néant

//création objet concert pour lui demander la liste
$concert= new concert();

// la liste

$listeConcerts = $concert -> listAll();

// affichage template liste_concerts       
include "templates/pages/liste_concerts.php";   




