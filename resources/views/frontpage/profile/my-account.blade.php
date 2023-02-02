@extends('layouts.front-layout')
@section('body')
    <div class="res layout-1 layout-subpage">
        <div id="wrapper" class="wrapper-fluid banners-effect-5">
            @include('frontpage.frontpage-navbar')
            <!-- Main Container  -->
            <div class="main-container container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('main') }}"><i class="fa fa-home"></i></a></li>
                    <li>
                        <p>Account</p>
                    </li>
                    <li>
                        <p>My Account</p>
                    </li>
                </ul>

                <div class="row">
                    <!--Middle Part Start-->
                    <div class="col-sm-9" id="content">
                        <h2 class="title">My Account</h2>
                        <p class="lead">Hello, <strong style="color: #00a2e9 !important;">{{ $user->name }}</strong></p>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <fieldset id="personal-details">
                                        <legend>Personal Details</legend>
                                        <div class="form-group">
                                            <label for="input-fullname" class="control-label"><strong>Full
                                                    Name</strong></label>
                                            <input type="text" class="form-control " id="input-fullname" readonly
                                                placeholder="Full Name" value="{{ $user->name }}" name="fullname">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-email" class="control-label"><strong>E-Mail</strong> </label>
                                            <input type="email" class="form-control" readonly id="input-email"
                                                placeholder="E-Mail" value="{{ $user->email }}" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-phone" class="control-label"><strong>Phone</strong> </label>
                                            <input type="tel" class="form-control" id="input-phone" readonly
                                                placeholder="phone" value="{{ $user->phone }}" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-address" class="control-label"><strong>Address</strong>
                                            </label>
                                            <input type="text" class="form-control" id="input-address" readonly
                                                placeholder="address" value="{{ $user->address }}" name="address">
                                        </div>
                                    </fieldset>
                                    <br>
                                </div>
                        </form>
                    </div>
                </div>
                <!--Middle Part End-->
                <!--Right Part Start -->
                <aside class="col-sm-3 hidden-xs" id="column-right">
                    <h2 class="subtitle">Account</h2>
                    <div class="list-group">
                        <ul class="list-item">
                            <li><a href="{{ route('wishlist') }}">Wish List</a>
                            </li>
                            <li><a href="{{ route('cart') }}">Carts</a>
                            </li>
                            <li><a href="{{ route('order-history') }}">Order History</a>
                            </li>
                        </ul>
                    </div>
                </aside>
                <!--Right Part End -->
            </div>
        </div>
        <!-- //Main Container -->
        @include('frontpage.frontpage-footer')
    </div>
    </div>
@endsection
