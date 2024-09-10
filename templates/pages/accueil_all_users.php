<?php
/*
Template de page complète : affiche la page d'accueil à tous les utilisateurs (conncetés ou pas) - avec des droits limités si pas connecté

Paramètres: néant
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page accuiel </title>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="flex spaceAround">

    <div class = " pseudoNav">    
    <h1> Bienvenu sur notre site permettant de diffuser la musique vivante en dehors des structures traditionnelles.</h1>
         
         <a href="afficher_liste_concerts_all_user.php"><button class="bigButton">voir le catalogue des concerts</button> </a>
         
    </div>
    
    <!--ARTISTE-->
    <div class= "encadreArt">
        <h2> je suis un artiste </h2>
        
        <!-- <a href="preparer_form_connexion.php"><button>je me connecte</button> </a>  
        formulaire de CONNEXION artite-->
        <form method="post" action="preparer_form_connexion.php">
            <select hidden id="type" name="type">
                <option value="art" selected>artiste</option>
            </select>
            
            <input class = "bigButton" type="submit" name="submit" value="je me connecte ">
        </form>
        
        
        
        <!-- formulaire de CREATION compte ARTISTE-->
        
        <form method="post" action="afficher_form_crea_user.php">
            <select hidden id="type" name="type">
                <option value="art" selected>artiste</option>
            </select>
            
            <input class = "bigButton"type="submit" name="submit" value="créer un compte artiste  ">
        </form>
    </div>
    
    <!--ORGANISATEUR-->
    <div class = "encadreOrg">
        <h2> je suis un organisateur </h2>
        
        <!--  <a href="preparer_form_connexion.php"><button>je me connecte</button> </a>
        form CONNEXION organisateur-->
        <form method="post" action="preparer_form_connexion.php">
            <select hidden id="type" name="type">
                <option value="org" selected>organisateur</option>
            </select>
            
            <input class = "bigButton" type="submit" name="submit" value="je me connecte  ">
        </form>
        
        
        
        <!-- formulaire  CREATION compte ORGANISATEUR-->
        <form method="post" action="afficher_form_crea_user.php">
            <select hidden id="type" name="type">
                <option value="org" selected>organisateur</option>
            </select>
            
            <input class = "bigButton" type="submit" name="submit" value="créer un compte organisateur  ">
        </form>
    </div>
    
</body>

</html>