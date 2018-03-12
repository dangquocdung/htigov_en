    @yield('section-menu')
    
    <div class="block4">

        <div id="block-header-bd" class="block-header" style="margin-bottom: 0" data-toggle="collapse" href="#ban-do-dia-gioi">

            <h4>
                <img src="/images/background/lotus.ico" alt="" width="26px"> Bản đồ địa giới

                <i id="menu-bd" class="fa fa-chevron-down" style="position: absolute; top: 5px; right:12px;left: auto"></i>
            </h4>

        </div>

        <div id="ban-do-dia-gioi" class="panel-collapse collapse in">
            <a href="http://gis.chinhphu.vn/?r=ytZEOqw8fEiSQeRsfea4w" target="_blank">

                <img src="/images/ban-do.jpg" alt="Bản đồ Hà Tĩnh" title="Bản đồ Hà Tĩnh" width="100%">
            </a>
        </div>

        <script>

            $(document).ready(function () {
                $('#block-header-bd').click(function () {
                    $("#menu-bd").toggleClass('rotated')
                })
            })
        </script>

    </div>

    

    <div class="right_1">

        @include('frontEnd.includes.menu-right')

    </div>

   

    <div class="block4">

        <div class="block-header" style="margin-bottom: 0">
            <h4><img src="/images/background/lotus.ico" alt="" width="26px"> Liên kết</h4>
        </div>

        <div class="box-banner">
            <a href="http://hatinhtv.vn/" target="_blank">
                <img src="uploads/2017/11/5a1d7e767a920_thumb.jpg" alt="Đài Phát thanh và Truyền hình Hà Tĩnh" title="Đài Phát thanh và Truyền hình Hà Tĩnh" width="100%">
            </a>
        </div>
        <div class="box-banner">
            <a href="http://baohatinh.vn" target="_blank">
                <img src="uploads/2017/11/5a1d7eb6e0658_thumb.png" alt="Báo Hà Tĩnh" title="Báo Hà Tĩnh" width="100%">
            </a>
        </div>

    </div>

    <div class="block4">

        <div class="block-header" style="margin-bottom: 0">

            <h4><img src="/images/background/lotus.ico" alt="" width="26px"> Sự kiện</h4>

        </div>

        <div class="box-banner">
            <a href="http://festivalhoa.lamdong.gov.vn/" target="_blank">
                <img src="uploads/2017/11/59fc122d1ccc7.png" alt="Festival Hoa Đà Lạt" title="Festival Hoa Đà Lạt" width="100%">
            </a>
        </div>
        <div class="box-banner">
            <a href="http://www.vj-festival.com/" target="_blank">
                <img src="uploads/2017/11/59ffd9e74b8eb.png" alt="Lễ hội Việt - Nhật" title="Lễ hội Việt - Nhật" width="100%">
            </a>
        </div>

    </div>

    <div class="block4">

        <div class="block-header" style="margin-bottom: 0">

            <h4><img src="/images/background/lotus.ico" alt="" width="26px"> Doanh nghiệp</h4>

        </div>

        <div class="box-banner">
            <a href="https://shop.viettel.vn" target="_blank">
                <img src="uploads/2017/11/59ffcbea1c39a.png" alt="Viettel" title="Viettel" width="100%">
            </a>
        </div>
        <div class="box-banner">
            <a href="http://my.vinaphone.com.vn/Payment/Introduce4G?AspxAutoDetectCookieSupport=1" target="_blank">
                <img src="uploads/2017/11/5a0176dd2557c.jpg" alt="Vinaphone" title="Vinaphone" width="100%">
            </a>
        </div>
        <div class="box-banner">
            <a href="http://www.mobifone.vn/wps/portal/public" target="_blank">
                <img src="uploads/2017/11/5a0176dd21292.jpg" alt="Mobifone" title="Mobifone" width="100%">
            </a>
        </div>

    </div>
