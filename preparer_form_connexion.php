<?php
/*
    Controleur : prépare et affiche le formulaire de connexion
    
    Parametres: $type - le type d'utilisateur: art ou org
*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";




// préparation des parametres:

if (isset ($_POST ['type'])&& !empty ($_POST['type'])) {

    $type = ($_POST ["type"]);

echo $type;
       


}  





// affichage de la page de connection utilisteur formulaire_connexion.php

include "templates/pages/formulaire_connexion.php";