$(document).ready(function() {

    var events = ['swipeLeft','swipeRight'];

    $('.popup-gallery').each(function(){
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            fixedContentPos: 'true',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    //return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                    return item.el.attr('title');
                }
            }
        });
    });

    $('.popup-gallery')
        .on('mfpOpen', function(e) {
            console.log('mfpOpen');
            addSwipeTo('.mfp-wrap');
        });

    function EventHandler(event) {
        console.log(event.type);
    }

    var addSwipeTo = function(selector) {
        $(selector).swipe("destroy");
        $(selector).swipe( {
            swipeLeft:function(event, direction, distance, duration) {
                console.log('swipeLeft');
                $('.mfp-arrow-right').click();
            },
            swipeRight:function(event, direction, distance, duration) {
                console.log('swipeRight');
                $('.mfp-arrow-left').click();
            },
            threshold:30,
            allowPageScroll:"vertical",
            excludedElements:".noSwipe"
        });
    };

    addSwipeTo('.mfp-wrap');

    fResize();
    $(window).resize(function () {
        fResize();
    });
    $('.popup-gallery>a>img').on('load', function () {
        fResize();
    }).load();

    function fResize() {
        var winW = $(window).width(),
            winH = $(window).height();

        $('.popup-gallery-hover-inner').each(function(){
            var obj = $(this);
            console.log(obj.parent().innerWidth(), obj.width());
            var targL = Math.round((obj.parent().innerWidth()-obj.width())/2);
            var targT = Math.round((obj.parent().height()-obj.height())/2);
            obj.css({
                left: targL,
                top: targT
            })
        });
    }

});

