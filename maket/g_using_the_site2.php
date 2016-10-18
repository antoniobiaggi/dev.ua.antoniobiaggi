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
            <h2>как оформить заказ на сайте?</h2>
            <p class="upDisc wUsageGuide">Если Вы отдаете предпочтение обуви <strong>Аntonio Biaggi</strong>, пользуетесь услугами интернет-магазина, тогда сайт  <strong>antoniobiaggi.com</strong> создан именно для Вас. На его страницах Вы сможете узнать последние новости,  получить рекомендации стилиста и посмотреть коллекции предыдущих сезонов.</p>
            <p class="upDisc wUsageGuide">Сайт <strong>antoniobiaggi.com</strong> станет гидом в мир <strong>Аntonio Biaggi</strong>, а главное, поможет выбрать удобную современную  обувь, сумки, аксессуары.</p>
            <p class="upDisc wUsageGuide">Что для этого нужно?</p>
            <div class="singleBlock">
                <div class="number pr35Using">1</div>
                <div class="title">
                    <p>На Главной странице сайта выбрать необходимую категорию: <strong>«Женщины»</strong>, <strong>«Мужчины»</strong>,  <strong>«Сумки»</strong> или <strong>«Аксессуары»</strong>. Чтобы ознакомиться с любой из этих категорий, необходимо навести  курсор и нажать на нее. После этого появится выпадающее меню, где обувь, сумки и аксессуары  разбиты на подкатегории.</p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number pr35Using">2</div>
                <div class="title">
                    <p>Для того, чтобы найти конкретный продукт, Вы можете воспользоваться кнопкой <strong>«Поиск»</strong>,  расположенной в правой части экрана. Просто введите ключевое слово или артикул, и по Вашему  запросу появится страница с результатами поиска.</p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number pr35Using">3</div>
                <div class="title">
                    <p>Также на главной странице Вы можете ознакомиться с популярной продукцией. Она представлена  отдельными категориями <strong>«Для Него»</strong> и <strong>«Для Нее»</strong>.</p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number pr35Using">4</div>
                <div class="title">
                    <p>Перейдя на каталог, Вы найдете подсказки, которые помогут Вам подобрать обувь по стилю, сезону  и типу, а также фильтры размеров и цветовые схемы. Для того, чтобы упростить поиск, справа  расположены фильтры градации цен (по возрастанию или убыванию) и популярности продукта. </p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number pr35Using">5</div>
                <div class="title">
                    <p>Если Вы наведете курсор на понравившуюся модель, у Вас появится возможность быстрого просмотра  со всей необходимой информацией, включая цену, доступные цвета и размеры. </p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number pr35Using">6</div>
                <div class="title">
                    <p>В карточке товара Вы сможете увидеть качественные характеристики (например, материалы, цвет  фурнитуры, устойчивость каблука), размерную сетку и фотографии в разных ракурсах. Тут же Вы найдете  советы стилиста, предложения товаров, которые могут понравиться. У Вас будет возможность оставить  комментарий, касающийся коллекции в целом или конкретной модели, сформировать список  популярных продуктов.</p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number pr35Using">7</div>
                <div class="title">
                    <p>Также для Вас будут созданы комплекты аксессуаров, которые Вы сможете приобрести! </p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number pr35Using">8</div>
                <div class="title">
                    <p>Для того, чтобы сделать заказ, отправьте отобранные товары в корзину. Справа появится электронная  форма заказа. В ней необходимо заполнить стандартные данные: ФИО, адрес, вид оплаты и т. д. Важно  заполнить графу <strong>«Контакты»</strong>, чтобы менеджер компании мог своевременно связаться с Вами для  уточнения заказа или сообщения какой-либо информации. </p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number pr35Using">9</div>
                <div class="title">
                    <p>Вам также будет предложено зарегистрироваться. Регистрация предоставит целый ряд возможностей:  выгодные предложения, бонусы, скидки, информация о новых поступлениях.</p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number paddingUsageGuide">10</div>
                <div class="title">
                    <p>Понравившиеся товары можно поместить в <strong>«Список Желаний»</strong>, чтобы приобрести их позже  самостоятельно или отправить друзьям и родным (указав почту получателя), которые помогут  осуществить Вашу мечту. Кнопка <strong>«Продолжить покупки»</strong> возвратит Вас в каталог / на Главную  страницу сайта.</p>
                </div>
            </div>
            <div class="singleBlock">
                <div class="number paddingUsageGuide">11</div>
                <div class="title">
                    <p>Если при оформлении заказа у Вас возникают вопросы или сложности, Вы можете обратиться по  телефону <strong><span>0 (800) 301-041</span></strong>. Менеджеры Antonio Biaggi с удовольствием помогут Вам! </p>
                </div>
            </div>
            <p class="upDisc marBot">Приятных покупок!</p>

            <div class="contacts marginTop">
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

