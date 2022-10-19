<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function about(){
        $totalCategory = (new FrontendDataService())->TotalNumberOfCategoryCollect();
        $totalBrands = (new FrontendDataService())->TotalNumberOfBrandCollect();
        return view('frontend.about', compact('totalCategory', 'totalBrands'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function privacyInfo(){
        return view('frontend.privacy');
    }

    public function ProductDetails($id){
        $singleProduct = (new FrontendDataService())->SingleProductInfoCollect($id);
        // dd($singleProduct);
        return view('frontend.product-details', compact('singleProduct'));
    }
}
