@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Batch Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Batch Data</h4>

                        <form method="post" action="{{ route('productBatch.store', $product->id) }}">
                            @csrf
                            {{-- @method('PUT') --}}

                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="mb-3">
                                <label for="SLoc" class="form-label">SLoc</label>
                                <input type="text" class="form-control" id="SLoc" name="SLoc" value="{{ $product->SLoc }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="MaterialNo" class="form-label">Material No</label>
                                <input type="text" class="form-control" id="MaterialNo" name="MaterialNo" value="{{ $product->MaterialNo }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="MaterialDesscription" class="form-label">Material Description</label>
                                <input type="text" class="form-control" id="MaterialDesscription" name="MaterialDesscription" value="{{ $product->MaterialDesscription }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="Qty" class="form-label">Qty</label>
                                <input type="text" class="form-control" id="Qty" name="Qty" value="{{ $product->Qty }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="Uom" class="form-label">UOM</label>
                                <input type="text" class="form-control" id="Uom" name="Uom" value="{{ $product->Uom }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="SystemBatch" class="form-label">System Batch</label>
                                <input type="text" class="form-control" id="SystemBatch" name="SystemBatch" value="{{ $product->SystemBatch }}">
                            </div>
                            <div class="mb-3">
                                <label for="VendorBatch" class="form-label">Vendor Batch</label>
                                <input type="text" class="form-control" id="VendorBatch" name="VendorBatch" value="{{ $product->VendorBatch }}">
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light">Update Product</button>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
