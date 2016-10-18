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

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/g_scripts/lib.min.js"></script>
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="js/jquery-effect.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="js/slider_main.js"></script>
    <script type="text/javascript" src="js/engine.js"></script>
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
            <a href="#" class="catalog-lighten">Правила эксплуатации обуви</a>
        </div>
        <!-- /navigation -->
        <!-- content -->
        <h1>пользовательское соглашение</h1>
        <!-- blocks -->
        <div class="blocksWrap">
            <div class="accordeonWrap">
                <div class="topPart">
                    1.     общие положения
                </div>
                <div class="hiddenPart">
                    <div class="cont">
                        <span class="num">1.1.</span>
                        <span class="text">Настоящее Пользовательское соглашение (далее – Соглашение) относится к сайту Интернет-магазина «ANTONIO BIAGGI», расположенному по адресу antoniobiaggi.com Сайт Интернет-магазина «ANTONIO BIAGGI» (далее – Сайт) является собственностью ООО «АНТОНИО БИАДЖИ-УКРАИНА». Содержание сайта Интернет-магазина «ANTONIO BIAGGI»  — охраняемые результаты интеллектуальной деятельности, включая тексты литературных произведений, их названия, предисловия, аннотации, статьи, иллюстрации, обложки, музыкальные произведения с текстом или без текста, графические, текстовые, фотографические, производные, составные и иные произведения, пользовательские интерфейсы, визуальные интерфейсы, названия товарных знаков, логотипы, базы данных, а также дизайн, структура, выбор, координация, внешний вид, общий стиль и расположение данного Содержания, входящего в состав Сайта и другие объекты интеллектуальной собственности все вместе и/или по отдельности, содержащиеся на сайте Интернет-магазина «ANTONIO BIAGGI».</span>
                    </div>
                    <div class="cont">
                        <span class="num">1.2.</span>
                        <span class="text">Настоящее соглашение регулирует отношения между Администрацией сайта Интернет-магазина «ANTONIO BIAGGI» (далее – Администрация сайта) и Пользователем данного Сайта, а также частным лицом – посетившим хотя бы на одну страницу сайта или, воспользовавшимся хотя бы одним из сервисов, предоставляемых в рамках сайта, без предварительной регистрации и авторизации на сайте.</span>
                    </div>
                    <div class="cont">
                        <span class="num">1.3.</span>
                        <span class="text">Администрация сайта оставляет за собой право в любое время изменять, добавлять или удалять пункты настоящего Соглашения без уведомления Пользователя данного Сайта. </span>
                    </div>
                    <div class="cont">
                        <span class="num">1.4.</span>
                        <span class="text">Продолжение использования Сайта Пользователем означает принятие Соглашения и изменений, внесенных в настоящее Соглашение. Пользователь несет персональную ответственность за проверку настоящего Соглашения на наличие изменений в нем.</span>
                    </div>
                    <div class="cont">
                        <span class="num">1.5.</span>
                        <span class="text">Использовать интерактивные ресурсы сайта antoniobiaggi.com, оставлять отзывы, комментировать материалы, публиковать собственные материалы и вести онлайн-общение могут как зарегистрированные, так и незарегистрированные посетители (пользователи) сайта.</span>
                    </div>
                </div>
                <div class="topPart">
                    2.     предмет соглашения
                </div>
                <div class="hiddenPart">
                    <div class="cont">
                        <span class="num">2.1.</span>
                        <span class="text">Предметом настоящего Соглашения является предоставление Пользователю Интернет-магазина доступа к содержащимся на Сайте Товарам и оказываемым услугам.</span>
                    </div>
                    <div class="cont">
                        <span class="num">2.2.</span>
                        <span class="text">Доступ к Интернет-магазину предоставляется на бесплатной основе.</span>
                    </div>
                    <div class="cont">
                        <span class="num">2.3.</span>
                        <span class="text">Настоящее Соглашение является публичной офертой. Получая доступ к Сайту Пользователь считается присоединившимся к настоящему Соглашению.</span>
                    </div>
                    <div class="cont">
                        <span class="num">2.4.</span>
                        <span class="text">Использование материалов и сервисов Сайта регулируется нормами действующего законодательства Украины.</span>
                    </div>
                </div>
                <div class="topPart">
                    3.     Права и Обязанности Сторон
                </div>
                <div class="hiddenPart">
                    <div class="cont">
                        <span class="num">3.1.</span>
                        <span class="text">Администрация сайта вправе:</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.1.1.</span>
                        <span class="text">Изменять правила пользования Сайтом, а также изменять содержание данного Сайта. Изменения вступают в силу с даты публикации новой редакции Соглашения на Сайте.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.1.2.</span>
                        <span class="text">Ограничить доступ к Сайту в случае нарушения Пользователем условий настоящего Соглашения.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.2.</span>
                        <span class="text">Пользователь вправе:</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.2.1.</span>
                        <span class="text">Получить доступ к использованию Сайта после соблюдения требований о регистрации.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.2.2.</span>
                        <span class="text">Пользоваться всеми имеющимися на Сайте услугами, а также приобретать любые Товары, предлагаемые на Сайте.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.2.3.</span>
                        <span class="text">Задавать любые вопросы, относящиеся к услугам Интернет-магазина «ANTONIO BIAGGI».</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.2.4.</span>
                        <span class="text">Пользоваться Сайтом исключительно в целях и порядке, предусмотренных Соглашением и не запрещенных законодательством Украины.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.</span>
                        <span class="text">Пользователь Сайта обязуется:</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.1</span>
                        <span class="text">Предоставлять по запросу Администрации сайта дополнительную информацию, которая имеет непосредственное отношение к предоставляемым услугам данного Сайта.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.2</span>
                        <span class="text">Соблюдать имущественные и неимущественные права авторов и иных правообладателей при использовании Сайта.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.3</span>
                        <span class="text">Не предпринимать действий, которые могут рассматриваться как нарушающие нормальную работу Сайта.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.4</span>
                        <span class="text">Не распространять с использованием Сайта любую конфиденциальную и охраняемую законодательством Украины информацию о физических либо юридических лицах.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.5</span>
                        <span class="text">Избегать любых действий, в результате которых может быть нарушена конфиденциальность охраняемой законодательством Украины информации.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.6</span>
                        <span class="text">Не использовать Сайт для распространения информации рекламного характера, иначе как с согласия Администрации сайта.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.7</span>
                        <span class="text">Не использовать сервисы сайта Интернет-магазина с целью:</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.7.1.</span>
                        <span class="text">Загрузки контента, который является незаконным, нарушает любые права третьих лиц; пропагандирует насилие, жестокость, ненависть и (или) дискриминацию по расовому, национальному, половому, религиозному, социальному признакам; содержит недостоверные сведения и (или) оскорбления в адрес конкретных лиц, организаций, органов власти.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.7.2.</span>
                        <span class="text">Побуждения к совершению противоправных действий, а также содействия лицам, действия которых направлены на нарушение ограничений и запретов, действующих на территории Украины.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.7.3.</span>
                        <span class="text">Нарушения прав несовершеннолетних лиц и (или) причинение им вреда в любой форме.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.7.4.</span>
                        <span class="text">Ущемления прав меньшинств.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.7.5.</span>
                        <span class="text">Представления себя за другого человека или представителя организации и (или) сообщества без достаточных на то прав, в том числе за сотрудников данного Интернет-магазина «ANTONIO BIAGGI».</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.7.6.</span>
                        <span class="text">Введения в заблуждение относительно свойств и характеристик какого-либо Товара из каталога Интернет-магазина, размещенного на Сайте «ANTONIO BIAGGI».</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.3.7.7.</span>
                        <span class="text">Некорректного сравнения Товара, а также формирования негативного отношения к лицам, (не) пользующимся определенными Товарами, или осуждения таких лиц.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.4.</span>
                        <span class="text">Пользователю запрещается:</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.4.1.</span>
                        <span class="text">Использовать любые устройства, программы, процедуры, алгоритмы и методы, автоматические устройства или эквивалентные ручные процессы для доступа, приобретения, копирования или отслеживания содержания Сайта данного Интернет-магазина «ANTONIO BIAGGI»;</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.4.2.</span>
                        <span class="text">Нарушать надлежащее функционирование Сайта;</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.4.3.</span>
                        <span class="text">Любым способом обходить навигационную структуру Сайта для получения или попытки получения любой информации, документов или материалов любыми средствами, которые специально не представлены сервисами данного Сайта;</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.4.4.</span>
                        <span class="text">Несанкционированный доступ к функциям Сайта, любым другим системам или сетям, относящимся к данному Сайту, а также к любым услугам, предлагаемым на Сайте;</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.4.5.</span>
                        <span class="text">Нарушать систему безопасности или аутентификации на Сайте или в любой сети, относящейся к Сайту.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.4.6.</span>
                        <span class="text">Выполнять обратный поиск, отслеживать или пытаться отслеживать любую информацию о любом другом Пользователе Сайта.</span>
                    </div>
                    <div class="cont">
                        <span class="num">3.4.7.</span>
                        <span class="text">Использовать Сайт и его Содержание в любых целях, запрещенных законодательством Украины, а также подстрекать к любой незаконной деятельности или другой деятельности, нарушающей права интернет-магазина или других лиц.</span>
                    </div>
                </div>
                <div class="topPart">
                    4.     Личные сведения и безопасность
                </div>
                <div class="hiddenPart">
                    <div class="cont">
                        <span class="num">4.1.</span>
                        <span class="text">Администрация сайта гарантирует, что никакая полученная от Вас информация никогда и ни при каких условиях не будет предоставлена третьим лицам, за исключением случаев, предусмотренных действующим законодательством Украины.</span>
                    </div>
                    <div class="cont">
                        <span class="num">4.2.</span>
                        <span class="text">В некоторых случаях Администрация сайта может попросить Вас зарегистрироваться или предоставить личные сведения. Предоставленная информация используется при обработке заказа в Интернет-магазине, для предоставления посетителю доступа к специальной информации, в маркетинговых целях.</span>
                    </div>
                    <div class="cont">
                        <span class="num">4.3.</span>
                        <span class="text">Для того чтобы обеспечить Пользователя информацией о продукте и услугах Интернет-магазина «ANTONIO BIAGGI», Администрация сайта с Вашего явного согласия может присылать на указанный при регистрации адрес электронной почты информационные сообщения. В любой момент Вы можете отказаться от рассылки.</span>
                    </div>
                    <div class="cont">
                        <span class="num">4.4.</span>
                        <span class="text">Как и многие другие сайты, Интернет-магазин «ANTONIO BIAGGI» использует технологию cookie, с помощью которой он настраивается на работу лично с Вами. В частности, без этой технологии невозможна работа с корзиной.</span>
                    </div>
                    <div class="cont">
                        <span class="num">4.5.</span>
                        <span class="text">Сведения на сайте antoniobiaggi.com имеют сугубо информативный характер, в них могут быть внесены любые изменения без какого-либо предварительного уведомления.</span>
                    </div>
                </div>
                <div class="topPart">
                    5.     Политика конфиденциальности
                </div>
                <div class="hiddenPart">
                    <div class="cont">
                        <span class="num">5.1.</span>
                        <span class="text">Объекты, размещенные на сайте antoniobiaggi.com, являются интеллектуальной собственностью ООО «АНТОНИО БИАДЖИ-УКРАИНА». Использование таких объектов установлено действующим законодательством Украины.</span>
                    </div>
                    <div class="cont">
                        <span class="num">5.2.</span>
                        <span class="text">На сайте antoniobiaggi.com имеются ссылки, позволяющие перейти на другие сайты. Администрация сайта не несет ответственности за сведения, публикуемые на этих сайтах, и предоставляет ссылки на них только в целях обеспечения удобства для посетителей своего сайта.</span>
                    </div>
                </div>
                <div class="topPart">
                    6.     Использование материалов сайта
                </div>
                <div class="hiddenPart">
                    <div class="cont">
                        <span class="num">6.1.</span>
                        <span class="text">Авторские права на материалы сайта antoniobiaggi.com, ресурсы, сервисы, если не указано иное, принадлежат ООО «АНТОНИО БИАДЖИ-УКРАИНА».</span>
                    </div>
                    <div class="cont">
                        <span class="num">6.2.</span>
                        <span class="text">Содержание Сайта не может быть скопировано, опубликовано, воспроизведено, передано или распространено любым способом, а также размещено в глобальной сети «Интернет» без предварительного письменного согласия Администрации сайта.</span>
                    </div>
                    <div class="cont">
                        <span class="num">6.3.</span>
                        <span class="text">Все названия, наименования, торговые марки, символы и слоганы, зарегистрированные в установленном порядке, являются собственностью их законных владельцев. В материалах сайта не используются значки (r) и/или (tm) для их обозначения.</span>
                    </div>
                    <div class="cont">
                        <span class="num">6.4.</span>
                        <span class="text">Содержание Сайта защищено авторским правом, законодательством о товарных знаках, а также другими правами, связанными с интеллектуальной собственностью, и законодательством о недобросовестной конкуренции.</span>
                    </div>
                </div>
                <div class="topPart">
                    7.     Ответственность
                </div>
                <div class="hiddenPart">
                    <div class="cont">
                        <span class="num">7.1.</span>
                        <span class="text">Любые убытки, которые Пользователь может понести в случае умышленного или неосторожного нарушения любого положения настоящего Соглашения, а также вследствие несанкционированного доступа к коммуникациям другого Пользователя, Администрацией сайта не возмещаются.</span>
                    </div>
                    <div class="cont">
                        <span class="num">7.2.</span>
                        <span class="text">Администрация сайта не несет ответственности за:</span>
                    </div>
                    <div class="cont">
                        <span class="num">7.2.1.</span>
                        <span class="text">Задержки или сбои в процессе совершения операции, возникшие вследствие непреодолимой силы, а также любого случая неполадок в телекоммуникационных, компьютерных, электрических и иных смежных системах.</span>
                    </div>
                    <div class="cont">
                        <span class="num">7.2.2.</span>
                        <span class="text">Действия систем переводов, банков, платежных систем и за задержки, связанные с их работой.</span>
                    </div>
                    <div class="cont">
                        <span class="num">7.2.3.</span>
                        <span class="text">Надлежащее функционирование Сайта, в случае, если Пользователь не имеет необходимых технических средств для его использования, а также не несет никаких обязательств по обеспечению пользователей такими средствами.</span>
                    </div>
                </div>
                <div class="topPart">
                    8.     Заключительные положения
                </div>
                <div class="hiddenPart">
                    <div class="cont">
                        <span class="num">8.1.</span>
                        <span class="text">Заполняя форму регистрации на сайте или посещая страницы сайта antoniobiaggi.com, посетитель сайта автоматически принимает условия настоящего соглашения.</span>
                    </div>
                    <div class="cont">
                        <span class="num">8.2.</span>
                        <span class="text">Посетитель сайта принимает условия Соглашения в случае фактического использования сайта. В этом случае пользователь понимает и соглашается с тем, что Администрация сайта будет расценивать факт использования пользователем сайта antoniobiaggi.com, как согласие с условиями Соглашения с соответствующего момента времени.</span>
                    </div>
                    <div class="cont">
                        <span class="num">8.3.</span>
                        <span class="text">Деятельность Администрации сайта проводится в соответствии с законодательством Украины. Любые претензии, споры, официальные обращения будут рассматриваться исключительно в порядке, предусмотренном законодательством Украины.</span>
                    </div>
                    <div class="cont">
                        <span class="num">8.4.</span>
                        <span class="text">Настоящее Соглашение распространяет свое действия на все дополнительные положения и условия о покупке Товара и оказанию услуг, предоставляемых на Сайте.</span>
                    </div>
                </div>
            </div>
            <!-- contacts -->
            <div class="contacts pTerms">
                <div class="faq">остались вопросы?</div>
                <div class="email">EMAIL &#8212; <a href="#"> shop@antoniobiaggi.com</a></div>
                <div class="phone">
                    &#8212; Бесплатный номер для звонков по Украине:
                    <span>0 (800) 301-041</span>
                </div>
            </div>
            <!-- /contacts -->
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

