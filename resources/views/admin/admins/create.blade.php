@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add admins</h3>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card-body">
                        <h4 class="card-title">admins Form</h4>
                        <form class="forms-sample" action="{{ route('admin.admins.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputName1" placeholder="Enter Email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Passsword</label>
                                <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="Enter Password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Confirm password">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('admin.admins.index') }}" class="btn btn-light">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
