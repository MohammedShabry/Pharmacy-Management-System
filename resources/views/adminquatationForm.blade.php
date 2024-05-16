@extends('adminsidebar')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>






<h4 class="text-center m-3">Create Quatation</h4>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                @if ($message = Session::get('success'))

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="">
                    <ol class="carousel-indicators">
                        @if(!empty($image['img1']))
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        @endif
                        @if(!empty($image['img2']))
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        @endif
                        @if(!empty($image['img3']))
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        @endif
                        @if(!empty($image['img4']))
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        @endif
                        @if(!empty($image['img5']))
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        @endif
                    </ol>
                    <div class="carousel-inner">
                        @if(!empty($image['img1']))
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ url($image['img1']) }}" alt="First slide">
                        </div>
                        @endif
                        @if(!empty($image['img2']))
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url($image['img2']) }}" alt="Second slide">
                        </div>
                        @endif
                        @if(!empty($image['img3']))
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url($image['img3']) }}" alt="Third slide">
                        </div>
                        @endif
                        @if(!empty($image['img4']))
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url($image['img4']) }}" alt="Second slide">
                        </div>
                        @endif
                        @if(!empty($image['img5']))
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url($image['img5']) }}" alt="Second slide">
                        </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                        <i class="fa fa-chevron-circle-left" aria-hidden="true" style="color:red"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="fa fa-chevron-circle-right" aria-hidden="true" style="color:red"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div>
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
                        <tfoot>
                            <tr>

                                <th>Drug Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Office</th>

                            </tr>
                        </tfoot>

                    </table>

                    <h4>Total Price: RS. {{ $totalAmount }}</h4>
                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable();
                        });
                    </script>
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

                                    <button type="submit" class="btn btn-primary disabled">
                                        {{ __('Add') }}
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>

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