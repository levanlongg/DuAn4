@extends('Page.Master')
@section('Content')
<div class="content">
    <div class="content_bottom">
        <div class="heading">
            <h3>Điện thoại</h3>
        </div>
        <div class="show">
            <p> Bạn đang xem {{count($sp_nsx)}} điện thoại
            </p>
        </div>
        <div class="page-no">
            <p>
                <ul>
                    <li>{{$sp_nsx->links()}}</li>
                </ul>
            </p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="section group">
        @foreach($sp_nsx as $nsx_phone)
        <div class="grid_1_of_4 images_1_of_4" style="margin-left: 1%" !important>
                <a href=""><img src="../image_sp/{{$nsx_phone->HINH_ANH_1}}" alt="{{$nsx_phone->TEN_SAN_PHAM}}" /></a>
                <div class="discount">
                    <span class="percentage">-{{$nsx_phone->SALE}}%</span>
                </div>
                <h1 style="color: brown">{{$nsx_phone->TEN_SAN_PHAM}}</h1>
                <p style="margin-left: -4%">
                    @if($nsx_phone->GIA_NIEM_YET==0)
                    <span class="price">{{number_format($nsx_phone->GIA_BAN)}}đ</span>
                    @else
                    <span class="strike">{{number_format($nsx_phone->GIA_NIEM_YET)}}đ</span>
                    <span class="price">{{number_format($nsx_phone->GIA_BAN)}}đ</span>
                    @endif
                </p>
                <p>-------------------------------------</p>
                <h2 style="color: black;" !important>
                    <p style="height: auto">{{$nsx_phone->THONG_SO_KY_THUAT}}</p>
                </h2>
                <div class="button"><span><img src="{{asset('images/cart.jpg')}}" alt="" /><a href="{{url('Add_Cart',$nsx_phone->ID_SP)}}" class="cart-button" style="width:100%">Thêm vào giỏ</a></span> </div>
                <div class="button"><span><a href="{!!url('Sg_product',$nsx_phone->ID_SP)!!}" class="details" style="margin-left: 40%">Xem</a></span></div>
            </div>
        @endforeach
    </div>
</div>
@endsection