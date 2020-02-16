    
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
        <li class="nav-item"><a href="#" ng-click="expensesCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
        <li class="nav-item"><a href="#" ng-click="expensesCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="expensesCtrl.reportingyear" ng-change="expensesCtrl.selectReportingYear(expensesCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in expensesCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
    </select>
</form>

<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    @if(Config::get('defaults.default.is_local')==1)
        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
    @else
        <img alt="image" src="public/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
    @endif
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
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
            </form>
            <a class="dropdown-item has-icon text-danger" href="" 
                onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();" ng-click="expensesCtrl.routeTo('logout')"> 
                <i class="fas fa-sign-out-alt"></i>Sign out
            </a>
    </div>
    </li>
</ul>
</nav>

<!-- Folating Submitted Report -->
<a href="submitted-reports.html" class="float" ui-sref="submitted-reports({reportingyear:expensesCtrl.reportingyear})">
<i class="fa fa-paper-plane my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Submitted Reports</div>
<i class="fa fa-play label-arrow"></i>
</div>
<!-- End Floating Submitted Report -->    

<nav class="navbar navbar-secondary navbar-expand-lg">
<div class="container">
    <ul class="navbar-nav">
    <!-- <li class="nav-item">
        <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
    </li> -->
    <li class="nav-item active" ui-sref="facility_profile({reportingyear:expensesCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:expensesCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:expensesCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:expensesCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:expensesCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:expensesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:expensesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
</nav>    
    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Facility Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Facility Profile</div>
        </div>
        </div>

        <div class="section-body">
        <!-- <h2 class="section-title">Cards</h2>
        <p class="section-lead">
            Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
        </p> -->

        <div class="row">
            <div class="col-12 col-md-7 col-lg-7">
            <div class="card card-primary">
                <div class="card-header">
                <h4></h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputhospital"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <tr>
                        <td>Name of Hospital</td>
                        <td>Providers Multi-Purpose Cooperative Medical Center</td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td>II</td>
                    </tr>
                    <tr>
                        <td>Province</td>
                        <td>Cagayan</td>
                    </tr>
                    <tr>
                        <td>City/Municipality </td>
                        <td>Tuguegarao City</td>
                    </tr>
                    <tr>
                        <td>Barangay</td>
                        <td>Ugac Norte</td>
                    </tr>
                    <tr>
                        <td>Street Address  </td>
                        <td>Reyes Street</td>
                    </tr>
                    <tr>
                        <td>Contact Number  </td>
                        <td>09123456789</td>
                    </tr>
                    <tr>
                        <td>Mobile Number </td>
                        <td>09123456789</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>email@gmail.com</td>
                    </tr>
                    </table>
                </div>
                </div>
                <div class="card-footer bg-whitesmoke">
                Submission Status: <span class="badge badge-success">Success: Jan 20, 2020 07:07</span>
                </div>
            </div>
            </div>

            <div class="col-12 col-md-5 col-lg-5">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Medical Director/ <br> Head of Facility</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputdirector"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <tr>
                        <td>Last Name</td>
                        <td>Caparas</td>
                    </tr>
                    <tr>
                        <td>First Name  </td>
                        <td>Michael Johnson</td>
                    </tr>
                    <tr>
                        <td>Middle Name  </td>
                        <td>Padilla</td>
                    </tr>
                    </table>
                </div>
                </div>
                <div class="card-footer bg-whitesmoke">
                Submission Status: <span class="badge badge-success">Success: Jan 20, 2020 07:07</span>
                </div>
            </div>
            </div>

        </div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="inputhospital">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Facility Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="inputAddress">Name of Hospital</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Region </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Province</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">City/Municipality </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Barangay </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Street Address</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputEmail4">Contact Number  </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-3">
                <label for="inputPassword4">Mobile Number </label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="">
                </div>
                <div class="form-group col-md-5">
                <label for="inputEmail4">Email  </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="">
                </div>
            </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="inputdirector">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Medical Director/<br>Head of Facility</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="inputAddress">Last Name </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">First Name </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Middle Name </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    </div>