@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employee</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Employee Table</h3>
                        <div class="text-right">
                            <a href="{{ route('admin.employees.create') }}" class="btn btn-warning btn-sm">Add Employee</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S No:</th>
                                    <th> Name</th>
                                    <th> Mobile No</th>
                                    <th> Email ID</th>
                                    <th> Branch ID</th>
                                    <th>Country ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branches)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $employees->name }}</td>
                                        <td>{{ $employees->mobile }}</td>
                                        <td>{{ $employees->email }}</td>
                                        <td>{{ $employees->mobile }}</td>
                                        <td>
                                            <a href="{{ route('admin.employees.edit', $employees->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form method="post" class="d-inline"
                                                action="{{ route('admin.employees.destroy', $employees->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </div>
@endsection
