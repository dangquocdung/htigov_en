<ul>
        <?php
        $link_title_var = "title_" . trans('backLang.boxCode');
        ?>
        @foreach($HeaderMenuLinks as $HeaderMenuLink)
            
            <li class="dropdown">
                <a href="{{ $HeaderMenuLink->link }}">{{ $HeaderMenuLink->$link_title_var }}</a>
            </li>
           
        @endforeach
        <li class="last" style="width:5%">
            <a data-toggle="offcanvas-mb">
                <i class="fa fa-level-down" aria-hidden="true"></i>
            </a>
        </li>
    
    </ul>