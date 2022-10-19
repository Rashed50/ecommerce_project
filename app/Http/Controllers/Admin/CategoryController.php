<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\ProductInfoDataService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    // Category Wise SubCategory Data show
    public function categoryWiseSubcategory($id){
        $data = (new ProductInfoDataService())->CategoryWiseSubCatgInfoCollect($id);
        return json_encode($data);
    }


    public function index(){
        $categories = (new ProductInfoDataService())->CategoryInfoCollect();
        return view('admin.category.index', compact('categories'));
    }

    public function categoryDataAdd(Request $request){
        //   dd($request->all());

          $this->validate($request, [
            'category_image' => 'required',
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
        ],[
            'category_name_en.required' => 'Please input category name in English',
            'category_name_bn.required' => 'Please input category name in Bangla',
            'category_image.required' => 'Please input category image',
        ]);
        // dd('After validation');

            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/categories/'.$name_gen);
            $save_url = 'uploads/categories/'.$name_gen;

            $categoryAdd = (new ProductInfoDataService())->CategoryDataInsert($request->category_name_en, $request->category_name_bn, $save_url);

        if($categoryAdd){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function categoryDataEdit($id){
        $category = (new ProductInfoDataService())->CategoryInfoEdit($id);
        return view('admin.category.edit', compact('category'));
    }

    public function categoryDataUpdate(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'category_image' => 'required',
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
        ], [
            'category_image.required' => 'Please Enter Category Image Here.....',
            'category_name_en.required' => 'Please Enter Category English Name Here.....',
            'category_name_bn.required' => 'Please Enter Category Bangla Name Here.....',
        ]);
        // dd('After validation');



        $old_image = $request->old_image;

        if ($request->file('category_image')) {
            unlink($old_image);
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/categories/'.$name_gen);
            $save_url = 'uploads/categories/'.$name_gen;

            $category = (new ProductInfoDataService())->CtgDataUpdateIfHasImage($request->category_id, $request->category_name_en, $request->category_name_bn, $save_url);

            if($category){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('categories')->with('message','Category Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        } else {
            $category = (new ProductInfoDataService())->ctgUpdateifNoImage($request->category_name_en, $request->category_name_bn, $request->category_id,);

            if($category){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->route('categories')->with('message','Category Data Updated Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }
        }
    }

    public function categoryDataDelete($id){
        $categoryData = (new ProductInfoDataService())->CategoryDataDelete($id);

        if($categoryData){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('categories')->with('message','Category Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    // ########################################  Sub Category Part  ########################################

    public function subCategoryIndex(){
        $categories = (new ProductInfoDataService())->CategoryInfoCollect();
        $subcategories = (new ProductInfoDataService())->SubCategoryInfoColloct();
        return view('admin.subcategory.index', compact('subcategories','categories'));
    }

    public function subCategoryAdd(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ],[
            'category_id.required' => 'Please choose any category option',
            'subcategory_name_en.required' => 'Please input sub category name in English',
            'subcategory_name_bn.required' => 'Please input sub category name in Bangla',
        ]);
        // dd('After validation');

        $subcategoryAdd = (new ProductInfoDataService())->SubCategoryDataInsert($request->subcategory_name_en, $request->subcategory_name_bn, $request->category_id);

        if($subcategoryAdd){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function subcategoryDataEdit($id){
        $categories = (new ProductInfoDataService())->CategoryInfoCollect();
        $subcatgDataFind = (new ProductInfoDataService())->SubCategInfoEdit($id);
        return view('admin.subcategory.edit', compact('subcatgDataFind', 'categories'));
    }

    public function subcategoryDataUpdate(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ], [
            'category_id.required' => 'Please Choose any Category Name.....',
            'subcategory_name_en.required' => 'Please Enter Sub Category English Name Here.....',
            'subcategory_name_bn.required' => 'Please Enter Sub Category Bangla Name Here.....',
        ]);
        // dd('After validation');
        $subcategory_id = $request->subcategory_id;

        $update = (new ProductInfoDataService())->SubcatgDataUpdate($request->subcategory_id, $request->subcategory_name_en, $request->subcategory_name_bn, $request->category_id);

        if($update){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('subcategories')->with('message','Sub Category Information Updated Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }

    public function subcategoryDataDelete($id){
        $subcategoryDataDelete = (new ProductInfoDataService())->SubCatgDataDelete($id);
        if($subcategoryDataDelete){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->route('subcategories')->with('message','Sub Category Data Deleted Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        }
    }


}

