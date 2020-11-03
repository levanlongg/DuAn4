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
                        @foreach($listprovider as $listprovider1)
                        <tr>
                            <th scope="row">{{$listprovider1->ID_NCC}}</th>
                            <td>{{$listprovider1->TEN_NHA_CUNG_CAP}}</td>
                            <td style="width:25%">{{$listprovider1->DIA_CHI}}</td>
                            <td>{{$listprovider1->EMAIL}}</td>
                            <td>{{$listprovider1->SO_DIEN_THOAI}}</td>
                            <td>
                                <a href="{!!url('EditProvider',$listprovider1->ID_NCC)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdateProvider',$listprovider1->ID_NCC)!!}"><input type="button" value="Sửa"></a>
                                <a href="{{url('DeleteProvider',$listprovider1->ID_NCC)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$listprovider->links()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection