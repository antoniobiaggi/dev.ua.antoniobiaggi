$(document).ready(function() {
    $("#gallery li img").hover(function(){
        $('#main-img').attr('src',$(this).attr('src').replace('thumb/', ''));
    });
    var imgSwap = [];
    $("#gallery li img").each(function(){
        imgUrl = this.src.replace('thumb/', '');
        imgSwap.push(imgUrl);
    });
    $(imgSwap).preload();

    $('.colorBox').click(function() {
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.sizeBox').click(function() {
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });

    $(function(){var nice=$(":nicescroll").getNiceScroll(0);$("#div1").html($("#div1").html()+' '+nice.version+' ($:'+$().jquery+')')})

    function doRemove(name) {
        $(name).getNiceScroll().remove();
    };

    $('#accordion').find('.accordion-toggle').click(function(){

        //Expand or collapse this panel
        $(this).next().slideToggle('slow');

        //Hide the other panels
        $(".accordion-content").not($(this).next()).slideUp('fast');

    });

    var vis = true;

    function toggleVisibility() {
        vis = !vis;
        var ns = $("#boxscroll").getNiceScroll();
        (vis) ? ns.show() : ns.hide();
    }

    function toggleDiv() {
        var dv = $("#boxscroll");
        var vv = (dv.css('display')!='none');
        (vv) ? dv.hide() : dv.show();
//	var ns = dv.getNiceScroll();
//	ns.resize();
    }

    $("#boxscroll").niceScroll({touchbehavior:false,cursorcolor:"#00F",cursoropacitymax:0.7,cursorwidth:11,cursorborder:"1px solid #2848BE",cursorborderradius:"8px",background:"#ccc",autohidemode:"scroll"}).cursor.css({"background-image":"url(img/mac6scroll.png)"}); // MAC like scrollbar

    $("#boxscroll2").niceScroll({touchbehavior:false,cursorcolor:"#00F",cursoropacitymax:0.7,cursorwidth:6,background:"#ccc",autohidemode:false});

    $("#owl-demo").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 1,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        singleItem:true

    });
    $("#owl-demo2").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 1,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        singleItem:true

    });

    $('.title').click(function() {
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
        $('.bow_wrap').find('.active').removeClass('active');
        var id = $(this).data('id');
        $('#'+id).addClass('active');
    });

    var strLength3 = 26;
    $('.owl-item .text').each(function(){
        if ($(this).html().length > strLength3) {
            str = $(this).html().substr(0, strLength3);
            $(this).html(str+'...');
        }
    });


});
$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}
