<?php

// template de fragment: affiche le choix du type : 'artiste' qui a été 'séléctionné' sur la page accueil_all_users
// Parametres: néant
// 

?>

<h2> Vous souhaitez créer un compte en tant qu'artiste</h2>

<form hidden method="post" action="afficher_form_crea_user.php">
    <select hidden id="monselect" name= "type"> 
        <option  value="art"selected >artiste</option>
    </select>

