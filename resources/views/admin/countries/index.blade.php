@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Country</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Country</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Country Table</h3>
                        <div class="text-right">
                            <a href="{{ route('admin.countries.create') }}" class="btn btn-warning btn-sm">Add Country</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S No:</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $countries)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $countries->title }}</td>

                                        <td>
                                            <a href="{{ route('admin.countries.edit', $countries->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form method="post" class="d-inline"
                                                action="{{ route('admin.countries.destroy', $countries->id) }}">
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
