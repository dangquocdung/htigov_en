<?php
// Current Full URL
$fullPagePath = Request::url();
// Char Count of Backend folder Plus 1
$envAdminCharCount = strlen(env('BACKEND_PATH')) + 1;
// URL after Root Path EX: admin/home
$urlAfterRoot = substr($fullPagePath, strpos($fullPagePath, env('BACKEND_PATH')) + $envAdminCharCount);
?>
<?php
    $category_title_var = "title_" . trans('backLang.boxCode');
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
    $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
?>
<?php
    $link_title_var = "title_" . trans('backLang.boxCode');
    $details_var = "details_" . trans('backLang.boxCode');
    $details_var2 = "details_" . trans('backLang.boxCodeOther');
    $title_var = "title_" . trans('backLang.boxCode');
    $title_var2 = "title_" . trans('backLang.boxCodeOther');
    
?>

@extends('frontEnd.layout')

@section('content')

    @include('frontEnd.home.tin-noi-bat')
    
    <div class="clearfix"></div>

    @include('frontEnd.home.slider')

    <div class="clearfix"></div>

    @include('frontEnd.home.banner')
    
    <div class="clearfix"></div>

    @include('frontEnd.home.menu-main')

    <div class="clearfix"></div>
    
    @include('frontEnd.home.menu-organ')
    
@stop

@section('side-menu')

    @include('frontEnd.home.menu-side') 

@stop

@section('js')

<script type="text/javascript">
    $(document).ready(function ($) {

        //To chuc
        $(".btn-pref-tochuc .btn").click(function () {

            $(".btn-pref-tochuc .btn").removeClass("btn-primary").addClass("btn-default");

            $(this).removeClass("btn-default").addClass("btn-primary");

        });

        //Tin noi bat
        $(".btn-pref-tnb .btn").click(function () {

            $(".btn-pref-tnb .btn").removeClass("btn-primary").addClass("btn-default");
            
            $(this).removeClass("btn-default").addClass("btn-primary");

        });

    });
</script>

<script>

    function UnionSwitchMode2() {
    
        var isMobile = $(window).width() < 768;
        //console.log("isMobile");
        //console.log(isMobile);
    
        var idUnion_image_thumb = "tin-noi-bat"
    
        var jQueryActive = $("#" + idUnion_image_thumb + ' .active');
    
        var jQueryNext = jQueryActive.next().length ? jQueryActive.next() : $("#" + idUnion_image_thumb + ' ul li:first');
    
        //Tìm giá trị
    
        var imgAlt = jQueryNext.find('img').attr("alt");
    
        var imgSrc = jQueryNext.find('img').attr("src");
    
        var imgDesc = jQueryNext.find('.hot-news-block').html();
    
        var aHref = jQueryNext.find('a').attr("href");
    
        var imgDescHeight = $("#tinNoiBatChinh .hot-news").find('#tinNoiBatChinh .hot-news-block').height();
    
        var newsDesc = jQueryNext.find('.item-desc').html();
    
        var isMobile = $(window).width() < 768;
    
        if(!isMobile) {
    
            $("#tinNoiBatChinh .hot-news").animate({marginBottom: "0"}, 0, function () {
    
                jQueryActive.removeClass('active');
    
                jQueryNext.addClass('active');
    
                $("#tinNoiBatChinh .hot-news a").attr({href: aHref});
    
                $("#tinNoiBatChinh .hot-news img").attr({src: imgSrc, alt: imgAlt});
    
                $("#tinNoiBatChinh .hot-news .hot-news-title h3 a").attr({href: aHref});
    
                $("#tinNoiBatChinh .hot-news .hot-news-title h3 a").html(imgAlt);
    
                $("#tinNoiBatChinh .hot-news .hot-news-desc").html(newsDesc);
    
            });
        }
    
    }
    
    $(document).ready(function () {
    
        var UnionNewsRefreshInterval2
    
        $("#tin-noi-bat ul li:first").addClass('active');
    
        UnionNewsRefreshInterval2 = setInterval("UnionSwitchMode2()", "4000");
    
        $("#tin-noi-bat ul")
        .on('mouseenter',function () {
            // console.log('mouse enter');
            clearInterval(UnionNewsRefreshInterval2);
        })
        .on('mouseleave', function() {
            console.log('mouse leave');
            UnionNewsRefreshInterval2 = setInterval("UnionSwitchMode2()", "4000");
        });
    
        $("#tin-noi-bat ul li")
    
        .on('mouseenter', function() {
    
            //console.log("li mouse enter");
    
            $(this).addClass('hover');
    
            var imgAlt = $(this).find('img').attr("alt");
    
            var imgSrc = $(this).find('img').attr("src");
    
            var aHref = $(this).find('a').attr("href");
    
            var newsDesc = $(this).find('.item-desc').html();
    
            $("#tinNoiBatChinh").addClass('w3-animate-left');
    
            $("#tinNoiBatChinh .hot-news img").attr({ src: imgSrc, alt: imgAlt });
    
            $("#tinNoiBatChinh .hot-news .hot-news-title h3 a").attr({href: aHref});
    
            $("#tinNoiBatChinh .hot-news .hot-news-title h3 a").html(imgAlt);
    
            $("#tinNoiBatChinh .hot-news .hot-news-desc").html(newsDesc);
    
        })
        
        .on("mouseleave", function() {
            //console.log('li mouse leave');
            $(this).removeClass('hover');
            $("#tinNoiBatChinh").removeClass('w3-animate-left');
        //                $("#tinNoiBatChinh .hot-news .hot-news-block").stop(true, true);
        });
    
    })
</script>

@stop