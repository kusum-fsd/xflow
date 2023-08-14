@extends('layouts.admin.app')
@section('content')
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">

                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="col-lg-10">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header mb-4">
                        <h3 class="card-title">Payment </h3>
                        <div class="text-right">
                            <a href="{{ route('admin.payments.index') }}" class="btn btn-danger btn-sm">View Payments</a>


                        </div>

                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-sm-12">
                            <div class="card card-primary card-outline card-tabs">


                                <form action="{{ route('admin.payments.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="card-body" id="myDiv">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">

                                                    <label for="customer_id">Customer ID</label>
                                                    <select name="customer_id" id="customer_id" class="form-control"
                                                        required>
                                                        <option value="">Select Customer ID</option>
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}"
                                                                {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                                {{ $customer->name }}
                                                                <!-- Change this to the appropriate property for displaying the customer ID -->
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>MT4 Number:</label>
                                                    <input type="text"
                                                        class="form-control @error('mtn_no')is-invalid  @enderror"
                                                        name="mtn_no" placeholder="Enter Title"
                                                        value="{{ old('mtn_no') }}">
                                                    @error('mtn_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>USD Amount:</label>
                                                    <input type="text"
                                                        class="form-control @error('USD_amt')is-invalid @enderror"
                                                        name="USD_amt" placeholder="Enter Title"
                                                        value="{{ old('USD_amt') }}">
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
                                                        name="INR_amt" placeholder="Enter Title"
                                                        value="{{ old('INR_amt') }}">
                                                    @error('INR_amt')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Deposit Type:</label>
                                                    <select name="deposit_type" class="form-control" required>
                                                        <option value="CASH">Cash</option>
                                                        <option value="CHECK">Check</option>
                                                        <option value="BANK">Bank</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Remark:</label>
                                                    <textarea type="text" class="form-control @error('remark')is-invalid @enderror" name="remark"
                                                        placeholder="Enter Remark" value="{{ old('remark') }}"></textarea>
                                                    @error('remark')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <input type="hid den" name="pay_type" id="pay_type" value="{{ $id }}">
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

<style>
    .green {
        background-color: green;
        border-bottom: 2px solid green;
    }

    .red {
        background-color: red;
        border-bottom: 2px solid red;
    }

    #myDiv input[value="1"],
    #myDiv select[value="1"],
    #myDiv textarea[value="1"] {
        border-bottom: 2px solid blue
    }
</style>



<script>
    const element = document.getElementById('myDiv');

    // Check if the ID is 1
    if (element.id === '1') {
        element.classList.add('green'); // Add the 'green' class
        element.classList.remove('red'); // Remove the 'red' class
    } else if (element.id === '2') {
        element.classList.remove('green'); // Remove the 'green' class
        element.classList.add('red'); // Add the 'red' class
    }
</script>
