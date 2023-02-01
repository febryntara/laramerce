<!-- Footer Container -->
<footer class="footer-container typefooter-1">
    <!-- Footer Top Container -->
    <div class="footer-top">
        <div class="container ftop">
            <div class="module footer-services ">
                <div class="block-infos">
                    <div class="info info1">
                        <div class="inner">
                            <i class="fa fa-truck"></i>
                            <div class="info-cont">
                                <span class="font-ct">free delivery</span>
                                <p>From 275 AED</p>
                            </div>
                        </div>
                    </div>
                    <div class="info info2">
                        <div class="inner">
                            <i class="fa fa-money"></i>
                            <div class="info-cont">
                                <span class="font-ct">cash delivery</span>
                                <p>From 275 AED</p>
                            </div>
                        </div>
                    </div>
                    <div class="info info3">
                        <div class="inner">
                            <i class="fa fa-gift"></i>
                            <div class="info-cont">
                                <span class="font-ct">free gift box</span>
                                <p>&amp; gift note</p>
                            </div>
                        </div>
                    </div>
                    <div class="info info4">
                        <div class="inner">
                            <i class="fa fa-phone-square"></i>
                            <div class="info-cont">
                                <span class="font-ct">contact us</span>
                                <p>123 456 789</p>
                            </div>
                        </div>
                    </div>
                    <div class="info info5">
                        <div class="inner">
                            <i class="fa fa-diamond"></i>
                            <div class="info-cont">
                                <span class="font-ct">Loyalty</span>
                                <p>Rewarded</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer Top Container -->

    <div class="footer-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-4 col-xxs-6 col-xs-12 col-style">
                    <div class="module custom_link ">
                        <div class="module clearfix">
                            <h3 class="footertitle">Our Brands</h3>
                            <ul id="menu-our-shops" class="menu">
                                @foreach ($brands as $item)
                                    <li class="menu-product-support"><a class="item-link" href="#"><span
                                                class="menu-title">{{ $item->name }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-4 col-xxs-6 col-xs-12 col_q1wn  col-style">
                    <div class="module  ">
                        <div class="footer-block">
                            <div class="footer-block-title">
                                <h3 class="footertitle">My Account</h3>
                            </div>
                            <div class="footer-block-content">
                                <ul class="links-footer">
                                    <li><a title="Account" href="my-account.html">My Account</a></li>
                                    <li><a title="Checkout" href="checkout.html">Checkout</a></li>
                                    <li><a title="History" href="order-history.html">Order History</a></li>
                                    <li><a title="Help Center" href="#">Help Center</a></li>
                                    <li><a title="Privacy Policy" href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-6 col-xxs-6 col-xs-12 col-style">
                    <div class="box-service box-footer">
                        <div class="module clearfix">
                            <h3 class="footertitle">Services</h3>
                            <div class="modcontent">
                                <ul class="menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="sitemap.html">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-style footer-contact">
                    <div class="module">
                        <div class="module footer-contact clearfix">
                            <h3 class="footertitle">Contact Us</h3>
                            <ul>
                                <li><i class="fa fa-map-marker"></i><span>Address : Jl. Bypass Ngurah Rai No.90, Sanur,
                                        Denpasar Selatan, Kota Denpasar, Bali 80228</span></li>
                                <li class="email"><i class="fa fa-envelope-o"></i>Email : info@urbanadventure.com
                                </li>
                                <li><i class="fa fa-mobile"></i><span>Phone 1 :
                                        (+6287820020035)</span><span>Phone 2 : (+6287820020035)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-style">
                    <div class="module custom_categories ">
                        <div class="categories-footer">
                            <div class="col-sm-12 copyright">
                                Urban Adventure © 2022 - 2018. All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Back To Top-->
    <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
</footer>
<!-- //end Footer Container -->
