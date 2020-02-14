   
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
<select class="form-control selectric" ng-model="dischargesEVCtrl.reportingyear" ng-change="dischargesEVCtrl.selectReportingYear(dischargesEVCtrl.reportingyear)">
    <option value="<%reportingyear.year%>" ng-repeat="reportingyear in dischargesEVCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
<!-- <li class="nav-item">
    <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
</li> -->
<li class="nav-item" ui-sref="facility_profile({reportingyear:dischargesEVCtrl.reportingyear})">
    <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
</li>
<li class="nav-item" ui-sref="general-info({reportingyear:dischargesEVCtrl.reportingyear})">
    <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
</li>
<li class="nav-item active dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
    <ul class="dropdown-menu">
    <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:dischargesEVCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:dischargesEVCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesEVCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesEVCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:dischargesEVCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:dischargesEVCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:dischargesEVCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:dischargesEVCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
        <li class="nav-item active" ui-sref="hospital-operations-discharges-ev({reportingyear:dischargesEVCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:dischargesEVCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
        <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:dischargesEVCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
        </ul>
    </li>
    <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:dischargesEVCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:dischargesEVCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:dischargesEVCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
        </ul>
    </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:dischargesEVCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
</li>
<li class="nav-item" ui-sref="expenses({reportingyear:dischargesEVCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
</li>
<li class="nav-item" ui-sref="revenues({reportingyear:dischargesEVCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
</li>
</ul>
</div>
</nav>
    

   <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Hospital Operations</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Hospital Operations</div>
            <div class="breadcrumb-item active">Emergency Visits</div>
        </div>
        </div>

        <div class="section-body">

        <div id="cover-spin" ng-if="dischargesEVCtrl.is_loader_disabled"></div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Emergency Visits</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" ui-sref="hospital-operations-discharges-ev-details({reportingyear:dischargesEVCtrl.reportingyear})"><i class="far fa-plus-square"></i> Add</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesEVCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                        <th class="align-middle" width="15%"> Number </th>
                        <th width="85%">Emergency visits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td align="right"><%dischargesEVCtrl.ev.emergencyvisits%></td>
                        <td>Total number of emergency department visits  </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesEVCtrl.ev.emergencyvisitsadult%></td>
                        <td>Total number of emergency department visits, adult  </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesEVCtrl.ev.emergencyvisitspediatric%></td>
                        <td>Total number of emergency department visits, pediatric  </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesEVCtrl.ev.evfromfacilitytoanother%></td>
                        <td>Total number of patients transported <b>FROM THIS FACILITY'S EMERGENCY DEPARTMENT</b> to another facility for inpatient care </td>
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

    <script type="text/ng-template" id="add-discharges-ev-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Emergency Visits</h5>
        <button type="button" class="close" ng-click="dischargesEVCtrl.close()" ui-sref="hospital-operations-discharges-ev({reportingyear:dischargesEVCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <div class="table-responsive">
                    <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                        <th class="align-middle" width="20%"> Number </th>
                        <th width="80%">Emergency visits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><input type="number" class="form-control" id="" ng-model="dischargesEVCtrl.collection.emergencyvisits"></td>
                        <td>Total number of emergency department visits  </td>
                        </tr>
                        <tr>
                        <td><input type="number" class="form-control" id="" ng-model="dischargesEVCtrl.collection.emergencyvisitsadult"></td>
                        <td>Total number of emergency department visits, adult  </td>
                        </tr>
                        <tr>
                        <td><input type="number" class="form-control" id="" ng-model="dischargesEVCtrl.collection.emergencyvisitspediatric"></td>
                        <td>Total number of emergency department visits, pediatric  </td>
                        </tr>
                        <tr>
                        <td><input type="number" class="form-control" id="" ng-model="dischargesEVCtrl.collection.evfromfacilitytoanother"></td>
                        <td>Total number of patients transported <b>FROM THIS FACILITY'S EMERGENCY DEPARTMENT</b> to another facility for inpatient care </td>
                        </tr>

                    </tbody>
                    </table>
                

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesEVCtrl.close()" ui-sref="hospital-operations-discharges-ev({reportingyear:dischargesEVCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesEVCtrl.collection_copy" ng-click="dischargesEVCtrl.createDischargeEVBtn(dischargesEVCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesEVCtrl.collection_copy" ng-click="dischargesEVCtrl.updateDischargeEVBtn(dischargesEVCtrl.collection)">Update changes</button>
        </div>

        </div>
    </div>

</script>