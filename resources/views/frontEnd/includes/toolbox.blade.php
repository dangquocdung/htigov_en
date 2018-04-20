{{--<div id="left-side-menu">--}}
    {{--<nav class="animate">--}}
        {{--<ul>--}}
            {{--@foreach ($chuyenmuc->where('vitri','1') as $cm)--}}
                {{--<li>--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $cm->name }}</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</nav>--}}
    {{----}}
    {{--<div class="nav-controller">--}}
        {{--<span class="[ glyphicon glyphicon-chevron-down ] controller-open"></span>--}}
        {{--<span class="[ glyphicon glyphicon-remove ] controller-close"></span>--}}
    {{--</div>--}}
{{--</div>--}}

<div id="side-menu">
    <ul id="navigation">
        

        {{-- <li class="home"><a href="/" title="Trang chủ"><span><i class="glyphicon glyphicon-home"></i></span></a></li> --}}
       

        @if($WebmasterSettings->languages_count ==2)
            <li>
                       
                       
                @if(trans('backLang.code')=="vi")
                    <a href="{{ URL::to('lang/en') }}" title="{{ str_replace("[ ","",str_replace(" ]","",strip_tags(trans('backLang.englishBox')))) }}">
                        <span>
                            <i class="fa fa-language "></i>
                        </span>
                    </a>
                @else
                    <a href="{{ URL::to('lang/vi') }}" title="{{ str_replace("[ ","",str_replace(" ]","",strip_tags(trans('backLang.arabicBox')))) }}">
                        <span>
                            <i class="fa fa-language "></i> 
                        </span>
                    </a>
                @endif

            </li>

            
        @endif

        {{--  @if (!empty($ReadTopic))
            <li class="search">
                <a href="javascript:void(0);" title="Đọc tin " onClick="playTTS('{{strip_tags($ReadTopic->title_vi. " ".$ReadTopic->$details) }}','130')">
                    <span>
                        <i class="fa fa-volume-up"></i></a>
                    </span>
                </a>
            </li>
        @endif  --}}


        

        <li class="search"><a href="javascript:void(0);" title="Phóng to " onclick="resizeText(1)"><span><i class="glyphicon glyphicon-zoom-in"></i></span></a></li>
        <li class="search"><a href="javascript:void(0);" title="Thu nhỏ " onclick="window.location.reload()"><span><i class="fa fa-refresh"></i></span></a></li>
        {{-- <li class="home"><a href="javascript:void(0);" title="Tải lại trang " onclick="location.reload();"><span><i class="glyphicon glyphicon-refresh"></i></span></a></li> --}}

        <li class="home">
            <a href="{{ URL::to("admin") }}" title="{{trans('frontLang.dashboard')}}">
                <span><i class="fa fa-user-circle-o"></i></span>
            </a>
        </li>
        

       
        


    </ul>
</div>




