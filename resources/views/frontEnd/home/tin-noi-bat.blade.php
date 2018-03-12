<div class="block3">

    <div class="portlet-header">
        <img src="/images/background/lotus.ico">
        <a href="javascript:void (0);">
            <h4 class="portlet-header-title no-pd-top">Tin Nổi bật: </h4>

        </a>
    </div>

    <div id="tinNoiBatChinh" class="col-md-7 col-xs-12">

        <div class="hot-news" style="margin-bottom: 0px;">

            <a href="http://demo.hatinh.gov.vn/vi/tin-tuc-su-kien/tin-trong-tinh/tin-tuc/1021-tap-trung-tai-co-cau-san-xuat-kinh-doanh-gan-voi-bao-ve-moi-truong.hti" class="hot-news-thumb-nail">
                <img src="http://baohatinh.vn/media/175/news/1804/77d1123526t3049l3.jpg" alt="Tập trung tái cơ cấu, sản xuất kinh doanh gắn với bảo vệ môi trường" class="w3-animate-left" width="100%">
            </a>

            <div class="hot-news-title" style="display: block; text-align: center">
                <h3>
                    <a href="http://demo.hatinh.gov.vn/vi/tin-tuc-su-kien/tin-trong-tinh/tin-tuc/1021-tap-trung-tai-co-cau-san-xuat-kinh-doanh-gan-voi-bao-ve-moi-truong.hti">Tập trung tái cơ cấu, sản xuất kinh doanh gắn với bảo vệ môi trường</a>
                </h3>
            </div>
            <div class="hot-news-desc" style="text-align: justify; line-height: 20px; padding-bottom: 15px; display:none">(Baohatinh.vn) - Đó là một trong những yêu cầu của Phó Chủ tịch HĐND tỉnh Nguyễn Thị Nữ Y tại hội nghị triển khai nhiệm vụ năm 2018 của Đảng ủy khối Doanh nghiệp Hà Tĩnh được tổ chức vào sáng nay (22/1).</div>
        </div>
    </div>

    <div class="col-md-5 col-xs-12">
        <div class="btn-pref-tnb btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
                    <i class="fa fa-bars"></i>  <span class="hidden-xs">Nổi bật </span>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
                    <i class="fa fa-users"></i>&nbsp; <span class="hidden-xs">Đọc nhiều </span>
                </button>
            </div>
        </div>

        <div>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div id="tin-noi-bat">
                        <ul>

                            @foreach($HomeTopics as $key=>$HomeTopic)

                                <li class="">
                                    <div class="hot-news-block">

                                        <a href="" class="news-title">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            {{ $HomeTopic->$link_title_var}}
                                        </a>

                                        <img src="http://i.baohatinh.vn/news/1804/77d1141441t2084l2.jpg" alt="Dựa vào dân, vận động quần chúng nhân dân bảo vệ an ninh Tổ quốc" title="Dựa vào dân, vận động quần chúng nhân dân bảo vệ an ninh Tổ quốc" style="display: none;">

                                        <div class="item-desc" style="display: none;">Sáng 22/1, Công an tỉnh Hà Tĩnh tổ chức hội nghị triển khai nhiệm vụ 2018. Bí thư Tỉnh ủy Lê Đình Sơn, Phó Chủ tịch UBND tỉnh Đặng Quốc Vinh, Phó Chủ tịch HĐND tỉnh Võ Hồng Hải cùng tham dự.</div>

                                    </div>
                                </li>
                            @endforeach
                            
                        </ul>
                        <div class="xem-tiep" style="float:right; padding-bottom: 8px;">
                            <a href="/vi/tin-noi-bat" style="text-decoration: none;"><em>Xem tiếp... <i class="fa fa-angle-double-right" aria-hidden="true"></i></em></a>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade in" id="tab2">
                        <div id="tin-noi-bat">
                            <ul>
    
                                @foreach($LatestNews as $key=>$HomeTopic)
    
                                    <li class="">
                                        <div class="hot-news-block">
    
                                            <a href="" class="news-title">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                                {{ $HomeTopic->$link_title_var}}
                                            </a>
    
                                            <img src="http://i.baohatinh.vn/news/1804/77d1141441t2084l2.jpg" alt="Dựa vào dân, vận động quần chúng nhân dân bảo vệ an ninh Tổ quốc" title="Dựa vào dân, vận động quần chúng nhân dân bảo vệ an ninh Tổ quốc" style="display: none;">
    
                                            <div class="item-desc" style="display: none;">Sáng 22/1, Công an tỉnh Hà Tĩnh tổ chức hội nghị triển khai nhiệm vụ 2018. Bí thư Tỉnh ủy Lê Đình Sơn, Phó Chủ tịch UBND tỉnh Đặng Quốc Vinh, Phó Chủ tịch HĐND tỉnh Võ Hồng Hải cùng tham dự.</div>
    
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                            <div class="xem-tiep" style="float:right; padding-bottom: 8px;">
                                <a href="/vi/tin-noi-bat" style="text-decoration: none;"><em>Xem tiếp... <i class="fa fa-angle-double-right" aria-hidden="true"></i></em></a>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $(".btn-pref-tnb .btn").click(function () {

                    $(".btn-pref-tnb .btn").removeClass("btn-primary").addClass("btn-default");

                    // $(".tab").addClass("active"); // instead of this do the below

                    $(this).removeClass("btn-default").addClass("btn-primary");

                });
            });
        </script>        </div>

</div>