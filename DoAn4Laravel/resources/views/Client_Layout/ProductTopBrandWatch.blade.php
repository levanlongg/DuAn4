@extends('Page.Master')
@section('Content')
<div class="content">
    <div class="content_bottom">
        <div class="heading">
            <h3>Đồng hồ </h3>
        </div>
        <div class="show">
            <p>Bạn đang xem {{count($sp_dh_nsx)}} đồng hồ
            </p>
        </div>
        <div class="page-no">
            <p>
                <ul>
                    <li>{{$sp_dh_nsx->links()}}</li>
                </ul>
            </p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="section group">
    @foreach($sp_dh_nsx as $nsx_watch)
        <div class="grid_1_of_4 images_1_of_4" style="margin-left: 1%" !important>
                <a href=""><img src="../image_sp/{{$nsx_watch->HINH_ANH_1}}" alt="{{$nsx_watch->TEN_SAN_PHAM}}" /></a>
                <div class="discount">
                    <span class="percentage">-{{$nsx_watch->SALE}}%</span>
                </div>
                <h1 style="color: brown">{{$nsx_watch->TEN_SAN_PHAM}}</h1>
                <p style="margin-left: -4%">
                    @if($nsx_watch->GIA_NIEM_YET==0)
                    <span class="price">{{number_format($nsx_watch->GIA_BAN)}}đ</span>
                    @else
                    <span class="strike">{{number_format($nsx_watch->GIA_NIEM_YET)}}đ</span>
                    <span class="price">{{number_format($nsx_watch->GIA_BAN)}}đ</span>
                    @endif
                </p>
                <p>-------------------------------------</p>
                <h2 style="color: black;" !important>
                    <p style="height: auto">{{$nsx_watch->THONG_SO_KY_THUAT}}</p>
                </h2>
                <div class="button"><span><img src="{{asset('images/cart.jpg')}}" alt="" /><a href="{{url('Add_Cart',$nsx_watch->ID_SP)}}" class="cart-button" style="width:100%">Thêm vào giỏ</a></span> </div>
                <div class="button"><span><a href="{!!url('Sg_product_watch',$nsx_watch->ID_SP)!!}" class="details" style="margin-left: 40%">Xem</a></span></div>
            </div>
        @endforeach
    </div>
</div>
@endsection