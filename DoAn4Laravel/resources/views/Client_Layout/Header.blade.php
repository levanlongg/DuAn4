<div class="header_top">
    <div class="logo">
        <a href="index.html"><img src="{{asset('images/logo.png')}}" alt="logo" /></a>
    </div>
    <div class="header_top_right">
        <div class="search_box">
            <form role="Search" method="get" id="Searchfrom" action="{!!url('Search')!!}">
                <input type="text" name="key" placeholder="Tìm kiếm" style="height: 100%;"><input type="submit" value="SEARCH" style="height: 100%;" !important>
            </form>
        </div>
        @if(Session::has('Cart') !=null)
        <div class="shopping_cart">
            <div class="cart">
                <a href="{{url('Cart')}}" title="Xem giỏ hàng" rel="nofollow">
                    <strong class="opencart"></strong>
                    <span class="cart_title">{{number_format(Session('Cart')->totalPrice)}} đ</span>
                    <span class="no_product">({{Session('Cart')->totalQty}})</span>
                </a>
            </div>
        </div>
        @endif
        @if(Session::has('Cart') ==null)
        <div class="shopping_cart">
            <div class="cart">
                <a href="#" title="View my shopping cart" rel="nofollow">
                    <strong class="opencart"></strong>
                    <span class="cart_title">0 đ</span>
                    <span class="no_product">(empty)</span>
                </a>
            </div>
        </div>
        @endif
        <div class="currency" title="currency">
            <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents: function() {
                        var obj = this;

                        obj.dd.on('click', function(event) {
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

                $(function() {

                    var dd = new DropDown($('#currency'));

                    $(document).click(function() {
                        // all dropdowns
                        $('.wrapper-dropdown').removeClass('active');
                    });

                });
            </script>
        </div>
        <div class="login">
            @if(Auth::check())
            <span><a href="{!!url('Signin')!!}"><img src="{{asset('images/login.png')}}" alt="login" title="{{Auth::user()->name}}" /></a></span>
            @else
            <span><a href="{!!url('Signin')!!}"><img src="{{asset('images/login.png')}}" alt="login" title="login" /></a></span>
            @endif
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="h_menu">
    <a id="touch-menu" class="mobile-menu" href="#">Menu</a>
    <nav>
        <ul class="menu list-unstyled">
            <li><a href="{!!url('Home')!!}">Trang chủ</a></li>
            <li class="activate"><a href="{!!url('Product')!!}">Sản phẩm</a>
                <ul class="sub-menu list-unstyled">
                    <div class="nag-mother-list">
                        <div class="navg-drop-main">
                            <div class="navg-drop-main">
                                <p style="color: red; margin-left:2%" !important>Điện thoại</p>
                                @foreach($menu_dt as $menusp)
                                <div class="nav-drop">
                                    <li><a href="{!!url('Phone',$menusp->ID_NSX)!!}">{{$menusp->TEN_DANH_MUC}}</a></li>
                                </div>
                                @endforeach
                                <div class="clear"> </div>
                            </div>
                            <div class="navg-drop-main">
                                <p style="color: red; margin-left:2%" !important>Đồng hồ</p>
                                @foreach($menu_dh as $menusp1)
                                <div class="nav-drop">
                                    <li><a href="{!!url('Watch',$menusp1->ID_NCC)!!}">{{$menusp1->TEN_DANH_MUC}}</a></li>
                                    <!--<li><a href="Watch/{{$menusp1->ID_NCC}}">{{$menusp1->TEN_DANH_MUC}}</a></li>-->
                                </div>
                                @endforeach
                                <div class="clear"> </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            <li><a href="{!!url('Services')!!}">Dịch vụ</a></li>
            <li><a href="{!!url('About')!!}">Giới thiệu</a></li>
            <li><a href="{!!url('Policy')!!}">Chính sách</a></li>
            <li><a href="{!!url('Contact')!!}">Liên hệ</a></li>
            <li><a href="{!!url('AdminLogin')!!}">Quản trị</a></li>
            <div class="clear"> </div>
        </ul>
    </nav>
    <script src="{{asset('js/menu.js')}}" type="text/javascript"></script>
</div>