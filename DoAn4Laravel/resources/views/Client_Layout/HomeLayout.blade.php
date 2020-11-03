@extends('Page.Master')
@section('Content')

<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            @foreach($data_sp as $item1)
            <div class="listview_1_of_2 images_1_of_2" style="height:auto" !important>
                <div class="listimg listimg_2_of_1">
                    <a href="{!!url('Sg_product',$item1->ID_SP)!!}"> <img src="./image_sp/{{$item1->HINH_ANH_1}}" alt="{{$item1->TEN_SAN_PHAM}}" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>{{$item1->TEN_SAN_PHAM}}</h2>
                    <p style="height:auto" !important>{{$item1->THONG_SO_KY_THUAT}}</p>
                    <div class="button"><span><a href="{!!url('Add_Cart',$item1->ID_SP)!!}">Thêm vào giỏ</a></span></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($data as $item)
                    <li>
                        <img src="./image_sp/slide/{{$item->HINH_ANH}}" alt="{{$item->TEN_HINH_ANH}}" style="height: 340px; width:320px; margin-left:auto; margin-right:auto" !important />
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Điện thoại</h3>
            </div>
            <div class="show">
                <p>Bạn đang xem {{count($data_spdt)}} điện thoại</p>
            </div>
            <div class="page-no">
                <p>
                    <ul>
                        <li>
                            {{$data_spdt->links()}}
                        </li>
                    </ul>
                </p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            @foreach($data_spdt as $item_spdt)
            <div class="grid_1_of_4 images_1_of_4" style="margin-left: 1%" !important>
                <a href="{!!url('Sg_product',$item_spdt->ID_SP)!!}"><img src="./image_sp/{{$item_spdt->HINH_ANH_1}}" alt="{{$item_spdt->TEN_SAN_PHAM}}" /></a>
                <div class="discount">
                    <span class="percentage">-{{$item_spdt->SALE}}%</span>
                </div>
                <h1 style="color: brown">{{$item_spdt->TEN_SAN_PHAM}}</h1>
                <p style="margin-left: -4%">
                    @if($item_spdt->GIA_NIEM_YET==0)
                    <span class="price">{{number_format($item_spdt->GIA_BAN)}}đ</span>
                    @else
                    <span class="strike">{{number_format($item_spdt->GIA_NIEM_YET)}}đ</span>
                    <span class="price">{{number_format($item_spdt->GIA_BAN)}}đ</span>
                    @endif
                </p>
                <p>-------------------------------------</p>
                <h2 style="color: black;" !important>
                    <p style="height: auto">{{$item_spdt->THONG_SO_KY_THUAT}}</p>
                </h2>
                <!-- <div class="button"><span><img src="{{asset('images/cart.jpg')}}" alt="cart" /><a onclick="Add_Cart('{{$item_spdt->ID_SP}}')" href="javascript:" class="cart-button" style="width:100%">Thêm vào giỏ</a></span> </div> -->
                <div class="button"><span><img src="{{asset('images/cart.jpg')}}" alt="cart" /><a href="{{url('Add_Cart',$item_spdt->ID_SP)}}" class="cart-button" style="width:100%">Thêm vào giỏ</a></span> </div>
                <div class="button"><span><a href="{!!url('Sg_product',$item_spdt->ID_SP)!!}" class="details" style="margin-left: 40%">Xem</a></span></div>
            </div>
            @endforeach
        </div>
        <div class="content_top">
            <div class="heading">
                <h3>Đồng hồ thời trang:</h3>
            </div>
            <div class="show">
                <p>Bạn đang xem {{count($data_spdh)}} đồng hồ</p>
            </div>
            <div class="page-no">
                <p>
                    <ul>
                        <li>
                            {{$data_spdh->links()}}
                        </li>
                    </ul>
                </p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            @foreach($data_spdh as $item_spdh)
            <div class="grid_1_of_4 images_1_of_4" style="margin-left:1%" !important>
                <a href="{!!url('Sg_product_watch',$item_spdh->ID_SP)!!}"><img src="./image_sp/{{$item_spdh->HINH_ANH_1}}" alt="{{$item_spdh->TEN_SAN_PHAM}}" /></a>
                <div class="discount">
                    <span class="percentage">-{{$item_spdh->SALE}}%</span>
                </div>
                <h1 style="color: brown">{{$item_spdh->TEN_SAN_PHAM}}</h1>
                <p>
                    @if($item_spdh->GIA_NIEM_YET==0)
                    <span class="price">{{number_format($item_spdh->GIA_BAN)}}đ</span>
                    @else
                    <span class="strike">{{number_format($item_spdh->GIA_NIEM_YET)}}đ</span>
                    <span class="price">{{number_format($item_spdh->GIA_BAN)}}đ</span>
                    @endif
                </p>
                <p>-------------------------------------</p>
                <h2 style="color: black;" !important>
                    <p style="height: auto">{{$item_spdh->THONG_SO_KY_THUAT}}</p>
                </h2>
                <div class="button"><span><img src="{{asset('images/cart.jpg')}}" alt="cart" /><a href="{{url('Add_Cart',$item_spdh->ID_SP)}}" class="cart-button" style="width:100%">Thêm vào giỏ</a></span> </div>
                <div class="button"><span><a href="{!!url('Sg_product_watch',$item_spdh->ID_SP)!!}" class="details" style="margin-left: 40%">Xem</a></span></div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- <script>
    function Add_Cart(id)
    {
        $.ajax({
            url:'Add_Cart/'+id,
            type:'GET',
        }).done(function(response){
            console.log(response);
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
        });
    }
</script> -->
@endsection