@php

    $file_var = 'file_'.trans('backLang.boxCode');
    $title_var = 'title_'.trans('backLang.boxCode');
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
    $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');

@endphp



<div class="block4" style="border:none;">
    {{Form::open(['route'=>['searchTopics'],'method'=>'POST','class'=>'form-search'])}}
    <div class="input-group input-group-sm">
        {!! Form::text('search_word',@$search_word, array('placeholder' => trans('frontLang.search'),'class' => 'form-control','id'=>'search_word','required'=>'')) !!}
        <span class="input-group-btn">
            <button type="submit" class="btn btn-theme"><i class="fa fa-search"></i></button>
        </span>
    </div>

    {{Form::close()}}
</div>
@yield('section-menu')


    

@if (!empty($RightMenuLinks))
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

                @if (!empty($RightMenuLink->icon))
                    
                    <i class="fa {{$RightMenuLink->icon}} fa-2x" aria-hidden="true"></i>

                @else
    
                    <i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i>

                @endif
    
                <span class="nav-text">{{ $RightMenuLink->$title_var }} </span>
            </a>
        </div>
    
    @endforeach

</div>
@endif

{{--  <a class="dichvucong" href="#">
    <a href="https://www.accuweather.com/vi/vn/ha-tinh/353418/weather-forecast/353418" class="aw-widget-legal"></a>
    <div id="awcc1491117457730" class="aw-widget-current"  data-locationkey="353418" data-unit="c" data-language="vi" data-useip="false" data-uid="awcc1491117457730"></div>
    <script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
</a>  --}}

<div class="block4" style="border-radius: 5px">

    <div id="block-header-bd" class="block-header" style="margin-bottom: 0" data-toggle="collapse" href="#thoi-tiet-ha-tinh">

        <h4>
            <img src="/images/background/lotus.ico" alt="" width="26px"> Thời tiết Hà Tĩnh
        </h4>

    </div>

    <div class="clearfix"></div>

    <div id="thoi-tiet-ha-tinh" class="panel-collapse collapse in">
        <a href="http://www.nchmf.gov.vn/web/vi-VN/62/20/28/map/Default.aspx" target="_blank">
            <div style="padding: 5px 15px">

                <div id="thoi-tiet" class="thoi-tiet"></div>
            </div>

            
        </a>
    </div>

</div>



<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=1857385837639663&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
        }
        (document, 'script', 'facebook-jssdk')
    );
</script>

<div class="block4">

    <div class="fb-page" data-href="https://www.facebook.com/dulichbienhatinh/" 
        >
        <blockquote cite="https://www.facebook.com/dulichbienhatinh/" class="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/dulichbienhatinh/">Du Lịch Biển Hà Tĩnh</a>
        </blockquote>
    </div>
</div>


    

    








@if (!empty($SideBanners))
    

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

    @if ($SideBanners->where('status',1)->where('type_id',1)->count() > 0)

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
    @endif

@endif



<div class="block4">

    <div class="block-header" style="margin-bottom: 0">

        <h4><img src="/images/background/lotus.ico" alt="" width="26px"> Thống kê</h4>

    </div>
    <div class="clearfix"></div>

    <div class="box-banner" style="text-align:center">

        <div style="padding: 5px 15px">

            <table style="text-align:left; font-size:0.9em; margin-bottom: 5px;">
                <tr>
                    <td>Số lượt truy cập hôm nay: &emsp;</td>
                    <th>{{ number_format($TodayVisitors) }}</th>
                </tr>
                <tr>
                    <td>Số lượt xem trang hôm nay: &emsp;</td>
                    <th>{{ number_format($TodayPages) }}</th>
                </tr>
            </table>

            <table style="text-align:left; font-size:0.9em">
                    
                    <tr>
                        <td>Tổng lượt truy cập: &emsp;</td>
                        <th>{{ number_format($Visitors) }}</th>
                    </tr>
                    <tr>
                        <td>Tổng lượt xem trang: &emsp;</td>
                        <th>{{ number_format($Pages) }}</th>
                    </tr>
                </table>

        </div>
    </div>
</div>


{{--  <div class="clearfix"></div>
<iframe frameborder="0" src="//www.tygia.com/api.php?column=1&amp;title=0&amp;chart=0&amp;gold=1&amp;rate=0&amp;expand=0&amp;color=B4D0D0&amp;titlecolor=333333&amp;nganhang=VIETCOM&amp;fontsize=80&amp;change=0&amp;css=%23SJC_N_ng{display:%20table-row%20!important;}" style="border: none;" width="100%" height="100%"></iframe>

<div class="clearfix"></div>
<iframe frameborder="0" src="//www.tygia.com/api.php?column=1&amp;title=0&amp;chart=0&amp;gold=0&amp;rate=1&amp;ngoaite=usd,jpy,chf,eur,gbp,aud&amp;expand=0&amp;color=B4D0D0&amp;titlecolor=333333&amp;bgcolor=ffffff&amp;upcolor=00aa00&amp;downcolor=bb0000&amp;textcolor=333333&amp;nganhang=VIETCOM&amp;fontsize=80&amp;ngay=" style="border: none;" width="100%" height="100%"></iframe>  --}}
        
   


{{--  <div class="card">
      
    <ul class="nav nav-tabs" role="tablist" style="border-bottom: none">

        <li class="active">
            
            <a href="#ty-gia" data-toggle="tab">
                
                <span class="hidden-xs">
                    Tỉ giá ngoại tệ
                </span>
                
            </a>
        </li>
        <li>
            
            <a href="#gia-vang" data-toggle="tab">
                
                <span class="hidden-xs">
                    Giá vàng
                </span>
                
            </a>
        </li>
            
    </ul>

    <div class="tab-content">
        
        <div class="to-chuc tab-pane active" id="ty-gia">
            ty-gia
        </div>

        <div class="to-chuc tab-pane" id="gia-vang">
            gia-vang
        </div>

    </div>

</div>  --}}


<script src="{{ URL::asset('frontEnd/js/hypersonic-weather.js') }}"></script>

<script>
    $('.thoi-tiet').hwPlugin({
        style: 'style6',
        country: 'Ha Tinh',
        temperature_metrics: 'C',
        
    });
</script>








