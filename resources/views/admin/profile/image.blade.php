@extends('admin.layouts.master')
@section('title', 'Profile')
@section('content')
{{-- Breadcrumb part start --}}
<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Profile Image</a>
</nav>
{{-- Breadcrumb part end --}}

{{-- Page Contents Start --}}
<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src=" {{asset(Auth::user()->image)}} " alt="card-image" style="border-radius:50%" height="100%" width="100%">
                <ul class="list-group list-group-flush">
                    <a href=" {{ route('admin-profile') }} " class="btn btn-secondary btn-sm btn-block ">Profile</a>
                    <a href=" {{ route('admin-profile-image') }} " class="btn btn-secondary btn-sm btn-block">Update Image</a>
                    <a href=" {{ route('admin-password') }} " class="btn btn-secondary btn-sm btn-block">Update Password</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Logout </a>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if(Session::has('success'))
                    <div class="alert alert-success alertsuccess" role="alert">
                        <strong> {{ Session::get('success')}} </strong>
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-warning alerterror" role="alert">
                        <strong> {{ Session::get('error') }} </strong>
                    </div>
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="card">
            <h3 class="text-center mt-4"><span class="text-danger">Hi...!</span><strong class="text-primary"> {{Auth::user()->name}} </strong>Update Your Profile Image Here..... </h3>
            <div class="card-body">
                <form action=" {{ route('admin-profile-image-update') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_profile_image" value=" {{Auth::user()->image}} ">
                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                      <label for="userImage">Profile Image</label>
                      <input type="file" class="form-control" id="userImage" aria-describedby="emailHelp" name="image">
                        @error('image')
                            <span class="text-danger"> {{ $message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div><!-- row -->
    <br><br><br><br><br>
</div><!-- sl-pagebody -->
<br><br><br><br><br>
{{-- Page Contents Start --}}
@endsection
