@extends('frontend.layouts.master')
@section('title', 'Easy Shopping')
@section('content')
<div class="row">
    {{-- Breadcrumb Start --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    {{-- Breadcrumb End --}}

    {{-- Checkbox Page Content Start --}}
    <div class="checkout-box ">
        <div class="row">
            <div class="col-md-7">
                <div class="panel-group checkout-steps" id="accordion">

                    <!-- checkout-step-01  -->
                    <div class="panel panel-default checkout-step-01">

                        <!-- panel-heading -->
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">
                                <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                    <span><i class="tx-20 fa fa-briefcase"></i></span>Shipping Address Details Here:
                                </a>
                            </h4>
                        </div>
                        <!-- panel-heading -->

                        <div id="collapseOne" class="panel-collapse collapse in">

                            <!-- panel-body  -->
                            <div class="panel-body">
                                <div class="row">

                                    <!-- already-registered-login -->
                                    <div class="col-md-6 col-sm-6 already-registered-login">
                                        <h4 class="checkout-subtitle"></h4>

                                        <form class="register-form" role="form">

                                            <div class="form-group">
                                                <label class="info-title" for="name">Name
                                                    <span>*</span></label>
                                                <input type="text"
                                                    class="form-control unicase-form-control text-input"
                                                    id="name" placeholder="Your name" value="{{ Auth::user()->name }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="email">Email
                                                    <span>*</span></label>
                                                <input type="email"
                                                    class="form-control unicase-form-control text-input"
                                                    id="email" placeholder="Your email" value="{{ Auth::user()->email }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="phone">Phone
                                                    <span>*</span></label>
                                                <input type="text"
                                                    class="form-control unicase-form-control text-input"
                                                    id="phone" placeholder="Your phone number" value="{{ Auth::user()->phone }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="notes">Keep A Notes
                                                    <span>*</span></label>
                                                    <textarea name="shipping_notes" id="notes" cols="30" rows="5" placeholder="Your notes ....."></textarea>

                                            </div>
                                    </div>
                                    <!-- already-registered-login -->

                                    <!-- already-registered-login -->
                                    <div class="col-md-6 col-sm-6 already-registered-login">
                                            <div class="form-group">
                                                <label class="info-title">Select Division<span>*</span> </label>
                                                <select class="form-control select2-show-search" name="division_id"  id=""
                                                    data-placeholder="Choose one">
                                                    <option label="Choose one"></option>
                                                {{-- @foreach ($divisions as $division)
                                                    <option value=" {{ $division->division_id }} "> {{ $division->division_name }}
                                                    </option>
                                                @endforeach --}}
                                                </select>
                                                @error('division_id')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" >Select District <span>*</span> </label>
                                                <select class="form-control select2-show-search" name="district_id" data-placeholder="Choose one">
                                                    <option label="Choose one"></option>
                                                </select>
                                                @error('district_id')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title">Select State/Upazilla <span>*</span></label>
                                                <select class="form-control select2-show-search" name="state_id" data-placeholder="Choose one">
                                                    <option label="Choose one"></option>
                                                    {{-- @foreach ($categories as $category)
                                                    <option value=" {{ $category->category_id }} "> {{ $category->category_name_en }} </option>
                                                    @endforeach --}}
                                                </select>
                                                @error('state_id')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputPassword1">Password
                                                    <span>*</span></label>
                                                <input type="password"
                                                    class="form-control unicase-form-control text-input"
                                                    id="exampleInputPassword1" placeholder="">
                                                <a href="#" class="forgot-password">Forgot your Password?</a>
                                            </div>
                                            <button type="submit"
                                                class="btn-upper btn btn-primary checkout-page-button">Login</button>
                                        </form>
                                    </div>
                                    <!-- already-registered-login -->

                                </div>
                            </div>
                            <!-- panel-body  -->

                        </div><!-- row -->
                    </div>
                    <!-- checkout-step-01  -->

                </div><!-- /.checkout-steps -->
            </div>
            <div class="col-md-5">
                <!-- checkout-progress-sidebar -->
                <div class="checkout-progress-sidebar ">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">Your Cart Product Details</h4>
                            </div>
                            <div class="table-responsive text-center">
                              <table class="table table-hover table-bordered mg-0">
                                <thead class="bg-info">
                                  <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td style="padding: 15px;"><img src="{{ asset($cart->options->image) }}" alt="cart-img" height="65px" width="65px"></td>
                                            <td style="padding: 15px;">{{ $cart->name }}</td>
                                            <td style="padding: 15px;">{{ $cart->qty }}</td>
                                            <td style="padding: 15px;">${{ $cart->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div><!-- table-responsive -->
                        </div>
                    </div>
                </div> <!-- checkout-progress-sidebar -->
                <!-- checkout-progress-sidebar -->
                <div class="checkout-progress-sidebar " style="float: right;">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">Total Amount Of This Products</h4>
                            </div>
                            @if (Session()->has('coupon'))
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li><strong>Sub Total:  &nbsp; &nbsp;</strong> ${{$cartTotal}}</li>
                                        <li><strong>Coupon Name:  &nbsp; &nbsp;</strong> {{session()->get('coupon')['coupon_name']}} {{session()->get('coupon')['coupon_discount']}} </li>
                                        <li><strong>Coupon Discount:  &nbsp; &nbsp;</strong> -{{session()->get('coupon')['discount_amount_withCoupon']}} </li>
                                        <li><strong>Grand Total:  &nbsp; &nbsp;</strong>  {{session()->get('coupon')['discount_amount_withCoupon']}} </li>
                                    </ul>
                                </div>
                            @else
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li><strong>Sub Total:  &nbsp; &nbsp;</strong> ${{$cartTotal}}</li>
                                        <li><strong>Grand Total:  &nbsp; &nbsp; ${{$cartTotal}}</strong></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div> <!-- checkout-progress-sidebar -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.checkout-box -->
    {{-- Checkbox Page Content End --}}

</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection
@section('scripts')

            {{-- Division Wise District Name With Ajax Request --}}
    <script>
        $("select[name='division_id']").on('change', function (event) {
       var divId = $(this).val();
       console.log(divId)

        /* ==== ajax request ==== */
        if (divId) {
            $.ajax({
                url: "{{ url('division-wise/districts/') }}/" + divId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // response
                    if (data == "") {
                        $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').append('<option value="">Districts Not Found!</option>');
                    } else {
                        $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').append('<option value="">Select Any Districts</option>');
                        // data load
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.district_id + '">' + value.district_name + '</option>');
                        });
                        // data load
                    }
                    // response
                },
            });
        }
        /* ==== ajax request ==== */
    });
    </script>
@endsection
