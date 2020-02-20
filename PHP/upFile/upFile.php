<?php $title = 'Serveurs & Form'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>
<link href="style.css" rel="stylesheet">

<h3>Execice 1</h3>
<p class="txt">Télécharger un fichier</p>
    
<form class="row" action="script.php" method="post" enctype="multipart/form-data">
    <div class="file-field input-field col s8 offset-s2">
        <div class="btn">
            <label id="labelInput" for="idInputFile">Fichier</label>
            <input type="file" id="idInputFile" name="Fichier">
        </div>
        <div class="file-path-wrapper">
            <label for="idText">
                <input class="file-path validate" type="text" id="idText" name="Text">
            </label>
        </div>
    </div>
    <div class="col s4 offset-s8">
        <label for="idSend">
            <input class="btn" type="submit" id="idSend" value="Envoyer">
        </label>
    </div>
</form>


<pre>
    <code>
    &lt;form class="row" action="script.php" method="post" enctype="multipart/form-data"&gt;
        &lt;div class="file-field input-field col s8 offset-s2"&gt;
            &lt;div class="btn"&gt;
                &lt;label id="labelInput" for="idInputFile"&gt;Fichier&lt;/label&gt;
                &lt;input type="file" id="idInputFile" name="Fichier"&gt;
            &lt;/div&gt;
            &lt;div class="file-path-wrapper"&gt;
                &lt;label for="idText"&gt;
                &lt;input class="file-path validate" type="text" id="idText" name="Text"&gt;
            &lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="col s4 offset-s8"&gt;
            &lt;label for="idSend"&gt;
            &lt;input class="btn" type="submit" id="idSend" value="Envoyer"&gt;
            &lt;/label&gt;
        &lt;/div&gt;
    &lt;/form&gt;
    
    <hr>
    
    &lt;?php 

        $destination = '/Applications/MAMP/htdocs/WIP/upFile/images/nomImg.png';

        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

        // On r&eacute;cup&egrave;re l'information sur le MIME_TYPE
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["Fichier"]["tmp_name"]);
        finfo_close($finfo);

        // Si le type est dans le tab
        if (in_array($mimetype, $aMimeTypes))
        {
            /* Le type est parmi ceux autoris&eacute;s, donc OK, on va pouvoir 
            d&eacute;placer et renommer le fichier */
            move_uploaded_file($_FILES['Fichier']['tmp_name'], $destination);
            echo 'T&eacute;l&eacute;chargement r&eacute;ussi';

        } 
        else 
        {
            // Le type n'est pas autoris&eacute;, donc ERREUR

            echo "Type de fichier non autoris&eacute;"; 
            exit;
        }

    ?&gt;
    </code>
</pre>

<?php Close(); ?>