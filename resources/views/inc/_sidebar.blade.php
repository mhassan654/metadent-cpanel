<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <div class="brand-logo">
                        @if(!empty(get_setting('app_logo')))
                            <img src="{{asset('app-assets/images/logo/'.get_setting('app_logo'))}}" class="user-profile-image rounded img-thumbnail"
                                 alt="user profile image" height="140" width="140">
                        @else
                            <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" class="user-profile-image rounded img-thumbnail"
                                 alt="user profile image" height="140" width="140">
                        @endif

                    </div>
                    <h2 class="brand-text mb-0">{{get_setting('app_name')}}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class=" nav-item"><a href="../../../html/ltr/vertical-menu-template-semi-dark/index.html"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span><span class="badge badge-light-danger badge-pill badge-round float-right mr-50 ml-auto">2</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span></a>
                    </li>

                </ul>
            </li>
            <li class=" navigation-header text-truncate"><span data-i18n="Apps">Apps</span>
            </li>


            <li class=" nav-item"><a href="#"><i class="menu-livicon" data-icon="notebook"></i><span class="menu-title text-truncate" data-i18n="Invoice">Billing</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('subscriptionPlan.index')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Invoice List">Subscription Plans</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Invoice">Invoice</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-invoice-edit.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Invoice Edit">Invoice Edit</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-invoice-add.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Invoice Add">Invoice Add</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="menu-livicon" data-icon="save"></i><span class="menu-title text-truncate" data-i18n="File Manager">Staffs</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="menu-livicon" data-icon="users"></i><span class="menu-title text-truncate" data-i18n="User">Staffs</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-users-list.html"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="List">All Staffs</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('role.list')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="View">Staff permissions</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('permission.create')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Edit">Permissions</span></a>
                    </li>
                </ul>
            </li>

{{--            <li class=" nav-item"><a href="#"><i class="menu-livicon" data-icon="save"></i><span class="menu-title text-truncate" data-i18n="File Manager">Facilities</span></a>--}}
            </li>
            <li class=" nav-item"><a href="#"><i class="menu-livicon" data-icon="users"></i><span class="menu-title text-truncate" data-i18n="User">Facilities</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('facility.index')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="List">All Facilities</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header text-truncate"><span data-i18n="UI Elements">Configurations</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="menu-livicon" data-icon="retweet"></i><span class="menu-title text-truncate" data-i18n="Content">Setup & Configurations</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('general.settings')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Grid">General Settings</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('features.index')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Grid">Features Activations</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Grid">Languages</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Grid">Currency</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('smtp.index')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Grid">SMTP</span></a>
                    </li>

                    <li><a class="d-flex align-items-center" href="{{route('paymentMethods.index')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Grid">Payment Methods</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="{{route('system.logs')}}"><i class="menu-livicon" data-icon="envelope-pull"></i><span class="menu-title text-truncate" data-i18n="Email">System Logs</span></a>
            </li>

        </ul>
    </div>
</div>
