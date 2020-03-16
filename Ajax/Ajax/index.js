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
		