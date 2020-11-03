@extends('Page.MasterAdminProvider')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý nhà cung cấp:</h4>
                <a href="{!!url('AddProvider')!!}"><input type="button" value="Thêm mới"></a>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchprovider as $searchprovider)
                        <tr>
                            <th scope="row">{{$searchprovider->ID_NCC}}</th>
                            <td>{{$searchprovider->TEN_NHA_CUNG_CAP}}</td>
                            <td style="width:25%">{{$searchprovider->DIA_CHI}}</td>
                            <td>{{$searchprovider->EMAIL}}</td>
                            <td>{{$searchprovider->SO_DIEN_THOAI}}</td>
                            <td>
                                <a href="{!!url('EditProvider',$searchprovider->ID_NCC)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdateProvider',$searchprovider->ID_NCC)!!}"><input type="button" value="Sửa"></a>
                                <a href="{{url('DeleteProvider',$searchprovider->ID_NCC)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
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