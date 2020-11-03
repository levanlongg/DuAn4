@extends('Page.MasterAdminCatalogue')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý danh mục:</h4>
                <a href="{!!url('AddCatalogue')!!}"><input type="button" value="Thêm mới"></a>
                <h4 style="text-align: center;">Danh sách danh mục</h4>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>
                            <th>Tên nhà sản xuất</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listcatalogue as $listcatalogue1)
                        <tr>
                            <th scope="row">{{$listcatalogue1->ID_DM}}</th>
                            <td>{{$listcatalogue1->TEN_DANH_MUC}}</td>
                            <td>{{$listcatalogue1->TEN_NHA_CUNG_CAP}}</td>
                            <td>{{$listcatalogue1->TEN_NHA_SAN_XUAT}}</td>
                            <td>
                                <a href="{!!url('DeleteCatalogue',$listcatalogue1->ID_DM)!!}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$listcatalogue->links()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection