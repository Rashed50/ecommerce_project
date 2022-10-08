@extends('frontend.layouts.master')
@section('title', 'Easy Shopping')
@section('content')
<div class="row">
    <!-- About Banner Start -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="about-heading text-center">
                    <h2>About us</h2>
                    <!-- <p><a href="index.html">home</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <span>about</span></p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- About Banner End -->

    <!-- About Details Start -->
    <section id="about-details">
        <div class="container">
            <div class="row">
                <div class="about-details-main">
                    <div class="col-md-7">
                        <div class="about-img">
                            <img src=" {{ asset('frontend') }}/assets/images/banners/about.jpg" alt="about-img"
                                class="about-img" height="500px" width="670px">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="about-detail">
                            <p>4M Engineering and Consultant Ltd is a prestigious name over a decade in the real estate
                                industry as well as attaining a reputation in the construction industry. Their highly
                                talented architects and designers emphasize ensuring state-of-the-art construction
                                services.They are also committed to adding value to every inch of your land and make the
                                best use of it by building your property that resonates with your heart.</p>
                            <p>
                                At present, They are constructing the biggest Superflat Floor project in Bangladesh.They
                                have all the modern and high tech equipment & technology for their constructed projects
                                which have been imported from various first world countries.With an excellent skilled and
                                trained engineering & working team. They are always ready to implement their skill &
                                experience to construct a quality project.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Details End -->
<br><br><br>
    <!-- Company Mission and vission part -->
    <section id="service" >
        <div class="container">
            <div class="row">
                <div class="service-main">
                    <div class="col-md-6">
                        <div class="service-item text-center">
                            <h3><i class="fa fa-paper-plane" aria-hidden="true"></i> Company Mission</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas eveniet, cupiditate nobis veritatis illum, sit consequuntur officiis, quod exercitationem facere nesciunt vel sint iusto unde tempore inventore voluptatibus. Odit voluptatem expedita sit repellendus libero nemo exercitationem reiciendis omnis tempora deserunt ipsum deleniti, iusto rerum dolor laudantium suscipit minima labore necessitatibus?</p>
                        </div>
                    </div>
                    <div class="col-md-6" style="border-left: 1px solid #2f4f4f;">
                        <div class="service-item text-center">
                            <h3><i class="fa fa-globe" aria-hidden="true"></i></i> Company Vission </h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas eveniet, cupiditate nobis veritatis illum, sit consequuntur officiis, quod exercitationem facere nesciunt vel sint iusto unde tempore inventore voluptatibus. Odit voluptatem expedita sit repellendus libero nemo exercitationem reiciendis omnis tempora deserunt ipsum deleniti, iusto rerum dolor laudantium suscipit minima labore necessitatibus?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Company Mission and vission part -->
    <br><br><br><br>
    <!-- Counter Part Start -->
    <section id="counter" class="counter"  style="padding:0px 0px;">
        <div class="main_counter_area">
            <div class="overlay p-y-3">
                <div class="container">
                    <div class="row">
                        <div class="main_counter_content text-center white-text wow fadeInUp">
                            <div class="col-md-2">
                                <div class="single_counter p-y-2 m-t-1">
                                    <h2 class="statistic-counter">26</h2>
                                    <p>service availavle</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="single_counter p-y-2 m-t-1">
                                    <h2 class="statistic-counter">718</h2>
                                    <p>employees of company</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="single_counter p-y-2 m-t-1">
                                    <h2 class="statistic-counter">100</h2>
                                    <p>happy client</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="single_counter p-y-2 m-t-1">
                                    <h2 class="statistic-counter">369</h2>
                                    <p>total outlets</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="single_counter p-y-2 m-t-1">
                                    <h2 class="statistic-counter">209</h2>
                                    <p>award win</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter End -->

    <br><br><br>
</div><!-- /.row -->
@include('frontend.layouts.footer-slider')
<br>
@endsection
