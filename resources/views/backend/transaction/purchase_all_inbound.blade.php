@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">History Inbound Delivery</h4>



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

                            <h4 class="card-title">History Inbound Delivery </h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date </th>
                                        <th>SLOC</th>
                                        {{-- <th>Customer Name</th> --}}
                                        <th>Product Name</th>
                                        <th>Batch</th>
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
                                            <td> {{ $item['product2']['SLoc']}} </td>
                                            {{-- <td> {{ $item['customer']['name'] }} </td> --}}
                                            <td> {{ $item['product2']['MaterialDesscription'] }} </td>
                                            {{-- <td> {{ $item['product2']['SystemBatch'] }} </td> --}}
                                            <td class="clickable-cell" data-system-batch="{{ $item['product2']['SystemBatch'] }}">
                                                <div class="btn btn-info sm" title="Detail Trx"> <i class="fas fa-eyes"></i> {{ $item['product2']['SystemBatch'] }} </div>
                                            </td>
                                            
                                            
                                            
                                            
                                            <td> {{ $item->qty_in }} </td>
                                            <td> {{ $item['user']['name'] }} </td>
                                            {{-- <td> {{ $item['category']['name'] }} </td> --}}
                                            {{-- <td> {{ $item['product']['name'] }} </td> --}}

                                            <td>
                                            <a href="{{ route('trx.detail', $item['product2']['VendorBatch']) }}" class="btn btn-info sm"
                                                title="Detail Trx"> <i class="fas fa-eyes"></i> Detail Trx </a>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let clickableCells = document.querySelectorAll('.clickable-cell');
            clickableCells.forEach(cell => {
                cell.addEventListener('click', function() {
                    let systemBatch = this.getAttribute('data-system-batch');
                    // Redirect to trx.detail route with the systemBatch as parameter
                    window.location.href = "{{ url('trx/detail') }}/" + systemBatch;
                });
            });
        });
    </script>
@endsection

