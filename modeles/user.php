<?php
// Classe user : gestion des objets utilisateurs 

class user extends _model
{

    // attributs à valoriser
    protected $table = "user";               // Nom de la table
    protected $fields = ["login", "motdepasse", "type"];       // type o ou a (organisateur ou artiste)



    // methode verifier_connexion($login , $motdepasse ) 
    // rôle: vérifier si les données de connexion introduites dans le formulaire sont corectes: existent dans la bdd 
    //parametres: $login $motdepasse (les identifiants de l'utilisateur) 
    //            $user: l'objet utilisateur qui est sur une ligne 

    function verifier_connexion($login, $motdepasse)
    {

        //récupérer avec une requête SQL ----la ligne de l'utilisateur ---- correspondant au login dans la BDD

        // requette sql: $sql = "SELECT...
        $sql = "SELECT  `id`,`login`,`motdepasse` FROM `user` WHERE `login` = :login ";

        // valorisée dans un tableau
        $param = [":login" => $login];

        //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et  $req->execute($param)
        global $bdd;
        $req = $bdd->prepare($sql);

        // si la requette n'execute pas les parametres demandés:
        if (!$req->execute($param)) {
            // On a une erreur de requête 
            return false;
        }

        // fetch recupère une ligne.. 
        $user = $req->fetch(PDO::FETCH_ASSOC);

        // correspondant au login: si le login saisi est le même que celui de la bdd: affiche 

        // si $user n'est pas vide
        if (!empty($user)) {

            //On teste que le mot de passe passé en paramètre correspond au mot de passe récupéré.
            if (password_verify($motdepasse, $user["motdepasse"])) {
                //Si tout est bon, on charge l'objet de l'utilisateur à partir de l'id
                $this->load($user["id"]);

                //Si le mot de passe est bon, on renvoi True 
                return true;
            } else {
                //sinon on renvoie False
                return false;
            }
            //  if : terminé

        } else {
            return false;
        }
    }
    // verifier_connexion: terminé    

    function returnThisUser($userId)
    {
        // Rôle : récupère le id de'user' pour une evaluation 
        // Paramètres : userId
        // Retour : l'id de l'utilisateur

        $user = new user();
        if (session_isconnected()) {
          //  print_r($user);
        }
        // !il ne faut pas créer l'objet $user, puisque il est déjà dans la methode session is connected
        // Récupération de l'ID de l'utilisateur avec la methode id();
        $userId = $user->id();
        //echo "L'ID de l'utilisateur est : " . $userId;
        return $userId;
    }

    function getIdUser($user)
    {
        //role : retourne le id d'un objet 'user
        // parametres: $user
        //retour: son id

        if (isset($_GET["id"])) {
            // récupere dans le tableau $_GET l'index "id" et la stock dans la variable $id
            $idUser = $_GET["id"];
        } else {
            //sinon la variable $idAppart recoit 0
            $idUser = 0;
        }
        // vérifer si il le trouve:
        //echo "l'id est $idUser <br> <br>";
        // $user = new user();
        //charge avec le id prévu
        $user->load($idUser);
        //print_r($user);
    }

    function getIdUserAndName($idUser, $nom)
    {
        //role : retourne le id d'un objet 'user' et le nom posté dans le formulaire
        // parametres: $idUser le id de l'utilisateur 
        //              $nom : le nom du champ 'nom' dans POST
        //retour: le id et le nom

        $user = new user();
        $idUser->returnThisUser($user);
        $nom = $_POST['nom'];
    }

    /* ???? function returnThisUser($user) {
        // Rôle : récupère l'objet 'user' (pour la création des types) 
        // Paramètres : $user
        // Retour : l'id l'user

            // demander à l'objet user de récupérer l'id de l'user crée sur cette page
            $user = new user();
            return $user->id();
    } */

    function verifExisteUser($login, $type)
    {
        // rôle: vérifier (par login et type A/O)si l'utilisateur qui crée le compte existe dans la bdd 
        //parametres: $login , $ type (l'identifiant et le type de l'utilisateur)

        //récupérer avec une requête SQL ----la ligne de l'utilisateur -- si il existe---- correspondant au login et au type -- dans la BDD

        // requette sql: $sql = "SELECT...
        $sql = "SELECT  `id`,`login`,`type` FROM `user` WHERE `login` = :login  AND `type` = :type";

        // valoriser dans un tableau
        $param = [
            ":login" => $login,
            ":type" => $type
        ];

        //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et  $req->execute($param)
        global $bdd;
        $req = $bdd->prepare($sql);

        // si la requette n'execute pas les parametres demandés:
        if (!$req->execute($param)) {
            // On a une erreur de requête 
            return false;
        }

        // fetch recupère une ligne.. 
        $user = $req->fetch(PDO::FETCH_ASSOC);
        //print_r($user);

        // correspondant au login: si le login saisi est le même que celui de la bdd: affiche 

        // si $user est vide
        if (empty($user)) {

          //  echo "cet uitlisateur n'existe pas dans la bdd, je peux le créer";
            return true;
        } else {
            //sinon 
            //Si  l'utilsateur existe: on renvoie False 
         //   echo "cet uitlisateur existe";
            //return false;
            exit;
        }
    }



    function returnUserId()
    {
        //role: donne le ID de l'utilisateur
        // parametres
        //retour:

        $user = new user;
        $user = $user->id();
       // echo $user;
    }


    function trouveArtiste()
    {
        //role: trouver dans la bdd l'artiste dont du user courant
        // Paramètres :
        // Retour : l'objet 'artiste' complet chargé par son id

        // Il faut récuoérer un artiste
        $artiste = new artiste();
        $artiste->loadForUser($this->id());
        return $artiste;
    }
}

//class user extends _model : terminé
//$artiste = session_userconnected()->trouveArtiste();
