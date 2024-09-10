<?php
// Classe organisateur: gestion des objets 'organisateur' 

class organisateur extends _model
{

  // attributs à valoriser
  protected $table = "organisateur";               // Nom de la table
  protected $fields = ["nom", "presentation", "user"];       // par son id de la table user
  protected $links = ["user" => "user"];




  function insertNewOrganisateur()
  {
    //role: créer et inserer un nouvel organisateur dans la bdd
    //paramertres $user : le id utilisateur org
    // $nom : le nom de l'utilisateur
    // retour : true si réussi, false si échoué 
  }



  function trouveOrganisateur($user)
  {
    //role: recuperer dans la bdd l'artiste dont 'user'(id) correspond au session_idconnected()
    // Paramètres : 
    // Retour : l'objet 'artiste' complet chargé par son id

    //$sql = "SELECT `id`, `nom`, `presentation`, `user` FROM `artiste` WHERE `user`=76";
    //  $user = new user();
    $user = session_idconnected();

    // requette sql: $sql = "SELECT...
    $sql = "SELECT `id`, `nom`, `presentation`, `user` FROM `organisateur` WHERE `user`= :user ";

    // dire quel $user il faut chercher:
    // valorisée dans un tableau
    $param = [":user" => $user];

    //Préparer / exécuter avec  global $bdd:  $bdd->prepare($sql) et  $req->execute($param)
    global $bdd;
    $req = $bdd->prepare($sql);

    // si la requette n'execute pas les parametres demandés:
    if (!$req->execute($param)) {
      // On a une erreur de requête 
      return false;
    }

    // fetch recupère la ligne
    $organisateur = $req->fetch(PDO::FETCH_ASSOC);
    //print_r($organisateur);

    // si $user n'est pas vide
    if (!empty($organisateur)) {

      //Si tout est bon, on charge l'objet de l'utilisateur artiste à partir de son id
      $this->load($organisateur["id"]);

      // on renvoi True 
      return true;
    } else {
      //sinon on renvoie False
      return false;
    }
  }
}
