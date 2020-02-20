<?php $title = 'Boucles'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>

<!------------------------------------------------------------------------------->
    <h3>EXERCICE 1</h3>     
    <p class="txt">Nombres impaires de 0 à 150</p>
    
    <p class="cod">
    <?php
    
          $i = 0;
          while ($i++ <= 150)
          {
            if ($i % 2 != 0)
              echo "$i . ";
          }
          
      ?>
    </p>
    
    <pre>
        <code>
        $i = 0;
        while ($i++ <= 150)
        {
            if ($i % 2 != 0)
                echo "$i . ";
        }
        </code>
    </pre>


<!------------------------------------------------------------------------------->
    <h3>EXERCICE 2</h3>     
    <p class="txt">Ecrire 500 fois la phrases "Je suis une phrase"</p>
    
    
    <p class="cod">
    <?php
    
      $i = 0;
      while (++$i <= 500)
        echo "$i : Je suis une phrase";
      
    ?>
    </p>
    
    <pre>
        <code>
        $i = 0;
        while (++$i <= 500)
            echo "$i : Je suis une phrase";
        </code>
    </pre>

<!------------------------------------------------------------------------------->

   <h3>EXERCICE 3</h3>     
   <p class="txt">Tables de multiplication 12 x 12</p>
    
    
   <p>
       
    <table class="striped responsive-table">
        <tr class="black">
            <td class="blue-text center-align">X</td>

        <?php
          $i = -1;
          $j = -1;
          while (++$j <= 12)
            echo "<td class='white'>$j</td>";       // J'affiche la ligne du haut
        ?>

        </tr>

        <?php
          $j = -1;
          while (++$j <= 12)
          {
            $i = -1;  ?>                         <!-- Je remets i à -1 à chaque nouvelle entrée dans la boucle -->
            <tr>
                <td class='white'><?= $j ?></td>      <!-- J'affiche la ligne de gauche -->
                <?php
                while (++$i <= 12)
                {
                  $res = $i * $j;
                ?>
                <td><?= $res ?></td>
                <?php } ?>
            </tr>
         <?php } ?>
    </table>
   
    </p>
    <pre>
        <code>
        &lt;table class="striped responsive-table"&gt;
            &lt;tr class="black"&gt;
                &lt;td class="blue-text center-align"&gt;X&lt;/td&gt;

                &lt;?php
                $i = -1;
                $j = -1;
                while (++$j &lt;= 12)
                echo "&lt;td class='white'&gt;$j&lt;/td&gt;"; // J'affiche la ligne du haut
                ?&gt;

            &lt;/tr&gt;

                &lt;?php
                    $j = -1;
                    while (++$j &lt;= 12)
                    {
                        $i = -1; ?&gt; &lt;!-- Je remets i &agrave; -1 &agrave; chaque nouvelle entr&eacute;e dans la boucle --&gt;
                        &lt;tr&gt;
                        &lt;td class='white'&gt;&lt;?= $j ?&gt;&lt;/td&gt; &lt;!-- J'affiche la ligne de gauche --&gt;
                        &lt;?php
                        while (++$i &lt;= 12)
                        {
                            $res = $i * $j; ?&gt;
                &lt;td&gt;&lt;?= $res ?&gt;&lt;/td&gt;
                &lt;?php } ?&gt;
                
            &lt;/tr&gt;
            
            &lt;?php } ?&gt;
            
        &lt;/table&gt;
        </code>
    </pre>


<?php Close(); ?>
