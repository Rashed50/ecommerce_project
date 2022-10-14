<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">

                @php
                    $companyProfileData = App\Models\CompanyProfile::orderBy('comp_name_en', 'ASC')->get();
                @endphp

                <div class="col-xs-12 col-sm-6 col-md-3 ">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    @foreach ($companyProfileData as $companyInfo)
                        <div class="module-body">
                            <ul class="toggle-footer" style="">

                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $companyInfo->comp_address }}</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>+{{ $companyInfo->comp_phone1 }}<br>+{{ $companyInfo->comp_phone2 }} </p>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3 ">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li><a href="#" title="faq">FAQ</a></li>
                            <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                            <li class="last"><a href="#" title="Send us feedback"> {{  $companyInfo->comp_email1 }} </a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->
                @endforeach

                <div class="col-xs-12 col-sm-6 col-md-3 ">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href=" {{ route('frontend-about') }} ">About us</a></li>
                            <li><a title="Addresses" href=" {{ route('frontend') }} ">Company</a></li>
                            <li class=" last"><a href=" {{ route('frontend-contact') }} " title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3 ">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                            <li><a title="Information" href="#">Customer Service</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="https://www.facebook.com/" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="https://twitter.com/" title="Twitter"></a></li>
                    <li class="whatsapp pull-left"><a target="_blank" rel="nofollow" href="https://web.whatsapp.com/" title="WahtsApp"></a></li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="https://www.linkedin.com/" title="Linkedin"></a></li>
                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="https://www.youtube.com/" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding " style="margin: 0px">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src=" {{ asset('frontend') }}/assets/images/payments/1.png" alt=""></li>
                        <li><img src=" {{ asset('frontend') }}/assets/images/payments/2.png" alt=""></li>
                        <li><img src=" {{ asset('frontend') }}/assets/images/payments/3.png" alt=""></li>
                        <li><img src=" {{ asset('frontend') }}/assets/images/payments/4.png" alt=""></li>
                        <li><img src=" {{ asset('frontend') }}/assets/images/payments/5.png" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
