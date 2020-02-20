
<?php $title = 'Serveurs & Form'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>

<h3>Resultat Upload</h3>

<p class="cod">
<?php 

$destination = '/Applications/MAMP/htdocs/WIP/upFile/images/nomImg.png';

$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

// On récupère l'information sur le MIME_TYPE
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["Fichier"]["tmp_name"]);
finfo_close($finfo);

// Si le type est dans le tab
if (in_array($mimetype, $aMimeTypes))
{
    /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
       déplacer et renommer le fichier */
     move_uploaded_file($_FILES['Fichier']['tmp_name'], $destination);
     echo 'Téléchargement réussi';
 
} 
else 
{
   // Le type n'est pas autorisé, donc ERREUR
 
   echo "Type de fichier non autorisé";    
   exit;
}

?>
    
</p>

<p class="cod">
    <?php var_dump($_FILES) ?>
</p>


<?php Close(); ?>