<?php $title = 'Tableau'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>

<h3>Exercice 1</h3>
<p class="txt">Tableau des mois</p>

<p>
    
    <?php 
        // Tableau associant Mois et Nbr de jours 
        $tab = array(
            "Janvier" => 31,
            "Fevrier" => 28,
            "Mars" => 31,
            "Avril" => 30,
            "Mai" => 31,
            "Juin" => 30,
            "Juillet" => 31,
            "Aout" => 31,
            "Septembre" => 30,
            "Octobre" => 31,
            "Novembre" => 30,
            "Decembre" => 31,
        );
    ?>
    
    <table class="striped">
        <thead class="grey">
            <td>Mois</td>
            <td>Jours</td>
        </thead>
        <tbody>
            <?php foreach ($tab as $key => $value) { ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <?php 
        asort($tab); 
    ?>
    
    <table class="striped">
        <thead class="grey">
            <td>Mois</td>
            <td>Jours</td>
        </thead>
        <tbody>
            <?php foreach ($tab as $key => $value) { ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</p>


<pre>
    <code>
    &lt;?php 
        // Tableau associant Mois et Nbr de jours 
        $tab = array(
          "Janvier" =&gt; 31,
          "Fevrier" =&gt; 28,
          "Mars" =&gt; 31,
          "Avril" =&gt; 30,
          "Mai" =&gt; 31,
          "Juin" =&gt; 30,
          "Juillet" =&gt; 31,
          "Aout" =&gt; 31,
          "Septembre" =&gt; 30,
          "Octobre" =&gt; 31,
          "Novembre" =&gt; 30,
          "Decembre" =&gt; 31,
        );
    ?&gt;
    
    <hr>
    
    &lt;table class="striped"&gt;
        &lt;thead class="grey"&gt;
            &lt;td&gt;Mois&lt;/td&gt;
            &lt;td&gt;Jours&lt;/td&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;?php foreach ($tab as $key =&gt; $value) { ?&gt;
            &lt;tr&gt;
                &lt;td&gt;&lt;?= $key ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $value ?&gt;&lt;/td&gt;
            &lt;/tr&gt;
            &lt;?php } ?&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;

    &lt;?php 
    asort($tab); 
    ?&gt;

    &lt;table class="striped"&gt;
        &lt;thead class="grey"&gt;
            &lt;td&gt;Mois&lt;/td&gt;
            &lt;td&gt;Jours&lt;/td&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;?php foreach ($tab as $key =&gt; $value) { ?&gt;
            &lt;tr&gt;
                &lt;td&gt;&lt;?= $key ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $value ?&gt;&lt;/td&gt;
            &lt;/tr&gt;
            &lt;?php } ?&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;  
    </code>
</pre>


<!------------------------------------------------------------------------------->

<h3>Exercice 2a</h3>
<p class="txt">Capitales des Pays</p>
 
<?php
//    Tableau donné des capitales
   $capitales = array(
    "Bucarest" => "Roumanie",
    "Bruxelles" => "Belgique",
    "Oslo" => "Norvège",
    "Ottawa" => "Canada",
    "Paris" => "France",
    "Port-au-Prince" => "Haïti",
    "Port-d'Espagne" => "Trinité-et-Tobago",
    "Prague" => "République tchèque",
    "Rabat" => "Maroc",
    "Riga" => "Lettonie",
    "Rome" => "Italie",
    "San José" => "Costa Rica",
    "Santiago" => "Chili",
    "Sofia" => "Bulgarie",
    "Alger" => "Algérie",
    "Amsterdam" => "Pays-Bas",
    "Andorre-la-Vieille" => "Andorre",
    "Asuncion" => "Paraguay",
    "Athènes" => "Grèce",
    "Bagdad" => "Irak",
    "Bamako" => "Mali",
    "Berlin" => "Allemagne",
    "Bogota" => "Colombie",
    "Brasilia" => "Brésil",
    "Bratislava" => "Slovaquie",
    "Varsovie" => "Pologne",
    "Budapest" => "Hongrie",
    "Le Caire" => "Egypte",
    "Canberra" => "Australie",
    "Caracas" => "Venezuela",
    "Jakarta" => "Indonésie",
    "Kiev" => "Ukraine",
    "Kigali" => "Rwanda",
    "Kingston" => "Jamaïque",
    "Lima" => "Pérou",
    "Londres" => "Royaume-Uni",
    "Madrid" => "Espagne",
    "Malé" => "Maldives",
    "Mexico" => "Mexique",
    "Minsk" => "Biélorussie",
    "Moscou" => "Russie",
    "Nairobi" => "Kenya",
    "New Delhi" => "Inde",
    "Stockholm" => "Suède",
    "Téhéran" => "Iran",
    "Tokyo" => "Japon",
    "Tunis" => "Tunisie",
    "Copenhague" => "Danemark",
    "Dakar" => "Sénégal",
    "Damas" => "Syrie",
    "Dublin" => "Irlande",
    "Erevan" => "Arménie",
    "La Havane" => "Cuba",
    "Helsinki" => "Finlande",
    "Islamabad" => "Pakistan",
    "Vienne" => "Autriche",
    "Vilnius" => "Lituanie",
    "Zagreb" => "Croatie"
); 
?>

<p>
    <table class="striped">
        <thead class="grey">
            <td>Capitale</td>
            <td>Pays</td>
        </thead>
        <tbody>
        <?php 
            // Tri des capitales
            ksort($capitales);
            foreach ($capitales as $key => $value) {
        ?>

            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>

        <?php
            }
        ?>
       </tbody>
    </table>
</p>

<pre>
    <code>
    &lt;table class="striped"&gt;
        &lt;thead class="grey"&gt;
            &lt;td&gt;Capitale&lt;/td&gt;
            &lt;td&gt;Pays&lt;/td&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
        
            &lt;?php 
                // Tri des capitales
                ksort($capitales);
                foreach ($capitales as $key =&gt; $value) {
            ?&gt;

            &lt;tr&gt;
                &lt;td&gt;&lt;?= $key ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $value ?&gt;&lt;/td&gt;
            &lt;/tr&gt;

            &lt;?php
            }
            ?&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
    </code>
</pre>


<h3>Exercice 2b</h3>
<p class="txt">Retirer les capitales ne commençant pas par 'B'</p>

<p>
    <?php 
        $filtre = '/^(b){1}/i';
        $i = 0;
        foreach ($capitales as $key => $value) {
            if(!preg_match($filtre, $key))
                unset ($capitales[$key]);
        }
    ?>
    <table class="striped">
        <thead class="grey">
            <td>Capitale</td>
            <td>Pays</td>
        </thead>
        <tbody>    
            <?php foreach ($capitales as $key => $value) { ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
            <?php    } ?>
        </tbody>
    </table>
</p>

<pre>
    <code>
    &lt;?php 
        $filtre = '/^(b){1}/i';
        $i = 0;
        foreach ($capitales as $key =&gt; $value) {
            if(!preg_match($filtre, $key))
            unset ($capitales[$key]);
        }
    ?&gt;
    
    &lt;table class="striped"&gt;
        &lt;thead class="grey"&gt;
            &lt;td&gt;Capitale&lt;/td&gt;
            &lt;td&gt;Pays&lt;/td&gt;
        &lt;/thead&gt;
        &lt;tbody&gt; 
            &lt;?php foreach ($capitales as $key =&gt; $value) { ?&gt;
            &lt;tr&gt;
                &lt;td&gt;&lt;?= $key ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $value ?&gt;&lt;/td&gt;
            &lt;/tr&gt;
            &lt;?php } ?&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
    </code>
</pre>

<!------------------------------------------------------------------------------->

<h3>Exercice 3a</h3>
<p class="txt">Liste des régions, départments</p>

<p>
    <?php
        $departements = array(
            "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
            "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
            "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
            "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
        );
        // Tri par ordre Alphabétique
        ksort($departements);
    ?>
    <table class="striped">
        <thead class="grey">
            <td>Region</td>
            <td>Departement</td>
        </thead>
        <tbody>
            <?php 
                foreach ($departements as $key => $value) { 
                    
                    echo "<tr><td>$key</td><td>";
                    
                    foreach ($value as $keyVal => $valueVal) {
                        echo " $valueVal, ";
                    }
                    echo "</td></tr>";
            
                } ?>
        </tbody>
    </table>
</p>

<pre>
    <code>
    &lt;?php
        $departements = array(
          "Hauts-de-france" =&gt; array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
          "Bretagne" =&gt; array("C&ocirc;tes d'Armor", "Finist&egrave;re", "Ille-et-Vilaine", "Morbihan"),
          "Grand-Est" =&gt; array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
          "Normandie" =&gt; array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
        );
        // Tri par ordre Alphab&eacute;tique
        ksort($departements);
    ?&gt;
    
    &lt;table class="striped"&gt;
        &lt;thead class="grey"&gt;
            &lt;td&gt;Region&lt;/td&gt;
            &lt;td&gt;Departement&lt;/td&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;?php 
            foreach ($departements as $key =&gt; $value) { 
            
                echo "&lt;tr&gt;&lt;td&gt;$key&lt;/td&gt;&lt;td&gt;";
                foreach ($value as $keyVal =&gt; $valueVal) {
                    echo " $valueVal, ";
                }
                echo "&lt;/td&gt;&lt;/tr&gt;";

            } ?&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
    </code>
</pre>

<h3>Exercice 3b</h3>
<p class="txt">Liste des régions, nombres départments</p>

<p>
    <table>
        <thead>
            <td></td>
            <td></td>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <?php ?>
</p>


<?php Close(); ?>