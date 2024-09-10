<?php

// Fragment de page affichant le détail d'un artiste
// Paramètres : $artiste: l'objet artiste

//*****<p>presentation: <?= $artiste->get("présentation")   /ferm php </p> <br>  

?>

<div class="affiche flex">
    <div class="colorImg">
        <p> </p>
    </div>
                 
    <div class="user">

        <h3><strong> artiste:<?= (htmlentities($artiste->get("nom")) )?></p> </strong></h3>

        <div class =""> 
        <h3>presentation de l'artiste:  <?= (htmlentities($artiste->get("presentation"))) ?></h3>
        </div>

        <a href="afficher_form_profil_artiste.php"><button class="blueButton">modifier mes détails ➔ </button> </a>

       
        

    </div>

</div>