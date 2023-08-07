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
                                        <input class="form-control  @error('mobile') is-invalid @enderror" min="10"
                                            maxlength="10" size="10" type="text" id="mobile" name="mobile"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                            placeholder="Enter Employee Mobile No." required=""
                                            value="{{ old('mobile') }}">
                                        @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label> Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter Employee Email Id"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="branch_id">Branch</label>
                                        <select name="branch" id="country_id" class="form-control" required>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">Country</label>
                                        <select name="country_id" id="country_id" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $countryId => $countryName)
                                                <option value="{{ $countryId }}">{{ $countryName }}</option>
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



<script>
    $(document).ready(function() {
        // Event listener for the branch dropdown
        var branches = @json($branches); // Assuming $branches contains the branch data from the controller
        $('#branch').on('change', function() {
            var selectedBranchId = $(this).val();
            var associatedCountryId = getCountryIdByBranchId(selectedBranchId);

            $('#country_id').val(
            associatedCountryId); // Set the associated country in the country dropdown
        });

        // Trigger change event on page load to populate the country dropdown
        $('#branch').trigger('change');

        // Function to get the associated country ID based on the selected branch ID
        function getCountryIdByBranchId(branchId) {
            for (var i = 0; i < branches.length; i++) {
                if (branches[i].id == branchId) {
                    return branches[i].country_id;
                }
            }
            return null; // Return null if the branch ID is not found (or handle it as you prefer)
        }
    });
</script>
