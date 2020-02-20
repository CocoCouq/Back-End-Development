<?php $title = 'TestDB'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>


    <h3>Exercice 1</h3>
    <p class="txt">Test de connexion à la base de donnée</p>
    
    <p>
    <?php
    
    try
    {
      $db = new PDO('mysql:host=localhost;charset=utf8;dbname=Jarditou', 'root', 'root');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    catch (Exception $e)
    {
      echo"Erreur : ".$e->getCode();
      die("Fin du script");
    }


    $requete = "SELECT * FROM produits WHERE pro_id = 7";
    $result = $db->query($requete);
    $produit = $result->fetch();
   
    ?>  
    </p>
    
    <p class="cod">
        
    <?php echo $produit->pro_id; ?>
    <br>
    <?php echo $produit->pro_cat_id; ?>
    <br>
    <?php echo $produit->pro_ref; ?>
    <br>
    <?php echo $produit->pro_libelle; ?>
    <br>
    <?php echo $produit->pro_description; ?>
    <br>
    <?php echo $produit->pro_prix; ?>
    <br>
    <?php echo $produit->pro_stock; ?>
    <br>
    <?php echo $produit->pro_couleur; ?>
    <br>
    <?php echo $produit->pro_photo; ?>
    <br>
    <?php echo $produit->pro_d_ajout; ?>
    <br>
    <?php echo $produit->pro_d_modif; ?>
    <br>
    <?php echo $produit->pro_bloque; ?>
    
    </p>
    
    <pre>
        <code>
        &lt;?php
 
        try
        {
            $db = new PDO('mysql:host=localhost;charset=utf8;dbname=Jarditou', 'root', 'root');
            $db-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db-&gt;setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        catch (Exception $e)
        {
            echo"Erreur : ".$e-&gt;getCode();
            die("Fin du script");
        }


        $requete = "SELECT * FROM produits WHERE pro_id = 7";
        $result = $db-&gt;query($requete);
        $produit = $result-&gt;fetch();
 
        ?&gt;

        <hr>
        
        &lt;?php echo $produit-&gt;pro_id; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_cat_id; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_ref; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_libelle; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_description; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_prix; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_stock; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_couleur; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_photo; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_d_ajout; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_d_modif; ?&gt;
        &lt;br&gt;
        &lt;?php echo $produit-&gt;pro_bloque; ?&gt;
        </code>
    </pre>


<?php Close(); ?>
