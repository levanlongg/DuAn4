@extends('Page.MasterAdminProTy')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý loại sản phẩm:</h4>
                <a href="{!!url('AddProType')!!}"><input type="button" value="Thêm mới"></a>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên loại sản phẩm</th>
                            <th>Dòng sản phẩm</th>
                            <th>Phân khúc</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($search_pro_type as $se_pro_ty)
                        <tr>
                            <th scope="row">{{$se_pro_ty->ID_LSP}}</th>
                            <td>{{$se_pro_ty->TEN_LSP}}</td>
                            <td>{{$se_pro_ty->DONG_SP}}</td>
                            <td>{{$se_pro_ty->PHAN_KHUC}}</td>
                            <td>
                                <a href="{!!url('EditProType',$se_pro_ty->ID_LSP)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdateProType',$se_pro_ty->ID_LSP)!!}"><input type="button" value="Sửa"></a>
                                <a href="{{url('DelProType',$se_pro_ty->ID_LSP)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
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