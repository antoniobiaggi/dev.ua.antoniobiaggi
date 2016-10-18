<?php
$link = "http://" . $_SERVER['HTTP_HOST'] . "/maket/";
?>

<!DOCTYPE html>
<html>
<head>
    <title>ANTONIO BIAGGI</title>
    <meta charset="utf-8">
    <meta id="myViewport" charset="utf-8" http-equiv="Content-Type"  name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300,700italic,400italic,300italic&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?=$link?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=$link?>css/slider.css">
    <link rel="stylesheet" type="text/css" href="<?=$link?>js/plugins/jquery.scrollbar/jquery.scrollbar.css">

    <script type="text/javascript" src="<?=$link?>js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?=$link?>js/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="<?=$link?>js/jquery-effect.js"></script>
    <script type="text/javascript" src="<?=$link?>js/plugins/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?=$link?>js/slider_main.js"></script>
    <script type="text/javascript" src="<?=$link?>js/engine.js"></script>
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
<body>
<div id="header">
    <div class="header-wrapp">
        <div class="content-header">
            <div class="lang"><span><a href="#"><i class="globe"></i>POLAND(PLN)<i class="fa fa-angle-down"></i></a></span></div>
            <div class="block">
                <ul>
                    <li class="wish-list"><span><a href="#"><i class="icon icon-star"></i>WISH LIST</a></span></li>
                    <li class="bascet"><span><a href="#"><i class="icon icon-bascet"></i></i>BASKET</a></span></li>
                    <li class="login"><span><a href="#"> <i class="icon icon-user"></i>LOGIN</a></span></li>
                </ul>
            </div>
            <div class="logo"><a href="#"><img src="<?=$link?>images/foto/images/logo.png"></a></div>
        </div>
        <!-- NAV -->
        <div class="header-navigation clearfix">
            <div class="wrapp-head-menu">
                <ul class="primary">
                    <li class="activ-info-catalog"><span><a href="#">WOMEN<i class="fa fa-angle-down"></i></a></span>
                        <!-- SUBMENU (START) -->
                        <div class="subholder">
                            <ul class="sub clearfix">
                                <li class="shoes">
                                    <div class="wrapp-cont-sub">
                                        <div class="foto-sub-menu"><img src="<?=$link?>images/foto/images/foto_sub_menu3.jpg"></div>
                                        <div class="info-sub">
                                            <p class="goods-name">Shoes</p>
                                            <span class="item-goods">57 ITEMS</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wrapp-cont-sub">
                                        <div class="foto-sub-menu"><img src="<?=$link?>images/foto/images/foto_sub_menu3.jpg"></div>
                                        <div class="info-sub">
                                            <p class="goods-name">Sandals</p>
                                            <span class="item-goods">25 ITEMS</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wrapp-cont-sub">
                                        <div class="foto-sub-menu"><img src="<?=$link?>images/foto/images/foto_sub_menu3.jpg"></div>
                                        <div class="info-sub">
                                            <p class="goods-name">Sneakers</p>
                                            <span class="item-goods">9 ITEMS</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td class="col-left">Boots</td>
                                            <td class="col-right">21 ITEMS</td>
                                        </tr>
                                        <tr>
                                            <td class="col-left">Ankle Boots</td>
                                            <td class="col-right">19</td>
                                        </tr>
                                        <tr>
                                            <td class="col-left">High Boots</td>
                                            <td class="col-right">38</td>
                                        </tr>
                                        <tr>
                                            <td class="col-left">Ballet Shoes</td>
                                            <td class="col-right">6</td>
                                        </tr>
                                        <tr>
                                            <td class="col-left">Moccasins</td>
                                            <td class="col-right">22</td>
                                        </tr>
                                    </table>
                                    <div class="more-catalogue">
                                        <a href="#">AND LOST MORE<br>IN OUR CATALOGUE
                                            <i class="icon-n fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><span><a href="#">MEN<i class="fa fa-angle-down"></i></a></span>
                        <div class="subholder">
                            <ul class="sub clearfix">
                                <li class="shoes">
                                    <div class="wrapp-cont-sub">
                                        <div class="foto-sub-menu"><img src="<?=$link?>images/foto/images/foto_sub_menu3.jpg"></div>
                                        <div class="info-sub">
                                            <p class="goods-name">Shoes</p>
                                            <span class="item-goods">57 ITEMS</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wrapp-cont-sub">
                                        <div class="foto-sub-menu"><img src="<?=$link?>images/foto/images/foto_sub_menu3.jpg"></div>
                                        <div class="info-sub">
                                            <p class="goods-name">Shoes</p>
                                            <span class="item-goods">57 ITEMS</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="wrapp-cont-sub">
                                        <div class="foto-sub-menu"><img src="<?=$link?>images/foto/images/foto_sub_menu3.jpg"></div>
                                        <div class="info-sub">
                                            <p class="goods-name">Shoes</p>
                                            <span class="item-goods">57 ITEMS</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td class="col-left">Boots</td>
                                            <td class="col-right">21 ITEMS</td>
                                        </tr>
                                        <tr>
                                            <td class="col-left">Ankle Boots</td>
                                            <td class="col-right">19</td>
                                        </tr>
                                        <tr>
                                            <td class="col-left">High Boots</td>
                                            <td class="col-right">38</td>
                                        </tr>
                                        <tr>
                                            <td class="col-left">Ballet Shoes</td>
                                            <td class="col-right">6</td>
                                        </tr>
                                        <tr>
                                            <td class="col-left">Moccasins</td>
                                            <td class="col-right">22</td>
                                        </tr>
                                    </table>
                                    <div class="more-catalogue">
                                        <a href="#">LOST MORE<br>IN OUR CATALOGUE
                                            <i class="icon-n fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><span><a href="about.html">BAGS </a></span>
                    <li><span><a href="#">ACCESSORIES</a></span>
                    <li class="yellow-line yellow-line0"><span><a href="#">ANTONIO BIAGGI WORLD</a></span></li>
                    <li class="yellow-line yellow-line1"><span><a href="#"> STORES</a></span></li>
                    <li class="yellow-line yellow-line2"><span><a href="#"> SALE</a></span></li>
                </ul>
                <div class="search">
                    <form method="post">
                        <fieldset>
                            <input class="text-search" placeholder="SEARCH" type="text">
                            <button type="submit" class="btn btn-search"></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!-- NAV (end)	 -->

        <!-- mb NAV (START)-->
        <div class="mobile-navigation-menu-back"></div>
        <div class="mobile-navigation-menu">
            <div class="wrapp-mob-menu">
                <div class="close-menu">
                    <a href="#"></a>
                </div>
                <div class="mob-lang">
                    <a href="#"><i class="globe"></i>POLAND(PLN)<i class="fa fa-angle-down"></i></a>
                </div>
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
                <div class="wish-list"><span><a href="#"><i class="icon-star"></i>WISH LIST</a></span></div>
                <div class="login"><span><a href="#"> <i class="icon-user"></i>LOGIN</a></span></div>
            </div>
        </div>
        <div class="mobile-navigation">
            <div class="wrapper-mobile-navigation">
                <div class="open-menu"><a href="#"></a></div>
                <div class="logo"><a href="#"><img src="<?=$link?>images/foto/images/logo_text.png"></a></div>
                <div class="search"><a type="submit" class="btn btn-search"></a></div>
                <div class="bascet"><span><a href="#"><i class=""></i></a></span></div>
            </div>
        </div>
        <!-- mb NAV (END)-->
    </div>
</div>
<div id="wrapper">
    <link rel="stylesheet" href="<?=$link?>css/selectric.css">
    <link rel="stylesheet" href="<?=$link?>css/basket.css">
    <script type="text/javascript" src="<?=$link?>js/jquery.selectric.min.js"></script>

    <div class="basket_container">
        <div class="basket_left">
            <h1>Your basket</h1>
            <div class="qty_items">2 items</div>
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <th>ITEM</th>
                    <th>Description</th>
                    <th class="lowhide">UNIT PRICE</th>
                    <th class="lowhide">QUANTITY</th>
                    <th>SUBTOTAL</th>
                    <th></th>
                </tr>
                <tr>
                    <td><div class="basket_img"><img src="<?=$link?>images/basket/img1.png"></div></td>
                    <td>
                        <p>Women Classic Shoes</p>
                        <p>Colour: <span>Black</span></p>
                        <p>Size: <span>38</span></p>
                        <p class="bighide">Unit Price: $92,70</p>
                        <div class="bighide bighideb">
                            <div class="qty">2</div>
                            <div class="down_qty"></div>
                            <div class="up_qty"></div>
                        </div>
                        <p class="bighide">Subtotal: $92,70</p>
                    </td>
                    <td class="lowhide">$99,70</td>
                    <td class="lowhide">
                        <div class="qty">2</div>
                        <div class="down_qty"></div>
                        <div class="up_qty"></div>
                    </td>
                    <td class="lowhide">$199,40</td>
                    <td><div class="delete"></div></td>
                </tr>
                <tr>
                    <td><div class="basket_img"><img src="<?=$link?>images/basket/img2.png"></div></td>
                    <td>
                        <p>Women Classic Shoes</p>
                        <p>Colour: <span>Beige</span></p>
                        <p>Size: <span>38</span></p>
                        <p class="bighide">Unit Price: $92,70</p>
                        <div class="bighide bighideb">
                            <div class="qty">1</div>
                            <div class="down_qty"></div>
                            <div class="up_qty"></div>
                        </div>
                        <p class="bighide">Subtotal: $92,70</p>
                    </td>
                    <td class="lowhide">$92,70</td>
                    <td class="lowhide">
                        <div class="qty">1</div>
                        <div class="down_qty"></div>
                        <div class="up_qty"></div>
                    </td>
                    <td class="lowhide">$92,70</td>
                    <td><div class="delete"></div></td>
                </tr>
            </table>
            <div class="code_in">
                <input type="text" placeholder="coupon code or discount card">
                <input type="submit" value="apply">
            </div>
            <div class="total_price"><span>total</span>$292,10</div>
        </div>
        <div class="basket_right">
            <div class="basket_form_name">Delivery & checkout</div>
            <div class="basket_form_desc">Already registered? <a href="#">Sign in</a> for faster checkout.</div>
            <form action="#" method="post">
                <div class="form_left">
                    <div class="user_name">
                        <input type="text" required name="user_name" id="user_name">
                        <label for="user_name">First name</label>
                    </div>
                    <div class="user_last_name">
                        <input type="text" required name="user_last_name" id="user_last_name">
                        <label for="user_last_name">Last name</label>
                    </div>
                    <input type="text" required name="phone" id="phone">
                    <label for="phone">Phone</label>
                    <select>
                        <option disabled selected>Select Shipping</option>
                        <option>мiст експрес</option>
                    </select>
                    <div class="s_text">Shipping cost will be determined by Мiст Експрес</div>
                    <div class="req_select_city star">
                        <select id="city" data-required>
                            <option value="">city</option>
                            <option value="111">111</option>
                        </select>
                    </div>
                    <input type="text" required name="adress" id="adress">
                    <label for="adress">Address</label>
                    <textarea name="info_text" id="info_text" placeholder="Additional information"></textarea>
                </div>
                <div class="form_right">
                    <ul class="basket_radio">
                        <li>
                            <input type="radio" name="basker_rad" id="cash_delivery">
                            <label for="cash_delivery">Cash on delivery</label>
                        </li>
                        <li>
                            <input type="radio" name="basker_rad" id="payment">
                            <label for="payment">Visa/MasterCard</label>
                        </li>
                        <li>
                            <input type="radio" name="basker_rad" id="split_payment">
                            <label for="split_payment">Split payment</label>
                        </li>
                    </ul>
                    <div class="req_select_bank star">
                        <select id="choose_bank" >
                            <option value="">Choose bank</option>
                            <option value="111">111</option>
                        </select>
                    </div>
                    <select>
                        <option>21 month</option>
                        <option>111</option>
                    </select>
                    <input type="text" value="$13.91 per month">
                    <div class="basket_ckeck">
                        <input type="checkbox" id="basket_ckeck"><label for="basket_ckeck">I agree to <b>User Agreement</b></label>
                    </div>
                    <input type="submit" id="ready_order" value="Checkout">
                    <a class="contshopping" href="#">CONTINUE SHOPPING</a>
                </div>
            </form>
        </div>
        <div class="clear"></div>
        <div class="basket_footer">
            <div class="basket_rules">
                <div class="basket_rules_name">basket rules</div>
                <ul>
                    <li>Add the product to the wishlist does not cause the reservation.</li>
                    <li>Wishlist content is saved automatically.</li>
                    <li>Products sold are marked as "not available".</li>
                    <li>For customers logged wishlist contents stored by month.</li>
                    <li>For registered customers contents of the wishlist is stored until it is manually cleaned.</li>
                </ul>
            </div>
            <div class="basket_f_right">
                <div class="phone_info">
                    <div class="phone_info_name">phone</div>
                    <p>+1 (213) 550-3798 (Available Monday to Friday 8am-11pm EST and Saturday to Sunday 9am-9pm EST)</p>
                </div>
                <div class="chat_info">
                    <div class="chat_info_name">chat</div>
                    <p>Please note that whilst we will always try to have an agent available, we may not be free during peak service times.</p>
                </div>
                <div class="email_info">
                    <div class="email_info_name">email</div>
                    <p><a href="#">Click here</a> to send us an Email.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('select').selectric();

            $('tr .down_qty').on('click', function () {
                var qty_item = $(this).parent().find('.qty').html();
                qty_item_set = parseInt(qty_item, 10);
                if (qty_item > 1) {
                    $(this).parent().find('.qty').html(qty_item_set - 1);
                }
            });
            $('tr .up_qty').click(function () {
                var qty_item = $(this).parent().find('.qty').html();
                qty_item_set = parseInt(qty_item, 10);
                if (qty_item > 0) {
                    $(this).parent().find('.qty').html(qty_item_set + 1);
                }
            });

            $('#city').change(function () {
                if ($("#city option:selected").val() == '') {
                    $(".req_select_city").addClass('star');
                }
                else {
                    $(".req_select_city").removeClass('star');
                }
            });
            $('#choose_bank').change(function () {
                if ($("#choose_bank option:selected").val() == '') {
                    $(".req_select_bank").addClass('star');
                }
                else {
                    $(".req_select_bank").removeClass('star');
                }
            });
        });
    </script>

    <div class="block-info">
        <div class="block-info-wrapp">
            <div class="block-info-left">
                <form method="post" class="block-serch">
                    <label for="txt-serch">NEWSLETTER <span class="sleep-text">SUBSCRIPTION</span></label>
                    <input type="email" id="txt-serch" placeholder="ENTER YOUR E-MAIL" class="text-serch">
                    <input type="submit" class="btn-serch" value="SUBSCRIBE">
                    <input type="submit" class="btn-serch sleep-btn" value="OK">
                </form>
            </div>
            <div class="block-social">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div class="content-footer">
        <div class="menu-futer">
            <ul class="futer-nav">
                <li class="activ-info-catalog"><span><a href="#">WOMEN</a></span></li>
                <li><span><a href="#">MEN</a></span></li>
                <li><span><a href="#">BAGS </a></span></li>
                <li><span><a href="#">ACCESSORIES</a></span></li>
                <li><span><a href="#">ANTONIO BIAGGI WORLD</a></span></li>
                <li><span><a href="#"> STORES</a></span></li>
                <li><span><a href="#"> SALE</a></span></li>
            </ul>
        </div>
        <div class="footer-content-wrapp">
            <div class="left-futer-content">
                <p class="title-head">Antonio Biaggi. О компании</p>
                <p class="cont-left-futer">European brand of footwear and accessories, who had since its inception in 2006, to win a strong position in the footwear market. Retail network includes more than 50 company stores, which operate successfully in Europe and Asia.</p>
            </div>
            <div class="right-futer-content clearfix">
                <div class="customer">
                    <ul>
                        <li class="title-list">ПОМОЩЬ ПОКУПАТЕЛЯМ</li>
                        <li><a href="#">Описание работы с сайтом</a></li>
                        <li><a href="#">Определить размер</a></li>
                        <li><a href="#">Правила эксплуатации обуви</a></li>
                        <li><a href="#">Доставка и  оплата</a></li>
                        <li><a href="#">Гарантия, обмен, возврат</a></li>
                        <li><a href="#">Пользовательское соглашение</a></li>
                        <li><a href="#">Lookbooks</a></li>
                    </ul>
                </div>
                <div class="contacts">
                    <ul>
                        <li class="title-list">КОНТАКТЫ</li></li>
                        <li class="bottspace"><a href="#">Обслуживание Покупателей - Связаться с нами</a></li>
                        <li class="foottel"><img src="<?=$link?>images/g_pages/Shape-295.png"> Горячая линия <a href="tel:0800301041">0 (800) 301-041</a></li>
                        <li>Email <a href="mailto:shop@antoniobiaggi.com">shop@antoniobiaggi.com</a></li>
                    </ul>
                </div>
                <div class="franching">
                    <ul>
                        <li class="title-list">ФРАНЧАЙЗИНГ</li>
                        <li><a href="#">Лицензия</a></li>
                        <li><a href="#">Наше предложение</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

