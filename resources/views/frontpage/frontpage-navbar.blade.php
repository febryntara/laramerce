<header id="header" class=" typeheader-1">
    <!-- Header Top -->
    <div class="header-top hidden-compact" style="background-color: white!important;">
        <div class="container">
            <div class="row">
                {{-- <div class="header-top-left  col-lg-6 col-sm-5 col-md-6 hidden-xs">
                    <ul class="list-inlines">
                        <li class="hidden">
                            <span class="hidden">
                                Free 3 day delirery and free returns within the US
                            </span>
                            <a class="link-lg" href="register.html">Register </a> or
                            <a class="link-lg" href="login.html">Login </a>
                        </li>
                    </ul>
                </div> --}}
                <div class="header-top-left  col-lg-6 col-sm-5 col-md-6 hidden-xs"><a
                        href="https://goo.gl/maps/U68FA8N5Q5YsPpqw7" target="_blank">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Jl. Bypass Ngurah Rai No.90, Sanur,
                            Denpasar Selatan, Kota Denpasar, Bali 80228</span></a>
                </div>
                <div class="header-top-right collapsed-block col-lg-6 col-md-6 col-sm-7 col-xs-12"
                    style="background-color: white!important;">
                    <ul class="top-link list-inline">
                        @if (auth()->user())
                            <li class="log login"><a class="link-lg" href="{{ route('logout') }}">Logout </a></li>
                            <li class="account" id="my_account">
                                <a href="{{ route('my-account') }}" title="My Account " class="btn-xs dropdown-toggle"
                                    data-toggle="dropdown"> <span class="hidden-xs">My Account </span> <span
                                        class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu ">
                                    <li><a href="{{ route('my-account') }}">My Account </a></li>
                                    <li><a href="{{ route('order-history') }}">Order History </a></li>
                                    <li class="checkout"><a href="{{ route('checkout') }}" class="btn-link"
                                            title="Checkout "><span>Checkout </span></a></li>

                                </ul>
                            </li>
                        @else
                            <li class="log login"><a class="link-lg"
                                    href="{{ route('login') }}"><strong>Login</strong></a></li>
                        @endif


                        <li>
                            <a href="https://www.instagram.com/urbanadventure.co.id/"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/urbanadventure.co.id/"><i class="fa fa-facebook"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=6287820020035&text=Hello%20Urban%20Adventure%2C%20..."
                                target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </li>
                    </ul>



                </div>
            </div>
        </div>
    </div>
    <!-- //Header Top -->

    <!-- Header center -->
    <div class="header-center" style="background-color: #2d2d2d!important">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="navbar-logo col-md-12 col-sm-3 col-xs-10"
                    style="display: flex; justify-content: center; align-items: center;width: 35%;margin: 0 auto;">
                    <div class="logo"><a href="{{ route('main') }}"><img src="{{ asset('image/catalog/urban.png') }}"
                                title="Your Store" alt="Your Store" /></a></div>
                </div>
                <!-- //end Logo -->

                <!-- Main menu -->
                {{-- <div class="header-center-right main-menu  col-md-8 col-sm-9 col-xs-2">
                    <div class="megamenu-style-dev megamenu-dev">
                        <div class="responsive so-megamenu megamenu-style-dev">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  horizontal open ">
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse"
                                            class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="megamenu-wrapper">
                                        <span id="remove-megamenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container-mega"
                                                style="display: flex;
                                            flex-direction: row-reverse; background-color: #2d2d2d!important;">
                                                <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                    <li class="menu-home with-sub-menu hover">
                                                        <a href="{{ route('main') }}"
                                                            style="color: white!important;">Home</a>
                                                    </li>
                                                    <li class="with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a href="" class="clearfix"
                                                            style="color: white!important;">
                                                            <strong>Brands</strong>
                                                            <b class="caret"></b>
                                                        </a>
                                                        <div class="sub-menu">
                                                            <div class="content">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col-md-12 hover-menu">
                                                                                <div class="menu">
                                                                                    <ul>
                                                                                        @foreach ($brands as $item)
                                                                                            <li><a href="{{ route('brand', ['brand' => $item]) }}"
                                                                                                    class="main-menu">{{ $item->name }}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a href="" class="clearfix"
                                                            style="color: white!important;">
                                                            <strong>Categories</strong>


                                                            <b class="caret"></b>
                                                        </a>
                                                        <div class="sub-menu">
                                                            <div class="content">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col-md-12 hover-menu">
                                                                                <div class="menu">
                                                                                    <ul>
                                                                                        @foreach ($categories as $index => $item)
                                                                                            <li><a href="{{ route('category', ['category' => $item]) }}"
                                                                                                    class="main-menu">{{ $item->name }}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div> --}}
                <!-- //end Main menu -->
            </div>
        </div>
    </div>
    <!-- //Header center -->
    <!-- Header Bottom -->
    <div class="header-bottom hidden-compact">
        <div class="container">
            <div class="header-bottom-inner">
                <div class="row">
                    {{-- <div class="header-bottom-left menu-vertical col-md-3 col-sm-2 col-xs-2">
                        <div class="responsive so-megamenu megamenu-style-dev ">
                            <div class="so-vertical-menu ">
                                <nav class="navbar-default">

                                    <div class="container-megamenu vertical">
                                        <div id="menuHeading">
                                            <div class="megamenuToogle-wrapper">
                                                <div class="megamenuToogle-pattern">
                                                    <div class="container"
                                                        style="background-color: white!important; color:#2d2d2d!important;">
                                                        <b class="caret"
                                                            style="margin-right: 10px; margin-left: 0;"></b>
                                                        <span class="title-mega">All Categories</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="navbar-header">
                                            <button type="button" id="show-verticalmenu" data-toggle="collapse"
                                                class="navbar-toggle">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>
                                        <div class="vertical-wrapper">
                                            <span id="remove-verticalmenu" class="fa fa-times"></span>
                                            <div class="megamenu-pattern">
                                                <div class="container-mega">
                                                    <ul class="megamenu">
                                                        @foreach ($categories as $item)
                                                            <li class="item-vertical">
                                                                <p class="close-menu"></p>
                                                                <a href="{{ route('category', ['category' => $item]) }}"
                                                                    class="clearfix">
                                                                    <span>
                                                                        <strong>{{ $item->name }}</strong>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </nav>
                            </div>
                        </div>

                    </div> --}}
                    <div class="header-bottom-left col-md-6 col-sm-2 col-xs-2">
                        <div class="megamenu-style-dev megamenu-dev">
                            <div class="responsive so-megamenu megamenu-style-dev">
                                <nav class="navbar-default">
                                    <div class=" container-megamenu  horizontal open ">
                                        <div class="navbar-header">
                                            <button type="button" id="show-megamenu" data-toggle="collapse"
                                                class="navbar-toggle">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <div class="megamenu-wrapper">
                                            <span id="remove-megamenu" class="fa fa-times"></span>
                                            <div class="megamenu-pattern">
                                                <div class="container-mega">
                                                    <ul class="megamenu" data-transition="slide"
                                                        data-animationtime="250">
                                                        <li class="with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="{{ route('main') }}" class="clearfix">
                                                                <strong>Home</strong>
                                                            </a>
                                                        </li>
                                                        <li class="with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <strong>Categories</strong>
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" style=" display: none;">
                                                                <div class="content">
                                                                    <div class="row">
                                                                        <div class="menu">
                                                                            <ul>
                                                                                @foreach ($categories as $item)
                                                                                    <li
                                                                                        style="border-bottom: 1px solid #464646; width: 100%; padding-top: 10px;">
                                                                                        <a href="{{ route('category', ['category' => $item]) }}"
                                                                                            class="main-menu"><strong>{{ $item->name }}</strong></a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <strong>Our Brands</strong>
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" style=" display: none;">
                                                                <div class="content">
                                                                    <div class="row">
                                                                        <div class="menu">
                                                                            <ul>
                                                                                @foreach ($brands as $item)
                                                                                    <li
                                                                                        style="border-bottom: 1px solid #464646; width: 100%; padding-top: 10px;">
                                                                                        <a href="{{ route('brand', ['brand' => $item]) }}"
                                                                                            class="main-menu"><strong>{{ $item->name }}</strong></a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="{{ route('products') }}" class="clearfix">
                                                                <strong>Our Products</strong>
                                                            </a>
                                                        </li>


                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom-right col-md-6 col-sm-10 col-xs-10">

                        <!-- Search -->
                        <div class="header_search col-lg-3 col-md-8 col-sm-9 col-xs-4">

                            <button id="dropdownSearch" class="dropdown-toggle bt-search hidden"><i
                                    class="fa fa-search" aria-hidden="true"></i></button>
                            <div class="dropdown-menu dropdown-menu-search">
                                <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                                    <form method="GET" action="index.html">
                                        <div id="search0" class="search input-group form-group">
                                            <input class="autosearch-input form-control" type="text"
                                                value="" size="25" autocomplete="off"
                                                placeholder="Keyword here..." name="search">
                                            <span class="input-group-btn">
                                                <button type="submit" class="button-search btn btn-primary"
                                                    style="border-top-right-radius: 4px!important;
                                                border-bottom-right-radius: 4px!important;"
                                                    style="" name="submit_search"><i
                                                        class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                        <input type="hidden" name="route" value="product/search" />
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- //end Search -->
                        <!-- Secondary menu -->
                        <div class="header-right col-lg-3 col-md-3 col-sm-3 col-xs-8 pull-right">

                            <!--cart-->
                            <div class="block-cart">
                                <div class="shopping_cart">
                                    <div id="cart" class="btn-shopping-cart">

                                        <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <div class="shopcart">
                                                <span class="icon-c hidden">
                                                    <i class="fa fa-shopping-bag"></i>
                                                </span>
                                                <div class="shopcart-inner">
                                                    <p class="text-shopping-cart hidden">

                                                        My cart
                                                    </p>

                                                    @if (auth()->user())
                                                        <span class="total-shopping-cart cart-total-full">
                                                            <span class="items_cart"
                                                                id="cart-total-items">{{ auth()->user()->cart->count() }}</span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>

                                        <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                            <li>
                                                <table class="table table-striped">
                                                    <tbody id="cart-body-to-identify">
                                                        @if (auth()->user())
                                                            @forelse (auth()->user()->cart as $item)
                                                                @include('partials.cart-item')
                                                            @empty
                                                                <tr id="cart-no-product">
                                                                    <td colspan="5">No Product Added</td>
                                                                </tr>
                                                            @endforelse
                                                        @else
                                                            <tr id>
                                                                <td colspan="5">You Must Login First</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </li>
                                            @if (auth()->user())
                                                <li>
                                                    <div>
                                                        {{-- <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <strong>Sub-Total</strong>
                                                                </td>
                                                                <td class="text-right">$140.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><strong>Eco Tax
                                                                        (-2.00)</strong>
                                                                </td>
                                                                <td class="text-right">$2.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><strong>VAT
                                                                        (20%)</strong>
                                                                </td>
                                                                <td class="text-right">$20.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><strong>Total</strong>
                                                                </td>
                                                                <td class="text-right">$162.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table> --}}
                                                        <p class="text-center total-carts"> <a class="btn view-cart"
                                                                href="{{ route('cart') }}"><i
                                                                    class="fa fa-shopping-cart"></i>View
                                                                Cart</a>&nbsp;&nbsp;&nbsp; <a
                                                                class="btn btn-mega checkout-cart"
                                                                href="{{ route('checkout') }}"><i
                                                                    class="fa fa-share"></i>Checkout</a>
                                                        </p>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <!--//cart-->
                            <div class="header_custom_link">
                                <ul class="">
                                    <li class="wishlist"><a href="{{ route('wishlist') }}" id="wishlist-total"
                                            class="top-link-wishlist" id="wishlist-count" title="Wish List (0) "><i
                                                class="fa fa-heart"></i></a>
                                    </li>
                                    {{-- <li class="compare"><a href="compare.html" class="top-link-compare"
                                            title="Compare "><i class="fa fa-refresh"></i></a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
