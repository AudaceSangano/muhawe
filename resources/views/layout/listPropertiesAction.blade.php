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
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="bg-primary">
                    <tr>
                        <th>DATE REGISTERED</th>
                        <th>DATE BUILDING</th>
                        <th>OWNER</th>
                        <th>PHONE</th>
                        <th>PRICE</th>
                        <th>PRICE STATUS</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>

                    <tbody>   
                        <?php
                        $count = 0;
                        ?>
                        @foreach ($properties as $property)  
                        <tr>
                            <td>{{ $property->created_at }}</td>
                            <td>{{ $property->pro_building_date }}</td>
                            <td>{{ $property->first_name.' '.$property->last_name }}</td>
                            <td>{{ $property->user_telephone }}</td>
                            <td>{{ $property->pro_price }}</td>
                            <td>{{ $property->pro_price_status }}</td>
                            <td class="text-center">
                                @if (Auth::user()->user_role=='householder')
                                <a href="{{ route('edit.property.form',$property->pro_id) }}" class="mr-4">Edit |</a>
                                <a href="{{ route('delete.property',$property->pro_id) }}" onclick="return confirm('Are you sure to delete this?')" class="mr-4">Delete |</a>                                    
                                @endif
                                @if ($property->pro_price_status=='proposed' && Auth::user()->user_role!='householder')
                                <a href="{{ route('confirm.property.price',$property->pro_id) }}" onclick="return confirm('Are you sure to confirm?')" class="mr-4">Confirm |</a>
                                <a href="{{ route('reject.property.price',$property->pro_id) }}" onclick="return confirm('Are you sure to reject?')" class="mr-4">Reject </a>
                                @endif
                                @if ($property->pro_price_status=='appeal' && Auth::user()->user_role!='householder')
                                <a href="#" class="mr-4">View Appeal</a>
                                @endif
                                @if ($property->pro_price_status=='rejected' && Auth::user()->user_role=='householder')
                                <a href="{{ route('appeal.property.price',$property->pro_id) }}" onclick="return confirm('Are you sure to appeal?')" class="mr-4">Appeal</a>
                                @endif
                                @if ($property->pro_price_status=='confirmed')
                                No Action
                                @endif
                                @if ($property->pro_price_status=='rejected' && Auth::user()->user_role!='householder')
                                No Action
                                @endif
                            </td>
                        </tr>
                        @endforeach      
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

@endsection