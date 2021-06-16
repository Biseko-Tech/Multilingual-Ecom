@extends('admin.admin_app')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- -------------------- Add Category Page ---------------- -->
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Category</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <h5>Category Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}">
                                    @error('category_name_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Category Name Sw<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_sw" class="form-control" value="{{ $category->category_name_sw }}">
                                    @error('category_name_sw')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Category Icon<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}">
                                    @error('category_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right mt-4  pt-1">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update">
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
  
  </div>
@endsection

