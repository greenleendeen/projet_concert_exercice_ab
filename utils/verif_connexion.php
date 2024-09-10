<?php
/*

Code à inclure dans les controleurs qui ont besoin de la connexion (juste après include de init.php)

*/


// Si on n'est pas connecté : rediriger / afficher le formulaire de connexion
if ( ! session_isconnected()) {
    
    include "templates/pages/formulaire_connexion.php";
    exit;
}
else {include  "templates/fragments/div_user_connected.php"; }


/*
else {
    $user = session_userconnected();
}*/