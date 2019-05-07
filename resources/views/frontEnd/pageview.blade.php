@extends('frontEnd.layout')

@section('content')
    
    
    <section id="content">
        <div class="block3">

            <div class="portlet-header">
                
                    <ul class="breadcrumb">
                        <li><a href="{{ route('Home') }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i>
                        </li>
                        <li class="active">{{ $PageTitle }}</li>
                    </ul>

            </div>

            
            
            <div class="col-md-12">
                
                <div class="dv" style="margin:10px 0; padding: 5px">
                    <div class="dv-body">
                        <table id="example1" class="dv-table">
                            @if ($PageName == 'Organ')

                                   
                                <thead>
                                <tr>
                                    <th>TT</th>
                                    <th>Cơ quan</th>
                                    <th>Website</th>
                                    <th>Điện thoại</th>
                                </tr>
                                </thead>
                
                                <tbody>
                                
                                    @foreach($Models->where('nhomcq_id','1') as $cq)
                                    <tr>
                                        <td>{{ $cq->id }}</td>
                                        <td>{{ $cq->name }}</td>
                                        <td><a href="{{ $cq->lienket }}" target="_blank">{{ $cq->lienket }}</a></td>
                                        <td>{{ $cq->sodt }}</td>
                                    </tr>
                                    @endforeach
                                
                                </tbody>

                            @elseif ($PageName == 'SpokesMan')
                                <thead>
                                    <tr>
                                        <th>
                                            <span>TT</span>
                                        </th>
                                        <th>
                                            <span>Cơ quan</span>
                                        </th>
                    
                                        <th>
                                            <span>Họ và Tên</span>
                                        </th>
                    
                                        <th>
                                            <span>Chức danh</span>
                                        </th>
                                        <th>
                                            <span>ĐT cố định</span>
                                        </th>
                                        <th>
                                            <span>ĐT di động</span>
                                        </th>
                                        <th>
                                            <span>Địa chỉ e-mail</span>
                                        </th>
                                    </tr>
                                    </thead>
                    
                                    <tbody>
                                        @foreach($Models as $npn)
                                        <tr>
                                            <td>{{ $npn->id }}</td>
                                            <td>{{ $npn->coquan->name }}</td>
                                            <td>{{ $npn->name }}</td>
                                            <td>{{ $npn->chucdanh }}</td>
                                            <td>{{ $npn->codinh }}</td>
                                            <td>{{ $npn->didong }}</td>
                                            <td>{{ $npn->email }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                            @elseif ($PageName == 'Reporter')

                                <thead>
                                    <tr>
                                        <th>
                                            <span>TT</span>
                                        </th>
                                        <th>
                                            <span>Đơn vị</span>
                                        </th>
                    
                                        <th>
                                            <span>Họ và Tên</span>
                                        </th>
                    
                                        <th>
                                            <span>Số TNB</span>
                                        </th>
                                        <th>
                                            <span>Điện thoại</span>
                                        </th>
                                        <th>
                                            <span>Email</span>
                                        </th>
                                    </tr>
                                    </thead>
                    
                                    <tbody>
                                    @foreach($Models as $pvtt)
                                        <tr>
                                            <td>{{ $pvtt->id }}</td>
                                            <td>{{ $pvtt->cqbc }}</td>
                                            <td>{{ $pvtt->pvtt }}</td>
                                            <td>{{ $pvtt->sothe }}</td>
                                            <td>{{ $pvtt->dienthoai }}</td>
                                            <td>{{ $pvtt->email }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                            @endif
                        </table>
                    </div>
                </div>

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