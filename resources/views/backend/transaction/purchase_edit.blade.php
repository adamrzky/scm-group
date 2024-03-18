@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Trx</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Trx Data</h4>

                            <form method="post" action="{{ route('trx.update', $data->id) }}">
                                @csrf
                                {{-- @method('PUT') --}}

                                <input type="hidden" name="id" value="{{ $data->id }}">

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input class="form-control example-date-input" name="date" type="date"
                                            id="date" value="{{ $data->date }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="soc" class="form-label">SOC</label>
                                    <input type="text" class="form-control" id="soc" name="soc"
                                        value="{{ $data->purchase_no }}" required>
                                </div>
                                {{-- <div class="mb-3">
                                <label for="customer" class="form-label">Costomer Name</label>
                                <input type="text" class="form-control" id="customer" name="customer" value="{{ $data['customer']['name'] }}" required>
                            </div> --}}
                            <div class="form-group col-md-9">
                                <label for="customer_id">Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-select select2">
                                    <option value="{{ $data['customer']['id'] }}">{{ $data['customer']['name'] }}</option>
                                    @foreach ($customer as $customers)
                                        <option value="{{ $customers->id }}">{{ $customers->name }} - {{ $customers->area }} {{ $customers->idh_no }}</option>
                                    @endforeach
                                    {{-- <option value="0">Lain Lain</option> --}}
                                </select>
                            </div>
                            
                            

                                <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
    
@endsection
