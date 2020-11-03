@extends('Page.MasterAdminProducer')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý nhà sản xuất:</h4>
                <a href="{!!url('AddProducer')!!}"><input type="button" value="Thêm mới"></a>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Tên nhà sản xuất</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchproducer as $tknsx)
                        <tr>
                            <th scope="row">{{$tknsx->ID_NSX}}</th>
                            <td><img src="./image_sp/{{$tknsx->LOGO}}" alt="{{$tknsx->TEN_NHA_SAN_XUAT}}" style="width:40px; height:40px" !important></td>
                            <td>{{$tknsx->TEN_NHA_SAN_XUAT}}</td>
                            <td style="width:20%">{{$tknsx->DIA_CHI}}</td>
                            <td>{{$tknsx->EMAIL}}</td>
                            <td>{{$tknsx->SO_DIEN_THOAI}}</td>
                            <td>
                                <a href="{!!url('EditProType',$tknsx->ID_NSX)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdateProType',$tknsx->ID_NSX)!!}"><input type="button" value="Sửa"></a>
                                <a href="{{url('DelProType',$tknsx->ID_NSX)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
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