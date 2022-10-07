<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyProfileController extends Controller
{
    public function index(){
        return view('admin.company-profile.index');
    }

    public function companyProfileDataAdd(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'comp_name_en' => 'required',
            'comp_name_bn' => 'required',
            'comp_email1' => 'required',
            'comp_email2' => 'required',
            'comp_phone1' => 'required',
            'comp_phone2' => 'required',
            'comp_mobile1' => 'required',
            'comp_mobile2' => 'required',
            'comp_address' => 'required',
            'comp_mission' => 'required',
            'comp_vission' => 'required',
            'facebook_url' => 'required',
            'linkedin_url' => 'required',
            'twitter_url' => 'required',
            'whatsapp_num' => 'required',
            'comp_profile_img' => 'required',
            'comp_contact_address' => 'required',
            'comp_support_number' => 'required',
            'comp_hotline_number' => 'required',
            'comp_description' => 'required',
        ]);
        $image = $request->file('comp_profile_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/profile/'.$name_gen);
            $save_url = 'uploads/profile/'.$name_gen;

        $compamyProfile = CompanyProfile::where('comp_id',1)->first();
        $companyProfileData = new CompanyProfile;

        if ($compamyProfile == null) {
            $companyProfileData->comp_name_en = $request->comp_name_en;
            $companyProfileData->comp_name_bn = $request->comp_name_bn;
            $companyProfileData->comp_slug_en = strtolower(str_replace(' ','-', $request->comp_name_en));
            $companyProfileData->comp_slug_bn = strtolower(str_replace(' ','-', $request->comp_name_bn));
            $companyProfileData->comp_address = $request->comp_address;
            $companyProfileData->comp_email1 = $request->comp_email1;
            $companyProfileData->comp_email2 = $request->comp_email2;
            $companyProfileData->comp_phone1 = $request->comp_phone1;
            $companyProfileData->comp_phone2 = $request->comp_phone2;
            $companyProfileData->comp_mobile1 = $request->comp_mobile1;
            $companyProfileData->comp_mobile2 = $request->comp_mobile2;
            $companyProfileData->comp_support_number = $request->comp_support_number;
            $companyProfileData->comp_hotline_number = $request->comp_hotline_number;
            $companyProfileData->comp_description = $request->comp_description;
            $companyProfileData->comp_mission = $request->comp_mission;
            $companyProfileData->comp_vission = $request->comp_vission;
            $companyProfileData->facebook_url = $request->facebook_url;
            $companyProfileData->linkedin_url = $request->linkedin_url;
            $companyProfileData->twitter_url = $request->twitter_url;
            $companyProfileData->whatsapp_num = $request->whatsapp_num;
            $companyProfileData->comp_profile_img = $save_url;
            return $companyProfileData->save();

            if($companyProfileData == 1){
                // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
            }else {
                // Session::flash('error', 'Somthing Went wrong! Please try again later');
                Session::flash('error', 'Somthing Went wrong! Please try again later');
                return redirect()->back();
            }

        } else {
            $compamyProfile =  CompanyProfile::where('comp_id', 1)->update([
                'comp_name_en' => $request->comp_name_en,
                'comp_name_bn' => $request->comp_name_bn,
                'comp_slug_en' => strtolower(str_replace(' ','-', $request->comp_name_en)),
                'comp_slug_bn' => strtolower(str_replace(' ','-', $request->comp_name_bn)),
                'comp_address' => $request->comp_address,
                'comp_email1' => $request->comp_email1,
                'comp_email2' => $request->comp_email2,
                'comp_phone1' => $request->comp_phone1,
                'comp_phone2' => $request->comp_phone2,
                'comp_mobile1' => $request->comp_mobile1,
                'comp_mobile2' => $request->comp_mobile2,
                'facebook_url' => $request->facebook_url,
                'linkedin_url' => $request->linkedin_url,
                'twitter_url' => $request->twitter_url,
                'whatsapp_num' => $request->whatsapp_num,
                'comp_support_number' => $request->comp_support_number,
                'comp_hotline_number' => $request->comp_hotline_number,
                'comp_description' => $request->comp_description,
                'comp_mission' => $request->comp_mission,
                'comp_vission' => $request->comp_vission,
                'updated_at' => Carbon::now(),
            ]);

                if($compamyProfile){
                    // Session::flash('success', 'Information Has Been Updated Successfully'); //Custom alert
                    return redirect()->back()->with('message','Information Added Successfully'); //Toastr alert
                }else {
                    // Session::flash('error', 'Somthing Went wrong! Please try again later');
                    Session::flash('error', 'Somthing Went wrong! Please try again later');
                    return redirect()->back();
                }
            }
        }





}
