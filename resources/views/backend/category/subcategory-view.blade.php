@extends('admin.admin_app')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sub Category List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Sub Category En</th>
                                    <th>Sub Category Sw</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategory as $item)
                                <tr>
                                    <td>{{ $item['category']['category_name_en'] }}</td>
                                    <td>{{ $item->subcategory_name_en }}</td>
                                    <td>{{ $item->subcategory_name_sw }}</td>
                                    <td width="22%">
                                        <a href="{{ route('subcategory.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ route('subcategory.delete', $item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        <!-- -------------------- Add Sub Category Page ---------------- -->
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Sub Category</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action="{{ route('subcategory.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected="" disabled="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                    <input type="text" name="subcategory_name_en" class="form-control">
                                    @error('subcategory_name_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Sub Category Name Sw<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_sw" class="form-control">
                                    @error('subcategory_name_sw')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right mt-4  pt-1">
                                <input type="submit" class="btn btn-rounded btn-info" value="Save">
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

