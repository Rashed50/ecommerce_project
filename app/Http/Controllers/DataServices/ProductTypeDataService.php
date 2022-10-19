<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Brand;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use App\Models\CompanyProfile;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductTypeDataService {
        // ########################################  Company Profile Part Start ########################################

    public function CompnyProfileInfoCollect(){
        return CompanyProfile::latest()->first();
    }

    public function ProfileDataInsert(
        $comp_name_en, $comp_name_bn, $comp_email1,$comp_email2,$comp_phone1,
        $comp_phone2, $comp_mobile1,$comp_mobile2,$comp_support_number,$facebook_url,
        $linkedin_url, $twitter_url,$whatsapp_num, $comp_hotline_number, $comp_address,
        $comp_description,$comp_mission, $comp_vission, $comp_profile_img, $old_img)
        {

        // dd($comp_name_en, $comp_name_bn, $comp_email1,$comp_email2,$comp_phone1,
        // $comp_phone2, $comp_mobile1,$comp_mobile2,$comp_support_number,$facebook_url,
        // $linkedin_url, $twitter_url,$whatsapp_num, $comp_hotline_number, $comp_address,
        // $comp_description,$comp_mission, $comp_vission, $comp_profile_img, $old_img);
        // dd($old_img);

        $companyProfile = CompanyProfile::all();

        if ($companyProfile->isEmpty()) {
            // dd("This is an empty table");
            $save_img = "";
            if ($comp_profile_img != null) {
                $image = $comp_profile_img;
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(166,110)->save('uploads/profile/'.$name_gen);
                $save_img = 'uploads/profile/'.$name_gen;
            }
            return CompanyProfile::insert([
                'comp_name_en' => $comp_name_en,
                'comp_name_bn' => $comp_name_bn,
                'comp_slug_en' => strtolower(str_replace(' ','-', $comp_name_en)),
                'comp_slug_bn' => strtolower(str_replace(' ','-', $comp_name_bn)),
                'comp_address' => $comp_address,
                'comp_email1' => $comp_email1,
                'comp_email2' => $comp_email2,
                'comp_phone1' => $comp_phone1,
                'comp_phone2' => $comp_phone2,
                'comp_mobile1' => $comp_mobile1,
                'comp_mobile2' => $comp_mobile2,
                'comp_profile_img' => $save_img,
                'comp_support_number' => $comp_support_number,
                'comp_hotline_number' => $comp_hotline_number,
                'comp_description' => $comp_description,
                'comp_mission' => $comp_mission,
                'comp_vission' => $comp_vission,
                'facebook_url' => $facebook_url,
                'linkedin_url' => $linkedin_url,
                'twitter_url' => $twitter_url,
                'whatsapp_num' => $whatsapp_num,
                'created_at' => Carbon::now(),
            ]);
        } else {
            // dd($comp_profile_img);
            if ($comp_profile_img != null) {
                $image = $comp_profile_img;
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(166,110)->save('uploads/profile/'.$name_gen);
                $save_img = 'uploads/profile/'.$name_gen;

                CompanyProfile::where('comp_id', 1)->update([
                    'comp_profile_img' => $save_img,
                ]);
                unlink($old_img);
            }

            return CompanyProfile::where('comp_id', 1)->update([
                'comp_name_en' => $comp_name_en,
                'comp_name_bn' => $comp_name_bn,
                'comp_slug_en' => strtolower(str_replace(' ','-', $comp_name_en)),
                'comp_slug_bn' => strtolower(str_replace(' ','-', $comp_name_bn)),
                'comp_address' => $comp_address,
                'comp_email1' => $comp_email1,
                'comp_email2' => $comp_email2,
                'comp_phone1' => $comp_phone1,
                'comp_phone2' => $comp_phone2,
                'comp_mobile1' => $comp_mobile1,
                'comp_mobile2' => $comp_mobile2,
                'comp_support_number' => $comp_support_number,
                'comp_hotline_number' => $comp_hotline_number,
                'comp_description' => $comp_description,
                'comp_mission' => $comp_mission,
                'comp_vission' => $comp_vission,
                'facebook_url' => $facebook_url,
                'linkedin_url' => $linkedin_url,
                'twitter_url' => $twitter_url,
                'whatsapp_num' => $whatsapp_num,
                'updated_at' => Carbon::now(),
            ]);
        }
    }
    // ########################################  Company Profile Part End ########################################


    // ########################################  Product Part Start ########################################

    public function CategoeyInfoCollect(){
        return Category::latest()->get();
    }

    public function SubcategoeyInfoCollect(){
        return Subcategory::latest()->get();
    }

    public function BrandInfoCollect(){
        return Brand::latest()->get();
    }

    public function ProductInfoCollect(){
        return Product::latest()->get();
    }

    public function ProductDataInsert(
        $category_id, $subcategory_id, $brand_id,
        $product_name_en, $product_name_bn, $product_actual_price, $product_sale_price,
        $product_quantity, $product_insert_by, $product_desc,
        $product_image1, $product_image2, $product_image3){

            // dd($product_image3);

        $image1 = $product_image1;
        $name_gen = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
        Image::make($image1)->resize(917,1000)->save('uploads/products/'.$name_gen);
        $save_url1 = 'uploads/products/'.$name_gen;

        // dd($request->product_image2);
        if ($product_image2 == null) {
           $save_url2 = "";
        }else {
            $image2 = $product_image2;
            $name_gen = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(917,1000)->save('uploads/products/'.$name_gen);
            $save_url2 = 'uploads/products/'.$name_gen;
        }
        if ($product_image3 == null) {
           $save_url3 = "";
        }else {
            $image3 = $product_image3;
            $name_gen = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
            Image::make($image3)->resize(917,1000)->save('uploads/products/'.$name_gen);
            $save_url3 = 'uploads/products/'.$name_gen;
        }

        return Product::insert([
            'category_id' => $category_id,
            'subcategory_id' => $subcategory_id,
            'brand_id' => $brand_id,
            'product_name_en' => $product_name_en,
            'product_name_bn' => $product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ','-', $product_name_en)),
            'product_slug_bn' => strtolower(str_replace(' ','-', $product_name_bn)),
            'product_actual_price' => $product_actual_price,
            'product_sale_price' => $product_sale_price,
            'product_quantity' => $product_quantity,
            'product_insert_by' => $product_insert_by,
            'product_description' => $product_desc,
            'product_image1' => $save_url1,
            'product_image2' => $save_url2,
            'product_image3' => $save_url3,
            'created_at' => Carbon::now(),
        ]);

    }

    public function GetSingleProductInfo($prodct_id){
        return Product::where('product_id', $prodct_id)->first();
    }

    public function productDataUpdate(
        $product_id, $old_pro_img1, $old_pro_img2, $old_pro_img3, $catg_id, $subCatg_id, $brand_id,
        $product_name_en, $product_name_bn, $product_actual_price, $product_sale_price, $product_quantity,
        $product_insert_by, $product_desc, $product_image1, $product_image2, $product_image3){


        $productID = $product_id;
        $oldProductImage1 = $old_pro_img1;
        $oldProductImage2 = $old_pro_img2;
        $oldProductImage3 = $old_pro_img3;

        if ($product_image1) {
            // unlink($oldProductImage1);
            File::delete($oldProductImage1);
            $image1 = $product_image1;
            $name_gen = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(917,1000)->save('uploads/products/'.$name_gen);
            $save_url1 = 'uploads/products/'.$name_gen;
        }
        if ($product_image2 == null) {
           $save_url2 = "";
        }elseif ($product_image2) {
            $image2 = $product_image2;
            $name_gen = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(917,1000)->save('uploads/products/'.$name_gen);
            $save_url2 = 'uploads/products/'.$name_gen;

            Product::where('product_id', $productID)->update([
                'product_image2' => $save_url2,
            ]);
            // unlink($oldProductImage2);
            File::delete($oldProductImage2);
        }
        if ($product_image3 == null) {
           $save_url3 = "";
        }elseif ($product_image3) {
            $image3 = $product_image3;
            $name_gen = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
            Image::make($image3)->resize(917,1000)->save('uploads/products/'.$name_gen);
            $save_url3 = 'uploads/products/'.$name_gen;

            Product::where('product_id', $productID)->update([
                'product_image3' => $save_url3,
            ]);
            // unlink($oldProductImage3);
            File::delete($oldProductImage3);

            return Product::where('product_id',$productID)->update([
                'category_id' => $catg_id,
                'subcategory_id' => $subCatg_id,
                'brand_id' => $brand_id,
                'product_name_en' =>  $product_name_en,
                'product_name_bn' => $product_name_bn,
                'product_slug_en' => strtolower(str_replace(' ','-', $product_name_en)),
                'product_slug_bn' => strtolower(str_replace(' ','-', $product_name_bn)),
                'product_actual_price' => $product_actual_price,
                'product_sale_price' => $product_sale_price,
                'product_quantity' => $product_quantity,
                'product_insert_by' => $product_insert_by,
                'product_description' =>$product_desc,
                'product_image1' => $save_url1,
                'updated_at' => Carbon::now(),
            ]);
        }
         else {
            return Product::where('product_id',$productID)->update([
                'category_id' => $catg_id,
                'subcategory_id' => $subCatg_id,
                'brand_id' => $brand_id,
                'product_name_en' =>  $product_name_en,
                'product_name_bn' => $product_name_bn,
                'product_slug_en' => strtolower(str_replace(' ','-', $product_name_en)),
                'product_slug_bn' => strtolower(str_replace(' ','-', $product_name_bn)),
                'product_actual_price' => $product_actual_price,
                'product_sale_price' => $product_sale_price,
                'product_quantity' => $product_quantity,
                'product_insert_by' => $product_insert_by,
                'product_description' =>$product_desc,
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    public function ProductDataDelete($prodct_id){

        $products = Product::where('product_id', $prodct_id)->first();
        $oldProductImage1 = $products->product_image1;
        $oldProductImage2 = $products->product_image2;
        $oldProductImage3 = $products->product_image3;

            File::delete($oldProductImage1);
            File::delete($oldProductImage2);
            File::delete($oldProductImage3);

        return Product::where('product_id', $prodct_id)->delete();

    }

    // ########################################  Product Part End ########################################
}




