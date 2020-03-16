<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ma Soirée Télé</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="blue-grey lighten-4">
        
        <header class="row blue-grey lighten-2 z-depth-2">
            <h1 class="center-align col s8 offset-s2">Ma Soirée Télé</h1>
        </header>
        <main>
            <div id="inputdiv" class="lighten-2 z-depth-2 container row">
                <section class="col s8 offset-s2">
                    <article class="section">
                        <label class="flow-text" for="input_mv">Entrez votre recherche</label>
                        <input id="input_mv" name="input_mv" type="text">
                    </article>
                </section>
            </div>
            <div class="section">
                <input type="button" class="btn hide" id="retour" value="Nouvelle Recherche">
            </div>
            <section id="divResult" class="z-depth-4 blue-grey lighten-2">

            </section>
        </main>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="assets/js/index.js"></script>
</html>

