@extends('layouts.admin.app')

@section('content')
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="card-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Customer #{{ $customers->id }}</h3>
                    <div class="text-right">
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-danger btn-sm">View Customer</a>
                    </div>
                </div>

                <form action="{{ route('admin.customers.update', $customers->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Enter  Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control  @error('mobile_no') is-invalid @enderror" min="10"
                                        maxlength="10" size="10" type="text" id="mobile_no" name="mobile_no"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                        placeholder="Enter Mobile No." value="{{ old('mobile_no') }}">
                                    @error('mobile_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        name="email" placeholder="Enter email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>Added By</label>
                                    <input class="form-control @error('added_by') is-invalid @enderror" type="text"
                                        name="added_by" placeholder="Added by" value="{{ old('added_by') }}">
                                    @error('added_by')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>Customer Type</label>
                                    <select name="customer_type" class="form-control">
                                        <option value="single">Single</option>
                                        <option value="pair">Pair</option>
                                        <option value="multi">Multi</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
