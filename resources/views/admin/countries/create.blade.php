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
                        <h3 class="card-title">Country </h3>
                        <div class="text-right">
                            <a href="{{ route('admin.countries.index') }}" class="btn btn-danger btn-sm">View Country</a>
                        </div>

                    </div>

                    <form action="{{ route('admin.countries.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text"
                                            class="form-control @error('title')
                                    is-invalid
              @enderror"
                                            name="title" placeholder="Enter Title" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

                </form>


            </div>
        </div>
    </div>
@endsection
