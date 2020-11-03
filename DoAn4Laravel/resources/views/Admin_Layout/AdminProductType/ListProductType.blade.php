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
                        @foreach($listproducttype as $listlsp)
                        <tr>
                            <th scope="row">{{$listlsp->ID_LSP}}</th>
                            <td>{{$listlsp->TEN_LSP}}</td>
                            <td>{{$listlsp->DONG_SP}}</td>
                            <td>{{$listlsp->PHAN_KHUC}}</td>
                            <td>
                                <a href="{!!url('EditProType',$listlsp->ID_LSP)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdateProType',$listlsp->ID_LSP)!!}"><input type="button" value="Sửa"></a>
                                <a href="{{url('DelProType',$listlsp->ID_LSP)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$listproducttype->links()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection