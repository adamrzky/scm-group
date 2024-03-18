@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Product All</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('product2.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                                style="float:right;"><i class="fas fa-plus-circle"> Add Product </i></a> <br> <br>

                            <h4 class="card-title">Product All Data </h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sloc</th>
                                        <th>Material No </th>
                                        <th>Material Desscription</th>
                                        <th> Qty </th>
                                        <th>Uom</th>
                                        <th>System Batch</th>
                                        <th>Vendor Batch</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>
                                    @foreach ($product as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->SLoc }} </td>
                                            <td> {{ $item->MaterialNo }} </td>
                                            <td> {{ $item->MaterialDesscription }} </td>
                                            <td @if($item->Qty == 0) style="color: red;" @endif>{{ $item->Qty }}</td>
                                            <td @if($item->Qty == 0) style="color: red;" @endif>{{ $item->Uom }}</td>
                                            <td @if($item->Qty == 0) style="color: red;" @endif>{{ $item->SystemBatch }}</td>
                                            <td @if($item->Qty == 0) style="color: red;" @endif>{{ $item->VendorBatch }}</td>
                                            <td>
                                                <a href="{{ route('product2.batch', $item->id) }}" class="btn btn-primary sm"
                                                    title="Add Batch"> <i class="fas fa-plus"></i> </a>
                                
                                                <a href="{{ route('productQty.edit', $item->id) }}" class="btn btn-warning sm"
                                                    title="PGI"> <i class="fas fa-minus"></i> </a>
                                
                                                <a href="{{ route('product2.edit', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                
                                                {{-- <a href="{{ route('product2.delete', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
                                                </a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
