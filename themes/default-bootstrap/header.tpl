{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"{if isset($language_code) && $language_code} lang="{$language_code|escape:'html':'UTF-8'}"{/if}><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7"{if isset($language_code) && $language_code} lang="{$language_code|escape:'html':'UTF-8'}"{/if}><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8"{if isset($language_code) && $language_code} lang="{$language_code|escape:'html':'UTF-8'}"{/if}><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9"{if isset($language_code) && $language_code} lang="{$language_code|escape:'html':'UTF-8'}"{/if}><![endif]-->
<html{if isset($language_code) && $language_code} lang="{$language_code|escape:'html':'UTF-8'}"{/if}>
	<head>
		<meta charset="utf-8" />
		<meta id="myViewport" charset="utf-8" http-equiv="Content-Type" name="viewport" content="width=360, user-scalable=no">
		<title>{$meta_title|escape:'html':'UTF-8'}</title>
		{if isset($meta_description) AND $meta_description}
			<meta name="description" content="{$meta_description|escape:'html':'UTF-8'}" />
		{/if}
		{if isset($meta_keywords) AND $meta_keywords}
			<meta name="keywords" content="{$meta_keywords|escape:'html':'UTF-8'}" />
		{/if}
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
		{if isset($css_files)}
			{foreach from=$css_files key=css_uri item=media}
				{if $css_uri == 'lteIE9'}
					<!--[if lte IE 9]>
					{foreach from=$css_files[$css_uri] key=css_uriie9 item=mediaie9}
					<link rel="stylesheet" href="{$css_uriie9|escape:'html':'UTF-8'}" type="text/css" media="{$mediaie9|escape:'html':'UTF-8'}" />
					{/foreach}
					<![endif]-->
				{else}
					<link rel="stylesheet" href="{$css_uri|escape:'html':'UTF-8'}" type="text/css" media="{$media|escape:'html':'UTF-8'}" />
				{/if}
			{/foreach}
		{/if}
		{if isset($js_defer) && !$js_defer && isset($js_files) && isset($js_def)}
			{$js_def}
			{foreach from=$js_files item=js_uri}
			<script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
			{/foreach}
		{/if}
		{$HOOK_HEADER}
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext" type="text/css" media="all" />
		<!--[if IE 8]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300,700italic,400italic,300italic&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="/themes/default-bootstrap/css2/style.css">
		<link rel="stylesheet" type="text/css" href="/themes/default-bootstrap/css2/g_style/style.css">
		<link rel="stylesheet" type="text/css" href="/themes/default-bootstrap/css2/item.css">		
		<link rel="stylesheet" type="text/css" href="/themes/default-bootstrap/css2/custom.css">
		<link rel="stylesheet" type="text/css" href="/themes/default-bootstrap/js2/plugins/jquery.scrollbar/jquery.scrollbar.css">
			
        <link rel="stylesheet" href="/themes/default-bootstrap/js2/plugins/owl.carousel/owl.carousel.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/js2/plugins/owl.carousel/owl.theme.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/js2/plugins/owl.carousel/owl.transitions.css">
			
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/magnific-popup.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/lookbook.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/sale.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/sale-page.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/stores.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/mapvindow.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/world_newspage.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/world.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/wishlist.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/basket.css">
			<link rel="stylesheet" href="/themes/default-bootstrap/css2/contacts.css">
			
			 <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
		<style>
        html, body{
            overflow-x: hidden;  
        }
        </style>
		<script type="text/javascript" src="/themes/default-bootstrap/js2/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" src="/themes/default-bootstrap/js2/jquery-effect.js"></script>
		<script type="text/javascript" src="/themes/default-bootstrap/js2/plugins/jquery.scrollbar/jquery.scrollbar.min.js"></script>
		<script type="text/javascript" src="/themes/default-bootstrap/js2/slider_main.js"></script>
		<script type="text/javascript" src="/themes/default-bootstrap/js2/engine.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<!--		<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
		<script type="text/javascript" src="/themes/default-bootstrap/js2/custom.js"></script>
				{if $page_name =='product'}
		<script type="text/javascript" src="/themes/default-bootstrap/js2/item.js"></script>
			{/if}
		<sript type="text/javascript" src="/themes/default-bootstrap/js2/plugins/owl.carousel/owl.carousel.min.js"></script>
        <script type="text/javascript" src="/themes/default-bootstrap/js2/plugins/jquery.nicescroll/jquery.nicescroll.js"></script>
        <script type="text/javascript" src="/themes/default-bootstrap/js2/plugins/owl.carousel/owl.carousel.min.js"></script>
        <script type="text/javascript" src="/themes/default-bootstrap/js2/plugins/jquery.nicescroll/jquery.nicescroll.js"></script>
		<script type="text/javascript" src="/themes/default-bootstrap/js2/g_scripts/main.js"></script>
		<script type="text/javascript" src="/themes/default-bootstrap/js2/world.js"></script>
		
		<script type="text/javascript" src="/themes/default-bootstrap/js2/lightbox-lib.js"></script>
			<script type="text/javascript" src="/themes/default-bootstrap/js2/lookbook.js"></script>
			<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
			<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.20&callback=initMap"></script>
        <script type="text/javascript">
			function initMap() {
				var mapOptions = {
					zoom: 11,
					center: new google.maps.LatLng(50.505840, 30.498299), // New York
					panControl: false,
					rotateControl: false,
					streetViewControl: false,
					scrollwheel: false,
					navigationControl: false,
					mapTypeControl: false,
					scaleControl: false,
					draggable: false,
					styles: [{
                        "featureType":"administrative",
                        "elementType":"labels.text.fill",
                        "stylers":[{
                            "color":"#444444"
                        }]
                    }
                             ,{
                                 "featureType":"landscape",
                                 "elementType":"all",
                                 "stylers":[{
                                     "color":"#f2f2f2"
                                 }]
                             },{
                                 "featureType":"poi",
                                 "elementType":"all",
                                 "stylers":[{
                                     "visibility":"off"
                                 }]
                             },{
                                 "featureType":"road",
                                 "elementType":"all",
                                 "stylers":[{
                                     "saturation":-100
                                 },{
                                     "lightness":45
                                 }]
                             },{
                                 "featureType":"road.highway",
                                 "elementType":"all",
                                 "stylers":[{
                                     "visibility":"simplified"
                                 }]
                             },{
                                 "featureType":"road.arterial",
                                 "elementType":"labels.icon",
                                 "stylers":[{
                                     "visibility":"off"
                                 }]
                             },{
                                 "featureType":"transit",
                                 "elementType":"all",
                                 "stylers":[{
                                     "visibility":"off"
                                 }]
                             },{
                                 "featureType":"water",
                                 "elementType":"all",
                                 "stylers":[{
                                     "color":"#fdeb06"
                                 },{
                                     "visibility":"on"
                                 }]
                             }]
				};
				var mapElement = document.getElementById('mairon_StoresMap');

				var contentString =
						'<div class="mairon_StoresMapModal_big">пр.Оболонский, 1-Б</div>' +
						'<div class="mairon_StoresMapModal_up">ТРЦ "DREAM TOWN"</div>' +
						'<div class="mairon_StoresMapModal__wrap">' +
						'10:00 – 20:00' +
						'<div class="mairon_StoresMapModal_color">ПОНЕДЕЛЬНИК-ВОСКРЕСЕНЬЕ</div>' +
						'</div>' +
						'<div class="mairon_StoresMapModal_bold">+380 (44) 485 04 54</div>';

				var infowindow = new google.maps.InfoWindow({
					content: contentString
//					maxWidth: 200
				});

				var map = new google.maps.Map(mapElement, mapOptions);
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(50.505840, 30.498299),
					map: map,
					title: 'Snazzy!',
                    scrollwheel: false
				});

				google.maps.event.addListener(infowindow, 'domready', function() {

					// Reference to the DIV that wraps the bottom of infowindow
					var iwOuter = $('.gm-style-iw');

					/* Since this div is in a position prior to .gm-div style-iw.
					 * We use jQuery and create a iwBackground variable,
					 * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
					 */
					var iwBackground = iwOuter.prev();

					// Removes background shadow DIV
					iwBackground.children(':nth-child(2)').css({
                        display:"none"
                    });

					// Removes white background DIV
					iwBackground.children(':nth-child(4)').css({
                        display:"none"
                    });

					// Moves the infowindow 115px to the right.
					iwOuter.parent().parent().css({
                        left: '0',
                        top: '62px'
                    });

					// Moves the shadow of the arrow 76px to the left margin.
					iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 27px !important; display: none;'});

					// Moves the arrow 76px to the left margin.
					iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 27px !important; height: 8px;'});
					// Changes the desired tail shadow color.
					iwBackground.children(':nth-child(3)').find('div').children().eq(0).css({
						'box-shadow': 'none',
						'z-index' : '0',
						'transform': 'skewX(45deg)',
						'transform-origin': '0px 0px 0px',
						'height': '24px',
						'width': '10px',
						'background': '#000'
					});
					iwBackground.children(':nth-child(3)').find('div').children().eq(1).css({
						'box-shadow': 'none',
						'z-index' : '0',
						'transform': 'skewX(-45deg)',
						'transform-origin': '10px 0px 0px',
						'height': '24px',
						'width': '10px',
						'background': '#000'
					});

					// Reference to the div that groups the close button elements.
					var iwCloseBtn = iwOuter.next();

					// Apply the desired effect to the close button
					iwCloseBtn.css({
						opacity: '0',
						right: '38px',
						top: '3px',
						border: '7px solid #48b5e9',
						'border-radius': '13px',
						'box-shadow': '0 0 5px #3990B9'
					});

					// If the content of infowindow not exceed the set maximum height, then the gradient is removed.
					if($('.iw-content').height() < 140){
						$('.iw-bottom-gradient').css({
                            display: 'none'
                        });
					}

					// The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
					iwCloseBtn.mouseout(function(){
						$(this).css({
                            opacity: '1'
                        });
					});
				});


				infowindow.open(map, marker);
			}

		</script>
		<script>
			setViewport();
			window.onload = function () {
				setViewport();
			};
			window.onresize = function(event) {
				setViewport();
			};
			function setViewport(){
				var mvp;
				if(screen.width <= 360) {
					mvp = document.getElementById('myViewport');
					mvp.setAttribute('content', 'width=360, user-scalable=no');
				}else{
					mvp = document.getElementById('myViewport');
					mvp.setAttribute('content', 'width=device-width, user-scalable=no, initial-scale=1');
				}
			}
		</script>
	</head>
	<body{if isset($page_name)} id="{$page_name|escape:'html':'UTF-8'}"{/if} class="{if isset($page_name)}{$page_name|escape:'html':'UTF-8'}{/if}{if isset($body_classes) && $body_classes|@count} {implode value=$body_classes separator=' '}{/if}{if $hide_left_column} hide-left-column{else} show-left-column{/if}{if $hide_right_column} hide-right-column{else} show-right-column{/if}{if isset($content_only) && $content_only} content_only{/if} lang_{$lang_iso}">
	{if !isset($content_only) || !$content_only}
		{if isset($restricted_country_mode) && $restricted_country_mode}
			<div id="restricted-country">
				<p>{l s='You cannot place a new order from your country.'}{if isset($geolocation_country) && $geolocation_country} <span class="bold">{$geolocation_country|escape:'html':'UTF-8'}</span>{/if}</p>
			</div>
		{/if}
    <div id="header">
        <div class="header-wrapp">
            <div class="content-header">
                {include file="./modules/blocklanguages/blocklanguages.tpl"}
                    <div class="block">
                       <ul>
                        <li class="wish-list"><span><a href="/module/blockwishlist/mywishlist"><i class="icon icon-star"></i>{l s='WISH LIST'}</a></span></li>
                        {include file="./modules/blockcart/blockcart.tpl"}
                        {include file="./modules/blockuserinfo/nav.tpl"}                   
                        </ul>		
                    </div>
                    <div class="logo">
                        <a href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}">
                            <img src="{$logo_url}"/>
                        </a>
                    </div>
            </div>
            				<!-- mb NAV (START)-->
				<div class="mobile-navigation-menu-back"></div>
				<div class="mobile-navigation-menu">
					<div class="wrapp-mob-menu">
						<div class="close-menu">
							<a href="#"></a>
						</div>
						<div class="mob-lang">
						{include file="./modules/blocklanguages/blocklanguages.tpl"}
