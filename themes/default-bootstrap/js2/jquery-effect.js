$(document).ready(function () {

    // open mob menu
    $('.open-menu').click(function () {
        $('.mobile-navigation-menu, .mobile-navigation-menu-back').fadeIn(500);
    });

    // close mob menu
    $('.close-menu').click(function () {
        $('.mobile-navigation-menu, .mobile-navigation-menu-back').fadeOut(500);
    });

    $('.wrapp-mob-menu').scrollbar({
        //ignoreOverlay: true,
        disableBodyScroll: true
    });

});
// end READY