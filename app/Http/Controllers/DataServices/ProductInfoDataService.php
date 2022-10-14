<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Category;
use Carbon\Carbon;

    class ProductInfoDataService {

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
            'created_at' => Carbon::now(),
           ]);
        }

        public function ctgUpdateifNoImage($catg_id, $catg_name_en, $catg_name_bn){
            return Category::where('category_id', $catg_id)->update([
                'category_name_en' => $catg_name_en,
                'category_name_bn' => $catg_name_bn,
                'category_slug_en' => strtolower(str_replace(' ','-', $catg_name_en)),
                'category_slug_bn' => strtolower(str_replace(' ','-', $catg_name_bn)),
                'created_at' => Carbon::now(),
               ]);
        }

        public function CategoryDataDelete($catg_id){
            $category = Category::where('category_id', $catg_id)->first();
            $old_img = $category->category_image;
            unlink($old_img);

            return Category::where('category_id', $catg_id)->delete();
        }




    }


