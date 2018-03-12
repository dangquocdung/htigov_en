@extends('frontEnd.layout')

@section('content')
    <?php
    $title_var = "title_" . trans('backLang.boxCode');
    $title_var2 = "title_" . trans('backLang.boxCodeOther');
    $details_var = "details_" . trans('backLang.boxCode');
    $details_var2 = "details_" . trans('backLang.boxCodeOther');
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
    ?>
    <section id="inner-headline">
        
        <ul class="breadcrumb">
            <li><a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
            </li>
            @if($WebmasterSection->id != 1)
                <li class="active">{!! trans('backLang.'.$WebmasterSection->name) !!}</li>
            @else
                <li class="active">{{ $title }}</li>
            @endif
            @if(count($CurrentCategory) >0)
                <?php
                $category_title_var = "title_" . trans('backLang.boxCode');
                ?>
                <li class="active"><i
                            class="icon-angle-right"></i>{{ $CurrentCategory->$category_title_var }}</li>
            @endif
        </ul>
               
    </section>

    <section id="content">
        <div class="container">
            <div class="row">

                    
                
            </div>
        </div>
    </section>

@endsection
