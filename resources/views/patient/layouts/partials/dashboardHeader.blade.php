<div class="my-account-menu">
    <ul class="nav account-menu-list flex-column nav-pills" id="pills-tab" role="tablist">
        <li>
            <a class="{{ request()->is('user/profile/edit') ? 'active' : '' }} link--icon-left" id="pills-dashboard-tab" data-toggle="pill" href="{{ route('profile.edit') }}"
                role="tab" aria-controls="pills-dashboard" aria-selected="true"><i class="fas fa-tachometer-alt"></i>
                Edit Acount</a>
        </li>
        <li>
            <a id="pills-order-tab" class="{{ request()->is('user/password/view') ? 'active' : '' }} link--icon-left" data-toggle="pill" href="{{ route('user.password.view') }}" role="tab"
                aria-controls="pills-order" aria-selected="false"><i class="fas fa-shopping-cart"></i> Change Password</a>
        </li>
        <li>
            <a id="pills-download-tab" class="{{ request()->is('user/appointment/view') ? 'active' : '' }}  data-toggle="pill" href="{{ route('user.appoinment.view') }}" role="tab"
                aria-controls="pills-download" aria-selected="false"><i class="fas fa-cloud-download-alt"></i>
                My Appoinments</a>
        </li>
        <li>
            <a id="pills-download-tab" class="{{ request()->is('user/report/view') ? 'active' : '' }}  data-toggle="pill" href="{{ route('user.report.view') }}" role="tab"
                aria-controls="pills-download" aria-selected="false"><i class="fas fa-cloud-download-alt"></i>
                My Reports</a>
        </li>
        <li>
            <a id="pills-download-tab" class="{{ request()->is('user/chat*') ? 'active' : '' }}  data-toggle="pill" href="{{ route('patient.chat.index') }}" role="tab"
                aria-controls="pills-download" aria-selected="false"><i class="fas fa-cloud-download-alt"></i>
                Chat</a>
        </li>
        
        <li>
            <a class="link--icon-left" href="login.html"><i class="fas fa-sign-out-alt"></i>
                Logout</a>
        </li>
    </ul>
</div>
