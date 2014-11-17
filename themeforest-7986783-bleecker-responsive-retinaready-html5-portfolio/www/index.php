<?php

    $title='';
    $text = '';
    $photo = '';
    $id='';
//    session_start();
    $lang='fr';
    if(isset($_GET['lang'])){
        $_SESSION['lang']=$_GET['lang'];
    }
    if(isset($_SESSION['lang'])){
        $lang=$_SESSION['lang'];
    }


    if(isset($_GET['actu_id'])){
        $id = $_GET['actu_id'];

        $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
        $query = 'SELECT * FROM actualite WHERE id='.$id;
        $result = $db->query($query);
        $data = $result->fetch();

        $photo = $data['photo'];
        $title = $data['title'];
        $text = $data['text'];

    }
    if(isset($_GET['recette_id'])){
        $id = $_GET['recette_id'];

        $db = new PDO('mysql:host=mysql51-136.perso;dbname=jordandefmbdd', 'jordandefmbdd', 'hgz5pTRuktht');
        $query = 'SELECT * FROM recette WHERE id='.$id;
        $result = $db->query($query);
        $data = $result->fetch();

        $photo = $data['photo'];
        $title = $data['title'];
        $text = $data['text'];

    }
?>

<!DOCTYPE html>

    <?php if($lang=="en"){?>
<!--[if gt IE 6]> <html class="no-js ie oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="no-js ie9 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"  dir="ltr" lang="en"> <!--<![endif]-->
<?php } if($lang=="fr"){ ?>
<!--[if gt IE 6]> <html class="no-js ie oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if IE 9]> <html class="no-js ie9 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"  dir="ltr" lang="fr"> <!--<![endif]-->
<?php }?>
<head>
    <meta charset="utf-8">
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="guillaume derouineau">
    <!-- description du site ce qui apparaitra dans google -->
    <meta name="Description" content="Bienvenue sur le Site Officel de Jordan Delamotte, Chef de cuisine passionné..." />
    <meta name="keywords" content="chef, chef paris, jordan delamotte, chef jordan delamotte, restaurant de Sers, hotel de Sers, cuisine"/>
    <meta name="msvalidate.01" content="08410D872342AF06D88C7F32A1D1E595" />
    <?php if($lang=="fr"){ ?>
    <title>Jordan Delamotte - Site Officiel</title>
    <?php } if($lang=="en"){?>
    <title>Jordan Delamotte - Offical Website</title>
    <?php } ?>
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="screen" />
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache, must-revalidate">
    <link href="css/contact.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen" />
    <!--[if gt IE 8]><!--><link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /><!--<![endif]-->
    <!--[if !IE]> <link href="css/retina-responsive.css" rel="stylesheet" type="text/css" media="screen" /> <![endif]-->
    <link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,300italic,700,600,800' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lora:400italic,400,700italic' rel='stylesheet' type='text/css' />
    <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon"/>

    <?php
        if(isset($_GET['actu_id'])){ ?>
    <!-- facebook open graph data -->
    <!-- Open Graph url property -->
    <meta property="og:url" content="http://www.jordan-delamotte.com?actu_id=<?php echo $id; ?>#filter=.actualite" />

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
    <!-- end og -->
    <?php } ?>
    <?php
       if(isset($_GET['recette_id'])){ ?>
    <!-- facebook open graph data -->
    <!-- Open Graph url property -->
    <meta property="og:url" content="http://www.jordan-delamotte.com?recette_id=<?php echo $id; ?>#filter=.recette" />

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
    <!-- end og -->
    <?php } ?>
    <?php
       if(!isset($_GET['recette_id']) && !isset($_GET['actu_id'])){ ?>
    <!-- facebook open graph data -->
    <!-- Open Graph url property -->
    <meta property="og:url" content="http://www.jordan-delamotte.com" />

    <!-- Open Graph title property -->
    <meta property="og:title" content="Jordan Delamotte - Site Officel" />

    <!-- Open Graph description property -->
    <meta property="og:description" content="Bienvenue sur le Site Officel de Jordan Delamotte, Chef de cuisine passionné..." />

    <!-- Open Graph image property -->
    <meta property="og:image" content="http://www.jordan-delamotte.com/images/photos/www.JD.com-ConvertImage%20copie.jpg" />
    <meta property="og:image:type" content="image/jpeg" />

    <!-- Open Graph type property -->
    <meta property="og:type" content="blog" />

    <!-- Open Graph site_name property -->
    <meta property="og:site_name" content="Site officiel de Jordan Delamotte" />
    <!-- end og -->
    <?php } ?>

