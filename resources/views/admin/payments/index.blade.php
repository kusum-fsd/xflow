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
                            <li class="breadcrumb-item active">Payment</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Table</h3>
                        <div class="text-right">
                            <a href="{{ route('admin.payments.create') }}" class="btn btn-warning btn-sm"> Make Payment</a>
                            {{-- <a href="#" class="btn btn-warning btn-sm"> Withdraw Payment</a> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </div>
@endsection
