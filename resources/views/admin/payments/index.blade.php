@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Payment</h1>
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
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <button id="show-deposit-button" class="btn btn-outline-info"
                                                    onclick="showForm('deposit')">Deposit</button>
                                                <button id="show-withdraw-button" class="btn btn-outline-primary"
                                                    onclick="showForm('withdraw')">Withdraw</button>
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example2" class=" table table-bordered table-hover">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>S. NO.</th>
                                                        <th>Customer ID</th>
                                                        <th>MTN No</th>
                                                        <th>USD Amt</th>
                                                        <th>INR Amt</th>
                                                        <th>User ID</th>
                                                        <th>Remark</th>
                                                        <th>DEP Type</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>

                    <!-- /.card-body -->
                </div>
            </div>
        </div>


    </div>
@endsection
