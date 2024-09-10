<?php
/*

Template de page complète : 

Paramètres : 
    
    
*/

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="pageArtiste">
    <div class=" pseudoNav">
        <h1> Bienvenu sur notre site permettant de diffuser la musique vivante en dehors des structures traditionnelles.</h1>

        <a href="afficher_liste_concerts_all_user.php"><button class="bigButton">voir le catalogue des concerts</button> </a>

    </div>

    <h1> page accueil ARTISTE</h1>

    <?php 
    include "templates/fragments/div_user_connected.php";
    ?>

<!-- formulaire messagerie-->
<form name="form_message" method="POST" action="envoyer_message_ecrit.php ">
    <table width="500">
    <tr>
     <td valign="top">
      <label for="expediteur">expediteur </label>
     </td>
     <td valign="top">
      <input  type="text" id= "expediteur" name="expediteur" maxlength="50" size="30" value="<?=  session_userconnected()->get("login")?>">
     </td>
    </tr>
    
    <tr>
     <td valign="top">
      <label for="login">destinataire</label>
     </td>
     <td valign="top">
      <input  type="text" name="login" maxlength="80" size="30" value="<?=$artiste->getTarget("user")->get("login") ?>">
     </td>
    </tr>

    <tr>
     <td valign="top">
      <label for="objet">objet</label>
     </td>
     <td valign="top">
      <input  type="text" name="objet" maxlength="80" size="30" value="<?=$message->get("objet")?> ">
     </td>
    </tr>
    
    <tr>
     <td valign="top">
      <label for="contenu">message</label>
     </td>
     <td valign="top">
     <textarea name="contenu" cols="28" rows="10" value="<?=$message->get("contenu")?>"> </textarea>

     </td>
    </tr>
    <tr>
     <td colspan="2" style="text-align:center">
      <input type="submit" value=" Envoyer ">
     </td>
    </tr>
    </table>
    </form>




</body>

</html>