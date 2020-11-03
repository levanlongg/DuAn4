@extends('Page.MasterAdminProducer')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý nhà sản xuất:</h4>
                <table class="table table-bordered" style="margin-top:2%" !important>
                <h4 style="text-align: center;">Xem nhà sản xuất</h4>
                    <tbody>
                        @foreach($editproducer as $editproducer)
                        <tr>
                            <th style="width:20%"!important>ID nhà sản xuất</th>
                            <td>{{$editproducer->ID_NSX}}</td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td> <img src="../image_sp/{{$editproducer->LOGO}}" alt="{{$editproducer->TEN_NHA_SAN_XUAT}}" style="width:60px; height:60px" !important> </td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{$editproducer->DIA_CHI}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$editproducer->EMAIL}}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>{{$editproducer->SO_DIEN_THOAI}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{!!url('UpdateProducer',$editproducer->ID_NSX)!!}"><input type="button" class="btn btn-success" value="Sửa"></a>
                <!-- <a href="{{url('DeleteProducer',$editproducer->ID_NSX)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" class="btn btn-success" value="Xóa"></a> -->
                <a href="{!!url('ListProducer')!!}" ><input type="button" class="btn btn-success" value="DS LSP"></a>
            </div>
        </div>
    </div>
</div>
@endsection
