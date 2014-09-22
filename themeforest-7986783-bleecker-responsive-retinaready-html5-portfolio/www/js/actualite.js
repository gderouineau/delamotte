/**
 * Created by GD on 21/09/2014.
 */
$(document).ready(function(){

    $.post(
        'actualite.php',
        {
            news : 'all'
        },


        function(data){
            for(var key in data){
                var   id = data[key]['id']
                    , place = data[key]['place']
                    , title = data[key]['title']
                    , text = data[key]['text']
                    , date = data[key]['date']
                    , photo = data[key]['photo']
                    , month = date.getMonth()
                    , day = date.getDate()
                    , french_month=get_month(month)
                ;

                var resume =
                    '<div class="element  clearfix col1 row1 blog white teaser'+id+'">' +
                        '<a href="#filter=.blog%3Anot(.teaser'+id+'),+.post'+id+'" class="full"></a>'+
                        '<h3>'+title+'</h3>'+
                        '<div class="borderline"></div>'+
                        '<p class="small">Feb 24, 2014</p>'+
                        '<p>'+text.substr(0,100)+'...</p>'+
                    '</div>'
                    ;
                var full =
                    '<div class="element  clearfix col3 row2 post post'+id+' auto">'+
                        '<div class="clearfix col3 row2 auto no-padding">'+
                            '<div class="images">' +
                                '<a href="#filter=.blog">'+
                                    '<div class="close"></div>'+
                                '</a>' +
                                '<img src="'+photo+'" alt="'+title+'" />'+
                            '</div>'+
                        '</div>'+
                        '<article class="clearfix col2 row3 white white-bottom auto">'+
                            '<h3>'+title+'</h3>'+
                            '<div class="borderline"></div>'+
                            '<p class="small">'+day + ' ' + french_month + ' ' + date.getFullYear() + ' ' + '&nbsp;&middot;&nbsp; par Jordan Delamotte'+'</p>'+
                            text+
                            '<div class="break"></div>'+
                            '<a href="#" class="icons margin like"></a> <a href="#" class="icons margin share"></a>'+
                        '</article>'+
                    '</div>'
                ;
                var actu_div = $('#news');
                actu_div.after(full);
                actu_div.after(resume);
            }
        }


    );

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

