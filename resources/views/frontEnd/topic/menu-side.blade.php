
@extends('frontEnd.includes.menu-side')

@section('section-menu')

    @if(count($Categories)>0)
    <aside class="block4">
        <?php
            $category_title_var = "title_" . trans('backLang.boxCode');
            $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
            $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
        ?>
        <div id="block-header-bd" class="block-header" style="margin-bottom: 15px" data-toggle="collapse" href="#ban-do-dia-gioi">
            <h4>
                <img src="/images/background/lotus.ico" alt="" width="26px"> {!! trans('backLang.'.$WebmasterSection->name) !!}
                <i id="menu-bd" class="fa fa-chevron-down" style="position: absolute; top: 5px; right:12px;left: auto"></i>
            </h4>
        </div>

        <div class="widget">
            {{--  <h5 class="widgetheading">{{ trans('frontLang.categories') }}</h5>  --}}
            <ul class="cat">
                @foreach($Categories as $Category)
                    <?php $active_cat = ""; ?>
                    @if($CurrentCategory!="none")
                        @if(count($CurrentCategory) >0)
                            @if($Category->id == $CurrentCategory->id)
                                <?php $active_cat = "class=active"; ?>
                            @endif
                        @endif
                    @endif
                    <?php
                        $ccount = $category_and_topics_count[$Category->id];
                        if ($Category->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                $Category_link_url = url(trans('backLang.code') . "/" . $Category->$slug_var);
                            } else {
                                $Category_link_url = url($Category->$slug_var);
                            }
                        } else {
                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                $Category_link_url = route('FrontendTopicsByCatWithLang', ["lang" => trans('backLang.code'), "section" => $Category->webmasterSection->name, "cat" => $Category->id]);
                            } else {
                                $Category_link_url = route('FrontendTopicsByCat', ["section" => $Category->webmasterSection->name, "cat" => $Category->id]);
                            }
                        }
                    ?>
                    <li>
                        @if($Category->icon !=="")
                            <i class="fa {{$Category->icon}}"></i> &nbsp;
                        @endif
                        
                        <a {{ $active_cat }} href="{{ $Category_link_url }}">{{$Category->$category_title_var}}</a>
                        <span class="pull-right" style="margin-right:5px">({{ $ccount }})</span>
                    
                    </li>
                    @foreach($Category->fatherSections as $MnuCategory)
                        <?php $active_cat = ""; ?>
                        @if($CurrentCategory!="none")
                            @if(count($CurrentCategory) >0)
                                @if($MnuCategory->id == $CurrentCategory->id)
                                    <?php $active_cat = "class=active"; ?>
                                @endif
                            @endif
                        @endif
                        <?php
                        $ccount = $category_and_topics_count[$MnuCategory->id];
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
                        <li> &nbsp; &nbsp; &nbsp;
                            @if($MnuCategory->icon !=="")
                                <i class="fa {{$MnuCategory->icon}}"></i> &nbsp;
                            @endif
                            
                            <a {{ $active_cat }}  href="{{ $SubCategory_link_url }}">{{$MnuCategory->$category_title_var}}</a>
                            <span class="pull-right">({{ $ccount }})</span>
                        
                        </li>
                    @endforeach

                @endforeach
            </ul>
        </div>
    </aside>
    
    @endif

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
    
    @stop