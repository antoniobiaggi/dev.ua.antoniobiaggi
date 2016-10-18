$(document).ready(function () {
    if(window.location.href.indexOf('/ua')>-1){
        $('.more-catalogue').html('<a href="http://a2.lemarbet.com.ua/3-dlya-zhensshin">ВСЯ КОЛЛЕКЦІЯ<i class="icon-n fa fa-arrow-circle-right"></i></a>');
    } else  if(window.location.href.indexOf('/en')>-1){
         $('.more-catalogue').html('<a href="http://a2.lemarbet.com.ua/3-dlya-zhensshin">AND LOST MORE IN OUR CATALOGUE<i class="icon-n fa fa-arrow-circle-right"></i></a>');
    } 
    
    $('.attribute_list').each(function(){
        if(!$(this).find('li').hasClass('selected')){
        $(this).find('li').eq(0).addClass('selected');
    }
    });
    
    
//    $("#ul_layered_id_attribute_group_3 li input").removeAttr("value");
//    remove titles
    $(".header-navigation a, #footer a").removeAttr("title")
    
    
    $('.lang>span>a').on('click',function(e){
        e.preventDefault();
        $('#first-languages').slideToggle();
    });
    
if( $('.primary>li').has('ul')){
    $('.primary>li>.subholder').prev().append('<i class="fa fa-angle-down"></i>');
}
 var socLinks = $('#social_block').html();
 $('.block-social').append(socLinks);
     var topmenu = $('.primary').html();
     $('.futer-nav').append(topmenu);
    $('.futer-nav .subholder').remove();
    $('.futer-nav i').remove();

    $('.htmlcontent-home>div:first-child,.htmlcontent-home>div:nth-child(2)').wrapAll('<div class="wrap-leftcont"></div>');
    $('.htmlcontent-item-3').removeAttr('class').addClass('lookbook');
    $('.htmlcontent-item-1').removeAttr('class').addClass('buy-now');
    $('.htmlcontent-item-2').removeAttr('class').addClass('ferst-choise');
    
    $('.wrap-leftcont').append($('.sample'));
    $('.sample').addClass('fashion');
    
    $('.nomargin .checkbox').on('click',function(e){
        $(this).closest('li').find('disc').toggleClass('checked');
        console.log(213);
    });
     $('.nomargin span').on('click',function(e){
        $(this).closest('li').find('disc').toggleClass('checked');
        console.log(213);
    });
    $('#category .catalog-nav').before($('.my-desc'));
//    $('#product .review').after($('.set.importedst'));

    $('.navigation-pipe').text('/');
    
    $('#deliv').on('click',function(){
        $(this).toggleClass('selectric-open');
            $('.delivery_options').toggle();
    });
    $('.delivery_options li').on('click',function(){
        $('#deliv').html($(this).text()+'<b class="button mr15fr">▾</b>');
        $('.delivery_options').toggle();
    $('#deliv') .toggleClass('selectric-open');
    });
    $('#HOOK_PAYMENT li').on('click',function(){
         $('#HOOK_PAYMENT li').removeClass('payCheck');
        $(this).addClass('payCheck');
    });
    
    $('#attributes .color').eq(1).find('.name').after('<a href="/content/20-sizeGuide" class="guide">guide</a>');
    
    $('.mob-lang>.lang>span>a').on('click',function(e){
        e.preventDefault();
        $('.languages-block_ul').slideToggle();
    });
    
            $('.it_contacts').on('click', function (e) {
                   e.preventDefault();
            $('body, html').animate(
                {
                    scrollTop: $(document).height()
                }, 1500);
        });
    
    $('.share img').on('click',function(){
        $('.shareLinksWrap').fadeToggle();
    });
    
    $('.slick').slick({
  infinite: false,
  slidesToShow: 5,
  slidesToScroll: 1,
        vertical:true,
        prevArrow:'<li class="totop"></li>',
        nextArrow:'<li class="tonext"></li>'
});
    
    $('.seeMore').on('click',function(e){
        e.preventDefault();
      //  console.log(123);
       $('.like').css({
           'max-height':'none'
       }) 
       $(this).hide();
    });
    
    $('.show-search').on('click',function(){
        $('.search2').slideToggle();
    });
    
             $('#contForm').submit(function (ev) {

         var name = $('[name=Name]').val();
         var phone = $('[name=Phone]').val();
         var email = $('[name=Email]').val();
         var themes = $('[name=Themes]').val();
         var message = $('[name=Message]').val();
		 
        $.ajax({
            type: 'POST',
            url: '/mail.php',
			dataType: "json",
            data:  {
                    name: name,
                    phone: phone,
                    email:email,
                    themes:themes,
                    message:message
                  }, 
            success: function (data) {
//                alert(true);
//                ev.preventDefault();
            }
        }); 

    });
    
    /*$('#submitAccount').on('click',function(){
        var href = $('.payCheck').data('href');
                         if( 
                            $('#customer_firstname').val().length > 0 && $('#customer_lastname').val().length > 0 && $('#phone_mobile').val().length > 0 && $('#email').val().length > 0 
                        ){
                             if($('.payCheck').length >0){
                                //window.location.href = href;
                             }  
                        } else{
                            if( $('#customer_firstname').val().length < 1 ){
                                $('#customer_firstname').css({
                                    'border-color':'red'
                                });
                            } 
                            if( $('#customer_lastname').val().length < 1 ){
                                $('#customer_lastname').css({
                                    'border-color':'red'
                                });
                            } 
                            if( $('#phone_mobile').val().length < 1 ){
                                $('#phone_mobile').css({
                                    'border-color':'red'
                                });
                            }
                            if( $('#email').val().length < 1 ){
                                $('#email').css({
                                    'border-color':'red'
                                });
                            }
							
							if( $('#deliv').text() == 'МЕТОД ДОСТАВКИ ▾'){
                                $('#deliv').css({
                                    'border-color':'red'
                                });
                            }
                            
							if ($('.my_np').css('display') == 'none' && $('#deliv').text() != 'МЕТОД ДОСТАВКИ ▾'){
							   if( $('#city').val().length < 1 ){
									$('#city').css({
										'border-color':'red'
									});
								}
								if( $('#address1').val().length < 1 ){
									$('#address1').css({
										'border-color':'red'
									});
								}
							}
                            if($('.payCheck').length < 1 ){
                                $('#opc_payment_methods').css({
                                    'border':'1px solid red'
                                });
                             }  
                            return false;
                        }
    });*/
    
  //  $('[name="processAddress"]').on('click',function(){
  //      var href = $('.payCheck').data('href');
  //       if($('.payCheck').length >0){
  //          window.location.href = href;
  //       }   else{
  //          $('#opc_payment_methods').css({
  //              'border':'1px solid red'
  //          });
  //       }  
  //  });
    
// if($('#for360 img').length > 1){
//     setTimeout(function(){
//        $('#for360').hide();
//     },2000);
// }

    $('.vive').on('click',function(){
         if($('#for360 img').length > 1){
//             $('#for360').toggle();
             $('#for360').toggleClass('for360toggle');
             $('#gallery>img').toggle();
         }
    });
    
    $('.gallery_img').on('click',function(){
          $('#for360').removeClass('for360toggle');
         $('#gallery>img').show();
    });
    
//    $('#delivery_option_6_0, #delivery_option_0_0').on('click',function(){
//        $('.my_np').show();
//    });
//     $('#delivery_option_6_0, #delivery_option_0_0').siblings().on('click',function(){
//        $('.my_np').hide();
//    });
	
	$('.delivery_option_radio').live('click',function(){
		if ($(this).attr('value') == 8){
			$('.my_np').show();
            $('#city').hide();
            $('#address1').hide();
		}else{
			$('.my_np').hide();
            $('#city').show();
            $('#address1').show();
		}
	});
});


