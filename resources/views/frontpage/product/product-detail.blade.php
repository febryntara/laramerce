@extends('layouts.front-layout')
@section('body')
    <div class="res layout-subpage layout-1 banners-effect-5">
        <div id="wrapper" class="wrapper-fluid">
            @include('frontpage.frontpage-navbar')
            <!-- Main Container  -->
            <div class="main-container container product-detail  desktop-offcanvas">
                <ul class="breadcrumb">
                    <li><a href="{{ route('main') }}"><i class="fa fa-home"></i></a></li>
                    <li>
                        <p>Products</p>
                    </li>
                    <li>
                        <p>{{ $product->name }}</p>
                    </li>

                </ul>

                <div class="row">
                    <!--Left Part Start -->
                    <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas" id="column-left">
                        <span id="close-sidebar" class="fa fa-times"></span>
                        <div class="module category-style">
                            <h3 class="modtitle"><i class="fa fa-tasks"></i>Categories</h3>
                            <div class="modcontent">
                                <div class="box-category">
                                    <ul id="cat_accordion" class="list-group">
                                        {{-- <li class="hadchild"><a href="category.html" class="cutom-parent">Smartphone &
                                                Tablets</a> <span class="button-view  fa fa-plus-square-o"></span>
                                            <ul style="display: block;">
                                                <li><a href="category.html">Men's Watches</a></li>
                                                <li><a href="category.html">Women's Watches</a></li>
                                                <li><a href="category.html">Kids' Watches</a></li>
                                                <li><a href="category.html">Accessories</a></li>
                                            </ul>
                                        </li> --}}
                                        @foreach ($categories as $category)
                                            <li class=""><a href="#"
                                                    class="cutom-parent">{{ $category->name }}</a> <span
                                                    class="dcjq-icon"></span></li>
                                        @endforeach

                                    </ul>
                                </div>


                            </div>
                        </div>
                        <div class="module product-simple best-seller">
                            <h3 class="modtitle">
                                <span><i class="fa fa-diamond fa-hidden"></i>Latest products</span>
                            </h3>
                            <div class="modcontent">
                                <div class="so-extraslider">
                                    <!-- Begin extraslider-inner -->
                                    <div class=" extraslider-inner">
                                        <div class="item ">
                                            @foreach ($products as $item)
                                                <div class="product-layout item-inner style1 ">
                                                    <div class="item-image">
                                                        <div class="item-img-info">
                                                            <a href="{{ route('product-detail', ['product' => $item]) }}"
                                                                target="_self" title="{{ $item->name }}">
                                                                <img src="{{ asset($item->images->count() ? 'storage/' . $item->images->first()->src : 'image/catalog/demo/product/80/8.jpg') }}"
                                                                    alt="{{ $item->name }}">
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-title">
                                                            <a href="#" target="_self"
                                                                title="{{ $item->name }}">{{ Str::words($item->name, 3, '...') }}
                                                            </a>
                                                        </div>
                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                        </div>
                                                        <div class="content_price price">
                                                            <span
                                                                class="product-price">{{ number_format($item->price, 0, '.', ',') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- End item-info -->
                                                    <!-- End item-wrap-inner -->
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <!--End extraslider-inner -->
                                </div>
                            </div>
                        </div>
                        <div class="module banner-left hidden-xs ">
                            <div class="banner-sidebar banners">
                                <div>
                                    <a title="Banner Image" href="#">
                                        <img src="{{ asset('image/catalog/banners/banner-sidebar.jpg') }}"
                                            alt="Banner Image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!--Left Part End -->
                    <!--Middle Part Start-->
                    <div id="content" class="col-md-12 col-sm-12">
                        <a href="javascript:void(0)" class=" open-sidebar "><i class="fa fa-bars"></i>Sidebar</a>
                        <div class="sidebar-overlay"></div>
                        <div class="product-view">
                            <div class="left-content-product">
                                <div class="row">
                                    <div class="content-product-left col-md-6 col-sm-12 col-xs-12">
                                        <div class="relative">
                                            <div class="absolute top-0 left-0">
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                            <div style="--swiper-navigation-color: #0000; --swiper-pagination-color: #0000"
                                                class="swiper mySwiper2">
                                                <div class="swiper-wrapper">
                                                    @foreach ($product->images as $index => $img)
                                                        <div class="swiper-slide"
                                                            style="display: flex; justify-content: center; align-items: center;">
                                                            <img itemprop="image" class="px-auto"
                                                                style="width: 600px; height: 500px;"
                                                                src="{{ asset('storage/' . $img->src) }}"
                                                                alt="{{ $img->name }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div thumbsSlider="" class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                @foreach ($product->images as $index => $img)
                                                    <div class="swiper-slide"
                                                        style="display: flex; justify-content: center; align-items: center;">
                                                        <img itemprop="image" class=""
                                                            style="width: 150px;height: 100px;object-fit: fill;object-position: center;"
                                                            src="{{ asset('storage/' . $img->src) }}"
                                                            alt="{{ $img->name }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-product-right col-md-6 col-sm-12 col-xs-12">
                                        <div class="title-product">
                                            <h1>{{ $product->name }}</h1>
                                        </div>
                                        <!-- Review ---->
                                        <div class="box-review">
                                            <div class="rating">
                                                <div class="rating-box">
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="fa fa-star-o fa-stack-1x"></i></span>
                                                </div>
                                            </div>
                                            <a class="reviews_button" href=""
                                                onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">2
                                                reviews</a>
                                            <span class="order-num">Orders (0)</span>
                                        </div>
                                        <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                            itemtype="http://data-vocabulary.org/Offer">
                                            <span class="price-new"><span itemprop="price" id="price-special">Rp
                                                    {{ number_format($product->price) }}</span></span>
                                            {{-- <span class="price-old" id="price-old">$242.00</span>
                                            <span class="label-product label-sale">
                                                -55%
                                            </span> --}}
                                            {{-- <div class="price-tax"><span>Tax</span> <span id="price-tax"> $90.00 </span>
                                            </div> --}}

                                        </div>

                                        <div class="product-box-desc">
                                            <div class="inner-box-desc">

                                                <div class="brand"><span>Brand:</span><a href="#">
                                                        {{ $product->brand->name }}</a>
                                                </div>
                                                <div class="model"><span>Product Code:</span>
                                                    {{ $product->product_code }}</div>
                                                <div class="model"><span>Condition:</span>
                                                    {{ $product->condition }}</div>
                                                <div class="stock"><span>Availability:</span> <i
                                                        class="fa fa-check-square-o"></i>
                                                    {{ $product->stock }}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="short_description form-group">
                                            <h3>OverView</h3>
                                            {!! Str::limit($product->description, 226) !!}
                                        </div>
                                        <div id="product">
                                            <h4>Available Option</h4>
                                            <div class="form-group box-info-product">
                                                <div class="option quantity">
                                                    <div class="input-group d-flex quantity-control" unselectable="on"
                                                        style="-webkit-user-select: none; width: 30%;">
                                                        <input class="form-control" style="padding: 0 8px;"
                                                            type="text" name="quantity" value="1"
                                                            id="product_amount_to_order">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->product_code }}">
                                                        <span class="input-group-addon product_quantity_down">−</span>
                                                        <span class="input-group-addon product_quantity_up">+</span>
                                                    </div>
                                                </div>
                                                <div class="cart">
                                                    <input type="button" data-toggle="tooltip" title=""
                                                        value="Add to Cart" data-loading-text="Loading..."
                                                        id="button-cart" class="btn btn-mega btn-lg"
                                                        onclick="cart.add('{{ $product->product_code }}', '{{ auth()->user() ? auth()->user()->id : 0 }}');"
                                                        data-original-title="Add to Cart">
                                                </div>
                                                <div class="add-to-links wish_comp">
                                                    <ul class="blank list-inline">
                                                        <li class="wishlist">
                                                            <a class="icon" data-toggle="tooltip" title=""
                                                                onclick="wishlist.add('{{ $product->product_code }}', {{ auth()->user() ? auth()->user()->id : 0 }});"
                                                                data-original-title="Add to Wish List"><i
                                                                    class="fa fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                            {{-- <div class="form-group social_share_detail clearfix">
                                                <label class="">SHARE THIS:</label>
                                                <ul>
                                                    <div class="addthis_inline_share_toolbox"></div>
                                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-529be2200cc72db5"></script>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <!-- end box info product -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Tabs -->
                        <div class="producttab clearfix">
                            <div class="tabsslider horizontal-tabs col-xs-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1">Description</a>
                                    </li>
                                    <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews
                                            (1)</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane fade active in">
                                        <p>{!! $product->description !!}</p>
                                    </div>
                                    <div id="tab-review" class="tab-pane fade">
                                        <form>
                                            <div id="review">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 50%;"><strong>Super
                                                                    Administrator</strong>
                                                            </td>
                                                            <td class="text-right">29/07/2015</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p>Best this product opencart</p>
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                                        <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                                        <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                                        <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-1x"></i><i
                                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                                        <span class="fa fa-stack"><i
                                                                                class="fa fa-star-o fa-stack-1x"></i></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="text-right"></div>
                                            </div>
                                            <h2 id="review-title">Write a review</h2>
                                            <div class="contacts-form">
                                                <div class="form-group"> <span class="icon icon-user"></span>
                                                    <input type="text" name="name" class="form-control"
                                                        value="Your Name"
                                                        onblur="if (this.value == '') {this.value = 'Your Name';}"
                                                        onfocus="if(this.value == 'Your Name') {this.value = '';}">
                                                </div>
                                                <div class="form-group"> <span class="icon icon-bubbles-2"></span>
                                                    <textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}"
                                                        onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
                                                </div>
                                                <span style="font-size: 11px;"><span class="text-danger">Note:</span>
                                                    HTML
                                                    is not translated!</span>

                                                <div class="form-group">
                                                    <b>Rating</b> <span>Bad</span>&nbsp;
                                                    <input type="radio" name="rating" value="1">
                                                    &nbsp;
                                                    <input type="radio" name="rating" value="2">
                                                    &nbsp;
                                                    <input type="radio" name="rating" value="3">
                                                    &nbsp;
                                                    <input type="radio" name="rating" value="4">
                                                    &nbsp;
                                                    <input type="radio" name="rating" value="5">
                                                    &nbsp;<span>Good</span>

                                                </div>
                                                <div class="buttons clearfix"><a id="button-review"
                                                        class="btn buttonGray">Continue</a></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //Product Tabs -->
                    </div>
                </div>
            </div>
            <!--Middle Part End-->
            <!-- //Main Container -->
            @include('frontpage.frontpage-footer')
        </div>
    </div>
@endsection
