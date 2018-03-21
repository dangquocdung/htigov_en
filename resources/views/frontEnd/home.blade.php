<?php
// Current Full URL
$fullPagePath = Request::url();
// Char Count of Backend folder Plus 1
$envAdminCharCount = strlen(env('BACKEND_PATH')) + 1;
// URL after Root Path EX: admin/home
$urlAfterRoot = substr($fullPagePath, strpos($fullPagePath, env('BACKEND_PATH')) + $envAdminCharCount);
?>
<?php
    $category_title_var = "title_" . trans('backLang.boxCode');
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
    $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
?>
<?php
    $link_title_var = "title_" . trans('backLang.boxCode');
    $details_var = "details_" . trans('backLang.boxCode');
    $details_var2 = "details_" . trans('backLang.boxCodeOther');
    $title_var = "title_" . trans('backLang.boxCode');
    $title_var2 = "title_" . trans('backLang.boxCodeOther');
    
?>

@extends('frontEnd.layout')

@section('content')

    @include('frontEnd.home.tin-noi-bat')
    
    <div class="clearfix"></div>

    @include('frontEnd.home.slider')

    <div class="clearfix"></div>

    @include('frontEnd.home.banner')
    
    <div class="clearfix"></div>

    @include('frontEnd.home.menu-main')

    <div class="clearfix"></div>

    @include('frontEnd.home.tin-anh')
    <div class="clearfix"></div>

    @include('frontEnd.home.menu-organ')
    <div class="clearfix"></div>

    @include('frontEnd.home.tin-video')
    
@stop

@section('side-menu')

    @include('frontEnd.home.menu-side') 

@stop