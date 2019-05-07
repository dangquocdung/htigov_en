<?php
    $title_var = "title_" . trans('backLang.boxCode');
    $details_var = "details_" . trans('backLang.boxCode');
    $file_var = "file_" . trans('backLang.boxCode');
?>



<script src="{{ URL::asset('frontEnd/js/jssor.slider-26.7.0.min.js') }}"></script>
<script type="text/javascript">
    jssor_1_slider_init = function() {

        var jssor_1_SlideshowTransitions = [
            {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
        ];

        var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $Orientation: 2,
            $NoDrag: true
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 1900;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>

<header>
    
    <div class="container nen-trang" id="banner-main-top">
        <div class="margin-15px">

            <div style="position: relative">

                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:150px;overflow:hidden;visibility:hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/frontEnd/img/spin.svg" />
                    </div>
                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:150px;overflow:hidden;">
                        @foreach($TopBanners->where('status',1) as $key=>$SliderBanner)
                            <div data-p="170.00">
                                <img data-u="image" src="/uploads/banners/{{ $SliderBanner->$file_var }}" />
                            </div>
                        @endforeach
                        
                    </div>
                    
                </div>
                <script type="text/javascript">jssor_1_slider_init();</script>
            </div>

            <div class="menu-main hidden-xs" style="margin-bottom: 5px; z-index: 1000;">
                <div id="top_nav" class="ddsmoothmenu">
                    @include('frontEnd.includes.menu')
                </div>
            </div>
            <div class="menu-main visible-xs">
                <div id="top_nav" class="ddsmoothmenu">
                    @include('frontEnd.includes.menu-mb')
                </div>
            </div>
        </div>
    </div>

    @include('frontEnd.includes.marquee')
</header>