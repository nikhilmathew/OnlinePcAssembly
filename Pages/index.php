<?php 
include("layoutfrontpage.php");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="../favicon.ico"> 
   
    <link rel="stylesheet" href="../bigvideoslideshow/css/style.css">
    <link rel="stylesheet" href="../bigvideoslideshow/css/bigvideo.css">
    <script src="../bigvideoslideshow/js/modernizr-2.5.3.min.js"></script>
    <!--[if lte IE 8]>
    <style>
        /* Rotation of the arrow element for IE < 9 */
        .next-icon { /* IE Matrix Calculator - http: //www.boogdesign.com/examples/transforms/matrix-calculator.html */;
            -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(M11=0.70710678, M12=-0.70710678, M21=0.70710678, M22=0.70710678,sizingMethod='auto expand')";
            filter: progid:DXImageTransform.Microsoft.Matrix(M11=0.70710678, M12=-0.70710678, M21=0.70710678, M22=0.70710678,sizingMethod='auto expand');
        }
    </style>
    <![endif]-->
</head>
<body>

    

    

<div class="wrapper">
        <div class="screen" id="screen-1" data-video="../bigvideoslideshow/vid/bird.mp4">
            <img src="../bigvideoslideshow/img/bird.jpg" class="big-image" />
            
    </div>
        <div class="screen" id="screen-2" data-video="../bigvideoslideshow/vid/satellite.mp4"> 
        <img src="../bigvideoslideshow/img/satellite.jpg" class="big-image" /> </div>
    
    <div class="screen" id="screen-3" data-video="../bigvideoslideshow/vid/camera.mp4">
        <img src="../bigvideoslideshow/img/camera.jpg" class="big-image" />
            
    </div>
        <div class="screen" id="screen-4" data-video="../bigvideoslideshow/vid/spider.mp4">
            <img src="../bigvideoslideshow/img/spider.jpg" class="big-image" />
            
  </div>
        <div class="screen" id="screen-5" data-video="../bigvideoslideshow/vid/dandelion.mp4">
            <img src="../bigvideoslideshow/img/dandelion.jpg" class="big-image" />
            
  </div>
    </div>

    <nav id="next-btn">
        <a href="#" class="next-icon"></a>
    </nav>

    <!-- BigVideo Dependencies -->
   
    <script>window.jQuery || document.write('<script src="../bigvideoslideshow/js/jquery-1.8.1.min.js"><\/script>')</script>
    <script src="../bigvideoslideshow/js/jquery-ui-1.8.22.custom.min.js"></script>
    <script src="../bigvideoslideshow/js/jquery.imagesloaded.min.js"></script>
    <script src="../bigvideoslideshow/js/video.js"></script>

    <!-- BigVideo -->
    <script src="../bigvideoslideshow/js/bigvideo.js"></script>

    <!-- Tutorial Demo -->
    <script src="../bigvideoslideshow/js/jquery.transit.min.js"></script>
    <script>
        $(function() {

            // Use Modernizr to detect for touch devices, 
            // which don't support autoplay and may have less bandwidth, 
            // so just give them the poster images instead
            var screenIndex = 1,
                numScreens = $('.screen').length,
                isTransitioning = false,
                transitionDur = 1000,
                BV,
                videoPlayer,
                isTouch = Modernizr.touch,
                $bigImage = $('.big-image'),
                $window = $(window);
            
            if (!isTouch) {
                // initialize BigVideo
                BV = new $.BigVideo({forceAutoplay:isTouch});
                BV.init();
                showVideo();
                
                BV.getPlayer().addEvent('loadeddata', function() {
                    onVideoLoaded();
                });

                // adjust image positioning so it lines up with video
                $bigImage
                    .css('position','relative')
                    .imagesLoaded(adjustImagePositioning);
                // and on window resize
                $window.on('resize', adjustImagePositioning);
            }
            
            // Next button click goes to next div
            $('#next-btn').on('click', function(e) {
                e.preventDefault();
                if (!isTransitioning) {
                    next();
                }
            });

            function showVideo() {
                BV.show($('#screen-'+screenIndex).attr('data-video'),{ambient:true});
            }

            function next() {
                isTransitioning = true;
                
                // update video index, reset image opacity if starting over
                if (screenIndex === numScreens) {
                    $bigImage.css('opacity',1);
                    screenIndex = 1;
                } else {
                    screenIndex++;
                }
                
                if (!isTouch) {
                    $('#big-video-wrap').transit({'left':'-100%'},transitionDur)
                }
                    
                (Modernizr.csstransitions)?
                    $('.wrapper').transit(
                        {'left':'-'+(100*(screenIndex-1))+'%'},
                        transitionDur,
                        onTransitionComplete):
                    onTransitionComplete();
            }

            function onVideoLoaded() {
                $('#screen-'+screenIndex).find('.big-image').transit({'opacity':0},500)
            }

            function onTransitionComplete() {
                isTransitioning = false;
                if (!isTouch) {
                    $('#big-video-wrap').css('left',0);
                    showVideo();
                }
            }

            function adjustImagePositioning() {
                $bigImage.each(function(){
                    var $img = $(this),
                        img = new Image();

                    img.src = $img.attr('src');

                    var windowWidth = $window.width(),
                        windowHeight = $window.height(),
                        r_w = windowHeight / windowWidth,
                        i_w = img.width,
                        i_h = img.height,
                        r_i = i_h / i_w,
                        new_w, new_h, new_left, new_top;

                    if( r_w > r_i ) {
                        new_h   = windowHeight;
                        new_w   = windowHeight / r_i;
                    }
                    else {
                        new_h   = windowWidth * r_i;
                        new_w   = windowWidth;
                    }

                    $img.css({
                        width   : new_w,
                        height  : new_h,
                        left    : ( windowWidth - new_w ) / 2,
                        top     : ( windowHeight - new_h ) / 2
                    })

                });

            }
        });
    </script>
</body>
</html>