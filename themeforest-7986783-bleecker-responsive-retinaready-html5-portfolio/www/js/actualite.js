/**
 * Created by GD on 21/09/2014.
 */
$(document).ready(function(){

    $.get(
        'actualite.php',

        function(data){

            data = JSON.parse(data);
            var actu_div = $('#news');
            for(var key in data){
                var   id = data[key]['id']
                    , place = data[key]['place']
                    , title = data[key]['title']
                    , text = data[key]['text'].replace(/<(?:.|\n)*?>/gm, '')
                    , date = new Date(data[key]['date'])
                    , photo = data[key]['photo']
                    , month = date.getMonth()
                    , day = date.getDate()
                    , french_month=get_month(month)
                    , year = date.getFullYear()
                    , max_resume_length =  Math.min(100, text.length)
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
                    '<div class="fancybox element  clearfix col1 row1 actualite white ">' +
                        '<a href="actu_fancybox.php?id='+id+'" id="fancy_actu_'+id+'" class="full fancy_actu"></a>'+
                        '<h3>'+title+'</h3>'+
                        '<div class="borderline"></div>'+
                        '<p class="small">'+day+' '+french_month+' '+year+'</p>'+
                        '<p>'+text.substr(0,max_resume_length)+'...</p>'+
                    '</div>'
                    ;
                /*
                full =
                    '<div class="element  clearfix col2-3 post post'+id+' auto center" id="actu_'+id+'">'+
                        '<div class="clearfix col2-3 auto no-padding">'+
                            '<div class="images">' +
                                '<a href="#filter=.actualité">'+
                                    '<div class="close"></div>'+
                                '</a>' +
                                '<img src="'+photo+'" alt="'+title+'" />'+
                            '</div>'+
                        '</div>'+
                        '<article class="clearfix col2-3 white white-bottom auto">'+
                            '<h3>'+title+'</h3>'+
                            '<div class="borderline"></div>'+
                            '<p class="small">'+day + ' ' + french_month + ' ' + date.getFullYear() + ' ' + '&nbsp;&middot;&nbsp; par Jordan Delamotte'+'</p>'+
                            text+
                            '<div class="break"></div>'+
                            '<a href="#" class="icons margin like"></a> <a href="#" class="icons margin share"></a>'+
                        '</article>'+
                    '</div>'
                ;
                */
                actu_div.after(full);
                actu_div.after(resume);
                $('#container').isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
            }

        }


    );


    $('.fancy_actu').fancybox({
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
    if($_GET['actu_id']){
        var check_exist_actu = setInterval(function() {
            if ($('#fancy_actu_'+$_GET['actu_id']).length) {
                $("#fancy_actu_"+$_GET['actu_id']).fancybox({
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

