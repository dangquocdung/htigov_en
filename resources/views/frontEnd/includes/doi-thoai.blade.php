<style>
    .mainvideo {
        /* background: transparent url(aspximages/CSS-Background.jpg);
            background-repeat:repeat;
        background-color: #F4F4F6;*/
        width: 100%;
        display: inline-block;
        background-color: #111;
        background-image: -moz-linear-gradient(#111, #1a66a5);
        background-image: -webkit-gradient(linear, left top, left bottom, from(#111), to(#1a66a5));
        background-image: -webkit-linear-gradient(#111, #1a66a5);
        background-image: -o-linear-gradient(#111, #1a66a5);
        background-image: -ms-linear-gradient(#111, #1a66a5);
        background-image: linear-gradient(#111, #1a66a5);
        color: #ffffff;
    }


    .titleIntro {
        text-align: center;
        font-family: Arial;
        font-size: 20px;
        font-weight: bold;
        margin: 5px;
        color: #FF9900;
    }

    .introlink{

        color: #FF9900;
        text-decoration: none;

    }


</style>

<div class="mainvideo hidden-xs">

    <div class="doithoai">
        <div class="col-sm-5" style="padding-left: 0;">
            <img src="{{ Setting::get('doi-thoai') }}" width="100%" style="margin: 10px; border: 1px #CCCCCC solid">
        </div>
        <div class="col-sm-7">

            <div class="titleIntro" style="margin-top: 15px">
                <p>KÊNH ĐỐI THOẠI TRỰC TUYẾN</p>
            </div>

            <div class="" style="color: #ffffff; text-align: justify">

                <p>
                    Nhằm tăng cường hơn nữa việc tiếp nhận, trao đổi thông tin, Cổng thông tin điện tử tỉnh xây dựng và mở chuyên mục đối thoại trực tuyến. Mong rằng đây sẽ là một kênh thông tin hữu ích giúp các cơ quan nhà nước đến gần hơn với nhân dân, cộng đồng doanh nghiệp.
                </p>
                <p>
                    Quý vị quan tâm đến Đối thoại trực tuyến có thể tham gia và gửi câu hỏi trực tiếp bằng cách truy cập địa chỉ <a class="introlink" href="http://doithoai.hatinh.gov.vn">http://doithoai.hatinh.gov.vn</a> hoặc gửi thư điện tử về <a class="introlink" href="mailto:doithoai@hatinh.gov.vn">doithoai@hatinh.gov.vn</a>.
                </p>


            </div>

            <div class="pull-right">
                <p style="text-align: center">Trân trọng. </p>
                <p style="font-weight: bold">BAN BIÊN TẬP CỔNG TTĐT TỈNH HÀ TĨNH </p>
            </div>



        </div>
    </div>

</div>