</head>
<body>

<!-- facebook share button plugin -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=288520161298626&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- end of the facebook plugin -->

<!-- Preloader -->
<div id="preloader">
    <div id="status">
        <div class="parent">
            <div class="child">
                <p class="small">loading</p>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="container clearfix">
        <h1 id="logo"><a href="/">Jordan Delamotte</a></h1>
        <?php if($lang=='fr'){ ?>
            <a href="/?lang=en" id="lang">English</a>
        <?php } if($lang=='en'){  ?>
            <a href="/?lang=fr" id="lang">Français</a>
        <?php } ?>
        <!-- start main nav -->
        <div id="nav-button"> <span class="nav-bar"></span> <span class="nav-bar"></span> <span class="nav-bar"></span> </div>
        <div id="options" class="clearfix">
            <!-- menu dans le cas ou tu voudrais ajouter ou supprimer des options
            pour en ajouter un il suffit du dupliquer
            <li><a href="#filter=.portfolio">Photos</a></li>
            par exemple le champ #filter=.portfolio te permet de chercher dans les classes
            -->
            <?php if($lang=="fr"){?>
            <ul class="option-set clearfix" id="option-list-up" data-option-key="filter">
              <!--  <li><a href="#filter=.bienvenue" class="selected">Bienvenue</a> -->
                <li><a href="#filter=.portrait">Portrait</a></li>
                <li><a href="#filter=.actualite">Actualités</a></li>
                <li><a href="#filter=.photo">Photos</a></li>
                <li><a href="#filter=.recette">Recettes</a></li>
                <li><a href="#filter=.contact">Contact</a></li>

            </ul>
            <?php } if($lang=="en"){ ?>
            <ul class="option-set clearfix" id="option-list-up" data-option-key="filter">
                <!-- <li><a href="#filter=.bienvenue" class="selected">Welcome</a> -->
                <li><a href="#filter=.portrait">Portrait</a></li>
                <li><a href="#filter=.actualite">News</a></li>
                <li><a href="#filter=.photo">Photos</a></li>
                <li><a href="#filter=.recette">Recipes</a></li>
                <li><a href="#filter=.contact">Contact</a></li>

            </ul>
            <?php } ?>
        </div>
        <!-- end main nav -->
    </div>
