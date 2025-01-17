<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;

    class ProductInfoDataService {
        // Category Wise SubCategory Data show
        public function CategoryWiseSubCatgInfoCollect($catg_id){
            return  Subcategory::select('subcategory_id', 'subcategory_name_en')->where('category_id', $catg_id)->get();
        }
        // Subcategory Wise Brand Data show
        public function SubCatgWiseBrandDataCollect($subCatg_id){
            return  Brand::select('brand_id', 'brand_name_en')->where('subcategory_id', $subCatg_id)->get();
        }

        public function CategoryInfoCollect(){
            return Category::latest()->get();
        }

        public function CategoryDataInsert($catg_name_en, $catg_name_bn, $image){
            // dd("calling from DataService");
            return Category::insert([
                'category_name_en' => $catg_name_en,
                'category_name_bn' => $catg_name_bn,
                'category_slug_en' => strtolower(str_replace(' ','-', $catg_name_en)),
                'category_slug_bn' => strtolower(str_replace(' ','-', $catg_name_bn)),
                'category_image' => $image,
                'created_at' => Carbon::now(),
            ]);
        }

        public function CategoryInfoEdit($catg_id){
            return Category::where('category_id', $catg_id)->first();
        }

        public function CtgDataUpdateIfHasImage($catg_id, $ctg_name_en, $ctg_name_bn, $image){
            // dd('This is for update request');
            return Category::where('category_id', $catg_id)->update([
            'category_name_en' => $ctg_name_en,
            'category_name_bn' => $ctg_name_bn,
            'category_slug_en' => strtolower(str_replace(' ','-', $ctg_name_en)),
            'category_slug_bn' => strtolower(str_replace(' ','-', $ctg_name_bn)),
            'category_image' => $image,
            'updated_at' => Carbon::now(),
           ]);
        }

        public function ctgUpdateifNoImage($catg_id, $catg_name_en, $catg_name_bn){
            return Category::where('category_id', $catg_id)->update([
                'category_name_en' => $catg_name_en,
                'category_name_bn' => $catg_name_bn,
                'category_slug_en' => strtolower(str_replace(' ','-', $catg_name_en)),
                'category_slug_bn' => strtolower(str_replace(' ','-', $catg_name_bn)),
                'updated_at' => Carbon::now(),
            ]);
        }

        public function CategoryDataDelete($catg_id){
            $category = Category::where('category_id', $catg_id)->first();
            $old_img = $category->category_image;
            unlink($old_img);

            return Category::where('category_id', $catg_id)->delete();
        }
        // ##########################################  Category Part  ######################################

        // ######################################## Sub Category Part #####################################
        public function SubCategoryInfoColloct(){
            return Subcategory::latest()->get();
        }

        public function SubCategoryDataInsert($subcatg_name_en, $subcatg_name_bn, $catg_id){
            return Subcategory::insert([
                'subcategory_name_en' => $subcatg_name_en,
                'subcategory_name_bn' => $subcatg_name_bn,
                'subcategory_slug_en' => strtolower(str_replace(' ','-', $subcatg_name_en)),
                'subcategory_slug_bn' => strtolower(str_replace(' ','-', $subcatg_name_bn)),
                'category_id' => $catg_id,
                'created_at' => Carbon::now(),
            ]);
        }

        public function SubCategInfoEdit($id){
            return Subcategory::where('subcategory_id', $id)->first();
        }

        public function SubcatgDataUpdate($subCatg_id, $subCatg_name_en, $subcatg_name_bn, $catg_id){
            return Subcategory::where('subcategory_id', $subCatg_id)->update([
                'subcategory_name_en' => $subCatg_name_en,
                'subcategory_name_bn' => $subcatg_name_bn,
                'subcategory_slug_en' => strtolower(str_replace(' ','-', $subCatg_name_en,)),
                'subcategory_slug_bn' => strtolower(str_replace(' ','-', $subcatg_name_bn)),
                'category_id' => $catg_id,
                'updated_at' => Carbon::now(),
            ]);
        }

        public function SubCatgDataDelete($subCatg_id){
            return Subcategory::where('subcategory_id', $subCatg_id)->delete();
        }

        // ########################################  Brand Part  ########################################

        public function BrandInfoCollect(){
            return Brand::latest()->get();
        }

        public function BrandDataInsert($catg_id, $subCatg_id, $brand_name_en, $brand_name_bn, $image){
            return Brand::insert([
                'category_id' => $catg_id,
                'subcategory_id' => $subCatg_id,
                'brand_name_en' => $brand_name_en,
                'brand_name_bn' => $brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-', $brand_name_en)),
                'brand_slug_bn' => strtolower(str_replace(' ','-', $brand_name_bn)),
                'brand_image' => $image,
                'created_at' => Carbon::now(),
            ]);
        }

        public function BrandInfoUpdatIfHasImg($brand_id, $catg_id, $subCatg_id, $brand_name_en, $brand_name_bn, $image){
            return Brand::where('brand_id',$brand_id)->update([
                'category_id' => $catg_id,
                'subcategory_id' => $subCatg_id,
                'brand_name_en' => $brand_name_en,
                'brand_name_bn' => $brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-', $brand_name_en)),
                'brand_slug_bn' => strtolower(str_replace(' ','-', $brand_name_bn)),
                'brand_image' => $image,
                'updated_at' => Carbon::now(),
            ]);
        }

        public function BrandInfoUpdatIfNOImg($brand_id, $catg_id, $subCatg_id, $brand_name_en, $brand_name_bn){
            return Brand::where('brand_id',$brand_id)->update([
                'category_id' => $catg_id,
                'subcategory_id' => $subCatg_id,
                'brand_name_en' => $brand_name_en,
                'brand_name_bn' => $brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-', $brand_name_en)),
                'brand_slug_bn' => strtolower(str_replace(' ','-', $brand_name_bn)),
                'updated_at' => Carbon::now(),
            ]);
        }

        public function BrandDataDelete($brand_id){
            $brand = Brand::where('brand_id', $brand_id)->first();
            $img = $brand->brand_image;
            unlink($img);

            return Brand::where('brand_id', $brand_id)->delete();
        }

        public function BrandInfoEdit($brand_id){
            return Brand::where('brand_id', $brand_id)->first();
        }

    }


