@extends('layouts.front-layout')
@section('body')
    <div class="res layout-1 layout-subpage">
        <div id="wrapper" class="wrapper-fluid banners-effect-5">
            @include('frontpage.frontpage-navbar')
            <div class="main-container">
                <i class="fa fa-heart ty-icon1 align-center"></i>    
                <h1 class="ty-h1">
                    <strong>Thanks for Purchasing</strong>
                </h1>
                <h3 class="align-center">
                    You're all set. You'll receive an receipt of your order
                </h3>
                <a href="{{ route('main') }}"><h2 class="align-center mt-5">
                    <i class="fa fa-home"></i> Return to Homepage
                </h2></a>
            </div>
            <!-- //Main Container -->
            {{-- @include('frontpage.frontpage-footer') --}}
        </div>
    </div>

    <style>
        .ty-icon1{
            margin-top: 5rem;
            font-size: 70px;
        }
        .ty-h1{
            text-align: center;
            font-size: 70px;
        }
    </style>
@endsection