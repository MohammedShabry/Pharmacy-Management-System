@extends('sidebar')

@section('content')

<style>
    .text-center {
        text-align: center;
    }
    .m-3 {
        margin: 1rem;
    }
    .gap-2 {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
        margin-top: 1rem;
    }
    .btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        text-decoration: none;
        color: white;
        cursor: pointer;
    }
    .btn-success {
        background-color: #28a745;
    }
    .btn-info {
        background-color: #17a2b8;
    }
    .btn-danger {
        background-color: #dc3545;
    }
    .btn.disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        background-color: #e9f7ff; /* Light blue background for table */
    }
    table, th, td {
        border: 1px solid #dee2e6;
    }
    th, td {
        padding: 0.75rem;
        text-align: left;
    }
    th {
        background-color: #d1ecf1; /* Light blue for table header */
    }
    .total-price {
        font-weight: bold;
        text-align: right;
        margin-top: 1rem;
    }
</style>

<h4 class="text-center m-3">Quotation Details</h4>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Drug Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @php
        $totalAmount = 0;
        @endphp
        @foreach ($viewpresData as $key => $data)
        <tr>
            <td>{{ $data->drug }}</td>
            <td>{{ $data->unit_price }}</td>
            <td>{{ $data->quantity }}</td>
            <td>{{ $data->unit_price *  $data->quantity }}</td>
        </tr>
        @php
        $totalAmount = $totalAmount + ($data->unit_price * $data->quantity);
        @endphp
        @endforeach
    </tbody>
</table>

<h4 class="total-price">Total Price: RS. {{ $totalAmount }}</h4>
<div class="gap-2">
    @if($data->quoatation_status =='accept')
    <a href="{{ url('/acceptQuatation',$id)}}" class="btn btn-success disabled" role="button">Accepted</a>
    @endif
    @if($data->quoatation_status =='send')
    <a href="{{ url('/acceptQuatation',$id)}}" class="btn btn-success" role="button">Accept</a>
    <a href="{{ url('/rejectQuatation',$id)}}" class="btn btn-danger" role="button">Reject</a>
    @endif
    @if($data->quoatation_status =='reject')
    <a href="{{ url('/rejectQuatation',$id)}}" class="btn btn-danger disabled" role="button">Rejected</a>
    @endif
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

@endsection
