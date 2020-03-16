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

$requete = "SELECT * FROM departements WHERE dep_reg_id = ".htmlspecialchars($_GET['id']);
$result = $db->query($requete);
$dept = $result->fetchAll(PDO::FETCH_OBJ);
$result->closeCursor();

?>
<option value="0" disabled selected>Departement</option>
<?php foreach ($dept as $row) { ?>
    <option value="<?= $row->dep_id ?>"><?= $row->dep_nom ?></option>
<?php } ?> 
