<?php
/*
    Controleur : affiche le formulaire de création d’un nouveau compte utilisateur
    
    Parametres: Néant
*/


// Initialisation : include du programme d'intialistion
require_once "utils/init.php";


$type = ($_POST["type"]);

//echo $type;
//include "templates/fragments/type_user_artiste.php";

// verification de la selection (art ou org ) : choix effectuée sur la page accuieli_all_users pour récupérer le 'type'




// affichage de la page de création d'un compte utilisteur form_crea_compte_user.php

include "templates/pages/form_crea_compte_user.php";
//include "templates/fragments/type_user_artiste.php";