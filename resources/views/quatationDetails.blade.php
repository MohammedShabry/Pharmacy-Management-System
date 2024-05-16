@extends('sidebar')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
    /* Custom CSS for Quotation Details */
    .container {
        margin-top: 30px;
    }

    .table-container {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h4 {
        color: #007bff;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        border: none;
    }

    td {
        background-color: white;
        color: #333;
        border-top: 1px solid #dee2e6;
    }

    tr:nth-child(even) td {
        background-color: #f2f2f2;
    }

    .btn-custom {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #218838;
    }

    .btn-disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }

    .text-center {
        text-align: center;
    }

    /* Additional CSS for a cleaner layout */
    .table-container table th, .table-container table td {
        border-bottom: 1px solid #ddd;
    }

    .table-container table {
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px;
        overflow: hidden;
    }

    .table-container table th:first-child, .table-container table td:first-child {
        border-top-left-radius: 10px;
    }

    .table-container table th:last-child, .table-container table td:last-child {
        border-top-right-radius: 10px;
    }

</style>

<div class="container">
    <div class="table-container">
        <h4 class="text-center">Quotation Details</h4>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quatationData as $key => $data)
                <tr>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->note }}</td>
                    <td>
                        <div class="d-grid gap-2">
                            @if($data->quoatation_status == 'pending')
                            <a href="{{ url('/viewQuatation', $data->id )}}" class="btn-custom btn-disabled" role="button" disabled>Pending</a>
                            @else
                            <a href="{{ url('/viewQuatation', $data->id )}}" class="btn-custom" role="button">View Quotation</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>

@endsection
