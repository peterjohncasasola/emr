

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
<li class="nav-item"><a href="#" ui-sref="nda({reportingyear:dischargesTestingCtrl.reportingyear})" class="nav-link">NDA</a></li>
</ul>
</div>

<form class="form-inline ml-auto">
<select class="form-control selectric" ng-model="dischargesTestingCtrl.reportingyear" ng-change="dischargesTestingCtrl.selectReportingYear(dischargesTestingCtrl.reportingyear)">
    <option value="<%reportingyear.year%>" ng-repeat="reportingyear in dischargesTestingCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
<li class="nav-item" ui-sref="facility_profile({reportingyear:dischargesTestingCtrl.reportingyear})">
    <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
</li>
<li class="nav-item" ui-sref="general-info({reportingyear:dischargesTestingCtrl.reportingyear})">
    <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
</li>
<li class="nav-item active dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
    <ul class="dropdown-menu">
    <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesTestingCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
        <li class="nav-item active" ui-sref="hospital-operations-discharges-testing({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
        <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
        </ul>
    </li>
    <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:dischargesTestingCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
        </ul>
    </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:dischargesTestingCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
</li>
<li class="nav-item" ui-sref="expenses({reportingyear:dischargesTestingCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
</li>
<li class="nav-item" ui-sref="revenues({reportingyear:dischargesTestingCtrl.reportingyear})">
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
        <div class="breadcrumb-item active">Testing and Other Services</div>
    </div>
    </div>

    <div class="section-body">
    <div id="cover-spin" ng-if="dischargesTestingCtrl.is_loader_disabled"></div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Testing and Other Services (Laboratory Examination)</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" ui-sref="hospital-operations-discharges-testing-details({reportingyear:dischargesTestingCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesTestingCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                <thead>
                    <tr>
                    <th class="align-middle" width="15%"> Number </th>
                    <th width="35%" style="border-right: 1px solid lightgray;">Total number of medical imaging tests (all types including x-rays, ultrasound, CT scans, etc.)  </th>
                    <th class="align-middle" width="15%"> Number </th>
                    <th width="35%">Total number of laboratory and diagnostic tests (all types, excluding medical imaging)  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.xray%></td>
                    <td>X-Ray </td>
                    <td><%dischargesTestingCtrl.testing.urinalysis%></td>
                    <td>Urinalysis </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.ultrasound%></td>
                    <td>Ultrasound </td>
                    <td><%dischargesTestingCtrl.testing.fecalysis%></td>
                    <td>Fecalysis </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.ctscan%></td>
                    <td>CT-Scan  </td>
                    <td><%dischargesTestingCtrl.testing.hematology%></td>
                    <td>Hematology  </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.mri%></td>
                    <td>MRI </td>
                    <td><%dischargesTestingCtrl.testing.clinicalchemistry%></td>
                    <td>Clinical chemistry   </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.mammography%></td>
                    <td>Mammography </td>
                    <td><%dischargesTestingCtrl.testing.immunology%></td>
                    <td>Immunology/Serology/HIV  </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.angiography%></td>
                    <td>Angiography </td>
                    <td><%dischargesTestingCtrl.testing.microbiology%></td>
                    <td>Microbiology (Smears/Culture & Sensitivity)  </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.linearaccelerator%></td>
                    <td>Linear Accelerator   </td>
                    <td><%dischargesTestingCtrl.testing.surgicalpathology%></td>
                    <td>Surgical Pathology  </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.dentalxray%></td>
                    <td>Dental X-Ray   </td>
                    <td><%dischargesTestingCtrl.testing.autopsy%></td>
                    <td>Autopsy </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.others%></td>
                    <td>Others </td>
                    <td><%dischargesTestingCtrl.testing.others%></td>
                    <td>Cytology </td>
                    </tr>
                </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-md">
                <thead>
                    <tr>
                    <th class="align-middle" width="15%"> Number </th>
                    <th width="35%">Blood Service Facilities  </th>
                    <th> </th>
                    <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.numberofbloodunitstransfused%></td>
                    <td>Number of Blood units Transfused  </td>
                    <td></td>
                    <td></td>
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

<script type="text/ng-template" id="add-discharges-testing-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Testing and Other Services</h5>
        <button type="button" class="close" ng-click="dischargesTestingCtrl.close()" ui-sref="hospital-operations-discharges-testing({reportingyear:dischargesTestingCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
            <thead>
                <tr>
                <th class="align-middle" width="15%"> Number </th>
                <th width="35%" style="border-right: 1px solid lightgray;">Total number of medical imaging tests (all types including x-rays, ultrasound, CT scans, etc.)  </th>
                <th class="align-middle" width="15%"> Number </th>
                <th width="35%">Total number of laboratory and diagnostic tests (all types, excluding medical imaging)  </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.xray"></td>
                <td>X-Ray </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.urinalysis"></td>
                <td>Urinalysis </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.ultrasound"></td>
                <td>Ultrasound </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.fecalysis"></td>
                <td>Fecalysis </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.ctscan"></td>
                <td>CT-Scan  </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.hematology"></td>
                <td>Hematology  </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.mri"></td>
                <td>MRI </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.clinicalchemistry"></td>
                <td>Clinical chemistry   </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.mammography"></td>
                <td>Mammography </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.immunology"></td>
                <td>Immunology/Serology/HIV  </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.angiography"></td>
                <td>Angiography </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.microbiology"></td>
                <td>Microbiology (Smears/Culture & Sensitivity)  </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.linearaccelerator"></td>
                <td>Linear Accelerator   </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.surgicalpathology"></td>
                <td>Surgical Pathology  </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.dentalxray"></td>
                <td>Dental X-Ray   </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.autopsy"></td>
                <td>Autopsy </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.others"></td>
                <td>Others </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.cytology"></td>
                <td>Cytology </td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-md">
            <thead>
                <tr>
                <th class="align-middle" width="15%"> Number </th>
                <th width="35%">Blood Service Facilities  </th>
                <th> </th>
                <th> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.numberofbloodunitstransfused"></td>
                <td>Number of Blood units Transfused  </td>
                <td></td>
                <td></td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesTestingCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesTestingCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesTestingCtrl.collection_copy" ng-click="dischargesTestingCtrl.createDischargeTestingBtn(dischargesTestingCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesTestingCtrl.collection_copy" ng-click="dischargesTestingCtrl.updateDischargeTestingBtn(dischargesTestingCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>