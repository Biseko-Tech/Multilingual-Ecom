@extends('admin.admin_app')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- -------------------- Add Sub Category Page ---------------- -->
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Sub Category</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected="" disabled="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
							</div>
                            <div class="form-group">
                                <h5>Sub Category Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}">
                                    @error('subcategory_name_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Sub Category Name Sw<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_sw" class="form-control" value="{{ $subcategory->subcategory_name_sw }}">
                                    @error('subcategory_name_sw')
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

