@extends('layout.includes')
@section('contents')

@if (Auth::user()->user_role=='systemRHA')
    
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-primary text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cube-outline float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0">New Properties</h6>
            </div>
            <div class="card-body">
                <div class="border-bottom pb-4">
                    <span class="badge badge-success"> {{ $countProducts }} </span> <span class="ml-2 text-muted">From previous period</span>
                </div>
                <div class="mt-4 text-muted">
                    <div class="float-right">
                        <p class="m-0">Last : {{ $lastProducts }}</p>
                    </div>
                    <h5 class="m-0">{{ $todayProducts }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-primary text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-account-network float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0">Users</h6>
            </div>
            <div class="card-body">
                <div class="border-bottom pb-4">
                        <span class="badge badge-success"> {{ $countUsers }} </span> <span class="ml-2 text-muted">From previous period</span>
                </div>
                <div class="mt-4 text-muted">
                    <div class="float-right">
                        <p class="m-0">Last : {{ $lastUsers }}</p>
                    </div>
                    <h5 class="m-0">{{ $todayUsers }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-primary text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-tag-text-outline float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0">Average Price</h6>
            </div>
            <div class="card-body">
                <div class="border-bottom pb-4">
                    <span class="badge badge-danger"> {{$sumAverage}} </span> <span class="ml-2 text-muted">From previous period</span>
                </div>
                <div class="mt-4 text-muted">
                    <h5 class="m-0">{{ $todayAverage }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-primary text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cart-outline float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0">Total Properties Cost</h6>
            </div>
            <div class="card-body">
                <div class="border-bottom pb-4">
                    <span class="badge badge-success"> {{ $sumPrice }} </span> <span class="ml-2 text-muted">From previous period</span>
                </div>
                <div class="mt-4 text-muted">
                    <h5 class="m-0">{{ $todayPrice }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-4">Recent Properties</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Owner Name</th>
                                <th>Address</th>
                                <th>Telephone</th>
                                <th>Amount</th>
                                <th>Registered date</th>
                                <th>Status</th>
                            </tr>

                        </thead>
                        <tbody>
                            
                            @foreach ($latestProducts as $product)
                            <tr>
                                <td>{{ $product->first_name.' '.$product->first_name }}</td>
                                <td>{{ $product->user_location==""?'N/A':$product->user_location }}</td>
                                <td>{{ $product->user_telephone }}</td>
                                <td>{{ $product->pro_price }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->pro_price_status }}</td>
                            </tr>                                
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@else 

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="text-center mb-5">
                            <h4>Account Information</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="faq-box mb-5">
                                    <div class="faq-ques rounded">
                                        <h6 class="pb-2"><i class="mdi mdi-account text-primary mr-4 faq-icon"></i> User Information</h6>
                                    </div>

                                    <form action="{{ route('update.user.information') }}" method="post">
                                        @csrf
                                        <div>                    
                                            @error('error')
                                                <div class="alert alert-success text-primary font-18 text-center">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>First Name</label>                                       
                                                <input type="text" name="update_first_name" value="{{ Auth::user()->first_name }}" readonly class="form-control"/>
                                                @error('update_first_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label>Last Name</label>                                       
                                                <input type="text" name="update_last_name" value="{{ Auth::user()->last_name }}" readonly class="form-control"/>
                                                @error('update_last_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label>Email</label>                                       
                                                <input type="text" name="update_email" value="{{ Auth::user()->email }}" readonly class="form-control"/>
                                                @error('update_email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label>Telephone</label>                                       
                                                <input type="text" name="update_phone" value="{{ Auth::user()->user_telephone }}" readonly class="form-control"/>
                                                @error('update_phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label>Username</label>                                       
                                                <input type="text" name="update_user_name" value="{{ Auth::user()->user_name }}" readonly class="form-control"/>
                                                @error('update_user_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Location/Address</label>                                       
                                                <input type="text" name="update_location" value="{{ Auth::user()->user_location }}" readonly class="form-control"/>
                                                @error('update_location')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>      
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="faq-box mb-5">
                                    <div class="faq-ques bg-success rounded">
                                        <h6 class="pb-2"><i class="mdi mdi-account-key text-primary mr-4 faq-icon"></i> System Information</h6>
                                    </div>


                                    <form action="{{ route('update.user.password') }}" method="post">
                                        @csrf
                                        <div>                    
                                            @error('error1')
                                                <div class="alert alert-success text-primary font-18 text-center">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Number of Properties</label>
                                                <input type="text" name="old_password" readonly class="form-control" value="{{ $properties }}"/>
                                                @error('old_password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Total Amount</label>
                                                <input type="text" name="password" readonly class="form-control" value="{{ $amount }}"/>
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection