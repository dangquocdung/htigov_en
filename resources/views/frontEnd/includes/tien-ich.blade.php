<div class="tien-ich" style="border-top: none;">
        {{-- <a class="in" href="javascript:newOpenWindows();"><i class="fa fa-print" aria-hidden="true"></i> In bài viết</a> --}}
        <a class="in" href="javascript:window.print();"><i class="fa fa-print" aria-hidden="true"></i> In</a>
        &nbsp;&nbsp;&nbsp;
        {{--<div class="fb-share-button" data-href="{{ urlencode(Request::fullUrl()) }}" data-layout="button_count" data-size="small" data-mobile-iframe="true">--}}
        <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}&amp;src=sdkpreparse"><i class="fa fa-facebook" aria-hidden="true"></i> Chia sẻ</a>
    
        &nbsp;&nbsp;&nbsp;
        <a class="quaylai" href="javascript:goBack();"><i class="fa fa-reply" aria-hidden="true"></i> Quay lại</a>
    
        @role('admin')
            @if (! empty($type))
                &nbsp;&nbsp;&nbsp;
                <a style="color: red"
    
                   @if ($type == 'tin-tuc')
                    href="{{route('edit-tin-tuc', $tin->slug)}}"
                   @elseif ($type == 'van-ban')
                    href="{{route('edit-van-ban', $tin->id)}}"
                   @elseif($type == 'van-ban-khac')
                    href="{{route('edit-van-ban-khac', $tin->id)}}"
                   @endif
    
               target="_blank"><i class="fa fa-edit " aria-hidden="true"></i> Chỉnh sửa </a>
    
            @endif
        @endrole
    </div>