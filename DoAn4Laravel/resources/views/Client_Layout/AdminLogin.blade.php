@extends('Page.Master1')
@section('Content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br />
            <h4 style="text-align: center;">Đăng nhập ADMIN</h4>
            <hr>
            <form class="form-horizontal" action="{{route('Dangnhap1')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label col-sm-4">Tài khoản*:</label>
                    <div class="col-sm-12" !important>
                        <input type="text" class="form-control" id="" placeholder="Tên tài khoản" name="EMAIL">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Mật khẩu*:</label>
                    <div class="col-sm-12" !important>
                        <input type="password" class="form-control" id="" placeholder="Mật khẩu" name="MAT_KHAU">
                    </div>
                </div>
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
                <hr>
                <!-- <p>*Ghi chú: Thông tin có dấu (*) không được để trống. Nếu bạn đã có tài khoản thì hãy <a href="{!!url('Signin')!!}">đăng nhập.</a> Chưa có tài khoản thì hãy<a href="{!!url('Register')!!}"> đăng ký.</a> </p> -->
                <div class="form-group" style="float: right; margin-right: 5%" !important>
                    <button type="submit" class="btn btn-success">Đăng nhập</button>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
        <hr>
    </div>
</div>
@endsection