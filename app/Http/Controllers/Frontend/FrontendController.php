<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function about(){
        $totalCategory = Category::count();
        $totalBrands = Brand::count();
        // dd($totalCategory);
        return view('frontend.about', compact('totalCategory', 'totalBrands'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function privacyInfo(){
        return view('frontend.privacy');
    }
}
