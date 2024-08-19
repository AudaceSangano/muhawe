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
                    </tr>
                    </thead>

                    <tbody>   
                        <?phpVertical/pages-lock-screen.html
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