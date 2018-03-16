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