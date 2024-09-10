<?php
// Classe lieu: gestion des objets 'lieu' 

class lieu extends _model
{

    // attributs à valoriser
    protected $table = "lieu";               // Nom de la table
    protected $fields = ["ville", "description", "organisateur"];       // par son id de la table organisateur
    protected $links = ["organisateur" => "organisateur"];



    
}
