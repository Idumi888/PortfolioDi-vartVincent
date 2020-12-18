<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <style>
        body { font-size: 170%; }
        a:visited { color: #a3bcd1; }
    </style>
</head>
<body>
<div>
    <nav>
        <div class="nav-wrapper red darken-4">
            <ul class="left hide-on-med-and-down">
                <li><a style="font-weight:700;" class="grey-text text-darken-4 text-bold" href="accueil.php">Feed Principal</a></li>
                <li class="active"><a style="font-weight:700;" class="white-text" href="newRss">Nouveau Flux</a></li>
                <li><a style="font-weight:700;" class="grey-text text-darken-4 text-bold" href="archives.php">Archives</a></li>
                
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col s10 center">
        <br/>
            <?php
            require_once "functions.php";

           
            
            if (isset($_POST['btNewsRss'])) {
                creationRss();
            }
            ?>

            <form method="post" action="newRss.php">
            <div class="input-field col s12">
                <i class="material-icons prefix">input</i>
                <input type="text" name="recherche" id="recherche">
                <label for="recherche"></labe>
            </div>  
                <button class="btn waves-effect waves-light" name="btNewsRss" id="btNewsRss">Créer
                <i class="material-icons left">add</i>
                </button>
            </form>
    </div>
    </div>
</div>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>