@extends('Page.MasterAdminCustomer')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý khách hàng:</h4>
                <h4 style="text-align: center;">Danh sách khách hàng</h4>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Tên tài khoản</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchcustomer as $searchcustomer1)
                        <tr>
                            <th scope="row">{{$searchcustomer1->ID_KH}}</th>
                            <td>{{$searchcustomer1->TEN_KHACH_HANG}}</td>
                            <td>{{$searchcustomer1->DIA_CHI}}</td>
                            <td>{{$searchcustomer1->EMAIL}}</td>
                            <td>{{$searchcustomer1->SO_DIEN_THOAI}}</td>
                            <td>{{$searchcustomer1->TEN_TAI_KHOAN}}</td>
                            <td>
                                <a href="{!!url('EditCustomer',$searchcustomer1->ID_KH)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('DeleteCustomer',$searchcustomer1->ID_KH)!!}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$searchcustomer->links()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection