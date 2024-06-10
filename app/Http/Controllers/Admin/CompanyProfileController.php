<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\ProductTypeDataService;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyProfileController extends Controller
{
     public function index(){
        $profileData = (new ProductTypeDataService())->CompnyProfileInfoCollect();
 
        // dd($profileData);
        return view('admin.company-profile.index', compact('profileData'));
    }

    public function companyProfileDataAdd(Request $request)
    {
         
        $companyDataInsert = (new ProductTypeDataService())->ProfileDataInsert(
            $request->comp_name_en, $request->comp_name_bn, $request->comp_email1,
            $request->comp_email2, $request->comp_phone1, $request->comp_phone2,
            $request->comp_mobile1, $request->comp_mobile2, $request->comp_support_number,
             $request->facebook_url, $request->linkedin_url, $request->twitter_url, $request->whatsapp_num,
             $request->comp_hotline_number, $request->comp_address, $request->comp_description,
             $request->comp_mission, $request->comp_vission, $request->comp_profile_img, $request->old_image);

        // dd('After Insertion');
        if($companyDataInsert){
            // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
            return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
        }else {
            // Session::flash('error', 'Somthing Went wrong! Please try again later');
            Session::flash('error', 'Somthing Went wrong! Please try again later');
            return redirect()->back();
        } 
       
    }
}
