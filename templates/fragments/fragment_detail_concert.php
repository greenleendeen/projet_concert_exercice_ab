<?php

// Fragment de page affichant le détail d'un concert
// Paramètres : $concert: l'objet concert

//*****<p>description: <?= $concert->get("description")   /ferm php </p> <br>  

?>


<div class="detail flex spaceBetween">
    <div class="colorImg">
        <img src="">
    </div>

    <div class=" ">

    
            <p><strong> artiste: <?= (htmlentities (($concert->getTarget("artiste")->get("nom")))) ?></p> </strong></p>
            <p><strong>style de musique: </strong><?= (htmlentities ($concert->get("type"))) ?></p>
            <p> <strong>ville: </strong> <?= (htmlentities($concert->get("ville"))) ?></p> 
            <p> <strong>prix:</strong> <?= (htmlentities($concert->get("prix"))) ?></p> 

            <a href="afficher_detail_concert.php?id=<?= $concert->id() ?>"><button class ="bigButton">détail concert➔ </button> </a>
            

    </div>

</div>