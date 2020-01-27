<nav class="navbar navbar-expand-lg main-navbar">
    <a href="index.html" class="navbar-brand sidebar-gone-hide">Online Health Facility Statistical Report System</a>
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
        <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
        <li class="nav-item"><a href="#" class="nav-link">Reports</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Forms</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        </ul>
    </div>
    
    <form class="form-inline ml-auto">
        <select class="form-control selectric">
        <option>Reporting Year 2019</option>
        <option>Option 2</option>
        <option>Option 3</option>
        <option>Option 4</option>
        <option>Option 5</option>
        <option>Option 6</option>
        </select>
    </form>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, Administrator</div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
            </a>
            <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Change Passord
            </a>
            <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="auth-login.html" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        </li>
    </ul>
    </nav>

    <nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item" ui-sref="facility_profile({reporting_year:2019})">
            <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
        </li>
        <li class="nav-item" ui-sref="general_info({reporting_year:2019})">
            <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
        </li>

        <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="hospital-operations.html" class="nav-link">Summary of Patients in the Hospital</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Discharges</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Deaths</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)  </a></li>
            <li class="nav-item"><a href="#" class="nav-link">Surgical Operations  </a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
        </li>
        <li class="nav-item active" ui-sref="expenses({reporting_year:2019})">
            <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
        </li>
        <li class="nav-item" ui-sref="revenues({reporting_year:2019})">
            <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
        </li>
        </ul>
    </div>
    </nav>