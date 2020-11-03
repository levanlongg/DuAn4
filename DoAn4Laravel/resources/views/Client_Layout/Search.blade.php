@extends('Page.Master')
@section('Content')
<div class="content">
    <div class="section group">
        @foreach($sp_search as $sp_tk)
        <div class="grid_1_of_4 images_1_of_4" style="margin-left: 1%" !important>
            <a href=""><img src="http://localhost:801/DoAn4Laravel/public/image_sp/{{$sp_tk->HINH_ANH_1}}" alt="{{$sp_tk->TEN_SAN_PHAM}}" /></a>
            <div class="discount">
                <span class="percentage">-{{$sp_tk->SALE}}%</span>
            </div>
            <h1 style="color: brown">{{$sp_tk->TEN_SAN_PHAM}}</h1>
            <p style="margin-left: -4%">
                @if($sp_tk->GIA_NIEM_YET==0)
                <span class="price">{{number_format($sp_tk->GIA_BAN)}}đ</span>
                @else
                <span class="strike">{{number_format($sp_tk->GIA_NIEM_YET)}}đ</span>
                <span class="price">{{number_format($sp_tk->GIA_BAN)}}đ</span>
                @endif
            </p>
            <p>-------------------------------------</p>
            <h2 style="color: black;" !important>
                <p style="height: auto">{{$sp_tk->THONG_SO_KY_THUAT}}</p>
            </h2>
            <div class="button"><span><img src="{{asset('images/cart.jpg')}}" alt="" /><a href="{{url('Add_Cart',$sp_tk->ID_SP)}}" class="cart-button" style="width:100%">Thêm vào giỏ</a></span> </div>
            @if($sp_tk->ID_NSX==8 or $sp_tk->ID_NSX==9 or $sp_tk->ID_NSX==10 )
            <div class="button"><span><a href="{!!url('Sg_product_watch',$sp_tk->ID_SP)!!}" class="details" style="margin-left: 40%">Xem</a></span></div>
            @else
            <div class="button"><span><a href="{!!url('Sg_product',$sp_tk->ID_SP)!!}" class="details" style="margin-left: 40%">Xem</a></span></div>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection