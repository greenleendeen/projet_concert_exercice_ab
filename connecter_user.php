<?php
/*
    Controleur :  vérifie et valide les champs de l’identification,  connecte l’utilisateur ou ré-affiche le formulaire, affiche la page d’accueil respective (a/o)
    
    Parametres: POST: mail , motdepasse :  les valeurs inscrites dans les  champs
*/

// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

// verification des données insérées dans le input : si les valeurs ne sont pas nulles
if (isset($_POST['login']) && isset($_POST['motdepasse'])) {

    // vérifie si les données login et mot de passe sont corrècts.  j'appelle la fonction verifier_connexion() dans user.php

    // création de l'objet user pour recupérer les données 
    $user = new user();

    // met dans $reponse ce qui a été posté dans le input du formulaire
    $reponse = $user->verifier_connexion($_POST['login'], $_POST['motdepasse']);

    // si l'idenetnification est corecte, commence la session et affiche la page d'accueil
    if ($reponse === true) {
        session_connect($user->id());
    }
    //echo "coucou <br><br>";
    // si type= artiste affiche page artiste; sinon affiche page organisateur
    $typeUser = $user->get("type");
    //  echo $typeUser;

    if ($typeUser === "art") {

        // ***préparation de la page artiste!!!!!!

        $artiste = new artiste;
        // j'ai l'objet 'user' 
        //pour récupérer l'objet artiste (= utilisateur connecté) je dois faire une requette dans la bdd
        // récupérer l'id artiste quand le champ 'user' corresponds à l'id de l'utilisateur connecté
        //$sql = "SELECT `id`, `nom`, `presentation`, `user` FROM `artiste` WHERE `user`=76";
        // appeller la méthode trouveArtiste() pour charger l'obejt par son id sur la page 'accueil_artiste'

        $artiste->trouveArtisteII();
        // récupère le id de l'artiste
        $artistId = $artiste->id();
        //echo "artiste id est  $artistId ";

        // traitement sur la bdd ...... $artiste = new artiste;
        //charge avec le id prévu
        $artiste->load($artistId);
        //print_r($artiste);
       
        include "templates/pages/accueil_artiste.php";
    } else {
        // ***préparation de la page organisateur!!!!!!
        $organisateur = new organisateur;

        $organisateur->trouveOrganisateur($user);
        // récupère le id de l'organisateur
        $orgId = $organisateur->id();
        //echo "orgId $orgId ";
        //charge avec le id prévu
        $organisateur->load($orgId);
        //print_r($organisateur);

        include "templates/pages/accueil_organisateur.php";
        exit;
    }

} else {
    // si idenetnification incorrecte: message d'erreur
    include "templates/pages/formulaire_connexion.php";
    echo 'vous devez vous connecter';
    exit;
}
