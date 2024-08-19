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

                {{-- <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                    <thead class="bg-primary">
                    <tr>
                        <th>DATE</th>
                        <th>FULL name</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>STATUS</th>
                        @if (Auth::user()->user_role!='householder')
                        <th>ACTION</th>                            
                        @endif
                    </tr>
                    </thead>

                    <tbody>   
                        <?php
                        $count = 0;
                        ?>
                        @foreach ($users as $user)  
                        <?php
                        $count+=1;
                        ?> 
                        <tr>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->first_name.' '.$user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user_telephone }}</td>
                            <td>{{ $user->user_status }}</td>
                            @if (Auth::user()->user_role!='householder')
                            <td>No Action</td>
                            @endif
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