<?php $title = 'Movie DB (Code)'; ?>
<?php include '../../MyLocalHost/assets/config/config.php'; ?>

<!------------------------------------------------------------------------------->
    <h3>Ma Soirée Télé</h3>  
    <p class="txt">Utiliser l'API Movie DataBase</p>

    <pre>
        <code> 
    /***** HTML *****/ 
    
    
        &lt;!DOCTYPE html&gt;
        &lt;html lang="fr" dir="ltr"&gt;
            &lt;head&gt;
                &lt;meta charset="utf-8"&gt;
                &lt;title&gt;Ma Soir&eacute;e T&eacute;l&eacute;&lt;/title&gt;
                &lt;link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"&gt;
                &lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"&gt;
                &lt;link href="assets/css/style.css" rel="stylesheet" type="text/css"/&gt;
            &lt;/head&gt;
            &lt;body class="blue-grey lighten-4"&gt;

                &lt;header class="row blue-grey lighten-2 z-depth-2"&gt;
                    &lt;h1 class="center-align col s8 offset-s2"&gt;Ma Soir&eacute;e T&eacute;l&eacute;&lt;/h1&gt;
                &lt;/header&gt;
                &lt;main&gt;
                    &lt;div id="inputdiv" class="lighten-2 z-depth-2 container row"&gt;
                        &lt;section class="col s8 offset-s2"&gt;
                            &lt;article class="section"&gt;
                                &lt;label class="flow-text" for="input_mv"&gt;Entrez votre recherche&lt;/label&gt;
                                &lt;input id="input_mv" name="input_mv" type="text"&gt;
                            &lt;/article&gt;
                        &lt;/section&gt;
                    &lt;/div&gt;
                    &lt;div class="section"&gt;
                        &lt;input type="button" class="btn hide" id="retour" value="Nouvelle Recherche"&gt;
                    &lt;/div&gt;
                    &lt;section id="divResult" class="z-depth-4 blue-grey lighten-2"&gt;

                    &lt;/section&gt;
                &lt;/main&gt;
            &lt;/body&gt;
            &lt;script src="https://code.jquery.com/jquery-3.3.1.min.js"&gt;&lt;/script&gt;
            &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"&gt;&lt;/script&gt;
            &lt;script src="assets/js/index.js"&gt;&lt;/script&gt;
        &lt;/html&gt;
        </code>
    </pre> 
    
    <pre>
        <code> 
    /***** JAVASCRIPT *****/    
        
    
        var tabMois = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];

        $(document).ready(function() {

            // On change : pour Activer la touche entrer
            $('#input_mv').change(function (event){

                // bouton nouvelle recherche et masquage du input
                $('#inputdiv').addClass('hide');
                $('#retour').removeClass('hide');
                $('#retour').click(function(event){
                    window.location.href='index.php';
                });

                var i = 0;
                // Valeur de recherche
                var input_text = $('#input_mv').val();
                // Vidage des resultats 
                $('#divResult').html('');

                // Recup&eacute;ration ext&eacute;rieur de la 
                function getRequest(handleData) { 
                    $.get({
                        url: &#96;http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&amp;query=${input_text}&amp;language=fr&amp;append_to_response=translations&#96;, 
                        dataType: "json",
                        success:function(data)
                        {
                            handleData(data);
                        }
                    });
                };

                getRequest(function(output){

                    var pages_ttl = output.total_pages;
                    var k = 0;
                    while(k &lt; pages_ttl || k &gt; 9){
                        $.get({
                            url: &#96;http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&amp;query=${input_text}&amp;language=fr&amp;append_to_response=translations&amp;page=${++k}&#96;, 
                            dataType: "json",
                            success: function(data) 
                            {
                                $.each(data.results, function(key, val) {
                                    var pict = val.poster_path;
                                    var desc = val.overview;
                                    var titre = val.title;
                                    var vot_ct = val.vote_count;
                                    var date = val.release_date;
                                    var nbEtoiles = val.vote_average;
                                    nbEtoiles = Math.round(nbEtoiles);

                                    // DATE 
                                    var tabDate = date.split('-', 3);
                                    var year = tabDate[0];
                                    var mth = tabDate[1] - 1;
                                    date = &#96;${tabMois[mth]} ${year}&#96;;

                                    // IMAGE
                                    var image = new Image(500, 800);
                                    image.src = &#96;http://image.tmdb.org/t/p/w185${pict}&#96;;
                                    image.alt = 'Pochette';

                                    // Verification que le film possede une pochette et une description
                                    if (pict !== null &amp;&amp; desc !== '')
                                    {
                                        // Creation de la card
                                        $('#divResult').append(&#96;&lt;div id="card${i}${k}"&gt;&lt;/div&gt;&#96;);

                                        // Insertion de l'image, titre, date et description 
                                        $(&#96;#card${i}${k}&#96;).append(image);
                                        $(&#96;#card${i}${k}&#96;).append(&#96;&lt;h2&gt;${titre}&lt;/h2&gt;&#96;);
                                        $(&#96;#card${i}${k}&#96;).append(&#96;&lt;h3&gt;${date}&lt;/h3&gt;&#96;);
                                        $(&#96;#card${i}${k}&#96;).append(&#96;&lt;blockquote&gt;${desc}&lt;/blockquote&gt;&#96;);

                                        // Votes
                                        $(&#96;#card${i}${k}&#96;).append(&#96;&lt;div id="pop${i}${k}"&gt;&lt;/div&gt;&#96;);
                                        $(&#96;#card${i}${k}&#96;).append(&#96;&lt;h4&gt;Votes : ${vot_ct}&lt;/h4&gt;&#96;);
                                        while(nbEtoiles-- &gt; 0)
                                        {
                                            $(&#96;#pop${i}${k}&#96;).append('&lt;i class="material-icons yellow-text"&gt;star&lt;/i&gt;');
                                        }

                                        // Class Materialize
                                        $(&#96;#card${i}${k}&#96;).addClass('card-panel row blue-grey lighten-3');
                                        $(&#96;#pop${i}${k}&#96;).addClass('col s8 center-align');
                                        i++;
                                    }
                                });

                                // Esthetique global
                                $('img').addClass('section col s4 responsive-img');
                                $('h2').addClass('col s6 offset-s1 center-align z-depth-2 blue-grey lighten-4');
                                $('h2').css('font-family', 'Marker Felt');
                                $('h2').css('font-size', '4vw');
                                $('h3').addClass('col s8 flow-text center-align');
                                $('blockquote').addClass('col s8');
                                $('h4').addClass('col s8 center-align');
                                $('h4').css('font-size', '1vw');

                            }

                        });

                    }

                });

            });

        });

        </code>
    </pre>


<?php Close(); ?>
