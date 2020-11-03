@extends('Page.MasterAdminMember')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý thành viên:</h4>
                <h4 style="text-align: center;">Xem chi tiết thành viên</h4>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <tbody>
                        @foreach($editmember as $editmember)
                        <tr>
                            <th style="width:20%">ID thành viên</th>
                            <td>{{$editmember->ID_TV}}</td>
                        </tr>
                        <tr>
                            <th>Tên thành viên</th>
                            <td>{{$editmember->TEN_THANH_VIEN}}</td>
                        </tr>
                        <tr>
                            <th>Tên tài khoản</th>
                            <td>{{$editmember->TEN_TAI_KHOAN}}</td>
                        </tr>
                        <tr>
                            <th>Mật khẩu</th>
                            <td>{{$editmember->MAT_KHAU}}</td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{$editmember->DIA_CHI}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$editmember->EMAIL}}</td>
                        </tr>
                        <tr>
                            <th>Tên loại thành viên</th>
                            <td>{{$editmember->TEN_LOAI_THANH_VIEN}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{!!url('ListMember')!!}"><input type="button" class="btn btn-success" value="DSPN"></a>
            </div>
        </div>
    </div>
</div>
@endsection