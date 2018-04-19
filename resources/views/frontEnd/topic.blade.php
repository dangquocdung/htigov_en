<?php
    $category_title_var = "title_" . trans('backLang.boxCode');
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
    $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
?>

@extends('frontEnd.layout')

@section('meta')
<meta property="fb:app_id" content="1857385837639663" /> 
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$Topic->title_vi}}" />
<meta property="og:description" content="{{ str_limit(strip_tags($Topic->details_vi), $limit = 100, $end = '...') }}" />
<meta property="og:image" content="{{ URL::to('uploads/topics/'.$Topic->photo_file) }}" />
<meta property="og:image:alt" content="{{$Topic->title_vi}}" />
@stop

@section('content')
    <?php
        $title_var = "title_" . trans('backLang.boxCode');
        $title_var2 = "title_" . trans('backLang.boxCodeOther');
        $details_var = "details_" . trans('backLang.boxCode');
        $details_var2 = "details_" . trans('backLang.boxCodeOther');
        if ($Topic->$title_var != "") {
            $title = $Topic->$title_var;
        } else {
            $title = $Topic->$title_var2;
        }
        if ($Topic->$details_var != "") {
            $details = $details_var;
        } else {
            $details = $details_var2;
        }
        $section = "";
        try {
            if ($Topic->section->$title_var != "") {
                $section = $Topic->section->$title_var;
            } else {
                $section = $Topic->section->$title_var2;
            }
        } catch (Exception $e) {
            $section = "";
        }
    ?>
   
    <section id="content">
            <div class="block3">

                    <div class="portlet-header">
                        
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
                            </li>
    
                            @if($WebmasterSection->id != 1)
                                <li class="active">{!! trans('backLang.'.$WebmasterSection->name) !!}</li>
                            @else
                                <li class="active">{{ $title }}</li>
                            @endif
    
                            @if(count($CurrentCategory) >0)
                                <?php
                                $category_title_var = "title_" . trans('backLang.boxCode');
                                ?>
                                <li class="active">
                                    <i class="icon-angle-right"></i>{{ $CurrentCategory->$category_title_var }}
                                </li>
                            @endif
    
                        </ul>

                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12">
                        <article>
                            @if($WebmasterSection->type==2 && $Topic->video_file!="")
                                {{--video--}}
                                <div class="post-video">
                                    <div class="post-heading">
                                        <h3>
                                            @if($Topic->icon !="")
                                                <i class="fa {!! $Topic->icon !!} "></i>&nbsp;
                                            @endif
                                            {{ $title }}
                                        </h3>
                                    </div>
                                    <div class="video-container responsive-video">
                                        @if($Topic->video_type ==1)
                                            <?php
                                            $Youtube_id = Helper::Get_youtube_video_id($Topic->video_file);
                                            ?>
                                            @if($Youtube_id !="")
                                                {{-- Youtube Video --}}
                                                <iframe allowfullscreen
                                                        src="https://www.youtube.com/embed/{{ $Youtube_id }}">
                                                </iframe>
                                            @endif
                                        @elseif($Topic->video_type ==2)
                                            <?php
                                            $Vimeo_id = Helper::Get_vimeo_video_id($Topic->video_file);
                                            ?>
                                            @if($Vimeo_id !="")
                                                {{-- Vimeo Video --}}
                                                <iframe allowfullscreen
                                                        src="http://player.vimeo.com/video/{{ $Vimeo_id }}?title=0&amp;byline=0">
                                                </iframe>
                                            @endif

                                        @elseif($Topic->video_type ==3)
                                            @if($Topic->video_file !="")
                                                {{-- Embed Video --}}
                                                {!! $Topic->video_file !!}
                                            @endif

                                        @else
                                            <video width="100%" height="450" controls autoplay>
                                                <source src="{{ URL::to('uploads/topics/'.$Topic->video_file) }}"
                                                        type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif

                                    </div>
                                </div>
                            @elseif($WebmasterSection->type==3 && $Topic->audio_file!="")
                                {{--audio--}}
                                <div class="post-video">
                                    <div class="post-heading">
                                        <h3>
                                            @if($Topic->icon !="")
                                                <i class="fa {!! $Topic->icon !!} "></i>&nbsp;
                                            @endif
                                            {{ $title }}
                                        </h3>
                                    </div>
                                    @if($Topic->photo_file !="")
                                        <img src="{{ URL::to('uploads/topics/'.$Topic->photo_file) }}"
                                            alt="{{ $title }}"/>
                                    @endif
                                    <div>
                                        <audio controls autoplay>
                                            <source src="{{ URL::to('uploads/topics/'.$Topic->audio_file) }}"
                                                    type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>

                                    </div>
                                </div>

                            @elseif(count($Topic->photos)>0)
                                {{--photo slider--}}
                                <div class="post-slider">
                                    <div class="post-heading">
                                        <h3>
                                            @if($Topic->icon !="")
                                                <i class="fa {!! $Topic->icon !!} "></i>&nbsp;
                                            @endif
                                            {{ $title }}
                                        </h3>
                                    </div>
                                    <!-- start flexslider -->
                                    {{--  <div class="p-slider flexslider">
                                        <ul class="slides">
                                            @if($Topic->photo_file !="")
                                                <li>
                                                    <img src="{{ URL::to('uploads/topics/'.$Topic->photo_file) }}"
                                                        alt="{{ $title }}"/>
                                                </li>
                                            @endif
                                            @foreach($Topic->photos as $photo)
                                                <li>
                                                    <img src="{{ URL::to('uploads/topics/'.$photo->file) }}"
                                                        alt="{{ $photo->title  }}"/>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>  --}}
                                    <!-- end flexslider -->
                                    <script type="text/javascript">
                                        jssor_2_slider_init = function() {
                                
                                            var jssor_2_SlideshowTransitions = [
                                              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                                              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
                                            ];
                                
                                            var jssor_2_options = {
                                              $AutoPlay: 1,
                                              $SlideshowOptions: {
                                                $Class: $JssorSlideshowRunner$,
                                                $Transitions: jssor_2_SlideshowTransitions,
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
                                
                                            var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);
                                
                                            /*#region responsive code begin*/
                                
                                            var MAX_WIDTH = 980;
                                
                                            function ScaleSlider() {
                                                var containerElement = jssor_2_slider.$Elmt.parentNode;
                                                var containerWidth = containerElement.clientWidth;
                                
                                                if (containerWidth) {
                                
                                                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
                                
                                                    jssor_2_slider.$ScaleWidth(expectedWidth);
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
                                    <style>
                                        /*jssor slider loading skin spin css*/
                                        .jssorl-009-spin img {
                                            animation-name: jssorl-009-spin;
                                            animation-duration: 1.6s;
                                            animation-iteration-count: infinite;
                                            animation-timing-function: linear;
                                        }
                                
                                        @keyframes jssorl-009-spin {
                                            from { transform: rotate(0deg); }
                                            to { transform: rotate(360deg); }
                                        }
                                
                                        .jssora061 {display:block;position:absolute;cursor:pointer;}
                                        .jssora061 .a {fill:none;stroke:#fff;stroke-width:360;stroke-linecap:round;}
                                        .jssora061:hover {opacity:.8;}
                                        .jssora061.jssora061dn {opacity:.5;}
                                        .jssora061.jssora061ds {opacity:.3;pointer-events:none;}
                                    </style>
                                    <div id="jssor_2" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:600px;overflow:hidden;visibility:hidden;">
                                        <!-- Loading Screen -->
                                        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="frontEnd/img/spin.svg" />
                                        </div>
                                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:600px;overflow:hidden;">
                                            @foreach($Topic->photos as $photo)
                                                <div data-p="170.00">
                                                    <img data-u="image" src="{{ URL::to('uploads/topics/'.$photo->file) }}" /alt="{{ $photo->title  }}">
                                                    <div u="thumb">{{ $photo->description  }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Thumbnail Navigator -->
                                        <div u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:980px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
                                            <div u="slides">
                                                <div u="prototype" style="position:absolute;top:0;left:0;width:980px;height:50px;">
                                                    <div u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Arrow Navigator -->
                                        <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
                                            </svg>
                                        </div>
                                        <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <script type="text/javascript">jssor_2_slider_init();</script>
                                </div>

                            @else
                                {{--one photo--}}
                                <div class="post-image">
                                    <div class="post-heading">
                                        <h3>
                                            @if($Topic->icon !="")
                                                <i class="fa {!! $Topic->icon !!} "></i>&nbsp;
                                            @endif
                                            {{ $title }}
                                        </h3>
                                    </div>
                                    {{--  @if($Topic->photo_file !="")
                                        <img src="{{ URL::to('uploads/topics/'.$Topic->photo_file) }}"
                                            alt="{{ $title }}" title="{{ $title }}"/>
                                    @endif  --}}
                                </div>
                            @endif

                            {{--Additional Feilds--}}
                            @if(count($Topic->webmasterSection->customFields) >0)
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <?php
                                            $cf_title_var = "title_" . trans('backLang.boxCode');
                                            $cf_title_var2 = "title_" . trans('backLang.boxCodeOther');
                                            ?>
                                            @foreach($Topic->webmasterSection->customFields as $customField)
                                                <?php
                                                if ($customField->$cf_title_var != "") {
                                                    $cf_title = $customField->$cf_title_var;
                                                } else {
                                                    $cf_title = $customField->$cf_title_var2;
                                                }

                                                $cf_saved_val = "";
                                                $cf_saved_val_array = array();
                                                if (count($Topic->fields) > 0) {
                                                    foreach ($Topic->fields as $t_field) {
                                                        if ($t_field->field_id == $customField->id) {
                                                            if ($customField->type == 7) {
                                                                // if multi check
                                                                $cf_saved_val_array = explode(", ", $t_field->field_value);
                                                            } else {
                                                                $cf_saved_val = $t_field->field_value;
                                                            }
                                                        }
                                                    }
                                                }

                                                ?>

                                                @if(($cf_saved_val!="" || count($cf_saved_val_array) > 0) && ($customField->lang_code == "all" || $customField->lang_code == trans('backLang.boxCode')))
                                                    @if($customField->type ==12)
                                                        {{--Vimeo Video Link--}}
                                                        <?php
                                                        $CF_Vimeo_id = Helper::Get_vimeo_video_id($cf_saved_val);
                                                        ?>
                                                        @if($CF_Vimeo_id !="")
                                                            <div class="row field-row">
                                                                <div class="col-lg-3">
                                                                    {!!  $cf_title !!} :
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    {{-- Vimeo Video --}}
                                                                    <iframe allowfullscreen style="height:450px;width: 100%"
                                                                            src="http://player.vimeo.com/video/{{ $CF_Vimeo_id }}?title=0&amp;byline=0">
                                                                    </iframe>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @elseif($customField->type ==11)
                                                        {{--Youtube Video Link--}}

                                                        <?php
                                                        $CF_Youtube_id = Helper::Get_youtube_video_id($cf_saved_val);
                                                        ?>
                                                        @if($CF_Youtube_id !="")
                                                            <div class="row field-row">
                                                                <div class="col-lg-3">
                                                                    {!!  $cf_title !!} :
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    {{-- Youtube Video --}}
                                                                    <iframe allowfullscreen
                                                                            style="height: 450px;width: 100%"
                                                                            src="https://www.youtube.com/embed/{{ $CF_Youtube_id }}">
                                                                    </iframe>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @elseif($customField->type ==10)
                                                        {{--Video File--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <video width="100%" height="450" controls>
                                                                    <source src="{{ URL::to('uploads/topics/'.$cf_saved_val) }}"
                                                                            type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==9)
                                                        {{--Attach File--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <a href="{{ URL::to('uploads/topics/'.$cf_saved_val) }}"
                                                                target="_blank">
                                                                    <span class="badge">
                                                                        {!! Helper::GetIcon(URL::to('uploads/topics/'),$cf_saved_val) !!}
                                                                        {!! $cf_saved_val !!}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==8)
                                                        {{--Photo File--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <img src="{{ URL::to('uploads/topics/'.$cf_saved_val) }}"
                                                                    alt="{{ $cf_title }} - {{ $title }}"
                                                                    title="{{ $cf_title }} - {{ $title }}">
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==7)
                                                        {{--Multi Check--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <?php
                                                                $cf_details_var = "details_" . trans('backLang.boxCode');
                                                                $cf_details_var2 = "details_en" . trans('backLang.boxCodeOther');
                                                                if ($customField->$cf_details_var != "") {
                                                                    $cf_details = $customField->$cf_details_var;
                                                                } else {
                                                                    $cf_details = $customField->$cf_details_var2;
                                                                }
                                                                $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                                                                $line_num = 1;
                                                                ?>
                                                                @foreach ($cf_details_lines as $cf_details_line)
                                                                    @if (in_array($line_num,$cf_saved_val_array))
                                                                        <span class="badge">
                                                                {!! $cf_details_line !!}
                                                            </span>
                                                                    @endif
                                                                    <?php
                                                                    $line_num++;
                                                                    ?>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==6)
                                                        {{--Select--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <?php
                                                                $cf_details_var = "details_" . trans('backLang.boxCode');
                                                                $cf_details_var2 = "details_en" . trans('backLang.boxCodeOther');
                                                                if ($customField->$cf_details_var != "") {
                                                                    $cf_details = $customField->$cf_details_var;
                                                                } else {
                                                                    $cf_details = $customField->$cf_details_var2;
                                                                }
                                                                $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                                                                $line_num = 1;
                                                                ?>
                                                                @foreach ($cf_details_lines as $cf_details_line)
                                                                    @if ($line_num == $cf_saved_val)
                                                                        {!! $cf_details_line !!}
                                                                    @endif
                                                                    <?php
                                                                    $line_num++;
                                                                    ?>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==5)
                                                        {{--Date & Time--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                {!! date('Y-m-d H:i:s', strtotime($cf_saved_val)) !!}
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==4)
                                                        {{--Date--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                {!! date('Y-m-d', strtotime($cf_saved_val)) !!}
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==3)
                                                        {{--Email Address--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                {!! $cf_saved_val !!}
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==2)
                                                        {{--Number--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                {!! $cf_saved_val !!}
                                                            </div>
                                                        </div>
                                                    @elseif($customField->type ==1)
                                                        {{--Text Area--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                {!! nl2br($cf_saved_val) !!}
                                                            </div>
                                                        </div>
                                                    @else
                                                        {{--Text Box--}}
                                                        <div class="row field-row">
                                                            <div class="col-lg-3">
                                                                {!!  $cf_title !!} :
                                                            </div>
                                                            <div class="col-lg-9">
                                                                {!! $cf_saved_val !!}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endif
                            {{--End of -- Additional Feilds--}}

                            {!! $Topic->$details !!}

                            @if($Topic->attach_file !="")
                                <?php
                                $file_ext = strrchr($Topic->attach_file, ".");
                                $file_ext = strtolower($file_ext);
                                ?>
                                <div class="bottom-article">
                                    @if($file_ext ==".jpg"|| $file_ext ==".jpeg"|| $file_ext ==".png"|| $file_ext ==".gif")
                                        <div class="text-center">
                                            <img src="{{ URL::to('uploads/topics/'.$Topic->attach_file) }}"
                                                alt="{{ $title }}"/>
                                        </div>
                                    @else

                                        @if (str_contains($Topic->attach_file,'http') )
                                       
                                            <a href="{{ URL::to($Topic->attach_file) }}">
                                                <strong>
                                                    
                                                    {!! Helper::GetIcon(URL::to('uploads/topics/'),$Topic->attach_file) !!}
                                                    &nbsp;{{ trans('frontLang.downloadAttach') }}
                                                </strong>
                                            </a>

                                            @else

                                            <a href="{{ URL::to('uploads/topics/'.$Topic->attach_file) }}">
                                                <strong>
                                                    {!! Helper::GetIcon(URL::to('uploads/topics/'),$Topic->attach_file) !!}
                                                    &nbsp;{{ trans('frontLang.downloadAttach') }}</strong>
                                            </a>
                                            @endif
                                        
                                    @endif
                                </div>
                            @endif

                            {{-- Show Additional attach files --}}
                            @if(count($Topic->attachFiles)>0)
                                <div style="padding: 10px;border: 1px dashed #ccc;margin-bottom: 10px;">
                                    @foreach($Topic->attachFiles as $attachFile)
                                        <?php
                                        if ($attachFile->$title_var != "") {
                                            $file_title = $attachFile->$title_var;
                                        } else {
                                            $file_title = $attachFile->$title_var2;
                                        }
                                        ?>
                                        <div style="margin-bottom: 5px;">

                                            <a href="{{ URL::to('uploads/topics/'.$attachFile->file) }}" target="_blank">
                                                <strong>
                                                    {!! Helper::GetIcon(URL::to('uploads/topics/'),$attachFile->file) !!}
                                                    &nbsp;{{ $file_title }}</strong>
                                            </a>

                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="clearfix"></div>

                            <div class="bottom-article">
                                <ul class="meta-post">
                                    @if($WebmasterSection->date_status)
                                        <li><i class="fa fa-calendar"></i> <a>{{ Carbon\Carbon::parse($Topic->date)->format('d-m-Y')   }}</a></li>
                                    @endif
                                     <li class="hidden-xs">
                                        <i class="fa fa-user"></i> 
                                        <a href="javascript:void(0);"> {!! $Topic->user->name !!}</a>
                                    </li> 
                                    <li>
                                        <i class="fa fa-eye"></i>
                                        <a href="javascript:void(0);"> {!! $Topic->visits !!}</a>
                                    </li>
                                    @if($WebmasterSection->comments_status)
                                        <li>
                                            <i class="fa fa-comments"></i><a
                                                    href="#comments">: {{count($Topic->approvedComments)}} </a>
                                        </li>
                                    @endif
                                </ul>

                                <div class="pull-right">
                                    {{--  <span class="hidden-xs">{{ trans('frontLang.share') }} :</span>  --}}
                                    <ul class="social-network share">
                                        @if(Helper::GeneralWebmasterSettings("settings_status"))
                                            @if(@Auth::user()->permissionsGroup->settings_status)
                                            <li>
                                                <a href="{{ route("topicsEdit",["webmasterId"=>$WebmasterSection->id,"id"=>$Topic->id]) }}" class="google"
                                                data-placement="top"
                                                title="Chỉnh sửa văn bản" target="_blank"><i class="fa fa-edit"></i></a>
                                            </li>
                                            @endif
                                        @endif

                                        {{--  <li>
                                            <a href="javascript:void(0);" class="twitter"
                                            onClick="pauseTTS()"
                                            data-placement="top"
                                            title="Dừng đọc"><i class="fa fa-pause-circle-o"></i></a>
                                        </li>  --}}
                                        <li>
                                            <a href="javascript:void(0);" class="twitter"
                                            onClick="playTTS('{{strip_tags($Topic->title_vi. " ".$Topic->$details) }}','130')"
                                            data-placement="top"
                                            title="Đọc tin"><i class="fa fa-play-circle-o"></i></a>
                                        </li>

                                        <li>
                                            <a href="{{ Helper::SocialShare("facebook", $PageTitle)}}" class="facebook"
                                            data-placement="top"
                                            title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ Helper::SocialShare("google", $PageTitle)}}" class="google"
                                            data-placement="top"
                                            title="Google+"
                                            target="_blank"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>

                            @if(count($Topic->maps) >0)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <br>
                                        <h4>{{ trans('frontLang.locationMap') }}</h4>
                                        <div id="google-map"></div>
                                    </div>
                                </div>
                            @endif

                            @if($WebmasterSection->comments_status)
                                <div id="comments">
                                    @if(count($Topic->approvedComments)>0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <br>
                                                <h4><i class="fa fa-comments"></i> {{ trans('frontLang.comments') }}</h4>
                                                <hr>
                                            </div>
                                        </div>
                                        @foreach($Topic->approvedComments as $comment)
                                            <?php
                                                $dtformated = date('d M Y h:i A', strtotime($comment->date));

                                                $dtformated = \Carbon\Carbon::parse($comment->date)->format('d-m-Y h:i:s');

                                            ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    {{--  <img src="{{ URL::to('uploads/contacts/profile.jpg') }}" class="profile"
                                                        alt="{{$comment->name}}">  --}}
                                                    <div class="pullquote-left">
                                                            <i class="fa fa-commenting-o"></i>&nbsp;<strong>{{$comment->name}}</strong>
                                                        <span>
                                                            <small>
                                                                <small>({{ $dtformated }})</small>
                                                            </small>
                                                        </span>
                                                        <div>
                                                            <em>{!! nl2br(strip_tags($comment->comment)) !!}</em>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        @endforeach
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <br>
                                            <h4><i class="fa fa-plus"></i> {{ trans('frontLang.newComment') }}</h4>
                                            <div class="bottom-article newcomment">
                                                <div id="sendmessage"><i class="fa fa-check-circle"></i>
                                                    &nbsp;{{ trans('frontLang.youCommentSent') }} &nbsp; <a
                                                            href="{{url()->current()}}"><i
                                                                class="fa fa-refresh"></i> {{ trans('frontLang.refresh') }}
                                                    </a>
                                                </div>
                                                <div id="errormessage">{{ trans('frontLang.youMessageNotSent') }}</div>

                                                {{Form::open(['route'=>['Home'],'method'=>'POST','class'=>'commentForm'])}}
                                                <div class="form-group">
                                                    {!! Form::text('comment_name',"", array('placeholder' => trans('frontLang.yourName'),'class' => 'form-control','id'=>'comment_name', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}
                                                    <div class="alert alert-warning validation"></div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::email('comment_email',"", array('placeholder' => trans('frontLang.yourEmail'),'class' => 'form-control','id'=>'comment_email', 'data-msg'=> trans('frontLang.enterYourEmail'),'data-rule'=>'email')) !!}
                                                    <div class="validation"></div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::textarea('comment_message','', array('placeholder' => trans('frontLang.comment'),'class' => 'form-control','id'=>'comment_message','rows'=>'5', 'data-msg'=> trans('frontLang.enterYourComment'),'data-rule'=>'required')) !!}
                                                    <div class="validation"></div>
                                                </div>
                                                
                                                <div>
                                                    <input type="hidden" name="topic_id" value="{{$Topic->id}}">
                                                    <button type="submit"
                                                            class="btn btn-theme" style="color: white">{{ trans('frontLang.sendComment') }}</button>
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($WebmasterSection->order_status)
                                <div id="order">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <br>
                                            <h4><i class="fa fa-cart-plus"></i> {{ trans('frontLang.orderForm') }}</h4>
                                            <div class="bottom-article newcomment">
                                                <div id="ordersendmessage"><i class="fa fa-check-circle"></i>
                                                    &nbsp;{{ trans('frontLang.youOrderSent') }}
                                                </div>
                                                <div id="ordererrormessage">{{ trans('frontLang.youMessageNotSent') }}</div>

                                                {{Form::open(['route'=>['Home'],'method'=>'POST','class'=>'orderForm'])}}
                                                <div class="form-group">
                                                    {!! Form::text('order_name',"", array('placeholder' => trans('frontLang.yourName'),'class' => 'form-control','id'=>'order_name', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}
                                                    <div class="alert alert-warning validation"></div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::text('order_phone',"", array('placeholder' => trans('frontLang.phone'),'class' => 'form-control','id'=>'order_phone', 'data-msg'=> trans('frontLang.enterYourPhone'),'data-rule'=>'minlen:4')) !!}
                                                    <div class="validation"></div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::email('order_email',"", array('placeholder' => trans('frontLang.yourEmail'),'class' => 'form-control','id'=>'order_email', 'data-msg'=> trans('frontLang.enterYourEmail'),'data-rule'=>'email')) !!}
                                                    <div class="validation"></div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::number('order_qty',"", array('placeholder' => trans('frontLang.quantity'),'class' => 'form-control','id'=>'order_qty', 'data-msg'=> trans('frontLang.yourQuantity'),'data-rule'=>'minlen:1','min'=>'1')) !!}
                                                    <div class="validation"></div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::textarea('order_message','', array('placeholder' => trans('frontLang.notes'),'class' => 'form-control','id'=>'order_message','rows'=>'5')) !!}
                                                    <div class="validation"></div>
                                                </div>

                                                {{--  @if(env('NOCAPTCHA_STATUS', false))
                                                    <div class="form-group">
                                                        {!! app('captcha')->display($attributes = [], $lang = trans('backLang.code')) !!}
                                                    </div>
                                                @endif
                                                <br>
                                                
                                                <div class="g-recaptcha" data-sitekey="6Le9blIUAAAAAHEkqcWePizRmL7hdYOlg0vqBByp"></div>

                                                <br>  --}}

                                                <div>
                                                    <input type="hidden" name="topic_id" value="{{$Topic->id}}">
                                                    <button type="submit"
                                                            class="btn btn-theme">{{ trans('frontLang.sendOrder') }}</button>
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($WebmasterSection->related_status)
                                @if(count($Topic->relatedTopics))
                                    <div id="Related">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <br>
                                                <h4><i class="fa fa-bookmark"></i> {{ trans('backLang.relatedTopics') }}
                                                </h4>
                                                <div class="bottom-article newcomment">
                                                    <?php
                                                    $title_var = "title_" . trans('backLang.boxCode');
                                                    $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                                    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                                                    $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
                                                    ?>
                                                    @foreach($Topic->relatedTopics as $relatedTopic)
                                                        <?php

                                                        if ($relatedTopic->topic->$title_var != "") {
                                                            $relatedTopic_title = $relatedTopic->topic->$title_var;
                                                        } else {
                                                            $relatedTopic_title = $relatedTopic->topic->$title_var2;
                                                        }

                                                        if ($relatedTopic->topic->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {

                                                                $topic_link_url = url(trans('backLang.code') . "/" . $relatedTopic->topic->$slug_var);
                                                            } else {
                                                                $topic_link_url = url($relatedTopic->topic->$slug_var);
                                                            }
                                                        } else {
                                                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $relatedTopic->topic->webmasterSection->name, "id" => $relatedTopic->topic->id]);
                                                            } else {
                                                                $topic_link_url = route('FrontendTopic', ["section" => $relatedTopic->topic->webmasterSection->name, "id" => $relatedTopic->topic->id]);
                                                            }
                                                        }
                                                        ?>
                                                        <div style="margin-bottom: 5px;">
                                                            <a href="{{ $topic_link_url }}"><i
                                                                        class="fa fa-bookmark-o"></i>&nbsp; {!! $relatedTopic_title !!}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            <div class="lienquan-header">

                                <a href="">Tin mới đăng</a>
        
                            </div>
        
                            <div id="tin-noi-bat" style="margin-top: 10px">
                                <ul>
    
                                    @foreach($LatestNews as $Topic)

                                        <?php
                                            if ($Topic->$title_var != "") {
                                                $title = $Topic->$title_var;
                                            } else {
                                                $title = $Topic->$title_var2;
                                            }
                                            if ($Topic->$details_var != "") {
                                                $details = $details_var;
                                            } else {
                                                $details = $details_var2;
                                            }
                                            $section = "";
                                            try {
                                                if ($Topic->section->$title_var != "") {
                                                    $section = $Topic->section->$title_var;
                                                } else {
                                                    $section = $Topic->section->$title_var2;
                                                }
                                            } catch (Exception $e) {
                                                $section = "";
                                            }

                                            if ($Topic->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                    $topic_link_url = url(trans('backLang.code') . "/" . $Topic->$slug_var);
                                                } else {
                                                    $topic_link_url = url($Topic->$slug_var);
                                                }
                                            } else {
                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                    $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $Topic->webmasterSection->name, "id" => $Topic->id]);
                                                } else {
                                                    $topic_link_url = route('FrontendTopic', ["section" => $Topic->webmasterSection->name, "id" => $Topic->id]);
                                                }
                                            }
                                        ?>
    
                                        <li>
                                            <div class="hot-news-block">
                                                <a href="{{ $topic_link_url }}">
        
                                                    <div class="news-block" style="line-height: 25px">
                                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;{{ $Topic->$title_var }} <small><em>({{ \Carbon\Carbon::parse($Topic->date)->format('d-m-Y') }})</em></small>
                                                    </div>
        
                                                </a>
                                            </div>
                                        </li>
    
                                    @endforeach
    
                                </ul>
                            </div>
                            
                        </article>
                           
                    </div>
            </div>
    </section>

@stop

@section('side-menu')

    @include('frontEnd.topic.menu-side') 
   
@stop

@section('footerInclude')
    <script type="text/javascript"> 
        $(document).ready(function($){
        
            $('p img').each(function(){ 
                $(this).css({"width":"90%","align":"middle"});
            });

            $('.responsive-video').css('padding-bottom','');
        
        });
    </script>
    @if(count($Topic->maps) >0)
        @foreach($Topic->maps->slice(0,1) as $map)
            <?php
            $MapCenter = $map->longitude . "," . $map->latitude;
            ?>
        @endforeach
        <?php
        $map_title_var = "title_" . trans('backLang.boxCode');
        $map_details_var = "details_" . trans('backLang.boxCode');
        ?>
        <script type="text/javascript"
                src="http://maps.google.com/maps/api/js?key=AIzaSyAgzruFTTvea0LEmw_jAqknqskKDuJK7dM"></script>

        <script type="text/javascript">
            // var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/';
            var iconURLPrefix = "{{ URL::to('backEnd/assets/images/')."/" }}";
            var icons = [
                iconURLPrefix + 'marker_0.png',
                iconURLPrefix + 'marker_1.png',
                iconURLPrefix + 'marker_2.png',
                iconURLPrefix + 'marker_3.png',
                iconURLPrefix + 'marker_4.png',
                iconURLPrefix + 'marker_5.png',
                iconURLPrefix + 'marker_6.png'
            ]

            var locations = [
                    @foreach($Topic->maps as $map)
                ['<?php echo "<strong>" . $map->$map_title_var . "</strong>" . "<br>" . $map->$map_details_var; ?>', <?php echo $map->longitude; ?>, <?php echo $map->latitude; ?>, <?php echo $map->id; ?>, <?php echo $map->icon; ?>],
                @endforeach
            ];

            var map = new google.maps.Map(document.getElementById('google-map'), {
                zoom: 6,
                draggable: false,
                scrollwheel: false,
                center: new google.maps.LatLng(<?php echo $MapCenter; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    icon: icons[locations[i][4]],
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        </script>
    @endif
    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            "use strict";

            @if($WebmasterSection->comments_status)
            //Comment
            $('form.commentForm').submit(function () {

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
                f.children('textarea').each(function () { // run all inputs

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
                        }
                        i.next('.validation').html('<i class=\"fa fa-info\"></i> &nbsp;' + ( ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show();
                        !ierror ? i.next('.validation').hide() : i.next('.validation').show();
                    }
                });
                if (ferror) return false;
                else var str = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo route("commentSubmit"); ?>",
                    data: str,
                    success: function (msg) {
                        if (msg == 'OK') {
                            $("#sendmessage").addClass("show");
                            $("#errormessage").removeClass("show");
                            $("#comment_name").val('');
                            $("#comment_email").val('');
                            $("#comment_message").val('');
                        }
                        else {
                            $("#sendmessage").removeClass("show");
                            $("#errormessage").addClass("show");
                            $('#errormessage').html(msg);
                        }

                    }
                });
                return false;
            });
            @endif

            @if($WebmasterSection->order_status)

            //Order
            $('form.orderForm').submit(function () {

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
                var xhr = $.ajax({
                    type: "POST",
                    url: "<?php echo route("orderSubmit"); ?>",
                    data: str,
                    success: function (msg) {
                        if (msg == 'OK') {
                            $("#ordersendmessage").addClass("show");
                            $("#ordererrormessage").removeClass("show");
                            $("#order_name").val('');
                            $("#order_phone").val('');
                            $("#order_email").val('');
                            $("#order_qty").val('');
                            $("#order_message").val('');
                        }
                        else {
                            $("#ordersendmessage").removeClass("show");
                            $("#ordererrormessage").addClass("show");
                            $('#ordererrormessage').html(msg);
                        }

                    }
                });
                //console.log(xhr);
                return false;
            });

            @endif
        });
    </script>

@endsection