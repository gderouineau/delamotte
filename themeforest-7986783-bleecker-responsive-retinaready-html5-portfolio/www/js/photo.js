/**
 * Created by GD on 15/01/15.
 */


function showMorePhotos(){

    var body = $('body');
    var id = parseInt(body.attr('data-showphoto'));
    var blocs = $('.bloc-' + (id+1));
    body.attr('data-showphoto' , (id+1));
    console.log(id+1);
    var imgs = blocs.find('img');
    imgs.each(function(){
        var $el = $(this);
        var data = $el.attr('data-src');
        data = urldecode(data);
        //console.log(data);
        console.log($el);
        $el.attr('src',data);
        //console.log($el);
    });
    blocs.show();
    $('#container').isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });

}


function urldecode(str) {
    return decodeURIComponent((str+'').replace(/\+/g, '%20'));
}