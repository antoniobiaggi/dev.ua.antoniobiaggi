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
            <a href="#" class="catalog-lighten">Обмен и возврат</a>
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
            <h2>ГАРАНТИЯ, ОБМЕН, ВОЗВРАТ</h2>
            <p class="upDisc wUsageGuide bigText"><strong>1. ВОЗВРАТ</strong></p>
            <div class="upDisc wUsageGuide">Вы можете отказаться от Вашего заказа по любой причине и вернуть товар надлежащего качества (обувь неношеная, имеет товарный вид) в течение 14 календарных дней с момента оплаты, не считая дня покупки.
            </div>
            <div class="upDisc wUsageGuide">
                <strong>Моментом оплаты считается:</strong>
                <ul>
                    <li>Оплата наложенного платежа в службе доставки;</li>
                    <li>Оплата наличными курьеру;</li>
                    <li>Зачисление денежных средств по безналичному расчету по системе Liqpay;</li>
                    <li>Зачисление первого платежа по безналичному расчету с помощью услуг «Оплата Частями» или «Мгновенная рассрочка» от Приват Банка.</li>
                </ul>
            </div>
            <p class="payText">Возврат товара осуществляется за счет клиента (оплата услуг компании-перевозчика).</p>
            <p class="payText">Возврат денежных средств осуществляется в зависимости от выбранных ранее вариантов оплаты:</p>
            <div class="singleBlock">
                <div class="tableName guaranteeStyle">Вы выбрали <strong>оплату наличными</strong></div>
                <div class="tableName guaranteeStyle">(отделение службы логистики или курьеру при получении заказа)</div>
            </div>
            <p class="payText">Для этого достаточно указать наложенный платеж (стоимость товара по чеку) при отправке возврата на отделение «Новой Почты». Курьер при получении проверит товар на соответствие требованиям надлежащего качества и отправит Вам сумму (оплата перевода денежных средств осуществляется за счет клиента) наложенным платежом.</p>
            <p class="payText"><strong>Вы заберёте сумму в том же отделении, с которого был произведён возврат.</strong>При отправке возврата товара в отделении Новой Почты, наложенный платёж не указывается.</p>
            <div class="singleBlock">
                <div class="tableName guaranteeStyle">Вы выбрали <strong>оплату по безналу Liqpay</strong></div>
                <div class="tableName guaranteeStyle">или услугу <strong>«Оплата Частями», «Мгновенная рассрочка» </strong>от Приват Банка</div>
            </div>
            <p class="payText">Сумма по чеку будет возвращена на карту, с которой был осуществлён платёж после проверки товара на соответствие требованиям надлежащего качества. Обратите внимание, что частичный возврат товара/денежных средств по услуге «Оплата Частями» и «Мгновенная рассрочка»  невозможен.</p>
            <div class="singleBlock">
                <div class="tableName guaranteeStyle"><strong>Пожалуйста, обратите внимание:</strong></div>
            </div>
            <p class="payText">Когда Вы отправляете возврат товара, необходимо перезвонить по бесплатному номеру <strong><span>0 (800) 301-041</span></strong> и сообщить менеджеру интернет-магазина номер Вашего заказа, артикул, который возвращаете, и номер ТТН (товарно-транспортная накладная), чтобы максимально быстро получить Ваш возврат и осуществить возврат денежных средств.</p>
            <p class="payText">В случае, если Вы отказываетесь от посылки <strong>в отделении Новой Почты</strong> / при доставке курьером компании «Мист Экспресс», не оплачивая стоимость заказа (получили-отказались), необходимо оплатить стоимость возврата товара.</p>
            <p class="payText bigText"><strong>2. ОБМЕН</strong></p>
            <p class="payText">Удобная и простая процедура обмена: клиент отправляет товар обратно за свой счет, а компания отправляет необходимый товар клиенту бесплатно.</p>
            <p class="payText bigText"><strong>3. ГАРАНТИЙНЫЙ СРОК:</strong></p>
            <p class="payText">В случае выявления на протяжении установленного срока недостатков, производитель (продавец) действует согласно  р.1 ст.8 <strong>Закона Украины «О защите прав потребителей»</strong>.</p>
            <p class="payText">В случае окончания гарантийного срока, обращения по поводу недостатков не рассматриваются.</p>
            <div class="payText"><strong>Гарантийные сроки товаров согласно р.1 ст.7 п.2 Закона Украины «О защите прав потребителей»</strong>
                <p><strong>Обувь для взрослого населения:</strong></p>
                <p>а) Обувь повседневная с верхом из натуральной кожи, синтетических или искусственных кож:</p>
                <p>- Не менее 30 дней со дня продажи через розничную сеть или с начала сезона.</p>
                <p>б) Обувь модельная с верхом из натуральной кожи, синтетических или искусственных кож:</p>
                <p>- Не менее 30 дней со дня продажи через розничную сеть или с начала сезона.</p>
            </div>
            <div class="payText"><strong>Обувь для активного отдыха:</strong>
                <p>- Не менее 60 дней со дня продажи через розничную сеть или с начала сезона.</p>
            </div>
            <div class="payText"><strong>Обувь домашняя или дорожная:</strong>
                <p>- Не менее 40 дней со дня продажи через розничную сеть.</p>
            </div>
            <div class="payText"><strong>Кожгалантерейные изделия:</strong>
                <p>- Сумки хозяйственные, пляжные, детские и школьные рюкзаки, изделия мелкой кожгалантереи – 30 дней;</p>
                <p>- Сумки женские, мужские, дорожные, спортивные – 50 дней;</p>
                <p>- Чемоданы, деловые портфели и папки – 70 дней;</p>
                <p>- Ремни – 30 дней;</p>
                <p>- Перчатки – 30 дней.</p>
            </div>
            <div class="payText"><strong>Гарантийный срок эксплуатации обуви считается со дня продажи через розничную сеть или с начала сезона</strong>
                <p>Зимний сезон – с 15 ноября по 15 марта</p>
                <p>Летний сезон – с 15 мая по 15 сентября</p>
                <p>Весенне-осенний – с 15 сентября по 15 ноября; с 15 марта по 15 мая</p>
            </div>
            <p class="payText"><strong>Срок службы равен гарантийному сроку.</strong></p>
            <div class="payText">
                <p>Перечень нормативно-технической документации, требованиям которой должна соответствовать обувь:</p>
                <p>ДГСТ 19116-2007 «Обувь модельная Т.У.» - для обуви краткосрочного ношения в случае торжественных событий в соответствии с требованиями моды;</p>
                <p>ДГСТ 26167-2009 «Обувь повседневная Т.У.» - для повседневной обуви, которая эксплуатируется в помещениях и на улице;</p>
                <p>ДГСТ 2063 «Обувь для активного отдыха Т.У.»</p>
                <p>ДГСТ 1135-2007 «Обувь домашняя или дорожная Т.У.»</p>
                <p>ДГСТ 28631-2006 «Сумки, чемоданы, портфели, ранцы, папки, изделия мелкой кожгалантереи Т.У.» ГОСТ 28846 (ISO 4418) «Перчатки и варежки З.Т.У.»</p>
            </div>
            <div class="payText"><strong>Не подлежит обмену или бесплатному ремонту обувь:</strong>
                <p>- Изношенная; с дефектами, которые появились вследствие эксплуатации в условиях, не соответствующих назначению;</p>
                <p>- С механическими повреждениями (ожоги, порезы, царапины и др.); деформированная в результате неправильного ношения, сушки, повреждения вследствие воздействия химических веществ, и с другими дефектами, которые возникли по вине покупателя;</p>
                <p>- Отремонтированная покупателем до предъявления магазину (кроме замены набоек, крепления металлических носков, профилактики подошвы, если такой ремонт не стал причиной образования дефектов); </p>
                <p>- Со сниженной ценой (в некоторых случаях гарантийный срок 14 дней).</p>
                <p>Приобретая товары в сети наших магазинов, Вы соглашаетесь с рекомендациями по уходу и порядком эксплуатации обуви и кожгалантерейных изделий, а также гарантийными сроками.</p>
            </div>
            <p class="payText">После получения заказа покупатель имеет право на возврат и обмен товаров надлежащего качества в соответствии со ст. 20 Закона о Защите прав потребителей: </p>
            <p class="payText">20.1. Потребитель имеет право обменять непродовольственный товар надлежащего качества на аналогичный у продавца, у которого он был приобретен, если товар не подошел по форме, габаритам, фасону, цвету, размеру или по другим причинам не может быть им использован по назначению. Потребитель имеет право на обмен товара надлежащего качества в течение 14 дней, не считая дня покупки. Обмен товара надлежащего качества проводится, если он не был в употреблении и если сохранены его товарный вид, потребительские свойства, пломбы, ярлыки, а также товарный либо кассовый чек, выданные потребителю вместе с проданным товаром. Перечень товаров, не подлежащих обмену (возврату) на основаниях, указанных в настоящей статье, утверждается Кабинетом Министров Украины.</p>
            <p class="payText">20.2. Если на момент обмена аналогичного товара нет в продаже, потребитель вправе или приобрести любые другие товары из имеющегося ассортимента с соответствующим перерасчетом стоимости, или получить обратно деньги в размере стоимости возвращенного товара, или осуществить обмен товара на аналогичный при первом же поступлении соответствующего товара в продажу. Продавец обязан в день поступления товара сообщить об этом потребителя, который требует обмена товара.</p>
            <p class="payText"><strong>Возврат средств клиенту осуществляется в течение 7-ми рабочих дней с момента расторжения договора, согласно ст. 8 Закона о Защите прав потребителей.</strong></p>

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

