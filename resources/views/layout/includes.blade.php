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

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css')}}">

        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        
        <!-- Sweet Alert -->
        <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <div class="left-side-logo d-block d-lg-none">
                    <div class="text-center">
                        
                        <a href="{{ route('dashboard') }}" class="logo"><img src="{{ asset('assets/images/bg.png')}}" height="60" alt="logo"></a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">
                    
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <i class="dripicons-meter"></i>
                                    <span>DASHBOARD</span>
                                </a>
                            </li>

                            @if (Auth::user()->user_role!='householder')

                            <li class="menu-title">USER MANAGE</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-view-list"></i> <span> USERS LIST </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('user.list.agent') }}"><i class="dripicons-list"></i><span>  List All Agent</span> </a></li>
                                    <li><a href="{{ route('user.list.householder') }}"><i class="dripicons-list"></i><span>  List All Householder</span> </a></li>
                                </ul>
                            </li>

                            <li data-toggle="modal" data-target=".bs-example-modal-lg-newAgent">
                                <a href="#" class="waves-effect">
                                    <i class="dripicons-meter"></i>
                                    <span>New Agent</span>
                                </a>
                            </li>
                            @else

                            <li>
                                <a href="{{ route('user.list.agent') }}" class="waves-effect">
                                    <i class="dripicons-meter"></i>
                                    <span>LIST ALL AGENT</span>
                                </a>
                            </li>
                                
                            @endif

                            <li class="menu-title">PROPERTY MANAGE</li>

                            @if (Auth::user()->user_role=='householder')
                            <li data-toggle="modal" data-target=".bs-example-modal-lg-newProperty">
                                <a href="#" class="waves-effect">
                                    <i class="dripicons-meter"></i>
                                    <span>New Property</span>
                                </a>
                            </li>                                
                            @endif
                            <li >
                                <a href="{{ route('property.list') }}" class="waves-effect">
                                    <i class="dripicons-meter"></i>
                                    <span>View Properties</span>
                                </a>
                            </li>
                            <li >
                                <a href="{{ route('action.property.list') }}" class="waves-effect">
                                    <i class="dripicons-meter"></i>
                                    <span>Properties Action</span>
                                </a>
                            </li>
                            @if (Auth::user()->user_role!='householder')                                
                            <li data-toggle="modal" data-target=".bs-example-modal-lg-newInflation">
                                <a href="#" class="waves-effect">
                                    <i class="dripicons-meter"></i>
                                    <span>Change General</span>
                                </a>
                            </li>
                            @endif

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar"> 

                        <div class="topbar-left	d-none d-lg-block">
                            <div class="text-center">
                                
                                <a href="{{ route('dashboard') }}" class="logo"><img src="{{ asset('assets/images/logo.png')}}" height="40" alt="Auca"></a>
                            </div>
                        </div>

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">


                                <li class="list-inline-item dropdown notification-list mr-5">
                                    <?php 
                                    $date = date('d-m-Y');
                                    ?>
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="false" aria-expanded="false">
                                    <span class="font-18 text-danger">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</span>
                                        <img src="{{ asset('assets/images/users/user-1.jpg')}}" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                        <a class="dropdown-item" href="{{ route('setting') }}"><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="float-right page-breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">AUCA</a></li>
                                            <li class="breadcrumb-item active">{{ $title }}</li>
                                        </ol>
                                    </div>
                                    <h5 class="page-title">{{ $title }}</h5>
                                </div>
                            </div>
                            <!-- end row -->
                            @error('new_property')
                                <div class="alert alert-success text-danger text-center">{{ $message }}</div>
                            @enderror
                            @error('new_agent')
                                <div class="alert alert-success text-danger text-center">{{ $message }}</div>
                            @enderror
                            <!--  Modal agent for the above example -->
                            <div class="modal fade bs-example-modal-lg-newAgent" id="newAgent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('new.agent') }}" method="POST">
                                            @csrf
                                            <div>                    
                                                @error('new_agent')
                                                    <div class="alert alert-success text-primary font-18 text-center">{{ $message }}</div>
                                                @enderror  
                                            </div>
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0 text-success" id="myLargeModalLabel">Agent Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

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

                                                <div class="form-group">
                                                    <label>Username</label>                                       
                                                    <input type="text" name="user_name" value="{{ old('user_name') }}" class="form-control"/>
                                                    @error('user_name')
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

                                                <div class="form-group text-center">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                            Save Transaction
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <!--  Modal property for the above example -->
                            <div class="modal fade bs-example-modal-lg-newProperty" id="newProperty" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('new.property') }}" method="POST">
                                            @csrf
                                            <div>                    
                                                @error('new_agent')
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
                                                    <input type="text" name="pro_price" value="{{ old('pro_price') }}" class="form-control"/>
                                                    @error('pro_price')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 

                                                <div class="form-group">
                                                    <label>Property Furniture</label>                                       
                                                    <input type="text" name="pro_furniture" value="{{ old('pro_furniture') }}" class="form-control"/>
                                                    @error('pro_furniture')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 

                                                <div class="form-group">
                                                    <label>Property Building Date</label>                                       
                                                    <input type="date" name="pro_date" value="{{ old('pro_date') }}" class="form-control"/>
                                                    @error('pro_date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Property Details</label>                                       
                                                    <textarea name="pro_details"  class="form-control" rows="5">{{ old('pro_details') }}</textarea>
                                                    @error('pro_details')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 

                                                <div class="form-group text-center">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                            Save Information
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <!--  Modal inflation for the above example -->
                            <div class="modal fade bs-example-modal-lg-newInflation" id="inflation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('inflation.new') }}" method="POST">
                                            @csrf
                                            <div>                    
                                                @error('new_agent')
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
                                                    <label>Category</label>                                       
                                                    <select name="category" class="form-control">
                                                        <option value="" selected disabled>Select Category</option>
                                                        <option value="inflation">INFATION</option>
                                                        <option value="deflation">DEFLATION</option>
                                                    </select>
                                                    @error('category')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 

                                                <div class="form-group">
                                                    <label>percentage of Inflation/Deflation</label>                                       
                                                    <input type="number" name="percentage" value="{{ old('percentage') }}" class="form-control"/>
                                                    @error('percentage')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 

                                                <div class="form-group text-center">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                            Save Information
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                        @yield('contents')

                        </div><!-- container fluid -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © <span id="year"></span> <b>MAICO</b> <span class="d-none d-sm-inline-block"> - All rights reserved.  </span><span class="float-right">MTMS- MAICO v1.0</span>
                    <script>
                        document.getElementById("year").innerHTML = new Date().getFullYear();
                    </script>
                </footer>

            </div>pro_furniture
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


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

        <!-- skycons -->
        <script src="{{ asset('assets/plugins/skycons/skycons.min.js')}}"></script>

        <!-- skycons -->
        <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael-min.js')}}"></script>

        <!-- dashboard -->
        <script src="{{ asset('assets/pages/dashboard.js')}}"></script>



        <!-- Required datatable js -->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>

        <!-- Sweet-Alert  -->
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/pages/sweet-alert.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js')}}"></script>
        @if (count($errors) > 0)
            @if ($errors->has('first_name') || $errors->has('last_name') ||$errors->has('email') || $errors->has('user_name') || $errors->has('password'))
                <script type="text/javascript">
                    $( document ).ready(function() {
                        $('#newAgent').modal('show');
                    });
                </script>
            @endif
            @if ($errors->has('pro_price') || $errors->has('pro_furniture') ||$errors->has('pro_date') || $errors->has('pro_details'))
                <script type="text/javascript">
                    $( document ).ready(function() {
                        $('#newProperty').modal('show');
                    });
                </script>
            @endif
            @if ($errors->has('category') || $errors->has('percentage'))
                <script type="text/javascript">
                    $( document ).ready(function() {
                        $('#inflation').modal('show');
                    });
                </script>
            @endif
        @endif
    </body>
</html>