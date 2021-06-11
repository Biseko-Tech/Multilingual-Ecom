@extends('frontend.main-app')
@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row"> 
        <!-- ============================ CONTENT ======================== -->
        <div class="col-md-2">
            <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user-images/'.$user->profile_photo_path) : url('upload/default.jpg') }}" class="card-img-top" style="border-radius: 50%" height="100%" width="100%" alt="image"><br><br>
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
                        Update Your Profile
                    </span>
                </h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" class="register-form outer-top-xs" role="form">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="info-title" for="name">Name</label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input" value="{{ $user->name }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="info-title" for="email">Email</label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" value="{{ $user->email }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control unicase-form-control text-input" value="{{ $user->phone }}" required autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="info-title" for="phone">Image</label>
                                <input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input">
                                @error('profile_photo_path')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                Update
                            </button>
                        </div>
                    </form>	
                </div>
            </div>
        </div><!--/end col-md-2 -->
        <!-- ======================= CONTENT : END ======================== --> 
      </div><!-- /.row --> 
    </div><!-- /.container --> 
  </div><!-- /#top-banner-and-menu --> 

@endsection