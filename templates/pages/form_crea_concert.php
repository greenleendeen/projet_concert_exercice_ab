<?php
/*
Template de page complète : affiche le formulaire de création d’un concert, avec les champs à compléter

Paramètres:  
    $concert:objet concert non chargé
*/ 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire création concert</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body class= pageArtiste>

<?php 
        include "templates/fragments/div_user_connected.php";
    ?>
    
    <h3> Nom artiste</h3>
    <h3> Vous souahitez proposer un nouveau concert. Veuillez renseigner les champs</h3>

    <form action="enregistrer_crea_concert.php" method="POST" class= "affiche">
  <label for="type"> style de musique:</label><br>
  <input type="text" id="type" name="type" value="<?= (htmlentities($concert->get("type")))?>"><br>

  <label for="description">description concert:</label><br>
  <input type="text" id="description" name="description" value="<?= (htmlentities($concert->get("description")))?>"><br>

  <label for="ville">ville:</label><br>
  <input type="text" id="ville" name="ville" value="<?= (htmlentities($concert->get("ville")))?>"><br>

  <label for="prix">prix €:</label> <br>
  <input type="text" id="prix" name="prix" value="<?= (htmlentities($concert->get("prix")))?>"><br><br>

  <input type="submit" value="Valider">
</form> 
    
</body>
</html>