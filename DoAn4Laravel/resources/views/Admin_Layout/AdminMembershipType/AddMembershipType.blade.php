@extends('Page.MasterAdminMembershipType')
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
                        <form class="form-horizontal" action="{{route('Themltv')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Tên loại thành viên*:<b><input type="name" class="form-control" id="" placeholder="Tên loại thành viên" name="TEN_LOAI_THANH_VIEN">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12" !important>
                                    <b>Ưu đãi*:<b><input type="text" class="form-control" id="" placeholder="Ưu đãi" name="UU_DAI">
                                </div>
                            </div>
                            <hr>
                            <p>*Ghi chú: Thông tin có dấu (*) không được để trống.</a></p>
                            <div class="form-group" style="float: right; margin-right: 5%" !important>
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-success">Reset</button>
                                <a href="{!!url('ListMembershipType')!!}"><input type="button" class="btn btn-success" value="DS LTV"></a>
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