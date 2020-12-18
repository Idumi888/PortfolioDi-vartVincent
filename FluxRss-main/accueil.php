<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <style>
        body { font-size: 130%; }
        a:visited { color: #a3bcd1; }
    </style>
</head>
<body>
<div>
    <nav>
        <div class="nav-wrapper red darken-2">
            <ul class="left hide-on-med-and-down">
                <li class="active text-bold"><a style="font-weight:700;" class="white-text text-bold" href="accueil.php">Feed Principal</a></li>
                <li><a style="font-weight:700;" class="grey-text text-darken-4 text-bold" href="newRss">Nouveau Flux</a></li>
                <li><a style="font-weight:700;" class="grey-text text-darken-4 text-bold " href="archives.php">Archives</a></li>
                
            </ul>
        </div>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col s12">
            
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <?php
            require_once "functions.php";

            if (isset($_POST['btlien'])) {
                insertbt();
            }
            if (isset($_POST['btSupFlux'])) {
                suppFlux();
            
            }

           print getFreshContent();
            
            
            ?>
            
            
        </div>
    </div>
</div>




<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>