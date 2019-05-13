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
                            <img src="/frontEnd/img/en-US.gif" alt="English">
                            {{-- <i class="fa fa-language "></i> --}}
                        </span>
                    </a>
                @else
                    <a href="{{ URL::to('lang/vi') }}" title="{{ str_replace("[ ","",str_replace(" ]","",strip_tags(trans('backLang.arabicBox')))) }}">
                        <span>
                            <img src="/frontEnd/img/vi-VN.gif" alt="Tiếng Việt">
                            {{-- <i class="fa fa-language "></i>  --}}
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


        

        {{-- <li class="search"><a href="javascript:void(0);" title="Phóng to " onclick="resizeText(1)"><span><i class="glyphicon glyphicon-zoom-in"></i></span></a></li>
        <li class="search"><a href="javascript:void(0);" title="Thu nhỏ " onclick="window.location.reload()"><span><i class="fa fa-refresh"></i></span></a></li> --}}
        {{-- <li class="home"><a href="javascript:void(0);" title="Tải lại trang " onclick="location.reload();"><span><i class="glyphicon glyphicon-refresh"></i></span></a></li> --}}

        <li class="home">
            <a href="{{ URL::to("admin") }}" title="{{trans('frontLang.dashboard')}}">

                
                {{-- @if (Auth::check())

                    <span class="avatar w-32">
                        @if(Auth::user()->photo !="")
                            <img src="{{ URL::to('uploads/users/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}"
                                title="{{ Auth::user()->name }}">
                        @else
                            <img src="{{ URL::to('backEnd/assets/images/profile.jpg') }}" alt="{{ Auth::user()->name }}"
                                title="{{ Auth::user()->name }}">
                        @endif
                    </span>

                @else
                    <span><i class="fa fa-user-circle-o"></i></span>
                @endif --}}

                <span><i class="fa fa-user-circle-o"></i></span>
            </a>
        </li>
        

       
        


    </ul>
</div>




