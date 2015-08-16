/**
 * Created by GD on 16/08/15.
 */

$(window).scroll(function(){

    var screen = $(window).width();
    var header = $('header');
    var logo = $('h1#logo a');
    var content = $('#content.index');
    var font = $('#options ul li a');

    var scroll = $(document).scrollTop();
    if(screen < 767){
        if(scroll < 250){
            header.css('top', '-'+scroll+'px');
        }
    }
    else{
        if(scroll <= 100){
            //header.css('top','-'+Math.max(scroll,1)+'px');
            logo.css('background-size','100'- (scroll*0.5)+'%');
            logo.height(195-scroll);
            font.css('font-size',(20-(scroll/10)));
        }

    }

});


// scrolling to top
$('#options ul li a').click(function(){
    $("html, body").animate({ scrollTop: 0 }, "slow");

});