<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown ">
        <div class="container">
            <div class="row">
                <!--Company Logo-->
                <div class="col-md-2">
                    <!-- ============================================================= LOGO ============================================================= -->
                    @php
                    $companyProfileData = App\Models\CompanyProfile::orderBy('comp_name_en', 'ASC')->get();
                    @endphp
                    @foreach ($companyProfileData as $companyData)
                    <div class="logo" style="margin: 10px;">
                        <a href=" {{ route('frontend') }} ">

                            {{-- <img src=" {{ asset('frontend') }}/assets/images/logo.png" alt="header-image"
                            height="70px" width="100px"> --}}
                            <img src=" {{ asset($companyData->comp_profile_img) }} " alt="" height="80" width="100" style="border-radius:10px">

                        </a>
                    </div><!-- /.logo -->
                    @endforeach

                </div>
                <div class="col-md-6">
                    <!-- Moving Text-->
                    <marquee style="color:red;font-size:40px;padding: 30px;font-family: Arial, Helvetica, sans-serif;">A great hairstyle is the best accessory. The right hairstyle can make a plain woman beautiful & a beautiful woman unforgettable.</marquee>
                </div>
                <!-- Checkout Login/Logout Menu-->
                <div class="col-md-4">
                    <div class="header-top-inner" style="margin-top: 20px;">
                        <div class="cnt-account">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                                <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                                <li>
                                    @auth
                                    <a href="{{ route('user-dashboard') }}"><i class="fa fa-tachometer"></i>
                                        Dashboard</a>
                                    @else
                                    {{-- <a href="#"><i class="icon fa fa-user"></i>My Profile</a> --}}
                                    @endauth
                                </li>
                                <li>
                                    @auth
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off" aria-hidden="true"></i>
                                        Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @else
                                    <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a>
                                    @endauth
                                </li>
                            </ul>
                        </div><!-- /.cnt-account -->
                        <div class="clearfix"></div>
                    </div><!-- /.header-top-inner -->
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.header-top -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href=" {{ route('frontend') }} ">Home</a>
                                </li>

                                <li class=" dropdown yamm-fw">
                                    <a href=" {{ route('frontend-about') }} ">About Us</a>
                                </li>

                                <li class=" dropdown yamm-fw">
                                    <a href=" {{ route('frontend-contact') }} ">Contact Us</a>
                                </li>

                                @php
                                $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                @endphp
                                @foreach ($categories as $category)
                                <li class="dropdown yamm mega-menu">
                                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"> {{ $category->category_name_en }} </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    @php
                                                    $subcategories = App\Models\Subcategory::where('category_id',
                                                    $category->category_id)->orderBy('subcategory_name_en',
                                                    'ASC')->get();
                                                    @endphp
                                                    @foreach ($subcategories as $subcategory)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <a href="">
                                                            <h2 class="title"> {{ $subcategory->subcategory_name_en }}
                                                            </h2>
                                                        </a>

                                                        @php
                                                        $brands = App\Models\Brand::where('subcategory_id',
                                                        $subcategory->subcategory_id)->orderBy('brand_name_en',
                                                        'ASC')->get();
                                                        @endphp
                                                        <ul class="links">
                                                            @foreach ($brands as $brand)
                                                            <li><a href="#"> {{ $brand->brand_name_en }} </a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div><!-- /.col -->
                                                    @endforeach
                                                </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach

                            </ul><!-- /.navbar-nav -->

                            <div class="clearfix"></div>
                        </div><!-- /.nav-outer -->
                    </div><!-- /.navbar-collapse -->


                </div><!-- /.nav-bg-class -->
            </div><!-- /.navbar-default -->
        </div><!-- /.container-class -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>