/**
 * Created by GD on 21/09/2014.
 */
$(document).ready(function(){

    $.get(
        'recette.php',

        function(data){

            data = JSON.parse(data);
            var recette_div = $('#recettes');
            if(data.length == 0){
                var none =
                    '<div class="element  clearfix col1 row1 recette white">'+
                        '<p> Aucune recette pour le moment. <br>Vous pouvez cependant vous inscrire &agrave; la newsletter</p>'+
                    '</div>'+
                    '<div class="element clearfix white col1 row1 recette" id="newsletter">'+
                        '<h4>Abonnez-vous à la newsletter.</h4>'+
                        '<form>'+
                            '<p>'+
                                'email: <input type="text" id="newsletter_email" value ="" />'+
                                '<p id="newsletter_submit">Envoyer</p>'+
                            '</p>'+
                        '</form>'+
                    '</div>'
                    ;

                recette_div.after(none);
                $('#container').isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });

            }
            for(var key in data){
                var   id = data[key]['id']
                    , place = data[key]['place']
                    , title = data[key]['title']
                    , text = data[key]['text']
                    , date = new Date(data[key]['date'])
                    , photo = data[key]['photo']
                    , month = date.getMonth()
                    , day = date.getDate()
                    , french_month=get_month(month)
                    , full = ""
                    , resume = ""
                    ;
                /*
                 resume =
                 '<div class="element  clearfix col1 row1 actualité white teaser'+id+'">' +
                 '<a href="#filter=.actualité%3Anot(.teaser'+id+'),+.post'+id+'" class="full"></a>'+
                 '<h3>'+title+'</h3>'+
                 '<div class="borderline"></div>'+
                 '<p class="small">Feb 24, 2014</p>'+
                 '<p>'+text.substr(0,max_resume_length)+'...</p>'+
                 '</div>'
                 ;
                 */
                resume =
                    '<div class="fancybox element  clearfix col1 row1 recette " >' +
                        '<a href="/recette_fancybox.php?id='+id+'" id="fancy_recette_'+id+'" class="full fancy_recette">'+
                            '<div class="images"> <img src="'+photo+'" alt="<a href=\'/recette_fancybox.php?id='+id+'\' class=\'full fancy_recette\'></a>'+title+'" class="slip" id="slip_'+id+'"/> </div>'+
                        '</a>'+
                    '</div>'
                ;

                recette_div.after(resume);
                //$('#container').sliphover();
                //$('#slip_'+id).sliphover();
                $('#container').isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });

            }

        }


    );


    $('.fancy_recette').fancybox({
        type : 'iframe',
        autoScale: true,
        width: 570,
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(105, 105, 105, 0.5)'
                }
            }
        }
    });




});

$(document).ready(function(){
    var $_GET = {};

    document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
        function decode(s) {
            return decodeURIComponent(s.split("+").join(" "));
        }

        $_GET[decode(arguments[1])] = decode(arguments[2]);
    });
    if($_GET['recette_id']){
        var check_exist_actu = setInterval(function() {
            if ($('#fancy_recette_'+$_GET['recette_id']).length) {
                $("#fancy_recette_"+$_GET['recette_id']).fancybox({
                    type : 'iframe',
                    autoScale: true,
                    width: 570,
                    helpers : {
                        overlay : {
                            css : {
                                'background' : 'rgba(105, 105, 105, 0.5)'
                            }
                        }
                    }
                }).trigger('click');

                clearInterval(check_exist_actu);
            }
        }, 100);

    }
});

function get_month(month){
    month = month+1;
    switch (month){
        case 1 :
            return "JANVIER";
            break;
        case 2 :
            return 'FEVRIER';
            break;
        case 3 :
            return 'MARS';
            break;
        case 4 :
            return 'AVRIL';
            break;
        case 5 :
            return 'MAI';
            break;
        case 6 :
            return 'JUIN';
            break;
        case 7 :
            return 'JUILLET';
            break;
        case 8 :
            return  'AOUT';
            break;
        case 9 :
            return 'SEPTEMBRE';
            break;
        case 10 :
            return  'OCTOBRE';
            break;
        case 11 :
            return 'NOVEMBRE';
            break;
        case 12 :
            return 'DECEMBRE';
            break;
        default :
            return null;

    }
}

