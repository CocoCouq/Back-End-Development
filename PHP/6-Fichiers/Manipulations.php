<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <title>Fichers - PHP</title>
    </head>
    <body>
        <h1>Exercice 1</h1>
<!--
Exercice 1
-->

    <?php
        $file = file("liens.txt");
        foreach ($file as $line)
            echo "<a href=\"$line\">".$line."</a><br>";
    ?>

<!-- Version 2 --><br>

    <?php
        $fp = fopen("liens.txt", "r");
        while (!feof($fp))
        {
            $line = fgets($fp, 300);
            echo "<a href=\"$line\">".$line."</a><br>";
        }
        fclose($fp);
    ?>

<hr>
<h1>Exercice 2</h1>
<!--
Exercice 2
 -->

    <table class="table table-striped">
        <thead class="thead-dark">
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
