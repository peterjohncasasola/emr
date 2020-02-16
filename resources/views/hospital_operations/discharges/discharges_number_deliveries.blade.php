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
    <li class="nav-item"><a href="#" ng-click="dischargesNumberDeliveriesCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
    <li class="nav-item"><a href="#" ng-click="dischargesNumberDeliveriesCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="dischargesNumberDeliveriesCtrl.reportingyear" ng-change="dischargesNumberDeliveriesCtrl.selectReportingYear(dischargesNumberDeliveriesCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in dischargesNumberDeliveriesCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
            document.getElementById('logout-form').submit();" ng-click="dischargesNumberDeliveriesCtrl.routeTo('logout')"> 
            <i class="fas fa-sign-out-alt"></i>Sign out
        </a>
    </div>
    </li>
</ul>
</nav>


<nav class="navbar navbar-secondary navbar-expand-lg">
<div class="container">
    <ul class="navbar-nav">
    <!-- <li class="nav-item">
        <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
    </li> -->
    <li class="nav-item" ui-sref="facility_profile({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item active dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item active" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
</nav>

<!-- Folating Submitted Report -->
<a href="submitted-reports.html" class="float" ui-sref="submitted-reports({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})">
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
    <h1>Hospital Operations</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Hospital Operations</div>
        <div class="breadcrumb-item active">Total Number of Deliveries</div>
    </div>
    </div>

    <div class="section-body">
    <div id="cover-spin" ng-if="dischargesNumberDeliveriesCtrl.is_loader_disabled"></div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Total Number of Deliveries</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputdischarges_c" ui-sref="hospital-operations-discharges-number-deliveries-details({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})"> <i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesNumberDeliveriesCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                    <th colspan="2">Deliveries  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td align="right"><%dischargesNumberDeliveriesCtrl.number_delivery.totalifdelivery%></td>
                    <td>Total number of in-facility deliveries  </td>
                    </tr>
                    <tr>
                    <td align="right"><%dischargesNumberDeliveriesCtrl.number_delivery.totallbvdelivery%></td>
                    <td>Total number of live-birth vaginal deliveries (normal)  </td>
                    </tr>
                    <tr>
                    <td align="right"><%dischargesNumberDeliveriesCtrl.number_delivery.totallbcdelivery%></td>
                    <td>Total number of live-birth C-section deliveries (Caesarians)  </td>
                    </tr>
                    <tr>
                    <td align="right"><%dischargesNumberDeliveriesCtrl.number_delivery.totalotherdelivery%></td>
                    <td>Total number of other deliveries  </td>
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


<script type="text/ng-template" id="add-discharges-number-delivery-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Total Number of Deliveries</h5>
        <button type="button" class="close" ng-click="dischargesNumberDeliveriesCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesNumberDeliveriesCtrl.collection.totalifdelivery">
            </div>
            <label for="" class="col-sm-8 col-form-label">Total number of in-facility deliveries  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesNumberDeliveriesCtrl.collection.totallbvdelivery">
            </div>
            <label for="" class="col-sm-8 col-form-label">Total number of live-birth vaginal deliveries (normal)  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesNumberDeliveriesCtrl.collection.totallbcdelivery">
            </div>
            <label for="" class="col-sm-8 col-form-label">Total number of live-birth C-section deliveries (Caesarians)  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesNumberDeliveriesCtrl.collection.totalotherdelivery">
            </div>
            <label for="" class="col-sm-8 col-form-label">Total number of other deliveries  </label>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesNumberDeliveriesCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesNumberDeliveriesCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesNumberDeliveriesCtrl.collection_copy" ng-click="dischargesNumberDeliveriesCtrl.createDischargeNumberDeliveryBtn(dischargesNumberDeliveriesCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesNumberDeliveriesCtrl.collection_copy" ng-click="dischargesNumberDeliveriesCtrl.updateDischargeNumberDeliveryBtn(dischargesNumberDeliveriesCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>