<!--							<a href="#"><i class="globe"></i>POLAND(PLN)<i class="fa fa-angle-down"></i></a>-->
						</div>
<!--
						<ul>
							<li>
								<a href="#">WOMEN</a>
							</li>
							<li>
								<a href="#">MEN</a>
							</li>
							<li>
								<a href="#">BAGS</a>
							</li>
							<li class="visual-border">
								<a href="#">ACCESSORIES</a>
							</li>
							<li>
								<a href="#">ANTONIO BIAGGI WORLD</a>
							</li>
							<li>
								<a href="#">STORES</a>
							</li>
							<li>
								<a href="#">SALE</a>
							</li>
						</ul>
-->
                            {if isset($HOOK_TOP)}{$HOOK_TOP}{/if}
						<div class="wish-list"><span><a href="/module/blockwishlist/mywishlist"><i class="icon-star"></i>{l s='WISH LIST'}</a></span></div>
<!--						<div class="login"><span><a href="/my-account"> <i class="icon-user"></i>{l s='LOGIN'}</a></span></div>-->
					</div>
				</div>
				<div class="mobile-navigation">
					<div class="wrapper-mobile-navigation">
						<div class="open-menu"><a href="#"></a></div>
						<div class="logo"><a href="/"><img src="{$logo_url}"/></a></div>
						<div class="search"><a type="submit" class="btn btn-search show-search"></a></div>
						<div class="bascet"><span><a href="/quick-order"><i class=""></i></a></span></div>
					</div>
				</div>
				{if $MENU_SEARCH}
        <div class="search2">
            <form action="{$link->getPageLink('search')|escape:'html':'UTF-8'}" method="get">
                <fieldset>
                    <input class="text-search" placeholder="{l s='SEARCH' mod='blocktopmenu'}" type="text" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|escape:'html':'UTF-8'}{/if}">
                    <button type="submit" class="btn btn-search"></button>
                </fieldset>
            </form>
        </div>
        {/if}
				<!-- mb NAV (END)-->
             {if isset($HOOK_TOP)}{$HOOK_TOP}{/if}
        </div>
    </div>
			
				<div id="wrapper" class="{if $page_name == 'category'}catalog-wrap smMedia{/if}">
					{if $page_name !='index' && $page_name !='pagenotfound'}
						{include file="$tpl_dir./breadcrumb.tpl"}
					{/if}
					
						{capture name='displayTopColumn'}{hook h='displayTopColumn'}{/capture}
						{if $smarty.capture.displayTopColumn}
						<div class="top-slider">
							<div id="top_column" class="center_column col-xs-12 col-sm-12">{$smarty.capture.displayTopColumn}</div>
							</div>
						{/if}
					{if $page_name == 'category'}
			         <div class="catalog-contentWrap">
			        {/if}
			       
						{if isset($left_column_size) && !empty($left_column_size)}
						<div id="left_column" class="{if $page_name == 'category'}catalog-l{/if}">{$HOOK_LEFT_COLUMN}</div>
						{/if}
						{if isset($left_column_size) && isset($right_column_size)}{assign var='cols' value=(12 - $left_column_size - $right_column_size)}{else}{assign var='cols' value=12}{/if}
						<div id="center_column"  class="{if $page_name == 'category' || $page_name == 'prices-drop'}catalog-r{/if}{if $page_name == 'product'}item importedst{/if}">
	{/if}
	
	

