@extends('sidebar')

@section('content')

<h4 class="text-center m-3">Quatation Details</h4>
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
    <tfoot>
        <tr>
            <th>Drug Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Amount</th>

        </tr>
    </tfoot>
</table>

<h4>Total Price: RS. {{ $totalAmount }}</h4>
<div class="gap-2">

    @if($data->quoatation_status =='accept')

    <a href="{{ url('/acceptQuatation',$id)}}" class="btn btn-success disabled" role="button">Accepted</a>

    @endif

    @if($data->quoatation_status =='send')

    <a href="{{ url('/acceptQuatation',$id)}}" class="btn btn-info" role="button">Accept</a>
    <a href="{{ url('/rejectQuatation',$id)}}" class="btn btn-info" role="button">Reject</a>
    @endif

    @if($data->quoatation_status =='reject')
    <a href="{{ url('/rejectQuatation',$id)}}" class="btn btn-danger" role="button">Rejected</a>
    @endif


    
    
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

@endsection