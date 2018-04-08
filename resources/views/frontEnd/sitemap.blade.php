<?php
$link_title_var = "title_" . trans('backLang.boxCode');
$link_intro_var = "intro_" . trans('backLang.boxCode');

$slug_var = "seo_url_slug_" . trans('backLang.boxCode');
$slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
?>


@extends('frontEnd.layout')

@section('content')


            


<section id="content">

        <div class="block3">
                <div class="portlet-header">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
                        </li>
                
                        <li class="active">{!! trans('backLang.siteMap') !!}</li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="so-do">
                    <div class="container">
                        <div class="row">
                            <div class="so-do">
                                <ul id="tree1">
                                    @foreach($WebmasterSections as $WebmasterSection)
                                    <?php
                                        if ($WebmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                $mmnnuu_link = url(trans('backLang.code')."/" .$WebmasterSection->$slug_var);
                                            }else{
                                            $mmnnuu_link = url($WebmasterSection->$slug_var);
                                            }
                                        }else{
                                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                $mmnnuu_link =url(trans('backLang.code')."/" .$WebmasterSection->name);
                                            }else{
                                                $mmnnuu_link =url($WebmasterSection->name);
                                            }
                                        }
                                    ?>
                                        <li>
                                            <a href="{{ url($mmnnuu_link) }}">
                                                <i class="fa fa-folder-open-o" aria-hidden="true"></i> {{ trans('backLang.'.$WebmasterSection->name) }}
                                            </a>
                                            <ul>
                                                @foreach($WebmasterSection->Sections as $Section)
                                                    <?php

                                                        $section_link = $mmnnuu_link."/".$Section->id

                                                    ?>

                                                    @if ($Section->father_id == 0)
                                                        <li>
                                                            <a href="{{ url($section_link) }}">

                                                                <i class="fa fa-folder-o" aria-hidden="true"></i>
                                                                {{ $Section->$link_title_var }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</section>
@endsection

@section('side-menu')

    @include('frontEnd.home.menu-side') 

@stop

@section('footerInclude')
    <style>

        .tree, .tree ul {
            margin:0;
            padding:0;
            list-style:none
        }
        .tree ul {
            margin-left:1em;
            position:relative
        }
        .tree ul ul {
            margin-left:.5em
        }
        .tree ul:before {
            content:"";
            display:block;
            width:0;
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            border-left:1px solid
        }
        .tree li {
            margin:0;
            padding:0 1em;
            line-height:2em;
            color:#369;
            font-weight:700;
            position:relative
        }
        .tree ul li:before {
            content:"";
            display:block;
            width:10px;
            height:0;
            border-top:1px solid;
            margin-top:-1px;
            position:absolute;
            top:1em;
            left:0
        }
        .tree ul li:last-child:before {
            background:#fff;
            height:auto;
            top:1em;
            bottom:0
        }
        .indicator {
            margin-right:5px;
        }
        .tree li a {
            text-decoration: none;
            color:#369;
        }
        .tree li button, .tree li button:active, .tree li button:focus {
            text-decoration: none;
            color:#369;
            border:none;
            background:transparent;
            margin:0px 0px 0px 0px;
            padding:0px 0px 0px 0px;
            outline: 0;
        }

    </style>
    <script type="text/javascript">
        $.fn.extend({
            treed: function () {

                var openedClass = 'fa-folder-open-o';
                var closedClass = 'fa-folder-o';

//                if (typeof o != 'undefined'){
//                    if (typeof o.openedClass != 'undefined'){
//                        openedClass = o.openedClass;
//                    }
//                    if (typeof o.closedClass != 'undefined'){
//                        closedClass = o.closedClass;
//                    }
//                };


                /* initialize each of the top levels */
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this);
                    branch.prepend("");
                    branch.addClass('branch');
                    branch.children('i').addClass(openedClas);
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    })
                    branch.children().children().toggle();
                });
//                /* fire event from the dynamically added icon */
//                tree.find('.branch .indicator').each(function(){
//                    $(this).on('click', function () {
//                        $(this).closest('li').click();
//                    });
//                });
//                /* fire event to open branch if the li contains an anchor instead of text */
//                tree.find('.branch>a').each(function () {
//                    $(this).on('click', function (e) {
//                        $(this).closest('li').click();
//                        e.preventDefault();
//                    });
//                });
//                /* fire event to open branch if the li contains a button instead of text */
//                tree.find('.branch>button').each(function () {
//                    $(this).on('click', function (e) {
//                        $(this).closest('li').click();
//                        e.preventDefault();
//                    });
//                });
            }
        });
        /* Initialization of treeviews */
        $('#tree1').treed();

    </script>
@stop
