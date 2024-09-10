<?php

// template de fragment: affiche la page de connexion pour un artiste : le type 'artiste' a été 'séléctionné' sur la page accueil_all_users
// Parametres: néant
// 

?>

<h2> Vous vous connectez en tant qu'artiste</h2>

<form hidden method="post" action="preparer_form_connexion.php">
    <select hidden id="monselect" name="type">
        <option value="art" selected>artiste</option>
    </select>