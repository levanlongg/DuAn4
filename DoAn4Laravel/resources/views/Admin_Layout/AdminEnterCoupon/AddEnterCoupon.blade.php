@extends('Page.MasterAdminEnterCoupon')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý phiếu nhập:</h4>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-6">
                        <h4 style="text-align: center;">Thêm phiếu nhập</h4>
                        <hr>
                        <form class="form-horizontal" action="{{route('Thempn')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-6" !important>
                                    <div class="form-group">
                                        <label for="">Nhà cung cấp*:</label>
                                        <select class="form-control" id="" name="ID_NCC">
                                            @foreach($idncc as $idncc)
                                            <option value="{{$idncc->ID_NCC}}">{{$idncc->TEN_NHA_CUNG_CAP}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6" !important>
                                    <b>Đơn giá nhập*:<b><input type="number" class="form-control" min="1" id="" placeholder="Đơn giá nhập" name="DON_GIA_NHAP">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6" !important>
                                    <b>Số lượng nhập*:<b><input type="number" class="form-control" id="" placeholder="Số lượng nhập" name="SO_LUONG_NHAP">
                                </div>
                                <div class="col-sm-6" !important>
                                    <b>Tình trạng*:<b><input type="text" class="form-control" id="" placeholder="Tình trạng nhập" name="TINH_TRANG">
                                </div>
                            </div>
                            <hr>
                            <p>*Ghi chú: Thông tin có dấu (*) không được để trống.</a></p>
                            <div class="form-group" style="float: right; margin-right: 5%" !important>
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-success">Reset</button>
                                <a href="{!!url('ListEnterCoupon')!!}"><input type="button" class="btn btn-success" value="DSPN"></a>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                        <h4>Thông báo</h4>
                        <hr/>
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