(function($){
	$(document).ready(function(){
		var form = $('#bestkit_geoipredirect_form');
		form.find('input[name="type"]').click(function(){
			if ($(this).val() == 'ip') {
				form.find('textarea#countries').parents('.form-group:first').hide();
				form.find('textarea#cities').parents('.form-group:first').hide();

				form.find('textarea#ip_list').parents('.form-group:first').show();
			} else {
				form.find('textarea#ip_list').parents('.form-group:first').hide();

				form.find('textarea#countries').parents('.form-group:first').show();
				form.find('textarea#cities').parents('.form-group:first').show();
			}
		});

		form.find('input[name="type"]:checked').click();
	});
})(jQuery);