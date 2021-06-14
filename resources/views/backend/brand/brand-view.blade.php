@extends('admin.admin_app')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Brand List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Brand En</th>
                                    <th>Brand Sw</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $item)
                                <tr>
                                    <td>{{ $item->brand_name_en }}</td>
                                    <td>{{ $item->brand_name_sw }}</td>
                                    <td>
                                        <img src="{{ asset('upload/brand-images/'.$item->brand_image) }}" alt="image" style="width: 70px; height: 40px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ route('brand.delete', $item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        <!-- -------------------- Add Brand Page ---------------- -->
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Brands</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Brand Name En<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_en" class="form-control">
                                    @error('brand_name_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Brand Name Sw<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_sw" class="form-control">
                                    @error('brand_name_sw')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Brand Image<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="brand_image" class="form-control">
                                    @error('brand_image')
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

