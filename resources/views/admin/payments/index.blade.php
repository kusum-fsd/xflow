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
            <div class=" text-center col-lg-10">
                @if ($message = Session::get('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{ $message }}</strong>
                    </div>

                    <script>
                        setTimeout(function() {
                            $('#success-alert').fadeOut('slow');
                        }, 4000); // 4 seconds in milliseconds
                    </script>
                @endif
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment History Table</h3>

                    </div>
                    <!-- /.card-header -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <a href="{{ route('admin.payments.show', '1') }}" id="show-deposit-button"
                                                    class="btn btn-outline-success">Deposit</a>
                                                <a href="{{ route('admin.payments.show', '2') }}" id="show-withdraw-button"
                                                    class="btn btn-outline-danger">Withdraw</a>
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example2" class=" table table-bordered table-hover">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th>S. NO.</th>
                                                        <th>Customer Name</th>
                                                        <th>MTN No</th>
                                                        <th>USD Amt</th>
                                                        <th>INR Amt</th>
                                                        <th>User Name</th>
                                                        <th>Remark</th>
                                                        <th>Payment Type</th>
                                                        {{-- <th>Status</th> --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($payments as $payment)
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $payment->customer->name }}</td>
                                                        <td>{{ $payment->mtn_no }}</td>
                                                        <td class="{{ $payment->status == 1 ? 'green-text' : 'red-text' }}">
                                                            {{ $payment->USD_amt }}</td>
                                                        <td class="{{ $payment->status == 2 ? 'red-text' : 'green-text' }}">
                                                            {{ $payment->INR_amt }}</td>
                                                        <td>{{ $payment->user->name }}</td>
                                                        <td>{{ $payment->remark }}</td>
                                                        <td>{{ $depositTypeLabels[$payment->deposit_type] }}</td>
                                                       
                                                        <td>
                                                            <a href="{{ route('admin.payments.edit', $payment->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                            <form method="post" class="d-inline"
                                                                action="{{ route('admin.payments.destroy', $payment->id) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm show_confirm"
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
