@extends('Page.MasterAdminMembershipType')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý loại thành viên:</h4>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4 style="text-align: center;">Sửa loại thành viên</h4>
                        <hr>
                        <form class="form-horizontal" action="{{url('UpdateMembershipType/'.$loaitv->ID_LTV)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Tên loại thành viên*:<b><input type="name" class="form-control" id="name" value="{{$loaitv->TEN_LOAI_THANH_VIEN}}" name="TEN_LOAI_THANH_VIEN">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Ưu đãi*:<b><input type="text" class="form-control" id="dong" value="{{$loaitv->UU_DAI}}" name="UU_DAI">
                                </div>
                            </div>
                            <hr>
                            @if(Session::has('thongbao'))
                            <p style="color: red;">{{Session::get('thongbao')}}</p>
                            @endif
                            <p>*Ghi chú: Thông tin có dấu (*) không được để trống.</a></p>
                            <div class="form-group" style="float: right; margin-right: 5%" !important>
                                <button type="submit" class="btn btn-success">Sửa</button>
                                <button type="reset" class="btn btn-success">Reset</button>
                                <a href="{!!url('ListMembershipType')!!}" ><input type="button" class="btn btn-success" value="DS LTV"></a>
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