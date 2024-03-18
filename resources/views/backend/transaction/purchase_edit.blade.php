@extends('admin.admin_master')
@section('admin')
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

                            <div class="mb-3">
                                <label for="soc" class="form-label">SOC</label>
                                <input type="text" class="form-control" id="soc" name="soc" value="{{ $data->purchase_no }}" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="customer" class="form-label">Costomer Name</label>
                                <input type="text" class="form-control" id="customer" name="customer" value="{{ $data['customer']['name'] }}" required>
                            </div> --}}
                            <div class="form-group col-md-9">
                                <label> Customer Name </label>
                                <select name="customer_id" id="customer_id" class="form-select select2" required>
                                    <option value="">{{ $data['customer']['name'] }} </option>
                                    @foreach ($costomer as $cust)
                                        <option value="{{ $cust->id }}">{{ $cust->name }} - {{ $cust->area }}
                                            {{ $cust->idh_no }}</option>
                                    @endforeach
                                    {{-- <option value="0"> Lain Lain </option> --}}
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
<script>
    $(document).on('change', '#customer_id', function() {
        var customer_id = $(this).val();
        if (customer_id == '0') {
            $('.new_customer').show();
        } else {
            $('.new_customer').hide();
        }
    });
</script>
@endsection
