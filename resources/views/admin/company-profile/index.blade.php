@extends('admin.layouts.master')
@section('title', 'Company Profile')
@section('company-profile')
    active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="index.html">Company Profile Update</a>
</nav>
<br><br>
<div class="sl-pagebody">
    {{-- Form Part start   --}}
    <div class="row row-sm">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form class="form-horizontal company-form" id="registration" enctype="multipart/form-data" method="post" action=" {{ route('company-profile-add') }} ">
              @csrf
              <div class="card">
                  <div class="card-header">
                    <h4 class="card-body-title mt-2">Add Company Profile Information</h4>
                  </div>
                  <div class="card-body card_form">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            @if(Session::has('success'))
                              <div class="alert alert-success alertsuccess" role="alert" style="margin-left: -20px">
                                 <strong>Successfully!</strong> Updated Profile.
                              </div>
                            @endif
                            @if(Session::has('error'))
                              <div class="alert alert-warning alerterror" role="alert" style="margin-left: -20px">
                                 <strong>Opps!</strong> please try again.
                              </div>
                            @endif
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="form-group row custom_form_group{{ $errors->has('comp_name_en') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Company Name English:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="comp_name_en" value=" @if ($profileData != null) {{ $profileData->comp_name_en}} @endif "  placeholder="Enter Company English Name" required>
                          @if ($errors->has('comp_name_en'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_name_en') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_name_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Company Name Bangla:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Enter Company Arabic Name"  class="form-control" name="comp_name_bn" value=" @if ($profileData != null) {{ $profileData->comp_name_bn}} @endif " required>
                          @if ($errors->has('comp_name_bn'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_name_bn') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>



                    <div class="form-group row custom_form_group{{ $errors->has('comp_email1') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Email 1:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Enter Company Email Address"  class="form-control" name="comp_email1" value=" @if ($profileData != null) {{ $profileData->comp_email1}} @endif " required>
                          @if ($errors->has('comp_email1'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_email1') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>

                    <div class="form-group row custom_form_group{{ $errors->has('comp_email2') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Email 2:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Enter Company Email Address" class="form-control" name="comp_email2" value=" @if ($profileData != null) {{ $profileData->comp_email2}} @endif " required>
                          @if ($errors->has('comp_email2'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_email2') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_phone1') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Phone 1:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Enter Company Phone"  class="form-control" name="comp_phone1" value=" @if ($profileData != null) {{ $profileData->comp_phone1}} @endif " required>
                          @if ($errors->has('comp_phone1'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_phone1') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 control-label">Phone 2:</label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Enter Company Phone" class="form-control" name="comp_phone2" value=" @if ($profileData != null) {{ $profileData->comp_phone2}} @endif ">

                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_mobile1') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Mobile 1:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Enter Company Mobile Number"  class="form-control" name="comp_mobile1" value=" @if ($profileData != null) {{ $profileData->comp_mobile1}} @endif " required>
                          @if ($errors->has('comp_mobile1'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_mobile1') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_mobile2') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Mobile 2:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Enter Company Mobile Number" class="form-control" name="comp_mobile2" value=" @if ($profileData != null) {{ $profileData->comp_mobile2}} @endif " required>
                          @if ($errors->has('comp_mobile2'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_mobile2') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_support_number') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Contact Number:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" placeholder="Enter Company Contact Number" class="form-control" name="comp_support_number" value=" @if ($profileData != null) {{ $profileData->comp_support_number}} @endif " required>
                          @if ($errors->has('comp_support_number'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_support_number') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_contact_address') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Contact Address:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <textarea placeholder="Enter Company Contact Address" name="comp_contact_address" class="form-control" required> @if ($profileData != null) {{ $profileData->comp_contact_address}} @endif </textarea>
                          @if ($errors->has('comp_contact_address'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_contact_address') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_profile_img') ? ' has-error' : '' }}">
                        <label class="col-sm-3 form-control-label">Company Profile Image: <span class="tx-danger">*</span></label>
                          <div class="col-sm-7">
                            <input type="file" class="custom-file-input" name="comp_profile_img" id="CompanyImg">
                            <span class="custom-file-control custom-file-control-inverse"></span>
                            @if ($errors->has('comp_profile_img'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('comp_profile_img') }}</strong>
                                </span>
                            @endif
                            <div class="row" id="preview_image"></div>
                          </div>
                      </div>

                    <div class="form-group row custom_form_group{{ $errors->has('facebook_url') ? ' has-error' : '' }}">
                          <label class="col-sm-3 control-label">Facebook Link:<span class="tx-danger">*</span></label>
                          <div class="col-sm-7">
                            <input type="text" placeholder="Your Facebook Link" class="form-control" name="facebook_url" value=" @if ($profileData != null) {{ $profileData->facebook_url}} @endif " required>
                            @if ($errors->has('facebook_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('facebook_url') }}</strong>
                                </span>
                            @endif
                          </div>
                      </div>
                      <div class="form-group row custom_form_group{{ $errors->has('linkedin_url') ? ' has-error' : '' }}">
                          <label class="col-sm-3 control-label">LinkedIn Link:<span class="tx-danger">*</span></label>
                          <div class="col-sm-7">
                            <input type="text" placeholder="Your LinkedIn Link" class="form-control" name="linkedin_url" value=" @if ($profileData != null) {{ $profileData->linkedin_url}} @endif " required>
                            @if ($errors->has('linkedin_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkedin_url') }}</strong>
                                </span>
                            @endif
                          </div>
                      </div>
                      <div class="form-group row custom_form_group{{ $errors->has('twitter_url') ? ' has-error' : '' }}">
                          <label class="col-sm-3 control-label">Twitter link:<span class="tx-danger">*</span></label>
                          <div class="col-sm-7">
                            <input type="text" placeholder="Your Twitter Link " class="form-control" name="twitter_url" value=" @if ($profileData != null) {{ $profileData->twitter_url}} @endif " required>
                            @if ($errors->has('twitter_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('twitter_url') }}</strong>
                                </span>
                            @endif
                          </div>
                      </div>
                      <div class="form-group row custom_form_group{{ $errors->has('whatsapp_num') ? ' has-error' : '' }}">
                          <label class="col-sm-3 control-label">Whatsapp Number:<span class="tx-danger">*</span></label>
                          <div class="col-sm-7">
                            <input type="text" placeholder="Your Whatsapp Number" class="form-control" name="whatsapp_num" value=" @if ($profileData != null) {{ $profileData->whatsapp_num}} @endif " required>
                            @if ($errors->has('whatsapp_num'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('whatsapp_num') }}</strong>
                                </span>
                            @endif
                          </div>
                      </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_hotline_number') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Hotline Number:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <input type="text"  placeholder="Enter Company Hotline Number"  class="form-control" name="comp_hotline_number" value=" @if ($profileData != null) {{ $profileData->comp_hotline_number}} @endif ">
                          @if ($errors->has('comp_hotline_number'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_hotline_number') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_address') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Address:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <textarea placeholder="Enter Company Address"  name="comp_address" class="form-control" required> @if ($profileData != null) {{ $profileData->comp_address}} @endif </textarea>
                          @if ($errors->has('comp_address'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_address') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_description') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Description:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <textarea placeholder="Enter Company Profile Description"  name="comp_description" class="form-control" required> @if ($profileData != null) {{ $profileData->comp_description}} @endif </textarea>
                          @if ($errors->has('comp_description'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_description') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_mission') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Mission:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <textarea placeholder="Enter Company Mission"  name="comp_mission" class="form-control" required> @if ($profileData != null) {{ $profileData->comp_mission}} @endif </textarea>
                          @if ($errors->has('comp_mission'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_mission') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('comp_vission') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Vision:<span class="tx-danger">*</span></label>
                        <div class="col-sm-7">
                          <textarea placeholder="Enter Company Vission" name="comp_vission" class="form-control" required> @if ($profileData != null) {{ $profileData->comp_vission}} @endif </textarea>
                          @if ($errors->has('comp_vission'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('comp_vission') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                  </div>
                  <div class="card-footer card_footer_button text-center">
                      <button type="submit" id="onSubmit" onclick="formValidation();" class="btn btn-primary waves-effect">UPDATE</button>
                  </div>
              </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div><!-- row -->
    {{-- Form Part End   --}}
    <br><br>
    {{-- Table Part Start --}}
    {{-- <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Banner</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead class="bg-info">
                            <tr>
                                <th>Profile Img</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($profileData as $profile )
                                <tr>
                                    <td>
                                        <img src="{{ asset($profile->comp_profile_img) }}" alt="" style="width: 100px">
                                    </td>
                                    <td> {{ $profile->comp_name_en }} </td>
                                    <td> {{ $profile->comp_email1 }} </td>
                                    <td> {{ $profile->comp_phone1 }} </td>
                                    <td> {{ $profile->comp_address }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
    </div> --}}
    {{-- Table Part End --}}
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
<script>
    //  ################## Selected Image preview ###################
    $(document).ready(function () {
        $('#CompanyImg').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                        .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src',
                                    e.target.result).width(80)
                                    .height(80); //create image element
                                $('#preview_image').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });


</script>
@endsection
