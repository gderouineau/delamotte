<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 19/09/2014
 * Time: 09:55
 */

?>

<!DOCTYPE html>

    <head>

    <!-- start stylesheets
    ------------------------------------------------------------------------------------------------------------------->
    <link href="css/admin.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />

    <!-- start stylesheets
    ------------------------------------------------------------------------------------------------------------------->

</head>
    <body>
        <!-- start content
        --------------------------------------------------------------------------------------------------------------->
        <div id="content">
            <!-- start container
            ----------------------------------------------------------------------------------------------------------->
            <div id="container">
                <!-- start form
                ------------------------------------------------------------------------------------------------------->
                <form method="post" action="" name="adminform" id="adminform" autocomplete="off">
                    <fieldset>
                        <h2>Blog  <input class="field" type="checkbox" name="bloginput" value="blog" onchange="showContent();"/></h2>
                        <h3 class="bloginput input">titre</h3>
                        <textarea class="bloginput input" id="blogtitleinput" onkeypress="blogChange();"></textarea>
                    </fieldset>
                </form>
                <!-- end form
                ------------------------------------------------------------------------------------------------------->
                <!-- start separation
                ------------------------------------------------------------------------------------------------------->
                <div id="separation">

                </div>
                <!-- end separation
                ------------------------------------------------------------------------------------------------------->
                <!-- start previsualisation
                ------------------------------------------------------------------------------------------------------->
                <div id="previsual">

                    <div class="element  clearfix col2-3 post post4 auto center">
                        <div class="clearfix col2-3 auto">
                            <div class="images"><a href="#filter=.blog">
                                    <div class="close"></div>
                                </a><img src="images/blog04.jpg" alt="Blog Post" /> </div>
                        </div>
                        <article class="clearfix col2-3 white white-bottom auto">
                            <h3 id="blogtitle"></h3>
                            <div class="borderline"></div>
                            <p class="small">Feb 24, 2014 &nbsp;&middot;&nbsp; by Admin</p>
                            <p> Maecenas est lorem, imperdiet sed adipiscing et, fringilla eget justo. Etiam accumsan, elit ac tempus tincidunt, neque diam egestas nibh, a laoreet libero ante sed magna. Sed dictum, dui sed ultricies sollicitudin. </p>
                            <h4>Services</h4>
                            <ul class="unordered-list column-count2">
                                <li>Photography: Vestibulum erat wisi, condimentum sed, ornare sit amet, wisi. </li>
                                <li>Webdesign: Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</li>
                                <li>Illustration: <a href="#">This is a link</a> in turpis pulvinar facilisis. Ut felis.</li>
                                <li>Logo: Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</li>
                            </ul>
                            <div class="break"></div>
                            <a href="#" class="icons margin like"></a> <a href="#" class="icons margin share"></a> </article>
                    </div>
                </div>
                <!-- end previsualisation
                ------------------------------------------------------------------------------------------------------->
            </div>
            <!-- end container
            ----------------------------------------------------------------------------------------------------------->
        </div>
        <!-- end content
        --------------------------------------------------------------------------------------------------------------->





    <!-- start javascipt script loading
    ------------------------------------------------------------------------------------------------------------------->

    <script src="js/form.js" type="text/javascript"></script>
    <!-- end javascipt script loading
    ------------------------------------------------------------------------------------------------------------------->

    </body>

</html>