</header>
<!-- end header -->
<div id="content">
    <div class="container">
        <div id="container" class="clearfix">


            <!-- important lorsque tu passes sur une photo et que sur le texte qui s'affiche tu ais un titre et un sous titre tu fais
            titre <span>sous-titre</span>
            -->

            <!-- un element photo avec ouverture vers une fancybox
            <div class="element  clearfix col1 row1 photo">
                <a href="images/photo1.jpg" data-title="Saint pierre, fèves, amandes & shiso rouge" data-fancybox-group="group2" class="popup">
                  <div class="images"> <img src="images/photo1.jpg" alt="Saint pierre..." class="slip" /> </div>
                </a>
            </div>
            -->

            <!-- un element photo sans fancy box
            <div class="element  clearfix col1-3 home"> <a href="/index.html#filter=.about">
              <div class="images"> <img src="images/logo-jd-black-on-white.jpg" alt="a propos" /> </div>
              </a>
            </div>
            -->

            <!-- un element photo avec ouverture vers une vidéo
            <div class="element  clearfix col1-3 home about video"> <a href="http://player.vimeo.com/video/17081554?badge=0&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" class="video-popup" data-title="Project Title Here">
              <div class="images"> <img src="images/about04.jpg" alt="Professional<span>video</span>" class="slip" /> </div>
              </a>
            </div>
            -->

            <!-- un element texte avec ecriture en petit
             <div class="element  clearfix col2-3 home white">
              <h2>Hi, We're Bleecker</h2>
              <p class="images">A <span>digital-forward</span> creative agency making brands live up to their full potential. That’s it. And this is our website. It’s that simple.</p>
            </div>
            -->
            <div class="element  clearfix col4 row1 legals white">
                <p>Copyright © Jordan Delamotte <br /><br /><br />La reproduction, même partielle, de tout texte, image ou photo présents sur ce site est interdite sans accord préalable. Les logos, marques et marques déposées sont la propriété de leurs détenteurs.</p>
            </div>

            <!-- un element texte avec ecriture en grand
            <div class="element  clearfix col2-3 white">
              <h2>Hi, We're Bleecker</h2>
              <p class="big">A <span>digital-forward</span> creative agency making brands live up to their full potential. That’s it. And this is our website. It’s that simple.</p>
            </div>
            -->


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- debut du bloc bienvenue -->

            <!--div class="element  clearfix col2 row3 bienvenue">
                <div class="images"> <img src="images/photos/saintpierre1-small.jpg" alt="Saint Pierre, fèves, amandes et shiso rouge..." class="slip" /> </div>
            </div-->


            <div class="element  clearfix col2 row1 bienvenue">
                <div class="images"> <img src="images/photos/portrait1-small.jpg" alt="" /> </div>
            </div>
            <div class="element  clearfix col2 row1 oneon3 bienvenue white">
                <p><br/><br/><br/>
                    <?php if($lang=='fr'){ ?>
                    Bienvenue sur le Site Officiel de Jordan Delamotte, <br/> Chef de cuisine passionné...
                    <?php } if($lang=='en'){ ?>
                    Welcome on Jordan Delamotte official website, <br/> passionate Chef...
                    <?php } ?>
                    <a href="/#filter=.portrait" class="full" style="text-decoration: none;">
                    </a>
                </p>
            </div>
            <div class="element  clearfix col1 row1 bienvenue">
                <a href="images/plats/Féra,%20caviar,sauce%20champage%20HD%20(A.%20Couturier)/féra%20modif.jpg" data-title="La Féra du lac Léman, caviar osciètre d'Italie, pomme de terre et sauce champagne." data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/plats/Féra,%20caviar,sauce%20champage%20HD%20(A.%20Couturier)/féra%20modif.jpg" alt="La Féra du lac Léman..." class="slip" /> </div>
                </a>

            </div>
            <div class="element clearfix white col1 row1 bienvenue" id="newsletter">
                <?php if($lang=="fr"){ ?>
                <h4>Abonnez-vous à la newsletter.</h4>
                <?php } if($lang=="en"){ ?>
                <h4>Suscribe to the newsletter.</h4>
                <?php } ?>
                <form>
                    <p>
                        email: <input type="text" id="newsletter_email" value ="" />
                        <?php if($lang=="fr"){ ?>
                        <span id="newsletter_submit">Envoyer</span>
                        <?php } if($lang=="en"){ ?>
                        <span id="newsletter_submit">Send</span>
                        <?php } ?>

                    </p>
                </form>
            </div>
            <!--div class="element  clearfix col1 row1 bienvenue">
                <a href="images/photos/image_truffe-big.jpg" data-title="Une truffe  mélanosporum" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/image_truffe-small.jpg" alt="Une truffe  mélanosporum" class="slip" /> </div>
                </a>

            </div>
            <div class="element clearfix col1 row2 bienvenue">
                <a href="#filter=.portrait">
                    <div class="images"> <img src="images/photos/JD-NSB-small.jpg" alt="Qui <br /><br />est <br /><br />Jordan <br />Delamotte <br /><br />?" class="slip"/> </div>
                </a>
            </div>
            <div class="element  clearfix col1 row1 bienvenue">
                <a href="images/photos/nicoise2-big.jpg" data-title="La salade niçoise de Jordan Delamotte" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/nicoise2-small.jpg" alt="La salade niçoise..." class="slip" /> </div>
                </a>
            </div-->
            <div class="element  clearfix col1 row1 bienvenue">
                <a href="images/photos/tartareboeuf3-big.jpg" data-title="Tartare de boeuf du Limousin, déclinaison de tomates anciennes" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/tartareboeuf3-small.jpg" alt="Le tartare de boeuf..." class="slip"/> </div>
                </a>
            </div>
            <div class="element  clearfix col1 row1 bienvenue">
                <a href="images/photos/saintpierre2-big.jpg" data-title="Filet de Saint Pierre, fèves, amandes et shiso rouge" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/saintpierre2-small.jpg" alt="Le Saint Pierre..." class="slip"/> </div>
                </a>
            </div>
            <!--
            <div class="element  clearfix col1 row1 bienvenue">
                <a href="images/photos/finger_manguevanille1-1-big.jpg" data-title="Finger de mangue épicée, crème légère à la vanille de Madagascar,biscuit à la fleur de sel de Guérande" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/finger_manguevanille1-1-small.jpg" alt="Le finger de mangue épicé..." class="slip"/> </div>
                </a>
            </div>
            -->

            <!-- fin du bloc bienvenue -->
            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- début du bloc photo

                <div class="element  clearfix size2-1 photo menu white">
                <h3>Réalisations</h3>
                <div class="borderline"></div>
                <p>Chercher dans les photos:</p>
                <p class="small no-underline"><a href="#filter=.entree,+.menu">Entrées <span class="arrow">→</span></a><br />
                  <a href="#filter=.poisson,+.menu">Poissons <span class="arrow">→</span></a><br />
                  <a href="#filter=.viande,+.menu">Viandes <span class="arrow">→</span></a><br />
                  <a href="#filter=.dessert,+.menu">Desserts <span class="arrow">→</span></a><br />
                  <a href="#filter=.autre,+.menu">Autres <span class="arrow">→</span></a><br />
                  <a href="#filter=.photo,+.menu">Voir toutes <span class="arrow">→</span></a></p>
                </div>-->

            <div class="element clearfix col2 row2 photo min-display-1">
                <div class="images"> <img src="images/plats/tarte%20fine%20artichaut%20BD%20(A.%20Couturier)/0097%20bis.jpg" alt="Tarte fine d'artichauts poivrades..." class="slip" /> </div>
            </div>
            <div class="element  clearfix col1 row1 photo">
                <a class="full popup" href="images/photos/nicoise2-big.jpg" data-title="La salade niçoise de Jordan Delamotte" data-fancybox-group="plat" >
                    <div class="images"> <img src="images/photos/nicoise2-small.jpg" alt='La salade niçoise...' class="slip" /> </div>
                </a>
            </div>
            <div class="element  clearfix col1 row1 photo">
                <a href="images/photos/saintpierre2-big.jpg" data-title="Filet de Saint Pierre, fèves, amandes et shiso rouge" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/saintpierre2-small.jpg" alt="Le Saint Pierre..." class="slip"/> </div>
                </a>
            </div>
            <!--
            <div class="element  clearfix col2 row1 photo">
                <div class="images"> <img src="images/photos/portrait1-small.jpg" alt="" /> </div>
            </div>
            -->
            <div class="element  clearfix col2 row2 photo">
                <a href="/images/plats/Ravioles aux cèpes BD (A. Couturier)/0054.jpg" data-title="Ravioles aux cèpes" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="/images/plats/Ravioles aux cèpes BD (A. Couturier)/0054-2x2.jpg" alt="Les ravioles ..." class="slip"/> </div>
                </a>
            </div>
            <div class="element  clearfix col1 row1 photo">
                <a href="images/photos/tartareboeuf3-big.jpg" data-title="Tartare de boeuf du Limousin, déclinaison de tomates anciennes" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/tartareboeuf3-small.jpg" alt="Le tartare de boeuf..." class="slip"/> </div>
                </a>
            </div>
            <div class="element  clearfix col1 row1 photo">
                <a href="images/photos/image_truffe-big.jpg" data-title="Une truffe  mélanosporum" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/image_truffe-small.jpg" alt="Une truffe  mélanosporum..." class="slip" /> </div>
                </a>
            </div>

            <div class="element  clearfix col2 row2 photo">
                <a href="/images/plats/tarte foie gras BD (A. Couturier)/9983.jpg" data-title="La tarte au fois gras des Landes mi-cuit, chutney de cèpes, espuma de topinambour." data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="/images/plats/tarte foie gras BD (A. Couturier)/9983-2x2.jpg" alt="Le fois gras des Landes..." class="slip" /> </div>
                </a>
            </div>

            <div class="element  clearfix col1 row1 photo">
                <a href="images/photos/finger_manguevanille1-1-big.jpg" data-title="Finger de mangue épicée, crème légère à la vanille de Madagascar,biscuit à la fleur de sel de Guérande" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/finger_manguevanille1-1-small.jpg" alt="Le finger de mangue épicé..." class="slip"/> </div>
                </a>
            </div>
            <!--
            <div class="element clearfix col1 row2 photo">
                <a href="/#filter=.portrait">
                    <div class="images"> <img  src="images/photos/JD-NSB-small.jpg" alt="Qui <br /><br />est <br /><br />Jordan <br />Delamotte <br /><br />?" class="slip"/> </div>
                </a>
            </div>
            -->
            <div class="element  clearfix col1 row1 photo">
                <a href="images/photos/daurade1-3-big.jpg" data-title="Daurade royale sauvage, guacamol au lait de coco, cristophine et choux bok choy" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/daurade1-3-small.jpg" alt="La daurade royale..." class="slip" /> </div>
                </a>
            </div>
            <div class="element clearfix col2 row2 oneon3 photo">
                <div class="images"> <img src="images/photos/portrait-1-BW-small.jpg" alt="" /> </div>
            </div>


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!--fin du bloc photo -->


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- debut bloc portrait -->

            <div class="element  clearfix col2 row3 fullon3 white portrait">
                <h3 class="align-top">Jordan Delamotte</h3>
                <p>
                    <br />
                    <br />
                    <br />

                    Passionné, Jordan Delamotte l’est en cuisine comme en toute chose.
                    Ambitieux et dévoué, Jordan a su gravir les échelons rapidement et imposer sa personnalité dans des établissements de renom.
                    Passé en moins de dix ans d’apprenti à chef de cuisine à l’Hôtel de Sers, Jordan carbure aux défis sans jamais renoncer à satisfaire une clientèle dont il tient personnellement à prendre le plus grand soin.
                    <br />
                    <br />
                    <br />
                    C’est en 2011 qu’il s’établit à Paris où il arrive au réputé restaurant de Neuilly : La Truffe Noire, un lieu qui lui permettra de faire ses preuves en tant que chef de partie. En janvier 2013, il entre à l’Hôtel de Sers où il devient rapidement chef de cuisine pour le plus grand plaisir de la clientèle fidèle et raffinée de l’avenue Pierre 1er de Serbie.
                    <br />
                    <br />
                    <br />
                    Né à Roubaix, diplômé à Nantes, d’origine belge et polonaise, sa cuisine est le reflet de sa personnalité : curieuse, innovante, variée et généreuse. S’il met un point d’honneur à incarner la gastronomie à la française, il croit que pour ce faire, le mélange des cultures et des influences est un atout. Ayant travaillé tour à tour en Irlande, en Suisse ou encore en Martinique, il aime cultiver son inspiration qui lui provient à la fois de son expérience et de ses voyages. Toujours conscient des exigences de la clientèle, il considère essentiel de choisir les meilleurs ingrédients produits en France et biologiques. Chef pointilleux et rigoureux, il dirige les équipes avec un professionnalisme très prometteur pour un jeune chef de 28 ans.

                    <br />
                    <br />
                    <br />
                    <br />
                    Charlotte Rocher, août 2014
                </p>
            </div>

            <div class="element clearfix col2 row2 fullon3 portrait">
                <div class="images"> <img src="images/photos/portrait-1-BW-small.jpg" alt="portrait" /> </div>
            </div>
            <div class="element clearfix col2 row1 fullon3 portrait">
                <div class="images"> <img src="images/photos/nicoise3-small.jpg" alt="portrait" /> </div>
            </div>


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- fin du bloc portrait -->

            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- bloc contact  -->

            <div class="element clearfix photo-contact min-display-1 contact">
                <div class="images"> <img src="images/photos/nicoise1-big.jpg" alt="La salade niçoise..." class="slip" /> </div>
            </div>


            <div class="element  clearfix col1 row-auto double white contact">
                <h3>Contactez-nous</h3>
                <div id="contact">
                    <form method="post" action="contact.php" name="contactform" id="contactform" autocomplete="off">
                        <fieldset>
                            <label for="name" accesskey="U"><span class="required">Name</span></label>
                            <input name="name" type="text" id="name" size="30" title="Nom *" />
                            <label for="email" accesskey="E"><span class="required">Email</span></label>
                            <input name="email" type="text" id="email" size="30" title="Email *" />
                            <label for="phone" accesskey="P">Phone</label>
                            <input name="phone" type="text" id="phone" size="30" title="Téléphone" />
                            <label for="comments" accesskey="C"><span class="required">Comments</span></label>
                            <textarea name="comments" cols="40" rows="3" id="comments" title="Commentaire *"></textarea>
                            <span class="break"></span>
                            <p class="hide">Nous reviendrons vers vous dès que possible.<br /><br /></p>
                            <input type="submit" class="submit" id="submit" value="Envoyer" /><br /><br /><br /><br />
                            <p>* Champs obligatoire</p><br />
                            <span id="message"></span>
                        </fieldset>
                    </form>
                </div>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- fin du bloc contact -->


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- bloc réalisation -->
            <!--
            <div class="element clearfix white col4 row1 ">
                <p> En cours de réalisation</p>
            </div>
            -->
            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- fin du bloc réalisation -->

            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- bloc remerciement -->
            <div class="element clearfix white col1 row1 remerciement" data-text="Merci" >
                <h3>Je remercie...</h3>
            </div>

            <div class="element clearfix white col1 row1 remerciement slipdiv" data-text="Pour ses textes" >
                <h3>Charlotte Rocher</h3>
            </div>

            <div class="element clearfix white col1 row1 remerciement slipdiv" data-text="Pour ce site" >
                <h3>Guillaume Derouineau</h3>
            </div>
            <div class="element clearfix white col1 row1 remerciement slipdiv" data-text="Pour son Amour et son soutien" >
                <h3>Sara Edward</h3>
            </div>
            <div class="element clearfix white col1 row1 remerciement slipdiv" data-text="Pour leurs photos" >
                <h3>Alban Couturier <br /> et <br /> Sébastien Bessac</h3>
            </div>
            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- fin du bloc remerciement -->

            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- bloc newsletter -->
            <div class="element clearfix white col1 row1 contact" id="newsletter">
                <?php if($lang=="fr"){ ?>
                <h4>Abonnez-vous à la newsletter.</h4>
                <?php } if($lang=="en"){ ?>
                <h4>Suscribe to the newsletter.</h4>
                <?php } ?>
                <form>
                    <p>
                        email: <input type="text" id="newsletter_email" value ="" />
                        <?php if($lang=="fr"){ ?>
                        <span id="newsletter_submit">Envoyer</span>
                        <?php } if($lang=="en"){ ?>
                        <span id="newsletter_submit">Send</span>
                        <?php } ?>

                    </p>
                </form>
            </div>
            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- fin du bloc newsletter -->


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!--  bloc presse -->

            <div class="element  clearfix col2 row3 fullon3 presse">
                <a href="images/photos/gasto_modernite_big.jpg" data-title="Gastronomie et Modernité au menu de l'hôtel de Sers" data-fancybox-group="presse" class="popup">
                    <div class="images"> <img src="images/photos/gasto_modernite_big.jpg" alt="Apollo Magazine" class="slip" /> </div>
                </a>
            </div>
            <div class="element  clearfix col2 row3 fullon3 presse">
                <a href="images/photos/pressegala-big.PNG" data-title="Le + : Le buffet gastronomique et innovant du chef Jordan Delamotte" data-fancybox-group="presse" class="popup">
                    <div class="images"> <img src="images/photos/pressegala-small.png" alt="Gala" class="slip" /> </div>
                </a>
            </div>
            <div class="element  clearfix col2 row3 fullon3 presse">
                <a href="http://www.sofoodmag.fr/jordan-delamotte.html" target="_blank">
                    <div class="images"> <img src="images/photos/pressesofoodmag-big.png" alt="SoFoodMag.com" class="slip" /> </div>
                </a>
            </div>


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- fin du bloc presse -->

            <div id="news" style="display: none;">
            </div>
            <?php if(isset($_GET['actu_id'])){?>

            <img style="display:none;" src="<?php echo $photo ?>">
            <?php } ?>
            <div id="recettes" style="display: none;">
            </div>
            <?php if(isset($_GET['recette_id'])){?>

            <img style="display:none;" src="<?php echo $photo ?>">
            <?php } ?>
            <?php if(!isset($_GET['actu_id']) && !isset($_GET['recette_id'])){?>

            <img style="display:none;" src="images/photos/www.JD.com-ConvertImage%20copie.jpg">
            <?php } ?>

        </div>
    </div>
