@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Reverse </h4><br><br>

                            <div class="row">



                                <form method="post" action="{{ route('trx.reverseStore') }}">
                                    @csrf





                                    <div class="col-md-4">
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">Target Batch </label>
                                            
                                            <input  type="text" name="trx" id="trx" value="{{$trx}}" hidden>
                                            {{-- <input  type="text" name="product" id="product" hidden> --}}

                                            
                                            <select name="target" id="target" class="form-select select2"
                                                aria-label="Default select example">
                                                <option selected="">Open this select menu</option>
                                                @foreach ($vendor as $vend)
                                                    <option value="{{ $vend->id }}">{{ $vend->SLoc }} -
                                                        {{ $vend->MaterialDesscription }} - {{ $vend->VendorBatch }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info" id="storeButton">
                                                    Submit</button>

                                            </div>
                                            {{-- <a class="btn btn-info sm"
                                            title="Delete Data" id="delete">  Submit</i>
                                        </a> --}}
                                        </div>
                                    </div>



                                </form>




                            </div> <!-- // end row  -->

                        </div> <!-- End card-body -->
                        <!--  ---------------------------------- -->








                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>
@endsection
