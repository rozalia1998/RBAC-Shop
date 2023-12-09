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
                        Product <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Product Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product Description</th>
                                    <th>Product Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                        @if($product->image)
                                            <img src="{{ asset('uploads/product/'.$product->image) }}" alt="{{ $product->name }}" width="100" />
                                        @else
                                            No Image
                                        @endif
                                        </td>
                                        <td>
                                            {{ $product->description }}
                                        </td>
                                         <td>
                                            {{ $product->price }}
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ url('admin/product/delete/'.$product->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-danger">Delete</button>
                                            </form>
                                            <br>
                                            <a class="btn btn-xs btn-success" href="{{ url('admin/product/edit/'.$product->id)}}">
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
