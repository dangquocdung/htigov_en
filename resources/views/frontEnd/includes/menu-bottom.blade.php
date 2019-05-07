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

<ul>
    <?php
    $link_title_var = "title_" . trans('backLang.boxCode');
    ?>
    @foreach($FooterMenuLinks as $FooterMenuLink)

        <?php
            if ($FooterMenuLink->webmasterSection[$slug_var] != "" && Helper::GeneralWebmasterSettings("links_status")) {
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                    $mmnnuu_link = url(trans('backLang.code')."/" .$FooterMenuLink->webmasterSection[$slug_var]);
                }else{
                    $mmnnuu_link = url($FooterMenuLink->webmasterSection[$slug_var]);
                }
            }else{
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                    $mmnnuu_link =url(trans('backLang.code')."/" .$FooterMenuLink->webmasterSection['name']);
                }else{
                    $mmnnuu_link =url($FooterMenuLink->webmasterSection['name']);
                }
            }
        ?>
        
            
        <li style="width:20%;">
            <a href="{{ (trim($FooterMenuLink->link) !="") ? $FooterMenuLink->link:$mmnnuu_link }}">{{ $FooterMenuLink->$link_title_var }}</a>
        </li>
        
    @endforeach

</ul>
