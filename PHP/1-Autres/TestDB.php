<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test DB</title>
  </head>
  <body>


    <h1>Exercice 1</h1>
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
    //while ($produit = $result->fetch())
    //{
    //  echo $produit->pro_id." – ".$produit->pro_libelle. "<br>";
    //}
    ?>
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

    <hr><br>
    <h1>Exercice 2</h1>
    <?php
      $requete = "SELECT * FROM produits WHERE pro_id=".$_GET['pro_id'];
      echo $requete;
    ?>

    <?php
    // $pro_id = $_GET["pro_id"]; // finir l'url par '?pro_id=7'
    // $requete = "SELECT * FROM produits WHERE pro_id=".$pro_id;
    // $result = $db->query($requete);
    // $produit = $result->fetch();
    ?>

    <?php //echo $produit->pro_libelle; ?> référence <?php //echo $produit->pro_ref; ?>
    <br>
    <?php //echo $produit->pro_description; ?>
    <br>
    <?php //echo $produit->pro_prix; ?>


  </body>
</html>
