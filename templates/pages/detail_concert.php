<?php
/*
Template de page complète : affiche le détail d’un concert

Paramètres:  $concert : objet concert chargé avec ses détails
*/

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail concert</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body class="pageAllUsers">
    <div class=" pseudoNav">
        <h1> Bienvenu sur notre site permettant de diffuser la musique vivante en dehors des structures traditionnelles.</h1>

        <a href="afficher_liste_concerts_all_user.php"><button class="bigButton">revenir à la liste des concerts</button> </a>

    </div>

    <div class="flex">
        <?php
        include "templates/fragments/fragment_detail_concert.php";
        ?>
        <div class=" detail flex spaceBetween">
            <p> <strong> description du concert:</strong> <?= (htmlentities($concert->get("description"))) ?></p>

        </div>
        <div>
            <?php
            //pour chaque concert, afficher les détails de l'artiste qui le propose
           
               include "templates/fragments/fragment_detail_artiste_plus.php";

        

            ?>
        </div>
    </div>


</body>

</html>