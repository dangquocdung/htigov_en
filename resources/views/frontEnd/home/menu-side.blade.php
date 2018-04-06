@php

    $file_var = 'file_'.trans('backLang.boxCode');
    $title_var = 'title_'.trans('backLang.boxCode');

@endphp

@extends('frontEnd.includes.menu-side')

@section('section-menu')
    
    <div class="block4" style="border-radius: 5px">

        <div id="block-header-bd" class="block-header" style="margin-bottom: 0" data-toggle="collapse" href="#ban-do-dia-gioi">

            <h4>
                <img src="/images/background/lotus.ico" alt="" width="26px"> {!! trans('frontLang.map') !!}

                <i id="menu-bd" class="fa fa-chevron-down" style="position: absolute; top: 5px; right:12px;left: auto"></i>
            </h4>

        </div>

        <div id="ban-do-dia-gioi" class="panel-collapse collapse in">
            <a href="http://gis.chinhphu.vn/?r=ytZEOqw8fEiSQeRsfea4w" target="_blank">

                <img src="/images/ban-do.jpg" alt="Bản đồ Hà Tĩnh" title="Bản đồ Hà Tĩnh" width="100%">
            </a>
        </div>

    </div>

    
@endsection
