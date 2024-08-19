<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>AUCA Management System</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('assets/images/bg.png')}}">

        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg">
            
            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-10">
                                <div class="card">
                                    <div class="card-body">
                    
                                        <h3 class="text-center mt-0 m-b-3">
                                            <a href="index.html" class="logo logo-admin"><img src="{{ asset('assets/images/bg.png')}}" height="60" alt="logo"></a>
                                        </h3>
                    
                                        <div class="p-3">
                                            <form class="form-horizontal m-t-5" action="{{ route('new.householder.op') }}" method="POST">
                                                    @csrf
                                                    <div>                    
                                                        @error('new_agent')
                                                            <div class="alert alert-success text-primary font-18 text-center">{{ $message }}</div>
                                                        @enderror  
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
        
                                                                <div class="form-group">
                                                                    <label>First Name</label>                                       
                                                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control"/>
                                                                    @error('first_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div> 
                
                                                                <div class="form-group">
                                                                    <label>Last Name</label>                                       
                                                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control"/>
                                                                    @error('last_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div> 
                
                                                                <div class="form-group">
                                                                    <label>Email</label>                                       
                                                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control"/>
                                                                    @error('email')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div> 
                
                                                                <div class="form-group">
                                                                    <label>Telephone</label>                                       
                                                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"/>
                                                                    @error('phone')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div> 
                                                            </div>
                                                            <div class="col-6">
        
                                                                <div class="form-group">
                                                                    <label>Username</label>                                       
                                                                    <input type="text" name="user_name" value="{{ old('user_name') }}" class="form-control"/>
                                                                    @error('user_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                
                                                                <div class="form-group">
                                                                    <label>Location/Address</label>                                       
                                                                    <input type="text" name="location" value="{{ old('location') }}" class="form-control"/>
                                                                    @error('location')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                
                                                                <div class="form-group">
                                                                    <label>password</label>                                       
                                                                    <input type="text" name="password" class="form-control"/>
                                                                    @error('password')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                
                                                                <div class="form-group">
                                                                    <label>Confirm password</label>                                       
                                                                    <input type="text" name="password_confirmation" class="form-control"/>
                                                                    @error('password_confirmation')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                
                                                            <div class="form-group row">
                                                                <div class="col-12">
                                                                    <div class="custom-control">
                                                                        <a href="{{ route('login.form') }}">Already have account? Login here.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                    
                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Send Information</button>
                                                    </div>
                                                </div>
                    
                                            </form>
                                        </div>
                    
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>


        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{ asset('assets/js/detect.js')}}"></script>
        <script src="{{ asset('assets/js/fastclick.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{ asset('assets/js/waves.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js')}}"></script>

    </body>
</html>