<!-- end container -->
</div>
<!-- end content -->
<footer>
    <div class="container">
        <ul class="social clearfix">
            <li class="twitter"><a href="https://twitter.com/ChefJordanD" target="_blank">Visitez mon compte Twitter</a></li>
            <li class="facebook"><a href="https://www.facebook.com/Chef.JordanDelamotte" target="_blank">Visitez ma page Facebook</a></li>
            <!--<li class="instagram"><a href="http://instagram.com/jordandelamotte" target="_blank">Visitez mon compte Instagram</a></li>-->
            <li class="linkedin"><a href="https://www.linkedin.com/profile/view?id=326916999" target="_blank">Visitez mon compte Linkedin</a></li>
        </ul>
        <div id="nav-button-down">

        </div>
        <div id="options-down" class="clearfix">
            <?php if($lang=='fr'){ ?>
            <ul class="option-set clearfix" id="option-list-down" data-option-key="filter">
                <li><a href="#filter=.presse">Presse</a>
                <li><a href="#filter=.legals">Mentions légales</a></li>
                <li><a href="#filter=.remerciement">Remerciements</a></li>
            </ul>
            <?php } if($lang=='en'){ ?>
            <ul class="option-set clearfix" id="option-list-down" data-option-key="filter">
                <li><a href="#filter=.presse">Press</a>
                <li><a href="#filter=.legals">Imprint</a></li>
                <li><a href="#filter=.remerciement">Thanks</a></li>
            </ul>
            <?php } ?>
        </div>

        <p><span>© 2014, Jordan Delamotte</span></p>
        <br/>
        <p><span>Design by <A HREF="mailto:guillaume.derouineau@gmail.com" style="color:#332;">Guillaume Derouineau</A></span></p>

    </div>
</footer>

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="js/modernizr.js" type="text/javascript"></script>
<script src="js/retina.js" type="text/javascript"></script>
<script src="js/jquery.isotope2.min.js" type="text/javascript"></script>
<script src="js/jquery.ba-bbq.min.js" type="text/javascript"></script>
<script src="js/jquery.isotope.load.js" type="text/javascript"></script>
<script src="js/jquery.sliphover.min.js"></script>
<script src="js/responsive-nav.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/preloader.js" type="text/javascript"></script>
<script src="js/SmoothScroll.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script src="js/input.fields.js" type="text/javascript"></script>
<script src="js/newsletter.js" type="text/javascript"></script>
<script src="js/actualite.js" type="text/javascript"></script>
<script src="js/recette.js" type="text/javascript"></script>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-54818812-1', 'auto');
    ga('send', 'pageview');

</script>


</body>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MB6WW9"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MB6WW9');</script>
<!-- End Google Tag Manager -->

</html>
