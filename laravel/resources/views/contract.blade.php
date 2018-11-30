<!DOCTYPE html>
<html>

<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
    <style>
        .container {
            width: 100%;
            padding: 0px;
        }

        h2 {
            text-align: center;
        }

        p,
        h3 {
            text-align: left;
        }

        p {
            margin-left: 2%;
        }

        h3.sign {
            text-align: center;
        }

        .left {
            float: left;
            padding-left: 1%;
        }

        .right {
            float: right;
            padding-right: 5%;
        }

        div.sign-container {
            width: auto;
            position: relative;
            text-align: center;
        }

        img {
            width: 100px;
            height: 100px;
            background-color: #bbb;

        }
        .container-header{
            display: inline-block;
            width: 100%;
        }
        .header-right,.header-left{
            height:100px; 
            width:50%;
        }
        .header-left{
            float: left;
        }
        .header-right{
            float: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container-header">
            <div class="header-left">
                <p style="margin-left:0in; margin-right:0in; text-align:center">
                    <span style="font-size:16px">
                        <span style="font-family:Arial,sans-serif">CTYCP CÔNG NGHỆ MỚI </span>
                    </span>
                </p>

                <p style="margin-left:0in; margin-right:0in; text-align:center">
                    <span style="font-size:16px">
                        <span style="font-family:Arial,sans-serif">
                            <strong>NHẬT HẢI</strong>
                        </span>
                    </span>
                </p>

                <p style="margin-left:0in; margin-right:0in; text-align:center">&nbsp;</p>
            </div>
            <div class="header-right">
                <p style="margin-left:0in; margin-right:0in; text-align:center">
                    <span style="font-size:16px">
                        <span style="font-family:Arial,sans-serif">
                            <strong>CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong>
                        </span>
                    </span>
                </p>

                <p style="margin-left:0in; margin-right:0in; text-align:center">
                    <span style="font-size:16px">
                        <span style="font-family:Arial,sans-serif">
                            <strong>Độc lập - Tự do - Hạnh ph&uacute;c</strong>
                        </span>
                    </span>
                </p>
            </div>
        </div>
        <h2>-------------------------------</h2>
        <p style="margin-left:0in; margin-right:0in; text-align:center">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:16.0pt">
                            <span style="color:black">HỢP ĐỒNG CỘNG TÁC VIÊN</span>
                        </span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:center">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <em>
                        <span style="font-size:13.0pt">
                            <span style="color:black">(Số: {{$colla->contract_number}}/@if($colla->sign_picture != null){{\Carbon\Carbon::parse($colla->m_date)->format('Y')}}
                                @else {{date('Y')}}@endif/HĐCTV-OICNEW)</span>
                        </span>
                    </em>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">&nbsp;</p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:14pt">
                <em>
                    <span style="font-size:13.0pt">Hôm nay, ngày </span>
                </em>
                <em>
                    <span style="font-size:13.0pt">@if($colla->sign_picture != null){{\Carbon\Carbon::parse($colla->contract_sign_date)->format('d')}} @else {{date('d')}}@endif</span>
                </em>
                <em>
                    <span style="font-size:13.0pt">tháng</span>
                </em>
                <em> </em>
                <em>
                    <span style="font-size:13.0pt">@if($colla->sign_picture != null){{\Carbon\Carbon::parse($colla->contract_sign_date)->format('m')}} @else {{date('m')}}@endif</span>
                </em>
                <em>
                    <span style="font-size:13.0pt"> năm </span>
                </em>
                <em>
                    <span style="font-size:13.0pt">@if($colla->sign_picture != null){{\Carbon\Carbon::parse($colla->contract_sign_date)->format('Y')}} @else {{date('Y')}}@endif</span>
                </em>
                <em>
                    <span style="font-size:13.0pt">, chúng tôi gồm:</span>
                </em>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">BÊN A: </span>
                    </strong>
                    <strong>
                        <span style="font-size:13.0pt">CÔNG TY CỔ PHẦN CÔNG NGHỆ MỚI NHẬT HẢI (OICNEW)</span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Địa chỉ: Số 9 BT2, Bán đảo Linh Đàm, Phường Hoàng Liệt, Quận Hoàng Mai, Thành Phố Hà Nội, Việt Nam.</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">M&atilde; số thuế: </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Điện thoại: 024.2215.9001/024.3733.2122</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Fax: 024.3733.8787</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Đại diện: Lưu Hải Minh</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Chức vụ: Chủ tịch Hội đồng quản trị</span>
                </span>
            </span>
        </p>
        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">BÊN B: </span>
                    </strong>
                </span>
            </span>
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt"> {{$colla->name}}(CỘNG TÁC VIÊN)</span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Ngày sinh: {{$colla->birthday}} </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Số CMND: {{$colla->id_card_number}}</span>
                </span>

            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Ngày cấp: {{$colla->card_date_create}}</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Nơi cấp: {{$colla->card_area_create}}</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Địa chỉ thường trú: {{$colla->address}}</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Điện thoại: {{$colla->tel}}</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Email: {{$colla->email}}</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:VNI-Times">
                    <span style="font-size:13.0pt">Số tài khoản: {{$colla->acount_number}}</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:VNI-Times">
                    <span style="font-size:13.0pt">Ngân hàng: {{$colla->name_bank}}</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:VNI-Times">
                    <em>
                        <span style="font-size:13.0pt">Hai b&ecirc;n thỏa thuận, thống nhất k&yacute; kết Hợp đồng Cộng t&aacute;c vi&ecirc;n với c&aacute;c
                            điều khoản sau đ&acirc;y:</span>
                    </em>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 1: Nội dung công việc </span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">B&ecirc;n B nhận l&agrave;m Cộng t&aacute;c vi&ecirc;n ph&aacute;t triển kh&aacute;ch h&agrave;ng của
                        B&ecirc;n A để thực hiện c&aacute;c c&ocirc;ng việc sau:</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">- T&igrave;m kiếm, ph&aacute;t triển hệ thống kh&aacute;ch h&agrave;ng cho B&ecirc;n A;</span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">- Tư vấn, giới thiệu c&aacute;c sản phẩm, dịch vụ của B&ecirc;n A đến cho kh&aacute;ch h&agrave;ng;</span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">- Hướng dẫn kh&aacute;ch h&agrave;ng đặt mua, thanh to&aacute;n c&aacute;c sản phẩm, dịch vụ tr&ecirc;n
                            hệ thống của B&ecirc;n A.</span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 2</span>
                    </strong>
                    <strong>
                        <span style="font-size:13.0pt">:</span>
                    </strong>
                    <strong> </strong>
                    <strong>
                        <span style="font-size:13.0pt">Chế độ </span>
                    </strong>
                    <strong>
                        <span style="font-size:13.0pt">l&agrave;m việc</span>
                    </strong>
                </span>
            </span>
        </p>

        <ul>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <strong>
                                <em>
                                    <span style="font-size:13.0pt">Thời gian l&agrave;m việc:</span>
                                </em>
                            </strong>
                            <span style="font-size:13.0pt"> B&ecirc;n B chủ động sắp xếp thời gian l&agrave;m việc trong ng&agrave;y. </span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <strong>
                                <em>
                                    <span style="font-size:13.0pt">Địa điểm l&agrave;m việc:</span>
                                </em>
                            </strong>
                            <span style="font-size:13.0pt"> B&ecirc;n B chủ động sắp xếp địa điểm để đảm bảo chất lượng c&ocirc;ng việc thực hiện. </span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <strong>
                                <em>
                                    <span style="font-size:13.0pt">Thiết bị, </span>
                                </em>
                            </strong>
                            <strong>
                                <em>
                                    <span style="font-size:13.0pt">dụng cụ l&agrave;m việc:</span>
                                </em>
                            </strong>
                            <span style="font-size:13.0pt"> được cấp ph&aacute;t theo quy định của C&ocirc;ng ty v&agrave; phải ho&agrave;n trả khi chấm
                                dứt hợp đồng cộng t&aacute;c vi&ecirc;n.</span>
                        </span>
                    </span>
                </span>
            </li>
        </ul>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 3: Gi&aacute; b&aacute;n sản phẩm, dịch vụ</span>
                    </strong>
                </span>
            </span>
        </p>

        <ul>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Gi&aacute; b&aacute;n từng loại sản phẩm, dịch vụ &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                l&agrave; gi&aacute; do B&ecirc;n A quy định cho kh&aacute;ch h&agrave;ng mua sản phẩm, dịch
                                vụ th&ocirc;ng qua Ứng dụng v&agrave; được ni&ecirc;m yết c&ocirc;ng khai tr&ecirc;n website
                                tại từng thời điểm. Trường hợp c&oacute; thay đổi, B&ecirc;n A sẽ cập nhật th&ocirc;ng tin
                                tr&ecirc;n Ứng dụng v&agrave; website của c&ocirc;ng ty.</span>
                        </span>
                    </span>
                </span>
            </li>
        </ul>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 4: Th&ugrave; lao của cộng t&aacute;c vi&ecirc;n</span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">1. Mức th&ugrave; lao</span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">Th&ugrave; lao cộng t&aacute;c vi&ecirc;n chỉ được t&iacute;nh cho c&aacute;c đơn h&agrave;ng ho&agrave;n
                        tất. Mức th&ugrave; lao được x&aacute;c định căn cứ v&agrave;o số lượng sản phẩm b&aacute;n ra t&iacute;nh
                        trong 01 th&aacute;ng.</span>
                    <span style="font-size:13.0pt">Cụ thể:</span>
                </span>
            </span>
        </p>

        <table border="1" cellspacing="0" class="Table" style="border-collapse:collapse; border:solid windowtext 1.0pt">
            <tbody>
                <tr>
                    <td style="vertical-align:top; width:33.95pt">
                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <strong>
                                        <span style="font-size:13.0pt">STT</span>
                                    </strong>
                                </span>
                            </span>
                        </p>
                    </td>
                    <td style="vertical-align:top; width:127.4pt">
                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <strong>
                                        <span style="font-size:13.0pt">Sản phẩm</span>
                                    </strong>
                                </span>
                            </span>
                        </p>
                    </td>
                    <td style="vertical-align:top; width:204.35pt">
                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <strong>
                                        <span style="font-size:13.0pt">Th&ocirc;ng tin sản phẩm</span>
                                    </strong>
                                </span>
                            </span>
                        </p>
                    </td>
                    <td style="vertical-align:top; width:115.35pt">
                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <strong>
                                        <span style="font-size:13.0pt">Mức th&ugrave; lao(vnđ)/ sản phẩm</span>
                                    </strong>
                                </span>
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top; width:33.95pt">
                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">1</span>
                                </span>
                            </span>
                        </p>
                    </td>
                    <td style="vertical-align:top; width:127.4pt">
                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">Thực phẩm bảo vệ sức khỏe dung dịch Nano Curcumin</span>
                                </span>
                            </span>
                        </p>

                        <p style="margin-left:0in; margin-right:0in; text-align:justify">&nbsp;</p>
                    </td>
                    <td style="vertical-align:top; width:204.35pt">
                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">-</span>
                                    <span style="font-size:13.0pt"> Quy c&aacute;ch đ&oacute;ng lọ</span>
                                </span>
                            </span>
                        </p>

                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">Lọ 50ml d&aacute;n tem m&aacute;c, đ&oacute;ng trong hộp b&igrave;a.</span>
                                </span>
                            </span>
                        </p>

                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">- Sản phẩm đăng k&yacute; chất lượng số: </span>
                                </span>
                            </span>
                        </p>

                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">33673/2016/ATTP-XNCB</span>
                                </span>
                            </span>
                        </p>

                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">- Theo bằng s&aacute;ng chế số 16095 cấp ng&agrave;y 13/10/2016</span>
                                </span>
                            </span>
                        </p>

                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">- Chứng nhận Doanh nghiệp Khoa học C&ocirc;ng nghệ số 33.2/DNKHCN</span>
                                </span>
                            </span>
                        </p>
                    </td>
                    <td style="vertical-align:top; width:115.35pt">
                        <p style="margin-left:0in; margin-right:0in; text-align:justify">
                            <span style="font-size:11pt">
                                <span style="font-family:Arial,sans-serif">
                                    <span style="font-size:13.0pt">@if( isset($commission->value) && $commission->value != null) {{number_format($commission->value, 0, ',', '.')}} @else 200.000 @endif  </span>
                                </span>
                            </span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">&nbsp;</p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">2. Phương thức thanh to&aacute;n </span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">B&ecirc;n A sẽ thanh to&aacute;n 01 lần/</span>
                        <span style="font-size:13.0pt">th&aacute;ng</span>
                        <span style="font-size:13.0pt"> cho B&ecirc;n B </span>
                        <span style="font-size:13.0pt">trong thời gian </span>
                        <span style="font-size:13.0pt">từ ng&agrave;y 10 đến ng&agrave;y 15 của th&aacute;ng kế tiếp.</span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">3. </span>
                        <span style="font-size:13.0pt">H&igrave;nh thức thanh to&aacute;n: chuyển khoản, bằng đồng Việt Nam (VNĐ).</span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">4. Thay đổi mức th&ugrave; lao: Trong qu&aacute; tr&igrave;nh thực hiện Hợp đồng, B&ecirc;n A c&oacute;
                            quyền thay đổi ch&iacute;nh s&aacute;ch th&ugrave; lao v&agrave; đăng tải mức th&ugrave; lao
                            mới c&ugrave;ng thời gian &aacute;p dụng tr&ecirc;n hệ thống Ứng dụng v&agrave; website của c&ocirc;ng
                            ty.
                        </span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 5: Quyền v&agrave; nghĩa vụ của B&ecirc;n A</span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">1. Quyền của B&ecirc;n A</span>
                </span>
            </span>
        </p>

        <ul>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Q</span>
                        <span style="font-size:13.0pt">uyền quản l&yacute;</span>
                        <span style="font-size:13.0pt">, điều h&agrave;nh, kiểm tra v&agrave; </span>
                        <span style="font-size:13.0pt">gi&aacute;m s&aacute;t việc </span>
                        <span style="font-size:13.0pt">thực hiện hợp đồng</span>
                        <span style="font-size:13.0pt"> của b&ecirc;n A theo quy định </span>
                        <span style="font-size:13.0pt">của hợp đồng v&agrave; ph&aacute;p luật</span>
                        <span style="font-size:13.0pt">.</span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Cung cấp hoặc dừng cung cấp c&aacute;c sản phẩm, dịch vụ theo chiến lược kinh doanh của B&ecirc;n
                                A.
                            </span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">
                                <span style="background-color:white">Quyết định gi&aacute; b&aacute;n sản phẩm, dịch vụ, mức th&ugrave; lao cộng t&aacute;c vi&ecirc;n
                                    theo từng thời điểm.&nbsp;</span>
                            </span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Y&ecirc;u cầu B&ecirc;n B tu&acirc;n thủ c&aacute;c quy định, quy tr&igrave;nh do B&ecirc;n A
                                ban h&agrave;nh li&ecirc;n quan đến hoạt động của cộng t&aacute;c vi&ecirc;n v&agrave; hoạt
                                động b&aacute;n sản phẩm, dịch vụ.</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Được thu hồi to&agrave;n bộ sản phẩm, trang thiết bị, ấn phẩm,... đ&atilde; cung cấp cho B&ecirc;n
                                B trong qu&aacute; tr&igrave;nh thực hiện Hợp đồng (nếu c&oacute;).</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Kh&ocirc;ng chịu tr&aacute;ch nhiệm về c&aacute;c tranh chấp, hậu quả do B&ecirc;n B g&acirc;y
                                ra với kh&aacute;ch h&agrave;ng hoặc B&ecirc;n thứ ba trong qu&aacute; tr&igrave;nh B&ecirc;n
                                B thực hiện Hợp đồng n&agrave;y.</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Được quyền tạm ngưng c&aacute;c t&agrave;i khoản truy cập của B&ecirc;n </span>
                        <span style="font-size:13.0pt">B</span>
                        <span style="font-size:13.0pt"> hoặc </span>
                        <span style="font-size:13.0pt">đơn phương </span>
                        <span style="font-size:13.0pt">chấm dứt hợp đồng </span>
                        <span style="font-size:13.0pt">đối với B</span>
                        <span style="font-size:13.0pt">&ecirc;n </span>
                        <span style="font-size:13.0pt">B</span>
                        <span style="font-size:13.0pt"> trong trường hợp b&ecirc;n </span>
                        <span style="font-size:13.0pt">B</span>
                        <span style="font-size:13.0pt"> kh&ocirc;ng thực hiện đ&uacute;ng những </span>
                        <span style="font-size:13.0pt">quy định</span>
                        <span style="font-size:13.0pt"> trong hợp đồng n&agrave;y v&agrave; quy định của ph&aacute;p luật.</span>
                    </span>
                </span>
            </li>
        </ul>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">2. Nghĩa vụ của B&ecirc;n A</span>
                </span>
            </span>
        </p>

        <ul>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Hướng dẫn v&agrave; đ&agrave;o tạo cho b&ecirc;n </span>
                        <span style="font-size:13.0pt">B</span>
                        <span style="font-size:13.0pt">về hoạt động ph&aacute;t triển kh&aacute;ch h&agrave;ng</span>
                        <span style="font-size:13.0pt"> v&agrave; th&ocirc;ng b&aacute;o kịp thời cho b&ecirc;n </span>
                        <span style="font-size:13.0pt">B</span>
                        <span style="font-size:13.0pt"> mỗi khi c&oacute; thay đổi ch&iacute;nh s&aacute;ch</span>
                        <span style="font-size:13.0pt"> của c&ocirc;ng ty</span>
                        <span style="font-size:13.0pt">.</span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Cung cấp v&agrave; đảm bảo chất lượng c&aacute;c h&agrave;ng h&oacute;a do c&ocirc;ng ty sản xuất.</span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Cung cấp đầy đủ c&aacute;c ấn phẩm, t&agrave;i liệu, văn bản, quy tr&igrave;nh, quy định nghiệp
                                vụ c&oacute; li&ecirc;n quan (nếu c&oacute;) để tạo điều kiện cho B&ecirc;n B thực hiện c&ocirc;ng
                                việc.
                            </span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Thanh to&aacute;n đầy đủ th&ugrave; lao, đ&uacute;ng thời hạn c&aacute;c chế độ v&agrave; quyền lợi
                            kh&aacute;c (nếu c&oacute;) cho cộng t&aacute;c vi&ecirc;n theo đ&uacute;ng quy định trong hợp
                            đồng n&agrave;y v&agrave; quy định của C&ocirc;ng ty.</span>
                    </span>
                </span>
            </li>
        </ul>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 6: Quyền v&agrave; nghĩa vụ của B&ecirc;n B</span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">1. Quyền của B&ecirc;n B</span>
                </span>
            </span>
        </p>

        <ul>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Được thanh to&aacute;n th&ugrave; lao theo đ&uacute;ng mức th&ugrave; lao v&agrave; thời hạn thanh
                            to&aacute;n theo đ&uacute;ng thỏa thuận của hợp đồng n&agrave;y v&agrave; quy định của c&ocirc;ng
                            ty.
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Được b</span>
                        <span style="font-size:13.0pt">ảo đảm </span>
                        <span style="font-size:13.0pt">c&aacute;c chế độ, điều kiện, phương tiện</span>
                        <span style="font-size:13.0pt"> l&agrave;m việc </span>
                        <span style="font-size:13.0pt">đ&atilde; thỏa thuận</span>
                        <span style="font-size:13.0pt">theo </span>
                        <span style="font-size:13.0pt">những quy định trong hợp đồng </span>
                        <span style="font-size:13.0pt">n&agrave;y v&agrave; theo quy định của c&ocirc;ng ty</span>
                        <span style="font-size:13.0pt">.</span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Được hướng dẫn, đ&agrave;o tạo về quy tr&igrave;nh nghiệp vụ, th&ocirc;ng tin sản phẩm phục vụ cho
                            việc thực hiện c&ocirc;ng việc.</span>
                    </span>
                </span>
            </li>
        </ul>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <span style="font-size:13.0pt">2. Nghĩa vụ của B&ecirc;n B</span>
                </span>
            </span>
        </p>

        <ul>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">
                            <span style="background-color:white">Thực hiện việc t&igrave;m kiếm kh&aacute;ch h&agrave;ng, tư vấn, chăm s&oacute;c, giới thiệu
                                sản phẩm, dịch vụ v&agrave; c&aacute;c hoạt động kh&aacute;c trung thực, r&otilde; r&agrave;ng,
                                minh bạch v&agrave; theo đ&uacute;ng c&aacute;c quy định của B&ecirc;n A.</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Phải tu&acirc;n thủ nghi&ecirc;m ngặt c&aacute;c hướng dẫn, quy tr&igrave;nh, nghiệp vụ v&agrave;
                            th&ocirc;ng tin sản phẩm theo đ&uacute;ng quy định của c&ocirc;ng ty khi thực hiện c&ocirc;ng
                            việc.
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Đảm bảo th&aacute;i độ l&agrave;m việc t&iacute;ch cực, đ&uacute;ng quy định, giao tiếp lịch
                                sự, kh&ocirc;ng l&agrave;m tổn hại đến uy t&iacute;n, h&igrave;nh ảnh v&agrave; sản phẩm,
                                dịch vụ của B&ecirc;n A.</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Phải bảo quản </span>
                        <span style="font-size:13.0pt">c&aacute;c </span>
                        <span style="font-size:13.0pt">thiết bị</span>
                        <span style="font-size:13.0pt">, dụng cụ</span>
                        <span style="font-size:13.0pt"> v&agrave; sản phẩm</span>
                        <span style="font-size:13.0pt"> được C&ocirc;ng ty cấp ph&aacute;t trong qu&aacute; tr&igrave;nh thực hiện </span>
                        <span style="font-size:13.0pt">c&ocirc;ng việc v&agrave; bồi thường thiệt hại khi l&agrave;m mất m&aacute;t, hư hỏng.</span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">K</span>
                        <span style="font-size:13.0pt">h&ocirc;ng được tiết lộ c&aacute;c th&ocirc;ng tin bảo mật của C&ocirc;ng ty, li&ecirc;n quan đ&ecirc;́n
                            hoạt đ&ocirc;̣ng quản lý, kinh doanh, k&ecirc;́ hoạch, lịch trình, tài chính k&ecirc;́
                            toán, c&ocirc;ng ngh&ecirc;̣, khách hàng, nh&acirc;n sự,&hellip; cho b&acirc;́t kỳ m&ocirc;̣t
                            b&ecirc;n thứ ba nào khác khi kh&ocirc;ng được sự đồng &yacute; bằng văn bản của b&ecirc;n
                            A.
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Trường hợp B&ecirc;n B vi phạm Hợp đồng, tư vấn sai, g&acirc;y thiệt hại cho kh&aacute;ch h&agrave;ng/b&ecirc;n
                                thứ ba kh&aacute;c, B&ecirc;n B c&oacute; tr&aacute;ch nhiệm: (i) bồi thường thiệt hại cho
                                B&ecirc;n A, (ii) nộp cho B&ecirc;n A một khoản tiền phạt vi phạm tương ứng 200% tổng mức
                                th&ugrave; lao B&ecirc;n B nhận được của 03 th&aacute;ng trước đ&oacute;.</span>
                        </span>
                    </span>
                </span>
            </li>
        </ul>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 7:</span>
                    </strong>
                    <strong>
                        <span style="font-size:13.0pt">Bảo mật th&ocirc;ng tin</span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:12pt">
                <span style="background-color:white">
                    <span style="font-size:13.0pt">Trừ trường hợp sử dụng cho mục đ&iacute;ch thực hiện Hợp đồng n&agrave;y, c&aacute;c b&ecirc;n cam kết
                        giữ b&iacute; mật tất cả c&aacute;c th&ocirc;ng tin li&ecirc;n quan đến nội dung của Hợp đồng như
                        c&aacute;c thỏa thuận, cam kết giữa c&aacute;c b&ecirc;n, th&ocirc;ng tin kh&aacute;ch h&agrave;ng,...
                        v&agrave; c&aacute;c th&ocirc;ng tin kh&aacute;c c&oacute; li&ecirc;n quan m&agrave; c&aacute;c b&ecirc;n
                        được biết trong qu&aacute; tr&igrave;nh l&agrave;m việc giữa c&aacute;c b&ecirc;n. C&aacute;c b&ecirc;n
                        kh&ocirc;ng được tiết lộ hoặc để lộ th&ocirc;ng tin tr&ecirc;n cho bất kỳ b&ecirc;n thứ ba n&agrave;o
                        kh&aacute;c trừ trường hợp b&ecirc;n c&ograve;n lại đồng &yacute; bằng văn bản hoặc theo quy định
                        của ph&aacute;p luật. C&aacute;c b&ecirc;n chịu sự r&agrave;ng buộc về nghĩa vụ bảo mật th&ocirc;ng
                        tin
                        <span style="background-color:white">kh&ocirc;ng giới hạn về kh&ocirc;ng gian, thời gian (kể cả khi đ&atilde; chấm dứt hợp đồng) v&agrave;
                            phải chịu tr&aacute;ch nhiệm ph&aacute;p l&yacute; khi c&oacute; h&agrave;nh vi vi phạm.</span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:12pt">
                <span style="background-color:white">
                    <strong>
                        <span style="font-size:13.0pt">Điều 8: Chấm dứt hợp đồng </span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Hợp đồng n&agrave;y chấm dứt trong c&aacute;c trường hợp sau:</span>
                    </span>
                </span>
            </span>
        </p>

        <ul>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Hết hạn hợp đồng m&agrave; c&aacute;c b&ecirc;n kh&ocirc;ng tiếp tục gia hạn hợp đồng;</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">C&aacute;c b&ecirc;n thỏa thuận chấm dứt Hợp đồng;</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">Do xảy ra c&aacute;c trường hợp bất khả kh&aacute;ng;</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">B&ecirc;n A th&ocirc;ng b&aacute;o chấm dứt Hợp đồng khi B&ecirc;n B thuộc một trong c&aacute;c
                                trường hợp: (i) vi phạm c&aacute;c quy định trong Hợp đồng n&agrave;y; &nbsp;(ii) vi phạm
                                quy định của ph&aacute;p luật; hoặc (iii) c&aacute;c trường hợp kh&aacute;c theo quy định
                                của ph&aacute;p luật.</span>
                        </span>
                    </span>
                </span>
            </li>
        </ul>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 9: Giải quyết tranh chấp</span>
                    </strong>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="background-color:white">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Mọi tranh chấp ph&aacute;t sinh từ hoặc c&oacute; li&ecirc;n quan đến Hợp đồng n&agrave;y sẽ được
                            hai b&ecirc;n ưu ti&ecirc;n giải quyết bằng thương lượng trong thời gian 30 ng&agrave;y kể từ
                            ng&agrave;y ph&aacute;t sinh tranh chấp tr&ecirc;n tinh thần thiện ch&iacute;. Trường hợp c&aacute;c
                            b&ecirc;n kh&ocirc;ng thể giải quyết được bằng thương lượng, mọi tranh chấp sẽ được giải quyết
                            bởi T&ograve;a &aacute;n c&oacute; thẩm quyền. Mọi chi ph&iacute; ph&aacute;t sinh trong qu&aacute;
                            tr&igrave;nh giải quyết tranh chấp sẽ do B&ecirc;n thua kiện trả theo ph&aacute;n quyết của T&ograve;a
                            &aacute;n.
                        </span>
                    </span>
                </span>
            </span>
        </p>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">
            <span style="font-size:11pt">
                <span style="font-family:Arial,sans-serif">
                    <strong>
                        <span style="font-size:13.0pt">Điều 10: </span>
                    </strong>
                    <strong>
                        <span style="font-size:13.0pt">Điều khoản thi h&agrave;nh</span>
                    </strong>
                </span>
            </span>
        </p>

        <ul>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="background-color:white">
                        <span style="font-family:Arial,sans-serif">
                            <span style="font-size:13.0pt">C&aacute;c b&ecirc;n cam kết tu&acirc;n thủ đầy đủ c&aacute;c điều khoản v&agrave; điều kiện
                                đ&atilde; thỏa thuận tại Hợp đồng n&agrave;y với tinh thần thiện ch&iacute;, trung thực v&agrave;
                                tạo điều kiện thuận lợi cho nhau trong qu&aacute; tr&igrave;nh thực hiện.</span>
                        </span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Hợp đồng </span>
                        <span style="font-size:13.0pt">n&agrave;y </span>
                        <span style="font-size:13.0pt">c&oacute; hiệu lực kể từ ng&agrave;y k&yacute;</span>
                        <span style="font-size:13.0pt">. </span>
                        <span style="font-size:13.0pt">Thời hạn hợp đồng l&agrave; ... th&aacute;ng kể từ ng&agrave;y &hellip;/&hellip;/...</span>
                        <span style="font-size:13.0pt">đến ng&agrave;y </span>
                        <span style="font-size:13.0pt">..</span>
                        <span style="font-size:13.0pt">./&hellip;/...</span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:12pt">
                    <span style="background-color:white">
                        <span style="font-size:13.0pt">Hai b&ecirc;n c&oacute; thể gia hạn hợp đồng theo nhu cầu thực tế c&ocirc;ng việc ph&aacute;t sinh.</span>
                    </span>
                </span>
            </li>
            <li style="text-align:justify">
                <span style="font-size:11pt">
                    <span style="font-family:Arial,sans-serif">
                        <span style="font-size:13.0pt">Hợp đồng c&oacute; 05 (năm) trang gồm 10 (mười) điều. </span>
                        <span style="font-size:13.0pt">Hợp đồng n&agrave;y được lập th&agrave;nh 02 </span>
                        <span style="font-size:13.0pt">(hai) </span>
                        <span style="font-size:13.0pt">bản, c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như nhau, mỗi b&ecirc;n giữ 01</span>
                        <span style="font-size:13.0pt">
                            (một)</span>
                        <span style="font-size:13.0pt"> bản để </span>
                        <span style="font-size:13.0pt">l&agrave;m căn cứ </span>
                        <span style="font-size:13.0pt">thực hiện. .</span>
                    </span>
                </span>
            </li>
        </ul>

        <p style="margin-left:0in; margin-right:0in; text-align:justify">&nbsp;</p>

        <p style="margin-left:0in; margin-right:0in">&nbsp;</p>

        <p style="margin-left:0in; margin-right:0in">&nbsp;</p>

        <p style="margin-left:0in; margin-right:0in">&nbsp;</p>



        <div class="sign-container">
            <div class="left">
                <h3 class="sign">ĐẠI DIỆN BÊN A</h3>
                <h3 class="sign">(Ký, họ tên)</h3>
                <img src="{{$asignAdmin->value}}" @if($asignAdmin->value == null) hidden @endif/>
            </div>
            <div class="right">
                <h3 class="sign">ĐẠI DIỆN BÊN B</h3>
                <h3 class="sign">(Ký, họ tên)</h3>
                @if($colla->sign_picture != null)
                <img src="{{$colla->sign_picture}}" /> @endif
            </div>
        </div>
    </div>
</body>

</html>