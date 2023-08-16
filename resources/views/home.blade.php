@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        {{-- <h5 class="mb-2 ">Info Box</h5> --}}
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="nav-icon fas fa-globe"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Country</span>
                            <span class="info-box-number">{{ $country }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"> <i class="nav-icon fas fa-code-branch"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Branch</span>
                            <span class="info-box-number">{{ $branch }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User</span>
                            <span class="info-box-number">{{ $user }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Customer</span>
                            <span class="info-box-number">{{$customer}}</span>
                        </div>

                    </div>

                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="{{ route('admin.payments.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary">
                            <i class='fas fa-dollar-sign'></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Payments</span>
                            <span class="info-box-number">{{$payment}}</span>
                        </div>

                    </div>
                    </a>

                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->







    </div><!-- /.container-fluid -->
@endsection
