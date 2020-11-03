@extends('Page.MasterAdmin')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý sản phẩm:</h4>
                <a href="{!!url('AddPro')!!}"><input type="button" value="Thêm mới"></a>
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Xuất xứ</th>
                            <th>Giá niêm yết</th>
                            <th>Giá bán</th>
                            <th>Tình trạng</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($search_pro as $listsp)
                        <tr>
                            <th scope="row">{{$listsp->ID_SP}}</th>
                            <td style="width:25%">{{$listsp->TEN_SAN_PHAM}}</td>
                            <td><img src="./image_sp/{{$listsp->HINH_ANH_1}}" alt="{{$listsp->TEN_SAN_PHAM}}" style="width:40px; height:40px"!important></td>
                            <td>{{$listsp->XUAT_XU}}</td>
                            <td>{{number_format($listsp->GIA_NIEM_YET)}}</td>
                            <td>{{number_format($listsp->GIA_BAN)}}</td>
                            <td>{{$listsp->TINH_TRANG}}</td>
                            <td>
                                <a href="{!!url('EditPro',$listsp->ID_SP)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('UpdatePro',$listsp->ID_SP)!!}"><input type="button" value="Sửa"></a>
                                <a href="{!!url('DelPro',$listsp->ID_SP)!!}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$search_pro->links()}}</p>
            </div>
        </div>
    </div>
</div>
@endsection