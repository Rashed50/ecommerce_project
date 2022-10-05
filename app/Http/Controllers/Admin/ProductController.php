<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\If_;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        $products = Product::latest()->get();
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
            $image1 = $request->file('product_image1');
            $name_gen = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(917,1000)->save('uploads/products/'.$name_gen);
            $save_url1 = 'uploads/products/'.$name_gen;

            $image2 = $request->file('product_image2');
            $name_gen = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(166,110)->save('uploads/products/'.$name_gen);
            $save_url2 = 'uploads/products/'.$name_gen;

            $image3 = $request->file('product_image3');
            $name_gen = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
            Image::make($image3)->resize(166,110)->save('uploads/products/'.$name_gen);
            $save_url3 = 'uploads/products/'.$name_gen;

        $product = Product::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ','-', $request->product_name_en)),
            'product_slug_bn' => strtolower(str_replace(' ','-', $request->product_name_bn)),
            'product_actual_price' => $request->product_actual_price,
            'product_sale_price' => $request->product_sale_price,
            'product_quantity' => $request->product_quantity,
            'product_insert_by' => $request->product_insert_by,
            'product_description' => $request->product_desc,
            'product_image1' => $save_url1,
            'product_image2' => $save_url2,
            'product_image3' => $save_url3,
            'created_at' => Carbon::now(),
        ]);
        // dd('After Insertion');

        if($product){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('products')->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function productDataEdit($id){
        $productData = Product::where('product_id', $id)->first();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $brands = Brand::latest()->get();
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

        $productID = $request->product_id;
        $oldProductImage1 = $request->old_product_image1;
        $oldProductImage2 = $request->old_product_image2;
        $oldProductImage3 = $request->old_product_image3;

        if ($request->file('product_image1')) {
            unlink($oldProductImage1);
            $image1 = $request->file('product_image1');
            $name_gen = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(166,110)->save('uploads/products/'.$name_gen);
            $save_url1 = 'uploads/products/'.$name_gen;
        }if ($request->file('product_image2')) {
            unlink($oldProductImage2);
            $image2 = $request->file('product_image2');
            $name_gen = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(166,110)->save('uploads/products/'.$name_gen);
            $save_url2 = 'uploads/products/'.$name_gen;

        }if ($request->file('product_image3')) {
            unlink($oldProductImage3);
            $image3 = $request->file('product_image3');
            $name_gen = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
            Image::make($image3)->resize(166,110)->save('uploads/products/'.$name_gen);
            $save_url3 = 'uploads/products/'.$name_gen;

            $productUpdate = Product::where('product_id',$productID)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'brand_id' => $request->brand_id,
                'product_name_en' => $request->product_name_en,
                'product_name_bn' => $request->product_name_bn,
                'product_slug_en' => strtolower(str_replace(' ','-', $request->product_name_en)),
                'product_slug_bn' => strtolower(str_replace(' ','-', $request->product_name_bn)),
                'product_actual_price' => $request->product_actual_price,
                'product_sale_price' => $request->product_sale_price,
                'product_quantity' => $request->product_quantity,
                'product_insert_by' => $request->product_insert_by,
                'product_description' => $request->product_desc,
                'product_image1' => $save_url1,
                'product_image2' => $save_url2,
                'product_image3' => $save_url3,
                'updated_at' => Carbon::now(),
            ]);

            if($productUpdate){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('products')->with('message','Product Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        }
         else {
            $productUpdate = Product::where('product_id',$productID)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'brand_id' => $request->brand_id,
                'product_name_en' => $request->product_name_en,
                'product_name_bn' => $request->product_name_bn,
                'product_slug_en' => strtolower(str_replace(' ','-', $request->product_name_en)),
                'product_slug_bn' => strtolower(str_replace(' ','-', $request->product_name_bn)),
                'product_actual_price' => $request->product_actual_price,
                'product_sale_price' => $request->product_sale_price,
                'product_quantity' => $request->product_quantity,
                'product_insert_by' => $request->product_insert_by,
                'product_description' => $request->product_desc,
                'updated_at' => Carbon::now(),
            ]);

            if($productUpdate){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('products')->with('message','Product Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        }
    }

    public function productDataDelete($id){
        // dd('Request for delete');

        $products = Product::where('product_id', $id)->first();
        $oldProductImage1 = $products->product_image1;
        $oldProductImage2 = $products->product_image2;
        $oldProductImage3 = $products->product_image3;

        unlink($oldProductImage1);
        unlink($oldProductImage2);
        unlink($oldProductImage3);

        $productDelete = Product::where('product_id', $id)->delete();
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
