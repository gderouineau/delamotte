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


function urldecode(str) {
    return decodeURIComponent((str+'').replace(/\+/g, '%20'));
}