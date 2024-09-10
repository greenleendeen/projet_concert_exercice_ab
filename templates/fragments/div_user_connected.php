<?php

// Fragment de l'en-tête affichant l'utilisateur connecté ou un bouton pour se connecter
// Paramètres : néant

if (session_isconnected()) {
?>
    <div hidden class=" user">
    <div class=" user">
        <h3> utilisateur: <?= session_userconnected()->get("login") ?></h3>
      <h3> type: <?= session_userconnected()->get("type") ?></h3> 
    </div>
</div>
    
<?php } else { ?>
    <a href="afficher_formulaire_connexion.php" class="button">Se connecter</a>
<?php } ?>