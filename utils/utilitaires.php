<?php
// Fonctions diverses


 
function get($nomId, $obj) ////////////à écrire comme il faut!!!!!
{//$nom $def
    // Rôles : récupère le paramètre de nom indiqué dans  envoyé en GET , ou retourne 0
    //parametres: $nomId= le id de lobjet recherché ($artistId par exmple)
    //            $obj = la classe de la recherche  ($artiste)
    //            pour l'execution, la fonction se sert dans GET
    //retour: true / false

    // Récupère le id  */
    //echo"début test";
    if (isset($_GET["id"])) {
        // recupete le id de l'objet' dans le GET 
        $nomId = $_GET["id"];
    } else {
        $nomId = 0;
    }
  

    // charger l'objet correspondant 
    /*get_class($this->$obj);
    $obj -> $this-> get_class;
    return $obj->load($nomId);*/
}
