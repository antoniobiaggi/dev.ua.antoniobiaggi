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

    <div class="catalog-wrap smMedia">
        <!-- women -->
        <div class="womenWrap">
            <div class="women">
                <div class="title">Women</div>
                <div class="disc">The cool-girl cavalry is taking charge &#8211; put your stamp on things with suede over-the-knee and thigh-high boots.
                </div>
            </div>
            <div class="womenImg">
                <div class="singleArticle">
                    <a href="#">
                        <img src="<?=$link?>images/g_pages/image003.jpg" alt="alt">

                        <div class="articleName">How to Dress Well</div>
                    </a>
                </div>
                <div class="singleArticle">
                    <a href="#">
                        <img src="<?=$link?>images/g_pages/image004.jpg" alt="alt">
                        <div class="articleName">Your Colors</div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /women -->
        <!-- discount -->
        <div class="catalog-discountWrap">
            <div class="catalog-percent">15 <span>%</span></div>
            <div class="catalog-title">
                <div class="catalog-black">First Choice</div>
                <div class="catalog-white">Discount.</div>
            </div>
            <div class="catalog-disc">
                <div class="catalog-colorA">The cool-girl cavalry is taking charge - put your stamp on things with suede over-the-knee and thigh-high boots
                    or wear Western the right way.
                </div>
                <div class="catalog-colorB">Since 1952 when it sparked a kitten-heel fad on the Left Bank, Carel has been outfitting Parisian feet in chic,
                    playful footwear.
                </div>
            </div>
            <div class="catalog-close"></div>
        </div>
        <!-- /discount -->
        <!-- navigation -->
        <div class="catalog-nav">
            <a href="#" class="catalog-darken">Home</a>
            <span class="catalog-line">/</span>
            <a href="#" class="catalog-lighten">Women</a>
        </div>
        <!-- /navigation -->
        <!-- content -->
        <div class="catalog-contentWrap">
            <!-- sidebar -->
            <div class="catalog-l">
                <div class="catalogFilters">
                    <div class="addFilters">
                        <div class="icon"></div>
                        <div class="text">filters</div>
                    </div>
                    <div class="deleteFilters">
                        <div class="icon"></div>
                        <div class="text">hide filters</div>
                    </div>
                </div>
                <div class="catalog-select">
                    <div class="catalogue-selectName">colletion</div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">New Year Collection</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">F/W 2015-2016</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">F/W 2014-2015</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">F/W 2013-2014</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">S/S 2015</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">S/S 2014</span>
                        </label>
                    </div>
                </div>
                <div class="catalog-select">
                    <div class="catalogue-selectName">type</div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Boots</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Ancle Boots</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">High Boots</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Sneakers</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Ballet Shoes</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Sandals</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Moccasins</span>
                        </label>
                    </div>
                </div>
                <div class="catalog-select">
                    <div class="catalogue-selectName">colletion</div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Fashion</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Glam</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Classic</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Casual</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Sport</span>
                        </label>
                    </div>
                </div>
                <div class="catalog-select">
                    <div class="catalogue-selectName">size</div>
                    <div class="catalog-sizes">
                        <div class="catalog-singleSize yellowBg">35</div>
                        <div class="catalog-singleSize yellowBg">36</div>
                        <div class="catalog-singleSize">37</div>
                        <div class="catalog-singleSize">38</div>
                        <div class="catalog-singleSize">39</div>
                        <div class="catalog-singleSize">40</div>
                        <div class="catalog-singleSize">41</div>
                    </div>
                </div>
                <div class="catalog-select">
                    <div class="catalogue-selectName">color</div>
                    <div class="catalog-color">
                        <div class="catalog-singleColor border">
                            <div class="catalog-color1"></div>
                        </div>
                        <div class="catalog-singleColor">
                            <div class="catalog-color2"></div>
                        </div>
                        <div class="catalog-singleColor border">
                            <div class="catalog-color3"></div>
                        </div>
                        <div class="catalog-singleColor">
                            <div class="catalog-color4"></div>
                        </div>
                        <div class="catalog-singleColor">
                            <div class="catalog-color5"></div>
                        </div>
                        <div class="catalog-singleColor">
                            <div class="catalog-color6"></div>
                        </div>
                        <div class="catalog-singleColor">
                            <div class="catalog-color7"></div>
                        </div>
                        <div class="catalog-singleColor">
                            <div class="catalog-color8"></div>
                        </div>
                    </div>
                </div>
                <div class="catalog-select">
                    <div class="catalogue-selectName">heels</div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Low</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Medium</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">High</span>
                        </label>
                    </div>
                </div>
                <div class="catalog-select">
                    <div class="catalogue-selectName">heels</div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Stiletto</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Wedge-heeled</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Viena</span>
                        </label>
                    </div>
                    <div class="catalog-selectSingle">
                        <label>
                            <input type="checkbox">
                                <span class="bg">
                                    <span class="check"></span>
                                </span>
                            <span class="disc">Tractor</span>
                        </label>
                    </div>
                </div>
                <div class="catalog-select">
                    <div class="catalogue-selectName">price</div>
                    <div id="catalog-sliderRange"></div>
                    <input type="text" id="amount1" class="amount">
                    <div class="minus"></div>
                    <input type="text" id="amount2" class="amount">
                </div>
            </div>
            <!-- /sidebar -->
            <!-- items -->
            <div class="catalog-r">
                <div class="catalog-optionsWrap">
                    <select class="catalog-option">NEWEST
                        <option value="NEWEST">NEWEST</option>
                        <option value="NEWEST">NEWEST</option>
                        <option value="NEWEST">NEWEST</option>
                        <option value="NEWEST">NEWEST</option>
                    </select>
                    <select class="catalog-option right">SORT BY PRICE
                        <option value="SORT BY PRICE">SORT BY PRICE</option>
                        <option value="SORT BY PRICE">SORT BY PRICE</option>
                        <option value="SORT BY PRICE">SORT BY PRICE</option>
                        <option value="SORT BY PRICE">SORT BY PRICE</option>
                    </select>
                    <select class="catalog-option right">12 PER PAGE
                        <option value="12 PER PAGE">12 PER PAGE</option>
                        <option value="12 PER PAGE">12 PER PAGE</option>
                        <option value="12 PER PAGE">12 PER PAGE</option>
                        <option value="12 PER PAGE">12 PER PAGE</option>
                    </select>
                </div>
                <div class="catalog-itemsWrap">
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                    <div class="catalog-singleItem">
                        <div class="catalog-likeWrap">
                            <div class="catalog-like">
                                <div class="star"></div>
                                <div class="text">like</div>
                            </div>
                            <div class="catalog-like popup">
                                <div class="search"></div>
                                <div class="text">quick look</div>
                            </div>
                        </div>
                        <a href="#">
                            <img src="<?=$link?>images/g_pages/1_1.png" alt="alt">
                            <div class="disc">Women Leather Shoes</div>
                            <div class="price">
                                <div class="old"><strike>$560</strike></div>
                                <div class="new">$480</div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- /items -->
        <div class="catalog-paginator">
            <div class="catalog-toTop">
                <div class="catalog-arrowWrap"></div>
                <div class="catalog-topTitle">go to top</div>
            </div>
            <a href="#" class="catalog-arrowL"></a>
            <table>
                <tr>
                    <td><a href="#">1</a></td>
                    <td><a href="#">2</a></td>
                    <td><a href="#">3</a></td>
                    <td><a href="#" class="activePage">4</a></td>
                    <td><a href="#">5</a></td>
                    <td><a href="#">...</a></td>
                    <td><a href="#">25</a></td>
                </tr>
            </table>
            <a href="#" class="catalog-arrowR"></a>
            <div class="catalog-show">
                <a href="#">
                    <i class="fa fa-bars"></i>
                    <span>show all</span>
                </a>
            </div>
        </div>
    </div>
    <!-- /content -->

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
<!-- popup -->
<div class="catalog-viewPort">
    <div class="catalog-popupWrap">
        <div class="popupL">
            <div class="popupSliderBig">
                <div class="slide">
                    <img src="<?=$link?>images/g_pages/tapok.png" alt="alt">
                </div>
                <div class="slide">
                    <img src="<?=$link?>images/g_pages/tapok.png" alt="alt">
                </div>
                <div class="slide">
                    <img src="<?=$link?>images/g_pages/tapok.png" alt="alt">
                </div>
            </div>
            <div class="popupSliderSmall">
                <div class="slide">
                    <img src="<?=$link?>images/g_pages/2_1.png" alt="alt">
                </div>
                <div class="slide">
                    <img src="<?=$link?>images/g_pages/3_2.png" alt="alt">
                </div>
                <div class="slide">
                    <img src="<?=$link?>images/g_pages/4_2.png" alt="alt">
                </div>
            </div>
        </div>
        <div class="popupR">
            <div class="disc">Shoes Female Classic</div>
            <div class="price">
                <div class="old"><strike>$119.00</strike></div>
                <div class="new">$99.70</div>
            </div>
            <div class="select">
                <div class="name">color</div>
                <div class="colorWrap">
                    <div class="singleColor singleBorder">
                        <div class="color1"></div>
                    </div>
                    <div class="singleColor">
                        <div class="color2"></div>
                    </div>
                    <div class="singleColor">
                        <div class="color3"></div>
                    </div>
                </div>
            </div>
            <div class="select">
                <div class="name">size</div>
                <div class="sizes">
                    <div class="size sizeColor">35</div>
                    <div class="size">36</div>
                    <div class="size">37</div>
                    <div class="size">38</div>
                    <div class="size">39</div>
                </div>
            </div>
            <a href="#" class="full">See full details</a>
            <div class="toBasket">add to basket
                <div class="notify">Please select a size</div>
            </div>
            <div class="shareWrap">
                <div class="add">
                    <div class="star"></div>
                    <div class="text">add to wish list</div>
                </div>
                <div class="share">
                    <div class="img"></div>
                    <div class="text">Share</div>
                    <div class="shareLinksWrap">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="popupClose"></div>
        </div>
    </div>
</div>
<!-- /popup -->
</body>
</html>

