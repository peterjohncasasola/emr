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
    <li class="nav-item"><a href="#" ui-sref="nda({reportingyear:dischargesSpecialtyCtrl.reportingyear})" class="nav-link">NDA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="dischargesSpecialtyCtrl.reportingyear" ng-change="dischargesSpecialtyCtrl.selectReportingYear(dischargesSpecialtyCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in dischargesSpecialtyCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
    <li class="nav-item" ui-sref="facility_profile({reportingyear:dischargesSpecialtyCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:dischargesSpecialtyCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item active dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item active" ui-sref="hospital-operations-discharges-specialty({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesSpecialtyCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:dischargesSpecialtyCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:dischargesSpecialtyCtrl.reportingyear})">
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
        <div class="breadcrumb-item active">Type of Service and Total Discharges According to Specialty</div>
    </div>
    </div>

    <div class="section-body">
    <div id="cover-spin" ng-if="dischargesSpecialtyCtrl.is_loader_disabled"></div>

    <div class="row">


        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Type of Service and Total Discharges According to Specialty</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputdischarges_d" ui-sref="hospital-operations-discharges-specialty-new({reportingyear:dischargesSpecialtyCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesSpecialtyCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" border="1" style="font-size: 13px;">
                <thead>
                    <tr align="center" style="background: #f5f5f5;">
                    <th rowspan="3" class="align-middle">Type of Service  </th>
                    <th rowspan="3" class="align-middle">No. of Patients </th>
                    <th rowspan="3" class="align-middle" style="border-right: 2px solid gray;">Total Length of Stay/Total No. of Days Stay  </th>
                    <th colspan="8" style="border-right: 2px solid gray;"> A. Type of Accomodation  </th>
                    <th colspan="9" style="border-right: 2px solid gray;"> B. Condition on Discharge  </th>
                    <th class="align-middle" rowspan="3" style="border-right: 1px solid gray;"> Remarks</th>
                    <th class="align-middle" rowspan="3"> </th>
                    </tr>
                    <tr align="center">
                    <td colspan="3">Non-Philhealth  </td>
                    <td colspan="3">Philhealth</td>
                    <td class="align-middle" rowspan="2">HMO</td>
                    <td class="align-middle" rowspan="2" style="border-right: 2px solid gray;">OWWA</td>
                    <td class="align-middle" rowspan="2">Recovered/<br>Improved (R/I)</td>
                    <td class="align-middle" rowspan="2">Transferred<br>(T)</td>
                    <td class="align-middle" rowspan="2">Home Against<br>Medical Advice (HMA)</td>
                    <td class="align-middle" rowspan="2">Absconded<br>(A)</td>
                    <td class="align-middle" rowspan="2">Unimproved<br>(U)</td>
                    <td class="align-middle" colspan="3">Deaths</td>
                    <td class="align-middle" rowspan="2" style="border-right: 2px solid gray;"><b>Total Discharges</b></td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    <td class="align-middle">< 48 hrs</td>
                    <td class="align-middle">≥ 48 hrs</td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[0].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[0].value.id, 1)"></a></td>
                    </tr>
                    <tr>
                    <td><%dischargesSpecialtyCtrl.type_of_service_list[1].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[1].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[1].value.id, 2)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[2].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[2].value.id, 3)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[3].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[3].value.id, 4)"></a></td>
                    </tr>
                    <tr bgcolor="#f5f5f5"> <td  align="left" colspan="22"> <b>Surgery</b> </td> </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[4].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[4].value.id, 5)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[5].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[5].value.id, 6)"></a></td>
                    </tr>
                    
                    <tr bgcolor="#f5f5f5"> <td  align="left" colspan="22"><b>Other(s)</b> </td> </tr>
                    <tr ng-repeat="others in dischargesSpecialtyCtrl.type_of_service_list[6].value">
                        <td><%others.othertypeofservicespecify%></td>
                        <td><%others.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%others.totallengthstay%></td>
                        <td><%others.nppay%></td>
                        <td><%others.nphservicecharity%></td>
                        <td><%others.nphtotal%></td>
                        <td><%others.phpay%></td>
                        <td><%others.phservice%></td>
                        <td><%others.phtotal%></td>
                        <td><%others.hmo%></td>
                        <td><%others.owwa%></td>
                        <td><%others.recoveredimproved%></td>
                        <td><%others.transferred%></td>
                        <td><%others.hama%></td>
                        <td><%others.absconded%></td>
                        <td><%others.unimproved%></td>
                        <td><%others.deathsbelow48%></td>
                        <td><%others.deathsover48%></td>
                        <td><%others.totaldeaths%></td>
                        <td><%others.totaldischarges%></td>
                        <td><%others.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(others.id, 7)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[7].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[7].value.id, 8)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[8].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[8].value.id, 9)"></a></td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-secondary">No Data Submitted</span>
            </div>
        </div>
        </div>              
    </div>
    </div>
