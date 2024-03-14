@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">History Trx Batch : {{ $batch }} </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active"> Batch : {{ $batch }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">

                                        <h3>
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo"
                                                height="24" /> Easy Shopping Mall
                                        </h3>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <address>
                                                <strong>Easy Shopping Mall:</strong><br>
                                                Purana Palton Dhaka<br>
                                                support@easylearningbd.com
                                            </address>
                                        </div>
                                        <div class="col-6 mt-4 text-end">
                                            <address>

                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}



                            {{-- <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Daily Invoice Report
                                                    <span class="btn btn-info"> {{ date('d-m-Y', strtotime($start_date)) }}
                                                    </span> -
                                                    <span class="btn btn-success"> {{ date('d-m-Y', strtotime($end_date)) }}
                                                    </span>
                                                </strong></h3>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- end row --> --}}





                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">

                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>No</strong></td>
                                                            <td class="text-center"><strong>Date</strong></td>
                                                            <td class="text-center"><strong>SOC</strong></td>
                                                            <td class="text-center"><strong>Customer Name </strong></td>
                                                            <td class="text-center"><strong>Status Trx </strong></td>
                                                            <td class="text-center"><strong>QTY </strong></td>
                                                            


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                        {{-- @php
                                                            $total_sum = '0';
                                                        @endphp --}}
                                                        @foreach ($allData as $key => $item)
                                                        {{-- {{dd($item['customer']['name'])}} --}}
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td class="text-center">
                                                                    {{ $item->date}}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $item->purchase_no}}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $item['customer']['name'] ?? '-' }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($item->status_trx == 0)
                                                                        <span class="text-success">In</span>
                                                                    @elseif ($item->status_trx == 1)
                                                                        <span class="text-danger">Out</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($item->status_trx == 0)
                                                                        <span class="text-success">{{ $item->qty_in }}</span>
                                                                    @else
                                                                        <span class="text-danger">{{ $item->qty_out }}</span>
                                                                    @endif
                                                                </td>
                                                                
                                                                
                                                                

                                                                
                                                               


                                                            </tr>
                                                            {{-- @php
                                                                $total_sum += ;
                                                            @endphp --}}
                                                        @endforeach



                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            {{-- <td class="no-line text-center">
                                                                <strong>Grand Amount</strong>
                                                            </td> --}}
                                                            <td class="text-center">VendorBatch : {{ $batch }}
                                                            </td>
                                                           
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                    <a href="#"
                                                        class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->






                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
