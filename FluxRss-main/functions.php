<?php
            function suppFlux(){

                try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=feedparser;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }

            $idInfo = $_POST['idInfo'];            
            $reponse = $bdd->query('delete from fluxrss where id = '.$idInfo.'');

            $reponse->closeCursor(); // Termine le traitement de la requête

            header('location: accueil.php');

          

            }



            function selectArchive() {

            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=feedparser;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }

            
            $reponse = $bdd->query('SELECT id, lien, dateArticle, dateAjout, titre, titreRss FROM test order by titreRss');
            
            print     
            '<table class="table">
              <tr>
                  <th scope="col">Titre du flux rss</th>  
                  <th scope="col">Titre</th>
                  <th scope="col">Lien</th>
                  <th scope="col">DateAjout</th>
                  <th scope="col">DateArticle</th>  
                  <th scope="col">action</th>  
              </tr>'
              ;
            while ($req = $reponse->fetch()) {
                print '
             <tr>
                  <td>' .$req['titreRss'].'</td>
                  <td>' . mb_strimwidth($req['titre'], 0, 60) .'...</td>
                  
                  <td> <form action="'. $req['lien'].'" target="_blank"><button class="btn waves-effect waves-light red darken-4" type="submit" >Lien</button> </form></td>
                  <td> '.$req['dateArticle'].'</td>
                  <td> '.$req['dateAjout'].'</td>

                  <td> <form action="archives.php" method="post"><input type="hidden" name="idInfo" value="'.$req['id']. '" /><button class="btn waves-effect waves-light red darken-4" type="submit" name="btSup" ><i class="material-icons">delete</i></button></form></td>
              </tr> ';
 
                        }
        print '</table>';
         

            $reponse->closeCursor(); // Termine le traitement de la requête
            
            }

            function supprimer(){
                try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=feedparser;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            $idInfo = $_POST['idInfo'];
            
            $reponse = $bdd->query('delete from test where id = '.$idInfo.'');


             $reponse->closeCursor(); // Termine le traitement de la requête
            header('location: archives.php');

            }


            ?>
             <?php
            function insertbt() {

            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=feedparser;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            $lien=$_POST['lien'];
            $dateArticle = $_POST['dateArticle'];
            $titreRss = $_POST['titreRss'];
            $decoupe = explode(' ', $dateArticle);
            $date = $decoupe[1] ." " . $decoupe[2] . " " . $decoupe[3];
            
            $dateAjout = date('j M Y');
            $titre= $_POST['titre'];
            $reponse = $bdd->query('INSERT into test (lien,titreRss, dateArticle, dateAjout, titre) values("'.$lien.'","'.$titreRss.'", "'.$date.'", "'.$dateAjout.'","'.$titre.'" )');

             $reponse->closeCursor(); 




            }?>

            <?php
             function creationRss() {

                 try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=feedparser;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            
            $titre= $_POST['recherche'];
            $chaine= str_replace(' ', '+', $titre) ;
            
            
            $lienRss = "https://news.google.fr/news/feeds?q=%22".$chaine."&output=rss";
            
            $reponse = $bdd->query('INSERT into fluxrss (flux, titre) values("'.$lienRss.'", "'.$titre.'")');

            $reponse->closeCursor(); 


            }?>

            <?php

           $variable =[];
           $i=0;
            function getFreshContent() {
                global $variable, $i;
                try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=feedparser;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }

            
            $reponse = $bdd->query('SELECT id, titre ,flux FROM fluxrss');
                $html = "";
                $newsSource = array();
                    while ($req = $reponse->fetch()) {
                $test = array(
                    "id" => "".$req['id']."",
                    "title" => "".$req['titre']."",
                    "url" => "".$req['flux'].""
                
                );
                array_push($newsSource, $test);
                $variable = $newsSource;
                }
        
                foreach($newsSource as $source) {
                    $html .= '<h2 style="font-weight:400;">'.$source["title"].'</h2>';
                    $html .= '<form action="accueil.php" method="post"><input type="hidden" name="idInfo" value="'.$source["id"]. '" /><button class="btn waves-effect waves-light red darken-4" type="submit" name="btSupFlux" ><i class="material-icons">delete</i></button></form>';
                    $html .= getFeed($source["url"]);}
                   

                
                return $html;}

                function getFeed($url){
                    global $variable, $i;

                    $html = "";
                    $rss = simplexml_load_file($url);
                    $count = 0;
                    $html .= '<ul>';
                    
                    foreach($rss->channel->item as$item) {
                        $count++;
                        if($count > 10){
                            break;
                        }
                        $html .= '<li><a href="'.htmlspecialchars($item->link).'"target="_blank">'.htmlspecialchars($item->title).'</a></li>';
                        //$html .= '<p> '.htmlspecialchars($item->description).' </p>';
                        $html .= '<p> '.htmlspecialchars($item->pubDate).' </p>';
                        $html .= '
                        <form action="accueil.php" method="post">
                        <input type="hidden" name="lien" value="' .htmlspecialchars($item->link). '"target="_blank" />
                        <input type="hidden" name="dateArticle" value="' .htmlspecialchars($item->pubDate). '"target="_blank" />
                        <input type="hidden" name="titre" value="' .htmlspecialchars($item->title). '"target="_blank" />
                        <input type="hidden" name="titreRss" value="'.$variable[$i]['title']. '"target="_blank" />
                        <a class="waves-effect waves-light btn light-blue darken-2"><input class="white-text" type="submit" name="btlien" value="Envoyer" /></a>
                        </form>
                        </br>
                        <hr>
                        </br>';
                            }

                            
                    $html .= '</ul>';
                    $i = $i + 1;
                    return $html;
                }
            
?>