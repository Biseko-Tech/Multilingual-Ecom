@extends('admin.admin_app')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Change Password</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('admin.password.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">						
                                    <div class="form-group">
                                        <h5>Currrent Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="current_password" name="old_password" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password" name="password" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right mt-4  pt-1">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update">
                                    <a href="{{ route('admin.profile') }}" class="btn btn-rounded btn-dark">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.content -->

</div>

@endsection
