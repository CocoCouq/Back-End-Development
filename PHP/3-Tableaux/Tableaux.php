<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tableaux - PHP</title>
  </head>
  <body>
    <?php
      /* Tableau imposé */
      $a = [
        "19001" => ["Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
                "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage",
                "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
                "Stage", "Validation", "Validation"],
        "19002" => ["Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
                "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
                "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
                "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""],
        "19003" => ["", "", "Centre", "Centre", "Centre", "Centre", "Centre",
                "Centre", "Centre", "Centre", "Centre", "Stage", "Stage",
                "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
                "Stage", "Stage", "Stage", "", "", "Validation"]
          ];
/* --------------------------------------------------------------------------- */

       echo "<h3>EXERCICE 0</h3>";

       /* Exercice 0 - var_dump() */
       var_dump($a);
       echo "<br><br>";
       var_dump($a[19001]);
/* --------------------------------------------------------------------------- */

       echo "<hr><br><h3>EXERCICE 1</h3>";

       /* Exercice 1 - Semaine de validation Groupe 19002 */
       $i = -1;
       while ($a[19002][++$i] != "Validation"); // Pas besoin d'instruction, incrémentation dans la condition
       $i++; // Le tab commence a 0 les semaines a 1
       echo "Groupe 19002 :<br>Validation la semaine $i.";
/* --------------------------------------------------------------------------- */

       echo "<hr><br><h3>EXERCICE 2</h3>";

       /* Exercice 2 - Dernière semaine de stage Groupe 19001 */
       $i = -1;
       while ($a[19001][++$i] != "Stage");
       while ($a[19001][$i++] == "Stage"); // Incremente en sortie de boucle donc i--;
       $i --;
       echo "Groupe 19001 :<br>Stage fini la semaine $i";
/* --------------------------------------------------------------------------- */

       echo "<hr><br><h3>EXERCICE 3</h3>";

      /* Exercice 3 - Tableau des codes des groupes */
      $i = -1;
      $grp = [];
      $grp1 = [];
      while (++$i != count($a))
      {
        $grp[$i] = key($a);
        next($a);
      }
      var_dump($grp);

      // Séparation versions
      echo "<br>";

      // Version foreach
      $i = 0;
      foreach ($a as $key => $value) {
          $grp1[$i] = $key;
          $i++;
      }
      var_dump($grp1);
/* --------------------------------------------------------------------------- */

       echo "<hr><br><h3>EXERCICE 4</h3>";

       /* Exercice 4 - Durée du stage du Groupe 19003 */
       $i = -1;
       while ($a[19003][++$i] != "Stage");
       $j = $i; // Sauvegarde de la valeur du début du stage
       while ($a[19003][++$i] == "Stage");
       $i = $i - $j; // Retire le debut de stage a la fin de stage 
       echo "Durée du stage du Groupe 19003 :<br>$i semaines.";
    ?>
  </body>
</html>
