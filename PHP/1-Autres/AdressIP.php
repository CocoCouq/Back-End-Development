<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ex 2 - Adress IP</title>
  </head>
  <body>
    <?php
      echo"Bonjour le monde.<br>";

      echo $_SERVER["SERVER_NAME"];
      echo '<br>';
      echo $_SERVER["REMOTE_ADDR"];
    ?>
  </body>
</html>

<!--

Pour utilisation avec MAMP :
    Le fichier doit être placé dans le fichier 'htdocs' de l'application MAMP
    Pour lancer le ficher depuis le serveur local à l'adresse :
      http://localhost:8888

-->

<!-- La SUPERGLOBALE $_SERVER donne
       acces à toutes les données
   vardump($_SERVER) affiche toutes
       les variables de $_SERVER -->
