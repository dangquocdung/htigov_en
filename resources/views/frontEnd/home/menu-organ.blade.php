@if (!empty($WebmasterBanners))
<div class="block3">
    <div class="box box-default">
        <div class="box-header with-border">
            <img src="/images/background/lotus.ico" width="30px">
            <h4 class="box-title"> &nbsp;Liên kết tổ chức</h4>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="card">
                <div class="btn-pref-tochuc btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                    @foreach($WebmasterBanners as $key=>$WebmasterBanner)
                        <div class="btn-group" role="group">
                            <button type="button" class="btn {{ ($key == 0 )? "btn-primary":"btn-default"}}" href="#{{ $WebmasterBanner->id }}" data-toggle="tab">
                                <i class="fa fa-home"></i>  <span class="hidden-xs">{!! trans('backLang.'.$WebmasterBanner->name) !!} </span>
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach($WebmasterBanners as $WebmasterBanner)
                        <div class="to-chuc tab-pane fade in {{ ($key==0 )? "active":""}}" id="{{ $WebmasterBanner->id }}">
                            <ul>
                                @foreach($WebmasterBanner->banners as $banner)
                                    <li class="col-md-3 col-sm-4 col-xs-6">
                                        <a href="{{ $banner->link_url }}" target="_blank">
                                            <div class="news-block">{{ $loop->iteration }}.&nbsp;{{ $banner->title_vi }}</div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif