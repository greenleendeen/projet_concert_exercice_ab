<?php
// Classe artiste: gestion des objets 'artiste' 

class artiste extends _model
{

    // attributs à valoriser
    protected $table = "artiste";               // Nom de la table
    protected $fields = ["nom", "presentation", "user"];       // son id de la table user
    protected $links = ["user" => "user"]; // le champs pointe vers l'objet



    function afficheMessage()
    {
        //role:afficher le message 'bonjour'
        // parametres: néant
        // retour: le message en echo
        $message = "bonjour";
        echo $message;
    }

    function getArtisteId()
    {

        //role: Charge un artiste en fonctoion du partamètre GET id
        //parametres: néant (la fonctio se sert dans GET)
        //retour: true / false

        // Récupère le id de l'artiste */
        if (isset($_GET["id"])) {
            // recupete le id de l'artiste dans le GET 
            $artistId = $_GET["id"];
        } else {
            $artistId = 0;
        }


        // charger l'objet artiste et vérifier si c'est ok: avec fonction is()
        $artiste = new artiste();
        return $artiste->load($artistId);
   

    }

    //session_idconnected() {

    // Paramètres : néant
    // Retour : l'id ou 0

    function trouveArtisteII()
    {
        //role: récupérer dans la bdd (et le charger dans l'oobjet courant)  l'artiste dont 'user'(id) correspond au session_idconnected()
        // Paramètres : néant
        // Retour : true  false

        //$sql = "SELECT `id`, `nom`, `presentation`, `user` FROM `artiste` WHERE `user`=76";
        //  $user = new user();
        $userId = session_idconnected();

        // requette sql: $sql = "SELECT...
        $sql = "SELECT `id`, `nom`, `presentation`, `user` FROM `artiste` WHERE `user`= :user ";

        // dire quel $user il faut chercher:

        // valorisée dans un tableau
        $param = [":user" => $userId];

        //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et  $req->execute($param)
        global $bdd;
        $req = $bdd->prepare($sql);

        // si la requette n'execute pas les parametres demandés:
        if (!$req->execute($param)) {
            // On a une erreur de requête 
            return false;
        }

        // fetch recupère la ligne
        $artiste = $req->fetch(PDO::FETCH_ASSOC);
        //print_r($artiste);

        // si $user n'est pas vide
        if (!empty($artiste)) {

            //Si tout est bon, on charge l'objet de l'utilisateur artiste à partir de son id
            $this->loadFromTab($artiste);

            // on renvoi True 
            return true;
        } else {
            //sinon on renvoie False
            return false;
        }
    }

    function getArtiste()
    {
        //Rôle: trouve l'artiste correspondant au id utilisateur donné (connecté) )
        // Paramètres: $user le id user 
        //Retour: l'objet artiste

        $user = new user();
        $artiste = new artiste();
        if (!empty($artiste)) {
            $artiste = $user->trouveArtiste($user);

           // echo "coucou voici l'artiste: <br><br>";
           // print_r($artiste);   // sort: Array ( [id] => 41 [nom] => art1 [presentation] => [user] => 72 ) 


            //Si tout est bon, on charge l'objet de l'utilisateur artiste à partir de son id
            //  $this->load($artiste["id"]);
            //   echo $artiste; var_dump($artiste);

            //        print_r($artiste);            // donne: Array ( [id] => 38 [nom] => art7 [presentation] => [user] => 83 ) 


        }
    }

    function recupInfos($id) {
        //méthode universelle (utilisable par plusieurs objets.. )
        //role: récupère et afiche en 'préremplissage'  les infos écrites auparavent dans un formulaire 
        //parametres: $id : le id de l'objet dont on veut chercher les infos
        //retour:

       // $sql = "SELECT * FROM `artiste` WHERE `id`=35";
       //$sql = "SELECT * FROM `this->table` WHERE `id`= :id";


    }
}
