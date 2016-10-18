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
<div id="wrapper" class="idwrapper">
    <link rel="stylesheet" href="<?=$link?>js/plugins/owl.carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?=$link?>js/plugins/owl.carousel/owl.theme.css">
    <link rel="stylesheet" href="<?=$link?>js/plugins/owl.carousel/owl.transitions.css">
    <link rel="stylesheet" href="<?=$link?>css/item.css">

    <script type="text/javascript" src="<?=$link?>js/plugins/owl.carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?=$link?>js/plugins/jquery.nicescroll/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="<?=$link?>js/item.js"></script>

    <div class="clear"></div>
    <div class="catalog-nav">
        <a href="#" class="catalog-darken">Главная</a>
        <span class="catalog-line">/</span>
        <a href="#" class="catalog-darken">Women</a>
        <span class="catalog-line">/</span>
        <a href="#" class="catalog-darken">Shoes</a>
        <span class="catalog-line">/</span>
        <a href="#" class="catalog-lighten">Shoes Female Classic</a>
    </div>

</div>

<div class="item importedst">
    <div class="container">
        <div class="wrap">
            <div class="social">
                <p class="name">Share:</p>
                <ul>
                    <li class="fb"><a href="#"></a></li>
                    <li class="tw"><a href="#"></a></li>
                    <li class="inst"><a href="#"></a></li>
                </ul>
            </div>
            <div id="gallery">
                <ul>
                    <li class="totop"></li>
                    <li><img src="<?=$link?>images/item/1.jpg" alt="" /></li>
                    <li><img src="<?=$link?>images/item/22.jpg" alt="" /></li>
                    <li><img src="<?=$link?>images/item/33.jpg" alt="" /></li>
                    <li><img src="<?=$link?>images/item/44.jpg" alt="" /></li>
                    <li><img src="<?=$link?>images/item/55.jpg" alt="" /></li>
                    <li class="tonext"></li>
                </ul>
                <img src="<?=$link?>images/item/1.jpg" alt="" id="main-img" />
            </div>
            <div id="owl-demo2">
                <div class="item">
                    <img src="<?=$link?>images/item/1.jpg" alt="" />
                </div>
                <div class="item">
                    <img src="<?=$link?>images/item/22.jpg" alt="" />
                </div>
                <div class="item">
                    <img src="<?=$link?>images/item/33.jpg" alt="" />
                </div>
                <div class="item">
                    <img src="<?=$link?>images/item/44.jpg" alt="" />
                </div>
                <div class="item">
                    <img src="<?=$link?>images/item/55.jpg" alt="" />
                </div>
            </div>
            <div class="lineBottom">
                <button class="loop"></button>
                <a class="vive" href="#">360° view</a>
                <a class="sendLink" href="#">Send a link</a>
            </div>
        </div>
        <div class="description">
            <p class="art">Art. 34721</p>
            <p class="left">2 items left!</p>
            <p class="name">Shoes Female Classic</p>
            <p class="oldPrice">$119.00</p>
            <p class="price">$99.70</p>
            <div class="features">
                <p class="name">features</p>
                <ul id="boxscroll">
                    <li>Varnished effect</li>
                    <li>Narrow toeline</li>
                    <li>Protective shoe bag</li>
                    <li>Varnished effect</li>
                    <li>Narrow toeline</li>
                </ul>
            </div>
            <div class="color">
                <p class="name">Color</p>
                <ul>
                    <li class="colorBox active"><img src="<?=$link?>images/item/black.jpg" alt="" /></li>
                    <li class="colorBox"><img src="<?=$link?>images/item/gray.jpg" alt="" /></li>
                    <li class="colorBox"><img src="<?=$link?>images/item/orange.jpg" alt="" /></li>
                </ul>
            </div>
            <div class="size">
                <p class="name">Size</p>
                <a href="#" class="guide">guide</a>
                <ul>
                    <li class="active sizeBox">35</li>
                    <li class="sizeBox">36</li>
                    <li class="sizeBox">37</li>
                    <li class="sizeBox">38</li>
                    <li class="sizeBox">39</li>
                </ul>
            </div>
            <div class="features featuresXS">
                <p class="name">features</p>
                <ul id="boxscroll">
                    <li>Varnished effect</li>
                    <li>Narrow toeline</li>
                    <li>Protective shoe bag</li>
                    <li>Varnished effect</li>
                    <li>Narrow toeline</li>
                </ul>
            </div>
            <div class="payment">
                <p class="name">Split payment available</p>
                <button class="addToBasket">add to Basket</button>
                <button class="soldOut">SOLD OUT</button>
                <button class="addToWishList">add to wish list</button>
            </div>
        </div>
    </div>
