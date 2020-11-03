@extends('Page.MasterAdminProvider')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý nhà cung cấp:</h4>
                <table class="table table-bordered" style="margin-top:2%" !important>
                <h4 style="text-align: center;">Xem nhà cung cấp</h4>
                    <tbody>
                        @foreach( $editprovider as  $editprovider)
                        <tr>
                            <th style="width:20%"!important>ID nhà cung cấp</th>
                            <td>{{ $editprovider->ID_NCC}}</td>
                        </tr>
                        <tr>
                            <th>Tên nhà cung cấp</th>
                            <td>{{$editprovider->TEN_NHA_CUNG_CAP}}</td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{$editprovider->DIA_CHI}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$editprovider->EMAIL}}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>{{$editprovider->SO_DIEN_THOAI}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{!!url('UpdateProducer',$editprovider->ID_NCC)!!}"><input type="button" class="btn btn-success" value="Sửa"></a>
                <!-- <a href="{{url('DeleteProducer',$editprovider->ID_NCC)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" class="btn btn-success" value="Xóa"></a> -->
                <a href="{!!url('ListProducer')!!}" ><input type="button" class="btn btn-success" value="DSNCC"></a>
            </div>
        </div>
    </div>
</div>
@endsection
