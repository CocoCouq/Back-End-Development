<!DOCTYPE html>
<?php $title = 'Dates'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>

<!------------------------------------------------------------------------------->

    <h3>EXERCICE 1</h3>     
    <p class="txt">Affichez la date du jour au format mardi 2 juillet 2019</p>
    
    <p class="cod"> 
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
      
    ?>
    </p>
    
    <!--Version Objet-->
    
    <p class="cod">
    <?php
      /* Version Obj */
      $today = new DateTime();
      $jour = $today->format('N') - 1;
      $mois = $today->format('m') - 1;
      echo "Le ".$tabJours[$jour]." ".$today->format('d')." ".$tabMois[$mois]." ".$today->format('Y').".";
      
    ?>
    </p> 
    
    <pre>
        <code>
        $tabJours = ["lundi", "mardi", "mercredi", 
                "jeudi", "vendredi", "samedi", 
                "dimanche"];

        $tabMois = ["janvier", "f&eacute;vrier", "mars", "avril", "mai", 
                    "juin", "juillet", "ao&ucirc;t", "septembre", "octobre", 
                    "novembre", "d&eacute;cembre"];
        
        $dateJour = date(N.m.Y.d); 
        
        $dayWeek = intval($dateJour[0]) - 1; 
        $month = intval($dateJour[1].$dateJour[2]) - 1;
        $years = intval($dateJour[3].$dateJour[4].$dateJour[5].$dateJour[6]);
        $day = intval($dateJour[7].$dateJour[8]);
        
        echo "Nous sommes le ".$tabJours[$dayWeek]." ".$day." ".$tabMois[$month]." ".$years.".&lt;br&gt;"; 

        <hr>

        $today = new DateTime();
        $jour = $today-&gt;format('N') - 1;
        $mois = $today-&gt;format('m') - 1;
        echo "Le ".$tabJours[$jour]." ".$today-&gt;format('d')." ".$tabMois[$mois]." ".$today-&gt;format('Y').".";
        </code>
    </pre>
        
<!------------------------------------------------------------------------------->
      
    <h3>EXERCICE 2</h3>     
    <p class="txt">Affichez la date du jour au format mardi 2 juillet 2019</p>
    
    <p class="cod"> 
    <?php
    
      $dateObj = new DateTime('2019-07-14'); // Permet la représentation d'une date et heure
      // Objet->format('Type') Formate sous un certain 'Type'
      echo "2019-07-14, semaine nº : ".$dateObj->format('W')."."; // W permet d'obtenir le nº de la semaine

    ?>
    </p class="cod">
    
    <pre>
        <code>
        $dateObj = new DateTime('2019-07-14');

        echo "2019-07-14, semaine n&ordm; : ".$dateObj-&gt;format('W').".";
        </code>
    </pre>
        
<!------------------------------------------------------------------------------->
      
    <h3>EXERCICE 3</h3>     
    <p class="txt">Combien reste-t-il de jours avant la fin de votre formation ? fin de formation mise au 22 juin 2020</p>

    <p class="cod">
    <?php
    
      // Déclaration des objets date
      $finForm = new DateTime('2020-06-22');
      $today = new DateTime();
      // Nouvel Obj contenant les infos sur la diff
      $temps = $finForm->diff($today);
      /* var_dump($temps); */ // Je fais un var_dump me permet d'aller chercher l'element que je cherche
      echo "Il reste ".$temps->days." jours.";
      
    ?>
    </p>
    
    <pre>
        <code>
        $finForm = new DateTime('2020-06-22');
        $today = new DateTime();

        $temps = $finForm-&gt;diff($today);
        /* var_dump($temps); */ 
        echo "Il reste ".$temps-&gt;days." jours.";
        </code>
    </pre>
        
<!------------------------------------------------------------------------------->
      
    <h3>EXERCICE 4</h3>     
    <p class="txt">Idem avec `time()` et `mktime()`</p>

    <p class="cod">
    <?php
    
      $today = time(); // var_dump = int(1578836151)
      $finForm = intval(date(mktime(0, 0, 0, 3, 4, 2020)));
      $temps = intval(($finForm - $today) / 86400); //86400 -> Nbr de sec dans une journée
      echo "Il reste ".$temps." jours.";
      
    ?>
    </p>
    
    <pre>
        <code>
        $today = time();
        $finForm = intval(date(mktime(0, 0, 0, 3, 4, 2020)));
        $temps = intval(($finForm - $today) / 86400); 
        echo "Il reste ".$temps." jours.";
        </code>
    </pre>
    
