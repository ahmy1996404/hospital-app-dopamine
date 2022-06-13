<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="panel/assets/images/favicon.png">
    <!--Page title-->
    <title>{{ \App\Helpers\Utility::getValByName('title_text') }} | Doctor Dashboard</title>
    <!--bootstrap-->

    <link rel="stylesheet" href="{{ asset('userbackend/panel/assets/css/bootstrap.min.css') }}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{ asset('userbackend/panel/assets/css/all.min.css') }}">
    <!-- metis menu -->
    <link rel="stylesheet"
        href="{{ asset('userbackend/panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('userbackend/panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css') }}">
    <!-- chart -->

    <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{ asset('userbackend/panel/assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href ="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
</head>

<body id="page-top">
    <!-- preloader -->
    <div class="preloader">
        <img src="{{ asset('userbackend/panel/assets/images/preloader.gif') }}" alt="">
    </div>
    <!-- wrapper -->
    <div class="wrapper">

        <!-- header area -->
        <header class="header_area">
            <!-- logo -->
            <div class="sidebar_logo">
                <a href="/dashboard">
                   <h3 style="color: white">Dopamine</h3> 
                </a>
            </div>
            <div class="sidebar_btn">
                <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
            </div>
            <ul class="header_menu">
                <li><a href="#" class="search_btn" data-toggle="modal" data-target="#myModal"><i
                            class="fas fa-search"></i></a>
                    <div class="modal fade search_box" id="myModal">
                        <button type="button" class="close m-2 text-white float-right"
                            data-dismiss="modal">&times;</button>
                        <form action="#" class="modal-dialog modal-lg">

                            <div class="modal-content bg-transparent">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input class="form-control bg-transparent text-white form-control-lg" type="text"
                                        placeholder="Search...">
                                    <button class="btn btn-lg submit-btn" type="submit">Search</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </li>
               <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                    <div class="user_item dropdown-menu dropdown-menu-right">
                        <div class="admin">
                            <a href="#" class="user_link"><img src="panel/assets/images/admin.jpg" alt=""></a>
                        </div>
                        <ul>

                            <li><a href="{{ route('user.profile') }}"><span><i class="fas fa-user"></i></span> User Profile</a></li>
                            <li><a href=" {{ route('user.password.view') }} "><span><i class="fas fa-cogs"></i></span> Password Change</a></li>
                            <li>

                                <a href="{{ route('user.logout') }} "><span><i class="fas fa-unlock-alt"></i></span> Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>

                    <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </header><!-- / header area -->
        <!-- sidebar area -->
        <aside class="sidebar-wrapper ">
            <nav class="sidebar-nav">
                <ul class="metismenu" id="menu1">
                    <li class="single-nav-wrapper">
                        <a href="{{ route('dashboard') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-home"></i></span>
                            <span class="menu-text">home</span>
                        </a>
                    </li>
                    <li class="single-nav-wrapper">
                        <a class="menu-item" href="{{ route('doctor.appointment') }}" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-calendar-check"></i></span>
                            <span class="menu-text">Appoinments</span>
                        </a>
                    </li>
                    <li class="single-nav-wrapper">
                        <a class="menu-item" href="{{ route('doctor.patient') }}" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-flag"></i> </span>
                            <span class="menu-text">Patients Reports</span>
                        </a>
                    </li>
                     <li class="single-nav-wrapper">
                        <a class="menu-item" href="{{ route('doctor.chat.index') }}" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-comment"></i></span>
                            <span class="menu-text">Chat</span>
                        </a>
                    </li>
                     
                </ul>
            </nav>
        </aside><!-- /sidebar Area-->






        <div class="content_wrapper">
            <!--middle content wrapper-->
           @yield('user')
            <!--/middle content wrapper-->
        </div>
        <!--/ content wrapper -->










    </div>
    <!--/ wrapper -->

    {{ asset('') }}

    <!-- jquery -->
    <script src="{{ asset('userbackend/panel/assets/js/jquery.min.js') }}"></script>
    <!-- popper Min Js -->
    <script src="{{ asset('userbackend/panel/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('userbackend/panel/assets/js/bootstrap.min.js') }}"></script>
    <!-- Fontawesome-->
    <script src="{{ asset('userbackend/panel/assets/js/all.min.js') }}"></script>
    <!-- metis menu -->
    <script src="{{ asset('userbackend/panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js') }}"></script>
    <script src="{{ asset('userbackend/panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js') }}">
    </script>
    <!-- nice scroll bar -->
    <script src="{{ asset('userbackend/panel/assets/plugins/scrollbar/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('userbackend/panel/assets/plugins/scrollbar/scroll.active.js') }}"></script>
    <!-- counter -->
    <script src="{{ asset('userbackend/panel/assets/plugins/counter/js/counter.js') }}"></script>
    <!-- chart -->
    <script src="{{ asset('userbackend/panel/assets/plugins/chartjs-bar-chart/Chart.min.js') }}"></script>
    <script src="{{ asset('userbackend/panel/assets/plugins/chartjs-bar-chart/chart.js') }}"></script>
    <!-- pie chart -->
    <script src="{{ asset('userbackend/panel/assets/plugins/pie_chart/chart.loader.js') }}"></script>
    <script src="{{ asset('userbackend/panel/assets/plugins/pie_chart/pie.active.js') }}"></script>


    <!-- Main js -->
    <script src="{{ asset('userbackend/panel/assets/js/main.js') }}"></script>


    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}"></script>
    <script>
        @if (Session::has('message'))
        var type ="{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
             case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
             case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
        }
        @endif
    </script>




</body>

</html>
