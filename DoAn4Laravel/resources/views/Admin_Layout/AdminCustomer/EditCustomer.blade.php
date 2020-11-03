@extends('Page.MasterAdminCustomer')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý khách hàng:</h4>
                <h4 style="text-align: center;">Xem khách hàng</h4>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <tbody>
                        @foreach($editcustomer as $editcustomer)
                        <tr>
                            <th style="width:20%">Id khách hàng</th>
                            <td>{{$editcustomer->ID_KH}}</td>
                        </tr>
                        <tr>
                            <th>Tên khách hàng</th>
                            <td>{{$editcustomer->TEN_KHACH_HANG}}</td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{$editcustomer->DIA_CHI}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$editcustomer->EMAIL}}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>{{$editcustomer->SO_DIEN_THOAI}}</td>
                        </tr>
                        <tr>
                            <th>Tên tài khoản</th>
                            <td>{{$editcustomer->TEN_TAI_KHOAN}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{!!url('ListCustomer')!!}"><input type="button" class="btn btn-success" value="DSKH"></a>
            </div>
        </div>
    </div>
</div>
@endsection