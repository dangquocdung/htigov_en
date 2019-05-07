
<?php
$link_title_var = "title_" . trans('backLang.boxCode');
?>
@if (!empty($RightMenuLinks))
    @foreach($RightMenuLinks as $RightMenuLink)

        <div class="right-item">

            <a href="{{ $RightMenuLink->link }}" class="icon" title="">

                <i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i>

                <span class="nav-text">{{ $RightMenuLink->$link_title_var }} </span>
            </a>
        </div>

    @endforeach
@endif


