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
                            <span class="info-box-number">3</span>
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
                            <span class="info-box-number">3</span>
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
                            <span class="info-box-number">2</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                {{-- <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">93,139</span>
                    </div>
                    
                </div>
               
            </div> --}}
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->







    </div><!-- /.container-fluid -->
@endsection
