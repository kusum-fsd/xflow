@extends('layouts.admin.app')
@section('content')
    <style>
        @if ($id == 1)
            .card-primary {
                background-color: green;
                border-bottom: 2px solid green;
            }
        @else
            .card-primary {
                background-color: red;
                border-bottom: 2px solid red;
            }
        @endif

        #myDiv input[value="1"],
        #myDiv select[value="1"],
        #myDiv textarea[value="1"] {
            border-bottom: 2px solid blue
        }

        .pay-title {
            color: #fff;
            font-size: large !important;
        }

        .pay-btn {
            background: #fff;
            color: #000;
        }
    </style>



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Payment</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row justify-content-center d-flex">


        <div class="col-lg-10">
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

        <div class="col-lg-10">
            <div class="card-body">
                <div class="card ">
                    <div class="card-header mb-4 card-primary">
                        <h3 class="card-title pay-title">
                            @if ($id == 1)
                                Deposit
                            @elseif ($id == 2)
                                Withdraw
                            @endif
                            Payment
                        </h3>
                        <div class="text-right">
                            <a href="{{ route('admin.payments.index') }}" class="btn  btn-sm pay-btn">BACK</a>

                        </div>

                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-sm-12">
                            <div class="card card-outline card-tabs">


                                <form action="{{ route('admin.payments.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_id">Customer ID</label>
                                                    <select name="customer_id" id="customer_id"
                                                        class="form-control @error('customer_id')is-invalid  @enderror">
                                                        <option value="">Select Customer ID</option>
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}"
                                                                {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                                {{ $customer->name }}
                                                                <!-- Change this to the appropriate property for displaying the customer ID -->
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('customer_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>MT4 Number:</label>
                                                    <input type="text"
                                                        class="form-control @error('mtn_no')is-invalid  @enderror"
                                                        name="mtn_no" placeholder="Enter MT4 Number"
                                                        value="{{ old('mtn_no') }}">
                                                    @error('mtn_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>USD Amount:</label>
                                                    <input type="number"
                                                        class="form-control @error('USD_amt')is-invalid @enderror"
                                                        name="USD_amt" placeholder="Enter USD Amount"
                                                        value="{{ old('USD_amt') }}" step="0.01">
                                                    @error('USD_amt')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>INR Amount:</label>
                                                    <input type="number"
                                                        class="form-control @error('INR_amt')is-invalid @enderror"
                                                        name="INR_amt" placeholder="Enter INR Amount"
                                                        value="{{ old('INR_amt') }}">
                                                    @error('INR_amt')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Deposit Type:</label>
                                                    <select name="deposit_type"
                                                        class="form-control @error('deposit_type')is-invalid  @enderror">
                                                        <option value="1">Cash</option>
                                                        <option value="2">Check</option>
                                                        <option value="3">Bank</option>
                                                    </select>
                                                    @error('deposit_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Remark:</label>
                                                    <textarea type="text" class="form-control @error('remark')is-invalid @enderror" name="remark"
                                                        placeholder="Enter Remark" value="{{ old('remark') }}"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <input type="hidden" name="status" id="status" value="{{ $id }}">
                                        <input type="hidden" name="transaction_no" value="{{ rand() . time() }}">
                                    </div>

                                </form>


                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>


            </div>

            </form>


        </div>
    </div>
    </div>
@endsection
