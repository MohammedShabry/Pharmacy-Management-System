@extends('adminsidebar')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<style>
    /* Custom CSS for Add Drugs Form */
    .form-container {
        margin-top: 20px;
    }

    .form-container .card {
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container .card-body {
        padding: 30px;
    }

    .form-container .form-label {
        font-weight: bold;
        color: #333;
    }

    .form-container .form-control {
        border-radius: 10px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease;
    }

    .form-container .form-control:focus {
        outline: none;
        border-color: #007bff;
    }

    .form-container .btn-primary {
        border-radius: 10px;
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .form-container .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .form-container .alert {
        border-radius: 10px;
    }
</style>

<div class="container">
    <div class="form-container">
        <h4 class="text-center m-3">Add New Drug</h4>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ url('addDrugs') }}" enctype="multipart/form-data">
                    @csrf

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="drug" class="form-label @error('drug') is-invalid @enderror">Drug Name</label>
                        <input type="text" name="drug" class="form-control" id="drug" placeholder="Enter Drug Name">
                        @error('drug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="unit_price" class="form-label @error('unit_price') is-invalid @enderror">Price</label>
                        <input type="text" name="unit_price" class="form-control" id="unit_price" placeholder="RS.">
                        @error('unit_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
