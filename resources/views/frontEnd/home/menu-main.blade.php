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
                                                {{$MnuCategory->$category_title_var}}
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

                                            @if ($MnuCategory->display == 0)

                                                <table class="table table-striped table-bordered table-responsive table-sm" style="margin-bottom: 5px">
                                                    <thead>
                                                    <tr>
                                                        <th>TT</th>
                                                        <th>Nội dung </th>
                                                        <th class="col-md-2" style="text-align: center">Ngày đăng </th>
                                                        <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($MnuCategory->selectedCategories->sortbyDesc('id')->take(3) as $topicId)
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
                                                            <tr>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>
                                                                    <a href="{{ $topic_link_url }}">
                                                                        {{ $tin->$link_title_var }}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    {{ \Carbon\Carbon::parse($tin->date)->format('d-m-Y') }}
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="col-md-12" style="float:left">

                                                    @php

                                                        $topicIds =  $MnuCategory->selectedCategories->sortbyDesc('id')->take(5);

                                                        $topicId = $topicIds->shift();

                                                    @endphp
                                                    
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        
                                                        @foreach ($MnuCategory->selectedCategories->sortbyDesc('id')->take(1) as $topicId)

                                                            <div class="row">
                                                                <?php

                                                                    $tin1 = $topicId->topic;

                                                                    if ($tin1->$title_var != "") {
                                                                        $title = $tin1->$title_var;
                                                                    } else {
                                                                        $title = $tin1->$title_var2;
                                                                    }
                                                                    if ($tin1->$details_var != "") {
                                                                        $details = $details_var;
                                                                    } else {
                                                                        $details = $details_var2;
                                                                    }
                                                                    $section = "";
                                                                    try {
                                                                        if ($tin1->section->$title_var != "") {
                                                                            $section = $tin1->section->$title_var;
                                                                        } else {
                                                                            $section = $tin1->section->$title_var2;
                                                                        }
                                                                    } catch (Exception $e) {
                                                                        $section = "";
                                                                    }
                        
                                                                    if ($tin1->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                            $topic_link_url = url(trans('backLang.code') . "/" . $tin1->$slug_var);
                                                                        } else {
                                                                            $topic_link_url = url($tin1->$slug_var);
                                                                        }
                                                                    } else {
                                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                                            $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $tin1->webmasterSection->name, "id" => $tin1->id]);
                                                                        } else {
                                                                            $topic_link_url = route('FrontendTopic', ["section" => $tin1->webmasterSection->name, "id" => $tin1->id]);
                                                                        }
                                                                    }
                                                                ?>
                                                                <div class="news-main" style="margin-left: -15px">
    
                                                                    <a class="tin_title_text" href="{{ $topic_link_url }}">
                                                                        <div class="tin_title_text">
                                                                            {{ $tin1->$link_title_var }}
                                                                            {{--  <small><em style="font-weight: normal">({{ \Carbon\Carbon::parse($tin1->created_at)->format('d-m-Y H:i:s') }})</em></small>  --}}
                                                                        </div>
                                                                        <img style="display: inline-block; width: 160px; height:auto;" src="/uploads/topics/{{ $tin1->photo_file }}" alt="" title="">
                                                                    </a>
                                                                    <div class="thumb">
    
                                                                    </div>
    
                                                                    <div class="tin_title_abstract" style="display:;">
                                                                        <p>{{ str_limit(strip_tags($tin1->$details_var), $limit = 350, $end = '...') }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endforeach
                                                        
                                                    </div>

                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <div class="row">

                                                            <div class="news-five">
                                                                <ul class="news-block">
                                                                    @foreach($topicIds as $key=>$topicId)
                                                                        
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
                                                                       

                                                                        <li>
                                                                            <a href="{{ $topic_link_url }}" class="news-title">
                                                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                                                {{ $tin->$link_title_var }}
                                                                            </a>

                                                                        </li>

                                                                        
                                                                                    
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                            @endif

                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>

    @endforeach

@endif
