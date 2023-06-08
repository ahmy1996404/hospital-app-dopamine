<footer class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">

            </div>



            <div class="col-lg-4 col-md-6">

            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget">
                    <h3>Important Link</h3>
                        <ul class="footer-list">
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
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget ps-2">
                    <div class="footer-logo">
                        <a href="index.html">
                            <img src="{{ asset(\App\Helpers\Utility::getValByName('logo')) }}" alt="Logo">

                        </a>
                    </div>
                    <p>Grursus mal suada faci Lorem to the ipsum dolarorit more ame tion more consectetu.</p>
                    <ul class="social-link">
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-youtube'></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Copy-Right Area -->
<div class="copy-right-area">
    <div class="container">
        <div class="copy-right-text text-center">
            <p>
                Copyright ©2021 Medizo. All Rights Reserved by
                <a href="" target="_blank">HiBootstrap</a>
            </p>
        </div>
    </div>
</div>
<!-- Copy-Right Area End -->
