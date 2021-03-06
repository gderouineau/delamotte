<?php
/**
 * Created by PhpStorm.
 * User: GD
 * Date: 19/09/2014
 * Time: 09:55
 */

session_start();
$user_name="";
$user_id = 0;
if(!isset($_SESSION['user'])){
    header('location: connexion.php');
}
else{
    $user_name = $_SESSION['user']['username'];
    $user_id = $_SESSION['user']['id'];
}
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
    <body data-username="<?php echo $user_name; ?>" data-userid="<?php echo $user_id; ?>">
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
                        <a href="admin_photo.php">ajouter une photo</a>

                        <!-- blog form
                        ----------------------------------------------------------------------------------------------->
                        <h3 class="bloginput input">Photo</h3>
                        <input class='bloginput input' type="file" id="blogphotoinput" name="blogphotoinput" >

                        <h3 class="bloginput input">Langue</h3>
                        <label class='bloginput input' for="bloglanguageFRinput">Francais</label>
                        <input class='bloginput input' type="radio" id="bloglanguageFRinput" name="bloglanguageinput" value="fr">
                        <label class='bloginput input' for="bloglanguageENinput">Anglais</label>
                        <input class='bloginput input' type="radio" id="bloglanguageENinput" name="bloglanguageinput" value="en">
                        <label class='bloginput input' for="bloglanguageRUinput">Russe</label>
                        <input class='bloginput input' type="radio" id="bloglanguageRUinput" name="bloglanguageinput" value="ru">

                        <h3 class="bloginput input">Actu ou Saison</h3>
                        <label class='bloginput input' for="blogSAinput">Actualite</label>
                        <input class='bloginput input' type="radio" id="blogSAinput" name="blogActuOrSeasoninput" value="actualite">
                        <label class='bloginput input'  for="blogSSinput">Produit de saison</label>
                        <input class='bloginput input' type="radio" id="blogSSinput" name="blogActuOrSeasoninput" value="saison">

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
                        <h3 class="recetteinput input">Langue</h3>
                        <label class='recetteinput input' for="recettelanguageFRinput">Francais</label>
                        <input class='recetteinput input' type="radio" id="recettelanguageFRinput" name="recettelanguageinput" value="fr">
                        <label class='recetteinput input' for="recettelanguageENinput">Anglais</label>
                        <input class='recetteinput input' type="radio" id="recettelanguageENinput" name="recettelanguageinput" value="en">
                        <label class='recetteinput input' for="recettelanguageRUinput">Russe</label>
                        <input class='recetteinput input' type="radio" id="recettelanguageRUinput" name="recettelanguageinput" value="ru">
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
                            <div id="blogtext" style="text-align: justify;text-justify: inter-word;">
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
                            <p>
                                <div id="recettetext">
                                </div>
                            </p>


                        </article>

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

