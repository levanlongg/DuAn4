@extends('Page.Master')
@section('Content')
<div class="content">
    <div class="content_top">
        <div class="heading">
            <h3>Điện thoại</h3>
        </div>
        <div class="show">
            <p>Bạn đang xem {{count($data_sp_smp)}} điện thoại
            </p>
        </div>
        <div class="page-no">
            <p>
                <ul>
                    <li>{{$data_sp_smp->links()}}</li>
                </ul>
            </p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="section group">
        @foreach($data_sp_smp as $data_sp_smp)
        <div class="grid_1_of_4 images_1_of_4" style="margin-left: 1%" !important>
            <a href="preview-3.html"><img src="./image_sp/{{$data_sp_smp->HINH_ANH_1}}" alt="{{$data_sp_smp->TEN_SAN_PHAM}}" /></a>
            <div class="discount">
                <span class="percentage">-{{$data_sp_smp->SALE}}%</span>
            </div>
            <h2>{{$data_sp_smp->TEN_SAN_PHAM}}</h2>
            <p style="margin-left: -4%">
                @if($data_sp_smp->GIA_NIEM_YET==0)
                <span class="price">{{number_format($data_sp_smp->GIA_BAN)}}đ</span>
                @else
                <span class="strike">{{number_format($data_sp_smp->GIA_NIEM_YET)}}đ</span>
                <span class="price">{{number_format($data_sp_smp->GIA_BAN)}}đ</span>
                @endif
            </p>
            <p>-------------------------------------</p>
            <h2 style="color: black;"><p style="height:auto"!important>{{$data_sp_smp->THONG_SO_KY_THUAT}}</p></h2>
            
            <div class="button"><span><img src="images/cart.jpg" alt="" /><a href="{{url('Add_Cart',$data_sp_smp->ID_SP)}}" class="cart-button" style="width:100%">Thêm vào giỏ</a></span> </div>
            <div class="button"><span><a href="{!!url('Sg_product',$data_sp_smp->ID_SP)!!}" class="details" style="margin-left: 40%">Xem</a></span></div>
        </div>
        @endforeach
    </div>
</div>
@endsection