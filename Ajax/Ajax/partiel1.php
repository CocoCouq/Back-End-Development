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

    $requete = "SELECT * FROM disc";
    $result = $db->query($requete);
    $tab = $result->fetchAll(PDO::FETCH_OBJ);
    $result->closeCursor();
    $count = count($tab);

?>

        <table id="table" class="responsive-table centered hide highlight blue-grey lighten-3">
            <thead>
                <th id="th_id"></th>
                <th id="th_title"></th>
                <th id="th_artist"></th>
                <th id="th_prix"></th>
                <th id="th_genre"></th>
                <th id="th_label"></th>
            </thead>
            <tbody>
                <?php 
                while(--$count > 0) { ?>
                
                <tr>
                    <td id="id<?=$count?>"></td>
                    <td id="titre<?=$count?>"></td>
                    <td id="artist<?=$count?>"></td>
                    <td id="prix<?=$count?>"></td>
                    <td id="genre<?=$count?>"></td>
                    <td id="label<?=$count?>"></td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>