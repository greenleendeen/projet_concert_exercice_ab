<?php
/*
    Controleur :  vérifie les champs, valide la création d’un compte,  enregistre user dans la bdd. Ensuite enregistre également nouveau  artiste OU organisateur dans la bdd
    
    Parametres: POST : nom, mail , motdepasse :  les valeurs des  champs completés
*/


// Initialisation : include du programme d'intialistion
require_once "utils/init.php";

//   *plus tard : if((isset($_POST['nom']) && !empty($_POST['nom'])) 
//                && //(isset ($_POST ['type'])&& !empty ($_POST['type'])) 

// verifie les champs pour le login et le mot de passe : si les données insérées dans les input ne sont pas 'vides'

if (
    (isset($_POST['login']) && !empty($_POST['login']))) {
        $login = $_POST['login'];
      //  echo $_POST['login'] ;
    }



/*
if (
    (isset($_POST['login']) && !empty($_POST['login'])) &&
    (isset($_POST['type']) && !empty($_POST['type'])) &&
    (isset($_POST['motdepasse']) && !empty($_POST['motdepasse'])) &&
    (isset($_POST['motdepasse2']) && !empty($_POST['motdepasse2']))
) {

    // si les champs sont completes et les variables existent, verifer si les 2 mots de passe sont identiques:

    //si pas identiques: affiche erreur
    if ($_POST['motdepasse'] != $_POST['motdepasse2']) {
        $erreur = 'les mots de passe sont differents <br>';
        echo $erreur;
        exit();
    } else {
        echo "mot de passe ok";

        // crée l'objet 'user' pour récupérer les données du post; verifier s'il existe (methode ferifExuisteUser dans 'user'); l'inserer dans la bdd si user n'esiste pas

        $user = new user();

        if ($user->loadFromTab($_POST)) {
            //   print_r ($user);

            // preparer les variables pour la fonction ferifExuisteUser 
            $login = $_POST["login"];
            $type = $_POST["type"];

            //On enregistre le mot de passe crypté
            $user->set("motdepasse", password_hash($_POST["motdepasse"], PASSWORD_DEFAULT));

            // si les valeurs sont acceptées: il faut vérifier dans la bdd si cet user avec ce type existe déjà si oui: message d'erreur; si non: insertion
            $user->verifExisteUser($login, $type);
            if ($user->is()) {
                //include "templates/pages/erreur_compte.php"; -> page à créer en html !!!
                echo "erreur, cet utilisateur existe déjà <br>";
                exit;
            } else { //inserer dans la bdd
                $user->insert();


                // } } 
                // include page formulaire de connexion avec le bon type
                //include "templates/pages/formulaire_connexion.php";}

                // avec le id user + l'information du POST je peux créer l'objet artiste ou l'objet organisateur:
                //if(isset($_POST['nom']) && !empty($_POST['nom'])) {


                // On vérifie que l'on a bien le nom de l'artiste ou de l'orgnaisateur
                if (isset($_POST['nom']) && !empty($_POST['nom'])) {

                    // si le type est 'art' crée un objet artiste; sinon => organisateur.
                    if ($_POST["type"] === "art") {
                        $artiste = new artiste;
                        if ($artiste->loadFromTab($_POST)) {
                            $artiste->set("user", $user->id());
                            //echo $user;
                            $artiste->insert();
                            print_r($artiste);
                        }
                    } else {
                        $organisateur = new organisateur;
                        $organisateur->loadFromTab($_POST);
                        $organisateur->set("user", $user->id());
                        $organisateur->insert();
                    }
                }

         }
    }
}
*/       // include page formulaire de connexion avec le bon type
                include "templates/pages/formulaire_connexion.php";
            
        