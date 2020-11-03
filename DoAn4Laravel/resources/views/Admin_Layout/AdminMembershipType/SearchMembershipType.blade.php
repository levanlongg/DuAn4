@extends('Page.MasterAdminMembershipType')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý loại thành viên</h4>
                <a href="{!!url('AddMembershipType')!!}"><input type="button" value="Thêm mới"></a>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên loại thành viên</th>
                            <th>Ưu đãi</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($search as $search)
                        <tr>
                            <th scope="row">{{$search->ID_LTV}}</th>
                            <td style="width:25%">{{$search->TEN_LOAI_THANH_VIEN}}</td>
                            <td>{{$search->UU_DAI}}</td>
                            <td style="width:20%" !important>
                                <a href="{!!url('UpdateMembershipType',$search->ID_LTV)!!}"><input type="button" value="Sửa"></a>
                                <a href="{!!url('DeleteMembershipType',$search->ID_LTV)!!}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
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