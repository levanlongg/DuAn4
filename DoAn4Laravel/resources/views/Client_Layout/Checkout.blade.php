@extends('Page.Master1')
@section('Content')
<div class="container">
    <form class="form-horizontal" action="{{route('dathang')}}" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-5">
                <br />
                <h4>Thông tin giao hàng</h4>
                <hr>
                <!-- <input type="hidden" name="_token" values="{{csrf_token()}}"> -->
                <div class="form-group">
                    <label class="control-label col-sm-4">Họ tên*:</label>
                    <div class="col-sm-8" style="margin-top:-7%; margin-left:25%" !important>
                        <input type="name" class="form-control" id="name" placeholder="Họ tên" name="TEN_KHACH_HANG">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Địa chỉ*:</label>
                    <div class="col-sm-8" style="margin-top:-7%; margin-left:25%" !important>
                        <input type="address" class="form-control" id="address" placeholder="Địa chỉ nhận" name="DIA_CHI">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Email*:</label>
                    <div class="col-sm-8" style="margin-top:-7%; margin-left:25%" !important>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com" name="EMAIL">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Số điện thoại*:</label>
                    <div class="col-sm-8" style="margin-top:-7%; margin-left:25%" !important>
                        <input type="text" min="0" class="form-control" id="email" placeholder="số điện thoại" name="SO_DIEN_THOAI">
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
                *Ghi chú:<br/>1. Thông tin có dấu (*) không được để trống<br/>2. Bạn phải đăng ký tài khoản để mua hàng
                
    </form>
    <hr>
    <br />
</div>
<div class="col-sm-1"></div>
<div class="col-sm-6">
    <br />
    <h4>Đơn hàng của bạn</h4>
    <hr>
    @if(Session::has('Cart') !=null)
    @foreach(Session::get('Cart')->product as $prosp)
    <div class="media">
        <div class="media-left">
            <img src="./image_sp/{{$prosp['proinfo']->HINH_ANH_1}}" class="media-object" style="width:70px; height: 70px; border:1px" !important>
        </div>
        <div class="media-body" style="margin-left:2%">
            <h5 class="media-heading">{{$prosp['proinfo']->TEN_SAN_PHAM}}</h5>
            <p><b>Giá bán:</b> {{number_format($prosp['proinfo']->GIA_BAN)}} đồng <b>Số lượng:</b> {{$prosp['qty']}} <br /> <b>Thành tiền:</b> {{number_format($prosp['proinfo']->GIA_BAN * $prosp['qty'])}} đồng <a href="{!!url('Del_Cart',$prosp['proinfo']->ID_SP)!!}" > <button type="button" onclick="return confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng.')" class="btn btn-danger" style="margin-top: -6%; float:right">X</button></a></p>
        </div>
    </div>
    @endforeach
    <hr>
    <h5 style="color: red">Tổng tiền: <p style="float: right">{{number_format(Session('Cart')->totalPrice)}} đồng</p>
    </h5>
    @elseif(Session::has('thongbao'))
    <div class="media">
        <div class="media-body" style="margin-left:2%">
            <h5 style="color:red"> {{Session::get('thongbao')}}</h5>
        </div>
    </div>
    @else
    <div class="media">
        <div class="media-body" style="margin-left:2%">
            <h5 style="color:red">Không có sản phẩm nào trong giỏ hàng.</h5>
        </div>
    </div>
    @endif
    <hr>
    <button type="submit" class="btn btn-success" onclick="return confirm('Bạn có thực sự muốn đặt hàng.')" style="float:right; margin-left:2%">Đặt hàng</button>
    <!-- <a href="{!!url('Destroy')!!}"> <button type="button" class="btn btn-danger" style="float:right">Hủy đơn hàng</button></a> -->
</div>
</div>
<br />
</form>
</div>
@endsection