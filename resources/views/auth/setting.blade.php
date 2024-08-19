@extends('layout.includes')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="text-center mb-5">
                            <h4>Account Settings</h4>
                            <p class="text-muted">If any issue in account information just modify according your permission.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="faq-box mb-5">
                                    <div class="faq-ques rounded">
                                        <h6 class="pb-2"><i class="mdi mdi-help-circle text-primary mr-4 faq-icon"></i> User Information</h6>
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
                                                <input type="text" name="update_first_name" value="{{ Auth::user()->first_name }}" class="form-control"/>
                                                @error('update_first_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label>Last Name</label>                                       
                                                <input type="text" name="update_last_name" value="{{ Auth::user()->last_name }}" class="form-control"/>
                                                @error('update_last_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label>Email</label>                                       
                                                <input type="text" name="update_email" value="{{ Auth::user()->email }}" class="form-control"/>
                                                @error('update_email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label>Telephone</label>                                       
                                                <input type="text" name="update_phone" value="{{ Auth::user()->user_telephone }}" class="form-control"/>
                                                @error('update_phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> 

                                            <div class="form-group">
                                                <label>Username</label>                                       
                                                <input type="text" name="update_user_name" value="{{ Auth::user()->user_name }}" class="form-control"/>
                                                @error('update_user_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Location/Address</label>                                       
                                                <input type="text" name="update_location" value="{{ Auth::user()->user_location }}" class="form-control"/>
                                                @error('update_location')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>                          
                                            <div class="form-group text-center">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Save Change
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="faq-box mb-5">
                                    <div class="faq-ques bg-warning rounded">
                                        <h6 class="pb-2"><i class="mdi mdi-account-key text-primary mr-4 faq-icon"></i> Security Information</h6>
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
                                                <label>Old Password</label>
                                                <input type="text" name="old_password" class="form-control" placeholder="Old Password"/>
                                                @error('old_password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="New Password"/>
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Password Confirmation</label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password"/>
                                                @error('password_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>                       
                                            <div class="form-group text-center">
                                                <div>
                                                    <button type="submit" class="btn btn-warning waves-effect waves-light">
                                                        Save Change
                                                    </button>
                                                </div>
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
<!-- end row -->
@endsection