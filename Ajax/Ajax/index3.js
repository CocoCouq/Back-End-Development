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
	