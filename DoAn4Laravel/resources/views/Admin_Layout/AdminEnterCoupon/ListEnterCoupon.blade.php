@extends('Page.MasterAdminEnterCoupon')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý phiếu nhập:</h4>
                <a href="{!!url('AddEnterCoupon')!!}"><input type="button" value="Thêm mới"></a>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Ngày nhập</th>
                            <th>Đơn giá nhập</th>
                            <th>Số lượng nhập</th>
                            <th>Tình trạng</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listEnterCoupon as $listEnterCoupon1)
                        <tr>
                            <th scope="row">{{$listEnterCoupon1->ID_PN}}</th>
                            <td>{{$listEnterCoupon1->TEN_NHA_CUNG_CAP}}</td>
                            <td>{{$listEnterCoupon1->NGAY_NHAP}}</td>
                            <td>{{number_format($listEnterCoupon1->DON_GIA_NHAP)}}</td>
                            <td>{{$listEnterCoupon1->SO_LUONG_NHAP}}</td>
                            <td>{{$listEnterCoupon1->TINH_TRANG}}</td>
                            <td>
                                <a href="{!!url('EditEnterCoupon',$listEnterCoupon1->ID_PN)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdateEnterCoupon',$listEnterCoupon1->ID_PN)!!}"><input type="button" value="Sửa"></a>
                                <a href="{{url('DeleteEnterCoupon',$listEnterCoupon1->ID_PN)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$listEnterCoupon->links()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection