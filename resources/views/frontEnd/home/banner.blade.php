@if(!empty($BlockBanners))
    @foreach($BlockBanners->slice(0,1) as $BlockBanner)
        <?php
        try {
            $BlockBanner_type = $BlockBanner->webmasterBanner->type;
        } catch (Exception $e) {
            $BlockBanner_type = 0;
        }
        ?>
    @endforeach
    <?php
        $title_var = "title_" . trans('backLang.boxCode');
        $details_var = "details_" . trans('backLang.boxCode');
        $file_var = "file_" . trans('backLang.boxCode');

        $col_width = 12;

        if (count($BlockBanners) == 2) {
            $col_width = 6;
        }
        if (count($BlockBanners) == 3) {
            $col_width = 4;
        }
        if (count($BlockBanners) > 3) {
            $col_width = 3;
        }
    ?>

    <div class="hot-item" style="background-color:#ffffff">
        <ul>
            @foreach($BlockBanners as $BlockBanner)
                <li class="col-md-3 col-sm-3 col-xs-6">
                    <div class="block2">
                        <a href="{{ $BlockBanner->link_url }}" target="_blank">
                            <img src="\uploads\banners\{{ $BlockBanner->$file_var }}" alt="{{ $BlockBanner->$title_var }}" title="{{ $BlockBanner->$title_var }}" width="100%">
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    
    
    
@endif