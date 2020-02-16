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
    <li class="nav-item"><a href="#" ng-click="SubmittedReportsCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
    <li class="nav-item"><a href="#" ng-click="SubmittedReportsCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="SubmittedReportsCtrl.reportingyear" ng-change="SubmittedReportsCtrl.selectReportingYear(SubmittedReportsCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in SubmittedReportsCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
                document.getElementById('logout-form').submit();" ng-click="SubmittedReportsCtrl.routeTo('logout')"> 
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
    <li class="nav-item" ui-sref="facility_profile({reportingyear:SubmittedReportsCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:SubmittedReportsCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:SubmittedReportsCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:SubmittedReportsCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:SubmittedReportsCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:SubmittedReportsCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:SubmittedReportsCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
</nav>

<!-- Folating Submitted Report -->
<a href="submitted-reports.html" class="float" ui-sref="submitted-reports({reportingyear:SubmittedReportsCtrl.reportingyear})">
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
    <h1>Submitted Reports</h1>
    </div>

    <div class="section-body">
    <div id="cover-spin" ng-if="SubmittedReportsCtrl.is_loader_disabled"></div>
    <p class="section-lead">
        This function allow users to push Submitted Reports to the Department of Health (DOH) (trigger report as submitted)
    </p>         

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4></h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" ui-sref="submitted-reports-details({reportingyear:SubmittedReportsCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="SubmittedReportsCtrl.is_submit_disabled" ng-click="SubmittedReportsCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data </button>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-lg">
                <thead>
                    <tr>
                    <th class="align-middle">Health Facility Code long: <%SubmittedReportsCtrl.submitted_report.hfhudcode%></th>
                    <th class="align-middle">Reporting Status: <span class="badge badge-success"><%SubmittedReportsCtrl.submitted_report.reportingstatusdesc%></span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Reported By: <%SubmittedReportsCtrl.submitted_report.reportedby%></td>
                    <td>Designation: <%SubmittedReportsCtrl.submitted_report.designation%></td>
                    </tr>
                    <tr>
                    <td>Section: <%SubmittedReportsCtrl.submitted_report.section%></td>
                    <td>Department: <%SubmittedReportsCtrl.submitted_report.department%></td>
                    </tr>
                    <tr>
                    <td>Date Reported: <%SubmittedReportsCtrl.submitted_report.datereported%></td>
                    <td>Validated By: <%SubmittedReportsCtrl.submitted_report.validatedby%></td>
                    </tr>
                    <tr>
                    <td>Date Validated: <%SubmittedReportsCtrl.submitted_report.datevalidated%></td>
                    <td>Submission Mode: <%SubmittedReportsCtrl.submitted_report.submissionmode%></td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
      
</div>
 
 

<script type="text/ng-template" id="add-submitted-report-modal">


<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Submitted Reports </h5>
        <button type="button" class="close" ng-click="SubmittedReportsCtrl.close()" ui-sref="submitted-reports({reportingyear:SubmittedReportsCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- <div class="form-group row">
            <label class="col-sm-2 col-form-label">Health Facility Code long  </label>
            <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="" ng-model="SubmittedReportsCtrl.collection.hfhudcode">
            </div>
        </div> -->
        <div class="form-group row">
            <!-- <label class="col-sm-2 col-form-label">Reporting Year</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" placeholder="" ng-model="SubmittedReportsCtrl.collection.reportingyear">
            </div> -->
            <label class="col-sm-2 col-form-label">Reporting Status</label>
            <div class="col-sm-6">
                <div class="custom-control custom-radio custom-control-inline" ng-repeat="reportingstatus in SubmittedReportsCtrl.reportingstatus">
                    <input type="radio" id="reportingstatus<%reportingstatus.id%>" name="reportingstatus" class="custom-control-input" ng-value="reportingstatus.id" 
                    ng-init="SubmittedReportsCtrl.collection.reportingstatus=SubmittedReportsCtrl.collection.reportingstatus||1" ng-model="SubmittedReportsCtrl.collection.reportingstatus">
                    <label class="custom-control-label" for="reportingstatus<%reportingstatus.id%>"><%reportingstatus.name%></label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Reported By</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="" ng-model="SubmittedReportsCtrl.collection.reportedby">
            </div>
            <label class="col-sm-2 col-form-label">Designation</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="" ng-model="SubmittedReportsCtrl.collection.designation">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Section</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="" ng-model="SubmittedReportsCtrl.collection.section">
            </div>
            <label class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="" ng-model="SubmittedReportsCtrl.collection.department">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Date Reported</label>
            <div class="col-sm-2">
            <input type="text" class="form-control datetimepicker" ng-model="SubmittedReportsCtrl.collection.datereported">
            </div>
            <label class="col-sm-2 col-form-label">Validated By </label>
            <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="" ng-model="SubmittedReportsCtrl.collection.validatedby">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Date Validated </label>
            <div class="col-sm-2">
            <input type="text" class="form-control datetimepicker" ng-model="SubmittedReportsCtrl.collection.datevalidated">
            </div>
            <label class="col-sm-2 col-form-label">Submission Mode</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="" ng-model="SubmittedReportsCtrl.collection.submissionmode">
            </div>
        </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="SubmittedReportsCtrl.close()" ui-sref="submitted-reports({reportingyear:SubmittedReportsCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!SubmittedReportsCtrl.collection_copy" ng-click="SubmittedReportsCtrl.createSubmittedReportBtn(SubmittedReportsCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="SubmittedReportsCtrl.collection_copy" ng-click="SubmittedReportsCtrl.updateSubmittedReportBtn(SubmittedReportsCtrl.collection)">Update changes</button>
        </div>
</div>
</script>


