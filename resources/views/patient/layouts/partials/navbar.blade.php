 <div class="navbar-area">
     <!-- Menu For Mobile Device -->
     <div class="mobile-nav">
         <a href="index.html" class="logo">
             <img src="{{ asset(\App\Helpers\Utility::getValByName('logo')) }}" alt="Logo">
         </a>
     </div>
     <!-- Menu For Desktop Device -->
     <div class="main-nav">
         <div class="container">
             <nav class="navbar navbar-expand-md navbar-light ">
                 <a class="navbar-brand" href="index.html">
                     <img src="{{ asset(\App\Helpers\Utility::getValByName('logo')) }}" alt="Logo">
                 </a>

                 <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                     <ul class="navbar-nav m-auto">
                         <li class="nav-item">
                             <a href="{{ route('patient.home') }}"
                                 class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                 Home
                             </a>

                         </li>
                         <li class="nav-item">
                             <a href="{{ route('patient.doctors') }}"
                                 class="nav-link {{ checkRoute('doctor*', 'route', 'all') }}">
                                 Doctors
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('patient.doctor.appointoment') }}"
                                 class="nav-link {{ checkRoute('appointment*', 'route', 'all') }}">
                                 Appointment
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="about.html" class="nav-link">
                                 About
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 Blog
                             </a>

                         </li>

                         <li class="nav-item">
                             <a href="contact.html" class="nav-link">
                                 Contact
                             </a>
                         </li>
                     </ul>

                     <div class="others-options d-flex align-items-center">
                         <div class="option-item">
                             <i class='search-btn bx bx-search'></i>
                             <i class='close-btn bx bx-x'></i>
                             <div class="search-overlay search-popup">
                                 <div class='search-box'>
                                     <form class="search-form">
                                         <input class="search-input" name="search" placeholder="Search" type="text">

                                         <button class="search-button" type="submit">
                                             <i class="bx bx-search"></i>
                                         </button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         <div class="option-item">

                             @if (Route::has('login'))
                                 <ul class="navbar-nav m-auto">
                                     @auth
                                         <a class="nav-item" id="dropdown-user" href="#" data-bs-toggle="dropdown"
                                             aria-haspopup="true" aria-expanded="false">

                                             <span class="avatar">
                                                 <img class="round"
                                                     src="{{ asset(!empty(Auth::user()->profile_photo_path->profile_photo_path) ? 'upload/user_images/' . Auth::user()->profile_photo_path : 'upload/noimagejpg.jpg') }}"
                                                     alt="avatar" height="40" width="40" style="object-fit: cover;">
                                                 <span class="avatar-status-online"></span>
                                             </span>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                                             @if (Auth::user()->user_type == 'doctor')
                                                 <a class="dropdown-item" href="{{ route('dashboard') }}"><i
                                                         class="me-50" data-feather="user"></i> Doctor
                                                     Dashboard</a>
                                             @endif

                                             <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                                     class="me-50" data-feather="user"></i> Profile</a>
                                             <a class="dropdown-item" href="{{ route('user.password.view') }}"><i
                                                     class="me-50" data-feather="user"></i> Change Password</a>

                                             <a class="dropdown-item" href="{{ route('user.appoinment.view') }}"><i
                                                     class="me-50" data-feather="check-square"></i>
                                                 Appointments</a>
                                             <a class="dropdown-item" href="{{ route('user.report.view') }}"><i
                                                     class="me-50" data-feather="check-square"></i>
                                                 Reports</a>
                                            
                                             <a class="dropdown-item" href="{{ route('patient.chat.index') }}"><i class="me-50"
                                                     data-feather="message-square"></i> Chats</a>
                                             <a class="dropdown-item" href="page-faq.html"> <i class="me-50"
                                                     data-feather="help-circle"></i> FAQ</a>
                                             <a class="dropdown-item" href="{{ route('user.logout') }} "> Logout</a>
                                         </div>
                                     @else
                                         <li class="nav-item">

                                             <a href="{{ route('login') }}"
                                                 class="nav-link {{ request()->is('login') ? 'active' : '' }}">LogIn</a>
                                         </li>
                                         @if (Route::has('register'))
                                             <li class="nav-item">

                                                 <a href="{{ route('register') }}" class="nav-link">Register</a>
                                             </li>
                                         @endif
                                     @endauth
                                 </ul>
                             @endif

                         </div>

                     </div>
                 </div>
             </nav>
         </div>
     </div>

     <div class="side-nav-responsive">
         <div class="container">
             <div class="dot-menu">
                 <div class="circle-inner">
                     <div class="circle circle-one"></div>
                     <div class="circle circle-two"></div>
                     <div class="circle circle-three"></div>
                 </div>
             </div>

             <div class="container">
                 <div class="side-nav-inner">
                     <div class="side-nav justify-content-center align-items-center">
                         <div class="side-item">
                             <div class="option-item">
                                 <i class='search-btn bx bx-search'></i>
                                 <i class='close-btn bx bx-x'></i>
                                 <div class="search-overlay search-popup">
                                     <div class='search-box'>
                                         <form class="search-form">
                                             <input class="search-input" name="search" placeholder="Search"
                                                 type="text">

                                             <button class="search-button" type="submit">
                                                 <i class="bx bx-search"></i>
                                             </button>
                                         </form>
                                     </div>
                                 </div>
                             </div>

                             <div class="option-item">
                                 <div class="add-cart-btn">
                                     <a href="#" class="cart-btn-icon">
                                         <i class='bx bx-shopping-bag'></i>
                                         <span>0</span>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
