@extends('Page.MasterAdminSlide')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý hình ảnh slide:</h4>
                <a href="{!!url('AddRole')!!}"><input type="button" value="Thêm mới"></a>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên loại thành viên</th>
                            <th>Vai trò</th>
                            <th>Ưu đãi</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listrole as $listrole)
                        <tr>
                            <th scope="row">{{$listrole->ID_VT}}</th>
                            <td style="width:25%">{{$listrole->TEN_LOAI_THANH_VIEN}}</td>
                            <td style="width:25%">{{$listrole->VAI_TRO}}</td>
                            <td style="width:25%">{{$listrole->UU_DAI}}</td>
                            <td>
                                <a href="{!!url('DeleteRole',$listrole->ID_VT)!!}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection