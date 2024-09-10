<?php
// Classe message: gestion des objets 'message' 

class message extends _model
{

    // attributs à valoriser
    protected $table = "message";               // Nom de la table
    protected $fields = ["expediteur", "destinataire", "objet" ,  "contenu", "lecture" , "statut"];       // son id de la table user
    protected $links = ["expediteur" => "user", "destinataire" => "user"]; // le champs pointe vers l'objet





}