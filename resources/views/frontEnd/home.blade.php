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
$link_intro_var = "intro_" . trans('backLang.boxCode');
?>

@extends('frontEnd.layout')

@section('content')
    @include('frontEnd.home.tin-noi-bat')
    
    <div class="clearfix"></div>

    @include('frontEnd.home.menu-main')
    
    
@endsection