<div id="header-wp">
    <div id="head-top" class="clearfix">
        <div class="wp-inner">
            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
            <div id="main-menu-wp" class="fl-right">
                <ul id="main-menu" class="clearfix">
                    <li>
                        <a href="{{ route('homePage') }}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{ route('product-list') }}" title="">Sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{ route('list_blog') }}" title="">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('introduce') }}" title="">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" title="">Liên hệ</a>
                    </li>
                    {{-- @foreach ($pages as $item)
                        <li>
                            <a href="{{ route('list_page', $item->id) }}"
                                title="{{ $item->name }}">{{ $item->name }}</a>
                        </li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
    </div>
    <div id="head-body" class="clearfix">
        <div class="wp-inner">
            <a href="{{ route('homePage') }}" title="" id="logo" class="fl-left"><img
                    src="{{ asset('client/images/logo.png') }}" /></a>
            <div id="search-wp" class="fl-left">
                <form method="POST" action="{{ route('search_product') }}">
                    @csrf
                    <input type="text" name="keyword" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!" value="{{ request()->input('keyword') }}"> 
                    <button type="submit" id="sm-s"name="btn-search">Tìm kiếm</button>
                </form>
            </div>
            <div id="action-wp" class="fl-right">
                <div id="advisory-wp" class="fl-left d-flex mx-2">
                    <img style="
                        width: 53px;
                        position: absolute;
                        right: 136px;
                        top:12px;
                    "
                        class="icon-phone"
                        src="https://media1.giphy.com/media/mbW2nvTE0TUc5IgRMm/giphy.gif?cid=6c09b952zt437d67rjkizo3c18jt9vkq7zt9blk1l5bx6wxs&rid=giphy.gif&ct=s"
                        alt="">
                    <div>
                        <span class="title">Tư vấn(Nghĩa)</span>
                        <span class="phone">0987.654.321</span>
                    </div>

                </div>
                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                <a href="{{ route('cart.list') }}" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="num cart-count">{{ Cart::count() }}</span>
                </a>
                <div id="cart-wp" class="fl-right">
                    <div id="btn-cart">
                        <a href="{{ route('cart.list') }}" style="color: #fff; display: block;">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span id="num cart-count">{{ Cart::count() }}</span>
                        </a>

                    </div>
                    <div id="dropdown">
                        <p class="desc">Có <span id="cart-count">{{ Cart::count() }} sản phẩm</span> trong giỏ hàng</p>
                        <ul class="list-cart">
                            @foreach (Cart::content() as $product)
                                {
                                <li class="clearfix">
                                    <a href="" title="" class="thumb fl-left">
                                        <img src="{{ asset($product->options->thumnail) }}" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="" title="" class="product-name">{{ $product->name }}</a>
                                        <p class="price">{{ number_format($product->price, 0, ',', '.') }}đ</p>
                                        <p class="qty">Số lượng: <span>{{ $product->qty }}</span></p>
                                    </div>
                                </li>

                                }
                            @endforeach

                        </ul>
                        <div class="total-price clearfix">
                            <p class="title fl-left">Tổng:</p>
                            <p class="price fl-right">{{ Cart::total() }}đ</p>
                        </div>
                        <div class="action-cart clearfix">
                            <a href="{{ route('cart.list') }}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                            <a href="{{ route('checkout') }}" title="Thanh toán" class="checkout fl-right">Thanh
                                toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
