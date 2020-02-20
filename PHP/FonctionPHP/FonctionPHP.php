<?php $title = 'Fonction'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>


<h3>Exercice 1</h3>
<p class="txt">Ecrire une fonction qui permet de gérer un lien</p>

<p class="cod">
    <?php  
        function lien($str, $txt) { ?>
            <a href=<?= '"'.$str.'">'.$txt ?></a>  
    <?php } ?>
            
    <?php lien("https://www.reddit.com/", "Reddit Hug"); ?>
</p>

<pre>
    <code>
        &lt;?php 
        function lien($str, $txt) { ?&gt;
            &lt;a href=&lt;?= '"'.$str.'"&gt;'.$txt ?&gt;&lt;/a&gt; 
        &lt;?php } ?&gt;

        &lt;?php lien("https://www.reddit.com/", "Reddit Hug"); ?&gt;
    </code>
</pre>


<!------------------------------------------------------------------------------->


<h3>Exercice 2</h3>
<p class="txt">Ecrire une fonction qui calcule la somme des valeurs d'un tableau</p>

<p class="cod">
    <?php 
        function sum($array)
        {
            $result = array_sum($array);
            return $result; 
        }
        
        $tab = array(4, 3, 8, 2);
        $somme = sum($tab);
        echo $somme;
    ?>
</p>

<pre>
    <code>
    &lt;?php 
        function sum($array)
        {
            $result = array_sum($array);
            return $result; 
        }

        $tab = array(4, 3, 8, 2);
        $somme = sum($tab);
        echo $somme;
    ?&gt;
    </code>
</pre>


<!------------------------------------------------------------------------------->


<h3>Exercice 3</h3>
<p class="txt">Créer une fonction qui vérifie le niveau de complexité d'un mot de passe</p>

<p class="cod">
    <?php 
    
        function complex_password($str)
        {
            $len = strlen($str);
            $compt = preg_match('/\d/', $str) + preg_match('/[A-Z]/', $str) + preg_match('/[a-z]/', $str);
            $res = $compt == 3 ? true : false;
            $res = $len < 8 ? false : true;
            
            return $res;
        }
        
        $resultat = complex_password("4e^TTrer");
        var_dump($resultat);
    ?>
</p>

<pre>
    <code>
    &lt;?php 
 
        function complex_password($str)
        {
            $len = strlen($str);
            $compt = preg_match('/\d/', $str) + preg_match('/[A-Z]/', $str) + preg_match('/[a-z]/', $str);
            $res = $compt == 3 ? true : false;
            $res = $len &lt; 8 ? false : true;

            return $res;
        }

        $resultat = complex_password("4e^TTrer");
        var_dump($resultat);
    ?&gt;
    </code>
</pre>


<?php Close(); ?>
