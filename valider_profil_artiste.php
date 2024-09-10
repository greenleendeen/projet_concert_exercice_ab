<?php
/*
    Controleur :  Vérifie, valide et met à jour dans la bdd le profil artiste
    
    Parametres: GET : id artiste (get:id)
POST : nom-artiste , présentation : les valeurs des champs du formulaire
*/

// Initialisation : 
require_once "utils/init.php";
//verification si user connecté
require_once "utils/verif_connexion.php";

/** récupération des parametres:  */
$user = new user();
$artiste = new artiste();

$artiste->trouveArtisteII($user);

// récupère le id de l'artiste
$artistId = $artiste->id();
//echo "artist id est $artistId ";

// traitement sur la bdd 
//charge avec le id prévu
$artiste->load($artistId);
//print_r($artiste);

//si les nouvelles valeurs sont acceptées : update la bdd
if ($artiste->loadFromTab($_POST)) {
   // print_r($artiste);
    $artiste->update();
   // print_r($artiste);
   // echo "double coucou";

    include "templates/pages/accueil_artiste.php";
    exit;
} else {
    // si les valeurs ont été refusées, on réaffiche le formulaire
    //include "templates/pages/form_......php";
    echo "erreur";
    exit;
}

