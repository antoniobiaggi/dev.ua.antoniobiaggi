$(function () {
    $(document).ready(function () {
        $('ul.primary li').mouseenter(function(e){
            e.stopPropagation();
            $(this).find('.subholder').addClass('show');
            //$(this).find('ul').addClass('show');
        });
        $('ul.primary li ul').mouseenter(function(e){
            e.stopPropagation();
            $(this).parent().addClass('show');
            //$(this).addClass('show');
        });
        $('ul.primary li').mouseleave(function(e){
            e.stopPropagation();
            $(this).find('.subholder').removeClass('show');
            //$(this).find('ul').removeClass('show');
        });
        $('ul.primary li ul').mouseleave(function(e){
            e.stopPropagation();
            $(this).parent().removeClass('show');
            //$(this).one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){
            //    $(this).parent().css({
            //        display: ''
            //    });
            //});
        });

        fResize();
        $(window).resize(function () {
            fResize();
        });

        function fResize() {
            var winW = $(window).width(),
                winH = $(window).height();
            $('.name-model').each(function(){
                $(this).css({
                    height: ''
                });
                if(winW < 630) {
                    $(this).css({
                        height: $(this).parent().height()
                    })
                }
            });
            $('.text-takes').each(function(){
                $(this).css({
                    height: ''
                });
                if(winW < 630) {
                    $(this).css({
                        height: $(this).parent().find('img').eq(0).height()
                    })
                }
            })
        }
    });
});