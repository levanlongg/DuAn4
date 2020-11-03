@extends('Page.MasterAdminOder')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý đơn hàng:</h4>
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <h4 style="text-align: center;">Xem đơn hàng</h4>
                    <tbody>
                        <h4>Thông tin giao hàng</h4>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                        </tr>
                        <tr>
                            <td>{{$editoder->TEN_KHACH_HANG}}</td>
                            <td>{{$editoder->DIA_CHI}}</td>
                            <td>{{$editoder->EMAIL}}</td>
                            <td>{{$editoder->SO_DIEN_THOAI}}</td>
                        </tr>
                    </tbody>
                </table>
                <br />
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <tbody>
                        <h4>Thông tin đơn hàng</h4>
                        <p style="color:red">Ghi chú:</p>
                        <p>*Cột trả tiền: 0 tương ứng chưa trả tiền, 1 tương ứng đã trả tiền</p>
                        <p>*Cột tình trạng: 0 tương ứng chưa giao hàng, 1 tương ứng đang đóng gói, 2 tương ứng đang giao hàng, 3 tương ứng đã giao hàng</p>
                        <tr>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trả tiền</th>
                            <th>Tình trạng</th>
                        </tr>
                        <tr>
                            <td>{{$editoder->NGAY_DAT}}</td>
                            <td style="color:red">{{number_format($editoder->TONG_TIEN)}}</td>
                            <td>{{$editoder->TRA_TIEN}}</td>
                            <td>{{$editoder->TINH_TRANG}}</td>
                        </tr>
                    </tbody>
                </table>
                <br />
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <tbody>
                        <h4>Thông tin chi tiết đơn hàng</h4>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                        </tr>
                        @foreach($editoder1 as $editoder1)
                        <tr>
                            <td>{{$editoder1->TEN_SAN_PHAM}}</td>
                            <td><img src="../image_sp/{{$editoder1->HINH_ANH_1}}" alt="{{$editoder1->TEN_SAN_PHAM}}" style="width:40px; height:40px" !important></td>
                            <td>{{$editoder1->SO_LUONG}}</td>
                            <td>{{number_format($editoder1->GIA_BAN)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{!!url('UpdateOder',$editoder->ID_DDH)!!}"><input type="button" class="btn btn-success" value="Sửa"></a>
                <a href="{!!url('ListOder')!!}"><input type="button" class="btn btn-success" value="DS DDH"></a>
            </div>
        </div>
    </div>
</div>
@endsection