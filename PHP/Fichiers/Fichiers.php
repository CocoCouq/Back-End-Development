<?php $title = 'Fichiers'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>


    <h3>Exercice 1</h3>
    <p class="txt">Inserer les liens du fichier 'liens.txt'</p>

    <p class="cod">
    <?php
    
        $file = file("liens.txt");
        foreach ($file as $line)
            echo "<a href=\"$line\">".$line."</a><br>";
        
    ?>
    </p>

<!-- Version 2 -->
    <p class="cod">
    <?php
    
        $fp = fopen("liens.txt", "r");
        while (!feof($fp))
        {
            $line = fgets($fp, 300);
            echo "<a href=\"$line\">".$line."</a><br>";
        }
        fclose($fp);
        
    ?>
    </p>

    <pre>
        <code>
        $file = file("liens.txt");
        foreach ($file as $line)
            echo "&lt;a href=\"$line\"&gt;".$line."&lt;/a&gt;&lt;br&gt;";

        <hr>
        
        $fp = fopen("liens.txt", "r");
        while (!feof($fp))
        {
            $line = fgets($fp, 300);
            echo "&lt;a href=\"$line\"&gt;".$line."&lt;/a&gt;&lt;br&gt;";
        }
        fclose($fp); 
        </code>
    </pre>


<!------------------------------------------------------------------------------->


    <h3>Exercice 2</h3>
    <p class="txt">Recupérer les informations du fichier CSV au lien 'http://bienvu.net/misc/customers.csv'</p>

    
    <p>

    <table class="striped responsive-table">
        <thead class="black white-text">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Surname</th>
                <th scope="col">Firstname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $i = 0;
            $file = file('http://bienvu.net/misc/customers.csv');
            foreach ($file as $key => $line ) // Ouverture
            {
                $tab[$i] = explode(",", $line);
        ?>

            <tr>
                <th scope="row"><?php echo ($key + 1) ?></th>
                <td><?php echo $tab[$i][0]; ?></td>
                <td><?php echo $tab[$i][1]; ?></td>
                <td><?php echo $tab[$i][2]; ?></td>
                <td><?php echo $tab[$i][3]; ?></td>
                <td><?php echo $tab[$i][4]; ?></td>
                <td><?php echo $tab[$i][5]; ?></td>
            </tr>

        <?php
                $i++;
            } // Fermeture
        ?>

        </tbody>
    </table>

    </p>
    
    <pre>
        <code>
        &lt;table class="striped responsive-table"&gt;
            &lt;thead class="black white-text"&gt;
                &lt;tr&gt;
                    &lt;th scope="col"&gt;#&lt;/th&gt;
                    &lt;th scope="col"&gt;Surname&lt;/th&gt;
                    &lt;th scope="col"&gt;Firstname&lt;/th&gt;
                    &lt;th scope="col"&gt;Email&lt;/th&gt;
                    &lt;th scope="col"&gt;Phone&lt;/th&gt;
                    &lt;th scope="col"&gt;City&lt;/th&gt;
                    &lt;th scope="col"&gt;State&lt;/th&gt;
                &lt;/tr&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;

                &lt;?php
                $i = 0;
                $file = file('http://bienvu.net/misc/customers.csv');
                foreach ($file as $key =&gt; $line ) 
                { 
                    $tab[$i] = explode(",", $line);
                ?&gt;

                &lt;tr&gt;
                    &lt;th scope="row"&gt;&lt;?php echo ($key + 1) ?&gt;&lt;/th&gt;
                    &lt;td&gt;&lt;?php echo $tab[$i][0]; ?&gt;&lt;/td&gt;
                    &lt;td&gt;&lt;?php echo $tab[$i][1]; ?&gt;&lt;/td&gt;
                    &lt;td&gt;&lt;?php echo $tab[$i][2]; ?&gt;&lt;/td&gt;
                    &lt;td&gt;&lt;?php echo $tab[$i][3]; ?&gt;&lt;/td&gt;
                    &lt;td&gt;&lt;?php echo $tab[$i][4]; ?&gt;&lt;/td&gt;
                    &lt;td&gt;&lt;?php echo $tab[$i][5]; ?&gt;&lt;/td&gt;
                &lt;/tr&gt;

                &lt;?php
                    $i++;
                }
                ?&gt;

            &lt;/tbody&gt;
        &lt;/table&gt;
        </code>
    </pre>
    
    
<?php Close(); ?>
