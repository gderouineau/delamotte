/**
 * Created by GD on 21/09/2014.
 */
$(document).ready(function(){

    $("#newsletter_submit").click(function(){

        $.post(
            'newsletter.php',
                {
                    login : $("#newsletter_email").val()

                },

            function(data){
                var newsletter = $("#newsletter").html();
                var temp = newsletter;
                if(data == 'success'){
                    newsletter.html("<p>Nous avons pris votre demande en compte. Vous recevrez désormais les newsletters</p>");
                    setTimeout(function() {
                        newsletter.html(temp);
                    }, 5000);

                }
                else{
                    $("#newsletter").html("<p>un problème est survenu.</p>");
                    setTimeout(function() {
                        newsletter.html(temp);
                    }, 5000);
                }

            }

        );

    });

});