<?php

try 
{      
   $db = new PDO('mysql:host=localhost;dbname=regions;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} 
catch (Exception $e) 
{
   echo'Erreur : '.$e->getMessage().'<br>';
   echo'N° : '.$e->getCode(); 
   die('Fin du script');
}

$requete = "SELECT * FROM regions";
$result = $db->query($requete);
$regions = $result->fetchAll(PDO::FETCH_OBJ);
$result->closeCursor();

?>
<option value="0" disabled selected>Region</option>
<?php foreach ($regions as $row) { ?>
    <option value="<?= $row->reg_id ?>"><?= $row->reg_v_nom ?></option>
<?php } ?> 
