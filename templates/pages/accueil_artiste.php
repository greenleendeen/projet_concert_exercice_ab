<?php
/*

Template de page complète : affiche la page d’accueil d’un utilisateur-artiste

Paramètres : 
    $artiste : objet artiste chargé avec ses détails
    
*/

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="pageArtiste">
    <div class=" pseudoNav">
        <h1> Bienvenu sur notre site permettant de diffuser la musique vivante en dehors des structures traditionnelles.</h1>

        <a href="afficher_liste_concerts_all_user.php"><button class="bigButton">voir le catalogue des concerts</button> </a>

    </div>

    <h1> page accueil ARTISTE</h1>

    <?php 
    include "templates/fragments/div_user_connected.php";
    ?>

    <?php
    include "templates/fragments/fragment_detail_artiste.php";

    ?>


</body>

</html>