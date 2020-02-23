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
    <li class="nav-item"><a href="#" ng-click="DashboardCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
    <li class="nav-item"><a href="#" ng-click="DashboardCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="DashboardCtrl.reportingyear" ng-change="DashboardCtrl.selectReportingYear(DashboardCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in DashboardCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
                document.getElementById('logout-form').submit();" ng-click="DashboardCtrl.routeTo('logout')"> 
                <i class="fas fa-sign-out-alt"></i>Sign out
            </a>
    </div>
    </li>
</ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
<div class="container">
    <ul class="navbar-nav">
    <li class="nav-item active" ui-sref="dashboard({reportingyear:DashboardCtrl.reportingyear})">
        <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
    </li>
    <li class="nav-item" ui-sref="facility_profile({reportingyear:DashboardCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:DashboardCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:DashboardCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:DashboardCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:DashboardCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:DashboardCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:DashboardCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:DashboardCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:DashboardCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:DashboardCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:DashboardCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:DashboardCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:DashboardCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:DashboardCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:DashboardCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:DashboardCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:DashboardCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:DashboardCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:DashboardCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
</nav>

<!-- Folating Submitted Report -->
<a href="submitted-reports.html" class="float" ui-sref="submitted-reports({reportingyear:DashboardCtrl.reportingyear})">
<i class="fa fa-paper-plane my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Submitted Reports</div>
<i class="fa fa-play label-arrow"></i>
</div>
<!-- End Floating Submitted Report -->    

<!-- Main Content -->
<div class="main-content">
<section class="section">

    <div class="section-header">
    <h1>Welcome back, Administrator!</h1>
    <div class="section-header-breadcrumb">
        <!-- <div class="breadcrumb-item active"><a href="#">Today is January 21, 2020</a></div> -->
    </div>
    </div>
    
    <!-- <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
        <div class="card-stats">
            <div class="card-stats-title">Patient Statistics                    
            </div>
            <div class="card-stats-items">
            <div class="card-stats-item">
                <div class="card-stats-item-count">24</div>
                <div class="card-stats-item-label">Newborn</div>
            </div>
            <div class="card-stats-item">
                <div class="card-stats-item-count">12</div>
                <div class="card-stats-item-label">Discharges</div>
            </div>
            <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Transfered</div>
            </div>
            </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Total Number of Inpatients</h4>
            </div>
            <div class="card-body">
            12,345
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
        <div class="card-chart">
            <canvas id="balance-chart" height="80"></canvas>
        </div>
        <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-cog"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Expenses</h4>
            </div>
            <div class="card-body">
            ₱123,456,789.10
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
        <div class="card-chart">
            <canvas id="sales-chart" height="80"></canvas>
        </div>
        <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Revenues</h4>
            </div>
            <div class="card-body">
            ₱123,456,789.10
            </div>
        </div>
        </div>
    </div>
    </div> -->

    <div class="row">
    <div class="col-lg-7">
        <div class="card">
        <div class="card-header">
            <h4>Expenses vs Revenues</h4>
        </div>
        <div class="card-body">
        <canvas id="line" class="chart chart-line" chart-data="DashboardCtrl.data"
            chart-labels="DashboardCtrl.labels" chart-series="DashboardCtrl.series" chart-options="DashboardCtrl.options"
            chart-dataset-override="DashboardCtrl.datasetOverride" chart-click="DashboardCtrl.onClick" chart-colors ="vm.colors">
        </canvas>
        </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
        <div class="card-header">
            <h4>Report Progress</h4>
        </div>
        <div class="card-body">

            <div class="mb-4" ng-repeat="progress in DashboardCtrl.progress">
                <div class="text-small float-right font-weight-bold text-muted"><%progress.value%>%</div>
                <div class="font-weight-bold mb-1"><%progress.desc%></div>
                <div class="progress" data-height="3">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<%progress.percentage%>" aria-valuemin="0" aria-valuemax="<%progress.percentage%>" style="width: <%progress.percentage%>%; background-color: rgb(52, 125, 241);"></div>
                </div>                          
            </div>

            <div class="mb-4">
                <div class="text-small float-right font-weight-bold text-muted"><%DashboardCtrl.progress_total%>%</div>
                <div class="font-weight-bold mb-1">Total Progress</div>
                <div class="progress" data-height="3">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<%DashboardCtrl.progress_total%>" aria-valuemin="0" aria-valuemax="<%DashboardCtrl.progress_total%>" style="width: <%DashboardCtrl.progress_total%>%; background-color: rgb(52, 125, 241);"></div>
                </div>                          
            </div>

            
        </div>
        </div>
    </div>
    </div>

</section>
</div>



 



