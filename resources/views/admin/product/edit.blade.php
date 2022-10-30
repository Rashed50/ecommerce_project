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
                <h6 class="card-body-title">Update Product Data</h6>
                <form action=" {{ route('product-data-update') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value=" {{ $productData->product_id }} ">
                    <input type="hidden" name="old_product_image1" value=" {{ $productData->product_image1 }} ">
                    <input type="hidden" name="old_product_image2" value=" {{ $productData->product_image2 }} ">
                    <input type="hidden" name="old_product_image3" value=" {{ $productData->product_image3 }} ">
                    <div class="row mg-t-20 form-group">
                        {{-- Select option with search facility --}}
                        <label class="col-sm-4 form-control-label">Select Category: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="category_id" id=""
                                data-placeholder="Choose one">
                                <option label="Choose one" selected>Choose one</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $category->category_id ==
                                    $productData->category_id ?
                                    'selected':'' }}> {{ $category->category_name_en }} </option>

                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group">
                        <label class="col-sm-4 form-control-label">Select Sub Category: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="subcategory_id"
                                data-placeholder="Choose one">
                                <option label="Choose one" selected>Choose one</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->subcategory_id  }}" {{ $subcategory->subcategory_id ==
                                    $productData->subcategory_id ? 'selected' : '' }}> {{
                                    $subcategory->subcategory_name_en }}
                                </option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group">
                        <label class="col-sm-4 form-control-label">Select Brand: <span
                                class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="brand_id"
                                data-placeholder="Choose one">
                                <option label="Choose one" selected>Choose one</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->brand_id   }}" {{ $brand->brand_id ==
                                    $productData->brand_id ? 'selected' : '' }}> {{ $brand->brand_name_en }}
                                </option>
                                @endforeach
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
                                    name="product_name_en" value="{{ $productData->product_name_en }}">

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
                                    name="product_name_bn" value="{{ $productData->product_name_bn }}">

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
                                    name="product_actual_price" value="{{ $productData->product_actual_price }}">

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
                                    name="product_sale_price" value="{{ $productData->product_sale_price }}">

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
                                    name="product_quantity" value="{{ $productData->product_quantity }}">

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
                                    name="product_size_en" value="{{ $productData->product_size_en }}">

                                @error('product_size_en')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-10 form-group">
                            <label class="col-sm-4 form-control-label">Product Size BN: <span
                                    class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Enter Product Size Bangla"
                                    name="product_size_bn" value="{{ $productData->product_size_bn }}">

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
                                    name="product_color_en" value="{{ $productData->product_color_en }}">

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
                                    name="product_color_bn" value="{{ $productData->product_color_bn }}">

                                @error('product_color_bn')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20  form-group">
                            <label class="col-sm-4 form-control-label">Product Description: <span
                                    class="tx-danger">*</span></label>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <textarea rows="4" class="form-control" name="product_desc" placeholder="Enter Product Description Here....">{{ $productData->product_description }}</textarea>
                                @error('product_desc')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div><!-- col -->
                        </div>
                        <div class="row mg-t-20  form-group">
                            <label class="col-sm-4 form-control-label">Product Image 1: <span
                                    class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="file" class="custom-file-input" name="product_image1">
                                <span class="custom-file-control custom-file-control-inverse">
                                    @error('product_image1')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row mg-t-20  form-group">
                            <label class="col-sm-4 form-control-label">Product Image 2:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="file" class="custom-file-input" name="product_image2">
                                <span class="custom-file-control custom-file-control-inverse">
                                    @error('product_image2')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row mg-t-20  form-group">
                            <label class="col-sm-4 form-control-label">Product Image 3:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="file" class="custom-file-input" name="product_image3">
                                <span class="custom-file-control custom-file-control-inverse">
                                    @error('product_image3')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-layout-footer mg-t-30  form-group">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- Form Part End --}}
    {{-- Table Part Start --}}
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
<script>
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
</script>
@endsection
