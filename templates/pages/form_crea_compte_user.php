<?php
/*

Template de page complète : affiche le formulaire de création d'un compte utilisateur
Paramètres :
   $user : objet user
    $nom : le nom déjà saisi si on est en erreur de saisie
    $type: A/O
    
*/

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creation compte utilisateur</title>

    <link rel="stylesheet" href="/css/style.css">

</head>

<body>


    <div class="affiche  flex ">
        <form action="enregistrer_form_crea_user.php" method="POST">

            <?php
            if ($type === "art") {
                include "templates/fragments/type_user_artiste.php";
            } else {
                include "templates/fragments/type_user_organisateur.php";
            }
            ?>

            <!--      <div>
                <select id="monselect"> 
                    <option value="art"selected>artiste</option>
                    <option value="org" selected>organistaeur</option>
                </select>
            </div>
-->
            <div class="">
                <div>
                    <label for="nom">votre nom:</label>
                    <input type="text" id="nom" name="nom" />
                </div>

                <div>
                    <label for="login">votre adresse email:</label>
                    <input type="email" id="login" name="login" required /> <br> <br>
                </div>
            </div>

            <div class="">
                <div>
                    <label for="motdepasse">votre mot de passe:</label>
                    <input type="password" id="motdepasse" name="motdepasse" required /> <br> <br>
                </div>

                <div>
                    <label for="motdepasse">confirmez votre mot de passe:</label>
                    <input type="password" id="motdepasse" name="motdepasse2" required /> <br> <br>
                </div>

            </div>

            <input type="submit" name="inscription" value="Inscription" />
        </form>
    </div>


</body>

</html>