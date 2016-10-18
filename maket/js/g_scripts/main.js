(function ($) {
    $(document).ready(function () {
        // discount block hide
        $('.catalog-close').on('click', function () {
            $(this).parent().slideUp(500);
        });

        // filters toggle select
        $('.catalog-selectSingle .bg').on('click', function () {
            $(this).parent().parent().find('.disc').toggleClass('checked');
        });
        $('.catalog-selectSingle .disc').on('click', function () {
            $(this).toggleClass('checked');
        });

        // filters toggle sizes
        $('.catalog-singleSize').on('click', function () {
            $(this).toggleClass('yellowBg');
        });

        // filters toggle colors
        $('.catalog-singleColor').on('click', function () {
            $(this).toggleClass('border');
        });

        // jquery ui price slider
        $('#catalog-sliderRange').slider({
            range: true,
            min: 200,
            max: 2000,
            values: [280, 990],
            slide: function (event, ui) {
                $('#amount1').val($('#catalog-sliderRange').slider('values', 0));
                $('#amount2').val($('#catalog-sliderRange').slider('values', 1));
            }
        });
        $('#amount1').val($('#catalog-sliderRange').slider('values', 0));
        $('#amount2').val($('#catalog-sliderRange').slider('values', 1));

        // scroll to top
        $('.catalog-toTop').on('click', function () {
            $('body, html').animate({scrollTop: 0}, 1500);
        });

        // popup slider
        $('.popupSliderBig').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            mobileFirst: true,
            asNavFor: ('.popupSliderSmall')
        });
        $('.popupSliderSmall').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ('.popupSliderBig'),

            mobileFirst: true,
            arrows: false,
            focusOnSelect: true
        });

        // popup call and close
        $('.popup').on('click', function () {
            $('.catalog-viewPort').css({'visibility': 'visible'});
        });
        $('.popupClose').on('click', function () {
            $('.catalog-viewPort').css({'visibility': 'hidden'});
        });

        //popup share links
        $('.share').on('click', function () {
            $(this).find('.shareLinksWrap').fadeToggle(500);
        });

        // filters call and close
        $('.addFilters').on('click', function () {
            $('.catalog-select').slideDown(500);
            $('.deleteFilters').fadeIn(500);
        });
        $('.deleteFilters').on('click', function () {
            $('.catalog-select').slideUp(500);
            $(this).fadeOut(500);
        });

        //popup toggle sizes
        $('.size').on('click', function () {
            $(this).toggleClass('sizeColor');
        });

        // popup change colors
        $('.color1').on('click', function () {
            $(this).parent().addClass('singleBorder');
            $('.color2').parent().removeClass('singleBorder');
            $('.color3').parent().removeClass('singleBorder');
        });
        $('.color2').on('click', function () {
            $(this).parent().addClass('singleBorder');
            $('.color1').parent().removeClass('singleBorder');
            $('.color3').parent().removeClass('singleBorder');
        });
        $('.color3').on('click', function () {
            $(this).parent().addClass('singleBorder');
            $('.color1').parent().removeClass('singleBorder');
            $('.color2').parent().removeClass('singleBorder');
        });

        // accordeon

        $('.topPart').on('click', function () {
            $(this).toggleClass('open').next().slideToggle(500);
        });
    });
})(jQuery);