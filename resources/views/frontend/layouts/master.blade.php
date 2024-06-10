<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="A E-commerce website">
    <meta name="author" content="Waliul Hasan">
    <meta name="keywords" content="Online, Shopping, eCommerce, Online Service, Buy">
    <meta name="robots" content="all">

    <title> @yield('title') </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <!-- Favicon -->

    <link rel="apple-touch-icon" sizes="180x180" href=" {{ asset('frontend') }}/assets/images/favicon_io/apple-touch-icon.png ">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="32x32" href=" {{ asset('fav') }} ">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    {{-- <link rel="manifest" href="/site.webmanifest"> --}}

    <!-- Customizable CSS -->
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/main.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/blue.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/rateit.css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/bootstrap-select.min.css">
    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    {{-- tostr cdn --}}
    <link rel="stylesheet" href=" {{ asset('backend') }}/lib/toastr/toastr.min.css">
    {{-- Sweetalert 2 --}}
    <link rel="stylesheet" href=" {{ asset('backend') }}/lib/sweetalert/sweetalert2.min.css">

    {{-- about & contact page design --}}
    {{-- <link rel="stylesheet" href=" {{ asset('frontend') }}/assets/css/style.css "> --}}

</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.layouts.header')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">

            @yield('content')

            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            {{-- @include('frontend.layouts.footer-slider') --}}
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->


    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.layouts.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->


    <!-- For demo purposes – can be removed on production -->


    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->

    {{-- tostr cdn --}}
    <script src=" {{ asset('backend/lib/toastr/jquery.min.js') }} "></script>
    <script src=" {{ asset('backend/lib/toastr/toastr.min.js') }} "></script>
    <script>
        @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script src=" {{ asset('frontend') }}/assets/js/jquery-1.11.1.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/echo.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/bootstrap-slider.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/jquery.rateit.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/lightbox.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/bootstrap-select.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/wow.min.js"></script>
    <script src=" {{ asset('frontend') }}/assets/js/scripts.js"></script>
    {{-- ################## Sweetalert 2 ###################--}}
    <script src=" {{ asset('backend') }}/lib/sweetalert/sweetalert2.all.min.js "></script>

     {{-- Modal Ajax request Start --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        // Start Product Buying info (To Cart)
        function addToCart(id) {
            var id = $('#product_id').val();
            var name = $('#pName').text();
            var color = $('#product_color option:selected').text();
            var size = $('#product_size option:selected').text();
            var qty = $('#pQty').val();

            // console.log(name)
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/cart/data/store/" + id,
                data: {
                    prod_name: name,
                    color: color,
                    size: size,
                    quantity: qty,
                },
                success: function (data) {
                    miniCartInfo();
                    // alert(id)
                    // console.log(data)

                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }

            })
        }
        // End Product Buying info (To Cart)

        // Start Product Info Show On Public Page (Mini Cart)
        function miniCartInfo() {
            $.ajax({
                type: 'GET',
                url: '/product/mini-cart/info',
                dataType: 'json',
                success: function (response) {
                    $('span[id="cartProductPrice"]').text(response.cartTotalPrice);
                    $('#cartProductQty').text(response.cartQuantity);
                    var miniCart = "";
                    $.each(response.carts, function (key, value) {
                        miniCart += `
									<div class="cart-item product-summary">
										<div class="row">
											<div class="col-xs-4">
												<div class="image">
													<a href="#"><img src="/${value.options.image}" alt=""></a>
												</div>
											</div>
											<div class="col-xs-7">

												<h3 class="name"><a href="#">${value.name}</a>
												</h3>
												<div class="price">${value.price} * ${value.qty}</div>
											</div>
											<div class="col-xs-1 action">
												<button type="submit" id="${value.rowId}" onclick="miniCartProductRemove(this.id)" href="#"><i class="fa fa-trash"></i></button>
											</div>
										</div>
									</div><!-- /.cart-item -->
									<div class="clearfix"></div>
									<hr>
                                `
                    });
                    $('#miniCartArea').html(miniCart);
                },
            });
        }
        miniCartInfo();
        // End Product Info Show On Public Page (Mini Cart)

        // Product Remove From Mini Cart Start
        function miniCartProductRemove(rowId) {
            // alert(rowId);
            $.ajax({
                type: 'GET',
                url: '/miniCart/product-remove/' + rowId,
                dataType: 'json',
                success: function (data) {
                    // cosole.log(data)
                    miniCartInfo();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }
        // Product Remove From Mini Cart End

       // Start Product Info Show On Cart Page
       function cartPageProduct() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/cart-products/view') }}",
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    var cartItem = "";
                    $.each(response.carts, function (key, value) {
                        cartItem += `
                                    <tr>
                                        <td class="col-md-2"><img src="/${value.options.image}" alt="img" style="width:100px; height:120px;"></td>

                                        <td class="col-md-3">
                                            <div class="product-name">
                                                <input type="hidden" name="productName" value="${value.name}"> ${value.name}
                                                </div>
                                            <div class="price" >
                                                <input type="hidden" name="productName" value="$${value.price}">
                                            </div>
                                        </td>

                                        <td class="col-md-1">
                                            ${ value.options.color == null
                                                ? `<span>....</span>`
                                                : `<strong>${value.options.color}</strong>`
                                            }
                                        </td>

                                        <td class="col-md-1">
                                            ${ value.options.size == null
                                                ? `<span>....</span>`
                                                : `<strong>${value.options.size}</strong>`
                                            }
                                        </td>

                                        <td class="col-md-2">
                                            <div class="price" style="font-weight:bold" >
                                                ${value.price}*${value.qty}=${value.subtotal}
                                            </div>
                                        </td>

                                        <td class="col-md-2">
                                            ${value.qty > 1
                                            ? `<button type="submit" id="${value.rowId}" onclick="CartDecrement(this.id)" class="btn btn-danger btn-sm">-</button>`
                                            : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button>`
                                            }
                                            <input type="hidden" name="productQty" id="" value="${value.qty}" min="1" max="100" disabled style="width:30px; height:40px;">
                                            <input type="text" name="productQty" id="" value="${value.qty}" min="1" max="100" disabled style="width:30px; height:40px;">
                                            <button type="submit" id="${value.rowId}" onclick="CartIncrement(this.id)" class="btn btn-success btn-sm">+</button>

                                        </td>
                                        <td>
                                            <div>
                                                <input type="hidden" id="productId" name="productId" value="${value.id}">
                                            </div>
                                        </td>
                                    </tr>
                                `
                    });
                    // console.log(cartItem);
                    $('#cartProduct').html(cartItem);
                },
            });
        }
        cartPageProduct();
        // End Product Info Show On Cart Page


        // Product Remove From Mini Cart Start
        function CartProductRemove(rowId) {
            // alert(rowId);
            $.ajax({
                type: 'GET',
                url: '/cart/product-remove/' + rowId,
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    miniCartInfo();
                    cartPageProduct();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'message',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }
        // Product Remove From Mini Cart End

         // Start Product Increment On Cart Page
         function CartIncrement(rowId) {
            // alert(rowId);
            $.ajax({
                type: 'GET',
                url: '/cart/product-increment/' + rowId,
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    cartPageProduct();
                    miniCartInfo();
                }

            });
        }
         // End Product Increment On Cart Page

         // Start Product Decrement On Cart Page
         function CartDecrement(rowId) {
            // alert(rowId);
            $.ajax({
                type: 'GET',
                url: '/cart/product-decrement/' + rowId,
                dataType: 'json',
                success: function (data) {
                    // console.log(data)
                    cartPageProduct();
                    miniCartInfo();
                }

            });
        }
         // End Product Decrement On Cart Page

    </script>
    {{-- Modal Ajax request End --}}



</body>

</html>