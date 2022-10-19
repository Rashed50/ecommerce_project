<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\ProductTypeDataService;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $categories = (new ProductTypeDataService())->CategoeyInfoCollect();
        $products = (new ProductTypeDataService())->ProductInfoCollect();
        // dd($categories);
        return view('admin.product.index', compact('categories', 'products'));
    }

    public function productDataAdd(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'product_name_en' => 'required',
            'product_name_bn' => 'required',
            'product_actual_price' => 'required',
            'product_sale_price' => 'required',
            'product_quantity' => 'required',
            'product_image1' => 'required',
            'product_insert_by' => 'required',
            'product_desc' => 'required',
        ], [
            'category_id.required' => 'Please enter category id here....',
            'subcategory_id.required' => 'Please enter sub category id here....',
            'brand_id.required' => 'Please enter brand id here....',
            'product_name_en.required' => 'Please enter product name in english here....',
            'product_name_bn.required' => 'Please enter product name in bangla here....',
            'product_actual_price.required' => 'Please enter product actual price here....',
            'product_sale_price.required' => 'Please enter product sale price here....',
            'product_quantity.required' => 'Please enter product quantity here....',
            'product_image1.required' => 'Please insert product image here....',
            'product_insert_by.required' => 'Please fill who insert this product....',
            'product_desc.required' => 'Please enter product description here....',
        ]);
        // dd('After validation');

        $productInsert = (new ProductTypeDataService())->ProductDataInsert( $request->category_id, $request->subcategory_id, $request->brand_id, $request->product_name_en,
            $request->product_name_bn, $request->product_actual_price, $request->product_sale_price, $request->product_quantity, $request->product_insert_by, $request->product_desc,
            $request->product_image1, $request->product_image2, $request->product_image3 );

        // dd('After Insertion');

        if($productInsert){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('products')->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function productDataEdit($id){
        $productData = (new ProductTypeDataService())->GetSingleProductInfo($id);
        $categories = (new ProductTypeDataService())->CategoeyInfoCollect();
        $subcategories = (new ProductTypeDataService())->SubcategoeyInfoCollect();
        $brands = (new ProductTypeDataService())->BrandInfoCollect();
        return view('admin.product.edit', compact('categories', 'subcategories', 'productData', 'brands'));
    }

    public function productDataUpdate(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'product_name_en' => 'required',
            'product_name_bn' => 'required',
            'product_actual_price' => 'required',
            'product_sale_price' => 'required',
            'product_quantity' => 'required',
            'product_image1' => 'required',
            'product_insert_by' => 'required',
            'product_desc' => 'required',
        ], [
            'category_id.required' => 'Please enter category id here....',
            'subcategory_id.required' => 'Please enter sub category id here....',
            'brand_id.required' => 'Please enter brand id here....',
            'product_name_en.required' => 'Please enter product name in english here....',
            'product_name_bn.required' => 'Please enter product name in bangla here....',
            'product_actual_price.required' => 'Please enter product actual price here....',
            'product_sale_price.required' => 'Please enter product sale price here....',
            'product_quantity.required' => 'Please enter product quantity here....',
            'product_image1.required' => 'Please enter image here....',
            'product_insert_by.required' => 'Please fill who insert this product....',
            'product_desc.required' => 'Please enter product description here....',
        ]);
        // dd('After validation');

        $productUpdate = (new ProductTypeDataService())->productDataUpdate(
            $request->product_id, $request->old_product_image1, $request->old_product_image2,
            $request->old_product_image3, $request->category_id, $request->subcategory_id,
            $request->brand_id, $request->product_name_en, $request->product_name_bn, $request->product_actual_price,
            $request->product_sale_price, $request->product_quantity, $request->product_insert_by,
            $request->product_desc, $request->product_image1, $request->product_image2, $request->product_image3);


        if($productUpdate){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('products')->with('message','Product Data Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function productDataDelete($id){
        // dd('Request for delete');

        $productDelete = (new ProductTypeDataService())->ProductDataDelete($id);

        if($productDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('products')->with('message','Product Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

}
