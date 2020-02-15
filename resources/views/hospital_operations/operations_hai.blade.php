            

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
<select class="form-control selectric" ng-model="operationsHAICtrl.reportingyear" ng-change="operationsHAICtrl.selectReportingYear(operationsHAICtrl.reportingyear)">
    <option value="<%reportingyear.year%>" ng-repeat="reportingyear in operationsHAICtrl.reportingyears"> Reporting Year <%reportingyear.year%></option>
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
<li class="nav-item" ui-sref="facility_profile({reportingyear:operationsHAICtrl.reportingyear})">
    <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
</li>
<li class="nav-item" ui-sref="general-info({reportingyear:operationsHAICtrl.reportingyear})">
    <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
</li>
<li class="nav-item active dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
    <ul class="dropdown-menu">
    <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:operationsHAICtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:operationsHAICtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:operationsHAICtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:operationsHAICtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:operationsHAICtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:operationsHAICtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:operationsHAICtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:operationsHAICtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:operationsHAICtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:operationsHAICtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
        <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:operationsHAICtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
        </ul>
    </li>
    <li class="nav-item active" ui-sref="hospital-operations-hai({reportingyear:operationsHAICtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:operationsHAICtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:operationsHAICtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
        </ul>
    </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:operationsHAICtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
</li>
<li class="nav-item" ui-sref="expenses({reportingyear:operationsHAICtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
</li>
<li class="nav-item" ui-sref="revenues({reportingyear:operationsHAICtrl.reportingyear})">
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
            <div class="breadcrumb-item">Healthcare Associated Infections (HAI)</div>
        </div>
        </div>

        <div class="section-body">

        <div id="cover-spin" ng-if="operationsHAICtrl.is_loader_disabled"></div>

        <p class="section-lead">
            HAI are infections that patients acquire as a result of healthcare interventions. For purposes of Licensing, the four(4) major HAI would suffice. 
            For All Hospitals
        </p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Healthcare Associated Infections (HAI)    </h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputhai" ui-sref="hospital-operations-hai-details({reportingyear:operationsHAICtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                    <button class="btn btn-icon icon-left btn-info" ng-disabled="operationsHAICtrl.is_submit_disabled" ng-click="operationsHAICtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data <%operationsHAICtrl.is_submit_disabled%> </button>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <thead>
                        <tr>
                        <th colspan="6">Calculation</th>
                        <th colspan="4">Formula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="9"><b>a. Device Related Infections</b></td>
                        </tr>
                            <tr align="center">
                            <td rowspan="2" class="align-middle">1</td>
                            <td rowspan="2" class="align-middle"><%operationsHAICtrl.hai.resultvap%></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td align="right"><%operationsHAICtrl.hai.patientnumvap%></td>
                            <td rowspan="2" class="align-middle">x1000</td>
                            <td rowspan="2" class="align-middle"><b>Ventilator Acquired Pneumonia (VAP)</b></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>Number of Patients with VAP</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                        </tr>
                        <tr align="center">
                            <td align="right"><%operationsHAICtrl.hai.totalventilatordays%></td>
                            <td>Total Number of Ventilator Days </td>
                        </tr>
                        <tr align="center">
                            <td rowspan="2" class="align-middle">2</td>
                            <td rowspan="2" class="align-middle"><%operationsHAICtrl.hai.resultbsi%></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td align="right"><%operationsHAICtrl.hai.patientnumbsi%></td>
                            <td rowspan="2" class="align-middle">x1000</td>
                            <td rowspan="2" class="align-middle"><b>Blood Stream Infection (BSI) </b></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>Number of Patients with BSI</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                        </tr>
                        <tr align="center">
                            <td align="right"><%operationsHAICtrl.hai.totalnumcentralline%></td>
                            <td>Total Number of Central Line</td>
                        </tr>
                        <tr align="center">
                            <td rowspan="2" class="align-middle">3</td>
                            <td rowspan="2" class="align-middle"><%operationsHAICtrl.hai.resultuti%></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td align="right"><%operationsHAICtrl.hai.patientnumuti%></td>
                            <td rowspan="2" class="align-middle">x1000</td>
                            <td rowspan="2" class="align-middle"><b>Urinary Tract Infection (UTI) </b></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>Number of Patients with UTI</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                        </tr>
                        <tr align="center">
                            <td align="right"><%operationsHAICtrl.hai.totalcatheterdays%></td>
                            <td>Total Number of Catheter Days </td>
                        </tr>

                        <tr>
                            <td colspan="9"><b>b. Non-Device Related Infections</b></td>
                        </tr>
                        <tr align="center">
                            <td rowspan="2" class="align-middle">4</td>
                            <td rowspan="2" class="align-middle"><%operationsHAICtrl.hai.resultssi%></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td align="right"><%operationsHAICtrl.hai.numssi%></td>
                            <td rowspan="2" class="align-middle">x100</td>
                            <td rowspan="2" class="align-middle"><b>Surgical Site Infections (SSI) </b></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>Number of Surgical Site Infections</td>
                            <td rowspan="2" class="align-middle">x100</td>
                        </tr>
                        <tr align="center">
                            <td align="right"><%operationsHAICtrl.hai.totalproceduresdone%></td>
                            <td>Total number of Procedures done </td>
                        </tr>

                    </tbody>
                    </table>
                </div>
                </div>
                <div class="card-footer bg-whitesmoke">
                Submission Status: <span class="badge badge-success">Success: <%operationsHAICtrl.hai.submitted_at%></span>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

</div>

<script type="text/ng-template" id="add-operation-hai-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Healthcare Associated Infections (HAI)</h5>
            <br><h6>HAI are infections that patients acquire as a result of healthcare interventions. For purposes of Licensing, the four(4) major HAI would suffice. For All Hospitals</h6>
        <button type="button" class="close" ng-click="operationsHAICtrl.close()" ui-sref="hospital-operations-hai({reportingyear:operationsHAICtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-md">
            <thead>
                <tr>
                <th colspan="6">Calculation</th>
                <th colspan="4">Formula</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td colspan="9"><b>a. Device Related Infections</b></td>
                </tr>
                <tr align="center">
                <td rowspan="2" class="align-middle">1</td>
                <td rowspan="2" class="align-middle"><input type="number" class="form-control" id="" disabled="" 
                ng-value="(operationsHAICtrl.collection.patientnumvap*1000)/operationsHAICtrl.collection.totalventilatordays">
                </td>
                <td rowspan="2" class="align-middle">=</td>
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.patientnumvap"></td>
                <td rowspan="2" class="align-middle">x1000</td>
                <td rowspan="2" class="align-middle"><b>Ventilator Acquired Pneumonia (VAP)</b></td>
                <td rowspan="2" class="align-middle">=</td>
                <td>Number of Patients with VAP</td>
                <td rowspan="2" class="align-middle">x1000</td>
                </tr>
                <tr align="center">
                <td><input type="number" class="form-control" ng-model="operationsHAICtrl.collection.totalventilatordays"></td>
                <td>Total Number of Ventilator Days </td>
                </tr>

                <tr align="center">
                <td rowspan="2" class="align-middle">2</td>
                <td rowspan="2" class="align-middle"><input type="number" class="form-control" id="" disabled="" 
                ng-value="(operationsHAICtrl.collection.patientnumbsi*1000)/operationsHAICtrl.collection.totalnumcentralline">
                </td>
                <td rowspan="2" class="align-middle">=</td>
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.patientnumbsi"></td>
                <td rowspan="2" class="align-middle">x1000</td>
                <td rowspan="2" class="align-middle"><b>Blood Stream Infection (BSI) </b></td>
                <td rowspan="2" class="align-middle">=</td>
                <td>Number of Patients with BSI</td>
                <td rowspan="2" class="align-middle">x1000</td>
                </tr>
                <tr align="center">
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.totalnumcentralline"></td>
                <td>Total Number of Central Line</td>
                </tr>

                <tr align="center">
                <td rowspan="2" class="align-middle">3</td>
                <td rowspan="2" class="align-middle"><input type="number" class="form-control" id="" disabled="" 
                ng-value="(operationsHAICtrl.collection.patientnumuti*1000)/operationsHAICtrl.collection.totalcatheterdays">
                </td>
                <td rowspan="2" class="align-middle">=</td>
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.patientnumuti"></td>
                <td rowspan="2" class="align-middle">x1000</td>
                <td rowspan="2" class="align-middle"><b>Urinary Tract Infection (UTI) </b></td>
                <td rowspan="2" class="align-middle">=</td>
                <td>Number of Patients with UTI</td>
                <td rowspan="2" class="align-middle">x1000</td>
                </tr>
                <tr align="center">
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.totalcatheterdays"></td>
                <td>Total Number of Catheter Days </td>
                </tr>

                <tr>
                <td colspan="9"><b>b. Non-Device Related Infections</b></td>
                </tr>
                <tr align="center">
                <td rowspan="2" class="align-middle">4</td>
                <td rowspan="2" class="align-middle"><input type="number" class="form-control" id="" disabled="" 
                ng-value="(operationsHAICtrl.collection.numssi*100)/operationsHAICtrl.collection.totalproceduresdone">
                </td>
                <td rowspan="2" class="align-middle">=</td>
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.numssi"></td>
                <td rowspan="2" class="align-middle">x100</td>
                <td rowspan="2" class="align-middle"><b>Surgical Site Infections (SSI) </b></td>
                <td rowspan="2" class="align-middle">=</td>
                <td>Number of Surgical Site Infections</td>
                <td rowspan="2" class="align-middle">x100</td>
                </tr>
                <tr align="center">
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.totalproceduresdone"></td>
                <td>Total number of Procedures done </td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsHAICtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:operationsHAICtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!operationsHAICtrl.collection_copy" ng-click="operationsHAICtrl.createOperationsHAIBtn(operationsHAICtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="operationsHAICtrl.collection_copy" ng-click="operationsHAICtrl.updateOperationsHAIBtn(operationsHAICtrl.collection)">Update changes</button>
        </div>
    </div>

</script>