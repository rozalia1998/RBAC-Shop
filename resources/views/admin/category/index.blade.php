@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
             @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        <h2>{{ session('message') }}</h2>
                    </div>
                @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        Category <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Category Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Sub Categories</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                        @if($category->image)
                                            <img src="{{ asset('uploads/category/'.$category->image) }}" alt="{{ $category->name }}" width="100" />
                                        @else
                                            No Image
                                        @endif
                                        </td>
                                        <td>
                                            {{ $category->parent ? $category->parent->name : "No Parent Category" }}
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.category.delete',$category->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-danger">Delete</button>
                                            </form>
                                            <br>
                                            <a class="btn btn-xs btn-success" href="{{ route('admin.category.edit', $category->id) }}">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
