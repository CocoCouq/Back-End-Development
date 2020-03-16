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
