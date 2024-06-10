@extends('admin.layouts.master')
@section('title', 'Register')
@section('user-create')
active
@endsection
@section('content')

{{-- Breadcrumb part start --}}
<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Create User</a>
</nav>
{{-- Breadcrumb part end --}}


{{-- Page Contents Start --}}
<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-sm-2"> </div>
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
            <!-- create a new account -->
            <div class="card">
                <h3 class="text-center mt-4"><span class="text-danger">Hi!</span><strong class="text-primary">
                        {{Auth::user()->name}} </strong>Create A New User Here</h3>
                <div class="card-body">
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Enter your name"
                                class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span class="text-danger">*</span></label>
                            <input type="email" placeholder="Enter your email"
                                class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail2"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Enter your number"
                                class="form-control  @error('phone') is-invalid @enderror" id="exampleInputEmail2"
                                name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span class="text-danger">*</span></label>
                            <input type="password" placeholder="Your password"
                                class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1"
                                name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password
                                <span>*</span></label>
                            <input id="password-confirm" placeholder="Confirm your password" type="password"
                                class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button"> {{ __('Register') }}</button>
                    </form>
                </div>
                <!-- create a new account -->
            </div>
        </div>
        <div class="col-md-2"></div>
    </div><!-- row -->

</div><!-- card -->
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
