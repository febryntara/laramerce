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
                        <p>Site Map</p>
                    </li>
                </ul>

                <div class="row">
                    <div id="content" class="col-sm-12">

                        <h2 class="title">Site Map</h2>
                        <div class="row">

                            <div class="col-md-5 col-sm-6">
                                <ul class="simple-list bold-list">

                                    <li>
                                        <h2>Pages</h2>
                                        <ul class="arrow-list">
                                            @foreach ($pages as $item)
                                                <li><a href="{{ $item['route'] }}">{{ $item['name'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li>
                                        <h2>Categories</h2>
                                        <ul class="arrow-list">
                                            @foreach ($categories as $item)
                                                <li><a href="{{ $item->route }}">{{ $item->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-5 col-sm-6">
                                <ul class="simple-list bold-list">
                                    <li>
                                        <h2>Brands</h2>
                                        <ul class="arrow-list">
                                            @foreach ($brands as $item)
                                                <li><a href="{{ $item->route }}">{{ $item->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <h2>Products</h2>
                                        <ul class="arrow-list">
                                            @foreach ($products as $item)
                                                <li><a href="{{ $item->route }}">{{ $item->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- //Main Container -->
            @include('frontpage.frontpage-footer')
        </div>
    </div>
@endsection
