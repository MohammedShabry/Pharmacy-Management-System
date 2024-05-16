@extends('adminsidebar')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    
    /* Styling for the table */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .custom-table th,
    .custom-table td {
        padding: 8px;
        text-align: center;
        border: 1px solid #dee2e6;
    }

    .custom-table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .custom-table tbody tr:hover {
        background-color: #e2e2e2;
    }
</style>

<h4 class="text-center m-3">Create Quatation</h4>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <!-- Main Image -->
                <img class="d-block w-100 mb-3" src="{{ asset('images/1.jpeg') }}" alt="Main Image">

                <!-- Small Images -->
                <div class="row">
                    <div class="col-4 mb-2">
                        <img class="d-block w-100" src="{{ asset('images/2.jpeg') }}" alt="Image 1">
                    </div>
                    <div class="col-4 mb-2">
                        <img class="d-block w-100" src="{{ asset('images/3.jpeg') }}" alt="Image 2">
                    </div>
                    <div class="col-4 mb-2">
                        <img class="d-block w-100" src="{{ asset('images/4.jpeg') }}" alt="Image 3">
                    </div>
                    <!-- Add more small images here -->
                </div>
            </div>
            <div class="col-sm-6">
                <div>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Medicin Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalAmount = 0;
                            @endphp
                            @foreach ($allPresDetails as $key => $data)
                            <tr>
                                <td>{{ $data->drug  }}</td>
                                <td>{{ $data->unit_price  }}</td>
                                <td>{{ $data->quantity  }}</td>
                                <td>{{ $data->unit_price *  $data->quantity }}</td>
                            </tr>
                            @php
                            $totalAmount = $totalAmount + ($data->unit_price * $data->quantity);
                            @endphp
                            @endforeach
                        </tbody>
                       
                    </table>
                    <h4>Total Price: RS. {{ $totalAmount }}</h4>
                </div>
                <div>
                    <div class="card" style="margin-top: 50px;">
                        <div class="card-body">
                            <form method="POST" action="{{ url('adminquatationForm') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="mb-3">
                                    <label for="drug" class="form-label">Drug</label>
                                    <select class="form-select @error('drug') is-invalid @enderror" name="drug" id="drug" aria-label="Default select example">
                                        <option selected value="">Select Drug</option>
                                        @foreach ($drug as $key => $data)
                                        <option value=" {{ $data->drug_id  }}">{{ $data->drug  }}</option>
                                        @endforeach
                                    </select>
                                    @error('drug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity">
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @foreach ($img as $key => $data)
                                <div class="col-md-8 offset-md-4">
                                    @if(($data->quoatation_status =='accept' || $data->quoatation_status =='reject' || $data->quoatation_status =='send'))
                                    <button type="submit" class="btn btn-primary disabled">{{ __('Add') }}</button>
                                    @else
                                    <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                                    @endif
                                </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                    <div class="d-grid gap-2 m-5">
                        @foreach ($img as $key => $data)
                        @if($data->quoatation_status =='accept' || $data->quoatation_status =='reject' || $data->quoatation_status =='send')
                        <a href="{{ url('/sendQuatation', $id )}}" class="btn btn-info disabled" role="button">Send Quatation</a>
                        @else
                        <a href="{{ url('/sendQuatation', $id )}}" class="btn btn-info" role="button">Send Quatation</a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
