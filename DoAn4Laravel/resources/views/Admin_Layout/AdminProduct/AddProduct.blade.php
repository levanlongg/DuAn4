@extends('Page.MasterAdmin')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý loại sản phẩm:</h4>
                <div class="row">
                    <form class="form-horizontal" action="{{route('Themsp')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-sm-9">
                            <h4 style="text-align: center;">Thêm sản phẩm</h4>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-4" !important>
                                    <b>Tên sản phẩm:<b><input type="name" class="form-control" id="name" placeholder="Tên sản phẩm" name="TEN_SAN_PHAM">
                                </div>
                                <div class="col-sm-4" !important>
                                    <b>Demo:<b><input type="number" min="0" class="form-control" id="number" placeholder="Demo" name="DEMO">
                                </div>
                                <div class="col-sm-4" !important>
                                    <b>Giảm giá:<b><input type="number" min="0" class="form-control" id="number" placeholder="Giảm giá" name="SALE">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4" !important>
                                    <b>Xuất xứ:<b><input type="text" class="form-control" id="" placeholder="Xuất xứ" name="XUAT_XU">
                                </div>
                                <div class="col-sm-4" !important>
                                    <b>Nơi sản xuất:<b><input type="text" class="form-control" min='1000' id="" placeholder="Nơi sản xuất" name="NOI_SAN_XUAT">
                                </div>
                                <div class="col-sm-4" !important>
                                    <b>Tình trạng:<b><input type="text" class="form-control" id="" placeholder="Tình trạng" name="TINH_TRANG">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4" !important>
                                    <b>Giá niêm yết:<b><input type="number" class="form-control" min="0" id="" placeholder="Giá niêm yết" name="GIA_NIEM_YET">
                                </div>
                                <div class="col-sm-4" !important>
                                    <b>Giá bán:<b><input type="number" class="form-control" min='1000' id="" placeholder="Giá bán" name="GIA_BAN">
                                </div>
                                <div class="col-sm-4" !important>
                                    <b>Ngày cập nhật:<b><input type="text" class="form-control" id="" placeholder="yyyy/mm/dd" name="NGAY_CAP_NHAT">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4" !important>
                                    <b>Năm sản xuất:<b><input type="number" class="form-control" min='2000' id="" placeholder="2019" name="NAM_SAN_XUAT">
                                </div>
                                <div class="col-sm-4" !important>
                                    <b>Số lượng:<b><input type="number" class="form-control" min="1" id="" placeholder="Số lượng" name="SO_LUONG">
                                </div>
                                <div class="col-sm-4" !important>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4" !important>
                                    <div class="form-group">
                                        <label for="">Nhà cung cấp:</label>
                                        <select class="form-control" id="" name="ID_NCC">
                                            @foreach($idncc as $idncc)
                                            <option value="{{$idncc->ID_NCC}}">{{$idncc->TEN_NHA_CUNG_CAP}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4" !important>
                                    <div class="form-group" style="margin-left:2%"!important>
                                        <label for="">Nhà sản xuất:</label>
                                        <select class="form-control" id="" name="ID_NSX">
                                            @foreach($idnsx as $idnsx)
                                            <option value="{{$idnsx->ID_NSX}}">{{$idnsx->TEN_NHA_SAN_XUAT}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4" !important>
                                    <div class="form-group" style="margin-left:2%"!important>
                                        <label for="">Loại sản phẩm:</label>
                                        <select class="form-control" id="" name="ID_LSP">
                                            @foreach($idlsp as $idlsp)
                                            <option value="{{$idlsp->ID_LSP}}">{{$idlsp->DONG_SP}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6" !important>
                                    <b>Tiêu đề 1:<b><input type="text" class="form-control" id="" placeholder="Tiêu đề 1" name="TIEU_DE_1">
                                </div>
                                <div class="col-sm-6" !important>
                                    <b>Tiêu đề 2:<b><input type="text" class="form-control" id="" placeholder="Tiêu đề 2" name="TIEU_DE_2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6" !important>
                                    <b>Tiêu đề 3:<b><input type="text" class="form-control" id="" placeholder="Tiêu đề 3" name="TIEU_DE_3">
                                </div>
                                <div class="col-sm-6" !important>
                                    <b>Hình ảnh 1:<b><input type="file" required="true" name="HINH_ANH_1">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Thông số kỹ thuật:<b><input type="text" class="form-control" id="" placeholder="Thông số kỹ thuật" name="THONG_SO_KY_THUAT">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Giới thiệu chung:<b>
                                            <textarea name="GIOI_THIEU_CHUNG" id="gioithieuchung"></textarea>
                                            <script>
                                                CKEDITOR.replace('gioithieuchung');
                                            </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Mô tả chi tiết 1:<b>
                                            <textarea name="MO_TA_CT1" id="motact1"></textarea>
                                            <script>
                                                CKEDITOR.replace('motact1');
                                            </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Mô tả chi tiết 2:<b>
                                            <textarea name="MO_TA_CT2" id="motact2"></textarea>
                                            <script>
                                                CKEDITOR.replace('motact2');
                                            </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Mô tả chi tiết 3:<b>
                                            <textarea name="MO_TA_CT3" id="motact3"></textarea>
                                            <script>
                                                CKEDITOR.replace('motact3');
                                            </script>
                                </div>
                            </div>
                            <div class="form-group" style="float: right; margin-right: 5%" !important>
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-success">Reset</button>
                                <a href="{!!url('ListProduct')!!}"><input type="button" class="btn btn-success" value="DSSP"></a>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-3">
                        <h4 style="text-align: center;">Thông báo</h4>
                        <hr>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session::has('thongbao'))
                        <p style="color: red;">{{Session::get('thongbao')}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection