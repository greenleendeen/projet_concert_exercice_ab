<?php
/*

Template de page complète : affiche le formulaire pour completer ou modifier les détails d'un profil 'artiste'
Paramètres :
    $artiste : objet artiste chargé avec ses détails enrégistrés lors de la création du compte
    
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire pour détail profil artiste</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>

    <h3> prenez quelques instants pour completer votre profil</h3>
    <div class="affiche">

        <form action="valider_profil_artiste.php?artistId=<?= $artiste->id() ?>" method="POST" class="">


            <div>
                <label> votre nom ou nom de scène:</label> 
                <input type="text" id="nom" name="nom" value="<?= $artiste->get("nom") ?>">
            </div>

            <div>
                <label for="presentation"> votre présentation: </label>
                <textarea id="presentation" name="presentation"><?= $artiste->get("presentation") ?></textarea>
                <br> <br>
            </div>

            <div>
                <label for="image">ICI UNE IMG en PJ:</label>
                    <input type="text" id="image" value="image" required /> <br> <br>
            </div>

            <input type="submit" value="valider" class="blueButton" />

        </form>

    </div>
</body>

</html>