<?php
/*
    Controleur :  Affiche le formulaire de modification artiste –// l’objet 'artiste' existe déjà
    
    Parametres: GET : id artiste (get:id)
*/

/**
 * Initialisation
 */

require_once "utils/init.php";
//verification si user connecté
require_once "utils/verif_connexion.php";

/** récupération des parametres:  */
// Néant

/** triatement */

// appeller la fonction trouveArtisteII($user) de la classe "artiste" 
//avec le rôle de trouver dans la bdd l'artiste dont 'user'(id) correspond au session_idconnected()
//$artiste->getArtiste();

// créer l'objet user et artiste 
$artiste = new artiste();
// j'ai l'objet 'user' 
//pour récupérer l'objet artiste (= utilisateur connecté) je dois faire une requette dans la bdd
// récupérer l'id artiste quand le champ 'user' corresponds à l'id de l'utilisateur connecté
//$sql = "SELECT `id`, `nom`, `presentation`, `user` FROM `artiste` WHERE `user`=76";
// appeller la méthode trouveArtiste() pour charger l'obejt par son id sur la page 'accueil_artiste'

$artiste->trouveArtisteII();
// técupère le id de l'artiste
//echo "artiste id est: ".$artiste->id()." <br>" ;

// traitement sur la bdd ...... $artiste = new artiste;

//charge avec le id prévu
  //print_r ($artiste);
  
// si pas trouvé:  
  if (! $artiste->is()){
   // echo "pas chargé, n'existe pas";
  }


/**affichage */

include "templates/pages/detail_profil_artiste.php";



/*if(isset($_GET["id"])) {
    // récupération dans le tableau $_GET de l'index "id" 
    $artistId=$_GET["id"];
}else {
    $artistId=0;
}
echo "l'id ,cet id précise est  $artistId <br> <br>" ;
*/