@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Product</h4>
                        <form action="{{ route('productAdd.store') }}" method="POST">
                            @csrf

                            <input type="text" class="form-control" id="status_trx" name="status_trx" value="0" required hidden>

                            <div class="mb-3">
                                <label for="SLoc" class="form-label">SLoc</label>
                                <input type="text" class="form-control" id="SLoc" name="SLoc" required>
                            </div>
                            <div class="mb-3">
                                <label for="MaterialNo" class="form-label">Material No</label>
                                <input type="text" class="form-control" id="MaterialNo" name="MaterialNo" required>
                            </div>
                            <div class="mb-3">
                                <label for="MaterialDesscription" class="form-label">Material Description</label>
                                <input type="text" class="form-control" id="MaterialDesscription" name="MaterialDesscription" required>
                            </div>
                            <div class="mb-3">
                                <label for="Qty" class="form-label">Qty</label>
                                <input type="text" class="form-control" id="Qty" name="Qty" required>
                            </div>
                            <div class="mb-3">
                                <label for="Uom" class="form-label">UOM</label>
                                <input type="text" class="form-control" id="Uom" name="Uom" required>
                            </div>
                            <div class="mb-3">
                                <label for="SystemBatch" class="form-label">System Batch</label>
                                <input type="text" class="form-control" id="SystemBatch" name="SystemBatch">
                            </div>
                            <div class="mb-3">
                                <label for="VendorBatch" class="form-label">Vendor Batch</label>
                                <input type="text" class="form-control" id="VendorBatch" name="VendorBatch">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
