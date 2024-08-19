@extends('layout.includes')
@section('contents')
    
<!-- DataTables -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">{{ $title }}</h4> 
                <div>                    
                    @error('error')
                        <div class="alert alert-success text-primary font-18 text-center">{{ $message }}</div>
                    @enderror
                </div>
                <form action="{{ route('update.property') }}" method="POST">
                    @csrf
                    <div>                    
                        @error('update_property')
                            <div class="alert alert-success text-primary font-18 text-center">{{ $message }}</div>
                        @enderror  
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title mt-0 text-success" id="myLargeModalLabel">Property Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Proposed Price</label>                                       
                            <input type="text" name="edit_pro_price" value="{{ $data->pro_price }}" {{ $data->pro_price_status=='proposed'? '':'disabled' }} class="form-control"/>
                            <input type="hidden" name="pro_id" value="{{ $data->pro_id }}" class="form-control"/>
                            @error('edit_pro_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> 

                        <div class="form-group">
                            <label>Property Furniture</label>                                       
                            <input type="text" name="edit_pro_furniture" value="{{ $data->pro_furniture }}" class="form-control"/>
                            @error('edit_pro_furniture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> 

                        <div class="form-group">
                            <label>Property Building Date</label>                                       
                            <input type="date" name="edit_pro_date" value="{{ $data->pro_building_date }}" class="form-control"/>
                            @error('edit_pro_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Property Details</label>                                       
                            <textarea name="edit_pro_details"  class="form-control" rows="5">{{ $data->pro_details }}</textarea>
                            @error('edit_pro_details')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> 

                        <div class="form-group text-center">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Update Information
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

@endsection