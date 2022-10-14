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


    }


