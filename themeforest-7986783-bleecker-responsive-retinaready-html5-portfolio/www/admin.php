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
                        <h2>Actualit&eacute;  <input class="field" type="radio" id="bloginput" name="bothinput" value="blog" onchange="showContent();"/></h2>
                        <br>
                        <h2>Recette  <input class="field" type="radio" id="recetteinput" name="bothinput" value="recette" onchange="showContent();"/></h2>
                        <br>

                        <!-- blog form
                        ----------------------------------------------------------------------------------------------->
                        <h3 class="bloginput input">Photo</h3>
                        <input class='bloginput input' type="file" id="blogphotoinput" name="blogphotoinput" >
                        <h3 class="bloginput input">Titre</h3>
                        <textarea class="bloginput input" id="blogtitleinput" name="blogtitleinput" onkeyup="blogChange();"></textarea>
                        <h3 class="bloginput input">Texte</h3>
                        <textarea class="bloginput input" id="blogtextinput" name="blogtextinput" onkeyup="blogChange();"></textarea>
                        <p class="submit input bloginput" id="submit_blog" >Envoyer</p>
                        <!-- end blog form
                        ----------------------------------------------------------------------------------------------->

                        <!-- recette form
                        ----------------------------------------------------------------------------------------------->
                        <h3 class="recetteinput input">Photo</h3>
                        <input class='recetteinput input' type="file" id="recettephotoinput" name="recettephotoinput" >
                        <h3 class="recetteinput input">Nombre de personnes</h3>
                        <input class='recetteinput input' type="number" id="recettenbpersinput" name="recettenbpersinput" >
                        <h3 class="recetteinput input">Ingr&eacute;dients</h3>
                        <div  class='recetteinput input' id="div_ingredients" onclick="recetteChange();" onkeyup="recetteChange();">
                        </div>
                        <p class="recetteinput input" onclick='addIngredient()'>Ajouter un ingr&eacute;dient</p>
                        <h3 class="recetteinput input">Titre</h3>
                        <textarea class="recetteinput input" id="recettetitleinput" name="recettetitleinput" onkeyup="recetteChange();"></textarea>
                        <h3 class="recetteinput input">Texte</h3>
                        <textarea class="recetteinput input" id="recettetextinput" name="recettetextinput" onkeyup="recetteChange();"></textarea>
                        <p class="submit input recetteinput" id="submit_recette" >Envoyer</p>
                        <!-- end recette form
                        ----------------------------------------------------------------------------------------------->

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
                    <!-- start blog previsualisation
                    --------------------------------------------------------------------------------------------------->
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
                    <!-- end blog previsualisation
                    --------------------------------------------------------------------------------------------------->

                    <!-- start recette previsualisation
                    --------------------------------------------------------------------------------------------------->
                    <div class="element  clearfix col2-3 post auto center input recetteinput">
                        <div class="clearfix col2-3 auto no-padding">
                            <div class="images">
                                <img id='recettephoto' src="" alt="" />
                            </div>
                        </div>
                        <article class="clearfix col2-3 white white-bottom auto">
                            <h3 id="recettetitle"></h3>
                            <p class="small" id="recettepostdate"></p>
                            <div class="borderline"></div>
                            <h4>Ingr&eacute;dients</h4>
                            <p class="small" id="recetteNbPers"></p>
                            <ul class="unordered-list column-count2" id="recetteIng">
                            </ul>
                            <h4>Pr&eacute;paration</h4>
                            <p><div id="recettetext"></p>
                            </div>
                    </div>
                    <!-- end recette previsualisation
                    --------------------------------------------------------------------------------------------------->
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
    <script src="js/check_recette.js" type="text/javascript"></script>
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