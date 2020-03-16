<?php $title = 'Ajax (Code)'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>

<!------------------------------------------------------------------------------->
    <h3>Table Disc (Velvet Record)</h3>  
    <p class="txt">Afficher les informations des albums</p>

    <pre>
        <code> 
    /***** JAVASCRIPT *****/ 
            
            
        $(document).ready(function() {
    
            // Chargement du tableau vide
            $("#div1").load("partiel1.php");


            $("#btn1").click(function() { 

                // Chargement des entêtes
                $('#th_id').html('ID');
                $('#th_title').html('Titre');
                $('#th_artist').html('Artiste');
                $('#th_prix').html('Prix');
                $('#th_genre').html('Genre');
                $('#th_label').html('Label');
                $('#table').removeClass('hide');
                // Recupération des informations depuis la page listeproduit.php
                $.post({
                    url: "listeproduit.php", 
                    dataType: "json",
                    success: function(data) 
                    {	
                        // Pour chaque valeur retourné
                        $.each(data, function(key, val) {
                            // Recupération des informations
                            var titre = val.disc_title;
                            var artist = val.artist_name;
                            var id = val.disc_id;
                            var price = val.disc_price;
                            var genre = val.disc_genre;
                            var label = val.disc_label;
                            // Ecriture des informations dans le tableau de partiel1.php
                            $('#id'+id).html(id);
                            $('#titre'+id).html(titre);
                            $('#artist'+id).html(artist);
                            $('#prix'+id).html(price);
                            $('#genre'+id).html(genre);
                            $('#label'+id).html(label);
                        });
                    }
                });
            });

        });
        </code>
    </pre> 
    
    <pre>
        <code> 
    /***** PARTIEL1.PHP *****/    
    
    
        &lt;?php 
            // Connexion a la base de donnée
            try 
            { 
                $db = new PDO('mysql:host=localhost;dbname=record;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_WARNING));
            } 
            catch (Exception $e) 
            {
                echo'Erreur : '.$e-&gt;getMessage().'&lt;br&gt;';
                echo'N&deg; : '.$e-&gt;getCode(); 
                die('Fin du script');
            }
            
            // Recupération du nombre de disc
            $requete = "SELECT * FROM disc";
            $result = $db-&gt;query($requete);
            $tab = $result-&gt;fetchAll(PDO::FETCH_OBJ);
            $result-&gt;closeCursor();
            $count = count($tab);
       ?&gt;
       
        &lt;!-- Création du tableau d'affichage : avec classe hide --&gt;
        &lt;table id="table" class="responsive-table centered hide highlight blue-grey lighten-3"&gt;
            &lt;thead&gt;
                &lt;th id="th_id"&gt;&lt;/th&gt;
                &lt;th id="th_title"&gt;&lt;/th&gt;
                &lt;th id="th_artist"&gt;&lt;/th&gt;
                &lt;th id="th_prix"&gt;&lt;/th&gt;
                &lt;th id="th_genre"&gt;&lt;/th&gt;
                &lt;th id="th_label"&gt;&lt;/th&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;
                &lt;?php 
                    // Création du nombre de tr nécéssaires
                    while(--$count &gt; 0) { ?&gt;

                        &lt;tr&gt;
                            &lt;td id="id&lt;?=$count?&gt;"&gt;&lt;/td&gt;
                            &lt;td id="titre&lt;?=$count?&gt;"&gt;&lt;/td&gt;
                            &lt;td id="artist&lt;?=$count?&gt;"&gt;&lt;/td&gt;
                            &lt;td id="prix&lt;?=$count?&gt;"&gt;&lt;/td&gt;
                            &lt;td id="genre&lt;?=$count?&gt;"&gt;&lt;/td&gt;
                            &lt;td id="label&lt;?=$count?&gt;"&gt;&lt;/td&gt;
                        &lt;/tr&gt;

                &lt;?php } ?&gt;
            &lt;/tbody&gt;
        &lt;/table&gt;
  
        </code>
    </pre>
    
    
<!------------------------------------------------------------------------------->
    <h3>Régions/Departement PHP</h3>  
    <p class="txt">Créer un select dynamique</p>

    <pre>
        <code> 
    /***** HTML *****/ 
    
    
        &lt;html&gt;
            &lt;head&gt;
                &lt;title&gt;Exercice 2&lt;/title&gt;
                &lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"&gt;
            &lt;/head&gt;
            &lt;body&gt;
                &lt;h1 class="center-align"&gt;Selection des regions&lt;/h1&gt;
                &lt;main class="row"&gt;
                    &lt;div class="input-field col s4 offset-s1"&gt;
                        &lt;label for="region"&gt;R&eacute;gions
                            &lt;select class="browser-default" name="region" id="region"&gt;
                                &lt;option value="0"&gt;Choisissez&lt;/option&gt;
                            &lt;/select&gt;
                        &lt;/label&gt;
                    &lt;/div&gt;
                    &lt;div class="input-field col s4 offset-s1"&gt;
                        &lt;label for="dept"&gt;D&eacute;partements
                            &lt;select class="browser-default" id="dept" name="dept"&gt;
                                &lt;option value="0"&gt;Choisissez&lt;/option&gt;
                            &lt;/select&gt;
                        &lt;/label&gt;
                    &lt;/div&gt;
                &lt;/main&gt;
            &lt;/body&gt;
            &lt;script src="https://code.jquery.com/jquery-3.4.1.min.js"&gt;&lt;/script&gt;
            &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"&gt;&lt;/script&gt;
            &lt;script src="index2.js"&gt;&lt;/script&gt;
        &lt;/html&gt;
        </code>
    </pre> 
    
    <pre>
        <code> 
    /***** LISTE OPTIONS (PHP) *****/    
        
    
        &lt;?php
            try 
            { 
                $db = new PDO('mysql:host=localhost;dbname=regions;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_WARNING));
            } 
            catch (Exception $e) 
            {
                echo'Erreur : '.$e-&gt;getMessage().'&lt;br&gt;';
                echo'N&deg; : '.$e-&gt;getCode(); 
                die('Fin du script');
            }

            $requete = "SELECT * FROM regions";
            $result = $db-&gt;query($requete);
            $regions = $result-&gt;fetchAll(PDO::FETCH_OBJ);
            $result-&gt;closeCursor();
        ?&gt;
        
        &lt;option value="0" disabled selected&gt;Region&lt;/option&gt;
        &lt;?php foreach ($regions as $row) { ?&gt;
            &lt;option value="&lt;?= $row-&gt;reg_id ?&gt;"&gt;&lt;?= $row-&gt;reg_v_nom ?&gt;&lt;/option&gt;
        &lt;?php } ?&gt;
        
        <hr>
        
        &lt;?php
            try 
            { 
                $db = new PDO('mysql:host=localhost;dbname=regions;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_WARNING));
            } 
            catch (Exception $e) 
            {
                echo'Erreur : '.$e-&gt;getMessage().'&lt;br&gt;';
                echo'N&deg; : '.$e-&gt;getCode(); 
                die('Fin du script');
            }

            $requete = "SELECT * FROM departements WHERE dep_reg_id = ".htmlspecialchars($_GET['id']);
            $result = $db-&gt;query($requete);
            $dept = $result-&gt;fetchAll(PDO::FETCH_OBJ);
            $result-&gt;closeCursor();
        ?&gt;
        
        &lt;option value="0" disabled selected&gt;Departement&lt;/option&gt;
        &lt;?php foreach ($dept as $row) { ?&gt;
            &lt;option value="&lt;?= $row-&gt;dep_id ?&gt;"&gt;&lt;?= $row-&gt;dep_nom ?&gt;&lt;/option&gt;
        &lt;?php } ?&gt;
        
        </code>
    </pre>
     
    <pre>
        <code> 
    /***** JAVASCRIPT *****/    
    
    
        $(document).ready(function(){
            // Select materialize
            $('select').formSelect();


            // chargement du tableau region
            $("#region").load("listeoption1.php");

            $("#region").change(function() {
                var reg_id = $("#region").val();
                $("#dept").load(`listeoption2.php?id=${reg_id}`);
            });
        });
        </code>
    </pre>

    
<!------------------------------------------------------------------------------->
    <h3>Régions/Departement JSON</h3>  
    <p class="txt">Créer un select dynamique</p>

    <pre>
        <code> 
    /***** HTML *****/ 
    
    
        &lt;html&gt;
            &lt;head&gt;
                &lt;title&gt;Exercice 3&lt;/title&gt;
                &lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"&gt;
            &lt;/head&gt;
            &lt;body&gt;
                &lt;h1 class="center-align"&gt;Selection des regions JSON&lt;/h1&gt;
                &lt;main class="row"&gt;
                    &lt;div class="input-field col s4 offset-s1"&gt;
                        &lt;label for="region"&gt;R&eacute;gions
                            &lt;select class="browser-default" name="region" id="region"&gt;
                            &lt;/select&gt;
                        &lt;/label&gt;
                    &lt;/div&gt;
                    &lt;div class="input-field col s4 offset-s1"&gt;
                        &lt;label for="dept"&gt;D&eacute;partements
                            &lt;select class="browser-default" id="dept" name="dept"&gt;
                            &lt;/select&gt;
                        &lt;/label&gt;
                    &lt;/div&gt;
                &lt;/main&gt;
            &lt;/body&gt;
            &lt;script src="https://code.jquery.com/jquery-3.4.1.min.js"&gt;&lt;/script&gt;
            &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"&gt;&lt;/script&gt;
            &lt;script src="index3.js"&gt;&lt;/script&gt;
        &lt;/html&gt;
        </code>
    </pre> 
    
    <pre>
        <code> 
    /***** LISTE OPTIONS (PHP) *****/    
        
    
        &lt;?php

            try 
            { 
                $db = new PDO('mysql:host=localhost;dbname=regions;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_WARNING));
            } 
            catch (Exception $e) 
            {
                echo'Erreur : '.$e-&gt;getMessage().'&lt;br&gt;';
                echo'N&deg; : '.$e-&gt;getCode(); 
                die('Fin du script');
            }

            $requete = 'SELECT * FROM regions';
            $result = $db-&gt;query($requete);
            $region = $result-&gt;fetchAll(PDO::FETCH_OBJ);
            $result-&gt;closeCursor();

            echo json_encode($region);

        ?&gt;
        
        <hr>
        
        &lt;?php

            try 
            { 
                $db = new PDO('mysql:host=localhost;dbname=regions;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_WARNING));
            } 
            catch (Exception $e) 
            {
                echo'Erreur : '.$e-&gt;getMessage().'&lt;br&gt;';
                echo'N&deg; : '.$e-&gt;getCode(); 
                die('Fin du script');
            }

            $requete = 'SELECT * FROM departements WHERE dep_reg_id ='.$_GET['id'];
            $result = $db-&gt;query($requete);
            $dept = $result-&gt;fetchAll(PDO::FETCH_OBJ);
            $result-&gt;closeCursor();

            echo json_encode($dept);

        ?&gt;
        
        </code>
    </pre>
     
    <pre>
        <code> 
    /***** JAVASCRIPT *****/    
    
    
        $(document).ready(function() {
            // Select materialize
            $('select').formSelect();

            // Création de l'option de valeur 0
            $('#region').html(new Option('Choisissez', '0', false));

            // Recupération du fichier encodé en JSON
            $.get({
                url: "JSON_reg.php", 
                dataType: "json",
                success: function(data) 
                {		
                   $.each(data, function(key, val) {
                        var region_id = val.reg_id;
                        var region_nom = val.reg_v_nom;

                        $('#region').append(new Option(region_nom, region_id));
                    });
                }
            });

            // Au changement de région
            $("#region").change(function() {

                $('#dept').html(new Option('Choisissez', '0'));

                // Récupération de la valeur de la région 
                var reg_id = $("#region").val();

                $.get({
                    url: `JSON_dep.php?id=${reg_id}`, 
                    dataType: "json",
                    success: function(data) 
                    {		
                       $.each(data, function(key, val) {
                            var dept_id = val.dep_id;
                            var dept_nom = val.dep_nom;

                            $('#dept').append(new Option(dept_nom, dept_id));
                        });
                    }
                });
            });
        });

        </code>
    </pre>
    


<?php Close(); ?>