</section>

</div>


<script type="text/ng-template" id="add-discharges-specialty-modal">
<form>
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Type of Service and Total Discharges According to Specialty</h5>
        <button type="button" class="close" ng-click="dischargesSpecialtyCtrl.close()" ui-sref="hospital-operations-discharges-specialty({reportingyear:dischargesSpecialtyCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
                <label class="col-sm-1 col-form-label"> Select Type of Service: </label>
                <div class="col-sm-2">
                    <select class="form-control selectric" ng-model="dischargesSpecialtyCtrl.collection.typeofservice">
                    <option ng-value="type_of_service.id" ng-repeat="type_of_service in dischargesSpecialtyCtrl.type_of_services"><%type_of_service.desc%></option>
                    </select>
                </div>
                <label for="" class="col-sm-1 col-form-label" ng-if="dischargesSpecialtyCtrl.collection.typeofservice==7">Name of Service:</label>
                <div class="col-sm-2" ng-if="dischargesSpecialtyCtrl.collection.typeofservice==7">
                    <input type="text" class="form-control" id="" placeholder=""  ng-model="dischargesSpecialtyCtrl.collection.othertypeofservicespecify">
                </div>
                <label for="" class="col-sm-1 col-form-label">No. of Patients:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nopatients">
                </div>
                <label for="" class="col-sm-1 col-form-label">Total Length of Stay/Total No. of Days Stay:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.totallengthstay">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm long-table" border="1" style="font-size: 13px;">
                <thead>
                    <tr style="background: #E8E8E8;">
                    <th colspan="8"> A. Type of Accomodation  </th>
                    </tr>
                    <tr align="center">
                    <td colspan="3">Non-Philhealth  </td>
                    <td colspan="3">Philhealth</td>
                    <td class="align-middle" rowspan="2">HMO</td>
                    <td class="align-middle" rowspan="2">OWWA</td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nppay"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nphservicecharity"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.nppay+dischargesSpecialtyCtrl.collection.nphservicecharity"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.phpay"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.phservice"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.phpay+dischargesSpecialtyCtrl.collection.phservice"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.hmo"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.owwa"></td>
                    </tr>
                </tbody>
                </table>    
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm long-table" border="1" style="font-size: 13px;">
                <thead>
                    <tr style="background: #E8E8E8;">
                    <th colspan="9"> B. Condition on Discharge  </th>
                    </tr>
                    <tr align="center">
                    <td class="align-middle" rowspan="2">Recovered/<br>Improved (R/I)</td>
                    <td class="align-middle" rowspan="2">Transferred<br>(T)</td>
                    <td class="align-middle" rowspan="2">Home Against<br>Medical Advice (HMA)</td>
                    <td class="align-middle" rowspan="2">Absconded<br>(A)</td>
                    <td class="align-middle" rowspan="2">Unimproved<br>(U)</td>
                    <td class="align-middle" colspan="3">Deaths</td>
                    <td class="align-middle" rowspan="2"><b>Total Discharges</b></td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">< 48 hrs</td>
                    <td class="align-middle">≥ 48 hrs</td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.recoveredimproved"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.transferred"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.hama"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.absconded"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.unimproved"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.deathsbelow48"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.deathsover48"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.deathsbelow48+dischargesSpecialtyCtrl.collection.deathsover48"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.hmo+
                                                                                            dischargesSpecialtyCtrl.collection.owwa+
                                                                                            dischargesSpecialtyCtrl.collection.recoveredimproved+
                                                                                            dischargesSpecialtyCtrl.collection.transferred+
                                                                                            dischargesSpecialtyCtrl.collection.hama+
                                                                                            dischargesSpecialtyCtrl.collection.absconded+
                                                                                            dischargesSpecialtyCtrl.collection.unimproved"></td>
                    </tr>
                </tbody>
                </table>    
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label"> Remarks: </label>
                <div class="col-sm-11">
                <input type="text" class="form-control" id="" required="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.remarks"></td>
                </div>
            </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesSpecialtyCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesSpecialtyCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesSpecialtyCtrl.collection_copy" ng-click="dischargesSpecialtyCtrl.createDischargeSpecialtyBtn(dischargesSpecialtyCtrl.collection)">Save changes</button>
        </div>
    </div>
