<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
      <link href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
        <!-- Font Icons -->
        <link href="{{ asset('public/admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
        <!-- animate css -->
        <link href="{{ asset('public/admin/css/animate.css') }}" rel="stylesheet" />
        <!-- Waves-effect -->
        <link href="{{ asset('public/admin/css/waves-effect.css') }}" rel="stylesheet">
        <!-- Custom Files -->
        <link href="{{ asset('public/admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('public/admin/js/modernizr.min.js') }}"></script>
          <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
          <!-- DataTables -->
        <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" /> 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
  <body class="fixed-left">   
        <!-- Begin page -->
        <div id="wrapper">
                        <!-- Authentication Links -->
                        @guest
                           
                        @else
                                <!-- Top Bar Start -->
            <div class="topbar">
              
                <div class="topbar-left">

                    <div class="text-center">
                       <h4 style="color: #424242;text-align: center;padding-top: 2px">Inventory Management</h4>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            

                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ URL::to('public/admin/images/shamim.JPG') }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">

                                           <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                  
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                            <li>
                                <a href="{{ route('pos') }}" class="waves-effect active"><i class="md md-home"></i><span class="text-primary"><b>POS</b></span></a>
                            </li>
                           
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-users"></i><span> Employees </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.employee') }}">Add Employee</a></li>
                                     <li><a href="{{route ('all.employee')}}">All Employee</a></li>
                                </ul>
                            </li> 
                             <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Customer </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.customer') }}">Add Customers</a></li> 
                                    <li><a href="{{ route('all.customer') }}">All Customer</a></li>     
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span>Suppliers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.suppliers') }}">Add Suppliers</a></li> 
                                    <li><a href="{{ route('all.suppliers') }}">All Suppliers</a></li>     
                                </ul>
                            </li>
                             </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span>Salary(EMP) </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.advancedsalary') }}">Add Advanced Salary</a></li><li><a href="{{ route('all.advancedsalary') }}">All AdvancedSalary</a></li>
                                    <li><a href="{{route('pay.salary')}}">Pay Salary</a></li> 
                                    <li><a href="">Last Month Salary</a></li>    
                                </ul>
                            </li>
                           <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span>Category </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.category') }}">Add Category</a></li> 
                                    <li><a href="{{ route('all.category') }}">All Category</a></li>     
                                </ul>
                            </li>
                             <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span>Product </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.product') }}">Add Product</a></li> 
                                    <li><a href="{{ route('all.product') }}">All Product</a></li>
                                    <li><a href="{{ route('import.product') }}">Import Product</a></li>    
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span>Expense </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.expense') }}">Add New</a></li> 
                                    <li><a href="{{ route('Today.expense') }}">Today Expense</a></li>   
                                    <li><a href="{{ route('Monthly.expense') }}">MOnthly Expense</a></li> 
                                    <li><a href="{{ route('CureenMonthly.expense') }}"> PresentMnth Expense</a></li>  
                                    <li><a href="{{ route('Yearly.expense') }}">Yearly Expense</a></li> 
                                </ul>
                            </li>
                             <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Orders</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('pending.order')}}">Pending Order</a></li>
                                    <li><a href="{{route('success.order')}}">Success Order</a></li>    
                                </ul>
                            </li>
                           
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Attendence </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('take.attendence') }}">Take Attendence</a></li>
                                    <li><a href="{{ route('all.attendence') }}">All Attendences</a></li>
                                     <li><a href="#">Monthly Attendence</a></li>    
                                </ul>
                            </li>
                              <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Setting </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('setting') }}">Setting</a></li>
                                       
                                </ul>
                            </li>
                         

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
         @endguest
        </div>     
        <main class="py-4">
            @yield('content')
        </main>
    </div>



            <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('public/admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/waves.js') }}"></script>
        <script src="{{ asset('public/admin/js/wow.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/admin/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('public/admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('public/admin/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('public/admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('public/admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>



        <!-- flot Chart -->
   {{--      <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.crosshair.js') }}"></script> --}}

        <!-- Counter-up -->
        <script src="{{ asset('public/admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{ asset('public/admin/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('public/admin/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
{{--         <script src="{{ asset('public/admin/js/jquery.chat.js') }}"></script> --}}

        <!-- Todo -->
        {{-- <script src="{{ asset('public/admin/js/jquery.todo.js') }}"></script> --}}
        <script src="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
         <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


        <script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
    </script>
     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
</body>
</html>
