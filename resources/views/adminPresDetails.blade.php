@extends('adminsidebar')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<style>
    .status-accept {
        background-color: #28a745; /* Green color for accept status */
        color: #fff;
        font-size: 14px; 
    }

    .status-reject {
        background-color: #dc3545; /* Red color for reject status */
        color: #fff;
        font-size: 14px; 
    }

    .status-pending {
        background-color: #ffc107; /* Yellow color for pending status */
        color: #212529;
        font-size: 14px; 
    }
</style>

<div class="container">
    <div class="table-container">
        <h4 class="text-center m-3">Prescription Records</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Delivery Address</th>
                        <th>Delivery Time Slot</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($allPresDetails as $data)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->delivery_address }}</td>
                        <td>{{ $data->delivery_time_slot }}</td>
                        <td>
                            @if($data->quoatation_status =='accept')
                            <span class="badge badge-pill status-accept">{{ $data->quoatation_status }}</span>
                            @elseif($data->quoatation_status =='reject')
                            <span class="badge badge-pill status-reject">{{ $data->quoatation_status }}</span>
                            @else
                            <span class="badge badge-pill status-pending">{{ $data->quoatation_status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/adminquatationForm', $data->id )}}" class="btn btn-primary" role="button">Generate Quotation</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
