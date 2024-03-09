@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Outbound Delivery</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Outbound Delivery</h4>

                                <form method="post" action="{{ route('productQty.update', $product->id) }}">
                                    @csrf
                                    {{-- @method('PUT') --}}

                                    <input type="hidden" name="id" value="{{ $product->id }}">

                                    <div class="col-md-4">
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">Date</label>
                                            <input class="form-control example-date-input" name="date" type="date"
                                                id="date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">SOC</label>
                                            <input class="form-control example-date-input" name="purchase_no" type="text"
                                                id="purchase_no">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="Qty" class="form-label">Qty</label>
                                            <input type="number" class="form-control" id="Qty" name="Qty"
                                                value="{{ $product->Qty }}" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="reduce_qty" class="form-label">Reduce Qty</label>
                                            <input type="number" class="form-control" id="reduce_qty" name="reduce_qty"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="reduce_qty" class="form-label">Description</label>
                                            <input type="text-area" class="form-control" id="description" name="description"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label> Customer Name </label>
                                        <select name="customer_id" id="customer_id" class="form-select select2" required>
                                            <option value="">Select Customer </option>
                                            @foreach ($costomer as $cust)
                                                <option value="{{ $cust->id }}">{{ $cust->name }} - {{ $cust->area }}
                                                    {{ $cust->idh_no }}</option>
                                            @endforeach
                                            <option value="0">New Customer </option>
                                        </select>
                                    </div>
                                    

                                      <!-- Hide Add Customer Form -->
                                      <div class="row new_customer" style="display:none">
                                        <div class="form-group col-md-4">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Write Customer Name">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <input type="text" name="mobile_no" id="mobile_no" class="form-control"
                                                placeholder="Write Customer Mobile No">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Write Customer Email">
                                        </div>
                                    </div>
                                    <br>
                                    <!-- End Hide Add Customer Form -->

                                    <div class="mb-3">
                                        <label for="SLoc" class="form-label">SLoc</label>
                                        <input type="text" class="form-control" id="SLoc" name="SLoc"
                                            value="{{ $product->SLoc }}" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="MaterialNo" class="form-label">Material No</label>
                                        <input type="text" class="form-control" id="MaterialNo" name="MaterialNo"
                                            value="{{ $product->MaterialNo }}" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="MaterialDesscription" class="form-label">Material Description</label>
                                        <input type="text" class="form-control" id="MaterialDesscription"
                                            name="MaterialDesscription" value="{{ $product->MaterialDesscription }}"
                                            required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Uom" class="form-label " hidden>UOM</label>
                                        <input type="text" class="form-control" id="Uom" name="Uom"
                                            value="{{ $product->Uom }}" required readonly hidden>
                                    </div>
                                    <div class="mb-3">
                                        <label for="SystemBatch" class="form-label">System Batch </label>
                                        <input type="text" class="form-control" id="SystemBatch" name="SystemBatch"
                                            value="{{ $product->SystemBatch }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="VendorBatch" class="form-label">Vendor Batch</label>
                                        <input type="text" class="form-control" id="VendorBatch" name="VendorBatch"
                                            value="{{ $product->VendorBatch }}" readonly>
                                    </div>

                                  

                                    <br>

                                  

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info" id="storeButton"> Submit</button>

                                    </div>
                                    {{-- <button type="submit" class="btn btn-info waves-effect waves-light">Update Product</button> --}}
                                </form>

                            </div>

                        </div>
                    </div> <!-- end col -->
                </div>

            </div> <!-- container-fluid -->
        </div>
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
