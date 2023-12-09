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
                        Admin

                            <a href="{{ url('admin/admins/create') }}" class="btn btn-primary btn-sm float-end">Add Admin</a>

                    </h3>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Admin Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->name }}</td>
                                        <td>
                                            {{ $admin->email }}
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.admins.delete',$admin->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-danger">Delete</button>
                                            </form>

                                            </br>
                                            <a class="btn btn-xs btn-success" href="{{ route('admin.admins.edit', $admin->id) }}">
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
