
<?php

    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');

?>

<ul>
    <?php
    $link_title_var = "title_" . trans('backLang.boxCode');
    ?>
    @foreach($HeaderMenuLinks as $HeaderMenuLink)

        <?php
            if ($HeaderMenuLink->webmasterSection[$slug_var] != "" && Helper::GeneralWebmasterSettings("links_status")) {
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                    $mmnnuu_link = url(trans('backLang.code')."/" .$HeaderMenuLink->webmasterSection[$slug_var]);
                }else{
                    $mmnnuu_link = url($HeaderMenuLink->webmasterSection[$slug_var]);
                }
            }else{
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                    $mmnnuu_link =url(trans('backLang.code')."/" .$HeaderMenuLink->webmasterSection['name']);
                }else{
                    $mmnnuu_link =url($HeaderMenuLink->webmasterSection['name']);
                }
            }
        ?>

        <li>
            <a href="{{ (trim($HeaderMenuLink->link) !="") ? $HeaderMenuLink->link:$mmnnuu_link }}">{{ $HeaderMenuLink->$link_title_var }}</a>
        </li>
       
    @endforeach

</ul>
;