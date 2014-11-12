<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />

    <style media="screen" type="text/css">
        body{background-color: #000000;}
        #contenu{ margin: auto auto; width:250px; background-color: white;font-family: "Open Sans", Arial, Helvetica, sans-serif;
            padding: 5px 15px;
            text-decoration: none;
            text-transform: uppercase;
            height: 50%;
            font-size: 12px;
            line-height: 19px;
            letter-spacing: 2px;
            font-weight: 400;
           }
        #contact { display: block; width: auto; margin: 0; padding: 0px; border: none; margin-top:9px; overflow:visible }

        /* Form style */

        #contact label { display: none; float: none; height:0px; }
        input, textarea, select { width:210px; padding:21px 0px; font: 15px Georgia, "Times New Roman", Times, serif; color:#555; border:0; border-bottom:1px solid #d3d3d3; -webkit-transition: all 0.2s ease 0s; -moz-transition: all 0.2s ease 0s; -o-transition: all 0.2s ease 0s; transition: all 0.2s ease 0s; float:none; display:block; margin:0px; font-style:italic; -webkit-appearance: none; text-align:center; background:none}
        #contact textarea { margin-bottom:0px; margin-right:0px !important; resize: none;}
        input:focus, textarea:focus, select:focus {  }
        input.submit { display:inline-block;  width:auto; border:0px; padding:0; padding-top:13px; color:#8d8d8d; background:none; font-size:15px; line-height:21px; font-style:normal; text-transform:uppercase; font-family:'Open Sans', 'Helvetica Neue', Arial, Helvetica, sans-serif; letter-spacing:1px; cursor:pointer}
        #contact input.submit:hover { color:#555; }


        #contact fieldset { padding-left:0px;}

        #contact span.required { padding-left:28px; background:url(../images/bg-bullet.png) no-repeat 12px 5px; margin-left:-28px; }

        #message { margin: 0; padding: 0px; z-index:200; height:auto; /*width:280px*/ }
        /*#success_page { width:280px  }*/
        /*#success_page h3 {font-size:15px; font-weight:600; padding:34px 40px 0 40px; margin-bottom:-6px; }
        #success_page p {position:relative !important; padding-bottom:35px;  font-style:italic;}*/

        .error_message { display: block; height:auto; /*width:280px; padding:19px 0px 19px 0px;*/ color:#8a1f11; font-style:italic; }

        .loader { display:none; }

        #comments {height: 185px; }

    </style>
</head>

<body>
    <div id="contenu">
        <div id="contact">
            <h4>Connexion à l'interface administrateur</h4>
            <form>
                    <label for="username" accesskey="U"><span class="required">Email</span></label>
                    <input name="name" type="text" id="username" size="30" title="Email" />

                    <label for="password" accesskey="P"><span class="required">Mot de Passe</span></label>
                    <input name="password" type="password" id="password" size="30" title="Mot de passe" />

                    <input type="submit" id="submit" value="Se connecter" />
            </form>
        </div>
    </div>
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            console.log('ready');
            setTimeout(function(){console.log('ready + 1000ms')},1000);
            $("#submit").click(function(){
                console.log('submit');
                setTimeout(function(){
                    console.log('submit + 1000');
                }, 1000);
                $.post(
                    'check_connexion.php',
                     {
                        username : $("#username").val(),
                        password : $("#password").val()
                     },

                    function(data){
                        if(data == 'Success'){
                            console.log('success');
                           //$('#content').html('Vous avez été connecté avec succès vous allez être dirigé vers l\'interface administrateur');

                           setTimeout(function(){console.log('success + 5000');
                           //
                                    }, 5000
                            );
                        }
                        else{
                            //$('#content').html('Un problème est survenu lors de votre connexion. Soit votre identifiant soit votre mot de passe est incorrect. ');
                            console.log('failed');
                            setTimeout( function(){console.log('failed + 5000')
                               //window.location ='http://jordan-delamotte.com/connexion.html' ;
                                    }, 5000
                            );
                        }
                    },

                    'text'
                );

            });

        });

    </script>

</body>
</html>