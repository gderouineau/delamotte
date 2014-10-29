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
    $query = 'SELECT * FROM actualite WHERE id='.$id;
    $result = $db->query($query);
    $data = $result->fetch();

    $photo = $data['photo'];
    $title = $data['title'];
    $text = $data['text'];
    $date = strtotime($data['date']);
    $day = date('j',$date);
    $french_month = french_month($date);
    $year= date('Y' , $date);
    $auteur_id= $data['author_id'];
    $query= 'SELECT * from users WHERE id='.$auteur_id;
    $result = $db->query($query);
    $data = $result->fetch();
    $auteur= $data['name'];

    $query = 'SELECT * FROM actualite WHERE (author_id='.$auteur_id.' AND id!='.$id.') ORDER BY id DESC LIMIT 0,4';
    $result = $db->query($query);
    $data = $result->fetchAll();
    $data_size = count($data);
    if($data_size<4){
        $where= "(id!=".$id;
        foreach($data as $row){
           $where=$where." AND id!=".$row['id'];
        }
        $where.=')';
        $query = 'SELECT * FROM actualite WHERE '.$where.' ORDER BY id DESC LIMIT 0,'.(4-$data_size);
        $result = $db->query($query);
        $data_bis = $result->fetchAll();
        $data = array_merge($data,$data_bis);
    }
    ?>

    <!DOCTYPE html>
    <!--[if gt IE 6]> <html class="no-js ie oldie" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
    <!--[if IE 9]> <html class="no-js ie9 oldie" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"  dir="ltr" lang="fr"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="expires" content="0">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-cache, must-revalidate">
        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="ppandp & guillaume derouineau">
        <!-- description du site ce qui apparaitra dans google -->
        <meta name="Description" content="Le Site Officiel du chef de cuisine, Jordan Delamotte " />
        <meta name="keywords" content="chef, chef paris, jordan delamotte, chef jordan delamotte, restaurant de Sers, hotel de Sers, cuisine"/>
        <title>Jordan Delamotte - Site Officiel</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/actualite.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="screen" />
        <!--[if gt IE 8]><!--><link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /><!--<![endif]-->
        <!--[if !IE]> <link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /> <![endif]-->
        <link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,300italic,700,600,800' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Lora:400italic,400,700italic' rel='stylesheet' type='text/css' />
        <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon"/>

        <!-- facebook open graph data -->
        <!-- Open Graph url property -->
        <!--
        <meta property="og:url" content="http://www.jordan-delamotte.com?actu_id=<?php echo $id; ?>#filter=.actualite" />
-->
        <!-- Open Graph title property -->
        <meta property="og:title" content="Jordan Delamotte - <?php echo strip_tags($title); ?>" />

        <!-- Open Graph description property -->
        <meta property="og:description" content="<?php echo substr(strip_tags($text), 0 , min(100,strlen(strip_tags($text)) ) ) ; ?>" />

        <!-- Open Graph image property -->
        <meta property="og:image" content="http://www.jordan-delamotte.com/<?php echo $photo ; ?>" />
        <meta property="og:image:type" content="image/jpeg" />

        <!-- Open Graph type property -->
        <meta property="og:type" content="blog" />

        <!-- Open Graph site_name property -->
        <meta property="og:site_name" content="Site officiel de Jordan Delamotte" />

        <link rel="opengraph" href="http://www.jordan-delamotte.com?actu_id=<?php echo $id; ?>#filter=.actualite"/>
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

        <div class="element  clearfix auto center">
            <div class="clearfix col-3 auto no-padding">
                <div class="images">
                    <a href="javascript:parent.jQuery.fancybox.close();">
                        <div class="close"></div>
                    </a>
                    <img src="<?php echo $photo;?>" alt="<?php echo $title;?>" />
                </div>
            </div>
            <article class="clearfix col2-3 white white-bottom auto">
                <h3><?php echo $title ?></h3>
                <div class="borderline"></div>
                <p class="small"><?php echo $day.' '.$french_month.' '.$year;?> &nbsp;&middot;&nbsp; par Jordan Delamotte</p>
                <?php echo $text ?>
                <div class="break"></div>
                <!--<a href="#" class="icons margin like"></a>-->
                <!--<a href="#" class="icons margin share" rel="popover" id="share-button" data-toggle="popover" ></a>-->
                <div class="fb-share-button" id="fb-button" data-layout="button" data-href="http://jordan-delamotte.com/?actu_id=<?php echo $id ;?>#filter=.actualite"></div>
                <br><br>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://jordan-delamotte.com/?actu_id=<?php echo $id; ?>#filter=.actualite" data-text="<?php echo $title; ?>" data-count="none">Tweet</a>
                <div class="break"></div>
                <div class="borderline"></div>
                <p class="small">Autres articles</p>
                <div class="break"></div>
                <?php

                for($i= 0 ; $i< count($data); $i++){
                ?>
                <a class="actu_link " href="actu_fancybox.php?id=<?php echo $data[$i]['id'] ; ?>">
                    <div class="fancybox element  clearfix border" style="width: 46%; margin: 1%; <?php if($i%2==0){echo 'float:left;';} else {echo 'float:right;';} ?> ">

                        <h4><?php echo $data[$i]['title']; ?></h4>
                        <div class="borderline"></div>
                        <p class="small"><?php echo date('j',strtotime($data[$i]['date'])).' '.french_month(strtotime($data[$i]['date'])).' '.date('Y' , strtotime($data[$i]['date'])).' <br /> &nbsp;&middot;&nbsp; <br />par '.$data[$i]['author_name']; ?></p>
                    </div>
                </a>
                <?php
                }
                ?>
            </article>
        </div>
        <!--
        <div class="fb-share-button" data-href="http://jordan-delamotte.com/?actu_id=47#filter=.actualite"></div>
        -->
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
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
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-54818812-1', 'auto');
        ga('send', 'pageview');

    </script>
    <script>

        $('.actu_link').click(function(e){
            e.preventDefault();
            parent.$.fancybox({
                href: this.href,
                type: 'iframe',
                autoScale: true,
                width: 570,
                helpers : {
                    overlay : {
                        css : {
                            'background' : 'rgba(105, 105, 105, 0.5)'
                        } // css
                    } // overlay
                }// helpers
            }); // fancybox
        });
        //parent.jQuery.fancybox.close();
    </script>
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



