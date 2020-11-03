@extends('Page.MasterAdminSlide')
@section('Content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">ADMIN</h3>
            <div class="table-responsive bs-example widget-shadow">
                <h4>Quản lý hình ảnh slide:</h4>
                <a href="{!!url('AddSlide')!!}"><input type="button" value="Thêm mới"></a>
                @if(Session::has('thongbao'))
                <p style="color: red;">{{Session::get('thongbao')}}</p>
                @endif
                <table class="table table-bordered" style="margin-top:2%" !important>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listslide as $listslide1)
                        <tr>
                            <th scope="row">{{$listslide1->ID_HINHANH}}</th>
                            <td style="width:25%">{{$listslide1->TEN_HINH_ANH}}</td>
                            <td><img src="./image_sp/slide/{{$listslide1->HINH_ANH}}" alt="{{$listslide1->TEN_HINH_ANH}}" style="width:40px; height:40px" !important></td>
                            <td>
                                <a href="{!!url('DeleteSlide',$listslide1->ID_HINHANH)!!}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này? ')"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{{$listslide->links()}}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection