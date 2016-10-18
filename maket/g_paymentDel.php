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
    <script type="text/javascript" src="<?=$link?>js/g_scripts/lib.min.js"></script>
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
    <link rel="stylesheet" href="<?=$link?>css/g_style/lib.min.css">
    <link rel="stylesheet" href="<?=$link?>css/g_style/style.css">
    <script type="text/javascript" src="<?=$link?>js/g_scripts/main.js"></script>

    <div class="clear"></div>

    <div class="catalog-wrap">
        <!-- navigation -->
        <div class="catalog-nav">
            <a href="#" class="catalog-darken">Главная</a>
            <span class="catalog-line">/</span>
            <a href="#" class="catalog-lighten">Как пользоваться сайтом</a>
        </div>
        <!-- /navigation -->
        <!-- content -->
        <h1>удобные покупки с <span>antonio biaggi</span></h1>
        <!-- usingLinks -->
        <div class="usingLinksWrap">
            <div class="single">
                <a href="#">
                    <img src="<?=$link?>images/g_pages/ic_size.png" alt="alt">
                    <div class="text">определить размер</div>
                </a>
            </div>
            <div class="single">
                <a href="#">
                    <img src="<?=$link?>images/g_pages/ic_addtobasket.png" alt="alt">
                    <div class="text">как заказать</div>
                </a>
            </div>
            <div class="single">
                <a href="#">
                    <img src="<?=$link?>images/g_pages/ic_delivery.png" alt="alt">
                    <div class="text">оплата и доставка</div>
                </a>
            </div>
            <div class="single">
                <a href="#">
                    <img src="<?=$link?>images/g_pages/ic_exchange.png" alt="alt">
                    <div class="text">обмен и возврат</div>
                </a>
            </div>
        </div>
        <!-- /usingLinks -->
        <!-- arrow -->
        <div class="arrowDecor"></div>
        <!-- /arrow -->
        <!-- blocks -->
        <div class="blocksWrap">
            <h2>оплата и доставка</h2>
            <p class="upDisc wUsageGuide"><strong>БЕСПЛАТНАЯ ДОСТАВКА</strong> осуществляется на территории Украины при условии, что <strong>скидка</strong> на заказанный
                товар составляет <strong>до 40%</strong>. Если действует предложение 40% и более, доставка осуществляется за счет клиента
                по тарифам компании-перевозчика:
                <strong>Компания «Новая Почта»;</strong>
                <strong>Компания «MEEST EXPRESS»</strong></p>
            <div class="upDisc wUsageGuide">Способ доставки Вы указываете при формировании заказа:
                <ul>
                    <li>При адресной доставке с Вами свяжется курьер в течение 2-х рабочих дней с момента подтверждения заказа;</li>
                    <li>При доставке товара на склад компании-перевозчика, Вы получаете смс-уведомление с номером ТТН.</li>
                </ul>
            </div>
            <p class="upDisc wUsageGuide">Обязательно при получении товара при себе иметь документ, подтверждающий личность.
                Максимальный срок доставки – 5 рабочих дней. Возврат товара осуществляется за счет клиента.</p>
            <p class="payText"><strong>Обратите внимание!</strong></p>
            <p class="payText">К сожалению, на данный момент доставка в Крым не осуществляется, однако у нас есть фирменные
                магазины на территории АР Крым.</p>
            <div class="singleBlock">
                <div class="line"></div>
                <div class="tableName">ОПЛАТА ТОВАРА ОСУЩЕСТВЛЯЕТСЯ:</div>
                <div class="payTypeWrap">
                    <div class="payType">
                        <div>наличными</div>
                        <ul>
                            <li>Оплата наложенного платежа при получении заказа в отделении  службы логистики;</li>
                            <li>Оплата наличными курьеру при получении;</li>
                        </ul>
                    </div>
                    <div class="payType leftBlock">
                        <div>БЕЗНАЛИЧНЫЙ РАСЧЁТ</div>
                        <ul>
                            <li>LiqPay;</li>
                            <li>Оплата Частями;</li>
                            <li>Мгновенная Рассрочка;</li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="payText">LiqPay: К оплате принимаются карты Visa и MasterCard.</p>
            <p class="payText">(<strong>ВНИМАНИЕ</strong>: в некоторых случаях использование карты для онлайн-платежей требует активации данной функции банком).</p>
            <p class="payText">После выбора способа оплаты заказа <strong>«Online оплата картой Visa / MasterCard»</strong> происходит переадресация на защищенную платежную  страницу банка, на которой потребуется ввести данные карты. После успешной оплаты на платежной странице банка Вы увидите сообщение  об успешности операции, после чего сможете вернуться на страницу сайта или закрыть её.</p>
            <p class="payText">Информация об успешности заказа, а так же информация по самому заказу дублируется в письме, которое мы отправляем на Ваш e-mail, указанный  при оформлении заказа. <strong>«Оплата Частями»</strong> и <strong>«Мгновенная рассрочка» – удобный кредит от Приват Банка</strong>.</p>
            <div class="singleBlock">
                <div class="payTypeWrap">
                    <div class="payType">
                        <div>«ОПЛАТА ЧАСТЯМИ»</div>
                        <ul>
                            <li>2 или 3 платежа без ежемесячных комиссий и переплат;</li>
                            <li>Минимальная сумма платежа – 2000 грн, максимальная –  исходя из вашего лимита;</li>
                        </ul>
                    </div>
                    <div class="payType leftBlock">
                        <div>«МГНОВЕННАЯ РАССРОЧКА»</div>
                        <ul>
                            <li>До 24 платежей;</li>
                            <li>Небольшая ежемесячная комиссия 2,9% от суммы платежа;</li>
                            <li>Минимальная сумма платежа – 1100 грн, максимальная – исходя из вашего лимита;</li>
                        </ul>
                    </div>
                </div>
                <div class="line"></div>
                <div class="tableName">ПРЕИМУЩЕСТВА ПОКУПКИ ТОВАРА В РАССРОЧКУ:</div>
            </div>
            <div class="payText">
                <ul>
                    <li>Вам не нужны дополнительные документы для оформления кредита. Узнать лимит Вы можете, отправив смс на 10060 с текстом chast, позвонив  по бесплатному номеру службы поддержки Приват Банка 3700, а также в личном кабинете «Приват 24»;</li>
                    <li>Оформляйте заказ онлайн в любое удобное для Вас время - 24/7. Вся процедура оплаты реализуется в несколько кликов при оформлении заказа.  Следуя подсказкам, выберите удобный способ оплаты и заполните необходимые поля;</li>
                    <li>После успешного перехода на страницу Приват Банка введите необходимые данные Вашей карты и подтвердите оплату;</li>
                    <li>После смс-уведомления от ПБ о том, что операция завершена успешно, Вы получите подтверждение заказа от интернет-магазина;</li>
                    <li>Ежемесячный платеж за покупку вносится на карту любым удобным способом (через Приват24, терминал самообслуживания или в любом  из отделений Приват Банка). Вы также можете досрочно внести всю сумму платежа. Снятие будет производиться равными частями ежемесячно в день  с момента оплаты первой части.</li>
                </ul>
            </div>
            <div class="singleBlock">
                <div class="line"></div>
                <div class="tableName">БЫСТРО. ВЫГОДНО. УДОБНО.</div>
            </div>
            <p class="payText">Кредит предоставляет ПАО КБ «Приват Банк», лицензия НБУ 322 от 05.10.11. Детальные условия кредитования на сайте банка или по телефону горячей  линии <strong>3700</strong>. Звонки с мобильного в пределах Украины бесплатные.</p>
            <p class="payText">При получении посылки проверяйте целостность упаковки и качество товара! При возникновении каких-либо вопросов обращайтесь  по номеру <strong>0800 301 041</strong></p>
            <div class="payImgWrap">
                <img src="<?=$link?>images/g_pages/visa1.png" alt="alt">
                <img src="<?=$link?>images/g_pages/visa2.png" alt="alt">
                <img src="<?=$link?>images/g_pages/mc.png" alt="alt">
                <img src="<?=$link?>images/g_pages/lp.png" alt="alt">
            </div>

            <div class="contacts payMarTop">
                <div class="faq">остались вопросы?</div>
                <div class="email">EMAIL &#8212; <a href="#"> shop@antoniobiaggi.com</a></div>
                <div class="phone">
                    &#8212; Бесплатный номер для звонков по Украине:
                    <span>0 (800) 301-041</span>
                </div>
            </div>
        </div>
        <!-- /blocks -->
    </div>

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
            <div class="right-futer-content">
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

