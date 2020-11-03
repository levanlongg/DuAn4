@extends('Page.MasterAdminProTy')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý loại sản phẩm:</h4>
                <table class="table table-bordered" style="margin-top:2%" !important>
                <h4 style="text-align: center;">Xem loại sản phẩm</h4>
                    <tbody>
                        @foreach($editproducttype as $ed_pro_ty)
                        <tr>
                            <th style="width:20%"!important>ID loại sản phẩm</th>
                            <td>{{$ed_pro_ty->ID_LSP}}</td>
                        </tr>
                        <tr>
                            <th>Tên loại sản phẩm</th>
                            <td>{{$ed_pro_ty->TEN_LSP}}</td>
                        </tr>
                        <tr>
                            <th>Dòng sản phẩm</th>
                            <td>{{$ed_pro_ty->DONG_SP}}</td>
                        </tr>
                        <tr>
                            <th>Phân khúc</th>
                            <td>{{$ed_pro_ty->PHAN_KHUC}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{!!url('UpdateProType',$ed_pro_ty->ID_LSP)!!}"><input type="button" class="btn btn-success" value="Sửa"></a>
                <!-- <a href="{{url('DelProType',$ed_pro_ty->ID_LSP)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" class="btn btn-success" value="Xóa"></a> -->
                <a href="{!!url('ListProductType')!!}" ><input type="button" class="btn btn-success" value="DS LSP"></a>
            </div>
        </div>
    </div>
</div>
@endsection
