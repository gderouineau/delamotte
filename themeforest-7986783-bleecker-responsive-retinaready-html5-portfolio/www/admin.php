<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 19/09/2014
 * Time: 09:55
 */



if(isset($_POST['email']) && isset($_POST['mdp'])){

    if(($_POST['email'] == 'chef.jordandelamotte@gmail.com') && ($_POST['mdp'] == 'kotek44972')){



?>

<!DOCTYPE html>

<head xmlns="http://www.w3.org/1999/html">

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
                        <br>
                        <h3 class="bloginput input">Photo</h3>
                        <input class='bloginput input' type="file" id="blogphotoinput" name="blogphotoinput" >
                        <h3 class="bloginput input">Titre</h3>
                        <textarea class="bloginput input" id="blogtitleinput" name="blogtitleinput" onkeyup="blogChange();"></textarea>
                        <h3 class="bloginput input">Texte</h3>
                        <textarea class="bloginput input" id="blogtextinput" name="blogtextinput" onkeyup="blogChange();"></textarea>
                        <p class="submit input bloginput" id="submit_blog" >Envoyer</p>
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

                    <div class="element  clearfix col2-3 post auto center input bloginput">
                        <div class="clearfix col2-3 auto no-padding">
                            <div class="images">
                                <img id='blogphoto' src="" alt="" />
                            </div>
                        </div>
                        <article class="clearfix col2-3 white white-bottom auto">
                            <h3 id="blogtitle"></h3>
                            <div class="borderline"></div>
                            <p class="small" id="blogpostdate"></p>
                            <div id="blogtext">
                            </div>
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
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/form.js" type="text/javascript"></script>
    <script src="js/check_news.js" type="text/javascript"></script>
    <!-- end javascipt script loading
    ------------------------------------------------------------------------------------------------------------------->

    </body>

</html>

<?php
    }
    else{
        ?>
        <form method="POST" action="admin.php">
            <p>
                <h4>Connexion</h4>
                email: <input type="text" id="newsletter_email" name="email" value ="" />
                mdp: <input type="password" name="mdp" value=""/>
                <input type="submit" value="envoyer">
            </p>
        </form>
        <?php
    }

}
else{
    ?>
    <form method="POST" action="admin.php">
        <p>
        <h4>Connexion</h4>
        email: <input type="text" id="newsletter_email" name="email" value ="" />
        mdp: <input type="password" name="mdp" value=""/>
        <input type="submit" value="envoyer">
        </p>
    </form>
<?php
}
?>