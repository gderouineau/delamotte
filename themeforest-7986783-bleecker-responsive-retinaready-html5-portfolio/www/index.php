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

    if(isset($_GET['season_id'])){
        $id = $_GET['season_id'];

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
    <!--<meta http-equiv="expires" content="0">-->
    <!--<meta http-equiv="pragma" content="no-cache">-->
    <meta http-equiv="cache-control" content="max-age=86400, must-revalidate">
    <link href="css/contact.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/responsiveslides.css" rel="stylesheet" type="text/css" media="screen" />
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
        if(isset($_GET['season_id'])){ ?>
    <!-- facebook open graph data -->
    <!-- Open Graph url property -->
    <meta property="og:url" content="http://www.jordan-delamotte.com?season_id=<?php echo $id; ?>#filter=.saison" />

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
       if(!isset($_GET['recette_id']) && !isset($_GET['actu_id']) && !isset($_GET['season_id'])){ ?>
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
<body data-showphoto="1" data-showphotomax="3" data-actuid="0" data-actucurrent="0" data-seasonid="0" data-seasoncurrent="0" data-photoid="0" data-photocurrent="0">

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

                <li><a href="#filter=.bienvenue">Accueil</a></li>
                <li><a href="#filter=.actualite">Actualités</a></li>
                <li><a href="#filter=.saison">C'est la saison</a></li>
                <li><a href="#filter=.recette">Recettes</a></li>
                <li><a href="#filter=.photo">Photos</a></li>
                <li><a href="#filter=.portrait">Portrait</a></li>
                <li><a href="#filter=.remerciement">Partenaires</a></li>
                <li><a href="#filter=.presse">Presse</a></li>
                <li><a href="#filter=.contact">Contact</a>


            </ul>
            <?php } if($lang=="en"){ ?>
            <ul class="option-set clearfix" id="option-list-up" data-option-key="filter">
                <li><a href="#filter=.bienvenue">Home</a></li>
                <li><a href="#filter=.actualite">News</a></li>
                <li><a href="#filter=.saison">it's the moment</a></li>
                <li><a href="#filter=.recette">Recipes</a></li>
                <li><a href="#filter=.photo">Photos</a></li>
                <li><a href="#filter=.portrait">Portrait</a></li>
                <li><a href="#filter=.remerciement">Partners</a></li>
                <li><a href="#filter=.presse">Press</a></li>
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


            <div class="element  clearfix col4 row1 legals white">
                <p>Copyright © Jordan Delamotte <br /><br /><br />La reproduction, même partielle, de tout texte, image ou photo présents sur ce site est interdite sans accord préalable. Les logos, marques et marques déposées sont la propriété de leurs détenteurs.</p>
            </div>




            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- debut du bloc bienvenue -->



            <div class="element  clearfix col2 row1 oneon3 bienvenue white">
                <p style="font-size: 20px;"><br/><br/><br/>
                    <?php if($lang=='fr'){ ?>
                    Bienvenue sur le Site Officiel de Jordan Delamotte, <br/> Chef de cuisine passionné...
                    <?php } if($lang=='en'){ ?>
                    Welcome on Jordan Delamotte official website, <br/> passionate Chef...
                    <?php } ?>
                    <a href="/?lang=en#filter=.portrait" class="full" style="text-decoration: none;">
                    </a>
                </p>
            </div>
            <div class="element  clearfix col2 row1 bienvenue callbacks_container slider_1">
                <ul class="rslides" id="slider_menu">
                    <li>
                        <a href="#filter=.actualite" ><img src="images/slider1/img-lien-actualites.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#filter=.saison" ><img src="images/slider1/img-lien-produitsdesaison.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#filter=.recette" ><img src="images/slider1/img-lien-recettes.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#filter=.photo" ><img src="images/slider1/img-lien-photos.jpg" alt=""></a>
                    </li>
                    <li>
                        <a href="#filter=.portrait" ><img src="images/slider1/img-lien-portrait.jpg" alt=""></a>
                    </li>
                </ul>
            </div>
            <div class="element  clearfix col1 row1 bienvenue">
                <a href="images/plats/Féra,%20caviar,sauce%20champage%20HD%20(A.%20Couturier)/féra%20modif.jpg" data-title="La Féra du lac Léman, caviar osciètre d'Italie, pomme de terre et sauce champagne." data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/plats/Féra,%20caviar,sauce%20champage%20HD%20(A.%20Couturier)/féra%20modif-570.jpg" alt="La Féra du lac Léman..." class="slip" /> </div>
                </a>

            </div>

            <div class="element  clearfix col1 row1 bienvenue callbacks_container_social slider_social ">
                <ul class="rslides" id="slider_social">
                    <li>
                        <a href="https://www.facebook.com/Chef.JordanDelamotte" target="_blank" ><img src="images/icons_social/facebook.png" alt=""></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/ChefJordanD" target="_blank"><img src="images/icons_social/twitter.png" alt=""></a>
                    </li>
                    <li>
                        <a href="http://instagram.com/jordan.delamotte" target="_blank"><img src="images/icons_social/instagram.png" alt=""></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/profile/view?id=326916999" target="_blank"><img src="images/icons_social/linkedin.png" alt=""></a>
                    </li>

                </ul>
            </div>

            <ul class="social clearfix">
                <li class="twitter"><a href="https://twitter.com/ChefJordanD" target="_blank">Visitez mon compte Twitter</a></li>
                <li class="facebook"><a href="https://www.facebook.com/Chef.JordanDelamotte" target="_blank">Visitez ma page Facebook</a></li>
                <!--<li class="instagram"><a href="http://instagram.com/jordandelamotte" target="_blank">Visitez mon compte Instagram</a></li>-->
                <li class="linkedin"><a href="https://www.linkedin.com/profile/view?id=326916999" target="_blank">Visitez mon compte Linkedin</a></li>
            </ul>
            <div class="element  clearfix col1 row1 bienvenue">
                <a href="images/photos/saintpierre2-big.jpg" data-title="Filet de Saint Pierre, fèves, amandes et shiso rouge" data-fancybox-group="plat" class="popup">
                    <div class="images"> <img src="images/photos/saintpierre2-small.jpg" alt="Le Saint Pierre..." class="slip"/> </div>
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

            <!-- fin du bloc bienvenue -->
            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- début du bloc photo
            -->


            <div id="photos"></div>
            
            <!-- fin bloc ajout de photos -->

            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!--fin du bloc photo -->


            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- debut bloc portrait -->

            <div class="element  clearfix col2 row3 fullon3 white portrait">
                <h3 class="align-top">Jordan Delamotte</h3>
                <p style="text-align: justify;text-justify: inter-word;">
                    <br />
                    <br />
                    <br />

                    <?php if($lang=='fr'){ ?>
                        Passionné, Jordan Delamotte l’est en cuisine comme en toute chose.
                        Ambitieux et dévoué, Jordan a su gravir les échelons rapidement et imposer sa personnalité dans des établissements de renom.
                        Passé en moins de dix ans d’apprenti à chef de cuisine à l’Hôtel de Sers, Jordan carbure aux défis sans jamais renoncer à satisfaire une clientèle dont il tient personnellement à prendre le plus grand soin.
                    <?php } if($lang=='en'){ ?>
                        Passionate, Jordan Delamotte is in the kitchen as in all things.
                        Ambitious and dedicated, Jordan was able to climb the ladder quickly and impose his personality in renowned establishments.
                        Happened in less than ten years of apprentice chef at the Hotel de Sers, Jordan carbide challenges without ever renouncing satisfy customers he personally would like to take the greatest care.
                    <?php } ?>
                    <br />
                    <br />
                    <br />
                    <?php if($lang=='fr'){ ?>
                        C’est en 2011 qu’il s’établit à Paris où il arrive au réputé restaurant de Neuilly : La Truffe Noire, un lieu qui lui permettra de faire ses preuves. En janvier 2013, il entre à l’Hôtel de Sers où il devient rapidement chef de cuisine pour le plus grand plaisir de la clientèle fidèle et raffinée de l’avenue Pierre 1er de Serbie.
                    <?php } if($lang=='en'){ ?>
                        It is in 2011 he moved to Paris, where he arrived at the renowned restaurant in Neuilly: La Truffe Noire, a place that will allow him to prove himself. In January 2013, he entered the Hotel de Sers where he quickly became chef to the delight of the faithful and refined clientele Avenue Pierre 1er de Serbie.                    <?php } ?>
                    <br />
                    <br />
                    <br />
                    <?php if($lang=='fr'){ ?>
                        Né à Roubaix, diplômé à Nantes, d’origine belge et polonaise, sa cuisine est le reflet de sa personnalité : curieuse, innovante, variée et généreuse. S’il met un point d’honneur à incarner la gastronomie à la française, il croit que pour ce faire, le mélange des cultures et des influences est un atout. Ayant travaillé tour à tour en Irlande, en Suisse ou encore en Martinique, il aime cultiver son inspiration qui lui provient à la fois de son expérience et de ses voyages. Toujours conscient des exigences de la clientèle, il considère essentiel de choisir les meilleurs ingrédients produits en France et biologiques. Chef pointilleux et rigoureux, il dirige les équipes avec un professionnalisme très prometteur pour un jeune chef de 29 ans.
                    <?php } if($lang=='en'){ ?>
                        Born in Roubaix, graduated from Nantes, Belgian and Polish origin, its cuisine is a reflection of his personality: curious, innovative, varied and generous. If he makes it a point of honor to embody the French gastronomy, he believes that to do so, the mix of cultures and influences is an asset. Having worked in turn in Ireland, Switzerland or in Martinique, he likes to cultivate his inspiration from him both his experience and his travels. Always aware of customer requirements, he considers essential to choose the best ingredients and organic products in France. Chief picky and strict, he led the team with a promising young chef professionalism for 29 years.                    <?php } ?>
                    <br />
                    <br />
                    <br />
                    <br />
                    <?php if($lang=='fr'){ ?>
                        Charlotte Rocher, août 2014
                    <?php } if($lang=='en'){ ?>
                        Charlotte Rocher, august 2014
                    <?php } ?>

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
                <div class="images"> <img id="nicoise_contact" src="" alt="" class="" /> </div>
            </div>


            <div class="element  clearfix col1 row-auto double white contact">
                <h3>Contactez-nous</h3>
                <div id="contact">
                    <form method="post" action="contact.php" name="contactform" id="contactform" autocomplete="off">
                        <fieldset>
                            <label for="name" accesskey="U"><span class="required">Name</span></label>
                            <input name="name" type="text" id="name" size="30" title="<?php if($lang=='fr'){ ?>Nom *<?php } if($lang=='en'){ ?>Name *<?php } ?>" />
                            <label for="email" accesskey="E"><span class="required">Email</span></label>
                            <input name="email" type="text" id="email" size="30" title="Email *" />
                            <label for="phone" accesskey="P">Phone</label>
                            <input name="phone" type="text" id="phone" size="30" title="<?php if($lang=='fr'){ ?>Téléphone<?php } if($lang=='en'){ ?>Name<?php } ?>" />
                            <label for="comments" accesskey="C"><span class="required">Comments</span></label>
                            <textarea name="comments" cols="40" rows="3" id="comments" title="<?php if($lang=='fr'){ ?>Commentaire *<?php } if($lang=='en'){ ?>Comment *<?php } ?>"></textarea>
                            <span class="break"></span>
                            <p class="hide"><?php if($lang=='fr'){ ?>Nous reviendrons vers vous dès que possible.<?php } if($lang=='en'){ ?>We will get back to you as soon as possible.<?php } ?><br /><br /></p>
                            <input type="submit" class="submit" id="submit" value="<?php if($lang=='fr'){ ?>Envoyer<?php } if($lang=='en'){ ?>Send<?php } ?>" /><br /><br /><br /><br />
                            <p><?php if($lang=='fr'){ ?>* Champs obligatoires<?php } if($lang=='en'){ ?>Required fields<?php } ?></p><br />
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
            <div class="element clearfix white col1 row2 remerciement no-padding forcerow" data-text="Merci" >
                <a class="full-width"><div class="images full"><img src="images/partenaires/GuillaumeD.jpg" /></div></a>
                <div class="to-bottom">
                    <h5>Guillaume Derouineau</h5>
                    <p>Web Designer</p>

                </div>
            </div>
            <div class="element clearfix white col1 row2 remerciement no-padding forcerow" data-text="Merci" >
                <a class="full-width"><div class="images full"><img src="images/partenaires/CharlotteR.jpg" /></div></a>
                <div class="to-bottom">
                    <h5>Charlotte Rocher</h5>
                    <p>Éditrice</p>
                    <br />
                    <br />
                    <br />
                    <br />
                    <p style="font-size: 12px;">Crédit photo : Vincent Rubin</p>

                </div>
            </div>

            <div class="element clearfix white col1 row2 remerciement no-padding forcerow" data-text="Merci" >
                <a class="full-width"><div class="images full"><img src="images/partenaires/SaraE.jpg" /></div></a>
                <div class="to-bottom">
                    <h5>Sara Edward</h5>
                    <p>Rédactrice</p><br />
                    <a href="http://saraedward-hospitality.blogspot.fr" target="_blank" style="text-decoration: none;" class="ty">Sara's blog</a>
                </div>
            </div>
            <div class="element clearfix white col1 row2 remerciement no-padding forcerow" data-text="Merci" >
                <a class="full-width"><div class="images full"><img src="images/partenaires/AlbanC.jpg" /></div></a>
                <div class="to-bottom">
                    <h4>Alban Couturier</h4>
                    <p>Photographe</p><br />
                    <a href="http://www.albancouturier.com" target="_blank" style="text-decoration: none;" class="ty">albancouturier.com</a>
                </div>
            </div>
            <div class="element clearfix white col1 row2 remerciement no-padding forcerow" data-text="Merci" >
                <a class="full-width"><div class="images full"><img src="images/partenaires/NicolasL.jpg" /></div></a>
                <div class="to-bottom">
                    <h4>Nicolas Lobbestael</h4>
                    <p>Photographe</p><br />
                    <a href="http://www.nicolaslobbestael.com" target="_blank" style="text-decoration: none;" class="ty">nicolaslobbestael.com</a>
                </div>
            </div>
            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- fin du bloc remerciement -->

            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- bloc newsletter -->
            <div class="element clearfix white col1 row1 " id="newsletter">
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
            <!--  bloc prese -->
            <div class="element clearfix col1 row1 presse">
                <a href="#filter=.commpresse" class="full">

                </a>
                <br /><br /><br />
                <h3 style="color:white; text-align: center;">Voir </h3>
                <h3 style="color:white; text-align: center;">les communiqués</h3>
                <h3 style="color:white; text-align: center;">de presse</h3>

            </div>
            <div class="element clearfix col1 row1 commpresse">
                <a href="#filter=.presse" class="full">

                </a>
                <br /><br /><br />
                <h3 style="color:white; text-align: center;">Voir </h3>
                <h3 style="color:white; text-align: center;">les articles</h3>
                <h3 style="color:white; text-align: center;">de presse</h3>

            </div>
            <div class="element  clearfix col1 row1 presse white">
                <a href="images/photos/MFM_02_2014.png" data-title="Des plats carrément épatants" data-fancybox-group="presse" class="popup full">
                </a>
                <br /><h3>Maison Française Magazine</h3>
                <h3>Jean-Louis Galesne</h3>
                <br /> <p>Janvier 2015</p>
            </div>

            <div class="element  clearfix col1 row1 presse white">
                <a href="images/photos/GP.jpg" data-title="Des plats carrément épatants" data-fancybox-group="presse" class="popup full">
                </a>
                <br /><h3>Les pieds dans le plat</h3>
                    <h3> Gilles Pudlowski</h3>
                <br /> <p>19 Novembre 2014</p>
            </div>



            <div class="element  clearfix row1 col1 white presse">
                <a href="images/photos/pressegala-big.PNG" data-title="Le + : Le buffet gastronomique et innovant du chef Jordan Delamotte" data-fancybox-group="presse" class="popup full"></a>
                    <br /><h3>Gala</h3>
                <br /><p>Septembre 2014</p>
            </div>
            <div class="element  clearfix  row1 white col1 presse">
                <a href="http://www.sofoodmag.fr/jordan-delamotte.html" target="_blank" class="full"></a>
                    <br /><h3>SoFoodMag.com</h3>
                <br />
                    <p>11 Août 2014</p>
            </div>

            <div class="element  clearfix col1 row1 white presse">
                <a href="images/photos/gasto_modernite_big.jpg" data-title="Gastronomie et Modernité au menu de l'hôtel de Sers" data-fancybox-group="presse" class="popup full"></a>
                <br /><h3>Apollo Magazine</h3>
                <br />
                <p>Mai - Juin 2014</p>


            </div>

            <!-- communiqué de presse -->

            <div class="element  clearfix col1 row1 white commpresse">
                <a href="images/pdf/CP4MAINSHDSHV.pdf" class="full" target="_blank"></a>
                <br /><h3>Dîner à 4 mains by Bessé Signature : 2ème édition</h3>
                <br />
                <p>18 Mai 2015</p>


            </div>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <!-- fin du bloc presse -->

            <div id="news" style="display: none;">
            </div>
            <div id="season" style="display: none;">
            </div>
            <?php if(isset($_GET['actu_id'])){?>

            <img style="display:none;" src="<?php echo $photo ?>">
            <?php } ?>
            <?php if(isset($_GET['season_id'])){?>

            <img style="display:none;" src="<?php echo $photo ?>">
            <?php } ?>
            <div id="recettes" style="display: none;">
            </div>
            <?php if(isset($_GET['recette_id'])){?>

            <img style="display:none;" src="<?php echo $photo ?>">
            <?php } ?>
            <?php if(!isset($_GET['actu_id']) && !isset($_GET['recette_id']) && !isset($_GET['season_id'])){?>

            <img style="display:none;" src="images/photos/www.JD.com-ConvertImage%20copie.jpg">
            <?php } ?>

        </div>
    </div>
<!-- end container -->
</div>
<!-- end content -->
<footer>
    <div class="container">

        <div id="nav-button-down">

        </div>
        <div id="options-down" class="clearfix">
            <?php if($lang=='fr'){ ?>
            <ul class="option-set clearfix" id="option-list-down" data-option-key="filter">
                <li><a href="#filter=.legals">Mentions légales</a></li>
            </ul>
            <?php } if($lang=='en'){ ?>
            <ul class="option-set clearfix" id="option-list-down" data-option-key="filter">
                <li><a href="#filter=.legals">Imprint</a></li>
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
<script src="js/jquery.min.js" type="text/javascript"></script>

<script src="js/responsiveslides.min.js" type="text/javascript"></script>
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
<script src="js/saison.js" type="text/javascript"></script>
<script src="js/recette.js" type="text/javascript"></script>
<script src="js/photo.js" type="text/javascript"></script>
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
