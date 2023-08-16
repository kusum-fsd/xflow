@extends('layouts.admin.app')

@section('content')
    <div class="row d-flex justify-content-center">
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

        {{-- {{ $customer }} --}}
        <div class="col-lg-10">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Payment </h3>
                        <div class="text-right">
                            <a href="{{ route('admin.payments.index') }}" class="btn btn-danger btn-sm">View Payment</a>
                        </div>

                    </div>

                    <form action="{{ route('admin.payments.update', $payments->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('put')

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
                                                    {{ old('customer_id', $payments->customer_id) == $customer->id ? 'selected' : '' }}>
                                                    {{ $customer->name }}

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
                                        <input type="text" class="form-control @error('mtn_no')is-invalid  @enderror"
                                            name="mtn_no" placeholder="Enter MT4 Number"
                                            value="{{ old('mtn_no', $payments->mtn_no) }}">
                                        @error('mtn_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>USD Amount:</label>
                                        <input type="number" class="form-control @error('USD_amt')is-invalid @enderror"
                                            name="USD_amt" placeholder="Enter USD Amount"
                                            value="{{ old('USD_amt', $payments->USD_amt) }}" step="0.01">
                                        @error('USD_amt')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>INR Amount:</label>
                                        <input type="number" class="form-control @error('INR_amt')is-invalid @enderror"
                                            name="INR_amt" placeholder="Enter INR Amount"
                                            value="{{ old('INR_amt', $payments->INR_amt) }}">
                                        @error('INR_amt')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Deposit Type:</label>
                                        <select name="deposit_type"
                                            class="form-control @error('deposit_type')is-invalid  @enderror"
                                            value="{{ old('deposit_type', $payments->desposite_type) }}">
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
                                            placeholder="Enter Remark" value="{{ old('remark', $payments->remark) }}">{{ old('remark', $payments->remark) }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                         
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {{-- <input type="hidden" name="status" id="status" value="{{ $id }}"> --}}
                            <input type="hidden" name="transaction_no" value="{{ rand() . time() }}">
                        </div>
                    </form>
                </div>




            </div>
        </div>
    </div>
@endsection
