<?php
/*

Template de page complète : affiche la liste des concerts proposes par des artistes
Paramètres :
 $listeConcerts: tableau d'objets 'concert' indexes par leur id (la liste des concerts)
    
*/

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste concerts</title>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="pageOrganisateur">
    <div class=" pseudoNav">
        <h1> Bienvenu sur notre site permettant de diffuser la musique vivante en dehors des structures traditionnelles.</h1>

        <!-- Fragment de l'en-tête affichant l'utilisateur connecté ou un bouton pour se connecter-->
        <?php if (session_isconnected()) {
            include "templates/fragments/div_user_connected.php";
        } else { ?>
            <a href="afficher_formulaire_connexion.php" class="button">Se connecter</a>
        <?php } ?>

        <div class="flex spaceAround pseudoNav  ">
            <a href="afficher_liste_concerts_all_user.php"><button class="bigButton"> voir le catalogue des concerts</button> </a>
            <a href="afficher_liste_concerts_all_user.php"><button class="bigButton">chercher un concert</button> </a>
            <a href="afficher_liste_concerts_all_user.php"><button class="bigButton">proposer un lieu</button> </a>
            <a href="afficher_liste_concerts_all_user.php"><button class="bigButton">revenir à l'accueil</button> </a>
            <a href="afficher_liste_concerts_all_user.php"><button class="bigButton">changer de compte</button> </a>
        </div>

    </div>

    <h1> Liste concerts </h1>

    <!-- ici un foreach-->
    <div class="flex spaceAround">
        <?php
        // pour chaque produit de la liste - afficher la div 
        foreach ($listeConcerts as $id => $concert) {
            // affiche la page liste_concerts

            include "templates/fragments/fragment_detail_concert.php";
        }
        ?>
    </div>

</body>
</html>