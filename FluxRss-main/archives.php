<!DOCTYPE html>
<html lang="fr">
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
    <nav style="">
        <div class="nav-wrapper red darken-4">
            <ul class="left hide-on-med-and-down" >
                <li><a style="font-weight:700;" class="grey-text text-darken-4 " href="accueil.php">Feed Principal</a></li>
                <li><a style="font-weight:700;" class="grey-text text-darken-4 " href="newRss">Nouveau Flux</a></li>
                <li class="active"><a style="font-weight:700;" class="white-text" href="archives.php">Archives</a></li>
                
            </ul>
        </div>
    </nav>
</div>

            <?php 
                 require_once 'functions.php';
                 
                 if (isset($_POST['btSup'])) {
                     supprimer();
                 }
                 selectArchive();
        ?>

<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>