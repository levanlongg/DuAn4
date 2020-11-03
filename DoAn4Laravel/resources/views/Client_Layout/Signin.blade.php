@extends('Page.Master1')
@section('Content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-5">
            <br />
            <h4 style="text-align: center;">Đăng nhập</h4>
            <hr>
            <form class="form-horizontal" action="{{route('Dangnhap')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label col-sm-4">Tài khoản*:</label>
                    <div class="col-sm-12" !important>
                        <input type="text" class="form-control" id="" placeholder="Tên tài khoản" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Mật khẩu*:</label>
                    <div class="col-sm-12" !important>
                        <input type="password" class="form-control" id="" placeholder="Mật khẩu" name="password">
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
                @if(Session::has('flag'))
                <div class="alert alert-{{Session::get('flag')}}">
                    <p style="color: red;">{{Session::get('message')}}</p>
                </div>
                @endif
                <p>*Ghi chú: Thông tin có dấu (*) không được để trống. Nếu bạn đã có tài khoản thì hãy <a href="{!!url('Signin')!!}">đăng nhập.</a> Chưa có tài khoản thì hãy<a href="{!!url('Register')!!}"> đăng ký.</a> </p>
                <div class="form-group" style="float: right; margin-right: 5%" !important>
                    <button type="submit" class="btn btn-success">Đăng nhập</button>
                </div>
            </form>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
            @if(Auth::check())
            <br />
            <img src="{{asset('images/login.png')}}" alt="login" title="{{Auth::user()->name}}" />
            <p><a href="">Hi, {{Auth::user()->name}}</a><br />
                <a href="{{route('Dangxuat')}}">Đăng xuất</a></p>
            @else
            <br/>
            <p><a href="{!!url('Register')!!}">Đăng ký</a> / <a href="{!!url('Signin')!!}">Đăng nhập</a></p>
            @endif
        </div>
        <hr>
    </div>
</div>
@endsection