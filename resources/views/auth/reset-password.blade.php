@extends('frontend.main-app')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Reset Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->			
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Reset Password</h4>
                    <form method="POST" action="{{ route('password.update') }}" class="register-form outer-top-xs" role="form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group">
                            <label class="info-title" for="email">
                                Email Address <span>*</span></label>
                            <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" value="{{ old('email', $request->email) }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">
                                Password <span>*</span></label>
                            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password_confirmation">
                                Confirm Password <span>*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" required autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                            Reset Password
                        </button>
                    </form>					
                </div><!-- Sign-in -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ======================= BRANDS CAROUSEL ======================= -->
        @include('frontend.body.brands')
        <!-- ==================== BRANDS CAROUSEL : END ==================== -->	
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection