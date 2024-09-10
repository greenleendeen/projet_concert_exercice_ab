<?php

// Code d'initialisation à inclure en début de contrôleur


// paramétrer l'afichage des erreurs
ini_set("display_errors", 1);       // Aficher les erreurs
error_reporting(E_ALL);             // Toutes les erreurs

// ouvrir la base de données dans la variable globale $bdd
global $bdd;
$bdd = new PDO("mysql:host=localhost;dbname=projets_concert_abache;charset=UTF8", "abache", "NCtYm5c+A");
// Pour debugger, on peut ajouter une propriété
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


// Charger les librairies diverses
include_once "utils/model.php";
include_once "utils/utilitaires.php";

// Charger les objets du modèle de données
include_once "modeles/artiste.php";
include_once "modeles/concert.php";
include_once "modeles/lieu.php";
include_once "modeles/organisateur.php";
include_once "modeles/user.php";
include_once "modeles/message.php";

// On a besoin des fonctions des session
include_once "utils/session.php";
// Activer le mécanisme de session
session_activation();
