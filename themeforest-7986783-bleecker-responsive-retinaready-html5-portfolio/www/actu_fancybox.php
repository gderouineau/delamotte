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
        <meta name="author" content="ppandp & guillaume derouineau">
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

    </head>
    <body style="background-color: white;">
    <?php

        $photo = $data['photo'];
        $title = $data['title'];
        $text = $data['text'];
        $day ="";
        $french_month ="";
        $year="";
    ?>
        <div class="element  clearfix auto center">
            <div class="clearfix col2-3 auto no-padding">
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
                <a href="#" class="icons margin like"></a>
                <a href="#" class="icons margin share"></a>
            </article>
        </div>

    </body>
    </html>

<?php
}

