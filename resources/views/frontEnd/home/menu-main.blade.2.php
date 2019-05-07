<script type="text/javascript">
    jssor_3_slider_init = function() {

        var jssor_3_options = {
            $AutoPlay: 1,
            $AutoPlaySteps: 3,
            $SlideDuration: 1000,
            $SlideWidth: 250,
            $SlideSpacing: 3,
            $Cols: 5,
            $Align: 390,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 3
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_3_slider = new $JssorSlider$("jssor_3", jssor_3_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_3_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_3_slider.$ScaleWidth(expectedWidth);
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

    jssor_4_slider_init = function() {

        var jssor_4_options = {
            $AutoPlay: 1,
            $AutoPlaySteps: 3,
            $SlideDuration: 1000,
            $SlideWidth: 250,
            $SlideSpacing: 3,
            $Cols: 5,
            $Align: 390,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 3
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_4_slider = new $JssorSlider$("jssor_4", jssor_4_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_4_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_4_slider.$ScaleWidth(expectedWidth);
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
    /* jssor slider loading skin spin css */
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .jssorb057 .i {position:absolute;cursor:pointer;}
    .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
    .jssorb057 .i:hover .b {stroke-opacity:.7;}
    .jssorb057 .iav .b {stroke-opacity: 1;}
    .jssorb057 .i.idn {opacity:.3;}

    .jssora073 {display:block;position:absolute;cursor:pointer;}
    .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
    .jssora073:hover {opacity:.8;}
    .jssora073.jssora073dn {opacity:.4;}
    .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
</style>

@if (!empty($MainMenuLinks))
    @foreach($MainMenuLinks as $MainMenuLink)

        <?php
            if ($MainMenuLink->webmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                    $mmnnuu_link = url(trans('backLang.code')."/" .$MainMenuLink->webmasterSection->$slug_var);
                }else{
                    $mmnnuu_link = url($MainMenuLink->webmasterSection->$slug_var);
                }
            }else{
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                    $mmnnuu_link =url(trans('backLang.code')."/" .$MainMenuLink->webmasterSection->name);
                }else{
                    $mmnnuu_link =url($MainMenuLink->webmasterSection->name);
                }
            }
        ?>

        <div class="block3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <img src="/images/background/lotus.ico" width="30px" style="padding: 3px">
                    <h4 class="box-title" title="">{{ $MainMenuLink->$link_title_var }}</h4>

                    <div class="box-tools pull-right">
                        <a class="btn btn-box-tool" href="{{ $mmnnuu_link }}"><i class="fa fa-folder-open"></i></a>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->

                @if ($MainMenuLink->webmasterSection->name == 'photos')
                    <div class="box-body">

                        <div id="jssor_3" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:150px;overflow:hidden;visibility:hidden;">
                            <!-- Loading Screen -->
                            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="frontEnd/img/spin.svg" />
                            </div>
                            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:150px;overflow:hidden;">

                                    @foreach($MainMenuLink->webmasterSection->topics->where('status',1)->sortbyDesc('date') as $tin)
                                        <?php

                                            if ($tin->$title_var != "") {
                                                $title = $tin->$title_var;
                                            } else {
                                                $title = $tin->$title_var2;
                                            }
                                            if ($tin->$details_var != "") {
                                                $details = $details_var;
                                            } else {
                                                $details = $details_var2;
                                            }
                                            $section = "";
                                            try {
                                                if ($tin->section->$title_var != "") {
                                                    $section = $tin->section->$title_var;
                                                } else {
                                                    $section = $tin->section->$title_var2;
                                                }
                                            } catch (Exception $e) {
                                                $section = "";
                                            }

                                            if ($tin->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                    $topic_link_url = url(trans('backLang.code') . "/" . $tin->$slug_var);
                                                } else {
                                                    $topic_link_url = url($tin->$slug_var);
                                                }
                                            } else {
                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                    $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                } else {
                                                    $topic_link_url = route('FrontendTopic', ["section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                }
                                            }
                                        ?>
                                        
                                        <div>
                                            <a href="{{ $topic_link_url }}">
                                                <img data-u="image" src="/uploads/topics/{{ $tin->photo_file }}" title="{{ $tin->$link_title_var }}" />
                                            </a>
                                            <div style="background: url(./images/transparent.png) repeat-x; position: absolute; bottom: 0px; font-size: 0.9em; color: #ffffff; width:100%; text-align: center;" >
                                                <p style="padding: 5px 0">{{ $tin->$link_title_var }}</p>
                                                    
                                            </div>
                                            {{--  <p style="background: url(./images/transparent.png) repeat-x; position: absolute; bottom: 10px; left:5px; right:5px; font-size: 1.1em; color: #ffffff; text-align: center;">
                                                {{ $tin->$link_title_var }}
                                            </p>  --}}
                                        </div>
                                    @endforeach

                            </div>
                            <!-- Arrow Navigator -->
                            <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
                                </svg>
                            </div>
                            <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
                                </svg>
                            </div>
                        </div>
                        <script type="text/javascript">jssor_3_slider_init();</script>
                   
                    </div>
                @elseif ($MainMenuLink->webmasterSection->name == 'videos')
                    <div class="box-body">

                        <div id="jssor_4" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:150px;overflow:hidden;visibility:hidden;">
                            <!-- Loading Screen -->
                            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="frontEnd/img/spin.svg" />
                            </div>
                            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:150px;overflow:hidden;">

                                    @foreach($MainMenuLink->webmasterSection->topics->where('status',1)->sortbyDesc('date') as $tin)
                                        <?php

                                            if ($tin->$title_var != "") {
                                                $title = $tin->$title_var;
                                            } else {
                                                $title = $tin->$title_var2;
                                            }
                                            if ($tin->$details_var != "") {
                                                $details = $details_var;
                                            } else {
                                                $details = $details_var2;
                                            }
                                            $section = "";
                                            try {
                                                if ($tin->section->$title_var != "") {
                                                    $section = $tin->section->$title_var;
                                                } else {
                                                    $section = $tin->section->$title_var2;
                                                }
                                            } catch (Exception $e) {
                                                $section = "";
                                            }

                                            if ($tin->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                    $topic_link_url = url(trans('backLang.code') . "/" . $tin->$slug_var);
                                                } else {
                                                    $topic_link_url = url($tin->$slug_var);
                                                }
                                            } else {
                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                    $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                } else {
                                                    $topic_link_url = route('FrontendTopic', ["section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                }
                                            }
                                        ?>
                                        
                                        <div>
                                            <a href="{{ $topic_link_url }}">
                                                @if (strlen($tin->photo_file) > 5 )
                                                    <img data-u="image" src="/uploads/topics/{{ $tin->photo_file }}" title="{{ $tin->$link_title_var }}" />
                                                @else
                                                    <img data-u="image" src="{{ URL::to('uploads/topics/no_image.jpg') }}" title="{{ $tin->$link_title_var }}" />
                                                @endif
                                                
                                            </a>
                                            <div style="background: url(./images/transparent.png) repeat-x; position: absolute; bottom: 0px; font-size: 0.9em; color: #ffffff; width:100%; text-align: center;" >
                                                <p style="padding: 5px">{{ $tin->$link_title_var }}</p>
                                                    
                                            </div>
                                            {{--  <p style="background: url(./images/transparent.png) repeat-x; position: absolute; bottom: 10px; left:5px; right:5px; font-size: 1.1em; color: #ffffff; text-align: center;">
                                                {{ $tin->$link_title_var }}
                                            </p>  --}}
                                        </div>
                                    @endforeach

                            </div>
                            <!-- Arrow Navigator -->
                            <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
                                </svg>
                            </div>
                            <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
                                </svg>
                            </div>
                        </div>
                        <script type="text/javascript">jssor_4_slider_init();</script>
                   
                    </div>
                    
                @else 
                    <div class="box-body">
                        <div class="card">
                            @if(count($MainMenuLink->webmasterSection->sections) >0)
                                <ul class="nav nav-tabs" role="tablist" style="border-bottom: none">

                                    @foreach($MainMenuLink->webmasterSection->sections as $key=>$MnuCategory)
                                        @if($MnuCategory->father_id ==0)

                                            <li

                                                @if ($key == 0)
                                                    class="active"
                                                @endif
                                                    >
                                                <?php
                                                    if ($MnuCategory->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                            $Category_link_url = url(trans('backLang.code')."/" .$MnuCategory->$slug_var);
                                                        }else{
                                                            $Category_link_url = url($MnuCategory->$slug_var);
                                                        }
                                                    } else {
                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                            $Category_link_url = route('FrontendTopicsByCatWithLang', ["lang"=>trans('backLang.code'),"section" => $MainMenuLink->webmasterSection->name, "cat" => $MnuCategory->id]);
                                                        }else{
                                                            $Category_link_url = route('FrontendTopicsByCat', ["section" => $MainMenuLink->webmasterSection->name, "cat" => $MnuCategory->id]);
                                                        }
                                                    }
                                                ?>

                                                <a href="#{{ $MnuCategory->$slug_var }}" data-toggle="tab">
                                                    @if($MnuCategory->icon !=="")
                                                        <i class="fa {{$MnuCategory->icon}}"></i> &nbsp;
                                                    @endif
                                                    <span class="hidden-xs">
                                                        {{$MnuCategory->$category_title_var}}
                                                    </span>
                                                    
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            @endif
                            <!-- Tab panes -->

                            <div class="tab-content">
                                @if(count($MainMenuLink->webmasterSection->sections) >0)
                                    @foreach($MainMenuLink->webmasterSection->sections as $key=>$MnuCategory)
                                        @if($MnuCategory->father_id ==0)
                                            <div class="to-chuc tab-pane
                                            @if ($key == 0) active @endif
                                                    " id="{{ $MnuCategory->$slug_var }}">

                                                @if (in_array($MainMenuLink->webmasterSection->id,[11,12]))

                                                    <div class="col-md-12" style="float:left">

                                                        @php
                                                            
                                                            $topicIds = $MnuCategory->selectedCategories->groupby('topic_id')->sortbyDesc('topic_id')->take(5);

                                                            $i = 0;

                                                            $tins= array();
                                                            
                                                        @endphp

                                                        @if(!empty($topicIds))

                                                            @foreach($topicIds as $topicId)
                                                                
                                                                <?php

                                                                    $tins[] = $topicId->topic;

                                                                ?>

                                                            @endforeach

                                                            @foreach($tins as $topicId)
                                                                
                                                                <?php

                                                                    $tin = $topicId;

                                                                    $section = "";
                                                                    try {
                                                                        if ($tin->section->$title_var != "") {
                                                                            $section = $tin->section->$title_var;
                                                                        } else {
                                                                            $section = $tin->section->$title_var2;
                                                                        }
                                                                    } catch (Exception $e) {
                                                                        $section = "";
                                                                    }
                                                                    
                                                                    if ($tin->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                            $topic_link_url = url(trans('backLang.code') . "/" . $tin->$slug_var);
                                                                        } else {
                                                                            $topic_link_url = url($tin->$slug_var);
                                                                        }
                                                                    } else {
                                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                            $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                                        } else {
                                                                            $topic_link_url = route('FrontendTopic', ["section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                                        }
                                                                    }
                                                                ?>

                                                                @if (($tin->status == 1) && ($i == 0))

                                                                    @php $i++; @endphp

                                                                    <div class="col-md-7 col-sm-7 col-xs-12" style="float: left;">
                                                                        <div class="row">
                                                                            <div class="news-main" style="margin-left: -15px">
                
                                                                                <a class="tin_title_text" href="{{ $topic_link_url }}">
                                                                                    <div class="tin_title_text">
                                                                                        {{ $tin->$link_title_var }}
                                                                                        {{--  <small><em style="font-weight: normal">({{ \Carbon\Carbon::parse($tin->created_at)->format('d-m-Y H:i:s') }})</em></small>  --}}
                                                                                    </div>
                                                                                    @if (strlen($tin->photo_file) > 4)
                                                                                        <img style="display: inline-block; width: 160px; height:auto;" src="/uploads/topics/{{ $tin->photo_file }}" alt="" title="">
                                                                                    @endif
        
                                                                                </a>
        
                                                                                <div class="thumb">
                
                                                                                </div>
                
                                                                                <div class="tin_title_abstract" style="display:;">
                                                                                    <p>{{ str_limit(strip_tags($tin->$details_var), $limit = 350, $end = '...') }}</p>
                                                                                </div>
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
                                                                    

                                                                @elseif ($tin->status == 1)

                                                                    <div class="col-md-5 col-sm-5 col-xs-12" style="float: right;"> 
                                                                        <div class="row">
        
                                                                            <div class="news-five">
                                                                                <ul class="news-block">
                                                                                    
                                                                                    <li>
                                                                                        <a href="{{ $topic_link_url }}" class="news-title">
                                                                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                                                            {{ $tin->$link_title_var }}
                                                                                        </a>
    
                                                                                    </li>
        
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                            @endforeach

                                                        @endif

                                                    </div>

                                                @else

                                                    @php
                                                        
                                                        $topicIds = $MnuCategory->selectedCategories->sortbyDesc('topic_date')->take(5);
                                                        $i = 0;
                                                        $tins= array();

                                                    @endphp

                                                    @if(!empty($topicIds))

                                                        @if ($MnuCategory->id != 43)

                                                            <table class="table table-striped table-bordered table-responsive table-sm" style="margin-bottom: 5px">
                                                                <thead>
                                                                <tr>
                                                                    <th>TT</th>
                                                                    @if (in_array($MnuCategory->id,['25']))
                                                                        <th>Kí hiệu </th>
                                                                    @endif
                                                                    
                                                                    <th>Nội dung </th>
                                                                    <th class="col-md-2" style="text-align: center">Ngày ban hành</th>
                                                                    {{--  <th style="text-align:center">
                                                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                                    </th>  --}}
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach($topicIds as $topicId)
                                                                
                                                                        <?php
        
                                                                            $tins[] = $topicId->topic;
        
                                                                        ?>
        
                                                                    @endforeach
                                                                    

                                                                    @foreach($tins as $tin)
                                                                       
    
                                                                            <?php
                                                                                
                                                                                $section = "";
                                                                                try {
                                                                                    if ($tin->section->$title_var != "") {
                                                                                        $section = $tin->section->$title_var;
                                                                                    } else {
                                                                                        $section = $tin->section->$title_var2;
                                                                                    }
                                                                                } catch (Exception $e) {
                                                                                    $section = "";
                                                                                }
                                                                                
                                                                                if ($tin->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                                                    if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                                        $topic_link_url = url(trans('backLang.code') . "/" . $tin->$slug_var);
                                                                                    } else {
                                                                                        $topic_link_url = url($tin->$slug_var);
                                                                                    }
                                                                                } else {
                                                                                    if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                                        $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                                                    } else {
                                                                                        $topic_link_url = route('FrontendTopic', ["section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                                                    }
                                                                                }
                                                                            ?>

                                                                            @if (($tin->status == 1) && ($i < 3))
                                                                                @php $i++; @endphp
                                                                                <tr>
                                                                                    <td>
                                                                                        {{ $loop->iteration }}
                                                                                    </td>
                                                                                    @if (in_array($MnuCategory->id,['25']))
                                                                                        <td>
                                                                                            <a href="{{ $topic_link_url }}">
                                                                                                {{ $tin->$link_title_var }}
                                                                                            </a>
                                                                                        </td>
                                                                                    @endif
                                                                                    <td>
                                                                                        <a href="{{ $topic_link_url }}">
                                                                                            @if (in_array($MnuCategory->id,['24','25']))
                                                                                                {{ str_limit(strip_tags($tin->$details_var), $limit = 80, $end = '...') }}
                                                                                            @else
                                                                                                {{ $tin->$link_title_var }}
                                                                                            @endif
                                                                                        </a>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ \Carbon\Carbon::parse($tin->date)->format('d-m-Y') }}
                                                                                    </td>
                                                                                    {{--  <td style="text-align:center">
                                                                                        @if (file_exists($tin->attach_file))
                                                                                            <a href="{{ $tin->attach_file }}" target="_blank">
                                                                                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                                                            </a>
                                                                                        @endif
                                                                                    </td>  --}}
                                                                                </tr>
                                                                            @endif
                                                                        
                                                                    @endforeach
                                                                </tbody>
                                                            </table>

                                                        @else
                                                            <div class="col-md-12" style="float:left">

                                                                @if(!empty($topicIds))

                                                                    @foreach($topicIds as $topicId)
                                                                        
                                                                        <?php

                                                                            $tin = $topicId->topic;

                                                                            $section = "";
                                                                            try {
                                                                                if ($tin->section->$title_var != "") {
                                                                                    $section = $tin->section->$title_var;
                                                                                } else {
                                                                                    $section = $tin->section->$title_var2;
                                                                                }
                                                                            } catch (Exception $e) {
                                                                                $section = "";
                                                                            }
                                                                            
                                                                            if ($tin->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                                    $topic_link_url = url(trans('backLang.code') . "/" . $tin->$slug_var);
                                                                                } else {
                                                                                    $topic_link_url = url($tin->$slug_var);
                                                                                }
                                                                            } else {
                                                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                                    $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                                                } else {
                                                                                    $topic_link_url = route('FrontendTopic', ["section" => $tin->webmasterSection->name, "id" => $tin->id]);
                                                                                }
                                                                            }
                                                                        ?>

                                                                        @if (($tin->status == 1) && ($i == 0))
                                                                            
                                                                            @php $i++; @endphp

                                                                            <div class="col-md-7 col-sm-7 col-xs-12" style="float: left;">
                                                                                <div class="row">
                                                                                    <div class="news-main" style="margin-left: -15px">
                        
                                                                                        <a class="tin_title_text" href="{{ $topic_link_url }}">
                                                                                            <div class="tin_title_text">
                                                                                                {{ $tin->$link_title_var }}
                                                                                                {{--  <small><em style="font-weight: normal">({{ \Carbon\Carbon::parse($tin->created_at)->format('d-m-Y H:i:s') }})</em></small>  --}}
                                                                                            </div>
                                                                                            @if (strlen($tin->photo_file) > 4)
                                                                                                <img style="display: inline-block; width: 160px; height:auto;" src="/uploads/topics/{{ $tin->photo_file }}" alt="" title="">
                                                                                            @endif
                
                                                                                        </a>
                
                                                                                        <div class="thumb">
                        
                                                                                        </div>
                        
                                                                                        <div class="tin_title_abstract" style="display:;">
                                                                                            <p>{{ str_limit(strip_tags($tin->$details_var), $limit = 350, $end = '...') }}</p>
                                                                                        </div>
                                                                                    </div>
                
                                                                                </div>
                                                                            </div>

                                                                        @elseif ($tin->status == 1)

                                                                            <div class="col-md-5 col-sm-5 col-xs-12" style="float: right;">
                                                                                <div class="row">
                
                                                                                    <div class="news-five">
                                                                                        <ul class="news-block">
                                                                                            
                                                                                            <li>
                                                                                                <a href="{{ $topic_link_url }}" class="news-title">
                                                                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                                                                    {{ $tin->$link_title_var }}
                                                                                                </a>
            
                                                                                            </li>
                
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        @endif

                                                                    @endforeach
        
                                                                @endif
        
                                                            </div>
                                                        @endif
                                                    @endif

                                                @endif

                                                <?php
                                                    if ($MnuCategory->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                            $SubCategory_link_url = url(trans('backLang.code') . "/" . $MnuCategory->$slug_var);
                                                        } else {
                                                            $SubCategory_link_url = url($MnuCategory->$slug_var);
                                                        }
                                                    } else {
                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                            $SubCategory_link_url = route('FrontendTopicsByCatWithLang', ["lang" => trans('backLang.code'), "section" => $MnuCategory->webmasterSection->name, "cat" => $MnuCategory->id]);
                                                        } else {
                                                            $SubCategory_link_url = route('FrontendTopicsByCat', ["section" => $MnuCategory->webmasterSection->name, "cat" => $MnuCategory->id]);
                                                        }
                                                    }
                                                ?>

                                                <div class="pull-right" style="padding: 0 5px 5px 0;">

                                                    <a href="{{ $SubCategory_link_url }}" style="text-decoration: none"><em>Xem tiếp...</em></a>
        
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                
                @endif
            </div>
        </div>

    @endforeach

@endif
