<?php
/*
    Controleur : prépare et affiche le détail d’un concert
    
    Parametres:  GET : id concert (get id) objet concert avec ses détails
*/

// Initialisation  
require_once "utils/init.php";
//verification si user connecté
require_once "utils/verif_connexion.php";


// récupération des paramètres / vérification

// récupére l'id du concert fourni, ou 0 si pas d'id si l'index "id" existe dans le tableau $_GET
if (isset($_GET["id"])){
    // récupere dans le tableau $_GET l'index "id" 
    $idConcert = $_GET["id"];
} else {
    //sinon la variable  idConcert =0;
   $idConcert = 0;
}
// vérifer si il le trouve:
//echo "l'id concert est $idConcert <br>";

// traitement sur la bdd

// je crée l'objet concert
$concert = new concert();
//charge avec le id prévu
$concert->load($idConcert);
//print_r( $concert);

$artistId = $concert ->get("artiste");
//echo "id de cet artiste est $artistId  <br>";
// je crée l'objet artiste
$artiste =new artiste();
$artiste->load($artistId);
//print_r($artistId);

// si le concert n'existe pas
if(! $concert->is()){
    //affiche message: 

    echo "ce concert n'existe pas dans la liste";
    
    } else {
    //sinon génère la page detail concert.
   
    include "templates/pages/detail_concert.php";
   

    }
/*
    if ( session_isconnected()) {
        $user = new user();
    }
        */