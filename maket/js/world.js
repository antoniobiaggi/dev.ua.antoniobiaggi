$(document).ready(function(){
    /****** Selects */
    $('.mairon_CardsItemCardHead__select select').each(function(){
        $(this).siblings('p').text( $(this).children('option:selected').text() );
    });
    $('.mairon_CardsItemCardHead__select select').change(function(){
        $(this).siblings('p').text( $(this).children('option:selected').text() );
    });
//WorldSlider_img

    $('.WorldSlider_img').on('load', function () {
        fResize();
    }).load();


    fResize();
    $(window).resize(function () {
        fResize();
    });

    function fResize() {
        var winW = $(window).width(),
            winH = $(window).height();

        $('.mairon_Title').css({
            height: $('.mairon_WorldSlider').height()
        });

    }
});
