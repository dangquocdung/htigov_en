@if (!empty($OrganMenuLinks))
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
                    @foreach($OrganMenuLinks as $OrganMenuLink)
                        <div class="btn-group" role="group">
                            <button type="button" class="btn {{ ($OrganMenuLink->row_no == 1 )? "btn-primary":"btn-default"}}" href="#{{ $OrganMenuLink->id }}" data-toggle="tab">
                                <i class="fa fa-home"></i>  <span class="hidden-xs">{{ $OrganMenuLink->$link_title_var }} </span>
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach($OrganMenuLinks as $OrganMenuLink)
                        <div class="to-chuc tab-pane fade in {{ ($OrganMenuLink->row_no == 1 )? "active":""}}" id="{{ $OrganMenuLink->id }}">
                            <ul>
                                @foreach($OrganMenuLink->subMenus as $subMenu)
                                    <li class="col-md-3 col-sm-4 col-xs-6">
                                        <a href="{{ $subMenu->link }}" target="_blank">
                                            <div class="news-block">{{ $loop->iteration }}.&nbsp;{{ $subMenu->$link_title_var }}</div>
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