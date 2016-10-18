CategoryFieldsFront = function() {
    var self = this;
    self.wrapper = $('.categoryextrafield');

    self.init = function() {
    }
    self.init();

    /* Methods */
    self.expand = function(sender) {
        var target_wrapper = sender.parents('.categoryextrafield');

        target_wrapper.find('.content a.read-less').fadeIn();
        target_wrapper.find('.content a.read-more').fadeOut();

        target_wrapper.find('.excerpt').hide();
        target_wrapper.find('.content').slideDown();
    }

    self.collapse = function(sender) {
        var target_wrapper = sender.parents('.categoryextrafield');

        target_wrapper.find('.content a.read-less').fadeOut();
        target_wrapper.find('.content a.read-more').fadeIn();

        target_wrapper.find('.excerpt').show();
        target_wrapper.find('.content').slideUp();
    }


    /* Events */
    self.wrapper.find('a.read-more').click(function() {
        self.expand($(this));
        return false;
    })

    self.wrapper.find('a.read-less').click(function() {
        self.collapse($(this));
        return false;
    })


}

$(document).ready(function() {
    cfFront = new CategoryFieldsFront();
})