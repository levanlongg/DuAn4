@extends('Page.MasterAdmin')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý loại sản phẩm:</h4>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4 style="text-align: center;">Thêm loại sản phẩm</h4>
                        <hr>
                        <form class="form-horizontal" action="{{route('Themlsp')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Tên loại sản phẩm*:<b><input type="name" class="form-control" id="name" placeholder="Tên loại sản phẩm" name="TEN_LSP">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Dòng sản phẩm*:<b><input type="text" class="form-control" id="name" placeholder="Dòng sản phẩm" name="DONG_SP">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Phân khúc*:<b><input type="text" class="form-control" id="name" placeholder="Phân khúc" name="PHAN_KHUC">
                                </div>
                            </div>

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
                            <p>*Ghi chú: Thông tin có dấu (*) không được để trống.</a></p>
                            <div class="form-group" style="float: right; margin-right: 5%" !important>
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-success">Reset</button>
                                <a href="{!!url('ListProductType')!!}" ><input type="button" class="btn btn-success" value="DS LSP"></a>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection