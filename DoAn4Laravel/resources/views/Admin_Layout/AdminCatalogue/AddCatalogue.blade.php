@extends('Page.MasterAdminCatalogue')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý danh mục:</h4>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-6">
                        <h4 style="text-align: center;">Thêm danh mục</h4>
                        <hr>
                        <form class="form-horizontal" action="{{route('Themdm')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Tên danh mục*:<b><input type="name" class="form-control" id="" placeholder="Tên danh mục" name="TEN_DANH_MUC">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4" !important>
                                    <b>ID danh mục*:<b><input type="number" class="form-control" min="1" id="" placeholder="Id danh mục" name="ID_DM">
                                </div>
                                <div class="col-sm-4" !important>
                                    <div class="form-group">
                                        <label for="">Nhà cung cấp*:</label>
                                        <select class="form-control" id="" name="ID_NCC">
                                            @foreach($idncc as $idncc)
                                            <option value="{{$idncc->ID_NCC}}">{{$idncc->TEN_NHA_CUNG_CAP}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4" !important>
                                    <div class="form-group" style="margin-left:2%"!important>
                                        <label for="">Nhà sản xuất*:</label>
                                        <select class="form-control" id="" name="ID_NSX">
                                            @foreach($idnsx as $idnsx)
                                            <option value="{{$idnsx->ID_NSX}}">{{$idnsx->TEN_NHA_SAN_XUAT}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>*Ghi chú: Thông tin có dấu (*) không được để trống.</a></p>
                            <div class="form-group" style="float: right; margin-right: 5%" !important>
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-success">Reset</button>
                                <a href="{!!url('ListCatalogue')!!}"><input type="button" class="btn btn-success" value="DSDM"></a>
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