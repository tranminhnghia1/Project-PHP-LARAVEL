@extends('layouts.client')

@section('content')
    <div id="main-content-wp" class="clearfix detail-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Điện thoại</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="main-content fl-right">
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="" title="" id="main-thumb">
                                <img style="width: 343px" id="zoom" src="{{ asset($detail_product->product_thumb) }}"
                                    data-zoom-image="{{ asset($detail_product->product_thumb) }}" />
                            </a>
                            <div id="list-thumb">
                                @foreach ($productImage as $product)
                                    <a href="" data-image="{{ asset("uploads\\$product") }}"
                                        data-zoom-image="{{ asset("uploads\\$product") }}">
                                        <img style="width: 343px" id="zoom" src="{{ asset("uploads\\$product") }}" />
                                    </a>
                                @endforeach


                            </div>
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="public/images/img-pro-01.png" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name">{{ $detail_product->name }}</h3>
                            <div class="desc">
                                {!! $detail_product->content_desc !!}
                            </div>
                            <div class="num-product">
                                <span class="title">Sản phẩm: </span>
                                <span class="status">Còn hàng({{ $detail_product->number_product }})</span>
                            </div>
                            <p class="price">{{ number_format($detail_product->price_product, 2, ',', '.') }}đ</p>
                            <form action="{{ route('add_cart_detail', $detail_product->id) }}" method="GET">
                                @csrf
                                <div id="num-order-wp">
                                    <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                    <input type="text" name="num" value="1" id="num-order">
                                    <a title="" id="plus"><i class="fa fa-plus"></i></a>
                                </div>

                                {{-- <a href="{{ route('cart.add', $detail_product->id) }}" title="Thêm giỏ hàng"
                                    class="add-cart">Thêm giỏ hàng</a> --}}
                                <button onclick="location.href='{{ route('add_cart_detail', $detail_product->id) }}'"
                                    class="add-cart">Thêm giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
              
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail product-content">
                        {!! $detail_product->content !!}
                        <div id="bg-article" style="display: block;"></div>
                        <div class="more button-see">Xem thêm</div>
                    </div>
                </div>
                <div class="section" id="feature-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Cùng chuyên mục</h3>
                    </div>
                    <div class="section-detail">

                        <ul class="list-item">
                            @foreach ($sameCategory as $item)
                                <li>
                                    <a href="{{ route('detailProduct', $item->id).$item->slug_product  }}" title="" class="thumb">
                                        <img style="height: 157.83px;" src="{{ asset($item->product_thumb) }}">
                                    </a>
                                    <a style="height: 34px;" href="{{ route('detailProduct', $item->id).$item->slug_product  }}"
                                        title="" class="product-name">{{ $item->name }}</a>
                                    <div class="price">
                                        <span
                                            class="new">{{ number_format($item->price_product, 0, ',', '.') }}đ</span>
                                        <span
                                            class="old">{{ number_format($item->price_product * 1.3, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="{{ route('cart.add', $item->id) }}" title=""
                                            class="add-cart fl-left">Thêm giỏ
                                            hàng</a>
                                        <a href="{{ route('detailProduct', $item->id).$item->slug_product  }}" title=""
                                            class="buy-now fl-right">Xem chi tiết</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidebar fl-left">
                <div class="section" id="category-product-wp">
                    @include('client.components.sidebar-productCat')
                </div>
                <div class="section" id="selling-wp">
                    @include('client.components.sidebar-productTop')
                </div>
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="" title="" class="thumb">
                            <img src="public/images/banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #main-thumb .zoomWrapper img {
            width: 343px !important;
            position: absolute;
            height: auto !important;
        }

        /* cuộn content */
        #post-product-wp .product-content.active {
            height: auto;
            overflow: unset;
            margin-bottom: 72px;
        }
    
        #post-product-wp .product-content {
            position: relative;
            height: 600px;
            overflow: hidden;
            transition: all 0.3s linear;
        }
    
        .button-see {
            background-color: #fff;
            border: 1px solid #ff0251;
            color: #ff0251;
            transition: 0.3s;
            border-radius: 5px;
        }
    
        .more {
            position: absolute;
            display: inline-block;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            min-width: 250px;
            padding: 6px 0;
            text-align: center;
            color: red;
            text-transform: uppercase;
            font-weight: 400;
            cursor: pointer;
            display: inline-block;
        }
        #bg-article {
        background: linear-gradient(to bottom, rgba(255 255 255/0), rgba(255 255 255/62.5), rgba(255 255 255/1));
        bottom: 0px;
        height: 105px;
        left: 0;
        position: absolute;
        width: 100%;
    }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
    
            let product_wp = $('#post-product-wp').offset().top;
            $(".button-see").click(function() {
                alert('ok');
                // $(this).text($(this).text() == 'Xem thêm' ? 'Thu gọn' : 'Xem thêm');
                // $(this).parent().toggleClass('active');
                // if ($(this).text() == 'Xem thêm') {
                //     $('html,body').animate({
                //         scrollTop: product_wp
                //     }, 500);
                // }
            })
        })
    </script>
    
    
@endsection
