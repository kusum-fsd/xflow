@extends('layouts.admin.app')

@section('content')
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
        <div class="col-lg-8 ">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Country </h3>
                        <div class="text-right">
                            <a href="{{ route('admin.branches.index') }}" class="btn btn-danger btn-sm">View Country</a>
                        </div>
                    </div>

                    <form action="{{ route('admin.branches.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Branch Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Enter Branch Name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">Country</label>
                                        <select name="country_id" id="country_id" class="form-control" required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('country_id', isset($branch) && $branch->country_id == $country->id ? 'selected' : '') }}>
                                                    {{ $country->title }}
                                                </option>
                                            @endforeach
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
    </div>
@endsection
