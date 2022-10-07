<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <h1 class="text-center text-primary"> Our Available Products type </h1>
    <br>
    @php
        $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
    @endphp

    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @foreach ($categories as $category)
                <div class="item m-t-15">
                    <a href="#" class="image">
                        <img data-echo=" {{ asset($category->category_image) }} " src=" {{ asset($category->category_image) }} " alt="" style="border-radius:50%" >
                    </a>
                    <p class="text-center"> {{ $category->category_name_en }} </p>
                </div>
            @endforeach
            <!--/.item-->

            {{-- <div class="item m-t-10">
                <a href="#" class="image">
                    <img data-echo=" {{ asset('frontend') }}/assets/images/brands/brand2.png" src=" {{ asset('frontend') }}/assets/images/blank.gif" alt="">
                </a>
            </div>
            <!--/.item-->

            <div class="item">
                <a href="#" class="image">
                    <img data-echo=" {{ asset('frontend') }}/assets/images/brands/brand5.png" src=" {{ asset('frontend') }}/assets/images/blank.gif" alt="">
                </a>
            </div> --}}
            <!--/.item-->
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->
