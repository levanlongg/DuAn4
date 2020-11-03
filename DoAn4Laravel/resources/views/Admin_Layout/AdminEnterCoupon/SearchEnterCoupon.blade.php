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
                        @foreach($searchEnterCoupon as $searchEnterCoupon1)
                        <tr>
                            <th scope="row">{{$searchEnterCoupon1->ID_PN}}</th>
                            <td>{{$searchEnterCoupon1->TEN_NHA_CUNG_CAP}}</td>
                            <td>{{$searchEnterCoupon1->NGAY_NHAP}}</td>
                            <td>{{number_format($searchEnterCoupon1->DON_GIA_NHAP)}}</td>
                            <td>{{$searchEnterCoupon1->SO_LUONG_NHAP}}</td>
                            <td>{{$searchEnterCoupon1->TINH_TRANG}}</td>
                            <td>
                                <a href="{!!url('EditEnterCoupon',$searchEnterCoupon1->ID_PN)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdateEnterCoupon',$searchEnterCoupon1->ID_PN)!!}"><input type="button" value="Sửa"></a>
                                <a href="{{url('DeleteEnterCoupon',$searchEnterCoupon1->ID_PN)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$searchEnterCoupon->links()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection