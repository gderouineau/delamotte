/**
 * Created by GD on 21/09/2014.
 */

$(window).scroll(function(){
    var s = $(window).scrollTop(),
        d = $(document).height(),
        c = $(window).height();
    var scrollPercentage = ( (d-c) - s);
    if(scrollPercentage < 500){
        if(window.location.hash == '#filter=.actualite')
            showMoreActu(false);
    }
});

function showMoreActu(first) {
    var body = $('body');
    var load_actu = parseInt(body.attr('data-actuid'));
    var current_actu = parseInt(body.attr('data-actucurrent'));
    body.attr('data-actucurrent', (load_actu + 1));

    var lang = body.attr('data-lang');

    if(load_actu == current_actu)
    $.ajax({
        url: 'actualite.php',
        type: 'get',
        data: {actu_id: load_actu, lang : lang},
        dataType: 'json',
        success: function (data) {
            console.log(typeof data);
            var actu_div = $('#news');
            var actu_bienvenue = $("#actu-bienvenue");
            if(data.length == 0){
             var none =
             '<div class="element  clearfix col1 row1 recette white">'+
             '<p> Aucune actualit&eacute; pour le moment. <br>Vous pouvez cependant vous inscrire &agrave; la newsletter</p>'+
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

             actu_div.after(none);
             $('#container').isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });

             }
            var increment = 0;
            for (var key in data) {

                var id = data[key]['id']
                    , location = data[key]['location']
                    , title = data[key]['title']
                    , text = data[key]['text'].replace(/<(?:.|\n)*?>/gm, '')
                    , date = new Date(data[key]['date'].replace(' ', 'T'))
                    , photo = data[key]['photo']
                    , month = date.getMonth()
                    , day = date.getDate()
                    , french_month = get_month(month)
                    , year = date.getFullYear()
                    , max_resume_length_resume = Math.min(50, text.length)
                    , max_resume_length_full = Math.min(300, text.length)
                    , full = ""
                    , resume = ""
                    ;
                increment++;
                var modulo = increment % 6;
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
                 *
                 */

                /* BLOC ACTU DANS ACCUEIL */


                if(first){
                    if(increment <= 3){
                        var noton3="";

                        resume =
                            '<div class="fancybox element  clearfix col1 row1 bienvenue white '+noton3+' ">' +
                                '<a href="actu_fancybox.php?id=' + id + '" id="fancy_actu_' + id + '" class="full fancy_actu"></a>' +
                                '<h3>' + title + '</h3>' +
                                '<div class="borderline"></div>' +
                                '<p class="small">' + day + ' ' + french_month + ' ' + year + '</p>' +
                                //'<p>' + text.substr(0, max_resume_length_resume) + '...</p>' +
                                '</div>'
                        ;
                        actu_bienvenue.before(resume);
                    }
                }

                /* FIN BLOC ACTU DAND ACCUEIL */


                if ((modulo == 4) || (modulo == 1)) {
                    full =
                        '<div class=" fancybox element  clearfix col2 row2 '+location+'  no-padding" id="actu_' + id + '">' +
                        '<a href="actu_fancybox.php?id=' + id + '" id="fancy_actu_' + id + '" class="full fancy_actu"></a>' +
                        '<div class="images" style="overflow:hidden;width:570px;height:280px;">' +
                        '<img src="' + photo + '" alt="' + title + '" />' +
                        '</div>' +

                        '<article class="clearfix col2-3 white white-bottom auto">' +
                        '<h3>' + title + '</h3>' +
                        '<div class="borderline"></div>' +
                        '<p class="small">' + day + ' ' + french_month + ' ' + date.getFullYear() + ' ' + '&nbsp;&middot;&nbsp; Jordan-Delamotte.com' + '</p>' +
                        '<p style="text-align: justify;text-justify: inter-word;">' + text.substr(0, max_resume_length_full) + '...</p>' +
                        '<div class="break"></div>' +
                        '<a href="#" class="icons margin like"></a> <a href="#" class="icons margin share"></a>' +
                        '</article>' +
                        '</div>'
                    ;
                    actu_div.before(full);
                    resume =
                        '<div class="fancybox element  clearfix col1 row1 '+location+' white max-display-2">' +
                            '<a href="actu_fancybox.php?id=' + id + '" id="fancy_actu_' + id + '" class="full fancy_actu"></a>' +
                            '<h3>' + title + '</h3>' +
                            '<div class="borderline"></div>' +
                            '<p class="small">' + day + ' ' + french_month + ' ' + year + '</p>' +
                            //'<p>' + text.substr(0, max_resume_length_resume) + '...</p>' +
                        '</div>'
                    ;
                    actu_div.before(resume);
                }


                else {
                    resume =
                        '<div class="fancybox element  clearfix col1 row1 '+location+' white ">' +
                        '<a href="actu_fancybox.php?id=' + id + '" id="fancy_actu_' + id + '" class="full fancy_actu"></a>' +
                        '<h3>' + title + '</h3>' +
                        '<div class="borderline"></div>' +
                        '<p class="small">' + day + ' ' + french_month + ' ' + year + '</p>' +
                            //'<p>' + text.substr(0, max_resume_length_resume) + '...</p>' +
                        '</div>'
                    ;
                    actu_div.before(resume);

                }
                if (data.length != 0)
                    $('#container').isotope('reloadItems').isotope({sortBy: 'original-order'});
                    body.attr('data-actuid', (load_actu + 1));

            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }



    });
}
$(document).ready(function(){
    showMoreActu(true);

    $('.fancy_actu').fancybox({
        type : 'iframe',
        padding : 0,
        margin : 0,
        autoScale: true,
        showCloseButton : true,
        width: "100%",
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
    if($_GET['actu_id']){
        var check_exist_actu = setInterval(function() {
            if ($('#fancy_actu_'+$_GET['actu_id']).length) {
                $("#fancy_actu_"+$_GET['actu_id']).fancybox({
                    type : 'iframe',
                    autoScale: true,
                    width: 788,
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

