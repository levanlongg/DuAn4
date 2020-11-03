@extends('Page.MasterAdminMember')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý thành viên</h4>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên thành viên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Tên loại thành viên</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchmember as $searchmember1)
                        <tr>
                            <th scope="row">{{$searchmember1->ID_TV}}</th>
                            <td style="width:25%">{{$searchmember1->TEN_THANH_VIEN}}</td>
                            <td>{{$searchmember1->DIA_CHI}}</td>
                            <td>{{$searchmember1->EMAIL}}</td>
                            <td>{{$searchmember1->TEN_LOAI_THANH_VIEN}}</td>
                            <td>
                                <a href="{!!url('EditMember',$searchmember1->ID_TV)!!}"><input type="button" value="Xem"></a>
                                <a href="{!!url('DeleteMember',$searchmember1->ID_TV)!!}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$searchmember->links()}}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection