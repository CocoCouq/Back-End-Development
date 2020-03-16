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

$requete = 'SELECT * FROM regions';
$result = $db->query($requete);
$region = $result->fetchAll(PDO::FETCH_OBJ);
$result->closeCursor();

echo json_encode($region);

?>
