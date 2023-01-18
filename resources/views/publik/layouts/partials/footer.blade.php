<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Wikrama' Shop menyediakan product dan jasa untuk masyarakat</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>SMK Wikrama Bogor</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>0251-824211</a></li>
                            <li><a href="mailto:prohumasi@smkwikrama.sch.id"><i class="fa fa-envelope-o"></i>prohumasi@smkwikrama.sch.id</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="{{ route('menu.utama') }}">My Account</a></li>
                            @if(isAdminMain() != 'admin')
                            <li><a href="{{ route('pages.shoppingcart') }}">Keranjang Belanja</a></li>
                            <li><a href="{{ route('checkout.index') }}">Daftar Transaksi</a></li>
                            @endif
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        {{-- <h3 class="footer-title">Sponsor</h3> --}}
                        <img src="{{ asset('/assets/img/logo-wk.png') }}" width="100px" alt="">
                        <img src="{{ asset('/assets/img/logo-ids.jpeg') }}" width="100px" alt="">
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://instagram.com/yazz_803" target="_blank">M. Yazid Akbar</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
                <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->