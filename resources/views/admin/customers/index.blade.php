@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customer Table</h3>
                        <div class="text-right">
                            <a href="{{ route('admin.customers.create') }}" class="btn btn-warning btn-sm">Add Customer</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Added By</th>
                                    <th>Customer Type</th>
                                    <th>Actions</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($customers as $customer)
                                    <tr>
                                        {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->mobile_no }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->added_by }}</td>
                                        <td>{{ $customer->customer_type }}</td>
                                        <td>
                                            <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form method="post" class="d-inline"
                                                action="{{ route('admin.customers.destroy', $customer->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                    data-toggle="tooltip">Delete</button>
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



@section('delete_pop')
    <script>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
