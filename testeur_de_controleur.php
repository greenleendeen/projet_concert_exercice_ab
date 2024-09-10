<?php

// programme pour tester un controleur


// initialise
include "utils/init.php";

//prepare
            //$_GET =[3] ; // on force les parametres GET qu'on veut tester
            // $_POST = []; // on force les parametres POST qu'on veut tester

            // $_REQUEST = array_merge($_GET, $_POST); // si on teste sur les request, on fait un tableau

            // include "controleur_a_tester.php"; 

// appelle

    $artiste = new artiste();

  //$artistId= $artiste -> get($id);
  //print_r( $artistId);

$user= new user(41);
$user->trouveArtiste();
//print_r( $artiste);


