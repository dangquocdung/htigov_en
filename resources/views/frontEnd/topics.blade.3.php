@extends('frontEnd.layout')

@section('content')
    
    <section id="content">

            <div class="block3">

                <div class="portlet-header">
                    
                    <ul class="breadcrumb">
                        <li><a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
                        </li>
                        @if($WebmasterSection!="none")
                            <li class="active">{!! trans('backLang.'.$WebmasterSection->name) !!}</li>
                        @elseif(@$search_word!="")
                            <li class="active">{{ @$search_word }}</li>
                        @else
                            <li class="active">{{ $User->name }}</li>
                        @endif
                        @if($CurrentCategory!="none")
                            @if(count($CurrentCategory) >0)
                                <?php
                                $category_title_var = "title_" . trans('backLang.boxCode');
                                ?>
                                <li class="active"><i
                                            class="icon-angle-right"></i>{{ $CurrentCategory->$category_title_var }}
                                </li>
                            @endif
                        @endif

                        
                        
                        @if ( in_array($WebmasterSection->id,[23,24]) )

                            <div class="pull-right" style="font-weight:100; padding-right: 5px;">
                                <em>
                                    <sup>*</sup>
                                    Bạn cần
                                    <a href="admin" style="color:red !important">đăng nhập</a> 
                                    để gởi câu hỏi
                                </em>
                            </div>
                        @endif

                        
                    </ul>

                </div>
      
        <div class="clearfix"></div>

        <div class="loai-tin">
        
            @if($Topics->total() == 0)
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        <i class="fa fa-info"></i> &nbsp; {{ trans('frontLang.noData') }}
                    </div>
                </div>
            @else
                @if($Topics->total() > 0)
                    <?php
                        $title_var = "title_" . trans('backLang.boxCode');
                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                        $details_var = "details_" . trans('backLang.boxCode');
                        $details_var2 = "details_" . trans('backLang.boxCodeOther');
                        $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                        $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
                    ?>
                    @foreach($Topics->sortbydesc('date') as $key=>$Topic)
                        
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

                        @if ($key%2==0)
                            <div class="clearfix"></div>
                        @endif

                        <article class="center">
                            @if(count($Topic->photos)>0)
                                {{--photo slider--}}
                                <div class="post-slider">
                                    <div class="post-heading">
                                        <h3>
                                            <a href="{{ $topic_link_url }}">
                                                @if($Topic->icon !="")
                                                    <i class="fa {!! $Topic->icon !!} "></i>&nbsp;
                                                @endif
                                                {{ $title }}
                                            </a></h3>
                                    </div>
                                    <!-- start flexslider -->
                                    <div class="p-slider flexslider">
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
                                    </div>
                                    <!-- end flexslider -->
                                </div>
                            @else
                                {{--one photo--}}
                                <div class="news-main" style="padding: 0; margin-bottom: 0">
                                    <div class="row" style="padding: 0 15px 10px 15px;">
                                            <a class="tin_title_text" href="">

                                            @if($Topic->photo_file !="")
                                                <img src="{{ URL::to('uploads/topics/'.$Topic->photo_file) }}" alt="{{ $title }}"/>
                                            @endif

                                            <div class="tin_title_text">

                                                <a href="{{ $topic_link_url }}">
                                                    @if($Topic->icon !="")
                                                        <i class="fa {!! $Topic->icon !!} "></i>&nbsp;
                                                    @endif
                                                    {{ $title }}
                                                </a>
                                            </div>

                                        </a>

                                        <div class="tin_title_abstract" style="display:;">
                                            {!! str_limit(strip_tags($Topic->$details), $limit = 350, $end = '...') !!}
                                        </div>

                                    </div>
                                </div>

                                
                            @endif
                            

                            {{--Additional Feilds--}}
                            @if(count($Topic->webmasterSection->customFields) >0)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">

                                            @php
                                                $cf_title_var = "title_" . trans('backLang.boxCode');
                                                $cf_title_var2 = "title_" . trans('backLang.boxCodeOther');
                                            @endphp

                                            @foreach($Topic->webmasterSection->customFields as $customField)
                                                @php
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

                                                @endphp

                                                @if(($cf_saved_val!="" || count($cf_saved_val_array) > 0) && ($customField->lang_code == "all" || $customField->lang_code == trans('backLang.boxCode')))
                                                    @if($customField->type ==12)
                                                        {{--Vimeo Video Link--}}
                                                    @elseif($customField->type ==11)
                                                        {{--Youtube Video Link--}}
                                                    @elseif($customField->type ==10)
                                                        {{--Video File--}}
                                                    @elseif($customField->type ==9)
                                                        {{--Attach File--}}
                                                    @elseif($customField->type ==8)
                                                        {{--Photo File--}}
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
                            @endif
                            
                            {{--End of -- Additional Feilds--}}

                            {{--  <p>{{ str_limit(strip_tags($Topic->$details), $limit = 200, $end = '...') }}</p>  --}}
                            
                            <div class="bottom-article" style="margin-top: 0">
                                <ul class="meta-post">
                                    
                                    @if ($Topic->webmasterSection->date_status)

                                        @if ($WebmasterSection->id == 22)
                                            <li>
                                                <i class="fa fa-calendar"></i> <a>{{ Carbon\Carbon::parse($Topic->expire_date)->format('d-m-Y')   }}</a>
                                            </li>
                                        @else
                                            <li>
                                                <i class="fa fa-calendar"></i> <a>{{ Carbon\Carbon::parse($Topic->date)->format('d-m-Y')   }}</a>
                                            </li>
                                        @endif

                                    @endif

                                    <li class="hidden-xs">
                                        <i class="fa fa-user"></i> 
                                        <a href="javascript:void(0);"> {!! $Topic->user->name !!}</a>
                                    </li> 
                                    
                                    <li>
                                        <i class="fa fa-eye"></i> 
                                        <a href="javascript:void(0);"> {!! $Topic->visits !!}</a>
                                    </li>
                                    

                                    @if ($Topic->webmasterSection->comments_status)
                                        <li>
                                            <i class="fa fa-comments"></i>
                                            <a href="{{route('FrontendTopic',["section"=>$Topic->webmasterSection->name,"id"=>$Topic->id])}}#comments">: {{count($Topic->approvedComments)}} </a>
                                        </li>
                                    @endif
                                </ul>
                                <a href="{{ $topic_link_url }}"
                                    class="pull-right">{{ trans('frontLang.readMore') }} <i
                                            class="fa fa-caret-{{ trans('backLang.right') }}"></i></a>
                            </div>
                        </article>
                        
                        
                    @endforeach

                    <div class="clearfix"></div>

                        <div class="col-md-8">
                            {!! $Topics->links() !!}
                        </div>
                        <div class="col-md-4 text-right" style="padding: 0 0 5px 0;">
                            <br>
                            <small>{{ $Topics->firstItem() }} - {{ $Topics->lastItem() }} {{ trans('backLang.of') }}
                                ( {{ $Topics->total()  }} ) {{ trans('backLang.records') }}</small>
                        </div>
                    
                @endif
            @endif
        
        </div>
    </div>


            <br>

            @if ($WebmasterSection->id == 22)
                <div class="block3">

                    <div class="portlet-header">
                        
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
                            </li>
                            <li class="active">Văn bản hết hạn góp ý</li>
                            
                        </ul>

                    </div>

                    <div class="clearfix"></div>

                    <div class="loai-tin">
                        
                            @if($Topics->total() == 0)
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        <i class="fa fa-info"></i> &nbsp; {{ trans('frontLang.noData') }}
                                    </div>
                                </div>
                            @else
                                @if($Topics->total() > 0)
                                    <?php
                                        $title_var = "title_" . trans('backLang.boxCode');
                                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                        $details_var = "details_" . trans('backLang.boxCode');
                                        $details_var2 = "details_" . trans('backLang.boxCodeOther');
                                        $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                                        $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
                                    ?>
                                    @foreach($Topics_expire as $key=>$Topic)
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

                                        @if ($key%2==0)
                                            <div class="clearfix"></div>
                                        @endif

                                        <article class="center">
                                            
                                            <div class="news-main" style="padding: 0; margin-bottom: 0">
                                                <div class="row" style="padding: 0 15px 10px 15px;">
                                                        <a class="tin_title_text" href="">
                                                        @if($Topic->photo_file !="")
                                                            <img src="{{ URL::to('uploads/topics/'.$Topic->photo_file) }}" alt="{{ $title }}"/>
                                                        @endif
            
                                                        <div class="tin_title_text">

                                                            <a href="{{ $topic_link_url }}">
                                                                @if($Topic->icon !="")
                                                                    <i class="fa {!! $Topic->icon !!} "></i>&nbsp;
                                                                @endif
                                                                {{ $title }}
                                                            </a>
                                                        </div>
            
                                                    </a>
            
                                                    <div class="tin_title_abstract" style="display:;">
                                                        {{ str_limit(strip_tags($Topic->$details), $limit = 350, $end = '...') }}
                                                    </div>
            
                                                </div>
                                            </div>
                                            
                                            <div class="bottom-article" style="margin-top: 0">
                                                <ul class="meta-post">
                                                    @if($Topic->webmasterSection->date_status)
                                                        @if ($WebmasterSection->id == 22)
                                                            <li>
                                                                <i class="fa fa-calendar"></i> <a>{{ Carbon\Carbon::parse($Topic->expire_date)->format('d-m-Y')   }}</a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <i class="fa fa-calendar"></i> <a>{{ Carbon\Carbon::parse($Topic->date)->format('d-m-Y')   }}</a>
                                                            </li>
                                                        @endif
                                                    @endif
                                                    {{--  <li><i class="fa fa-user"></i> <a
                                                                href="{{route('FrontendUserTopics',$Topic->created_by)}}">{{$Topic->user->name}}</a>
                                                    </li>  --}}
                                                    <li><i class="fa fa-eye"></i> <a>{{ trans('frontLang.visits') }}
                                                            : {!! $Topic->visits !!}</a></li>
                                                    @if($Topic->webmasterSection->comments_status)
                                                        <li><i class="fa fa-comments"></i><a
                                                                    href="{{route('FrontendTopic',["section"=>$Topic->webmasterSection->name,"id"=>$Topic->id])}}#comments">{{ trans('frontLang.comments') }}
                                                                : {{count($Topic->approvedComments)}} </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                                <a href="{{ $topic_link_url }}"
                                                    class="pull-right">{{ trans('frontLang.readMore') }} <i
                                                            class="fa fa-caret-{{ trans('backLang.right') }}"></i></a>
                                            </div>
                                        </article>
                                        
                                    @endforeach

                                    <div class="clearfix"></div>

                                        <div class="col-md-8">
                                            {!! $Topics_expire->links() !!}
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <br>
                                            <small>{{ $Topics_expire->firstItem() }} - {{ $Topics_expire->lastItem() }} {{ trans('backLang.of') }}
                                                ( {{ $Topics_expire->total()  }} ) {{ trans('backLang.records') }}</small>
                                        </div>
                                    
                                @endif
                            @endif
                    
                    </div>
                </div>
            @endif

    </section>
@stop

@section('side-menu')

    @include('frontEnd.topic.menu-side') 

@stop