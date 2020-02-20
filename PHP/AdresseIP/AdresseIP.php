<?php $title = 'Adresse IP'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>

    <h3>Exercice 1</h3>
    <p class="txt">Premier exercice PHP : Afficher un message et les adresses IP</p>
    
    <p class="cod">
    <?php
    
      echo"Bonjour le monde.<br>";

      echo $_SERVER["SERVER_NAME"];
      echo '<br>';
      echo $_SERVER["REMOTE_ADDR"];
      
    ?>
    </p>
    
    <pre>
        <code>
        &lt;?php
 
        echo"Bonjour le monde.&lt;br&gt;";

        echo $_SERVER["SERVER_NAME"];
        echo '&lt;br&gt;';
        echo $_SERVER["REMOTE_ADDR"];
 
        ?&gt;
        </code>
    </pre>
    
<?php Close(); ?>

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
