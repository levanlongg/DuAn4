@extends('Page.MasterAdmin')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý sản phẩm:</h4>
                <table class="table table-bordered" style="margin-top:2%" !important>
                <h4 style="text-align: center;">Xem sản phẩm</h4>
                    <tbody>
                        @foreach($editproduct as $editpro)
                        <tr>
                            <th style="width:20%"!important>ID sản phẩm</th>
                            <td>{{$editpro->ID_SP}}</td>
                        </tr>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <td>{{$editpro->TEN_SAN_PHAM}}</td>
                        </tr>
                        <tr>
                            <th>Hình ảnh</th>
                            <td> <img src="../image_sp/{{$editpro->HINH_ANH_1}}" alt="{{$editpro->TEN_SAN_PHAM}}" style="width:60px; height:60px" !important> </td>
                        </tr>
                        <tr>
                            <th>Demo</th>
                            <td>{{$editpro->DEMO}}</td>
                        </tr>
                        <tr>
                            <th>Giá niêm yết</th>
                            <td>{{number_format($editpro->GIA_NIEM_YET)}} đồng</td>
                        </tr>
                        <tr>
                            <th>Giảm giá</th>
                            <td>{{$editpro->SALE}}%</td>
                        </tr>
                        <tr>
                            <th>Giá bán</th>
                            <td>{{number_format($editpro->GIA_BAN)}} đồng</td>
                        </tr>
                        <tr>
                            <th>Ngày cập nhật</th>
                            <td>{{$editpro->NGAY_CAP_NHAT}}</td>
                        </tr>
                        <tr>
                            <th>Năm sản xuất</th>
                            <td>{{$editpro->NAM_SAN_XUAT}}</td>
                        </tr>
                        <tr>
                            <th>Xuất xứ</th>
                            <td>{{$editpro->XUAT_XU}}</td>
                        </tr>
                        <tr>
                            <th>Nơi sản xuất</th>
                            <td>{{$editpro->NOI_SAN_XUAT}}</td>
                        </tr>
                        <tr>
                            <th>Thông số kỹ thuật</th>
                            <td>{{$editpro->THONG_SO_KY_THUAT}}</td>
                        </tr>
                        <tr>
                            <th>Giới thiệu chung</th>
                            <td>{{$editpro->GIOI_THIEU_CHUNG}}</td>
                        </tr>
                        <tr>
                            <th>Tiêu đề 1</th>
                            <td>{{$editpro->TIEU_DE_1}}</td>
                        </tr>
                        <tr>
                            <th>Mô tả chi tiết 1</th>
                            <td>{{$editpro->MO_TA_CT1}}</td>
                        </tr>
                        <tr>
                            <th>Tiêu đề 2</th>
                            <td>{{$editpro->TIEU_DE_1}}</td>
                        </tr>
                        <tr>
                            <th>Mô tả chi tiết 2</th>
                            <td>{{$editpro->MO_TA_CT1}}</td>
                        </tr>
                        <tr>
                            <th>Tiêu đề 3</th>
                            <td>{{$editpro->TIEU_DE_1}}</td>
                        </tr>
                        <tr>
                            <th>Mô tả chi tiết 3</th>
                            <td>{{$editpro->MO_TA_CT1}}</td>
                        </tr>
                        <tr>
                            <th>Số lượng</th>
                            <td>{{$editpro->SO_LUONG}}</td>
                        </tr>
                        <tr>
                            <th>Id nhà cung cấp</th>
                            <td>{{$editpro->ID_NCC}}</td>
                        </tr>
                        <tr>
                            <th>Id nhà sản xuất</th>
                            <td>{{$editpro->ID_NSX}}</td>
                        </tr>
                        <tr>
                            <th>Id loại sản phẩm</th>
                            <td>{{$editpro->ID_LSP}}</td>
                        </tr>
                        <tr>
                            <th>Tình trạng</th>
                            <td>{{$editpro->TINH_TRANG}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{!!url('UpdatePro',$editpro->ID_SP)!!}"><input type="button" class="btn btn-success" value="Sửa"></a>
                <a href="{!!url('ListProduct')!!}" ><input type="button" class="btn btn-success" value="DS SP"></a>
            </div>
        </div>
    </div>
</div>
@endsection
