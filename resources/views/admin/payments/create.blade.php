@extends('layouts.admin.app')
@section('content')
    <div class="row justify-content-center d-flex">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">

                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="col-lg-8">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Payment </h3>
                        <div class="text-right">
                            <a href="{{ route('admin.payments.index') }}" class="btn btn-danger btn-sm">View Payments</a>
                        </div>

                    </div>

                    <form action="{{ route('admin.payments.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Customer Type:</label>
                                        <input type="text"
                                            class="form-control @error('customer_type')
                                    is-invalid
              @enderror"
                                            name="customer_type" placeholder="Enter Customer Type"
                                            value="{{ old('customer_type') }}">
                                        @error('customer_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>MIN Number:</label>
                                        <input type="text"
                                            class="form-control @error('MIN_no')
                                    is-invalid
              @enderror"
                                            name="MIN_no" placeholder="Enter Title"
                                            value="{{ old('customMIN_noer_type') }}">
                                        @error('customer_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>USD Amount:</label>
                                        <input type="text"
                                            class="form-control @error('USD_in')
                                    is-invalid
              @enderror"
                                            name="USD_in" placeholder="Enter Title" value="{{ old('USD_in') }}">
                                        @error('USD_in')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>INR Amount:</label>
                                        <input type="number"
                                            class="form-control @error('INR_in')
                                    is-invalid
              @enderror"
                                            name="INR_in" placeholder="Enter Title" value="{{ old('INR_in') }}">
                                        @error('INR_in')
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
                                        @error('INR_in')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Remark:</label>
                                        <textarea type="text"
                                            class="form-control @error('remark')
                                    is-invalid
              @enderror"
                                            name="remark" placeholder="Enter Remark" value="{{ old('remark') }}"></textarea>
                                        @error('customer_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    @endsection
