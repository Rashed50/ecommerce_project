@extends('frontend.layouts.master')
@section('title', 'Easy Shopping')
@section('content')
<div class="row">
    {{-- Breadcrumb Start --}}
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Carts</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    {{-- Breadcrumb End --}}

    {{-- Wishlist Page Content Start --}}
    <div class="my-wishlist-page">
        <div class="row ">
            <div class="shopping-cart">
                <form action="{{route('checkout-request')}}" method="post">
                    @csrf
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">Image</th>
                                        <th class="cart-description item">Name & Price</th>
                                        <th class="cart-product-name item">Color</th>
                                        <th class="cart-edit item">Size</th>
                                        <th class="cart-sub-total item">Subtotal</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-total last-item">Action</th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody id="cartProduct" class="text-center">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="">
                        <ul class="nav nav-checkout-progress list-unstyled">
                            <li>
                                <input type="hidden" name="cartSubTotal" value="{{$cartTotal}}" ><strong>Sub Total:  &nbsp; &nbsp;</strong> ${{$cartTotal}}
                            </li>
                            <li><strong>Grand Total:  &nbsp; &nbsp; ${{$cartTotal}}</strong></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-sm-12 cart-shopping-total" style="float: right;">
                        <table class="table">
                            <thead id="couponCalculatedDataField">

                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <a href="#">
                                            {{-- <a href="{{route('checkouts')}}"> --}}
                                                <button type="submit" class="btn btn-primary checkout-btn" onclick="GoforCheckout()">
                                                    PROCCED TO CHEKOUT
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->

                </form>

            </div>
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->
    {{-- Wishlist Page Content End --}}

                    {{-- <div class="col-md-6 col-sm-12 estimate-ship-tax">
                        @if (Session()->has('coupon'))

                        @else
                            <table class="table" id="CouponField">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Discount Code</span>
                                            <p>Enter your coupon code if you have one..</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    placeholder="You Coupon.." id="coupon_name">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">APPLY COUPON</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        @endif
                    </div><!-- /.estimate-ship-tax --> --}}

                    <br>

</div><!-- /.row -->
@include('frontend.layouts.footer-slider')

@endsection

<script type="text/javascript">

    function GoforCheckout(){
        $(document).ready(function(){
            var alert = ('#productId').val();
            alert(alert);
        })
    }
</script>