</div>
<div class="review importedst">
    <div class="container">
        <div class="commentSlider">
            <a href="#" class="writeReview">Write a Review</a>
            <div id="owl-demo">
                <div class="item">
                    <img src="<?=$link?>images/item/photoCom.png" alt="Owl Image">
                    <a href="#" class="name">Joe Adams</a>
                    <a href="#" class="text">Best shoes I’ve ever seen!</a>
                </div>
                <div class="item">
                    <img src="<?=$link?>images/item/photoCom.png" alt="Owl Image">
                    <a href="#" class="name">Joe Adams</a>
                    <a href="#" class="text">Best shoes I’ve ever seen! Best shoes I’ve ever seen! Best shoes I’ve ever seen!</a>
                </div>
                <div class="item">
                    <img src="<?=$link?>images/item/photoCom.png" alt="Owl Image">
                    <a href="#" class="name">Joe Adams</a>
                    <a href="#" class="text">Best shoes I’ve ever seen!</a>
                </div>
                <div class="item">
                    <img src="<?=$link?>images/item/photoCom.png" alt="Owl Image">
                    <a href="#" class="name">Joe Adams</a>
                    <a href="#" class="text">Best shoes I’ve ever seen!</a>
                </div>
            </div>
        </div>
        <div class="description_wrap">
            <div class="wrap_description">
                <ul>
                    <li class="title active" data-id="description">Description</li>
                    <li class="title" data-id="delivery">delivery & payment</li>
                </ul>
                <div class="bow_wrap">
                    <p id="description" class="box active">An everyday pull on, over the knee boot, on a chunky, wearable heel height. The leg has been fitted to create a slim silhouette.</p>
                    <p id="delivery" class="box">fvzjvkjzvnz zfvzdfvd fvdfzvzdfv zvvf</p>
                </div>
                <a href="#" class="it_contacts">Contacts</a>
                <a href="#" class="guarantee">guarantee</a>
            </div>
        </div>
        <div id="accordion" class="description_wrap">
            <p class="accordion-toggle">Description</p>
            <div class="accordion-content">
                <p class="box active">An everyday pull on, over the knee boot, on a chunky, wearable heel height. The leg has been fitted to create a slim silhouette.</p>
            </div>
            <p class="accordion-toggle">delivery & payment</p>
            <div class="accordion-content">
                <p class="box">fvzjvkjzvnz zfvzdfvd fvdfzvzdfv zvvf</p>
            </div>
            <a href="#" class="contacts">Contacts</a>
            <a href="#" class="guarantee">guarantee</a>
        </div>
    </div>
</div>
<div class="container set importedst">
    <div class="completeSet">
        <div class="text">
            <p class="text">Stylist advice</p>
            <p class="bigText">Buy</p>
            <p class="bigText2">a complete set</p>
        </div>
        <div class="prod">
            <img src="<?=$link?>images/item/pic8.jpg" alt="" />
            <p class="name">Shoes Female Classic</p>
            <p class="price">$560</p>
        </div>
        <div class="plus">
        </div>
        <div class="prod">
            <img src="<?=$link?>images/item/bag.png" alt="" />
            <p class="name">Bag Female Classic</p>
            <p class="price">$560</p>
        </div>
        <div class="equally">
        </div>
        <div class="total">
            <p class="price">$1120</p>
            <p class="text">for total look</p>
            <button>add to Basket</button>
        </div>
    </div>
    <div class="like">
        <p class="title">you might also like</p>
        <a href="#" class="prod">
            <img src="<?=$link?>images/item/prod1.jpg" alt="" />
            <p class="name">Boots Men classic</p>
            <p class="price">$560</p>
        </a>
        <a href="#" class="prod">
            <img src="<?=$link?>images/item/prod2.jpg" alt="" />
            <p class="name">Boots Men classic</p>
            <p class="price">$560</p>
        </a>
        <a href="#" class="prod">
            <img src="<?=$link?>images/item/prod3.jpg" alt="" />
            <p class="name">Shoes Female classic</p>
            <p class="price">$560</p>
        </a>
        <a href="#" class="prod">
            <img src="<?=$link?>images/item/prod4.jpg" alt="" />
            <p class="name">Boots Female classic</p>
            <p class="price">$560</p>
        </a>
    </div>
    <a href="#" class="seeMore"> see more</a>
</div>
<div class="idwrapper">
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

