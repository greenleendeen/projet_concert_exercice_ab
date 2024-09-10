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
      //  echo "mot de passe ok";
    }

    // crée l'objet 'user' pour récupérer les données du post; verifier s'il existe (methode ferifExuisteUser dans 'user'); l'inserer dans la bdd si user n'esiste pas

    $user = new user();

    if ($user->loadFromTab($_POST)) {
        //   print_r ($user);
        // preparer les variables pour la fonction ferifExuisteUser 
        $login = $_POST["login"];
        $type = $_POST["type"];

        // si les valeurs sont acceptées: il faut vérifier dans la bdd si cet user avec ce type existe déjà si oui: message d'erreur; si non: insertion
        $user->verifExisteUser($login, $type);
        if ($user->is()) {
            //include "templates/pages/erreur_compte.php"; -> page à créer en html !!!
          //  echo "erreur, cet utilisateur existe déjà <br>";
            exit;
        } else { //inserer dans la bdd
            $user->insert();

            $user = $user->id();
           // echo $user . " <br> <br>";


            // avec l'information du POST je peux créer l'objet artiste ou l'objet organisateur:
            //if(isset($_POST['nom']) && !empty($_POST['nom'])) {


            // On vérifie que l'on a bien le nom de l'artiste ou de l'orgnaisateur
            if (isset($_POST['nom']) && !empty($_POST['nom'])) {

           ///     echo $user;
                // si le type est art crée un objet artiste; sinon => organisateur.
                if ($_POST["type"] === "art") {
              //      echo $user;
                    $artiste = new artiste;
                    if ($artiste->loadFromTab($_POST)) {
                        $artiste->set("user", $user->id());
                    //    echo $user;
                        $artiste->insert();
                      //  print_r($artiste);
                    }
                } else {
                    $organisateur = new organisateur;
                    $organisateur->insertNewOrganisateur($nom, $user);
                }
            }

            // include page formulaire de connexion avec le bon type
            include "templates/pages/formulaire_connexion.php";
        }
    }



    // il faut récupérer le nom, le type et le id attribué à 'user' à sa création dans la bdd ;



}
/*         
                    
                    
                  
                    //inserer dans la bdd
                    
                else  {

                    $user -> insert();
                        // include page connexion!!!!
                        include "templates/pages/accueil_artiste.php";
                }
                
            }                    
        

            // ***pour créer les objets artiste et organisateur dans  la bdd: 

            // vérifier si les champs nom et type ne son pas vides 
           if (isset ($_POST ['type'])&& !empty ($_POST['type']) && 
            (isset($_POST['nom']) && !empty($_POST['nom'])))
        
            
            {  

            // il faut également récupérer le id user qui lui correspond...
                $user = new user;
                $user-> returnId($user);

            }    */

/*
                // récupérer la valeur du champ type pour créer l'objet A ou O; 
                $type = ($_POST ["type"]);

                $artiste = new artiste;
                
// si la valeur du champ est 'art' crér l'objet artiste
                if ($type === "art") {
                    $artiste = new artiste;
                    $user= new user;
                    $user -> get($id);
                    $artiste -> getTarget("user") ->get("id");
;                
                    if($artiste -> loadFromTab($_POST)) {

                        $artiste -> insert();
                    }
                }


            }
            $organisateur = new oragisateur;


*/




//j'ai besoin de la méthode pour verifier les champs; j'incus me code que je viens d'écrire ; je dois la mettre dans ma classe user; 
function verifier_les_champs($login, $motdepasse)
{
    // rôle: vérifier si les données introduites dans le formulaire sont corectes (correspondent)
    //parametres:  $login , $motdepasse, (les input des champs...) 


    // verifie les champs: si les données insérées dans les input ne sont pas 'nulles'
    //    if((isset($_POST['nom']) && !empty($_POST['nom'])) &&

    /*   if( //(isset ($_POST ['type'])&& !empty ($_POST['type'])) &&
        (isset($_POST['login']) && !empty ($_POST['login'])) && 
        (isset($_POST['motdepasse']) && !empty($_POST['motdepasse'])) && 
        (isset($_POST['motdepasse2'])&& !empty($_POST['motdepasse2']))) {

                    echo "coucou <br>" ; 
        // si les champs sont completes et les variables existent, verifer si les 2 mots de passe sont identiques: 
        //si pas identiques: affiche erreur
        if ($_POST['motdepasse']!= $_POST['motdepasse2']) {   $erreur = 'les mots de passe sont differents <br>' ; echo $erreur;
            exit();   

        } else {echo "c'est ok";} 

                // crée l'objet 'user' pour récupérer les données
                $user = new user();
                if ($user ->loadFromTab ($_POST)) {
                // si les valeurs sont acceptées
    
               // print_r ($user);
                $user -> insert();
                }
                // include page connexion!!!!
                include "templates/pages/accueil_artiste.php";
        }     */
}
