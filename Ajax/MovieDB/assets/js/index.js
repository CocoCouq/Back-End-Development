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
        
        // Recupération extérieur de la 
        function getRequest(handleData) { 
                $.get({
                url: `http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=${input_text}&language=fr&append_to_response=translations`, 
                dataType: "json",
                success:function(data){
                    handleData(data);
                }
            });
        };
           
        getRequest(function(output){
            
            var pages_ttl = output.total_pages;
            var k = 0;
            while(k < pages_ttl || k > 9){
                $.get({
                    url: `http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=${input_text}&language=fr&append_to_response=translations&page=${++k}`, 
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
                            date = `${tabMois[mth]} ${year}`;

                            // IMAGE
                            var image = new Image(500, 800);
                            image.src = `http://image.tmdb.org/t/p/w185${pict}`;
                            image.alt = 'Pochette';

                            // Verification que le film possede une pochette et une description
                            if (pict !== null && desc !== '')
                            {
                                // Creation de la card
                                $('#divResult').append(`<div id="card${i}${k}"></div>`);

                                // Insertion de l'image, titre, date et description 
                                $(`#card${i}${k}`).append(image);
                                $(`#card${i}${k}`).append(`<h2>${titre}</h2>`);
                                $(`#card${i}${k}`).append(`<h3>${date}</h3>`);
                                $(`#card${i}${k}`).append(`<blockquote>${desc}</blockquote>`);

                                // Votes
                                $(`#card${i}${k}`).append(`<div id="pop${i}${k}"></div>`);
                                $(`#card${i}${k}`).append(`<h4>Votes : ${vot_ct}</h4>`);
                                while(nbEtoiles-- > 0)
                                {
                                    $(`#pop${i}${k}`).append('<i class="material-icons yellow-text">star</i>');
                                }

                                // Class Materialize
                                $(`#card${i}${k}`).addClass('card-panel row blue-grey lighten-3');
                                $(`#pop${i}${k}`).addClass('col s8 center-align');
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