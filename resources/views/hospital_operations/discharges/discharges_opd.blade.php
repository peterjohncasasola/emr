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
<li class="nav-item"><a href="#" ng-click="dischargesOPDCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
<li class="nav-item"><a href="#" ng-click="dischargesOPDCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
</ul>
</div>

<form class="form-inline ml-auto">
<select class="form-control selectric" ng-model="dischargesOPDCtrl.reportingyear" ng-change="dischargesOPDCtrl.selectReportingYear(dischargesOPDCtrl.reportingyear)">
    <option value="<%reportingyear.year%>" ng-repeat="reportingyear in dischargesOPDCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
            document.getElementById('logout-form').submit();" ng-click="dischargesOPDCtrl.routeTo('logout')"> 
            <i class="fas fa-sign-out-alt"></i>Sign out
        </a>
</div>
</li>
</ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
<div class="container">
<ul class="navbar-nav">
<li class="nav-item" ui-sref="dashboard({reportingyear:dischargesOPDCtrl.reportingyear})">
    <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
</li>
<li class="nav-item" ui-sref="facility_profile({reportingyear:dischargesOPDCtrl.reportingyear})">
    <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
</li>
<li class="nav-item" ui-sref="general-info({reportingyear:dischargesOPDCtrl.reportingyear})">
    <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
</li>
<li class="nav-item active dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
    <ul class="dropdown-menu">
    <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesOPDCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
        <li class="nav-item active" ui-sref="hospital-operations-discharges-opd({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
        <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
        </ul>
    </li>
    <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:dischargesOPDCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
        </ul>
    </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:dischargesOPDCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
</li>
<li class="nav-item" ui-sref="expenses({reportingyear:dischargesOPDCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
</li>
<li class="nav-item" ui-sref="revenues({reportingyear:dischargesOPDCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
</li>
</ul>
</div>
</nav>

<!-- Folating Submitted Report -->
<a href="submitted-reports.html" class="float" ui-sref="submitted-reports({reportingyear:dischargesOPDCtrl.reportingyear})">
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
    <h1>Hospital Operations </h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Surgical Operations</div>
        <div class="breadcrumb-item active">10 Leading OPD Consultations</div>
    </div>
    </div>

    <div class="section-body">
    <div id="cover-spin" ng-if="dischargesOPDCtrl.is_loader_disabled"></div>
    <p class="section-lead">
        (If no available data for this module: In the first row, search for "Not Applicable" then put Number zero (0) and Save)
    </p>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Ten Leading OPD Consultations</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" ng-click="dischargesOPDCtrl.createDischargeOPDBtn(dischargesOPDCtrl.ricd10_details)"><i class="far fa-plus-square"></i> Add</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesOPDCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2">
                Code:
                    <input type="text" class="form-control" readonly="" placeholder="" ng-model="dischargesOPDCtrl.ricd10_details.icd10code">
                </div>
                <div class="col-sm-2">
                Category:
                    <input type="text" class="form-control" readonly="" placeholder="" ng-model="dischargesOPDCtrl.ricd10_details.icd10cat">
                </div>
                <div class="col-sm-6">
                    <textarea class="form-control" 
                    ng-model="dischargesOPDCtrl.ricd10_details.icd10desc" 
                    ng-click="dischargesOPDCtrl.selectIcdType()" 
                    data-target="#input10er" readonly="" placeholder="Select ER Consultations"></textarea>
                </div>
                <div class="col-sm-2">
                Number:
                    <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesOPDCtrl.ricd10_details.number">
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                    <th width="4%">Rank</th>
                    <th width="70%">Ten Leading OPD Consultations</th>
                    <th width="8%">Number</th>
                    <th width="12%">ICD-10 Code</th>
                    <th width="12%">ICD-10 Category</th>
                    <th width="6%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="discharges_opd in dischargesOPDCtrl.discharges_opd">
                        <td><% $index+1 %></td>
                        <td><%discharges_opd.erconsultations%></td>
                        <td><%discharges_opd.number%></td>
                        <td><%discharges_opd.icd10code%></td>
                        <td><%discharges_opd.icd10category%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesOPDCtrl.deleteDischargeOPDBtn(discharges_opd.id)"></a></td>
                    </tr>
                </tbody>
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

</div>
 
<script type="text/ng-template" id="add-discharges-er-modal">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">ICD-10 | PHILIPPINE MODIFICATION</h5>
    <button type="button" class="close" ng-click="dischargesOPDCtrl.close()" ui-sref="hospital-operations-discharges-opd({reportingyear:dischargesOPDCtrl.reportingyear})">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="table-responsive">
    <table datatable="" dt-options="dischargesOPDCtrl.dtOptions" dt-columns="dischargesOPDCtrl.dtColumns" class="table table-bordered table-hover table-md" ></table>
    </div>
</div>

</script>