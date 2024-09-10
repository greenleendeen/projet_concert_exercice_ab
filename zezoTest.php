<?php
// tests

// initialisation
include "utils/init.php";
//verification si user connecté
//require_once "utils/verif_connexion.php";

$user = new user();

$artiste =  new artiste();

$art = $artiste-> trouveArtisteII($user);

//$artiste ->getArtiste();