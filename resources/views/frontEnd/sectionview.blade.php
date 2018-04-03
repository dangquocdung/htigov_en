@extends('frontEnd.layout')

@section('content')
    
    <section id="content">
        <div class="block3">

            <div class="portlet-header">
                
                    <ul class="breadcrumb">
                        <li><a href="{{ route("Home") }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
                        </li>

                        @if($CurrentCategory!="none")
                            @if(count($CurrentCategory) >0)
                                <?php
                                $category_title_var = "title_" . trans('backLang.boxCode');
                                ?>
                                <li class="active"><i
                                            class="icon-angle-right"></i>{{ $Menu->$category_title_var }}
                                </li>
                            @endif
                        @endif

                        <button class="pull-right btn btn-info btn-sm" id="themCauHoi" style="margin-right: 7px;">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Đặt câu hỏi
                        </button>
                        
                    </ul>

                    <script>
                        $("#themCauHoi").click(function () {
        
                            if ( $(".input-box").css("display") == "block" ){
        
                                $(".input-box").css("display","none");
        
                            }else{
                                $(".input-box").css("display","block");
                            }
                        })
                    </script>

            </div>

            @if(session('flash_notification.message'))

                <section class="notification">

                    <div class="alert alert-{{ session('flash_notification.level') }} alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!! session('flash_notification.message') !!}
                    </div>

                </section>

            @endif

            <div class="input-box" style="padding: 5px; display: none">

                <div class="col-md-12">
                    
                        <h4 id="contact_div"><i class="fa fa-envelope"></i> {{ trans('frontLang.getInTouch') }}</h4>

                        <div id="sendmessage"><i class="fa fa-check-circle"></i>
                            &nbsp;{{ trans('frontLang.youMessageSent') }}</div>
                        <div id="errormessage">{{ trans('frontLang.youMessageNotSent') }}</div>
                    
                        {{--  {{Form::open(['route'=>['contactPage'],'method'=>'POST','class'=>'contactForm'])}}  --}}

                        {{Form::open(['route'=>['StoreComment'],'method'=>'POST'])}}

                        <input type="hidden" name="webmasterId" value="{{ $CurrentCategory }}">
                        
                        <div class="form-group">
                            {!! Form::text('name',"", array('placeholder' => trans('frontLang.yourName'),'class' => 'form-control','id'=>'name', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}
                            <div class="alert alert-warning validation"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::text('address',"", array('placeholder' => trans('frontLang.address'),'class' => 'form-control','id'=>'address', 'data-msg'=> trans('frontLang.enterYourAddress'),'data-rule'=>'minlen:4')) !!}
                            <div class="validation"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::text('phone',"", array('placeholder' => trans('frontLang.phone'),'class' => 'form-control','id'=>'phone', 'data-msg'=> trans('frontLang.enterYourPhone'),'data-rule'=>'minlen:4')) !!}
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            {!! Form::email('email',"", array('placeholder' => trans('frontLang.yourEmail'),'class' => 'form-control','id'=>'email', 'data-msg'=> trans('frontLang.enterYourEmail'),'data-rule'=>'email')) !!}
                            <div class="validation"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::text('title_vi',"", array('placeholder' => trans('frontLang.subject'),'class' => 'form-control','id'=>'subject', 'data-msg'=> trans('frontLang.enterYourSubject'),'data-rule'=>'minlen:4')) !!}
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('details_vi','', array('placeholder' => trans('frontLang.message'),'class' => 'form-control textarea','id'=>'message','rows'=>'8', 'data-msg'=> trans('frontLang.enterYourMessage'),'data-rule'=>'required')) !!}
                            <div class="validation"></div>
                        </div>
                    
                        @if(env('NOCAPTCHA_STATUS', false))
                            <div class="form-group">
                                {!! app('captcha')->display($attributes = [], $lang = trans('backLang.code')) !!}
                            </div>
                        @endif
                        
                        <strong>* Điều khoản sử dụng:</strong><br>
                        <em>
                            - Không sử dụng các từ ngữ, câu hỏi có nội dung làm ảnh hưởng đến uy tín, danh dự của cá nhân, tổ chức khác hoặc chứa đựng các từ ngữ thông tục, ảnh hưởng tới văn hóa và thuần phong mỹ tục.<br>
                            - Cá nhân, tổ chức sẽ tự chịu trác nhiệm với nội dung câu hỏi của mình tùy theo mức độ ảnh hưởng của nội dung câu hỏi đó.<br>
                            - Các nội dung thông tin từ chuyên mục Hỏi - Đáp không thể được sử dụng hay trích dẫn làm căn cứ pháp lý cho bất kỳ trường hợp nào.<br>
                            - Câu hỏi trái với các nội dung nêu trên sẽ bị xóa mà không cần thông báo trước.<br>
                        </em>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-theme" style="color: white">{{ trans('frontLang.sendMessage') }}</button>
                        </div>
                        <br>

                        {{Form::close()}}

                </div>
            </div>

            <div class="col-md-12">
                
            </div>

        </div>
    </section>

@stop

@section('side-menu')

    @include('frontEnd.home.menu-side') 

@stop

