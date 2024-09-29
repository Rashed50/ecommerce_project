@extends('frontend.layouts.master')
@section('title', 'Zeal Hair Fashion')
@section('content')
<div class="row">
    <!-- ============================================== SIDEBAR Categories Start ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
            <nav class="yamm megamenu-horizontal" role="navigation">
                <ul class="nav">
                    @php
                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                    @endphp
                    @foreach ($categories as $category)
                    <li class="dropdown menu-item">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{-- <i class="icon fa fa-shopping-bag" aria-hidden="true"></i> --}}
                            <img src=" {{ asset($category->category_image) }} " alt="" height="50" width="50">
                            {{-- Adding Spaces --}} &nbsp;
                            {{ $category->category_name_en }}
                        </a>
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                @php
                                $subcategories = App\Models\Subcategory::where('category_id',
                                $category->category_id)->orderBy('subcategory_name_en',
                                'ASC')->get();
                                @endphp
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        @foreach ($subcategories as $subcategory)
                                        <ul class="links list-unstyled">
                                            <li><a href="#"> {{ $subcategory->subcategory_name_en }} </a></li>
                                        </ul>
                                        @endforeach
                                    </div>

                                </div> <!-- /.row -->
                            </li><!-- /.yamm-content -->
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.menu-item -->
                    @endforeach
                </ul><!-- /.nav -->
            </nav><!-- /.megamenu-horizontal -->
        </div><!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->


</div><!-- /.sidemenu-holder -->
<!-- ============================================== SIDEBAR Categories Start  ============================================== -->

<!-- ============================================== CONTENT ============================================== -->
<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
    <!-- ========================================== SECTION – Slider Part Start ========================================= -->


        @php
            $banners = App\Models\Banner::where('banner_status', 1)->orderBy('banner_id', 'DESC')->limit(5)->get();
        @endphp
        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                @foreach ($banners as $banner)
                    <div class="item" style="background-image: url({{ asset($banner->banner_img) }});">
                        <div class="container-fluid">
                            <div class="caption bg-color vertical-center text-left">
                                <div class="slider-header fadeInDown-1">Top Brands1</div>
                                <div class="big-text fadeInDown-1">
                                    {{ $banner->banner_title_en }}
                                </div>

                                <div class="excerpt fadeInDown-2 hidden-xs">

                                    <span> {{ $banner->banner_subtitle_en }} </span>

                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="index6c11.html?page=single-product"
                                        class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                        Now</a>
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->
                @endforeach
            </div><!-- /.owl-carousel -->
        </div>

        <!-- ========================================= SECTION – Slider Part End  ========================================= -->


         <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">New Products</h3>
                <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                    <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                    @foreach ($categories as $category)
                        <li><a data-transition-type="backSlide" href="#catg_id{{ $category->category_id }} " data-toggle="tab"> {{ $category->category_name_en }} </a></li>
                    @endforeach
                </ul><!-- /.nav-tabs -->
            </div>

            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                    <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                            @foreach ($products as $product)
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ url('product-details/'. $product->product_id) }}">
                                                    <img src=" {{ asset($product->product_image1) }} " alt=""></a>

                                            </div><!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div><!-- /.product-image -->

                                        <div class="product-info text-left">

                                            <h3 class="name"><a href="{{ url('product-details/'. $product->product_id) }}"> {{ $product->product_name_en }} </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
                                                <span class="price">
                                                    ${{ $product->product_sale_price }}
                                                </span>
                                                <span class="price-before-discount">
                                                    ${{ $product->product_actual_price }}
                                                </span>
                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" onchange="addToCart()" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->

                                    </div><!-- /.product -->
                                </div><!-- /.products -->
                            </div><!-- /.item -->

                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </div><!-- /.product-slider -->
                </div><!-- /.tab-pane -->
                @foreach ($categories as $category)
                    <div class="tab-pane" id="catg_id{{ $category->category_id }}">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                {{-- Category Wise Product Show Start --}}
                                @php
                                    $categWiseProduct = App\Models\Product::where('category_id', $category->category_id)->orderBy('product_id', 'DESC')->get();
                                @endphp

                                @forelse ($categWiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ url('product-details/'. $product->product_id) }}">
                                                            <img src=" {{ asset($product->product_image1) }} " alt=""></a>
                                                    </div><!-- /.image -->

                                                    <div class="tag sale"><span>sale</span></div>
                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{ url('product-details/'. $product->product_id) }}"> {{ $product->product_name_en }} </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    <div class="product-price">
                                                        <span class="price">
                                                            ${{ $product->product_sale_price }}
                                                        </span>
                                                        <span class="price-before-discount">
                                                            ${{ $product->product_actual_price }}
                                                        </span>
                                                    </div><!-- /.product-price -->

                                                </div><!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                    type="button">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to
                                                                    cart</button>

                                                            </li>

                                                            <li class="lnk wishlist">
                                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>

                                                            <li class="lnk">
                                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div><!-- /.action -->
                                                </div><!-- /.cart -->
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    @empty
                                    <h4 class="text-danger text-center" style="padding: 20px;">No Products Found</h4>
                                @endforelse

                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div><!-- /.tab-pane -->

                @endforeach



</div><!-- /.home-owl-carousel -->
</div><!-- /.product-slider -->
</div><!-- /.tab-pane -->

</div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->
<!-- ============================================== SCROLL TABS : END ============================================== -->


</div><!-- /.homebanner-holder -->
<!-- ============================================== CONTENT : END ============================================== -->
</div><!-- /.row -->
@include('frontend.layouts.footer-slider')


{{-- @section('script')
    <script>
        function addToCart(){
            Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
        }
    </script>
@endsection --}}

@endsection

