@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">History Outbound Delivery</h4>



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

                            <h4 class="card-title">History Outbound Delivery </h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date </th>
                                        <th>SOC</th>
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Vendor Batch</th>
                                        <th>Qty</th>
                                        <th>Created By</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                        {{-- <th>Supplier</th> --}}

                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        {{-- {{dd($item['product2'])}} --}}
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ date('d-m-Y', strtotime($item->date)) }} </td>
                                            <td> {{ $item->purchase_no }} </td>
                                            <td> {{ $item['customer']['name'] }} </td>
                                            <td> {{ $item['product2']['MaterialDesscription'] }} </td>
                                            <td> {{ $item['product2']['VendorBatch'] }} </td>
                                            <td> {{ $item->buying_qty }} </td>
                                            <td> {{ $item['user']['name'] }} </td>
                                            {{-- <td> {{ $item['category']['name'] }} </td> --}}
                                            {{-- <td> {{ $item['product']['name'] }} </td> --}}


                                            {{-- <td>
                                                <a href="{{ route('trx.detail', $item['product2']['SystemBatch']) }}" class="btn btn-info sm"
                                                title="Detail Trx"> <i class="fas fa-eyes"></i> Detail Trx </a>
                                            </td> --}}
                                            <td>
                                                <a href="{{ route('trx.detail', $item['product2']['VendorBatch']) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i> </a>

                                            </td>
                                            {{-- <td>
                                                @if ($item->status == '0')
                                                    <span class="btn btn-warning">Pending</span>
                                                @elseif($item->status == '1')
                                                    <span class="btn btn-success">Approved</span>
                                                @endif
                                            </td> --}}

                                            {{-- <td>
                                                @if ($item->status == '0')
                                                    <a href="{{ route('purchase.delete', $item->id) }}"
                                                        class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                            class="fas fa-trash-alt"></i> </a>
                                                @endif
                                            </td> --}}

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
