<?php
    namespace App\Http\Controllers\DataServices;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class FrontendDataService {

    public function TotalNumberOfCategoryCollect(){
        return Category::count();
    }

    public function TotalNumberOfBrandCollect(){
        return Brand::count();
    }

    public function SingleProductInfoCollect($productId){
        return Product::where('product_id', $productId)->first();
    }

}
