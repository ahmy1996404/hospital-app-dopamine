<div class="sl-sideleft">


    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
        <a href="{{ route('admin.dashboard') }}" class="sl-menu-link {{ checkRoute('admin.dashboard') }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->

        </a><!-- sl-menu-link -->
        <!-- sl-menu-link -->
        <a href="#" class="sl-menu-link  {{ checkRoute('admin/patient*', 'route', 'all') }}">
            <div class="sl-menu-item">
                <i class="fa-solid fa-hospital-user"></i>
                <span class="menu-item-label">Patients</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.patient.index') }}" class="nav-link">View</a>
            </li>
            <li class="nav-item"><a href="{{ route('admin.patient.create') }}" class="nav-link">Create</a>
            </li>

        </ul>
        <!-- sl-menu-link -->
        <a href="#" class="sl-menu-link  {{ checkRoute('admin/doctor*', 'route', 'all') }}">
            <div class="sl-menu-item">
                <i class="fa-solid fa-user-doctor"></i>
                <span class="menu-item-label">Doctors</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.doctor.index') }}" class="nav-link">View</a>
            </li>
            <li class="nav-item"><a href="{{ route('admin.doctor.create') }}" class="nav-link">Create</a>
            </li>

        </ul>
        <!-- sl-menu-link -->
        <!-- sl-menu-link -->
        <a href="#" class="sl-menu-link  {{ checkRoute('admin/speciality*', 'route', 'all') }}">
            <div class="sl-menu-item">
                <i class="fa-solid fa-circle-h"></i>
                <span class="menu-item-label">Speciality</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.speciality.index') }}" class="nav-link">View</a>
            </li>
            <li class="nav-item"><a href="{{ route('admin.speciality.create') }}"
                    class="nav-link">Create</a></li>

        </ul>
        <!-- sl-menu-link -->
        <!-- sl-menu-link -->
        <a href="#" class="sl-menu-link  {{ checkRoute('admin/appointment*', 'route', 'all') }}">
            <div class="sl-menu-item">
                <i class="fa-solid fa-calendar-check"></i>
                <span class="menu-item-label">Apointment</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.appointment.index') }}"
                    class="nav-link">View</a></li>
            <li class="nav-item"><a href="{{ route('admin.appointment.create') }}"
                    class="nav-link">Create</a></li>
        </ul>
        <!-- sl-menu-link -->

    </div><!-- sl-sideleft-menu -->

    <br>
    <label class="sidebar-label">Settings</label>
    <div class="sl-sideleft-menu">
        <a href="{{ route('admin.setting.index') }}"
            class="sl-menu-link {{ checkRoute('admin/setting*', 'route', 'all') }}">
            <div class="sl-menu-item">
                <i class="fas fa-cog"></i>
                <span class="menu-item-label">Setting</span>
            </div><!-- menu-item -->

        </a><!-- sl-menu-link -->
        <!-- sl-menu-link -->

        <!-- sl-menu-link -->

    </div><!-- sl-sideleft-menu -->
    <div class="sl-sideleft-menu">
        <a href="{{ route('admin.aboutUs.edit') }}"
            class="sl-menu-link {{ checkRoute('admin/about-us*', 'route', 'all') }}">
            <div class="sl-menu-item">
                <i class="fas fa-info"></i>
                <span class="menu-item-label">About Us</span>
            </div><!-- menu-item -->

        </a><!-- sl-menu-link -->
        <!-- sl-menu-link -->

        <!-- sl-menu-link -->

    </div><!-- sl-sideleft-menu -->
    <!-- sl-menu-link -->
    <a href="#" class="sl-menu-link  {{ checkRoute('admin/service*', 'route', 'all') }}">
        <div class="sl-menu-item">
            <i class="fas fa-cogs"></i>
            <span class="menu-item-label">Service</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.service.index') }}" class="nav-link">View</a></li>
        <li class="nav-item"><a href="{{ route('admin.service.create') }}" class="nav-link">Create</a>
        </li>

    </ul>
    <div class="sl-sideleft-menu">
        <a href="{{ route('admin.contact.index') }}"
            class="sl-menu-link {{ checkRoute('admin/contact*', 'route', 'all') }}">
            <div class="sl-menu-item">
                <i class="fas fa-comment"></i>
                <span class="menu-item-label">Contact Message</span>
            </div><!-- menu-item -->

        </a><!-- sl-menu-link -->
        <!-- sl-menu-link -->

        <!-- sl-menu-link -->

    </div><!-- sl-sideleft-menu -->
    <br>
    <label class="sidebar-label">Blog</label>
    <a href="#" class="sl-menu-link  {{ checkRoute('admin/articleCategory*', 'route', 'all') }}">
        <div class="sl-menu-item">
            <i class="fas fa-boxes"></i>
            <span class="menu-item-label">Categories</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.articleCategory.index') }}"
                class="nav-link">View</a></li>
        <li class="nav-item"><a href="{{ route('admin.articleCategory.create') }}"
                class="nav-link">Create</a></li>

    </ul>
    <a href="#" class="sl-menu-link  {{ checkRoute('admin/article', 'route', 'all') }}">
        <div class="sl-menu-item">
            <i class="fas fa-newspaper"></i>
            <span class="menu-item-label">article</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.article.index') }}" class="nav-link">View</a></li>
        <li class="nav-item"><a href="{{ route('admin.article.create') }}" class="nav-link">Create</a>
        </li>

    </ul>
</div>
