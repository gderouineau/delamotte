/**
 * Created by GD on 21/09/2014.
 */
$(document).ready(function(){

    $("#newsletter_submit").click(function(){

        $.post(
            'newsletter.php',
            {
                email : $('#newsletter_email').val()
            },


            function(data){
                var newsletter = $("#newsletter").html();
                if(data == 'success'){
                    $('#newsletter').html("<p>Nous avons pris votre demande en compte. Vous recevrez désormais les newsletters.</p>");
                    setTimeout(function() {
                        $('#newsletter').html(newsletter);
                    }, 5000);

                }
                else if (data == 'existing'){
                    $('#newsletter').html("<p>Vous vous étiez déjà abonné. Nous avons réactivé votre compte.</p>");
                    setTimeout(function() {
                        $('#newsletter').html(newsletter);
                    }, 5000);
                }
                else{

                    $('#newsletter').html("<p>Une erreur est survenue. Merci de nous excuser, nous tentons de régler le problème au plus vite.</p>");
                    setTimeout(function() {
                        $('#newsletter').html(newsletter);
                    }, 5000);
                }

            }

        );

    });

});

//"<p>Une erreur est survenue. Merci de nous excuser, nous tentons de régler le problème au plus vite.</p>"