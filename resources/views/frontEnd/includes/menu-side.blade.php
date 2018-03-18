@php

    $file_var = 'file_'.trans('backLang.boxCode');
    $title_var = 'title_'.trans('backLang.boxCode');
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
    $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');

@endphp

@yield('section-menu')


<div class="right_1">
        
    @foreach($RightMenuLinks as $RightMenuLink)

        <?php
            if ($RightMenuLink->webmasterSection[$slug_var] != "" && Helper::GeneralWebmasterSettings("links_status")) {
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                    $mmnnuu_link = url(trans('backLang.code')."/" .$RightMenuLink->webmasterSection[$slug_var]);
                }else{
                    $mmnnuu_link = url($RightMenuLink->webmasterSection[$slug_var]);
                }
            }else{
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                    $mmnnuu_link =url(trans('backLang.code')."/" .$RightMenuLink->webmasterSection['name']);
                }else{
                    $mmnnuu_link =url($RightMenuLink->webmasterSection['name']);
                }
            }
        ?>

        <div class="right-item">
    
            <a href="{{ (trim($RightMenuLink->link) !="") ? $RightMenuLink->link:$mmnnuu_link }}" class="icon" title="">
    
                <i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i>
    
                <span class="nav-text">{{ $RightMenuLink->$title_var }} </span>
            </a>
        </div>
    
    @endforeach

</div>

    

<div class="block4">

    <div class="block-header" style="margin-bottom: 0">
        <h4><img src="/images/background/lotus.ico" alt="" width="26px"> {!! trans('frontLang.partners') !!}</h4>
    </div>

    @foreach ($SideBanners->where('status',1)->where('type_id',3) as $SideBanner)
        <div class="box-banner">
            <a href="{!! $SideBanner->link_url !!}" target="_blank">
                <img src="/uploads/banners/{!! $SideBanner->$file_var !!}" alt="{!! $SideBanner->$title_var !!}" title="{!! $SideBanner->$title_var !!}" width="100%">
            </a>
        </div>
    @endforeach
    
</div>

<div class="block4">

    <div class="block-header" style="margin-bottom: 0">

        <h4><img src="/images/background/lotus.ico" alt="" width="26px"> {!! trans('frontLang.events') !!}</h4>

    </div>

    @foreach ($SideBanners->where('status',1)->where('type_id',2) as $SideBanner)
        <div class="box-banner">
            <a href="{!! $SideBanner->link_url !!}" target="_blank">
                <img src="/uploads/banners/{!! $SideBanner->$file_var !!}" alt="{!! $SideBanner->$title_var !!}" title="{!! $SideBanner->$title_var !!}" width="100%">
            </a>
        </div>
    @endforeach

</div>

<div class="block4">

    <div class="block-header" style="margin-bottom: 0">

        <h4><img src="/images/background/lotus.ico" alt="" width="26px"> {!! trans('frontLang.sponsers') !!}</h4>

    </div>

    @foreach ($SideBanners->where('status',1)->where('type_id',1) as $SideBanner)
        <div class="box-banner">
            <a href="{!! $SideBanner->link_url !!}" target="_blank">
                <img src="/uploads/banners/{!! $SideBanner->$file_var !!}" alt="{!! $SideBanner->$title_var !!}" title="{!! $SideBanner->$title_var !!}" width="100%">
            </a>
        </div>
    @endforeach

</div>
