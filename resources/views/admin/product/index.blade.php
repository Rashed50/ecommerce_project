@extends('admin.layouts.master')
@section('title', 'Product')
@section('categories')
active show-sub
@endsection
@section('add-products')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Products</a>
</nav>

<div class="sl-pagebody">
    {{-- Form Part Start --}}
    <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            {{-- Error message start --}}
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if(Session::has('success'))
                    <div class="alert alert-success alertsuccess" role="alert">
                        <strong> {{ Session::get('success')}} </strong>
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-warning alerterror" role="alert">
                        <strong> {{ Session::get('error') }} </strong>
                    </div>
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>
            {{-- Error message start --}}
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title">Add New Product Item</h6>
                <form action=" {{ route('product-add') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mg-t-20 form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {{-- Select option with search facility --}}
                        <label class="col-sm-4 form-control-label">Select Category: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="category_id" id=""
                                data-placeholder="Choose one">
                                <option label="Choose one"></option>
                                @foreach ($categories as $category)
                                <option value=" {{ $category->category_id }} "> {{ $category->category_name_en }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group">
                        {{-- Select option with search facility --}}
                        <label class="col-sm-4 form-control-label">Select Sub Category: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="subcategory_id" id=""
                                data-placeholder="Choose one">
                                <option label="Choose one"></option>
                            </select>
                            @error('subcategory_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group">
                        {{-- Select option with search facility --}}
                        <label class="col-sm-4 form-control-label">Select Brand: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="brand_id"
                                data-placeholder="Choose one">
                                <option label="Choose one"></option>
                            </select>
                            @error('brand_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group">
                        <label class="col-sm-4 form-control-label">Product Name EN: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Product Name English"
                                name="product_name_en" value="{{ old('product_name_en') }}">

                            @error('product_name_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group">
                        <label class="col-sm-4 form-control-label">Product Name BN: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Product Name Bangla"
                                name="product_name_bn" value="{{ old('product_name_bn') }}">

                            @error('product_name_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20  form-group">
                        <label class="col-sm-4 form-control-label">Product Actual Price: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Actual Sale Price"
                                name="product_actual_price" value="{{ old('product_actual_price') }}">

                            @error('product_actual_price')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mg-t-20  form-group">
                        <label class="col-sm-4 form-control-label">Product Sale Price: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Product Sale Price"
                                name="product_sale_price" value="{{ old('product_sale_price') }}">

                            @error('product_sale_price')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mg-t-20  form-group">
                        <label class="col-sm-4 form-control-label">Product Quantity: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Product Quantity"
                                name="product_quantity" value="{{ old('product_quantity') }}">

                            @error('product_quantity')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mg-t-10 form-group">
                        <label class="col-sm-4 form-control-label">Product Size EN: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Product Size In English"
                                name="product_size_en" value="{{ old('product_size_en') }}">

                            @error('product_size_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group">
                        <label class="col-sm-4 form-control-label">Product Size BN: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Product Size In Bangla"
                                name="product_size_bn" value="{{ old('product_size_bn') }}">

                            @error('product_size_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group">
                        <label class="col-sm-4 form-control-label">Product Color EN: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Product Color In English"
                                name="product_color_en" value="{{ old('product_color_en') }}">

                            @error('product_color_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group">
                        <label class="col-sm-4 form-control-label">Product Color BN: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Product Color In Bangla"
                                name="product_color_bn" value="{{ old('product_color_bn') }}">

                            @error('product_color_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20  form-group">
                        <label class="col-sm-4 form-control-label">Product Description: <span
                                class="tx-danger">*</span></label>
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <textarea rows="4" class="form-control" name="product_desc"
                                placeholder="Enter Product Description Here....">{{ old('product_desc') }}</textarea>
                            </textarea>
                            @error('product_desc')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div><!-- col -->
                    </div>
                    {{-- <div class="row mg-t-20  form-group">
                        <label class="col-sm-4 form-control-label">Product Multiple Image: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="form-control" name="product_image" id="multiImage"
                                value=" {{ old('product_image1') }} ">
                            @error('product_image1')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="row" id="preview_image"></div>
                        </div>
                    </div> --}}
                    <div class="row mg-t-20  form-group">
                        <label class="col-sm-4 form-control-label">Product Image 1: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="form-control" name="product_image1" id="productImg"
                                value=" {{ old('product_image1') }} ">
                            @error('product_image1')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="row" id="preview_image"></div>
                        </div>
                    </div>
                    <div class="row mg-t-20  form-group">
                        <label class="col-sm-4 form-control-label">Product Image 2:</label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="form-control" name="product_image2" id="productImg1"
                                value=" {{ old('product_image2') }} ">
                            @error('product_image2')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="row" id="preview_image1"></div>
                        </div>
                    </div>
                    <div class="row mg-t-20  form-group">
                        <label class="col-sm-4 form-control-label">Product Image 3:</label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="form-control" name="product_image3" id="productImg2"
                                value=" {{ old('product_image3') }} ">
                            @error('product_image3')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <div class="row" id="preview_image2"></div>
                        </div>
                    </div>
                    <div class="form-layout-footer mg-t-30  form-group">
                        <button type="submit" class="btn btn-info mg-r-5">Add New</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- Form Part End --}}
    <br><br>
    {{-- Table Part Start --}}
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Product List</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-10p">Image</th>
                                <th class="wd-15p">Name EN</th>
                                <th class="wd-15p">Name BN</th>
                                <th class="wd-10p">Categ</th>
                                <th class="wd-10p">Sub-Categ</th>
                                <th class="wd-10p">Brand</th>
                                <th class="wd-10p">Insert By</th>
                                <th class="wd-10p">Sale Price</th>
                                <th class="wd-10p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    <img src=" {{ asset($product->product_image1) }} " alt="" style="width: 80px">
                                </td>
                                <td> {{ $product->product_name_en }} </td>
                                <td> {{ $product->product_name_bn }} </td>
                                <td>
                                    <p>{{ isset($product->categoryfuncP) ? $product->categoryfuncP->category_name_en:
                                        '-'}}</p>
                                </td>
                                <td>
                                    <p>{{ isset($product->subcategoryfuncP) ?
                                        $product->subcategoryfuncP->subcategory_name_en: '-'}}</p>
                                </td>
                                <td>
                                    <p>{{ isset($product->brandfuncP) ? $product->brandfuncP->brand_name_en: '-'}}</p>
                                </td>
                                <td> {{ $product->product_insert_by }} </td>
                                <td> {{ $product->product_sale_price }} </td>
                                <td>
                                    <a href=" {{ url('admin/product-edit/'. $product->product_id ) }} "
                                        class="btn btn-primary" title="Edit"><i
                                            class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/product-delete/'. $product->product_id ) }} "
                                        class="btn btn-danger" title="Delete" id="delete"><i
                                            class="tx-18 fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
    </div><!-- row -->
    {{-- Table Part Start --}}
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
<script>
    // ########################### Category wise Subcategory ###########################
    $("select[name='category_id']").on('change', function (event) {
        var catg_id = $(this).val();

        /* ==== ajax request ==== */
        if (catg_id) {
            $.ajax({
                url: "{{ url('category-wise/subcategory/') }}/" + catg_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // response
                    if (data == "") {
                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option value="">Sub Category Not Found!</option>');
                    } else {
                        $('select[name="subcategory_id"]').empty();
                        $('select[name="brand_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option value="">Select Sub Category</option>');
                        // data load
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.subcategory_id + '">' + value.subcategory_name_en + '</option>');
                        });
                        // data load
                    }
                    // response
                },
            });
        }
        /* ==== ajax request ==== */
    });

    // ########################### Subcategory wise Brand ###########################
    $("select[name='subcategory_id']").on('change', function (event) {
        var subcatg_id = $(this).val();

        /* ==== ajax request ==== */
        if (subcatg_id) {
            $.ajax({
                url: "{{ url('subcategory-wise/brands/') }}/" + subcatg_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // response
                    if (data == "") {
                        $('select[name="brand_id"]').empty();
                        $('select[name="brand_id"]').append('<option value="">Brand Not Found!</option>');
                    } else {
                        $('select[name="brand_id"]').empty();
                        $('select[name="brand_id"]').append('<option value="">Select Brand Name</option>');
                        // data load
                        $.each(data, function (key, value) {
                            $('select[name="brand_id"]').append('<option value="' + value.brand_id + '">' + value.brand_name_en + '</option>');
                        });
                        // data load
                    }
                    // response
                },
            });
        }
        /* ==== ajax request ==== */
    });



    //   ==== Image preview ====
    $(document).ready(function () {
            $('#productImg').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function (file) { //trigger function on successful read
                                return function (e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_image').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    $(document).ready(function () {
            $('#productImg1').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function (file) { //trigger function on successful read
                                return function (e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_image1').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    $(document).ready(function () {
            $('#productImg2').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function (file) { //trigger function on successful read
                                return function (e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_image2').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

</script>
@endsection
