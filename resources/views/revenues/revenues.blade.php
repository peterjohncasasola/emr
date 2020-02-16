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
    <li class="nav-item"><a href="#" ng-click="revenuesCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
    <li class="nav-item"><a href="#" ng-click="revenuesCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
    </ul>
</div>

<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="revenuesCtrl.reportingyear" ng-change="revenuesCtrl.selectReportingYear(revenuesCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in revenuesCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
            document.getElementById('logout-form').submit();" ng-click="revenuesCtrl.routeTo('logout')">
            <i class="fas fa-sign-out-alt"></i>Sign out
        </a>
    </div>
    </li>
</ul>
</nav>

<!-- Folating Submitted Report -->
<a href="submitted-reports.html" class="float" ui-sref="submitted-reports({reportingyear:revenuesCtrl.reportingyear})">
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
    <li class="nav-item" ui-sref="facility_profile({reportingyear:revenuesCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:revenuesCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:revenuesCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:revenuesCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:revenuesCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:revenuesCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:revenuesCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:revenuesCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:revenuesCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:revenuesCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:revenuesCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:revenuesCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:revenuesCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:revenuesCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:revenuesCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:revenuesCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:revenuesCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:revenuesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item active" ui-sref="revenues({reportingyear:revenuesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
</nav>


<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Revenues  </h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Revenues  </div>
    </div>
    </div>

    <div class="section-body">

    <div id="cover-spin" ng-if="revenuesCtrl.is_loader_disabled"></div>
    <!-- <h2 class="section-title">Cards</h2>
    <p class="section-lead">
        Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
    </p> -->

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4> </h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputhospital" ui-sref="revenues-details({reportingyear:revenuesCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="revenuesCtrl.is_submit_disabled" ng-click="revenuesCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data <div id="cover-spin" ng-if="revenuesCtrl.is_loader_disabled"></div></button>
                <!-- <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="revenuesCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a> -->
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                    <th>Revenues  </th>
                    <th>Amount in Peso (Php)  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Total amount of money received from the Department of Health  </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromdoh | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from the local government  </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromlgu | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from donor agencies (for example JICA, USAID, and others)  </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromdonor | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from private organizations (donations from businesses, NGOs, etc.) </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromprivateorg | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from Phil Health </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromphilhealth | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from direct patient/out-of-pocket charges/fees </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfrompatient | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from reimbursement from private insurance/HMOs </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromreimbursement | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from other sources (PAGCOR, PCSO, etc.)  </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromothersources | number:2%></td>
                    </tr>
                </tbody>
                <tfoot class="text-bold">
                    <tr>
                    <td>GRAND TOTAL </td>
                    <td align="right"><%revenuesCtrl.revenue.grandtotal | number:2%></td>
                    </tr>
                </tfoot>  
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-success">Success: <%revenuesCtrl.revenue.submitted_at%></span>
            </div>
        </div>
        </div>

    </div>
    </div>
</section>

<script type="text/ng-template" id="add-revenue-modal">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title">Revenues</h5>
    <button type="button" class="close" ng-click="revenuesCtrl.close()" ui-sref="revenues({reportingyear:revenuesCtrl.reportingyear})">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromdoh">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from the Department of Health  </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromlgu">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from the local government  </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromdonor">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from donor agencies (for example JICA, USAID, and others)  </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromprivateorg">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from private organizations (donations from businesses, NGOs, etc.)</label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromphilhealth">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from Phil Health</label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfrompatient">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from direct patient/out-of-pocket charges/fees </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromreimbursement">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from reimbursement from private insurance/HMOs </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromothersources">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from other sources (PAGCOR, PCSO, etc.)  </label>
    </div>
    <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" disabled="" ng-value="revenuesCtrl.collection.amountfromdoh+
                revenuesCtrl.collection.amountfromlgu+
                revenuesCtrl.collection.amountfromdonor+
                revenuesCtrl.collection.amountfromprivateorg+
                revenuesCtrl.collection.amountfromphilhealth+
                revenuesCtrl.collection.amountfrompatient+
                revenuesCtrl.collection.amountfromreimbursement+
                revenuesCtrl.collection.amountfromothersources">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>GRAND TOTAL</b></label>
        </div>
    </div>
    <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="revenuesCtrl.close()" ui-sref="revenues({reportingyear:revenuesCtrl.reportingyear})">Close</button>
        <button type="button" class="btn btn-primary" ng-if="!revenuesCtrl.collection_copy" ng-click="revenuesCtrl.createRevenueBtn(revenuesCtrl.collection)">Save changes</button>
        <button type="button" class="btn btn-primary" ng-if="revenuesCtrl.collection_copy" ng-click="revenuesCtrl.updateRevenueBtn(revenuesCtrl.collection)">Update changes</button>
    </div>
</div>
</script>