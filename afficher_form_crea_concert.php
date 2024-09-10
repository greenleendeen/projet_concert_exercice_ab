<?php
/*
    Controleur : affiche le formulaire pour un concert
    
    Parametres:GET : id artiste (get:id) ( le id de l’artiste qui propose le concert) (????)
*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// récupération des parametres: 

// l'id de l'artiste qui propose le concert


// appeller l'objet artiste: 
$artiste = new artiste;
$artiste->getArtisteId();

// traitement sur la bdd pour le concert

if(isset($_GET["id"])) {
    // récupération dans le tableau $_GET de l'index "id"
    $concertId=$_GET["id"];
}else {
    $concertId=0;
}
//echo "l'id concert est $concertId <br> <br>" ;

//créér l'objet concert
$concert = new concert();

// charger avec le id prévu:
$concert->load($concertId);



// include template form_crea_cocnert.php

include "templates/pages/form_crea_concert.php";
