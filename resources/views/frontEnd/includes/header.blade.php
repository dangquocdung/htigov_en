<header>

        <div class="site-top">

            <div class="container">

            <div>
                <div class="pull-right">
                    <strong>
                        <a href="{{ URL::to("admin") }}"><i class="fa fa-cog"></i> {{trans('frontLang.dashboard')}}
                        </a>
                    </strong>
                    @if($WebmasterSettings->languages_count ==2)
                        &nbsp; | &nbsp;
                        <strong>
                            @if(trans('backLang.code')=="vi")
                                <a href="{{ URL::to('lang/en') }}"><i
                                            class="fa fa-language "></i> {{ str_replace("[ ","",str_replace(" ]","",strip_tags(trans('backLang.englishBox')))) }}
                                </a>
                            @else
                                <a href="{{ URL::to('lang/vi') }}"><i
                                            class="fa fa-language "></i> {{ str_replace("[ ","",str_replace(" ]","",strip_tags(trans('backLang.arabicBox')))) }}
                                </a>
                            @endif

                        </strong>
                    @endif
                </div>
                <div class="pull-left">
                    @if(Helper::GeneralSiteSettings("contact_t3") !="")
                        <i class="fa fa-phone"></i> &nbsp;<a
                                href="call:{{ Helper::GeneralSiteSettings("contact_t5") }}"><span
                                    dir="ltr">{{ Helper::GeneralSiteSettings("contact_t5") }}</span></a>
                    @endif
                    @if(Helper::GeneralSiteSettings("contact_t6") !="")
                        <span class="top-email">
                        &nbsp; | &nbsp;
                    <i class="fa fa-envelope"></i> &nbsp;<a
                                    href="mailto:{{ Helper::GeneralSiteSettings("contact_t6") }}">{{ Helper::GeneralSiteSettings("contact_t6") }}</a>
                    </span>
                    @endif
                </div>
            </div>

        </div>
    </div>
    {{--<div class="navbar navbar-default">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header">--}}
                {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}
                {{--<a class="navbar-brand" href="{{ route("Home") }}">--}}
                    {{--@if(Helper::GeneralSiteSettings("style_logo_" . trans('backLang.boxCode')) !="")--}}
                        {{--<img alt=""--}}
                             {{--src="{{ URL::to('uploads/settings/'.Helper::GeneralSiteSettings("style_logo_" . trans('backLang.boxCode'))) }}">--}}
                    {{--@else--}}
                        {{--<img alt="" src="{{ URL::to('uploads/settings/nologo.png') }}">--}}
                    {{--@endif--}}

                {{--</a>--}}
            {{--</div>--}}
            {{--@include('frontEnd.includes.menu')--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="container nen-trang" id="banner-main-top">
        <div class="margin-15px">

            <div style="position: relative">
                <a href="/">
                    <img src="/uploads/topics/15203494157888.jpg" width="100%">
                </a>
            </div>

            <style>
                .menu-main, .menu-bottom {
                    width: 100%;
                    position: inherit;
                    /*background: #b74841;*/
                    /* Old browsers */
                    /*background: -moz-linear-gradient(top, #b74841 30%, #bd1208 100%);*/
                    /* FF3.6+ */
                    /*background: -webkit-gradient(linear, left top, left bottom, color-stop(30%, #b74841), color-stop(100%, #bd1208));*/
                    /* Chrome,Safari4+ */
                    /*background: -webkit-linear-gradient(top, #b74841 30%, #bd1208 100%);*/
                    /* Chrome10+,Safari5.1+ */
                    /*background: -o-linear-gradient(top, #b74841 30%, #bd1208 100%);*/
                    /* Opera 11.10+ */
                    /*background: -ms-linear-gradient(top, #b74841 30%, #bd1208 100%);*/
                    /* IE10+ */
                    /*background: linear-gradient(to bottom, #b74841 30%, #bd1208 100%);*/
                    /* W3C */
                    background: linear-gradient(to bottom, #0494da 0, #095b8c 100%);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b74841', endColorstr='#bd1208',GradientType=0 ); }

                .ddsmoothmenu {
                    /*background of menu bar (default state)*/
                    width: 100%;
                    height: 37px;
                    display: block;
                    margin: 0 auto;
                    position: relative; }

                .ddsmoothmenu ul {
                    z-index: 100;
                    height: 37px;
                    padding: 0px  0 0;
                    list-style-type: none;
                }

                /*Top level list items*/
                .ddsmoothmenu ul li {
                    position: relative;
                    display: inline;
                    float: left;
                    font-size: 100%;
                    padding: 0;
                    width: 20%;
                    text-align: center;
                    background: url(/images/menu/border.png) no-repeat right;
                }

                .ddsmoothmenu ul li:last-child {
                    /*background: url(/images/menu/border.png) no-repeat left, url(/images/menu/border.png) no-repeat right; */
                    background: none;
                }
                /*background: none }*/

                /*Top level menu link items style*/
                .ddsmoothmenu ul li a {
                    display: block;
                    background: none;
                    /*background of menu items (default state)*/
                    color: #fff;
                    padding: 0;
                    text-decoration: none;
                    line-height: 37px;
                    text-transform: uppercase;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    font-weight: 600;
                }

                * html .ddsmoothmenu ul li a {
                    /*IE6 hack to get sub menu links to behave correctly*/
                    display: inline-block; }

                .ddsmoothmenu ul li a:link, .ddsmoothmenu ul li a:visited {
                    color: #fff; }

                .ddsmoothmenu ul li.selected a {
                    /*CSS class that's dynamically added to the currently active menu items' LI A element*/
                    color: #fae2ad; }

                .ddsmoothmenu ul li a:hover {
                    /*background of menu items during onmouseover (hover state)*/
                    color: #fae2ad; }

                /*1st sub level menu*/
                .ddsmoothmenu ul li ul {
                    position: absolute;
                    left: 0;
                    display: none;
                    /*collapse all sub menus to begin with*/
                    visibility: hidden;
                    top: 37px;
                    width: 100% !important; }

                /*Sub level menu list items (undo style from Top level List Items)*/
                .ddsmoothmenu ul li ul li {
                    display: list-item;
                    float: none;
                    background-color: #e04d58 !important;
                    color: #fff;
                    padding: 0 !important;
                    background-image: none !important;
                    font-size: 13px;
                    text-align: left !important;
                    width: 100%;
                    min-width: 190px;
                    border-bottom: 1px solid #ccc; }

                .ddsmoothmenu ul li ul li:last-child {
                    width:10% !important;
                    background: #e04d58;
                    border-bottom: 0; }

                /*All subsequent sub menu levels vertical offset after 1st level sub menu */
                .ddsmoothmenu ul li ul li ul {
                    top: 0 !important; }

                /* Sub level menu links style */
                .ddsmoothmenu ul li ul li a {
                    /*width of sub menus*/
                    margin: 0;
                    line-height: 20px;
                    color: #fff;
                    padding: 6px 10px !important; }

                .ddsmoothmenu ul li ul li a:hover {
                    background: #a40000;
                    border-radius: 0; }

            </style>

            <div class="menu-main hidden-xs" style="margin-bottom: 5px; z-index: 1000;">
                <div id="top_nav" class="ddsmoothmenu">
                    @include('frontEnd.includes.menu')
                </div>
            </div>
        </div>
    </div>

    <div class="container nen-trang chao-mung">
        <marquee class="hot-tip" behavior="scroll" direction="left" scrollamount="3">
            <a href="http://demo.hatinh.gov.vn/vi/thong-tin-chi-dao-dieu-hanh/bao-cao-tinh-hinh-kt-xh/van-ban-khac/658-bao-cao-kinh-te-xa-hoi-nam-2017phuong-huong-nhiem-vu-nam-2018.hti" target="_blank" style="text-decoration: none">Báo cáo kinh tế - xã hội năm 2017,phương hướng nhiệm vụ năm 2018</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <a href="http://demo.hatinh.gov.vn/vi/chien-luoc-quy-hoach/quy-hoach-tong-the-kt-xh/van-ban-khac/65-quy-hoach-tong-the-phat-trien-kinh-te-xa-hoi-tinh-ha-tinh-den-nam-2020-tam-nhin-den-nam-2050.hti" target="_blank" style="text-decoration: none">Quy hoạch tổng thể phát triển kinh tế - xã hội tỉnh Hà Tĩnh đến năm 2020, tầm nhìn đến năm 2050</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <a href="http://demo.hatinh.gov.vn/vi/chuong-trinh-de-tai-khoa-hoc/chuong-trinh-de-tai-du-an-khoa-hoc-cong-nghe/van-ban-khac/59-danh-muc-va-giao-nhiem-vu-nghien-cuu-ung-dung-khoa-hoc-va-cong-nghe-nam-2017.hti" target="_blank" style="text-decoration: none">Danh mục và giao nhiệm vụ nghiên cứu, ứng dụng khoa học và công nghệ năm 2017</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <a href="http://demo.hatinh.gov.vn/vi/dau-tu-phat-trien/xuc-tien-dau-tu/van-ban-khac/51-chuong-trinh-xuc-tien-dau-tu-vao-ha-tinh-nam-2017.hti" target="_blank" style="text-decoration: none">CHƯƠNG TRÌNH XÚC TIẾN ĐẦU TƯ VÀO HÀ TĨNH NĂM 2017</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        </marquee>
    </div>
</header>