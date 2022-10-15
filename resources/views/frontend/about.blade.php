@extends('frontend.layouts.master')
@section('title', 'Zeal Hair Fashion')
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
                            <img src=" {{ asset('frontend') }}/assets/images/banners/about.jpg" alt="about-img" class="about-img" height="500px" width="670px">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="about-detail">
                            <p>Wigs simplify your everyday appearance without cutting, dying, or styling your natural hair. While the differences between human hair and synthetic wigs are significant,
                                your choice comes down to preference and lifestyle.</p>
                            <p>
                                Although one main difference between synthetic and human hair is the natural appearance of human hair wigs, synthetic hair wigs have come leaps and bounds in recent years. In some cases, the texture and denier almost feel like human hair

                                Understanding the basics of synthetic wigs vs human hair wigs is key to selecting the right wig for you. Let’s take a look at the difference between synthetic hair and human hair to help you to look out for the right things whilst wig shopping.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Details End -->
    <br><br><br>
    <!-- Company Mission and vission part -->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="service-main">
                    <div class="col-md-6">
                        <div class="service-item text-center">
                            <h3><i class="fa fa-paper-plane" aria-hidden="true"></i> Company Mission</h3>
                            <p>
                                Costs
                                If you’re on a budget, synthetic wigs are a favourable choice. You can purchase multiple synthetic wigs for a lower price and play around with different looks daily. As for human hair wigs, they cost considerably more, but the quality is often worth the investment. You can find a wide range of prices in both categories.

                                Longevity
                                What makes human hair wigs more appealing than synthetic wigs is their lifespan. At the same time, human hair wigs can last up to a year or longer; synthetic wigs sometimes only last a few months, even with proper care. So, if you’re looking for a wig that lasts a long time, a human hair wig will be your best friend.

                                Maintenance
                                When choosing between synthetic and human hair wigs, the maintenance each requires should factor into your decision-making process. Human hair wigs require more care and maintenance, while synthetic wigs make for easy grooming and storage. All you need to do is carefully wash, dry, and shake it out. Its style memory will revive its natural shape.

                                Appearance
                                Another difference between synthetic and human hair wigs is their appearance. Synthetic wigs have a more noticeable appearance due to their unnatural high shine, texture, and often bright colours. However, time and use can give synthetic wigs a more natural appearance. As for human hair wigs, the hair often appears more natural right away, even if the hair goes through the dyeing process.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6" style="border-left: 1px solid #2f4f4f;">
                        <div class="service-item text-center">
                            <h3><i class="fa fa-globe" aria-hidden="true"></i></i> Company Vission </h3>
                            <p>

                                For decades, traits that have been associated with racial categories, such as skin pigmentation and hair texture, have gone understudied or ignored among anthropologists, Lasisi says. Much of the study of human biological variation was deserted after the post–World War II backlash against eugenics, a racist field birthed from the idea that humankind could be improved if those deemed to have desirable traits were selectively allowed to reproduce. Since then, research on human variation has largely focused instead on traits that are not overtly racialized, such as lactose intolerance and adaptations to high altitudes.

                                But studying all forms of human variation is crucial to understanding our species’s evolution, Lasisi says. Studying variation in a way that normalizes rather than dampens or paints differences in a bad light is key not only to righting anthropology’s harmful legacy, but also ethical, socially responsible and sound science, she says.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Company Mission and vission part -->
    <br><br><br><br>
    <!-- Counter Part Start -->

    <section id="counter" class="counter" style="padding:0px 0px;">
        <div class="main_counter_area">
            <div class="overlay p-y-3">
                <div class="container">
                    <div class="row">
                        <div class="main_counter_content text-center white-text wow fadeInUp">
                            <div class="col-md-2">
                                <div class="single_counter p-y-2 m-t-1">
                                    <h2 class="statistic-counter"> {{ $totalCategory }} </h2>
                                    <p>Availavle Categories</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="single_counter p-y-2 m-t-1">
                                    <h2 class="statistic-counter"> {{ $totalBrands }} </h2>
                                    <p>Collection Of Brands</p>
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
                                    <p>Clients feedback</p>
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