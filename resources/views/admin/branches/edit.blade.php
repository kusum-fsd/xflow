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
                    <h3 class="card-title">Edit Branch #{{ $branches->id }}</h3>
                    <div class="text-right">
                        <a href="{{ route('admin.branches.index') }}" class="btn btn-danger btn-sm">View Branch</a>
                    </div>
                </div>

                <form action="{{ route('admin.branches.update', $branches->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Branch Name" value="{{ old('name', $branches->name) }}">
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
                                            <option value="{{ $country->id }}" {{ old('country_id', $branches->country_id) == $country->id ? 'selected' : '' }}>
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
@endsection
