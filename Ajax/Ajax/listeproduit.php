<?php

try 
{      
   $db = new PDO('mysql:host=localhost;dbname=record;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} 
catch (Exception $e) 
{
   echo'Erreur : '.$e->getMessage().'<br>';
   echo'N° : '.$e->getCode(); 
   die('Fin du script');
}

$requete = "SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id";
$result = $db->query($requete);
$cd = $result->fetchAll(PDO::FETCH_OBJ);
$result->closeCursor();

echo json_encode($cd);

?>