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
    <li class="nav-item"><a href="#" ui-sref="nda({reportingyear:summaryOfPatientsCtrl.reportingyear})" class="nav-link">NDA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="summaryOfPatientsCtrl.reportingyear" ng-change="summaryOfPatientsCtrl.selectReportingYear(summaryOfPatientsCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in summaryOfPatientsCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
            document.getElementById('logout-form').submit();"> 
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
    <li class="nav-item" ui-sref="facility_profile({reportingyear:summaryOfPatientsCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:summaryOfPatientsCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item active dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item active" ui-sref="hospital-operations-summary-of-patients({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:summaryOfPatientsCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:summaryOfPatientsCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:summaryOfPatientsCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:summaryOfPatientsCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:summaryOfPatientsCtrl.reportingyear})">
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
        <div class="breadcrumb-item">Summary of Patients in the Hospital</div>
    </div>
    </div>

    <div class="section-body">
    <div id="cover-spin" ng-if="summaryOfPatientsCtrl.is_loader_disabled"></div>
    <!-- <h2 class="section-title">Cards</h2>
    <p class="section-lead">
        Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
    </p> -->

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Summary of Patients in the Hospital  </h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputpatients" ui-sref="hospital-operations-summary-of-patients-details({reportingyear:summaryOfPatientsCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="summaryOfPatientsCtrl.is_submit_disabled" ng-click="summaryOfPatientsCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data <div id="cover-spin" ng-if="summaryOfPatientsCtrl.is_loader_disabled"></div></button>
                <!-- <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="summaryOfPatientsCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a> -->
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                    <th colspan="2">Inpatient Care  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalinpatients%></td>
                    <td>Total number of inpatients  </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalnewborn%></td>
                    <td>Total Newborn (In facility deliveries)  </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totaldischarges%></td>
                    <td>Total Discharges (Alive)  </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalpad%></td>
                    <td>Total patients admitted and discharged on the same day   </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalibd%></td>
                    <td>Total number of inpatient bed days (service days) </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalinpatienttransto%></td>
                    <td>Total number of inpatients transferred TO THIS FACILITY from another facility for inpatient care    </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalinpatienttransfrom%></td>
                    <td>Total number of inpatients transferred FROM THIS FACILITY to another facility for inpatient care    </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalpatientsremaining%></td>
                    <td>Total number of patients remaining in the hospital as of midnight last day of previous year  </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-success">Success: <%summaryOfPatientsCtrl.summary_of_patient.submitted_at%></span>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>



<script type="text/ng-template" id="add-summary-of-patient-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Summary of Patients in the Hospital</h5>
        <button type="button" class="close" ng-click="summaryOfPatientsCtrl.close()" ui-sref="hospital-operations-summary-of-patients({reportingyear:summaryOfPatientsCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
    <div class="form-group row">
        <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalinpatients">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of inpatients*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalnewborn">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total Newborn (In facility deliveries)*   </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totaldischarges">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total Discharges (Alive)*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalpad">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total patients admitted and discharged on the same day*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalibd">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of inpatient bed days (service days)* </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalinpatienttransto">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of inpatients transferred TO THIS FACILITY from another facility for inpatient care*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalinpatienttransfrom">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of inpatients transferred FROM THIS FACILITY to another facility for inpatient care*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalpatientsremaining">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of patients remaining in the hospital as of midnight last day of previous year* </label>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="summaryOfPatientsCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:summaryOfPatientsCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!summaryOfPatientsCtrl.collection_copy" ng-click="summaryOfPatientsCtrl.createSummaryOfPatientBtn(summaryOfPatientsCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="summaryOfPatientsCtrl.collection_copy" ng-click="summaryOfPatientsCtrl.updateSummaryOfPatientBtn(summaryOfPatientsCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>