<a href="#" title="{{ trans('frontLang.toTop') }}" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<script src="{{ URL::asset('frontEnd/js/jquery.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/jquery.fancybox-media.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/google-code-prettify/prettify.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/portfolio/jquery.quicksand.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/portfolio/setting.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/animate.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/custom.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function ($) {

        //
        $('[data-toggle="offcanvas-mb"]').click(function () {
            $('.row-offcanvas').toggleClass('active')
          });

          
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

        //Ban do

        $('#block-header-bd').click(function () {
            $("#menu-bd").toggleClass('rotated')
        })

    });
</script>

<script>

        function UnionSwitchMode2() {
        
            var isMobile = $(window).width() < 768;
            console.log("isMobile");
            console.log(isMobile);
        
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
                console.log('mouse enter');
                clearInterval(UnionNewsRefreshInterval2);
            })
            .on('mouseleave', function() {
                console.log('mouse leave');
                UnionNewsRefreshInterval2 = setInterval("UnionSwitchMode2()", "4000");
            });
        
            $("#tin-noi-bat ul li")
        
            .on('mouseenter', function() {
        
                console.log("li mouse enter");
        
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
                console.log('li mouse leave');
                $(this).removeClass('hover');
                $("#tinNoiBatChinh").removeClass('w3-animate-left');
            //                $("#tinNoiBatChinh .hot-news .hot-news-block").stop(true, true);
            });
        
        })
    </script>

{{--ajax subscribe to news letter--}}
@if(Helper::GeneralSiteSettings("style_subscribe"))
<script type="text/javascript">
    $(document).ready(function ($) {
        "use strict";

        //Subscribe
        $('form.subscribeForm').submit(function () {

            var f = $(this).find('.form-group'),
                    ferror = false,
                    emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

            f.children('input').each(function () { // run all inputs

                var i = $(this); // current input
                var rule = i.attr('data-rule');

                if (rule !== undefined) {
                    var ierror = false; // error flag for current input
                    var pos = rule.indexOf(':', 0);
                    if (pos >= 0) {
                        var exp = rule.substr(pos + 1, rule.length);
                        rule = rule.substr(0, pos);
                    } else {
                        rule = rule.substr(pos + 1, rule.length);
                    }

                    switch (rule) {
                        case 'required':
                            if (i.val() === '') {
                                ferror = ierror = true;
                            }
                            break;

                        case 'minlen':
                            if (i.val().length < parseInt(exp)) {
                                ferror = ierror = true;
                            }
                            break;

                        case 'email':
                            if (!emailExp.test(i.val())) {
                                ferror = ierror = true;
                            }
                            break;

                        case 'checked':
                            if (!i.attr('checked')) {
                                ferror = ierror = true;
                            }
                            break;

                        case 'regexp':
                            exp = new RegExp(exp);
                            if (!exp.test(i.val())) {
                                ferror = ierror = true;
                            }
                            break;
                    }
                    i.next('.validation').html('<i class=\"fa fa-info\"></i> &nbsp;' + ( ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show();
                    !ierror ? i.next('.validation').hide() : i.next('.validation').show();
                }
            });
            if (ferror) return false;
            else var str = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo route("subscribeSubmit"); ?>",
                data: str,
                success: function (msg) {
                    if (msg == 'OK') {
                        $("#subscribesendmessage").addClass("show");
                        $("#subscribeerrormessage").removeClass("show");
                        $("#subscribe_name").val('');
                        $("#subscribe_email").val('');
                    }
                    else {
                        $("#subscribesendmessage").removeClass("show");
                        $("#subscribeerrormessage").addClass("show");
                        $('#subscribeerrormessage').html(msg);
                    }

                }
            });
            return false;
        });
        

    });
</script>
@endif
<?php
if($PageTitle==""){
    $PageTitle = Helper::GeneralSiteSettings("site_title_" . trans('backLang.boxCode'));
}
?>
{!! Helper::SaveVisitorInfo($PageTitle) !!}
