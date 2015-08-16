<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 21/09/2014
 * Time: 23:05
 */



if(isset($_GET['id'])){
    $id = $_GET['id'];

    $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
    $query = 'SELECT * FROM recette WHERE id='.$id;
    $result = $db->query($query);
    $data = $result->fetch();
    ?>
        <?php

        $photo = $data['photo'];
        $title = $data['title'];
        $text = $data['text'];
        $ingredient = json_decode($data['ingredient']);
        $nb_personnes = $data['nb_personnes'];
        $date = strtotime($data['date']);
        $day = date('j',$date);
        $french_month = french_month($date);
        $year= date('Y' , $date);
        ?>

    <!DOCTYPE html>
    <!--[if gt IE 6]> <html class="no-js ie oldie" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
    <!--[if IE 9]> <html class="no-js ie9 oldie" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"  dir="ltr" lang="fr"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Guillaume Derouineau">
        <!-- description du site ce qui apparaitra dans google -->
        <meta name="Description" content="Le Site Officiel du chef de cuisine, Jordan Delamotte " />
        <meta name="keywords" content="chef, chef paris, jordan delamotte, chef jordan delamotte, restaurant de Sers, hotel de Sers, cuisine"/>
        <title>Jordan Delamotte - Site Officiel</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/actualite.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen" />
        <!--[if gt IE 8]><!--><link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /><!--<![endif]-->
        <!--[if !IE]> <link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /> <![endif]-->
        <link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,300italic,700,600,800' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Lora:400italic,400,700italic' rel='stylesheet' type='text/css' />
        <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon"/>


<!-- facebook open graph data -->
        <!-- Open Graph url property -->
        <meta property="og:url" content="http://www.jordan-delamotte.com/index.php?recette_id=<?php echo $id; ?>#filter=.recette" />

        <!-- Open Graph title property -->
        <meta property="og:title" content="Jordan Delamotte - Recette" />

        <!-- Open Graph description property -->
        <meta property="og:description" content="<?php echo strip_tags($title); ?>" />

        <!-- Open Graph image property -->
        <meta property="og:image" content="http://www.jordan-delamotte.com/<?php echo $photo ; ?>" />
        <meta property="og:image:type" content="image/jpeg" />

        <!-- Open Graph type property -->
        <meta property="og:type" content="blog" />

        <!-- Open Graph site_name property -->
        <meta property="og:site_name" content="Site officiel de Jordan Delamotte" />

        <link rel="opengraph" href="http://www.jordan-delamotte.com/index.php?recette_id=<?php echo $id; ?>#filter=.recette"/>
        <!-- end og -->
    </head>
    <body style="background-color: white;">
    <!-- facebook share button plugin -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <!-- end of the facebook plugin -->
    <div id="content">
        <div class="container">
            <div id="container" class="clearfix">
                <div class="element  clearfix auto center">
                    <div class="clearfix col2 row-auto auto no-padding">
                        <div class="images">
                            <a href="javascript:parent.jQuery.fancybox.close();">
                                <div class="close"></div>
                            </a>
                            <img src="<?php echo $photo;?>" alt="<?php echo $title;?>" />
                        </div>
                    </div>
                    <article class="clearfix col2 row-auto white white-bottom auto no-side-padding">
                        <h3><?php echo $title ?></h3>
                        <p class="small">  par Jordan Delamotte</p>
                        <div class="borderline"></div>
                        <h4>Ingredients</h4>
                        <p class="small">pour <?php echo $nb_personnes ; ?> personnes</p>
                        <ul class="unordered-list column-count2">
                        <?php
                            foreach($ingredient as $ingredient_name){
                                ?>
                                <li style="text-align: left;">
                                    <?php
                                    echo $ingredient_name;
                                    ?>
                                </li>
                                <?php
                            }
                        ?>
                        </ul>
                        <h4>Préparation</h4>
                        <div style="text-align: justify;text-justify: inter-word;"><?php echo $text ?></div>
                        <div class="break"></div>
                        <!--<a href="#" class="icons margin like"></a>-->
                        <!--<a href="#" class="icons margin share"></a>-->
                        <div class="fb-share-button" id="fb-button" data-layout="button_count" data-href="http://jordan-delamotte.com/index.php?recette_id=<?php echo $id ;?>#filter=.recette"></div>
                        <br><br>
                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://jordan-delamotte.com/?recette_id=<?php echo $id; ?>#filter=.recette" data-text="<?php echo strip_tags($title); ?>" data-count="horizontal">Tweet</a>
                        <br /><br />
                        <script src="//platform.linkedin.com/in.js" type="text/javascript">
                            lang: fr_FR
                        </script>
                        <script type="IN/Share" data-url="http://jordan-delamotte.com/?recette_id=<?php echo $id ;?>#filter=.recette" data-counter="right"></script>

                    </article>
                </div>
            </div>
        </div>
    </div>
 <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
   <!-- <script type="text/javascript">
        var fb = $('#fb-button');
        $(fb).style.display = 'block';
        $('#share-button').popover({
            placement: 'auto right',
            title: 'Share',
            content : fb,
            html: true
        }).click(function(e) {
            e.preventDefault();
        });
    </script>
-->
    </body>
    </html>

<?php
}

function french_month($time){
    $time = date('n', $time);
    switch ($time) {
        case 1:
            return 'Janvier';
            break;
        case 2:
            return 'Février';
            break;
        case 3:
            return 'Mars';
            break;
        case 4:
            return 'Avril';
            break;
        case 5:
            return 'Mai';
            break;
        case 6:
            return 'Juin';
            break;
        case 7:
            return 'Juillet';
            break;
        case 8:
            return 'Août';
            break;
        case 9:
            return 'Septembre';
            break;
        case 10:
            return 'Octobre';
            break;
        case 11:
            return 'Novembre';
            break;
        case 12:
            return 'Décembre';
            break;

    }

}

