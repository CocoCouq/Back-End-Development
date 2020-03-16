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

$requete = 'SELECT * FROM departements WHERE dep_reg_id ='.$_GET['id'];
$result = $db->query($requete);
$dept = $result->fetchAll(PDO::FETCH_OBJ);
$result->closeCursor();

echo json_encode($dept);

?>