</form>

</script>

<!-- <script type="text/ng-template" id="edit-discharges-specialty-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Type of Service and Total Discharges According to Specialty</h5>
        <button type="button" class="close" ng-click="dischargesSpecialtyCtrl.close()" ui-sref="hospital-operations-discharges-specialty({reportingyear:dischargesSpecialtyCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
                <label class="col-sm-1 col-form-label"> Select Type of Service: </label>
                <div class="col-sm-4">
                    <select class="form-control selectric" ng-model="dischargesSpecialtyCtrl.collection.typeofservice">
                    <option value="1">Medicine</option>
                    <option value="2">Obstetrics</option>
                    <option value="3">Gynecology</option>
                    </select>
                </div>
                <label for="" class="col-sm-1 col-form-label">No. of Patients:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nopatients">
                </div>
                <label for="" class="col-sm-2 col-form-label">Total Length of Stay/Total No. of Days Stay:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.totallengthstay">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm long-table" border="1" style="font-size: 13px;">
                <thead>
                    <tr style="background: #E8E8E8;">
                    <th colspan="8"> A. Type of Accomodation  </th>
                    </tr>
                    <tr align="center">
                    <td colspan="3">Non-Philhealth  </td>
                    <td colspan="3">Philhealth</td>
                    <td class="align-middle" rowspan="2">HMO</td>
                    <td class="align-middle" rowspan="2">OWWA</td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nppay"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nphservicecharity"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.nppay+dischargesSpecialtyCtrl.collection.nphservicecharity"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.phpay"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.phservice"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.phpay+dischargesSpecialtyCtrl.collection.phservice"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.hmo"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.owwa"></td>
                    </tr>
                </tbody>
                </table>    
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm long-table" border="1" style="font-size: 13px;">
                <thead>
                    <tr style="background: #E8E8E8;">
                    <th colspan="9"> B. Condition on Discharge  </th>
                    </tr>
                    <tr align="center">
                    <td class="align-middle" rowspan="2">Recovered/<br>Improved (R/I)</td>
                    <td class="align-middle" rowspan="2">Transferred<br>(T)</td>
                    <td class="align-middle" rowspan="2">Home Against<br>Medical Advice (HMA)</td>
                    <td class="align-middle" rowspan="2">Absconded<br>(A)</td>
                    <td class="align-middle" rowspan="2">Unimproved<br>(U)</td>
                    <td class="align-middle" colspan="3">Deaths</td>
                    <td class="align-middle" rowspan="2"><b>Total Discharges</b></td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">< 48 hrs</td>
                    <td class="align-middle">≥ 48 hrs</td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.recoveredimproved"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.transferred"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.hama"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.absconded"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.unimproved"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.deathsbelow48"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.deathsover48"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.deathsbelow48+dischargesSpecialtyCtrl.collection.deathsover48"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.hmo+
                                                                                            dischargesSpecialtyCtrl.collection.owwa+
                                                                                            dischargesSpecialtyCtrl.collection.recoveredimproved+
                                                                                            dischargesSpecialtyCtrl.collection.transferred+
                                                                                            dischargesSpecialtyCtrl.collection.hama+
                                                                                            dischargesSpecialtyCtrl.collection.absconded+
                                                                                            dischargesSpecialtyCtrl.collection.unimproved"></td>
                    </tr>
                </tbody>
                </table>    
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label"> Remarks: </label>
                <div class="col-sm-11">
                <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.remarks"></td>
                </div>
            </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesSpecialtyCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesSpecialtyCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesSpecialtyCtrl.collection_copy" ng-click="dischargesSpecialtyCtrl.updateDischargeSpecialtyBtn(dischargesSpecialtyCtrl.collection)">Update changes</button>
        </div>
    </div>

</script> -->