<!------------------------------------------------------------------------------->
      
    <h3>EXERCICE 5</h3>     
    <p class="txt">Quelle sera la prochaine année bissextile ?</p>

    <p class="cod">
    <?php
    
      $today = new DateTime();
      $today = $today->modify('+1 years'); // Pour ne pas avoir l'année actuelle
      while ($today->format('L') != 1) // Format 'L' - donne 1 si bissextile sinon 0
        $today = $today->modify('+1 years');
      echo "La prochaine année bissextile est ".$today->format('Y').".";
      
    ?>
    </p> 
    
    <pre>
        <code>
        $today = new DateTime();
        $today = $today-&gt;modify('+1 years');
        while ($today-&gt;format('L') != 1) 
            $today = $today-&gt;modify('+1 years');

        echo "La prochaine ann&eacute;e bissextile est ".$today-&gt;format('Y').".";
        </code>
    </pre>
     
<!------------------------------------------------------------------------------->
      
    <h3>EXERCICE 6</h3>     
    <p class="txt">En utilisant l'objet DateTime, montrez que la date du 32/17/2019 est erronée</p>

    <p class="cod">
    <?php
    
      $dateError = DateTime::createFromFormat("d/m/Y", '32/17/2019'); // var_dump : object(DateTime)#3 (3) { ["date"]=> string(26) "2004-05-04 15:57:12.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" }
      $Error = $dateError->getLastErrors(); // var_dump : array(4) { ["warning_count"]=> int(1) ["warnings"]=> array(1) { [10]=> string(27) "The parsed date was invalid" } ["error_count"]=> int(0) ["errors"]=> array(0) { } }
      if ($Error["warning_count"] > 0)
            echo $Error["warnings"][10];

    ?>
    </p>
    
    <pre>
        <code>
        $dateError = DateTime::createFromFormat("d/m/Y", '32/17/2019'); 
        $Error = $dateError-&gt;getLastErrors(); 

        if ($Error["warning_count"] &gt; 0)
            echo $Error["warnings"][10];
        </code>
    </pre>
    
<!------------------------------------------------------------------------------->
      
    <h3>EXERCICE 7</h3>     
    <p class="txt">Affichez l'heure courante sous cette forme : 12h25</p>

    <p class="cod">
    <?php
    
      $today = new DateTime();
      $today = $today->modify('+1 hours');
      $heure = $today->format("H\hi"); // J'echappe le h
      echo $heure;
 
    ?>
    </p> 
    
    <pre>
        <code>
        $today = new DateTime();
        $today = $today-&gt;modify('+1 hours');
        $heure = $today-&gt;format("H\hi"); 
        echo $heure; 
        </code>
    </pre>
       
<!------------------------------------------------------------------------------->
      
    <h3>EXERCICE 8</h3>     
    <p class="txt">Ajoutez 1 mois à la date courante</p>

    <p class="cod">
    <?php
    
      $today = new DateTime();
      $today = $today->modify('+1 month');
      echo $today->format('d/m/Y');
      
    ?>
    </p>
    
    <p>
    <?php

      $today2 = new DateTime();
      $today2->add(new DateInterval('P1M'));
      echo $today2->format('d/m/Y');
  
    ?>
    </p>
    
    <pre>
        <code>
        $today = new DateTime();
        $today = $today-&gt;modify('+1 month');
        echo $today-&gt;format('d/m/Y');

        <hr>

        $today2 = new DateTime();
        $today2-&gt;add(new DateInterval('P1M'));
        echo $today2-&gt;format('d/m/Y');
        </code>
    </pre>
     
<!------------------------------------------------------------------------------->
      
    <h3>EXERCICE 9</h3>     
    <p class="txt">Que c'est il passé le 946080000 ?</p>

    <p class="cod">
    <?php
    
       $intVal = 946080000;
       $dateT = new DateTime("@$intVal");
       echo $dateT->format('d/m/Y H:i:s')." : Dernier Noel du millenaire";
       
    ?>
    </p>
    
    <pre>
        <code>
        $intVal = 946080000;
        $dateT = new DateTime("@$intVal");
        echo $dateT-&gt;format('d/m/Y H:i:s')." : Dernier Noel du millenaire";
        </code>
    </pre>
 
<?php Close(); ?>

    