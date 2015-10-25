/**
 * Created by GD on 15/01/15.
 */

$(window).scroll(function(){
    var s = $(window).scrollTop(),
        d = $(document).height(),
        c = $(window).height();
    var scrollPercentage = (s / (d-c)) * 100;
    if(scrollPercentage > 80){
        if(window.location.hash == '#filter=.photo')
            showMorePhotos();
    }
});
/*
function showMorePhotos(){

    var body = $('body');
    var id = parseInt(body.attr('data-showphoto'));
    var id_max = parseInt(body.attr('data-showphotomax'));
    if(id<id_max) {
        var blocs = $('.bloc-' + (id + 1));
        body.attr('data-showphoto', (id + 1));
        var imgs = blocs.find('img');
        imgs.each(function () {
            var $el = $(this);
            var data = $el.attr('data-src');
            data = urldecode(data);
            //console.log(data);
            $el.attr('src', data);
            //console.log($el);
        });
        blocs.show();
        $('#container').isotope('reloadItems').isotope({sortBy: 'original-order'});
    }

}

*/
function urldecode(str) {
    return decodeURIComponent((str+'').replace(/\+/g, '%20'));
}

$(document).ready(function(){


});


/**
 * Created by GD on 21/09/2014.
 */

$(window).scroll(function(){
    var s = $(window).scrollTop(),
        d = $(document).height(),
        c = $(window).height();
    var scrollPercentage = ( (d-c) - s);
    if(scrollPercentage < 500){
        if(window.location.hash == '#filter=.photo')
            showMorePhotos();
    }
});

function showMorePhotos() {
    var body = $('body');
    var load_photo = parseInt(body.attr('data-photoid'));
    var current_photo = parseInt(body.attr('data-photocurrent'));
    body.attr('data-photocurrent', (load_photo + 1));

    if(load_photo == current_photo) {
        $.ajax({
            url: 'photo.php',
            type: 'get',
            data: {photo_id: load_photo},
            dataType: 'json',
            success: function (data) {
                //console.log(JSON.stringify(data));
                var photo_div = $('#photos');
                var increment = 0;
                for (var key in data) {

                    var id = data[key]['id'], url_small = data[key]['url_small'], url_big = data[key]['url_big'], title_short = data[key]['title_short'], title_long = data[key]['title_long'], div = "", divTitle = ""
                        ;
                    increment++;


                    /*
                     var modulo = increment % 2;


                     if (modulo == 1) {
                     div =
                     '<div class="element  clearfix col2 row2 photo force">'+
                     '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                     '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                     '</a>'+
                     '</div>'
                     ;
                     photo_div.before(div);
                     divTitle =
                     '<div class="element  clearfix col2 row1 photo  min-display-3" style="">'+
                     '<p style="color: white ; text-align: center; vertical-align: middle;line-height: 280px;height: 280px;font-size: 17px;"  class="">'+title_long+'</p>'+
                     '</div>'
                     ;
                     photo_div.before(divTitle);
                     divTitle =
                     '<div class="element clearfix col1 row2 photo  min-display-2 max-display-4" style="">'+
                     '<p style="color: white ; text-align: center; vertical-align: middle;line-height: 570px;height: 570px;font-size: 17px;"  class="">'+title_long+'</p>'+
                     '</div>'
                     ;
                     photo_div.before(divTitle);
                     }
                     else{
                     divTitle =
                     '<div class="element clearfix col1 row2 photo  min-display-2 max-display-4" style="">'+
                     '<p style="color: white ; text-align: center; vertical-align: middle;line-height: 570px;height: 570px;font-size: 17px;"  class="">'+title_long+'</p>'+
                     '</div>'
                     ;
                     photo_div.before(divTitle);
                     div =
                     '<div class="element  clearfix col2 row2 photo force">'+
                     '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                     '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                     '</a>'+
                     '</div>'
                     ;
                     photo_div.before(div);

                     divTitle =
                     '<div class="element  clearfix col2 row1 photo  min-display-3" style="">'+
                     '<p style="color: white ; text-align: center; vertical-align: middle;line-height: 280px;height: 280px;font-size: 17px;"  class="">'+title_long+'</p>'+
                     '</div>'
                     ;
                     photo_div.before(divTitle);

                     }
                     */

                    var modulo = increment % 9;
                    if (modulo == 1)
                    {
                        div =
                            '<div class="element  clearfix col2 row2 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    else if(modulo == 2){
                        div =
                            '<div class="element  clearfix col2 row1 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    else if(modulo == 3){
                        div =
                            '<div class="element  clearfix col1 row1 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    else if(modulo == 4){
                        div =
                            '<div class="element  clearfix col1 row3 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    else if(modulo == 5){
                        div =
                            '<div class="element  clearfix col1 row1 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    else if(modulo == 6){
                        div =
                            '<div class="element  clearfix col2 row2 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    else if(modulo == 7){
                        div =
                            '<div class="element  clearfix col1 row2 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    else if(modulo == 8){
                        div =
                            '<div class="element  clearfix col3 row1 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    else if(modulo == 0){
                        div =
                            '<div class="element  clearfix col4 row2 photo force">'+
                            '<a class="full popup" href="'+url_big+'" data-title="'+title_long+'" data-fancybox-group="plat" >'+
                            '<div class="images"> <img src="'+url_small+'" alt="'+title_short+'" class="slip" /> </div>'+
                            '</a>'+
                            '</div>'
                        ;
                    }
                    photo_div.before(div);


                    fancy_photo();
                    if (data.length != 0)
                        $('#container').


                            isotope('reloadItems').isotope({sortBy: 'original-order'});
                    body.attr('data-photoid', (load_photo + 1));

                }

            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }


        });
    }
}
$(document).ready(function(){
    showMorePhotos();

});

function fancy_photo(){

    jQuery("a.popup, a[rel=group]").fancybox({
        //		'transitionIn'	: 'elastic',
        //		'transitionOut'	: 'none'
        closeClick : true,
        helpers : {
            overlay : {
                locked : false
            }
        }
    });
    if (document.documentElement.clientWidth > 959) {
        $(function(){
            $('img.slip').each(function(){
                var a = $(this).parent().parent('a');
                var href = a.attr('href'),
                    data_title = a.attr('data-title'),
                    data_fancybox_group = a.attr('data-fancybox-group')
                    ;
                if(href != undefined){
                    var new_a =
                            '<a ' +
                                'class="popup full" '+
                                'href="'+href+'" ' +
                                'data-title="'+data_title+'" ' +
                                'data-fancybox-group="'+data_fancybox_group+'"' +
                                '>' +
                                '</a>'
                        ;
                    $(this).attr('alt', new_a + $(this).attr('alt'));
                }
            });
        });
        $(function(){
            $('#container').sliphover({
                target  : '.slip',
                caption : 'alt',
                duration: '300'
            });
            $('#content').sliphover({
                target : '.slipdiv',
                caption : 'data-text',
                duration : '300'
            });
        })
    }
    else{
        $('img.slip').removeClass('slip');
    }


}

$(document).ready(function(){
    var width = document.documentElement.clientWidth;
    var $photoContact = $('#nicoise_contact');
    var src = 'images/contact/img_contact';
    var ext = '.jpeg';
    if(width <= 767){
        $photoContact.attr('src',src+'1x1'+ext);
    }
    else if(width <= 959){
        $photoContact.attr('src',src+'2x2'+ext);

    }
    else{
        $photoContact.attr('src',src+'3x3'+ext);

    }
});

