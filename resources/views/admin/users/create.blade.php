@extends('layouts.admin.app')

@section('content')
    <!-- Add this to the <head> section of your HTML layout -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="row justify-content-center d-flex">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="col-lg-10 ">
            <div class="card-body">
                <div class="card card-primary">


                    <div class="card-header">
                        <h3 class="card-title">User</h3>
                        <div class="text-right">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-danger btn-sm">View Users</a>
                        </div>
                    </div>

                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label> Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Enter Employee Name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label> Mobile No</label>
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
                                        <label> Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter Email Id" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label> Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="" value="{{ old('password') }}"
                                            autocomplete="Any">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password"
                                            class="form-control @error('confirm_password') is-invalid @enderror"
                                            name="confirm_password" placeholder="" value="{{ old('confirm_password') }}">
                                        @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">Country</label>
                                        <select name="country_id" id="country_id" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $key => $country)
                                                <option value="{{ $country->id }}">{{ $country->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="branch_id">Branch</label>
                                        <select name="branch_id" id="branch_id" class="form-control" required>
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    @foreach ($roles as $role)
                                        <label for="">{{ $role->name }}</label>
                                        <input type="radio" name="roles[]" value="{{ $role->id }}">
                                    @endforeach
                                    @if ($errors->has('roles'))
                                        <span class="text-danger text-left">{{ $errors->first('roles') }}</span>
                                    @endif
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
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            // When the country selection changes
            $('#country_id').on('change', function() {
                var countryId = $(this).val();
                var csrf = "{{ csrf_token() }}";
                // Make the AJAX call to retrieve branches
                $.ajax({
                    url: '{{ url('admin/get-branches') }}', // Replace with your server-side URL to fetch branches
                    method: 'POST',
                    data: {
                        country_id: countryId,
                        _token: csrf,
                    },
                    success: function(response) {
                        // Clear the current branch options
                        $('#branch_id').empty();
                        $('#branch_id').append('<option value="">Select</option>');
                        $.each(response.branches, function(key, value) {
                            $('#branch_id').append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
