@extends('frontEnd.topic.layout')

<?php
    $link_title_var = "title_" . trans('backLang.boxCode');
    $link_intro_var = "intro_" . trans('backLang.boxCode');
?>

@section('content')



<section id="inner-headline">
    <ul class="breadcrumb">
        <li>
            <a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
        </li>
        @if(@$WebmasterSection!="none")
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
                <li class="active">
                    <i class="icon-angle-right"></i>{{ $CurrentCategory->$category_title_var }}
                </li>
            @endif
        @endif
    </ul>
</section>
<section id="content">
    
    <div class="block3">
        {{--  <div class="portlet-header">
            <img src="/images/background/lotus.ico" alt="">
            <a href="">
                <h4 class="portlet-header-title no-pd-top">{!! trans('backLang.'.$WebmasterSection->name) !!}</h4>
            </a>
        </div>  --}}

        <div class="loai-tin">
            @foreach ($WebmasterSection->sections->sortby('row_no') as $Section)

                    <div class="lienquan-header" style="margin-bottom: 10px">
                        <a href="">{{ $Section->$link_title_var }}</a>
                    </div>

                    <br>

                    @foreach ($Section->topics->where('status','1')->sortbydesc('id')->take(5) as $Topic)

                        <div class="news-main" style="padding: 0">
                            <div class="row" style="padding: 0 15px 10px 15px; border-bottom: 1px solid #eaeaea;">
                                  
                                  <a class="tin_title_text" href="">

                                      @if (!empty($Topic->photo_file))
                                          <img src="/uploads/topics/".{{$Topic->photo_file}} alt="{{$Topic->$link_title_var}}" title="{{$Topic->$link_title_var}}" style="display: inline-block; width: 160px; height:auto;" >
                                      @else
                                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWpS3UrDgKd7jcT3BkbPkU4d0mzV7c6PRQ5JmNQIv2Mu2eQ_UpMA" alt="{{$Topic->$link_title_var}}" title="{{$Topic->$link_title_var}}" style="display: inline-block; width: 80px; height:auto;" >
                                      @endif

                                      <div class="tin_title_text">
                                          {{$Topic->$link_title_var}} <small><em style="font-weight: normal">({{ \Carbon\Carbon::parse($Topic->created_at)->format('d-m-Y H:i:s')}})</em></small>
                                      </div>

                                  </a>

                                  <div class="tin_title_abstract" style="display:;">
                                      {{ $Topic->$link_title_var }}
                                  </div>

                                <div class="pull-right" style="padding-top: 7px;">
                                    
                                </div>
                            </div>
                        </div>

                    @endforeach
                    
            @endforeach
        </div>

        <div class="clearfix"></div>
        

    </div>
        
</section>
         

@endsection

@section('side-menu')
    @include('frontEnd.topic.slide')
@endsection