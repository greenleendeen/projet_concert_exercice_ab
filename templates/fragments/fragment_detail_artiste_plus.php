<?php

// Fragment de page affichant le détail d'un artiste pour un organisateur connecté
// Paramètres : $artiste: l'objet artiste

?>

<div class="detail flex spaceBetween">
    <div class="colorImg">
        <p> </p>
    </div>

    <div class="user">

        <!-- <h3><strong> artiste:<?= (htmlentities($artiste->get("nom"))) ?></p> </strong></h3>-->

        <div class="">
            <h3>presentation : <?= (htmlentities($artiste->get("presentation"))) ?></h3>
        </div>

        <a href="ecrire_message.php?id=<?= $artiste->id() ?>"><button class="bigButton">contacter cet artiste ➔ </button> </a>


    </div>

</div>