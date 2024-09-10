<?php

// Fragment de page affichant le détail d'un organisateur
// Paramètres : $organisateur: l'objet organisateur

//*****<p>presentation: <?= $organsiateur->get("présentation")   /ferm php </p> <br>  

?>

<div class="affiche ">
    <!--
            <div class ="colorImg"> 
                    <p> image </p>
            </div>
-->
        <div class= "user ">
           
            <h3><strong> <?= nl2br(htmlentities ($organisateur->get("nom")))?><br><br></strong></h3> 
            <h3>presentation:<?= (htmlentities($organisateur->get("presentation")))?> </h3> 
            
            
            <a href="afficher_form_profil_organisateur.php?id=<?= $organisateur->id()?>"><button class ="greenButton">modifier mes détails ➔ </button> </a> 
           
        </div>
            
</div>