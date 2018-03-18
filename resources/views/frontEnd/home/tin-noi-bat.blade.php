<div class="block3">

    <div class="portlet-header">
        <img src="/images/background/lotus.ico">
        <a href="javascript:void (0);">
            <h4 class="portlet-header-title no-pd-top">{!! trans('frontLang.hotNews') !!} </h4>

        </a>
    </div>

    @if (!empty($HotTopics))

        <div id="tinNoiBatChinh" class="col-md-7 col-xs-12">

            @php
                $HotNews = $HotTopics->first();
                
                @endphp

            <div class="hot-news" style="margin-bottom: 0px;">

                <a href="" class="hot-news-thumb-nail">
                    <img src="/uploads/topics/{{ $HotNews->photo_file }}" alt="{{ $HotNews->$link_title_var }}" class="w3-animate-left" width="100%">
                </a>

                <div class="hot-news-title" style="display: block; text-align: center">
                    <h3>
                        <a href="">{{ $HotNews->$link_title_var }}</a>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-xs-12">
            <div class="btn-pref-tnb btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
                        <i class="fa fa-bars"></i>  <span class="hidden-xs">{!! trans('frontLang.hotNews') !!} </span>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
                        <i class="fa fa-users"></i>&nbsp; <span class="hidden-xs">{!! trans('frontLang.mostViewed') !!} </span>
                    </button>
                </div>
            </div>

            <div>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        <div id="tin-noi-bat">
                            <ul>

                                @foreach($HotTopics as $key=>$Topic)

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

                                    <li class="">
                                        <div class="hot-news-block">

                                            <a href="{{ $topic_link_url }}" class="news-title">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                {{ $Topic->$link_title_var}}
                                            </a>

                                            <img src="http://i.baohatinh.vn/news/1804/77d1141441t2084l2.jpg" alt="Dựa vào dân, vận động quần chúng nhân dân bảo vệ an ninh Tổ quốc" title="Dựa vào dân, vận động quần chúng nhân dân bảo vệ an ninh Tổ quốc" style="display: none;">

                                            <div class="item-desc" style="display: none;">Sáng 22/1, Công an tỉnh Hà Tĩnh tổ chức hội nghị triển khai nhiệm vụ 2018. Bí thư Tỉnh ủy Lê Đình Sơn, Phó Chủ tịch UBND tỉnh Đặng Quốc Vinh, Phó Chủ tịch HĐND tỉnh Võ Hồng Hải cùng tham dự.</div>

                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>

                            <div class="xem-tiep" style="float:right; padding-bottom: 8px;">
                                <a href="/vi/tin-noi-bat" style="text-decoration: none;"><em>Xem tiếp... <i class="fa fa-angle-double-right" aria-hidden="true"></i></em></a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade in" id="tab2">
                            <div id="tin-noi-bat">
                                <ul>
        
                                    @foreach($TopicsMostViewed as $key=>$Topic)

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
            
                                        <li class="">
                                            <div class="hot-news-block">
        
                                                <a href="{{ $topic_link_url }}" class="news-title">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                    {{ $Topic->$link_title_var}}
                                                </a>
        
                                                <img src="http://i.baohatinh.vn/news/1804/77d1141441t2084l2.jpg" alt="Dựa vào dân, vận động quần chúng nhân dân bảo vệ an ninh Tổ quốc" title="Dựa vào dân, vận động quần chúng nhân dân bảo vệ an ninh Tổ quốc" style="display: none;">
        
                                                <div class="item-desc" style="display: none;">Sáng 22/1, Công an tỉnh Hà Tĩnh tổ chức hội nghị triển khai nhiệm vụ 2018. Bí thư Tỉnh ủy Lê Đình Sơn, Phó Chủ tịch UBND tỉnh Đặng Quốc Vinh, Phó Chủ tịch HĐND tỉnh Võ Hồng Hải cùng tham dự.</div>
        
                                            </div>
                                        </li>
                                    @endforeach
                                    
                                </ul>

                                <div class="xem-tiep" style="float:right; padding-bottom: 8px;">
                                    <a href="/vi/tin-noi-bat" style="text-decoration: none;"><em>Xem tiếp... <i class="fa fa-angle-double-right" aria-hidden="true"></i></em></a>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
                
        </div>
    @endif

</div>