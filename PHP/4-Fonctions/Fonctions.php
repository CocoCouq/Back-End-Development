<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fonctions - PHP</title>
  </head>
  <body>
    <?php
      /* Appel de ma library */
      require('library.php');

      echo calculette_if(2, '/', 0);

      echo calculette_switch(2, '/', 0);

      echo calculette_tern(5, '-', 3);
    ?>
  </body>
</html>
