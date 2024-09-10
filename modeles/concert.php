<?php
// Classe concert : gestion des objets concert

class concert extends _model
{

    // attributs à valoriser
    protected $table = "concert";               // 
    protected $fields = ["type", "description", "ville", "prix", "artiste"];       //artiste avec son id
    protected $links = ["artiste" => "artiste"];



    
}




