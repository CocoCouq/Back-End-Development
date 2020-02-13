<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>6 - Dates</title>
  </head>
  <body>
    <h1>Exercice 1</h1>
<!--
  Exercice 1
  Affichez la date du jour au format _mardi 2 juillet 2019_.
-->
    <?php
      //Déclaration des valeurs dans des tableaux
      $tabJours = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
      $tabMois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
      // Declaration de la date
      $dateJour = date(N.m.Y.d); // (N : nºJourSemaine, m : nºMois, y : Année, d : nºJourMois)
      // Recupération des informations
      $dayWeek = intval($dateJour[0]) - 1; // -1 pour correspondre à $tabJours (idem pour $month et $tabMois)
      $month = intval($dateJour[1].$dateJour[2]) - 1;
      $years = intval($dateJour[3].$dateJour[4].$dateJour[5].$dateJour[6]);
      $day = intval($dateJour[7].$dateJour[8]);
      // Affichage du résultat
      echo "Nous sommes le ".$tabJours[$dayWeek]." ".$day." ".$tabMois[$month]." ".$years.".<br>";

      /* Version Obj */
      $today = new DateTime();
      $jour = $today->format('N') - 1;
      $mois = $today->format('m') - 1;
      echo "Le ".$tabJours[$jour]." ".$today->format('d')." ".$tabMois[$mois]." ".$today->format('Y').".";
      //
    ?><br><hr>
    <h1>Exercice 2</h1>
<!--
  Exercice 2
  Affichez le numéro de semaine de la date suivante : 14/07/2019
-->
    <?php
      $dateObj = new DateTime('2019-07-14'); // Permet la représentation d'une date et heure
      // Objet->format('Type') Formate sous un certain 'Type'
      echo "2019-07-14, semaine nº : ".$dateObj->format('W')."."; // W permet d'obtenir le nº de la semaine
      //
    ?><br><hr>
    <h1>Exercice 3</h1>
<!--
  Exercice 3
  Combien reste-t-il de jours avant la fin de votre formation ?
  fin de formation mise au 22 juin 2020
-->
    <?php
      // Déclaration des objets date
      $finForm = new DateTime('2020-06-22');
      $today = new DateTime();
      // Nouvel Obj contenant les infos sur la diff
      $temps = $finForm->diff($today);
      /* var_dump($temps); */ // Je fais un var_dump me permet d'aller chercher l'element que je cherche
      echo "Il reste ".$temps->days." jours.";
      //
    ?><br><hr>
    <h1>Exercice 4</h1>
<!--
  Exercice 4
  Idem avec `time()` et `mktime()`
-->
    <?php
      $today = time(); // var_dump = int(1578836151)
      $finForm = intval(date(mktime(0, 0, 0, 3, 4, 2020)));
      $temps = intval(($finForm - $today) / 86400); //86400 -> Nbr de sec dans une journée
      echo "Il reste ".$temps." jours.";
      //
    ?><br><hr>
    <h1>Exercice 5</h1>
<!--
  Exercice 5
  Quelle sera la prochaine année bissextile ?
-->
    <?php
      $today = new DateTime();
      $today = $today->modify('+1 years'); // Pour ne pas avoir l'année actuelle
      while ($today->format('L') != 1) // Format 'L' - donne 1 si bissextile sinon 0
        $today = $today->modify('+1 years');
      echo "La prochaine année bissextile est ".$today->format('Y').".";
      //
    ?><br><hr>
    <h1>Exercice 6</h1>
<!--
  Exercice 6
  En utilisant l'objet DateTime, montrez que la date du 32/17/2019 est erronée.
-->
    <?php
      $dateError = DateTime::createFromFormat("d/m/Y", '32/17/2019'); // var_dump : object(DateTime)#3 (3) { ["date"]=> string(26) "2004-05-04 15:57:12.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" }
      $Error = $dateError->getLastErrors(); // var_dump : array(4) { ["warning_count"]=> int(1) ["warnings"]=> array(1) { [10]=> string(27) "The parsed date was invalid" } ["error_count"]=> int(0) ["errors"]=> array(0) { } }
      if ($Error["warning_count"] > 0)
            echo $Error["warnings"][10];
//
    ?><br><hr>
    <h1>Exercice 7</h1>
<!--
  Exercice 7
  Affichez l'heure courante sous cette forme : 12h25.
-->
    <?php
      $today = new DateTime();
      $today = $today->modify('+1 hours');
      $heure = $today->format("H\hi"); // J'echappe le h
      echo $heure;
 //
    ?><br><hr>
    <h1>Exercice 8</h1>
<!--
  Exercice 8
  Ajoutez 1 mois à la date courante
-->
    <?php
      $today = new DateTime();
      $today = $today->modify('+1 month');
      echo $today->format('d/m/Y');

      /* OU */ echo "<br>";

      $today2 = new DateTime();
      $today2->add(new DateInterval('P1M'));
      echo $today2->format('d/m/Y');
  //
    ?><br><hr>
    <h1>Exercice 9</h1>
<!--
  Exercice 9
  Que c'est il passé le 946080000
 -->
    <?php
       $intVal = 946080000;
       $dateT = new DateTime("@$intVal");
       echo $dateT->format('d/m/Y H:i:s')." : Dernier Noel du millenaire";
    ?>
  </body>
</html>
