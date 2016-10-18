$(function () {
    $(document).ready(function () {
        var numOfPics = $('.slider-home').find('.slide-home-img').length,
            currShown = 0,
            nextShown = 1,
            intrvl,
            animblock = false;

        var objset = $('.slide-home-img');
        for(var i=1; i<objset.length;i++) {
            objset.eq(i).css({
                opacity: 0
            });
        }

        var pointsSize = ($('.switch').find('.slider-home-point').length*28)-20;

        //$('.slider-left-arrow').css({
        //    marginLeft: -Math.round(pointsSize/2)-50
        //});
        //$('.slider-right-arrow').css({
        //    marginRight: -Math.round(pointsSize/2)-50
        //});

        intervalContl();

        for(j=0;j<numOfPics;j++){
            if(j!=0) {
                $('.slider-home').find('.slide-home-img').eq(j).addClass('blockmouse');
            }
        }

        $('.slider-home-point').click(function(){
            if(!animblock) {
                animblock = true;
                clearInterval(intrvl);

                console.log($(this).index());
                //currShown = $(this).index();
                nextShown = $(this).index();

                if (nextShown > numOfPics-1) {
                    nextShown = 0;
                }
                ChangePic();
                intervalContl();
            }
        });

        $('.slider-right-arrow').click(function(){
            if(!animblock) {
                animblock = true;
                clearInterval(intrvl);

                nextShown = currShown+1;

                if (nextShown > numOfPics-1) {
                    nextShown = 0;
                }
                ChangePic();
                intervalContl();
            }
        });

        $('.slider-left-arrow').click(function(){
            if(!animblock) {
                animblock = true;
                clearInterval(intrvl);

                nextShown=currShown-1;

                if (nextShown < 0) {
                    nextShown = numOfPics-1;
                }
                ChangePic();
                intervalContl();
            }
        });

        $('.slider-home').swipe( {
            //$(document).swipe( {
            swipeLeft:function(event, direction, distance, duration) {
                console.log('swipeLeft');
                if(!animblock) {
                    animblock = true;
                    clearInterval(intrvl);

                    nextShown = currShown+1;

                    if (nextShown > numOfPics-1) {
                        nextShown = 0;
                    }
                    ChangePic();
                    intervalContl();
                }
            },
            swipeRight:function(event, direction, distance, duration) {
                console.log('swipeRight');
                if(!animblock) {
                    animblock = true;
                    clearInterval(intrvl);

                    nextShown=currShown-1;

                    if (nextShown < 0) {
                        nextShown = numOfPics-1;
                    }
                    ChangePic();
                    intervalContl();
                }
            },
            threshold:30,
            allowPageScroll:"horizontal",
            excludedElements:"button, input, select, textarea, .noSwipe"
        });


        function intervalContl(){
            intrvl = setInterval( function () {
                animblock = true;
                ChangePic();
            },10000);
        }

        function ChangePic(){
            var obj = $('.slider-home').find('.slide-home-img').eq(currShown);
            var obj2 = $('.slider-home').find('.slide-home-img').eq(nextShown);

            obj.animate({
                opacity: 0
            }, 1000, function () {
                console.log('addclass');
                obj.addClass('blockmouse');
            });
            obj2.animate({
                opacity: 1
            }, 1000, function () {
                $('.switch').find('.slider-home-point').eq(currShown).removeClass('active');
                $('.switch').find('.slider-home-point').eq(nextShown).addClass('active');

                currShown = nextShown;
                nextShown++;
                if (nextShown > numOfPics-1) {
                    nextShown = 0;
                }
                obj2.removeClass('blockmouse');
                animblock = false;
            });
        }

        fResize();
        jQuery(window).resize(function () {
            fResize();
        });
        $('.slide-home-img').find('img').eq(0).on('load', function () {
            fResize();
        }).load();


        function fResize() {
            var winW = $(window).width(),
                winH = $(window).height();

            var obj = $('.slide-home-img');

            /*if(winW>1920) {
             $('.slider-home').css({
             marginLeft: ''
             });
             }else{
             $('.slider-home').css({
             marginLeft: -winW/2+'px'
             });
             }*/

            // console.log(obj.find('img')[0].clientHeight);
            heightOfPic = obj.eq(0).height();
            for(i=1; i<obj.length;i++) {
                obj.eq(i).css({
                    marginTop: -heightOfPic+'px'
                });
            }
            /*$('.slider-home, .slide-home-img').css({
             height: heightOfPic+'px'
             })*/
        }


    });
});