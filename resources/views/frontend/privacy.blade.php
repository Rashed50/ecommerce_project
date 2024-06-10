@extends('frontend.layouts.master')
@section('title', 'Easy Shopping')
@section('content')
<div class="row">
    <!-- About Banner Start -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="about-heading text-center">
                    <h2>Privacy Policy</h2>
                    <!-- <p><a href="index.html">home</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <span>about</span></p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- About Banner End -->

    <!-- About Details Start -->
    {{-- <section id="about-details">
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

    </div>
</div>
</div>
</div>
</div>
</section> --}}
<!-- About Details End -->
<br><br><br>
<!-- Company Mission and vission part -->
<section id="service">
    <div class="container">
        <div class="row">
            <div class="service-main">
                <div class="col-md-12">
                    <div class="service-item">
                        <p>When you use our Website, we collect and store your personal information which is provided by you from time to time.
                            Our primary goal in doing so is to provide you a safe, efficient, smooth and customized
                            experience. This allows us to provide services and features that most likely meet your needs,
                            and to customize our website to make your experience safer and easier. More importantly,
                            while doing so, we collect personal information from you that we consider necessary for
                            achieving this purpose. </p>
                        <br>
                        <strong>Below are some of the ways in which we collect and store your information: </strong>
                        <br><br>
                        <ul style="list-style-type: circle; ">
                            <li>We receive and store any information you enter on our website or give us in any other way. We use the information that you provide for such purposes as responding to your requests, customizing future shopping for you, improving our stores, and communicating with you.</li>
                            <li style="margin-top: 3px;">We also store certain types of information whenever you interact with us. For example, like many websites, we use "Human Hair," and we obtain certain types of information when your web browser accesses our website or advertisements and other content served by or on behalf of our website on other websites.</li>

                            <li style="margin-top: 3px;">To help us make e-mails more useful and interesting, we often receive a confirmation when you open e-mail from our website if your computer supports such capabilities.</li>
                        </ul>
                        <div class="">
                            <p style="font-size: 16px;">Change to your information:</p>
                            <p style="margin-top: 15px;">The information you provide us isn’t set in stone. You may review, update, correct or delete the personal information in your profile at any time. </p>
                            <ul style="list-style-type: circle; ">
                                <li>If you would like us to remove your information from our records, please create a request at the <a href=" {{ route('frontend-contact') }} " style="text-decoration-line: underline;text-decoration-style: solid;" target="_black">Contact Us</a> page. </li>

                            </ul>
                        </div>
                        <p style="font-size: 16px;">Information about our customers is an important part of our business, and we are not in the business of selling it to others. </p>
                        <p>We release account and other personal information when we believe release is appropriate to comply with the law; enforce or apply our Terms of Use and other agreements; or protect the rights, property, or safety of our website, our users, or others. This includes exchanging information with other companies and organizations for fraud protection.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<br><br><br>
</div><!-- /.row -->
<br>
@endsection