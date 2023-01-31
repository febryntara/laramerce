@extends('layouts.front-layout')
@section('body')
    <div class="res layout-1 layout-subpage">
        <div id="wrapper" class="wrapper-fluid banners-effect-5">
            @include('frontpage.frontpage-navbar')
            <!-- Main Container  -->
            <div class="main-container container">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                    <li><a href="#">Site Map</a></li>
                </ul>
                
                <div class="row">
                    <div id="content" class="col-sm-12">
                        
                        <h2 class="title">Site Map</h2>
                        <div class="row">
                            
                            <div class="col-md-5 col-sm-6">
                                <ul class="simple-list arrow-list bold-list">
                                    
                                    <li><a href="category.html">Pages</a>
                                        <ul>
                                            <li><a href="category.html">Login</a></li>
                                            <li><a href="category.html">Register</a></li>
                                            <li><a href="category.html"></a>Wishlist</li>
                                        </ul>
                                    </li>
                                
                                    <li><a href="category.html">Product by Category</a>
                                        <ul>
                                            <li><a href="category.html">Perfumes</a> </li>
                                            <li><a href="category.html">Makeup</a> </li>
                                            <li><a href="category.html">Sun Care</a> </li>
                                            <li><a href="category.html">Skin Care</a> </li>
                                            <li><a href="category.html">Eye Care</a> </li>
                                            <li><a href="category.html">Hair Care</a> </li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Product by Brands</a>
                                        <ul>
                                            <li><a href="category.html">Toys</a> </li>
                                            <li><a href="category.html">Games</a>
                                                <ul>
                                                    <li><a href="category.html">test 25</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="category.html">Puzzles</a> </li>
                                            <li><a href="category.html">Hobbies</a> </li>
                                            <li><a href="category.html">Strollers</a> </li>
                                            <li><a href="category.html">Health &amp; Safety</a> </li>
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