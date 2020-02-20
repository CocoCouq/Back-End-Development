<?php $title = 'Fonctions'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>

    <h3>Exercice 1</h3>
    <p class="txt">Réaliser une calculatrice</p>
    
    <p class="cod">
    <?php
    
      /* Appel de ma library */
      require('library.php');

      echo calculette_if(2, '/', 0);
      echo '<br>';
      echo calculette_switch(2, '*', 4);
      echo '<br>';
      echo calculette_tern(5, '-', 3);
      
    ?>
    </p>
    
    <pre>
        <code>
        &lt;?php
 
        require('library.php');

        echo calculette_if(2, '/', 0);
        echo '&lt;br&gt;';
        echo calculette_switch(2, '*', 4);
        echo '&lt;br&gt;';
        echo calculette_tern(5, '-', 3);
 
        ?&gt;

        <hr>

        LIBRARY : 
        
        &lt;?php

        function calculette_if($nb1, $opt, $nb2)
        {
            if ($opt == '*')
                return $nb1*$nb2;
            else if ($opt == '/')
            {
                if ($nb2 != 0)
                    return $nb1/$nb2;
                else
                    return "Division par 0";
            }
            else if ($opt == '+')
                return $nb1+$nb2;
            else if ($opt == '-')
                return $nb1-$nb2;
            else
                return "Erreur";
        }

        function calculette_switch($nb1, $opt, $nb2)
        {
            switch ($opt) {
                case '*':
                return $nb1*$nb2;
                break;

                case '/':
                if ($nb2 != 0)
                    return $nb1/$nb2;
                else
                    return "Division par 0";
                break;

                case '+':
                return $nb1+$nb2;
                break;

                case '-':
                return $nb1-$nb2;
                break;

                default:
                break;
            }
        }

        function calculette_tern($nb1, $opt, $nb2)
        {
            $res = $opt == '*'
            ? ($nb1*$nb2)
            : ($opt == '+'
                ? ($nb1+$nb2)
                : ($opt == '-'
                    ? ($nb1-$nb2)
                    : ($opt == '/'
                        ? ($nb2 != 0
                            ? ($nb1/$nb2)
                            : "Division par 0")
                        : "Erreur" )));

            return $res;
        }

        ?&gt;
        </code>
    </pre>
    
    
<?php Close(); ?>
