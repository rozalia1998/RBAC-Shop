@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Admin</h3>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card-body">
                        <h4 class="card-title">Product Form</h4>
                        <form class="forms-sample" action="{{ route('admin.admins.update',$admin->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $admin->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputName1" value="{{ $admin->email }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('admin.product.index') }}" class="btn btn-light">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