@section('footerInclude')

    @if (!empty($Topic))
        @if(count($Topic->maps) >0)
            @foreach($Topic->maps->slice(0,1) as $map)
                <?php
                $MapCenter = $map->longitude . "," . $map->latitude;
                ?>
            @endforeach
            <?php
            $map_title_var = "title_" . trans('backLang.boxCode');
            $map_details_var = "details_" . trans('backLang.boxCode');
            ?>
            <script type="text/javascript"
                    src="http://maps.google.com/maps/api/js?key=AIzaSyAgzruFTTvea0LEmw_jAqknqskKDuJK7dM"></script>

            <script type="text/javascript">
                // var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/';
                var iconURLPrefix = "{{ URL::to('backEnd/assets/images/')."/" }}";
                var icons = [
                    iconURLPrefix + 'marker_0.png',
                    iconURLPrefix + 'marker_1.png',
                    iconURLPrefix + 'marker_2.png',
                    iconURLPrefix + 'marker_3.png',
                    iconURLPrefix + 'marker_4.png',
                    iconURLPrefix + 'marker_5.png',
                    iconURLPrefix + 'marker_6.png'
                ]

                var locations = [
                        @foreach($Topic->maps as $map)
                    ['<?php echo "<strong>" . $map->$map_title_var . "</strong>" . "<br>" . $map->$map_details_var; ?>', <?php echo $map->longitude; ?>, <?php echo $map->latitude; ?>, <?php echo $map->id; ?>, <?php echo $map->icon; ?>],
                    @endforeach
                ];

                var map = new google.maps.Map(document.getElementById('google-map'), {
                    zoom: 6,
                    draggable: false,
                    scrollwheel: false,
                    center: new google.maps.LatLng(<?php echo $MapCenter; ?>),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var infowindow = new google.maps.InfoWindow();

                var marker, i;

                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        icon: icons[locations[i][4]],
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            </script>
        @endif
        <script type="text/javascript">

            jQuery(document).ready(function ($) {
                "use strict";

                //Contact
                $('form.contactForm').submit(function () {

                    var f = $(this).find('.form-group'),
                        ferror = false,
                        emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

                    f.children('input').each(function () { // run all inputs

                        var i = $(this); // current input
                        var rule = i.attr('data-rule');

                        if (rule !== undefined) {
                            var ierror = false; // error flag for current input
                            var pos = rule.indexOf(':', 0);
                            if (pos >= 0) {
                                var exp = rule.substr(pos + 1, rule.length);
                                rule = rule.substr(0, pos);
                            } else {
                                rule = rule.substr(pos + 1, rule.length);
                            }

                            switch (rule) {
                                case 'required':
                                    if (i.val() === '') {
                                        ferror = ierror = true;
                                    }
                                    break;

                                case 'minlen':
                                    if (i.val().length < parseInt(exp)) {
                                        ferror = ierror = true;
                                    }
                                    break;

                                case 'email':
                                    if (!emailExp.test(i.val())) {
                                        ferror = ierror = true;
                                    }
                                    break;

                                case 'checked':
                                    if (!i.attr('checked')) {
                                        ferror = ierror = true;
                                    }
                                    break;

                                case 'regexp':
                                    exp = new RegExp(exp);
                                    if (!exp.test(i.val())) {
                                        ferror = ierror = true;
                                    }
                                    break;
                            }
                            i.next('.validation').html('<i class=\"fa fa-info\"></i> &nbsp;' + ( ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show();
                            !ierror ? i.next('.validation').hide() : i.next('.validation').show();
                        }
                    });
                    f.children('textarea').each(function () { // run all inputs

                        var i = $(this); // current input
                        var rule = i.attr('data-rule');

                        if (rule !== undefined) {
                            var ierror = false; // error flag for current input
                            var pos = rule.indexOf(':', 0);
                            if (pos >= 0) {
                                var exp = rule.substr(pos + 1, rule.length);
                                rule = rule.substr(0, pos);
                            } else {
                                rule = rule.substr(pos + 1, rule.length);
                            }

                            switch (rule) {
                                case 'required':
                                    if (i.val() === '') {
                                        ferror = ierror = true;
                                    }
                                    break;

                                case 'minlen':
                                    if (i.val().length < parseInt(exp)) {
                                        ferror = ierror = true;
                                    }
                                    break;
                            }
                            i.next('.validation').html('<i class=\"fa fa-info\"></i> &nbsp;' + ( ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show();
                            !ierror ? i.next('.validation').hide() : i.next('.validation').show();
                        }
                    });
                    if (ferror) return false;
                    else var str = $(this).serialize();
                    var xhr = $.ajax({
                        type: "POST",
                        url: "<?php echo route("contactPageSubmit"); ?>",
                        data: str,
                        success: function (msg) {
                            if (msg == 'OK') {
                                $("#sendmessage").addClass("show");
                                $("#errormessage").removeClass("show");
                                $("#name").val('');
                                $("#email").val('');
                                $("#phone").val('');
                                $("#subject").val('');
                                $("#message").val('');
                                $(window).scrollTop($('#contact_div').offset().top);
                            }
                            else {
                                $("#sendmessage").removeClass("show");
                                $("#errormessage").addClass("show");
                                $('#errormessage').html(msg);
                            }

                        }
                    });
                    //console.log(xhr);
                    return false;
                });

            });
        </script>

    @else

        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
        <script>
            $(function () {
                $('#example1').DataTable({

                    "iDisplayLength": 25,

                    "language": {
                        "sProcessing": "Đang xử lý...",
                        "sLengthMenu": "Hiển thị _MENU_ mục",
                        "sInfo": "Đang hiển thị từ mục _START_ đến mục _END_ trong tổng _TOTAL_ mục",
                        "sInfoPostFix": "",
                        "sSearch": "Tìm kiếm:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "oPaginate": {
                            "sFirst": "Đầu tiên",
                            "sLast": "Cuối cùng",
                            "sNext": "Sau",
                            "sPrevious": "Trước"
                        }
                    }
                })
            })
        </script>
    @endif

@endsection