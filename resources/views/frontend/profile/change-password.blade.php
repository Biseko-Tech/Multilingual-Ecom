@extends('frontend.main-app')
@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row"> 
        <!-- ============================ CONTENT ======================== -->
        <div class="col-md-2">
            <img src="{{ (!empty(auth()->user()->profile_photo_path)) ? url('upload/user-images/'.auth()->user()->profile_photo_path) : url('upload/default.jpg') }}" class="card-img-top" style="border-radius: 50%" height="100%" width="100%" alt="image"><br><br>
            <ul class="list-group list-group-flush">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                <a href="{{ route('user.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
            </ul>
        </div><!--/end col-md-2 -->
        <div class="col-md-10">
            <div class="card">
                <h3 class="text-center">
                    <span class="text-danger">
                        Change Password
                    </span>
                </h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.password.update') }}" class="register-form outer-top-xs" role="form">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="name">Current Password</label>
                            <input type="password" id="current_password" name="old_password" class="form-control unicase-form-control text-input" required autofocus>
                            @error('oldpassword')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">New Password</label>
                            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" required autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="phone">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" required autofocus>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                            Update
                        </button>
                    </form>	
                </div>
            </div>
        </div><!--/end col-md-2 -->
        <!-- ======================= CONTENT : END ======================== --> 
      </div><!-- /.row --> 
    </div><!-- /.container --> 
  </div><!-- /#top-banner-and-menu --> 

@endsection