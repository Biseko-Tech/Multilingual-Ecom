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
                        Hello...!<strong> {{ auth()->user()->name }} </strong> Welcome To Multilingual Ecommerce
                    </span>
                </h3>
            </div>
        </div><!--/end col-md-2 -->
        <!-- ======================= CONTENT : END ======================== --> 
      </div><!-- /.row --> 
    </div><!-- /.container --> 
  </div><!-- /#top-banner-and-menu --> 

@endsection