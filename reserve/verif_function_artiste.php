<?php

// verification methode

//exemple
/*
$user = new user();

if ($user ->loadFromTab ($_POST)) {
 //   print_r ($user);
// preparer les variables pour la fonction ferifExuisteUser 
   $login=$_POST["login"];
   $type= $_POST["type"];
 
// si les valeurs sont acceptées: il faut vérifier dans la bdd si cet user avec ce type existe déjà si oui: message d'erreur; si non: insertion
$user -> verifExisteUser($login,$type );
if ($user->is()) {
    //include "templates/pages/erreur_compte.php"; -> page à créer en html !!!
    echo "erreur, cet utilisateur existe déjà <br>";  
    exit;
    
} else  { //inserer dans la bdd
            $user -> insert();

           $user= $user->id();

    }
}
*/
function creArtiste($nom){
    
   // $user-> getUserId($user);
    $nom = $_POST ["nom"];
    if(isset($_POST['nom']) && !empty($_POST['nom'])) {
$artiste= new artiste();
//$nom= $_POST =["nom"];
//if ($nom ->loadFromTab ($_POST)) {
    //   print_r ($artiste);

    
    $artiste -> insert();
  //  print_r ($artiste);

    }
}


