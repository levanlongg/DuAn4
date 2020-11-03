@extends('Page.MasterAdminEnterCoupon')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý phiếu nhập:</h4>
                <h4 style="text-align: center;">Xem phiếu nhập</h4>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <tbody>
                        @foreach($editEnterCoupon as $editEnterCoupon)
                        <tr>
                            <th style="width:20%">ID phiếu nhập</th>
                            <td>{{$editEnterCoupon->ID_PN}}</td>
                        </tr>
                        <tr>
                            <th>Tên nhà cung cấp</th>
                            <td>{{$editEnterCoupon->TEN_NHA_CUNG_CAP}}</td>
                        </tr>
                        <tr>
                            <th>Ngày nhập</th>
                            <td>{{$editEnterCoupon->NGAY_NHAP}}</td>
                        </tr>
                        <tr>
                            <th>Đơn giá nhập</th>
                            <td>{{number_format($editEnterCoupon->DON_GIA_NHAP)}}</td>
                        </tr>
                        <tr>
                            <th>Số lượng nhập</th>
                            <td>{{$editEnterCoupon->SO_LUONG_NHAP}}</td>
                        </tr>
                        <tr>
                            <th>Tình trạng</th>
                            <td>{{$editEnterCoupon->TINH_TRANG}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <a href="{!!url('UpdateEnterCoupon',$editEnterCoupon->ID_PN)!!}"><input type="button" class="btn btn-success" value="Sửa"></a>
                <!-- <a href="{{url('DeleteEnterCoupon',$editEnterCoupon->ID_PN)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" class="btn btn-success" value="Xóa"></a> -->
                <a href="{!!url('ListEnterCoupon')!!}"><input type="button" class="btn btn-success" value="DSPN"></a>
            </div>
        </div>
    </div>
</div>
@endsection