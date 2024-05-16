@extends('sidebar')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
    /* Custom CSS for My Profile Page */
    .card {
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        border-radius: 15px 15px 0 0;
    }

    .card-body {
        padding: 30px;
    }

    .card-body h6 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .card-body span {
        color: #007bff;
        font-weight: bold;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>
                @foreach ($profile as $key =>  $data)
                <div class="card-body">
                    <h6>Name: <span>{{ $data['name'] }} </span></h6>
                    <h6>Email: <span>{{ $data['email'] }}</span></h6>
                    <h6>Contact No: <span>{{ $data['contactNo'] }}</span></h6>
                    <h6>Address: <span>{{ $data['address'] }}</span></h6>
                    <h6>Date of Birth: <span>{{ $data['dob'] }}</span></h6>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
