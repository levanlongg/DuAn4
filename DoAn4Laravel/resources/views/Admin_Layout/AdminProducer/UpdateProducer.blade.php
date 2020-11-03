@extends('Page.MasterAdminProducer')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý nhà sản xuất:</h4>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-6">
                        <h4 style="text-align: center;">Thêm nhà sản xuất</h4>
                        <hr>
                        <form class="form-horizontal" action="{{url('UpdateProducer/'.$producer->ID_NSX)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Logo*: <b>
                                    <img src="../image_sp/{{$producer->LOGO}}" alt="{{$producer->TEN_NHA_SAN_XUAT}}" style="width:60px; height:60px" !important>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Tên nhà sản xuất*:<b><input type="name" class="form-control" id="" value="{{$producer->TEN_NHA_SAN_XUAT}}" name="TEN_NHA_SAN_XUAT">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Địa chỉ*:<b><input type="text" class="form-control" id="" value="{{$producer->DIA_CHI}}" name="DIA_CHI">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Email*:<b><input type="email" class="form-control" id="" value="{{$producer->EMAIL}}" name="EMAIL">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Số điện thoại*:<b><input type="text" min="0" class="form-control" id="" value="{{$producer->SO_DIEN_THOAI}}" name="SO_DIEN_THOAI">
                                </div>
                            </div>

                            <hr>
                            <p>*Ghi chú: Thông tin có dấu (*) không được để trống.</a></p>
                            <div class="form-group" style="float: right; margin-right: 5%" !important>
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-success">Reset</button>
                                <a href="{!!url('ListProducer')!!}"><input type="button" class="btn btn-success" value="DSNSX"></a>
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