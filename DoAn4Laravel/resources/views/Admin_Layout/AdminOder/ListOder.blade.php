@extends('Page.MasterAdminOder')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý đơn hàng:</h4>
                <h4 style="text-align: center;">Danh sách đơn đặt hàng</h4>
                <p style="color:red">Ghi chú:</p>
                <p>*Cột trả tiền: 0 tương ứng chưa trả tiền, 1 tương ứng đã trả tiền</p>
                <p>*Cột tình trạng: 0 tương ứng chưa giao hàng, 1 tương ứng đang đóng gói, 2 tương ứng đang giao hàng, 3 tương ứng đã giao hàng, 4 tương ứng đã bị hủy</p>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trả tiền</th>
                            <th>Tình trạng</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listoder as $listoder)
                        <tr>
                            <th scope="row">{{$listoder->ID_DDH}}</th>
                            <td>{{$listoder->TEN_KHACH_HANG}}</td>
                            <td>{{$listoder->NGAY_DAT}}</td>
                            <td>{{$listoder->TONG_TIEN}}</td>
                            <td>{{$listoder->TRA_TIEN}}</td>
                            <td>{{$listoder->TINH_TRANG}}</td>
                            <td>
                                <a href="{!!url('EditOder',$listoder->ID_DDH)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdateOder',$listoder->ID_DDH)!!}"><input type="button" value="Sửa"></a>
                                <a href="{!!url('DeleteOder',$listoder->ID_DDH)!!}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection